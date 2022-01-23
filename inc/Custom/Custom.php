<?php

namespace CheckBeforeTheme\Custom;

// use CheckBeforeTheme\Api\Customizer;
use CheckBeforeTheme\Plugins\Acf;

/**
 * Use it to write your custom functions.
 */
class Custom
{
  /**
   * Display footer logo.
   */
  public static function FooterLogo()
  {
    $footer_settings = get_field( 'footer_settings', 'option' );
    $footer_logo     = $footer_settings['footer_logo'];
    if ( !empty( $footer_logo ) ) {
      ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ) ); ?>">
        <?php Acf::acfImage( $footer_logo, 'medium_large', 'footer-logo' ); ?>
      </a>
      <?php
    }
  }

  public static function FooterSocialIcons()
  {
    $footer_settings = get_field( 'footer_settings', 'option' );
    $facebook        = $footer_settings['facebook_url'];
    $linkedin        = $footer_settings['linkedin_url'];
    $instagram       = $footer_settings['instagram_url'];
    $twitter         = $footer_settings['twitter_url'];
    $list = '';
    
    $list .= '<ul class="footer-social-icons d-flex mb-0 ps-0 pt-3 pt-lg-4">';
    if ( !empty( $facebook ) ) {
      $list .= '<li><a href="' . $facebook . '" class="txt-white"><i class="fab fa-facebook-square"></i></a></li>';
    }
    if ( !empty( $linkedin ) ) {
      $list .= '<li><a href="' . $linkedin . '" class="txt-white"><i class="fab fa-linkedin"></i></a></li>';
    }
    if ( !empty( $instagram ) ) {
      $list .= '<li><a href="' . $instagram . '" class="txt-white"><i class="fab fa-instagram"></i></a></li>';
    }
    if ( !empty( $twitter ) ) {
      $list .= '<li><a href="' . $twitter . '" class="txt-white"><i class="fab fa-twitter-square"></i></a></li>';
    }
    $list .= '</ul>';

    echo wp_kses_post( $list );
  }

  /**
	 * Custom get excerpt
	 *
	 * @param int $limit
	 * @param string $source
	 * @return void
	 */
	public static function getExcerpt( $limit, $source = null )
  {
		$excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
		$excerpt = preg_replace( " (\[.*?\])",'',$excerpt );
		$excerpt = strip_shortcodes( $excerpt );
		$excerpt = strip_tags( $excerpt);
		$excerpt = substr( $excerpt, 0, $limit );
		$excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt ) );
		// $excerpt = $excerpt . '... <a href="' . get_permalink( get_the_ID() ) . '">' . esc_html( 'read more', 'check_before_theme' ) . '</a>';
		$excerpt = $excerpt . '...';
		return $excerpt;
	}
}