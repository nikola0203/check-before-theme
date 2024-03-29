<?php
/**
 * Template part for displaying page content in content-pricing.php
 *
 */

$hero                 = get_field( 'hero_section' );
$contact_form_section = get_field( 'contact_form_section' );
$allowedHtml          = array(
  'br' => array(),
);
?>
<section class="section-pricing-hero bg-light py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <?php
    if ( ! empty( $hero['title'] ) ) :
      ?>
      <h1 class="hero-title text-center"><?php echo wp_kses( $hero['title'], $allowedHtml ); ?></h1>
      <?php
    endif;
    if ( ! empty( $hero['subtitle'] ) ) :
      ?>
      <div class="d-flex justify-content-center flex-column flex-md-row align-items-center mb-10">
        <h4 class="text-center mb-md-0"><?php echo wp_kses( $hero['subtitle'], $allowedHtml ); ?></h4>
        <div class="d-flex justify-content-center align-items-start">
          <select name="number-of-users" id="number-of-users" class="border ms-5">
            <option value="1" selected="selected">1-15</option>
            <option value="16">16-50</option>
            <option value="51">51-99</option>
            <option value="100">100+</option>
          </select>
          <!-- <input type="number" min="1" value="15" name="number-of-users" id="number-of-users" class="border ms-5"> -->
          <span data-bs-toggle="tooltip" data-bs-placement="top" title="Select the number of users (prices will change accordingly)" class="number-of-users-tooltip d-flex justify-content-center align-items-center ms-1 mt-3 rounded-circle fw-bold">&quest;</span>
        </div>
      </div>
      <?php
    endif;
    ?>
    <div class="pricing-plans-wrapper">
      <?php
      if ( $hero['text_before_buttons'] ) :
        ?>
        <h4 class="text-center mb-5"><?php esc_html_e( $hero['text_before_buttons'] ); ?></h4>
        <?php
      endif;
      ?>
      <div class="d-flex justify-content-center btn-group-pricing-plans btn-group-sm" role="group">
        <button type="button" data-pricing_monthly="monthly" class="btn btn-white border-end-0 btn-pricing-plans btn-pricing-plan-monthly">Monthly payment</button>
        <button type="button" data-pricing_annual="annual" class="btn btn-white border-start-0 btn-pricing-plans btn-pricing-plan-annual active">Annual payment</button>
      </div>
    </div>
    <div class="section-contact-us-form">
      <?php
      if ( $contact_form_section['section_title'] ) :
        ?>
        <h3 class="text-center"><?php esc_html_e( $contact_form_section['section_title'] ); ?></h3>
        <?php
      endif;
      if ( $contact_form_section['contact_form_shortcode'] ) :
        ?>
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <?php echo do_shortcode( $contact_form_section['contact_form_shortcode'] ); ?>
          </div>
        </div>
        <?php
      endif;
      ?>
    </div>
  </div>
</section>
