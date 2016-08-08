<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicons/apple-touch-icon-precomposed.png">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>
	<div class="full-mobile-menu">
		<div class="mobile-close"></div>
		<div class="menu-area">
			<div class="x-close"><i class="fa fa-times"></i></div>
			<?php foundationpress_top_bar_r(); ?>
			<?php 
				if( user_is_allowed() ) { 
					manager_nav();
				}
			?>
		</div>
	</div>


	<section class="container">
		<div class="menu-and-container">
			<div class="mobile-menu">
				<div class="hamburger">
					<span class="fa fa-bars"></span>
				</div>
				<div class="mobile-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mondo.png"></a>
				</div>
				<div class="search">
					<a class="fa fa-search" href="/search"></a>
				</div>
			</div>
			<div class="top-menu">
				<div class="medium-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mondo.png"></a>
				</div>
				<?php get_template_part( 'parts/department-selector' ); ?>
			</div>
			<div class="side-menu">
				<?php foundationpress_top_bar_r(); ?>
				<?php 
					if( user_is_allowed() ) {
						manager_nav();
					}
				?>
			</div>
			<div class="main-content-container">

		<?php do_action( 'foundationpress_after_header' ); ?>


