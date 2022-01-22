<?php
/**
 * Theme Customizer - Header.
 *
 * @package checkbeforetheme
 */

namespace CheckBeforeTheme\Api\Customizer;

use WP_Customize_Color_Control;
use CheckBeforeTheme\Api\Customizer;

/**
 * Customizer class.
 */
class Header
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
			'fivestarclean_header_section',
			array(
				'title'       => __( 'Header', 'checkbeforetheme' ),
				'description' => __( 'Customize the Header' ),
				'priority'    => 35
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_header_background_color',
			array(
				'default'   => '#ffffff',
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_header_text_color',
			array(
				'default'   => '#333333',
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_setting(
			'fivestarclean_header_link_color',
			array(
				'default'   => '#004888',
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fivestarclean_header_background_color',
				array(
					'label'    => __( 'Header Background Color', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_header_section',
					'settings' => 'fivestarclean_header_background_color',
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fivestarclean_header_text_color',
				array(
					'label'    => __( 'Header Text Color', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_header_section',
					'settings' => 'fivestarclean_header_text_color',
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fivestarclean_header_link_color',
				array(
					'label' => __( 'Header Link Color', 'checkbeforetheme' ),
					'section' => 'fivestarclean_header_section',
					'settings' => 'fivestarclean_header_link_color',
				)
			)
		);

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => function() {
						bloginfo( 'name' );
					},
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => function() {
						bloginfo( 'description' );
					},
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_header_background_color',
				array(
					'selector'         => '#checkbeforetheme-header-control',
					'render_callback'  => array( $this, 'outputCss' ),
					'fallback_refresh' => true
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_header_text_color',
				array(
					'selector'         => '#checkbeforetheme-header-control',
					'render_callback'  => array( $this, 'outputCss' ),
					'fallback_refresh' => true
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_header_link_color',
				array(
					'selector'         => '#checkbeforetheme-header-control',
					'render_callback'  => array( $this, 'outputCss' ),
					'fallback_refresh' => true
				)
			);
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 *
	 * @return CSS
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-header', 'background-color', 'fivestarclean_header_background_color' );
			echo Customizer::css( '.site-header', 'color', 'fivestarclean_header_text_color' );
			echo Customizer::css( '.site-header a', 'color', 'fivestarclean_header_link_color' );
		echo '</style>';
	}
}