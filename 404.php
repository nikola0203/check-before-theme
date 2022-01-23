<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package check_before_theme
 */

get_header();
?>
<div id="primary" class="content-area">

  <main id="main" class="site-main" role="main">

    <div class="container error-404 not-found mt-4 mb-4 pt-4 pb-4 mt-lg-5 mb-lg-5 txt-center">

      <h1 class="page-title font-w-regular text-center mb-0"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'check_before_theme' ); ?></h1>

      <svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m208 352h-8v-40a8 8 0 0 0 -14.146-5.122l-40 48a8 8 0 0 0 6.146 13.122h32v24a8 8 0 0 0 16 0v-24h8a8 8 0 0 0 0-16zm-24 0h-14.92l14.92-17.9z"/><path d="m360 352h-8v-40a8 8 0 0 0 -14.146-5.122l-40 48a8 8 0 0 0 6.146 13.122h32v24a8 8 0 0 0 16 0v-24h8a8 8 0 0 0 0-16zm-24 0h-14.92l14.92-17.9z"/><path d="m280 304h-48a8 8 0 0 0 -8 8v80a8 8 0 0 0 8 8h48a8 8 0 0 0 8-8v-80a8 8 0 0 0 -8-8zm-8 80h-32v-64h32z"/><path d="m476 72h-440a28.031 28.031 0 0 0 -28 28v312a28.031 28.031 0 0 0 28 28h440a28.031 28.031 0 0 0 28-28v-312a28.031 28.031 0 0 0 -28-28zm12 340a12.01 12.01 0 0 1 -12 12h-440a12.01 12.01 0 0 1 -12-12v-276h464zm0-292h-464v-20a12.01 12.01 0 0 1 12-12h440a12.01 12.01 0 0 1 12 12z"/><path d="m40 112h8a8 8 0 0 0 0-16h-8a8 8 0 0 0 0 16z"/><path d="m72 112h8a8 8 0 0 0 0-16h-8a8 8 0 0 0 0 16z"/><path d="m104 112h8a8 8 0 0 0 0-16h-8a8 8 0 0 0 0 16z"/><path d="m256 280a64 64 0 1 0 -64-64 64.072 64.072 0 0 0 64 64zm0-112a48 48 0 1 1 -48 48 48.054 48.054 0 0 1 48-48z"/><path d="m230.343 241.657a8 8 0 0 0 11.314 0l14.343-14.343 14.343 14.343a8 8 0 1 0 11.314-11.314l-14.343-14.343 14.343-14.343a8 8 0 0 0 -11.314-11.314l-14.343 14.343-14.343-14.343a8 8 0 0 0 -11.314 11.314l14.343 14.343-14.343 14.343a8 8 0 0 0 0 11.314z"/></g></svg>

    </div><!-- .error-404 -->

  </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();