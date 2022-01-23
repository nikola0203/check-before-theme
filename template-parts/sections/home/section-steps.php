<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

$steps       = get_field( 'steps_section' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-home-steps">
  <div class="container">
    <?php
    if ( !empty( $steps['steps'] ) ) :
      ?>
      <div class="home-steps-wrapper">
        <?php
        foreach ( $steps['steps'] as $key => $step ) :
          $icon    = $step['icon'];
          $title   = $step['title'];
          $desc    = $step['description'];
          $image   = $step['image'];
          $classes = $key % 2 == 0 ? 'odd' : 'even';
          ?>
          <div class="row">
            <div class="col-lg-8">
              <h3><?php esc_html_e( $title ); ?></h3>
              <?php echo wp_kses_post( $desc ); ?>
            </div>
            <div class="col-lg-4">
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
</section>
