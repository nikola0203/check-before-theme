<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-8 mb-md-15' ); ?>>
  <header class="entry-header bg-light py-8 py-md-18">
    <div class="container">
      <?php the_title( '<h1 class="entry-title text-center mb-0">', '</h1>' ); ?>
    </div>
  </header><!-- .entry-header -->
  
  <div class="entry-content container mt-8 mt-md-15">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <?php the_content(); ?>
      </div>
    </div>
  </div><!-- .entry-content -->

  <?php
  if ( get_field( 'show_cta_section' ) ) :
    if ( get_field( 'show_global_cta_section' ) ) :
      $cta_section = get_field( 'cta_section', 'option' );
    else :
      $cta_section = get_field( 'cta_section' );
    endif;

    if ( ! empty( $cta_section ) ) :
      get_template_part( 'template-parts/sections/general/section', 'cta', $cta_section );
    endif;
  endif;
  ?>
</article><!-- #post-<?php the_ID(); ?> -->
