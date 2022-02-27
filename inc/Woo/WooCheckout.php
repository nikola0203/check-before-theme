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
    add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'save_custom_checkout_fields' ), 10, 2 );
    add_action( 'woocommerce_checkout_process', array( $this, 'custom_checkout_field_process' ) );
    add_filter( 'woocommerce_email_order_meta', array( $this, 'custom_field_in_email_order' ), 10, 3 );
    add_filter( 'wc_add_to_cart_message_html', array( $this, 'remove_add_to_cart_message' ), 10, 1 );
    add_action( 'woocommerce_admin_order_data_after_order_details', array( $this, 'display_order_data_in_admin' ), 10, 1 );
    add_action( 'template_redirect', array( $this, 'woo_pages_redirect' ) );
  }

  /**
   * Redirect from WooCommerce pages to the homepage.
   *
   * @param string $url
   * @return url
   */
  public function woo_pages_redirect( $url ) {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_account_page() ) {
      wp_redirect( home_url() );
      exit();
    }
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
    woocommerce_form_field(
      'number_of_users',
      array(
        'type' => 'hidden',
      ),
      $checkout->get_value( 'number_of_users' )
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
    if ( !empty( $_POST['number_of_users'] ) ) {
		  update_post_meta( $order_id, 'number_of_users', sanitize_text_field( $_POST['number_of_users'] ) );
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
    if ( ! $_POST['number_of_users'] ) {
      wc_add_notice( __( 'Plese select the number of users on the <a href="'. site_url( '/plans-and-pricing/' ) .'">pricing</a> page.' ), 'error' );
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
  public function custom_field_in_email_order( $order, $sent_to_admin, $plain_text )
  {
    $billing_abn = get_post_meta( $order->get_order_number(), 'billing_abn', true );
    $number_of_users = get_post_meta( $order->get_order_number(), 'number_of_users', true );

    if ( $plain_text === false ) {
      // you shouldn't have to worry about inline styles, WooCommerce adds them itself depending on the theme you use
      echo '<h2>Additional Fields</h2>
      <ul>
        <li><strong>ABN number:</strong> ' . $billing_abn . '</li>
        <li><strong>Number of users:</strong> ' . $number_of_users . '</li>
      </ul>';
    } else {
      echo "
      ABN number: $billing_abn
      Number of users: $number_of_users";	
    }
  }

  /**
   * Remove add to cart messsage.
   *
   * @param string $message
   * @return string
   */
  public function remove_add_to_cart_message( $message ){
    return '';
  }

  /**
   * Display custom field in the admin order.
   *
   * @param object $order
   * @return void
   */
  public function display_order_data_in_admin( $order )
  {
    ?>
    <div class="order_data_column">
      <h4><?php _e( 'Additional Information', 'woocommerce' ); ?><a href="#" class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a></h4>
      <div class="address">
      <?php
        echo '<p><strong>' . __( 'ABN number' ) . ':</strong>' . get_post_meta( $order->get_id(), 'billing_abn', true ) . '</p>';
        echo '<p><strong>' . __( 'Number of users' ) . ':</strong>' . get_post_meta( $order->get_id(), 'number_of_users', true ) . '</p>'; ?>
      </div>
      <div class="edit_address">
        <?php
        woocommerce_wp_text_input(
          array(
            'id'            => 'billing_abn',
            'label'         => __( 'ABN number' ),
            'wrapper_class' => '_billing_company_field'
          )
        );
        woocommerce_wp_text_input(
          array(
            'id'            => 'number_of_users',
            'label'         => __( 'Number of users' ),
            'wrapper_class' => '_billing_company_field'
          )
        );
        ?>
      </div>
    </div>
    <?php
  }
}
