// Imports: Dependencies
const path = require('path');
require('@babel/register');
const { CleanWebpackPlugin } = require('clean-webpack-plugin'); // installed via npm
const TerserJSPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const WebpackAssetsManifest = require('webpack-assets-manifest');
const sass = require('sass');
const fs = require('fs');
const sassUtils = require("node-sass-utils")(sass);

let css_filename, js_filename, dirname = '', landingpage = '';

module.exports = (env, argv) => {

   if (env.site) {
      dirname = env.site;
   }

   // DEFINE THE THEMEDIRS
   const themeDir = 'web/app/themes/'+dirname;
   const themeAssetsDir = themeDir+'/assets';
   const baseDir = dirname;
   const componentsDir = './../'+themeDir+'/components';
   const iconFolder = dirname+'/img/icons';

   if (argv.mode === 'development') {
      css_filename = themeAssetsDir+"/css/[name].css";
      js_filename = themeAssetsDir+"/js/[name].js";
   }

   if (argv.mode === 'production') {
      css_filename = themeAssetsDir+"/css/[name].[contenthash].css";
      js_filename = themeAssetsDir+"/js/[name].[contenthash].js";
   }

   const getFilesByType = (dirPath, fileType, arrayOfFiles, excluded = []) => {

      const files = fs.readdirSync(dirPath)
      arrayOfFiles = arrayOfFiles || []

      files.forEach( (file) => {

         //Skip folder if it's in the excludes array
         if (!excluded.includes(file)) {

            if (fs.statSync(dirPath + "/" + file).isDirectory()) {
               arrayOfFiles = getFilesByType(dirPath + "/" + file, fileType, arrayOfFiles, excluded)
            } else {

               //Check if filetype is the given filetype
               if ('undefined' !== typeof (fileType)) {
                  if (file.match(new RegExp(`.*\.${fileType}$`))) {
                     arrayOfFiles.push(path.join(__dirname, dirPath, "/", file))
                     console.log(`${fileType.toUpperCase()}-type found: ${file} in ${dirPath}`)
                  }
               } else {
                  arrayOfFiles.push(path.join(__dirname, dirPath, "/", file))
               }
            }

         }

      })

      return arrayOfFiles
   }

   // GET ENTRIES BY THEMEDIRS
   const paths = [
      [componentsDir, 'scss', ''],
      [baseDir+'/scss/base', 'scss'],
      [componentsDir, 'js'],
      [baseDir+'/js', 'js']
   ];

   const entries = paths.map( path => getFilesByType(...path) )

   let entryObj = {};

   entries.flat(1).forEach( path => {

      const filename = path.split("/").pop();
      let split = filename.split("_");
      
      //Remove optional first underscore   
      split = split.indexOf("") === 0 ? split.shift() : split ;

      const outputFile = split.length > 1 ? split[0] : 'main';

      if( entryObj.hasOwnProperty(outputFile) ) {
         entryObj[outputFile].push(path);
      } else {
         entryObj[outputFile] = [path];
      }
         
   });
   
   // Webpack Configuration
   const config = {
      resolve: {
         // Module paths are made to @use to another map for sass.
         modules: [
            path.resolve(__dirname, '../frontend/node_modules'),
            path.resolve(__dirname, '../frontend/'+dirname+'/scss'),
            path.resolve(__dirname, '../frontend/'+dirname+'/js/vendor'),
            path.resolve(__dirname, componentsDir)
         ],
      },

      entry: entryObj,
      output: {
         path: path.resolve(__dirname, '../'),
         filename: js_filename,
      },
      optimization: {
		minimize: argv.mode === 'development' ? false : true,
        minimizer: [new TerserJSPlugin({}), new CssMinimizerPlugin({})],
      },
      module: {
         rules: [
            // JavaScript/JSX Files
            {
               test: /\.js$/,
               exclude: /node_modules/,
               use: {
                  loader: "babel-loader",
                  options: {
                     plugins: [
                        ["@babel/plugin-proposal-decorators", { "legacy": true}]
                     ]
                  }
               }
            },
            // CSS Files
            {
               test: /\.scss$/,
               use: [
                  MiniCssExtractPlugin.loader,
                  {
                     loader: "css-loader",
                     options : {
                        sourceMap: true,
                        url: false
                     }
                  },
                  {
                     loader: "postcss-loader",
                     options: {
                        sourceMap: true,
                        ident: 'postcss',
                        plugins: (loader) => [
                           require('autoprefixer'),
                           require('postcss-inline-svg')(
                              {
                                 paths: [
                                    path.resolve(__dirname, dirname+'/img/'),
                                    path.resolve(__dirname, dirname+'/img/icons'),
                                 ],
                              }
                           ),
                           require('postcss-svgo')()
                        ]
                     }
                  },
                  {
                     loader: "sass-loader",
                     options : {
                        sourceMap: true,
                        // functions: {
                        //    "get-icons()": function() {
                        //       const icons = fs.readdirSync(iconFolder).map(e => e.split('.')[0]);
                        //       return sassUtils.castToSass(icons);
                        //    }
                        // }

                     }
                  }
               ]
            }
         ]
      },
      // Plugins
      plugins: [
         // clean the dist folders
         // assets/css  and assets/js
         new CleanWebpackPlugin({
            // dry: true, // (test mode)
            verbose: true,
            cleanOnceBeforeBuildPatterns: [themeAssetsDir+'/js/**/*',themeAssetsDir+'/css/**/*', '!static-files*', '!'+themeAssetsDir+'/css/login.css'],
            // cleanAfterEveryBuildPatterns: ['static*.*', '!static1.js'],
         }),

         // extract our css
         new MiniCssExtractPlugin({
            filename: css_filename,
            //sourceMap: true
         }),

         // save the generated filenames in our manifest
         new WebpackAssetsManifest({
            output: themeAssetsDir+'/twz-manifest.json',
            customize(entry) {
               if (entry.value.startsWith('web/')) {
                  return { key: entry.key, value: entry.value.split('web/')[1] };
               }

               return entry;
            }
         }),
      ],
   };

   // sourcemapping and watching only in dev mode
   if (argv.mode === 'development') {
      config.devtool = 'source-map';
      config.watch = true;
   }
   return config
}
