<?php
/**
 * Template part for displaying page cta banner.
 *
 */

$sectionData = get_field( 'contact_form_popup' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-contact-us-modal container">
  <?php
  if ( ! empty( $sectionData['link_text'] ) ) :
    ?>
    <p class="fw-bold mb-6 fs-5 text-center text-md-end"><a href="javascript:void(0)" type="button" class="btn-contact-us-modal text-uppercase" data-bs-toggle="modal" data-bs-target="#contact-us-modal"><?php esc_html_e( $sectionData['link_text'] ); ?></a></p>
    <?php
  endif;
  ?>
  <div class="modal fade" id="contact-us-modal" tabindex="-1" aria-labelledby="contact-us-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-lg-6">
          <?php
          if ( ! empty( $sectionData['popup_title'] ) ) :
            ?>
            <h3 class="modal-title" id="contact-us-modal-label"><?php esc_html_e( $sectionData['popup_title'] ); ?></h3>
            <?php
          endif;
          ?>
          <a type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close" href="javascript:void(0)"><i class="fas fa-times"></i></a>
        </div>
        <?php
        if ( ! empty( $sectionData['contact_form_shortcode'] ) ) :
          ?>
          <div class="modal-body p-lg-12">
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <?php echo do_shortcode( $sectionData['contact_form_shortcode'] ); ?>
              </div>
            </div>
          </div>
          <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
