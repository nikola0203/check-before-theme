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

<footer id="colophon" class="site-footer">
	<div class="site-footer-widgets-wrapper py-4 py-lg-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 d-flex d-lg-block justify-content-center align-items-center flex-column pb-4 pb-lg-0">
					<?php CheckBeforeTheme\Custom\Custom::FooterLogo(); ?>
					<?php // CheckBeforeTheme\Custom\Custom::FooterSocialIcons(); ?>
				</div>
				<div class="col-lg-8">
					<div class="row justify-content-center">
						<?php
						if ( has_nav_menu( 'footer-menu-1' ) ) :
							?>
							<div class="col-lg-4 pb-4 pb-lg-0">
								<h3 class="footer-menu-title txt-cyan"><?php esc_html_e( 'Quick Links', 'check_before_theme' ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'footer-menu-1',
										'menu_id'         => 'footer-menu-1',
										'menu_class'      => 'menu mb-0',
										'container_id'    => 'footer-menu-container',
									)
								);
								?>
							</div>
							<?php
						endif;
						if ( has_nav_menu( 'footer-menu-2' ) ) :
							?>
							<div class="col-lg-4">
								<h3 class="footer-menu-title txt-cyan"><?php esc_html_e( 'Connect with us', 'check_before_theme' ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'footer-menu-2',
										'menu_id'         => 'footer-menu-2',
										'menu_class'      => 'menu mb-0',
										'container_id'    => 'footer-menu-container',
									)
								);
								?>
							</div>
							<?php
						endif;
						if ( has_nav_menu( 'footer-menu-3' ) ) :
							?>
							<div class="col-lg-4">
								<h3 class="footer-menu-title txt-cyan"><?php esc_html_e( 'Connect with us', 'check_before_theme' ); ?></h3>
								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'footer-menu-3',
										'menu_id'         => 'footer-menu-3',
										'menu_class'      => 'menu mb-0',
										'container_id'    => 'footer-menu-container',
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
	<div class="site-info py-3 txt-white txt-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( '%1$s', 'check_before_theme' ), 'Copyright ' . date( 'Y' ) . ' CheckBefore' );
					?>
				</div>
				<div class="col-lg-6">
					<?php
					if ( has_nav_menu( 'footer-menu-4' ) ) :
						wp_nav_menu(
							array(
								'theme_location'  => 'footer-menu-4',
								'menu_id'         => 'footer-menu-4',
								'menu_class'      => 'menu mb-0',
								'container_id'    => 'footer-menu-container',
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
