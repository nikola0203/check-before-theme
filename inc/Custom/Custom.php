<?php

namespace CheckBeforeTheme\Custom;

// use CheckBeforeTheme\Api\Customizer;
use CheckBeforeTheme\Plugins\Acf;
use CheckBeforeTheme\Core\Tags;

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

  public static function FooterCopy()
  {
    $footer_settings  = get_field( 'footer_settings', 'option' );
    $footer_copyright = $footer_settings['footer_copyright'];
    if ( !empty( $footer_copyright ) ) {
      echo wp_kses_post( $footer_copyright );
    }
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

  public static function GetRecentPosts()
  {
    $args = array(
      'posts_per_page' => 3,
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'orderby'        => 'post_date',
      'order'          => 'DESC'
    );

    $recent_posts = new \WP_Query( $args );

    if ( $recent_posts->have_posts() ) {
      ?>
      <div class="section-recent-posts my-10 my-lg-18">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md">
              <h2>Read more posts</h2>
            </div>
            <div class="col-12 col-md d-none d-md-flex align-items-md-end justify-content-md-end mb-7 mb-sm-0">
              <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="fw-bold link-view-all-posts">View all&nbsp;<i class="fas fa-chevron-right text-secondary ms-3"></i></a>
            </div>
          </div>
          <div class="row">
            <?php
            while ( $recent_posts->have_posts() ) {
              $recent_posts->the_post();
              ?>
              <div class="col-md-6 col-lg-4 mb-8 mb-lg-0">
                <div class="recent-posts-image mb-6">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'medium_large' ); ?>
                  </a>
                </div>
                <div class="entry-meta mb-4">
                  <span class="entry-meta-posted-on fw-bold pe-6 relative">
                    <?php Tags::posted_on(); ?>
                  </span>
                  <?php Tags::reading_time( get_the_ID() ); ?>
                </div>
                <a href="<?php the_permalink(); ?>"><h3 class="mb-6"><?php the_title(); ?></h3></a>
                <div class="recent-posts-excerpt mb-6">
                  <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="fw-bold link-view-all-posts">Read more <i class="fas fa-chevron-right text-secondary ms-3"></i></a>
              </div>
              <?php
            }
            wp_reset_postdata();
            ?>
          </div>
          <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-white w-100 justify-content-center d-md-none">View all&nbsp;<span class="icon-btn"><?php echo arrow_right('#559e33'); ?></span></a>
        </div>
      </div>
      <?php
    } else {
			get_template_part( 'template-parts/content', 'none' );
    }

  }
}