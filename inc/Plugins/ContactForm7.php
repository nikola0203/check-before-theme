<?php
/**
 * Contact Form 7
 *
 * @link https://wordpress.org/plugins/contact-form-7/
 *
 * @package check_before_theme
 */

namespace CheckBeforeTheme\Plugins;

class ContactForm7
{
	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @return
	 */
	public function register()
	{
    add_filter( 'wpcf7_default_template', array( $this, 'change_default_contact7_form_content' ), 10, 2 );
    add_filter( 'wpcf7_contact_form_default_pack', array( $this, 'change_default_contact7_form_title' ) );
	}

  public function change_default_contact7_form_content( $template, $prop ) {
    if ( 'form' == $prop ) {
      return implode(
        '',
        array(
          '<div class="row">',
            '<div class="col">',
              '[text* your-name placeholder "Name"]',
            '</div>',
            '<div class="col">',
              '[email* your-email placeholder "Email"]',
            '</div>',
            '<div class="col">',
              '[tel* your-phone placeholder "Phone"]',
            '</div>',
          '</div>',
          '<div class="row">',
            '<div class="col">',
              '[textarea* your-message placeholder "Message"]',
            '</div>',
          '</div>',
          '<div class="row text-center">',
            '<div class="col">',
              '[submit class:btn "Submit"]',
            '</div>',
          '</div>'
        )
      );
    } else {
      return $template;
    } 
  }
  
  public function change_default_contact7_form_title( $template ) {
    $template->set_title( 'Contact us' );
    return $template;
  }
}
