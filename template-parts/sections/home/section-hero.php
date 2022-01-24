<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$hero        = get_field( 'hero_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-hero bg-light pt-md-5">
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
            <a href="<?php echo esc_url( $hero['button']['url'] ); ?>" target="<?php esc_attr_e( $hero['button']['target'] ); ?>" title="<?php esc_attr_e( $hero['button']['title'] ); ?>" class="btn"><?php esc_html_e( $hero['button']['title'] ); ?>&nbsp;<span class="icon-btn"><?php echo arrow_right(); ?></span></a>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-6">
        <?php
        if ( !empty( $hero['content'] ) ) :
          ?>
          <div class="hero-image">
            <?php Acf::acfImage( $hero['image'], 'medium_large', '' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
