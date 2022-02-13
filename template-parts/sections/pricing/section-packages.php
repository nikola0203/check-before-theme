<?php
/**
 * Template part for displaying page content in content-pricing.php
 *
 */

$packages    = get_field( 'packages_section' );
$allowedHtml = array(
  'br' => array(),
);

?>
<section class="section-pricing-packages pb-6 pb-lg-12 mb-6 mb-lg-12">
  <div class="container">
    <?php
    if ( !empty( $packages['packages'] ) ) :
      $x      = 1;
      $length = count( $packages['packages'] );
      ?>
      <div class="section-pricing-packages-wrapper">
        <div class="row px-5">
          <?php
          foreach ( $packages['packages'] as $key => $package ) :
            $product_id          = $package['select_product'];
            $_product            = new WC_Product_Variable( $product_id );
            $name                = $_product->get_name();
            $price               = $_product->get_price();
            $variations          = $_product->get_children();
            $variation_month     = new WC_Product_Variation( $variations[0] );
            $variation_annual    = new WC_Product_Variation( $variations[1] );
            $num_of_users_month  = $variation_month->get_variation_attributes()['attribute_pa_number-of-users'];
            $payment_type_month  = $variation_month->get_variation_attributes()['attribute_pa_payment-type'];
            $month_price         = $variation_month->get_price();
            $num_of_users_annual = $variation_annual->get_variation_attributes()['attribute_pa_number-of-users'];
            $payment_type_annual = $variation_annual->get_variation_attributes()['attribute_pa_payment-type'];
            $annual_price        = $variation_annual->get_price();
            $desc                = $package['description'];
            $button              = $package['button'];
            $count_1             = 1;
            $count_2             = 1;
            $pkg_length          = count( $package['features'] );
            ?>
            <?php
            if ( 0 == $key ) :
              ?>
              <div class="col d-none d-lg-flex flex-column px-0 border-end">
                <?php
                foreach ( $package['features'] as $key => $feature ) :
                  if ( 0 == $key ) :
                    ?>
                    <div id="pricing-package-name-height" class="border-start border-top border-bottom py-6 fw-bold text-uppercase"></div>
                    <div id="pricing-package-price-block-height" class="border-start border-bottom"></div>
                    <?php
                  endif;
                  ?>
                  <div class="pricing-list-desc p-5 fw-bold border-start border-bottom <?php echo ( $count_1 != $pkg_length ) ? '' : ''; ?>"><?php esc_html_e( $feature['feature_name'] ); ?></div>
                  <?php
                  $count_1++;
                endforeach;
                ?>
              </div>
              <?php
            endif;
            ?>
            <div class="col-12 col-lg mb-8 mb-lg-0 px-0<?php echo ( $x != $length ) ? '' : ''; ?><?php echo ( 1 == $key ) ? ' bg-light relative' : ''; ?>">
              <?php
              if ( 1 == $key ) :
                ?>
                <div class="featured-package-triangle"></div>
                <?php
              endif;
              ?>
              <div class="row-wrapper text-center">
                <div class="pricing-package-name border-bottom py-6 fw-bold text-uppercase border-top border-end"><?php esc_html_e( $name ); ?></div>
                <div class="pricing-package-price-block pricing-package-price-block-<?php esc_attr_e( $x ); ?> px-4 border-bottom border-end">
                  <h4 class="pricing-package-price pricing-package-price-<?php esc_attr_e( $x ); ?> mb-5">
                    <?php
                    if ( !empty( $variations ) ) {
                      foreach ( $variations as $variation_id ) {
                        $single_variation = new WC_Product_Variation( $variation_id );
                        $num_of_users     = $single_variation->get_variation_attributes()['attribute_pa_number-of-users'];
                        $payment_type     = $single_variation->get_variation_attributes()['attribute_pa_payment-type'];
                        $variation_price  = $single_variation->get_price();
                        ?>
                        <input type="hidden" class="variation-price" name="<?php echo ( 'month' == $payment_type ) ? 'variation-price-month' : 'variation-price-annual'; ?>" data-num_of_users="<?php esc_attr_e( $num_of_users ); ?>" data-payment_type="<?php esc_attr_e( $payment_type ); ?>" data-variation_id="<?php esc_attr_e( $variation_id ); ?>" value="<?php esc_attr_e( $variation_price ) ?>">
                        <?php
                      }
                    }
                    ?>
                    <?php
                    if ( $month_price && 'up-to-15-users' == $num_of_users_month && 'month' == $payment_type_month ) :
                      ?>
                      <span class="span-price span-price-month active">
                        <span class="currency"><?php esc_html_e( get_woocommerce_currency_symbol() ); ?></span><span data-variation_id="<?php esc_attr_e( $variations[0] ); ?>" class="price"><?php esc_html_e( $month_price ); ?></span><small>/month</small>
                      </span>
                      <?php
                    endif;
                    if ( $annual_price && 'up-to-15-users' == $num_of_users_annual && 'annual' == $payment_type_annual ) :
                      ?>
                      <span class="span-price span-price-annual">
                        <span class="currency"><?php esc_html_e( get_woocommerce_currency_symbol() ); ?></span><span data-variation_id="<?php esc_attr_e( $variations[1] ); ?>" class="price"><?php esc_html_e( $annual_price ); ?></span><small>/annual</small>  
                      <?php
                    endif;
                    ?>
                  </h4>
                  <div class="pricing-package-desc mb-8 fw-bold"><?php echo wp_kses_post( $desc ); ?></div>
                  <div class="pricing-package-btn pricing-package-btn-<?php esc_attr_e( $x ); ?>">
                    <?php
                    if ( !empty( $variations ) ) :
                      ?>
                      <a href="<?php echo esc_url( site_url( '/checkout/?add-to-cart=' . $variations[0] . '&quantity=1' ) ); ?>" target="<?php esc_attr_e( $button['target'] ); ?>" title="<?php esc_attr_e( $button['title'] ); ?>" class="btn btn-get-started"><?php esc_html_e( $button['title'] ); ?></a>
                      <?php
                    endif;
                    ?>
                  </div>
                </div>
                <div class="<?php echo ( $x != $length ) ? '' : ''; ?>">
                  <?php
                  foreach ( $package['features'] as $key => $feature ) :
                    ?>
                    <div class="pricing-package-checkmark pricing-package-checkmark-<?php esc_attr_e( $count_2 ); ?> pricing-list-desc d-flex justify-content-between justify-content-lg-center align-items-center p-5 px-sm-8 border-bottom border-end border-start-md <?php echo ( $count_2 != $pkg_length ) ? '' : ''; ?>">
                      <div class="fw-bold text-start me-4 d-lg-none"><?php esc_html_e( $feature['feature_name'] ); ?></div>
                      <?php 
                      if ( !empty( $feature['yesno'] ) ) :
                        ?>
                        <i class="fa fa-check-circle text-secondary"></i>
                        <?php
                      else :
                        ?>
                        <i class="fa fa-check-circle" style="color:#dfe1e5;"></i>
                        <?php
                      endif;
                      ?>
                    </div>
                    <?php
                    $count_2++;
                  endforeach;
                  ?>
                </div>
              </div>
            </div>
            <?php
            $x++;
          endforeach;
          ?>
        </div>
      </div>
      <?php
    endif;
    ?>
  </div>
</section>
