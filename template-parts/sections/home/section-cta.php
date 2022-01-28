<?php
/**
 * Template part for displaying page content in content-cta.php
 *
 */

$cta         = get_field( 'cta_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-cta my-10 my-lg-18">
  <div class="container">
    <div class="cta-content-wrapper d-flex align-items-center w-100 justify-content-center bg-secondary rounded py-6 py-lg-0 px-3 px-lg-18">
      <div class="row justify-content-center align-items-center w-100">
        <div class="col-lg-6 d-flex flex-column justify-content-lg-end mb-8 mb-lg-0">
          <?php
          if ( $cta['title'] ) :
            ?>
            <h2 class="cta-section-title text-white mb-6"><?php esc_html_e( $cta['title'] ); ?></h2>
            <?php
          endif;
          if ( $cta['description'] ) :
            ?>
            <div class="cta-section-desc text-white"><?php echo wp_kses_post( $cta['description'] ); ?></div>
            <?php
          endif;
          ?>
        </div>
        <div class="col-lg-6 d-flex justify-content-lg-end">
          <?php
          if ( !empty( $cta['button'] ) ) :
            ?>
            <a href="<?php echo esc_url( $cta['button']['url'] ); ?>" target="<?php esc_attr_e( $cta['button']['target'] ); ?>" title="<?php esc_attr_e( $cta['button']['title'] ); ?>" class="btn btn-white"><?php esc_html_e( $cta['button']['title'] ); ?>&nbsp;<i class="fas fa-chevron-right"></i></a>
            <?php
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>