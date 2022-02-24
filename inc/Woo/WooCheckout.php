<?php

namespace CheckBeforeTheme\Woo;

/**
 * Custom WooCommerce methods.
 */
class WooCheckout
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
  public function register()
  {
    add_action( 'woocommerce_after_checkout_billing_form', array( $this, 'custom_checkout_fields' ), 10, 1 );
    add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_custom_checkout_fields' ) );
    add_action( 'woocommerce_checkout_process', array( $this, 'custom_checkout_field_process' ) );
    add_filter( 'woocommerce_email_order_meta_fields', array( $this, 'custom_field_in_email_order' ), 10, 3 );
  }

  /**
   * Create custom checkout field.
   *
   * @param object $checkout
   * @return void
   */
  public function custom_checkout_fields( $checkout ) {
    woocommerce_form_field(
      'billing_abn',
      array(
        'type'        => 'number',
        'required'    => true,
        'label'       => __( 'ABN number', 'woocommerce' ),
        'description' => 'Please enter your ABN',
        'placeholder' => _x( 'ABN', 'placeholder', 'woocommerce' ),
        'maxlength'   => 14
      ),
      $checkout->get_value( 'billing_abn' )
    );
  }

  /**
   * Update the order meta with field value.
   *
   * @param int $order_id
   * @return void
   */
  public function save_custom_checkout_fields( $order_id, $data )
  {
    if ( !empty( $_POST['billing_abn'] ) ) {
		  update_post_meta( $order_id, 'billing_abn', sanitize_text_field( $_POST['billing_abn'] ) );
    }
  }

  /**
   * Process the checkout.
   *
   * @return void
   */
  function custom_checkout_field_process()
  {
    if ( strlen( $_POST['billing_abn'] ) > 14 ) {
      wc_add_notice( '<strong>ABN Number</strong>  can\'t be longer than 14 characters', 'error' );
    }
    if ( ! $_POST['billing_abn'] ) {
      wc_add_notice( __( '<strong>ABN Number</strong> is a required field.' ), 'error' );
    }
  }

  /**
   * Add custom field in order email.
   *
   * @param array $fields
   * @param boolean $sent_to_admin
   * @param object $order
   * @return array
   */
  public function custom_field_in_email_order( $fields, $sent_to_admin, $order )
  {
    $fields['billing_abn'] = array(
      'label' => __( 'ABN number' ),
      'value' => get_post_meta( $order->id, 'billing_abn', true ),
    );
    return $fields;
  }
}
