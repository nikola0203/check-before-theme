<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package check_before_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'check_before_theme' ); ?></a>

	<header id="masthead" class="site-header relative shadow">
		<nav id="site-navigation" class="py-4" role="navigation">
			<div class="container pe-lg-0">
				<div class="nav-logo-btn-wrapper">
					<?php the_custom_logo(); ?>
					<div class="navtoggle">
						<div class="navtoggle__icon"></div>
					</div>
				</div>
				<div class="ms-lg-auto">
					<?php
					if ( has_nav_menu( 'header-top' ) ) :
						wp_nav_menu(
							array(
								'theme_location'  => 'header-top',
								'menu_id'         => 'header-top-menu',
								'menu_class'      => 'menu d-flex ps-0 mb-0 me-3 ms-auto',
								'container_id'    => 'header-top-menu-container',
								'container_class' => 'd-none d-lg-flex pb-2',
							)
						);
					endif;
					if ( has_nav_menu( 'primary' ) ) :
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'menu_id'         => 'primary-menu',
								'container_id'    => 'primary-menu-container',
								'container_class' => 'ms-lg-auto',
							)
						);
					endif;
					?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->