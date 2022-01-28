<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$features    = get_field( 'features_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-features my-10 my-lg-18">
  <div class="container">
    <?php
    if ( $features['title'] ) :
      ?>
      <h2 class="section-title text-center mb-8 mb-lg-12"><?php echo wp_kses( $features['title'], $allowedHtml ); ?></h2>
      <?php
    endif;
    if ( !empty( $features['features'] ) ) :
      ?>
      <div class="home-features-wrapper">
        <div class="row text-center">
          <?php
          $c_items = count( $features['features'] );
          $c = 0;
          foreach ( $features['features'] as $feature ) :
            $c++;
            $icon          = $feature['icon'];
            $feature_title = $feature['feature_title'];
            $description   = $feature['description'];
            ?>
            <div class="col-lg-4 <?php echo ( $c != $c_items ) ? 'mb-6 mb-lg-0' : ''; ?>">
              <div class="home-feture-img mb-6 mb-lg-8">
                <?php Acf::acfImage( $icon, 'medium_large', '' ); ?>
              </div>
              <h3 class="mb-5 mb-lg-6"><?php esc_html_e( $feature_title ); ?></h3>
              <div class="home-feture-content">
                <?php echo wp_kses_post( $description ); ?>
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
  </div>
</section>