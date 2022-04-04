<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

$hero_background = get_field( 'hero_background' );
$hero_content    = get_field( 'hero_content' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header entry-header-single-post relative pt-10 pt-lg-18 pb-10 pb-lg-22 mb-12 bg-cover">
    <style>
      .entry-header {
        background-image: url(<?php echo esc_url( $hero_background['sizes']['medium_large'] ); ?>);
      }
      @media (min-width:768px) {
        .entry-header {
          background-image: url(<?php echo esc_url( $hero_background['sizes']['large'] ); ?>);
        }
      }
      @media (min-width:992px) {
        .entry-header {
          background-image: url(<?php echo esc_url( $hero_background['url'] ); ?>);
        }
      }
    </style>
    <div class="container relative">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <?php the_title( '<h1 class="entry-title text-white text-center mb-6">', '</h1>' ); ?>
          <?php
          if ( $hero_content ) :
            ?>
            <div class="entry-header-content mb-8 text-white text-center">
              <?php echo wp_kses_post( $hero_content ); ?>
            </div>
            <?php
          endif;
          ?>
          <div class="entry-posted-on text-center text-white fw-bold px-0">
            <i class="fas fa-calendar-alt me-1"></i>
            <?php CheckBeforeTheme\Core\Tags::posted_on(); ?>
          </div>
        </div>
      </div>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div><!-- .entry-content -->
    
  <?php
  CheckBeforeTheme\Custom\Custom::GetRecentPosts();

  if ( get_field( 'show_global_cta_section' ) ) :
    $cta_section = get_field( 'cta_section', 'option' );
  else :
    $cta_section = get_field( 'cta_section' );
  endif;

  if ( ! empty( $cta_section ) ) :
    get_template_part( 'template-parts/sections/general/section', 'cta', $cta_section );
  endif;
  ?>
</article><!-- #post-<?php the_ID(); ?> -->
