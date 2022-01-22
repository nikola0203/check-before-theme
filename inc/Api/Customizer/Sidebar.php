<?php
/**
 * Theme Customizer - Sidebar.
 *
 * @package checkbeforetheme
 */

namespace CheckBeforeTheme\Api\Customizer;

use WP_Customize_Color_Control;
use CheckBeforeTheme\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar
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
			'fivestarclean_sidebar_section',
			array(
				'title'       => __( 'Sidebar', 'checkbeforetheme' ),
				'description' => __( 'Customize the Sidebar' ),
				'priority'    => 161
			)
		); 

		$wp_customize->add_setting(
			'fivestarclean_sidebar_background_color',
			array(
				'default'   => '#ffffff',
				'transport' => 'postMessage', // or refresh if you want the entire page to reload.
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'fivestarclean_sidebar_background_color',
				array(
					'label'    => __( 'Background Color', 'checkbeforetheme' ),
					'section'  => 'fivestarclean_sidebar_section',
					'settings' => 'fivestarclean_sidebar_background_color',
				)
			)
		);

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'fivestarclean_sidebar_background_color',
					array(
					'selector'         => '#checkbeforetheme-sidebar-control',
					'render_callback'  => array( $this, 'output' ),
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
	public function output()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '#sidebar', 'background-color', 'fivestarclean_sidebar_background_color' );
		echo '</style>';
	}
}