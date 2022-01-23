<?php

namespace CheckBeforeTheme\Custom;

/**
 * Use it to write your custom functions.
 */
class OptionsPages
{
	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @return
	 */
	public function register() {
    add_action( 'admin_menu', array( $this, 'add_admin_page' ), 99 );
    add_action( 'admin_init', array( $this, 'custom_settings' ), 99 );
	}

  public function add_admin_page() {
    add_submenu_page(
      'check_before_theme-general-settings',
      'Sunset CSS Options',
      'Custom CSS',
      'manage_options',
      'check_before_theme-custom-css',
      array( $this, 'theme_settings_page' )
    );
  }
  
  public function theme_settings_page() {
    require_once( get_template_directory() . '/template-parts/admin/custom-css.php' );
  }
  
  public function custom_settings() {
    register_setting(
      'custom-css-options',
      'check_before_theme_admin_custom_css',
      array( $this, 'sanitize_custom_css' )
    );
    
    add_settings_section(
      'sunset-custom-css-section',
      '',
      array( $this, 'custom_css_section_callback' ),
      'check_before_theme-custom-css'
    );
    
    add_settings_field(
      'custom-css',
      'Insert your Custom CSS',
      array( $this, 'custom_css_callback' ),
      'check_before_theme-custom-css',
      'sunset-custom-css-section'
    );
  }
  
  public function custom_css_section_callback() {
    // echo 'Customize Theme with your own CSS';
  }
  
  public function sanitize_custom_css( $input ){
    $output = esc_textarea( $input );
    return $output;
  }
  
  public function custom_css_callback() {
    $css = get_option( 'check_before_theme_admin_custom_css' );
    
    $html = '<div id="check_before_theme-custom-css-wrapper">' . $css . '</div>';
    $html .= '<textarea id="check_before_theme_admin_custom_css" name="check_before_theme_admin_custom_css" style="display:none;visibility:hidden;">' . $css . '</textarea>';

    echo $html;
  }
}