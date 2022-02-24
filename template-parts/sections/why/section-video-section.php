<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

$video_section = get_field( 'video_section' );
$allowedHtml   = array(
  'br' => array(),
);
?>
<section class="section-video-section bg-light py-10 py-lg-18 mb-10 mb-lg-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <?php
        if ( !empty( $video_section['title'] ) ) :
          ?>
          <h2 class="hero-title"><?php echo wp_kses( $video_section['title'], $allowedHtml ); ?></h2>
          <?php
        endif;
        if ( !empty( $video_section['content'] ) ) :
          ?>
          <div class="hero-content mb-8">
            <?php echo wp_kses_post( $video_section['content'] ); ?>
          </div>
          <?php
        endif;
        if ( !empty( $video_section['video_url'] ) ) :
          ?>
          <div class="mb-12 mb-xl-0">
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
