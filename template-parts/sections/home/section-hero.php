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
<section class="section-home-hero bg-light pt-10 pt-lg-18 mb-10 mb-lg-18">
  <?php
  if ( $hero['hero_slider'] ) :
    ?>
    <div class="swiper slider-home-hero">
      <div class="swiper-wrapper">
        <?php
        foreach ( $hero['hero_slider'] as $slider_key => $hero_slider ) :
          ?>
          <div class="swiper-slide">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 d-flex justify-content-center flex-column">
                  <?php
                  if ( !empty( $hero_slider['title'] ) ) :
                    ?>
                    <h1 class="hero-title"><?php echo wp_kses( $hero_slider['title'], $allowedHtml ); ?></h1>
                    <?php
                  endif;
                  if ( !empty( $hero_slider['content'] ) ) :
                    ?>
                    <div class="hero-content mb-8 mb-lg-12">
                      <?php echo wp_kses_post( $hero_slider['content'] ); ?>
                    </div>
                    <?php
                  endif;
                  if ( !empty( $hero_slider['button'] ) ) :
                    ?>
                    <div class="hero-button mb-12 mb-xl-0">
                      <a href="<?php echo esc_url( $hero_slider['button']['url'] ); ?>" target="<?php esc_attr_e( $hero_slider['button']['target'] ); ?>" title="<?php esc_attr_e( $hero_slider['button']['title'] ); ?>" class="btn"><?php esc_html_e( $hero_slider['button']['title'] ); ?>&nbsp;<span class="icon-btn"><?php echo arrow_right(); ?></span></a>
                    </div>
                    <?php
                  endif;
                  ?>
                </div>
                <div class="col-lg-6">
                  <?php
                  if ( !empty( $hero_slider['content'] ) ) :
                    ?>
                    <div class="hero-image">
                      <?php Acf::acfImage( $hero_slider['image'], 'medium_large', 'd-block mx-auto' ); ?>
                    </div>
                    <?php
                  endif;
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php
        endforeach;
        ?>
      </div>
    </div>
    <?php
  endif;
  ?>
</section>
