<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&family=Roboto&family=Source+Sans+Pro:wght@400;700;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=PT+Sans:wght@400;700&family=Roboto&family=Source+Sans+Pro:wght@400;700;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">
		
		<div class="container">
			<div class="top-header-holder">
				<div class="row">
					<div class="col-4">
						<div class="logo-holder">
							<div class="logo">
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="reservation-holder">
							<div class="contact-holder">
								<a href="#" class="phone">
									<i class="fa fa-phone"></i>+013 7373299
								</a>
								<a href="#" class="adress">
									<i class="fa fa-map"></i>Stationsstraat 227, 3024 JX Rotterdam	
								</a>
								<div class="social-media-holder-tablet">
								</div>
							</div>
							<a class="reservation-btn">Make a Reservation</a>
							<div class="social-media-holder">
								<i class="fa fa-facebook"></i>
								<i class="fa fa-instagram"></i>
							</div>
						</div>
					</div>
						<div class="col-">	
							<!-- <div class="social-media-holder">
								<i class="fa fa-facebook"></i>
								<i class="fa fa-instagram"></i>
							</div> -->
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<div class="bar"></div>
								<div class="bar"></div>
								<div class="bar"></div>
								Menu
							</button>
						</div>
				 </div>
			</div>
		</div>

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<?php get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version ); ?>

	</header><!-- #wrapper-navbar end -->
