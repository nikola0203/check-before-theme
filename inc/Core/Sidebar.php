<?php

namespace CheckBeforeTheme\core;

/**
 * Sidebar.
 */
class Sidebar
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
  public function register()
  {
    add_action( 'widgets_init', array( $this, 'widgets_init' ) );
  }

  /**
   * Define the sidebar.
   */
  public function widgets_init()
  {
    register_sidebar(
      array(
        'name'          => esc_html__( 'Sidebar', 'check_before_theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'check_before_theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      )
    );
  }
}