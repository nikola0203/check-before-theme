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
<section class="section-content-image my-8 my-lg-12">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-4<?php echo ( $args['image_position'] ) ? ' order-md-2' : ' order-md-1'; ?>">
        <?php
        if ( !empty( $args['image'] ) ) :
          ?>
          <div class="content-image-image">
            <?php Acf::acfImage( $args['image'], 'medium_large', 'd-block object-fit-contain mx-auto mb-8 mb-lg-0' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-6 content-image-content d-flex flex-column justify-content-center<?php echo ( $args['image_position'] ) ? ' order-md-1' : ' order-md-2'; ?>">
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
