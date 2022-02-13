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
      <div class="d-flex justify-content-center align-items-center mb-10">
        <h3 class="text-center mb-0"><?php echo wp_kses( $hero['subtitle'], $allowedHtml ); ?></h3>
        <input type="number" value="0" name="number-of-users" id="number-of-users" class="ms-5">
      </div>
      <?php
    endif;
    ?>
    <div class="d-flex justify-content-center align-items-center mb-5">
      <h3 class="text-center mb-0">Choose the pricing plans</h3>
    </div>
    <div class="d-flex justify-content-center btn-group-pricing-plans btn-group-sm" role="group">
      <button type="button" data-pricing_monthly="monthly" class="btn btn-pricing-plans btn-pricing-plan-monthly active">Monthly payment</button>
      <button type="button" data-pricing_annual="annual" class="btn btn-pricing-plans btn-pricing-plan-annual">Annual payment</button>
    </div>
  </div>
</section>
