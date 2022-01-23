<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

$features    = get_field( 'features_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-features">
  <div class="container">
    <?php
    if ( $features['title'] ) :
      ?>
      <h2 class="section-title text-center"><?php echo wp_kses( $features['title'], $allowedHtml ); ?></h2>
      <?php
    endif;
    if ( !empty( $features['features'] ) ) :
      ?>
      <div class="home-features-wrapper">
        <div class="row text-center">
          <?php
          foreach ( $features['features'] as $feature ) :
            $icon          = $feature['icon'];
            $feature_title = $feature['feature_title'];
            $description   = $feature['description'];
            ?>
            <div class="col-lg-4">
              <h3><?php esc_html_e( $feature_title ); ?></h3>
              <?php echo wp_kses_post( $description ); ?>
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