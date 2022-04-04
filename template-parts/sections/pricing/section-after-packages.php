<?php
/**
 * Template part for displaying page content in content-pricing.php
 *
 */

$after_packages = get_field( 'after_packages' );
$allowedHtml    = array(
  'br' => array(),
);
if ( ! empty( $after_packages ) ) :
  ?>
  <section class="section-after-packages my-10 my-lg-18">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <?php echo wp_kses_post( $after_packages['content_after_packages'] ); ?>
        </div>
      </div>
    </div>
  </section>
  <?php
endif;
