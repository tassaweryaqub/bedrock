<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'wordpress-theme',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => 'understrap/understrap',
        'dev' => true,
    ),
    'versions' => array(
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'dev_requirement' => false,
        ),
        'dealerdirect/phpcodesniffer-composer-installer' => array(
            'pretty_version' => 'v0.7.2',
            'version' => '0.7.2.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../dealerdirect/phpcodesniffer-composer-installer',
            'aliases' => array(),
            'reference' => '1c968e542d8843d7cd71de3c5c9c3ff3ad71a1db',
            'dev_requirement' => true,
        ),
        'grogy/php-parallel-lint' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'jakub-onderka/php-parallel-lint' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'php-parallel-lint/php-parallel-lint' => array(
            'pretty_version' => 'v1.3.2',
            'version' => '1.3.2.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-parallel-lint/php-parallel-lint',
            'aliases' => array(),
            'reference' => '6483c9832e71973ed29cf71bd6b3f4fde438a9de',
            'dev_requirement' => true,
        ),
        'phpcompatibility/php-compatibility' => array(
            'pretty_version' => '9.3.5',
            'version' => '9.3.5.0',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../phpcompatibility/php-compatibility',
            'aliases' => array(),
            'reference' => '9fb324479acf6f39452e0655d2429cc0d3914243',
            'dev_requirement' => true,
        ),
        'phpcompatibility/phpcompatibility-paragonie' => array(
            'pretty_version' => '1.3.1',
            'version' => '1.3.1.0',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../phpcompatibility/phpcompatibility-paragonie',
            'aliases' => array(),
            'reference' => 'ddabec839cc003651f2ce695c938686d1086cf43',
            'dev_requirement' => true,
        ),
        'phpcompatibility/phpcompatibility-wp' => array(
            'pretty_version' => '2.1.3',
            'version' => '2.1.3.0',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../phpcompatibility/phpcompatibility-wp',
            'aliases' => array(),
            'reference' => 'd55de55f88697b9cdb94bccf04f14eb3b11cf308',
            'dev_requirement' => true,
        ),
        'roave/security-advisories' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'metapackage',
            'install_path' => NULL,
            'aliases' => array(),
            'reference' => 'dad1e44d86f958c5be9c5f355c9554ce22f1b1a7',
            'dev_requirement' => true,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.6.2',
            'version' => '3.6.2.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'reference' => '5e4e71592f69da17871dba6e80dd51bce74a351a',
            'dev_requirement' => true,
        ),
        'understrap/understrap' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'wordpress-theme',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'wp-coding-standards/wpcs' => array(
            'pretty_version' => '2.3.0',
            'version' => '2.3.0.0',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../wp-coding-standards/wpcs',
            'aliases' => array(),
            'reference' => '7da1894633f168fe244afc6de00d141f27517b62',
            'dev_requirement' => true,
        ),
        'wptrt/wpthemereview' => array(
            'pretty_version' => '0.2.1',
            'version' => '0.2.1.0',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../wptrt/wpthemereview',
            'aliases' => array(),
            'reference' => '462e59020dad9399ed2fe8e61f2a21b5e206e420',
            'dev_requirement' => true,
        ),
    ),
);
