<?php
/**
 * Front Page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package check_before_theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'front-page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
