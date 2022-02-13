<?php

namespace CheckBeforeTheme\Woo;

/**
 * Custom WooCommerce methods.
 */
class Woo
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
  public function register()
  {
    add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'only_one_in_cart' ), 9999, 2 );
  }

  public function only_one_in_cart( $passed, $added_product_id )
  {
    wc_empty_cart();
    return $passed;
  }
}
