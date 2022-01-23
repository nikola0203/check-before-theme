<?php
/**
 * Template part for displaying page content in content-home.php
 *
 */

$faq_section = get_field( 'faq_section' );
$allowedHtml = array(
  'strong' => array(),
  'span'   => array(),
);
?>
<section class="faq section-padding-y">
  <div class="container">
    <?php
    if ( $faq_section['title'] ) :
      ?>
      <h2 class="section-title text-center"><?php echo wp_kses( $faq_section['title'], $allowedHtml ); ?></h2>
      <?php
    endif;
    if ( !empty( $faq_section['faqs'] ) ) :
      ?>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="faq__wrapper">
            <?php
            foreach ( $faq_section['faqs'] as $key => $faq ) :
              the_row();
              $question = $faq['faq_title'];
              $answer   = $faq['faq_answer'];
              if ( $question ) :
                ?>
                <h3 class="faq__wrapper-question d-flex justify-content-between align-items-center mb-0 py-3 px-sm-2 border-bottom border-2 border-primary<?php esc_attr_e( ( 1 == get_row_index() ) ? ' border-top' : '' ); ?>"><?php esc_html_e( $question ); ?>&nbsp;<i class="fas fa-chevron-down"></i></h3>
                <?php
              endif;
              if ( $answer ) :
                ?>
                <div class="faq__wrapper-answer"><?php echo wp_kses_post( $answer ); ?></div>
                <?php
              endif;
            endforeach;
            ?>
          </div>
        </div>
      </div>
      <?php
    endif;
    if ( !empty( $faq_section['button'] ) ) :
      ?>
      <div class="hero-button text-center">
        <a href="<?php echo esc_url( $faq_section['button']['url'] ); ?>" target="<?php esc_attr_e( $faq_section['button']['target'] ); ?>" title="<?php esc_attr_e( $faq_section['button']['title'] ); ?>"><?php esc_html_e( $faq_section['button']['title'] ); ?>&nbsp;<i class="fas fa-chevron-right"></i></a>
      </div>
      <?php
    endif;
    ?>
  </div>
</section>
