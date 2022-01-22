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
        'fivestarclean_register_nav_menus',
        array(
          'primary'       => esc_html__( 'Primary Menu', 'checkbeforetheme' ),
          'header-top'    => esc_html__( 'Header Top', 'checkbeforetheme' ),
          'footer-menu-1' => esc_html__( 'Footer Menu 1', 'checkbeforetheme' ),
          'footer-menu-2' => esc_html__( 'Footer Menu 2', 'checkbeforetheme' ),
        )
      )
    );
  }
}