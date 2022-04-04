<?php
/**
 * Template part for displaying page content in tmp-why.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

get_template_part( 'template-parts/sections/why/section', 'hero' );
get_template_part( 'template-parts/sections/why/section', 'content-icon', get_field( 'content_icon_right' ) );
get_template_part( 'template-parts/sections/why/section', 'content-image', get_field( 'content_image_left' ) );
get_template_part( 'template-parts/sections/why/section', 'content-image', get_field( 'content_image_right' ) );
get_template_part( 'template-parts/sections/why/section', 'video-section' );
get_template_part( 'template-parts/sections/why/section', 'content-icon', get_field( 'content_icon_right_second' ) );
get_template_part( 'template-parts/sections/why/section', 'two-columns' );
get_template_part( 'template-parts/sections/why/section', 'features-and-image' );
if ( get_field( 'show_global_cta_section' ) ) :
  $cta_section = get_field( 'cta_section', 'option' );
else :
  $cta_section = get_field( 'cta_section' );
endif;
if ( ! empty( $cta_section ) ) :
  get_template_part( 'template-parts/sections/general/section', 'cta', $cta_section );
endif;
