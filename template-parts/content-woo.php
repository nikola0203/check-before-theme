<?php
/**
 * Template part for displaying page content in tmp-woo.php
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
  
    <div class="entry-content">
      <?php the_content(); ?>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
