<?php
/**
 * Template part for displaying page content in faq content.
 *
 */

$faq_section = get_field( 'faq_section' );
$allowedHtml = array(
  'strong' => array(),
  'span'   => array(),
);
if ( !empty( $faq_section['show_section'] ) ) :
  ?>
  <section class="faq my-10 my-lg-18">
    <div class="container">
      <?php
      if ( !empty( $faq_section['title'] ) ) :
        ?>
        <h2 class="section-title text-center mb-8 mb-lg-18"><?php echo wp_kses( $faq_section['title'], $allowedHtml ); ?></h2>
        <?php
      endif;
      if ( !empty( $faq_section['faqs'] ) ) :
        ?>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="faq__wrapper mb-4 mb-lg-6">
              <?php
              foreach ( $faq_section['faqs'] as $key => $faq ) :
                the_row();
                $question = $faq['faq_title'];
                $answer   = $faq['faq_answer'];
                if ( $question ) :
                  ?>
                  <h3 class="faq__wrapper-question d-flex justify-content-between align-items-center mb-0 border-top <?php esc_attr_e( ( 1 == get_row_index() ) ? ' border-top' : '' ); ?>"><?php esc_html_e( $question ); ?>&nbsp;<i class="fas fa-plus ps-3"></i></h3>
                  <?php
                endif;
                if ( $answer ) : 
                  ?>
                  <div class="faq__wrapper-answer px-lg-5"><?php echo wp_kses_post( $answer ); ?></div>
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
          <a href="<?php echo esc_url( $faq_section['button']['url'] ); ?>" target="<?php esc_attr_e( $faq_section['button']['target'] ); ?>" title="<?php esc_attr_e( $faq_section['button']['title'] ); ?>" class="btn btn-white"><?php esc_html_e( $faq_section['button']['title'] ); ?>&nbsp;<span class="icon-btn"><?php echo arrow_right('#559e33'); ?></span></a>
        </div>
        <?php
      endif;
      ?>
    </div>
  </section>
  <?php
endif;
