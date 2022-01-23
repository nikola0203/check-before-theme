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
<section class="section-home-cta">
  <div class="container">
    <div class="cta-content-wrapper">
      <div class="row">
        <div class="col-lg-6">
          <?php
          if ( $cta['title'] ) :
            ?>
            <h2 class="cta-section-title"><?php esc_html_e( $cta['title'] ); ?></h2>
            <?php
          endif;
          if ( $cta['description'] ) :
            ?>
            <div class="cta-section-title"><?php echo wp_kses_post( $cta['description'] ); ?></div>
            <?php
          endif;
          ?>
        </div>
        <div class="col-lg-6">
          <?php
          if ( !empty( $cta['button'] ) ) :
            ?>
            <a href="<?php echo esc_url( $cta['button']['url'] ); ?>" target="<?php esc_attr_e( $cta['button']['target'] ); ?>" title="<?php esc_attr_e( $cta['button']['title'] ); ?>"><?php esc_html_e( $cta['button']['title'] ); ?>&nbsp;<i class="fas fa-chevron-right"></i></a>
            <?php
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>