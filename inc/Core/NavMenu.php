<?php

namespace CheckBeforeTheme\Core;

/**
 * NavMenu.
 */
class NavMenu
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
  public function register()
  {
    add_filter( 'nav_menu_item_title', array( $this, 'add_fa_icon_for_dropdown_item' ), 10, 4 );
  }

  public function add_fa_icon_for_dropdown_item( $title, $item, $args, $depth )
  {
    if ( 'primary-menu' == $args->menu_id ) {
      if ( in_array( 'menu-item-has-children', $item->classes ) ) {
        $title .= '<i class="ms-lg-3 px-3 px-lg-0 py-lg-0 fas fa-chevron-down"></i>';
      }
    }
    return $title;
  }
}