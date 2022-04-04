
<?php
/**
 * Template part for displaying page content in homea.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package check_before_theme
 */

?>

<div class="col-md-6 col-lg-4 mb-8">
  <div class="recent-posts-image mb-6">
    <a href="<?php the_permalink(); ?>">
      <?php
      if ( get_the_post_thumbnail() ) :
        the_post_thumbnail( 'medium_large' );
      else :
        echo wc_placeholder_img( 'medium_large' );
      endif;
      ?>
    </a>
  </div>
  <div class="entry-meta mb-4">
    <span class="entry-meta-posted-on fw-bold pe-6 relative">
      <?php CheckBeforeTheme\Core\Tags::posted_on(); ?>
    </span>
    <?php CheckBeforeTheme\Core\Tags::reading_time( get_the_ID() ); ?>
  </div>
  <a href="<?php the_permalink(); ?>"><h3 class="mb-6"><?php the_title(); ?></h3></a>
  <div class="recent-posts-excerpt mb-6">
    <?php the_excerpt(); ?>
  </div>
  <a href="<?php the_permalink(); ?>" class="fw-bold link-view-all-posts">Read more <i class="fas fa-chevron-right text-secondary ms-3"></i></a>
</div>
