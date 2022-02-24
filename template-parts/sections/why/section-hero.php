<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

$hero        = get_field( 'hero_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-why-hero bg-light py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-7 text-center">
        <?php
        if ( !empty( $hero['title'] ) ) :
          ?>
          <h1 class="hero-title mb-6"><?php echo wp_kses( $hero['title'], $allowedHtml ); ?></h1>
          <?php
        endif;
        if ( !empty( $hero['content'] ) ) :
          ?>
          <div class="hero-content mb-8">
            <?php echo wp_kses_post( $hero['content'] ); ?>
          </div>
          <?php
        endif;
        if ( !empty( $hero['button'] ) ) :
          ?>
          <div class="hero-button">
            <a href="<?php echo esc_url( $hero['button']['url'] ); ?>" target="<?php esc_attr_e( $hero['button']['target'] ); ?>" title="<?php esc_attr_e( $hero['button']['title'] ); ?>" class="btn"><?php esc_html_e( $hero['button']['title'] ); ?>&nbsp;<span class="icon-btn"><?php echo arrow_right(); ?></span></a>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
