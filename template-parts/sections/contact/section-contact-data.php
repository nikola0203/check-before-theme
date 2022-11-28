<?php
/**
 * Template part for displaying contact data.
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$contact_data = get_field( 'contact_data' );
?>
<section class="section-contact-data">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex my-10 my-xl-0">
        <ul class="list-contact-data fw-bold d-flex flex-column justify-content-center mb-0">
          <?php
          if ( ! empty( $contact_data['sales'] ) && ! empty( $contact_data['sales_popup_link'] ) ) :
            ?>
            <li class="list-contact-data-sales mb-4 mb-lg-8"><?php esc_html_e( $contact_data['sales'] ); ?><br><a href="javascript:void(0)" type="button" data-bs-toggle="modal" data-bs-target="#contact-us-modal" class="text-decoration-underline"><?php esc_html_e( $contact_data['sales_popup_link'] ); ?></a></li>
            <?php
          endif;
          if ( ! empty( $contact_data['phone'] ) && ! empty( $contact_data['phone_link'] ) ) :
            ?>
            <li class="list-contact-data-phone mb-4 mb-lg-8"><?php esc_html_e( $contact_data['phone'] ); ?><br><a href="<?php echo esc_url( $contact_data['phone_link']['url'] ); ?>"><?php esc_html_e( $contact_data['phone_link']['title'] ); ?> <small class="fs-6">(<?php esc_html_e( str_replace( 'tel:', '', $contact_data['phone_link']['url'] ) ); ?>)</small></a></li>
            <?php
          endif;
          if ( ! empty( $contact_data['phone_international'] ) && ! empty( $contact_data['phone_link_international'] ) ) :
            ?>
            <li class="list-contact-data-phone mb-4 mb-lg-8"><?php esc_html_e( $contact_data['phone_international'] ); ?><br><a href="<?php echo esc_url( $contact_data['phone_link_international']['url'] ); ?>"><?php esc_html_e( $contact_data['phone_link_international']['title'] ); ?></a></li>
            <?php
          endif;
          if ( ! empty( $contact_data['email'] ) && ! empty( $contact_data['email_link'] ) ) :
            ?>
            <li class="list-contact-data-email mb-4 mb-lg-8"><?php esc_html_e( $contact_data['email'] ); ?><br><a href="<?php echo esc_url( $contact_data['email_link']['url'] ); ?>"><?php esc_html_e( $contact_data['email_link']['title'] ); ?></a></li>
            <?php
          endif;
          if ( ! empty( $contact_data['address'] ) && ! empty( $contact_data['address_text'] ) ) :
            ?>
            <li class="list-contact-data-address mb-0"><?php esc_html_e( $contact_data['address'] ); ?><br><?php esc_html_e( $contact_data['address_text'] ); ?></li>
            <?php
          endif;
          ?>
        </ul>
        <?php //echo wp_kses_post( $contact_data['content'] ); ?>
      </div>
      <?php
      if ( ! empty( $contact_data['image'] ) ) :
        ?>
        <div class="col-lg-6 my-8 my-xl-16">
          <?php Acf::acfImage( $contact_data['image'], 'medium_large' ); ?>
        </div>
        <?php
      endif;
      ?>
    </div>
  </div>
</section>
