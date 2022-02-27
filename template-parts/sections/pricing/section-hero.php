<?php
/**
 * Template part for displaying page content in content-pricing.php
 *
 */

$hero        = get_field( 'hero_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-pricing-hero bg-light py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <?php
    if ( !empty( $hero['title'] ) ) :
      ?>
      <h1 class="hero-title text-center"><?php echo wp_kses( $hero['title'], $allowedHtml ); ?></h1>
      <?php
    endif;
    if ( !empty( $hero['subtitle'] ) ) :
      ?>
      <div class="d-flex justify-content-center flex-column flex-md-row align-items-center mb-10">
        <h4 class="text-center mb-md-0"><?php echo wp_kses( $hero['subtitle'], $allowedHtml ); ?></h4>
        <div class="d-flex justify-content-center align-items-start">
          <input type="number" min="1" value="1" name="number-of-users" id="number-of-users" class="border ms-5">
          <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the number of users (prices will change accordingly)" class="number-of-users-tooltip d-flex justify-content-center align-items-center ms-1 mt-3 rounded-circle fw-bold">&quest;</span>
        </div>
      </div>
      <?php
    endif;
    ?>
    <div class="pricing-plans-wrapper">
      <h4 class="text-center mb-5">Choose the pricing plans</h4>
      <div class="d-flex justify-content-center btn-group-pricing-plans btn-group-sm" role="group">
        <button type="button" data-pricing_monthly="monthly" class="btn btn-white border-end-0 btn-pricing-plans btn-pricing-plan-monthly active">Monthly payment</button>
        <button type="button" data-pricing_annual="annual" class="btn btn-white border-start-0 btn-pricing-plans btn-pricing-plan-annual">Annual payment</button>
      </div>
    </div>
    <div class="section-contact-us-form text-center">
      <h3>Contact us for the best possible price</h3>
      <a href="<?php echo esc_url( site_url( '/checkout/?add-to-cart=382&amp;quantity=1' ) ) ?>" title="<?php esc_attr_e( 'Contact us' ); ?>" class="btn btn-get-started"><?php esc_html_e( 'Get Started' ); ?></a>
    </div>
  </div>
</section>
