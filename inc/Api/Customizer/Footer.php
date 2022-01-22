<?php
/**
 * Theme Customizer - Footer.
 *
 * @package checkbeforetheme
 */

namespace CheckBeforeTheme\Api\Customizer;

use WP_Customize_Control;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Customize_Media_Control;

use CheckBeforeTheme\Api\Customizer;

/**
 * Customizer class
 */
class Footer
{
	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @param object $wp_customize
	 * @return
	 */
	public function register( $wp_customize ) 
	{
		$wp_customize->add_section(
			'fivestarclean_footer_section',
			array(
				'title'       => __( 'Footer', 'checkbeforetheme' ),
				'description' => __( 'Customize the Footer' ),
				'priority'    => 162
			)
		); 

		$wp_customize->add_setting(
			'fivestarclean_footer_logo',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_footer_top_background_color',
			array(
				'default'   => '#ffffff',
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_facebook_url',
			array(
				'capability'        => 'edit_theme_options',
				// 'sanitize_callback' => array( $this, 'fivestarclean_sanitize_url' ),
				'transport'         => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_linkedin_url',
			array(
				'capability'        => 'edit_theme_options',
				// 'sanitize_callback' => array( $this, 'fivestarclean_sanitize_url' ),
				'transport'         => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_instagram_url',
			array(
				'capability'        => 'edit_theme_options',
				// 'sanitize_callback' => array( $this, 'fivestarclean_sanitize_url' ),
				'transport'         => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_twitter_url',
			array(
				'capability'        => 'edit_theme_options',
				// 'sanitize_callback' => array( $this, 'fivestarclean_sanitize_url' ),
				'transport'         => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_footer_copy_text',
			array(
				'default'   => __( 'Proudly powered by checkbeforetheme', 'checkbeforetheme' ),
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'fivestarclean_footer_logo',
				array(
					'label'    => __( 'Upload Footer Logo', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_footer_section',
					'settings' => 'fivestarclean_footer_logo',
					'width' => 250,
					'height' => 250,
					'flex-width' => true,
				)
			)
		);

		$wp_customize->add_control(
			'fivestarclean_facebook_url',
			array(
				'type'     => 'url',
				'section'  => 'fivestarclean_footer_section',   // Add a default or your own section
				'settings' => 'fivestarclean_facebook_url',
				'label'    => __( 'Facebook URL' ),
				// 'description' => __( 'This is a custom url input.' ),
				'input_attrs' => array(
					'placeholder' => __( 'https://www.facebook.com' ),
				),
			)
		);

		$wp_customize->add_control(
			'fivestarclean_linkedin_url',
			array(
				'type' => 'url',
				'section' => 'fivestarclean_footer_section', // Add a default or your own section
				'label' => __( 'LinkedIn URL' ),
				// 'description' => __( 'This is a custom url input.' ),
				'input_attrs' => array(
					'placeholder' => __( 'https://www.linkedin.com' ),
				),
			)
		);

		$wp_customize->add_control(
			'fivestarclean_instagram_url',
			array(
				'type' => 'url',
				'section' => 'fivestarclean_footer_section', // Add a default or your own section
				'label' => __( 'Instagram URL' ),
				// 'description' => __( 'This is a custom url input.' ),
				'input_attrs' => array(
					'placeholder' => __( 'https://www.instagram.com' ),
				),
			)
		);

		$wp_customize->add_control(
			'fivestarclean_twitter_url',
			array(
				'type' => 'url',
				'section' => 'fivestarclean_footer_section', // Add a default or your own section
				'label' => __( 'Twitter URL' ),
				// 'description' => __( 'This is a custom url input.' ),
				'input_attrs' => array(
					'placeholder' => __( 'https://twitter.com' ),
				),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fivestarclean_footer_top_background_color',
				array(
					'label'    => __( 'Background Top', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_footer_section',
					'settings' => 'fivestarclean_footer_top_background_color',
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'fivestarclean_footer_copy_text',
				array(
					'label'    => __( 'Copyright Text', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_footer_section',
					'settings' => 'fivestarclean_footer_copy_text',
				)
			)
		);

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_footer_top_background_color',
				array(
					'selector'         => '#checkbeforetheme-footer-control',
					'render_callback'  => array( $this, 'outputCss' ),
					'fallback_refresh' => true
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_footer_copy_text',
				array(
					'selector'         => '#checkbeforetheme-footer-copy-control',
					'render_callback'  => array( $this, 'outputText' ),
					'fallback_refresh' => true
				)
			);
		}
	}

	/**
	 * Generate inline CSS for customizer async reload.
	 *
	 * @return CSS
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-footer', 'background-color', 'fivestarclean_footer_top_background_color' );
		echo '</style>';
	}

	/**
	 * Generate inline text for customizer async reload.
	 *
	 * @return
	 */
	public function outputText()
	{
		echo Customizer::text( 'fivestarclean_footer_copy_text' );
	}

	/**
	 * Performs esc_url() for database usage.
	 *
	 * @return url
	 */
	public function fivestarclean_sanitize_url()
	{
		return esc_url_raw( $url );
	}
}