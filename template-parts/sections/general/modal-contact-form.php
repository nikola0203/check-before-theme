<?php
/**
 * Template part for displaying page cta banner.
 *
 */

$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-contact-us-modal container">
  <p class="fw-bold mb-6 fs-5 text-end"><a href="javascript:void(0)" type="button" class="btn-contact-us-modal text-uppercase" data-bs-toggle="modal" data-bs-target="#contact-us-modal">Contact us for the best possible price</a></p>
  <div class="modal fade" id="contact-us-modal" tabindex="-1" aria-labelledby="contact-us-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header p-lg-6">
          <h3 class="modal-title" id="contact-us-modal-label">Contact us for the best possible price</h3>
          <a type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close" href="javascript:void(0)"><i class="fas fa-times"></i></a>
        </div>
        <?php
        if ( get_field( 'contact_form_shortcode' ) ) :
          ?>
          <div class="modal-body p-lg-12">
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <?php echo do_shortcode( get_field( 'contact_form_shortcode' ) ); ?>
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
