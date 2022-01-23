<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

$hero        = get_field( 'hero_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-hero pt-md-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <?php
        if ( !empty( $hero['title'] ) ) :
          ?>
          <h1 class="hero-title"><?php echo wp_kses( $hero['title'], $allowedHtml ); ?></h1>
          <?php
        endif;
        if ( !empty( $hero['content'] ) ) :
          ?>
          <div class="hero-content">
            <?php echo wp_kses_post( $hero['content'] ); ?>
          </div>
          <?php
        endif;
        if ( !empty( $hero['button'] ) ) :
          ?>
          <div class="hero-button">
            <a href="<?php echo esc_url( $hero['button']['url'] ); ?>" target="<?php esc_attr_e( $hero['button']['target'] ); ?>" title="<?php esc_attr_e( $hero['button']['title'] ); ?>"><?php esc_html_e( $hero['button']['title'] ); ?>&nbsp;<i class="fas fa-chevron-right"></i></a>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>
</section>
