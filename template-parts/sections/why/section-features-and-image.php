<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$features    = get_field( 'features_and_image' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-why-features-and-image my-10 my-lg-18">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-5">
        <?php
        if ( !empty( $features['features'] ) ) :
          $count_features = count( $features['features'] );
          foreach ( $features['features'] as $key => $feature ) :
            ?>
            <div class="row <?php echo ( $key != array_key_last( $features['features'] ) ) ? 'mb-6 mb-lg-12' : 'mb-6 mb-lg-0'; ?>">
              <div class="col-12 col-md-2 mb-5 mb-md-0">
                <?php
                if ( !empty( $feature['icon'] ) ) :
                  ?>
                  <div class="">
                    <?php Acf::acfImage( $feature['icon'], 'medium_large', '' ); ?>
                  </div>
                  <?php
                endif;
                ?>
              </div>
              <div class="col-12 col-md-10">
                <?php
                if ( !empty( $feature['title'] ) ) :
                  ?>
                  <h4 class="mb-6"><?php echo wp_kses( $feature['title'], $allowedHtml ); ?></h4>
                  <?php
                endif;
                if ( !empty( $feature['content'] ) ) :
                  ?>
                  <div class="">
                    <?php echo wp_kses_post( $feature['content'] ); ?>
                  </div>
                  <?php
                endif;
                ?>
              </div>
            </div>
            <?php
          endforeach;
          ?>
          <?php
        endif;
        ?>
      </div>
      <div class="col-lg-6">
        <?php
        if ( !empty( $features['image'] ) ) :
          ?>
          <div class="features-and-image-img-wrapper">
            <?php Acf::acfImage( $features['image'], 'medium_large', 'object-fit-contain' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
