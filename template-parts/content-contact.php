<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
  get_template_part( 'template-parts/sections/general/section', 'hero' );
  get_template_part( 'template-parts/sections/contact/section', 'contact-data' );
  get_template_part( 'template-parts/sections/general/modal', 'contact-form' );
  ?>
</article>