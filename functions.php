<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `app/Custom/Custom.php` to write your custom functions
 *
 * @package checkbeforetheme
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'CheckBeforeTheme\\Init' ) ) :
	CheckBeforeTheme\Init::register_services();
endif;
