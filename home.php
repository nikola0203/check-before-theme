<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

get_header();
?>

	<main id="primary" class="site-main">

    <?php
    $page_title = get_the_title( get_option( 'page_for_posts', true ) );
    if ( $page_title ) :
      ?>
      <header class="blog-header bg-light py-10 py-lg-18 mb-10 mb-lg-12">
        <h1 class="text-center mb-0"><?php esc_html_e( $page_title ); ?></h1>
      </header>
      <?php
    endif;

		if ( have_posts() ) :

      ?>
      <div class="section-recent-posts my-10 my-lg-18">
        <div class="container">
          <div class="row">
            <?php
            while ( have_posts() ) :
              the_post();
              ?>
              <?php get_template_part( 'template-parts/content', 'blog' ); ?>
              <?php
            endwhile;
            ?>
          </div>
        </div>
      </div>

      <div class="container">
        <?php
        the_posts_pagination( array(
          'prev_text' => 'Previous',
          'next_text' => 'Next'
        ) );
        ?>
      </div>
      <?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
