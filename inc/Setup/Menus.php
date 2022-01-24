<?php

namespace CheckBeforeTheme\Setup;

/**
 * Menu.
 */
class Menus
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
  public function register()
  {
    add_action( 'after_setup_theme', array( $this, 'menus' ) );
  }

  public function menus()
  {
    register_nav_menus(
      apply_filters(
        'check_before_theme_register_nav_menus',
        array(
          'primary'       => esc_html__( 'Primary Menu', 'check_before_theme' ),
          'header-top'    => esc_html__( 'Header Top', 'check_before_theme' ),
          'footer-menu-1' => esc_html__( 'Footer Menu 1', 'check_before_theme' ),
          'footer-menu-2' => esc_html__( 'Footer Menu 2', 'check_before_theme' ),
          'footer-menu-3' => esc_html__( 'Footer Menu 3', 'check_before_theme' ),
          'footer-menu-4' => esc_html__( 'Footer Menu 4', 'check_before_theme' ),
        )
      )
    );
  }
}