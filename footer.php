<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package check_before_theme
 */

?>

<footer id="colophon" class="site-footer bg-light">
	<div class="site-footer-widgets-wrapper py-10 py-lg-18">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 d-flex d-lg-block justify-content-center align-items-center flex-column pb-8 pb-lg-0">
					<?php CheckBeforeTheme\Custom\Custom::FooterLogo(); ?>
					<?php // CheckBeforeTheme\Custom\Custom::FooterSocialIcons(); ?>
				</div>
				<div class="col-lg-8">
					<div class="row justify-content-lg-center">
						<?php
						if ( has_nav_menu( 'footer-menu-1' ) ) :
							?>
							<div class="col-12 col-sm-6 col-lg-4 pb-8 pb-lg-0">
								<h3 class="footer-menu-title mb-8"><?php esc_html_e( wp_get_nav_menu_name( 'footer-menu-1' ) ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-menu-1',
										'menu_id'        => 'footer-menu-1',
										'menu_class'     => 'menu mb-0',
										'container_id'   => 'footer-menu-container',
									)
								);
								?>
							</div>
							<?php
						endif;
						if ( has_nav_menu( 'footer-menu-2' ) ) :
							?>
							<div class="col-12 col-sm-6 col-lg-4 pb-8 pb-lg-0">
								<h3 class="footer-menu-title mb-8"><?php esc_html_e( wp_get_nav_menu_name( 'footer-menu-2' ) ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-menu-2',
										'menu_id'        => 'footer-menu-2',
										'menu_class'     => 'menu mb-0',
										'container_id'   => 'footer-menu-container',
									)
								);
								?>
							</div>
							<?php
						endif;
						if ( has_nav_menu( 'footer-menu-3' ) ) :
							?>
							<div class="col-12 col-sm-6 col-lg-4">
								<h3 class="footer-menu-title mb-8"><?php esc_html_e( wp_get_nav_menu_name( 'footer-menu-3' ) ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-menu-3',
										'menu_id'        => 'footer-menu-3',
										'menu_class'     => 'menu mb-0',
										'container_id'   => 'footer-menu-container',
									)
								);
								?>
							</div>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-info">
		<div class="container border-top pt-6 pb-6">
			<div class="row">
				<div class="col-md-6 pb-6 d-flex justify-content-center justify-content-md-start">
					<?php CheckBeforeTheme\Custom\Custom::FooterCopy(); ?>
				</div>
				<div class="col-md-6">
					<?php
					if ( has_nav_menu( 'footer-menu-4' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu-4',
								'menu_id'        => 'footer-menu-4',
								'menu_class'     => 'menu ps-0 mb-0 text-center',
								'container_id'   => 'footer-menu-container',
							)
						);
					endif;
					?>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
