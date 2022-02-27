<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-content-icon my-8 mt-lg-18 mb-lg-12">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-8 order-2 order-lg-1">
        <?php
        if ( !empty( $args['title'] ) ) :
          ?>
          <h2 class="hero-title"><?php echo wp_kses( $args['title'], $allowedHtml ); ?></h2>
          <?php
        endif;
        if ( !empty( $args['content'] ) ) :
          ?>
          <div class="hero-content">
            <?php echo wp_kses_post( $args['content'] ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-1 order-1 order-lg-2">
        <?php
        if ( !empty( $args['icon'] ) ) :
          ?>
          <div class="content-icon-img mb-6 mb-lg-8">
            <?php Acf::acfImage( $args['icon'], 'medium_large', '' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
