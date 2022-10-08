<?php

namespace CheckBeforeTheme\Core;

/**
 * Tags.
 */
class Tags
{
  /**
	 * register default hooks and actions for WordPress
	 * @return
	 */
  public static function posted_on()
  {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			// esc_attr( get_the_modified_date( DATE_W3C ) ),
			// esc_html( get_the_modified_date() )
		);

		// $posted_on = sprintf(
		// 	/* translators: %s: post date. */
		// 	esc_html_x( 'Posted on %s', 'post date', 'check_before_theme' ),
		// 	'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		// );

		echo '<span class="posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  }

  public static function posted_by()
  {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'check_before_theme' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  }

  /**
   * Post ID
   *
   * @param int $post_id
   * @return void
   */
  public static function reading_time( $post_id )
  {
    $content     = get_post_field( 'post_content', $post_id );
    $word_count  = str_word_count( strip_tags( $content ) );
    $readingtime = ceil( $word_count / 200 );
    
    if ( $readingtime == 1 ) {
      $timer = "min read";
    } else {
      $timer = "min read";
    }

    $totalreadingtime = $readingtime . $timer;

		echo '<span class="fw-bold post-read-time"> ' . $totalreadingtime . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  }
  
  public static function entry_footer()
  {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', 'check_before_theme' ) );
      if ( $categories_list ) {
        /* translators: 1: list of categories. */
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'check_before_theme' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'check_before_theme' ) );
      if ( $tags_list ) {
        /* translators: 1: list of tags. */
        printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'check_before_theme' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
            __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'check_before_theme' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );
      echo '</span>';
    }

    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Edit <span class="screen-reader-text">%s</span>', 'check_before_theme' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        wp_kses_post( get_the_title() )
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
}