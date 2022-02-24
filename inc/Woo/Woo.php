<?php

namespace CheckBeforeTheme\Woo;

use CheckBeforeTheme\Woo\WooCheckout;

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
    add_action( 'init', array( $this, 'setup' ) );
  }

  /**
	 * Store all the classes inside an array.
	 *
	 * @return array Full list of classes
	 */
	public function get_classes()
	{
		return [
			WooCheckout::class,
		];
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function setup( $wp_customize ) 
	{
		foreach ( $this->get_classes() as $class ) {
			$service = new $class;
			if ( method_exists( $class, 'register' ) ) {
				$service->register( $wp_customize );
			}
		}
	}

  public function only_one_in_cart( $passed, $added_product_id )
  {
    wc_empty_cart();
    return $passed;
  }
}
