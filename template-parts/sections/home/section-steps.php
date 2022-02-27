<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$steps       = get_field( 'steps_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-steps relative">
  <div class="container">
    <?php
    if ( !empty( $steps['steps'] ) ) :
      ?>
      <div class="home-steps-wrapper">
        <?php
        $count_steps = count( $steps['steps'] );
        foreach ( $steps['steps'] as $key => $step ) :
          $icon    = $step['icon'];
          $title   = $step['title'];
          $desc    = $step['description'];
          $image   = $step['image'];
          $classes = $key % 2 == 0 ? 'odd' : 'even';
          ?>
          <div class="row justify-content-between">
            <div class="col-lg-6 d-flex flex-column justify-content-center mb-8 mb-lg-0 <?php echo $key % 2 == 0 ? 'order-lg-1' : 'order-lg-2'; ?>">
              <div class="home-step-icon-wrapper mb-6">
                <?php Acf::acfImage( $icon, 'medium_large', '' ); ?> 
              </div>
              <h2 class="mb-6"><?php esc_html_e( $title ); ?></h2>
              <div class="home-step-content">
                <?php echo wp_kses_post( $desc ); ?>
              </div>
            </div>
            <div class="col-lg-5 mb-8 mb-lg-0 <?php echo $key % 2 == 0 ? 'order-lg-2' : 'order-lg-1'; ?>">
              <div class="home-step-image-wrapper">
                <?php Acf::acfImage( $image, 'medium_large', 'd-block mx-auto' ); ?>
              </div>
            </div>
          </div>
          <?php
        endforeach;
        ?>
      </div>
      <?php
    endif;
    ?>
  </div>
  <div class="home-steps-triangle absolute w-100 bg-white"></div>
</section>
