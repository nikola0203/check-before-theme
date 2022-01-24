<?php

namespace CheckBeforeTheme\Setup;

/**
 * Enqueue.
 */
class Enqueue
{
  /**
   * Register default hooks and actions for WordPress.
   *
   * @return
   */
	public function register() 
	{
		add_action( 'wp_head', array( $this, 'preconnect_google_font' ), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
  }

	public function preconnect_google_font()
	{
		$font_url = 'https://fonts.googleapis.com/css2?family=Lora:wght@500;700&family=Nunito:wght@400;500;700&display=swap';
		$html = '<link rel="preconnect" href="https://fonts.googleapis.com">';
		$html .= "\r\n";
    $html .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		$html .= "\r\n";
    $html .= '<link as="style" rel="preload" href="' . $font_url . '">';
    $html .= "\r\n";
    $html .= '<link rel="stylesheet" href="' . $font_url . '" media="print" onload="this.media=\'all\'">';
		$html .= "\r\n";
    $html .= '<noscript><link rel="stylesheet" href="' . $font_url . '"></noscript>';
		$html .= "\r\n";

		echo $html;
	}

  /**
	 * mix() function in enqueue_scripts() method provides the path to a versioned asset by Laravel Mix using querystring-based 
	 * cache-busting (This means, the file name won't change, but the md5. Look here for 
	 * more information: https://github.com/JeffreyWay/laravel-mix/issues/920 )
	 */
	public function enqueue_scripts() 
	{
		// Deregister the built-in version of jQuery from WordPress.
		if ( ! is_customize_preview() ) {
			wp_deregister_script( 'jquery' );
		}

		// CSS.
		wp_enqueue_style( 'main', mix( 'css/style.css' ), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'check_before_theme', get_stylesheet_uri(), array( 'main' ), '1.0.0' );

		// Admin options page CSS.
		wp_add_inline_style( 'main', getOptionCss( 'check_before_theme_admin_custom_css' ) );

		// JS.
		wp_enqueue_script( 'main', mix( 'js/app.js' ), array(), '1.0.0', true );

		// Activate browser-sync on development environment
		// if ( $_ENV['APP_ENV'] === 'development' ) :
		// 	wp_enqueue_script( '__bs_script__', $_ENV['WP_SITEURL'] . ':3000/browser-sync/browser-sync-client.js', array(), null, true );
		// endif;

		// Extra
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function admin_enqueue_scripts( $hook ){
		if ( 'theme-settings_page_check_before_theme-custom-css' == $hook ) {
			wp_enqueue_style( 'ace', mix( 'css/admin/check_before_theme-custom-css-page.css' ), array(), '1.0.0', 'all' );

			wp_enqueue_script( 'ace', mix( 'js/admin/ace/ace.js' ), array( 'jquery' ), '', true );
			wp_enqueue_script( 'ace-ext-language_tools', mix( 'js/admin/ace/ext-language_tools.js' ), array( 'jquery', 'ace' ), '', true );
			wp_enqueue_script( 'check_before_theme-custom-css-page', mix( 'js/admin/check_before_theme-custom-css-page.js' ), array( 'jquery' ), '1.0.0', true );
		}
	}
}