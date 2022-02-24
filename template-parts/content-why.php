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
get_template_part( 'template-parts/sections/home/section', 'cta' );
