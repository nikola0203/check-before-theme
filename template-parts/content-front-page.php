<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

get_template_part( 'template-parts/sections/home/section', 'hero' );
get_template_part( 'template-parts/sections/home/section', 'features' );
get_template_part( 'template-parts/sections/home/section', 'steps' );
get_template_part( 'template-parts/sections/general/section', 'faq' );
if ( get_field( 'show_global_cta_section' ) ) :
  $cta_section = get_field( 'cta_section', 'option' );
else :
  $cta_section = get_field( 'cta_section' );
endif;
if ( ! empty( $cta_section ) ) :
  get_template_part( 'template-parts/sections/general/section', 'cta', $cta_section );
endif;
