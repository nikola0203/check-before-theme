<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-15' ); ?>>
  <div class="container">
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
    </header><!-- .entry-header -->
  
    <?php //check_before_theme_post_thumbnail(); ?>
  
    <div class="entry-content">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <?php the_content(); ?>
        </div>
      </div>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->

