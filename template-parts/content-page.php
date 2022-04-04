<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'my-15' ); ?>>
  <div class="container">
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
    </header><!-- .entry-header -->
  
    <div class="entry-content">
      <div class="row justify-content-center">
        <div class="col-lg-10">
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
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
