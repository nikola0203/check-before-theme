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
<section class="section-why-hero bg-light py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <?php
        if ( !empty( $features['features'] ) ) :
          foreach ( $features['features'] as $feature ) :
            ?>
            <div class="">
              <?php
              if ( !empty( $feature['icon'] ) ) :
                ?>
                <div class="">
                  <?php Acf::acfImage( $feature['icon'], 'medium_large', '' ); ?>
                </div>
                <?php
              endif;
              if ( !empty( $feature['title'] ) ) :
                ?>
                <h3 class=""><?php echo wp_kses( $feature['title'], $allowedHtml ); ?></h3>
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
          <div class="">
            <?php Acf::acfImage( $features['image'], 'medium_large', '' ); ?>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
