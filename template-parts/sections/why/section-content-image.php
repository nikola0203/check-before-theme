<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$allowedHtml   = array(
  'br' => array(),
);
?>
<section class="section-content-image py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-4<?php echo ( $args['image_position'] ) ? ' order-2' : ' order-1'; ?>">
        <?php
        if ( !empty( $args['image'] ) ) :
          ?>
          <div class="">
            <?php Acf::acfImage( $args['image'], 'medium_large', '' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-6<?php echo ( $args['image_position'] ) ? ' order-1' : ' order-2'; ?>">
        <?php
        if ( !empty( $args['content'] ) ) :
          ?>
          <div class="">
            <?php echo wp_kses_post( $args['content'] ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
