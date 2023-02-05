<?php
/**
 * Template part for displaying page tabs in the content-features-list.php.
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$features_list = get_field( 'features_list' );

if ( have_rows( 'features_list' ) ) :
  ?>
  <nav class="nav-features-list container mb-12 mb-lg-18 d-none d-lg-block">
    <div class="row">
      <?php
      while ( have_rows( 'features_list' ) ) :
        the_row();
        $nav_tab = get_sub_field( 'nav_tab' );
        ?>
        <div class="col-4">
          <a href="#section-tab-content-<?php echo get_row_index(); ?>">
            <div class="feature-item d-flex flex-column justify-content-center align-items-center p-6 p-lg-8 border rounded bg-white">
              <?php
              if ( ! empty( $nav_tab['image'] ) ) :
                ?>
                <div class="feature-item-image mb-6">
                  <?php Acf::acfImage( $nav_tab['image'], 'medium', 'object-fit-contain' ); ?>
                </div>
                <?php
              endif;
              if ( ! empty( $nav_tab['name'] ) ) :
                ?>
                <h3 class="mb-6"><?php esc_html_e( $nav_tab['name'] ); ?></h3>
                <i class="icon-arrow-down"><?php echo arrow_right( '#559e33' ); ?></i>
                <?php
              endif;
              ?>
            </div>
          </a>
        </div>
        <?php
      endwhile;
      ?>
    </div>
  </nav>

  <nav class="nav-features-list container mb-12 mb-lg-18 d-lg-none">
    <div class="swiper slider-nav-features-list">
      <div class="swiper-wrapper">
        <?php
        while ( have_rows( 'features_list' ) ) :
          the_row();
          $nav_tab = get_sub_field( 'nav_tab' );
          ?>
          <div class="swiper-slide">
            <a href="#section-tab-content-<?php echo get_row_index(); ?>">
              <div class="feature-item d-flex flex-column justify-content-center align-items-center p-6 p-lg-8 border rounded bg-white">
                <?php
                if ( ! empty( $nav_tab['image'] ) ) :
                  ?>
                  <div class="feature-item-image mb-6">
                    <?php Acf::acfImage( $nav_tab['image'], 'medium', 'object-fit-contain' ); ?>
                  </div>
                  <?php
                endif;
                if ( ! empty( $nav_tab['name'] ) ) :
                  ?>
                  <h3 class="mb-6"><?php esc_html_e( $nav_tab['name'] ); ?></h3>
                  <i class="icon-arrow-down"><?php echo arrow_right( '#559e33' ); ?></i>
                  <?php
                endif;
                ?>
              </div>
            </a>
          </div>
          <?php
        endwhile;
        ?>
      </div>
    </div>
  </nav>

  <?php
  while ( have_rows( 'features_list' ) ) :
    the_row();
    $tab_content = get_sub_field( 'tab_content' );
    $title       = $tab_content['title'];
    $tabs        = $tab_content['tabs'];
    $desc        = $tab_content['description'];
    ?>
    <section id="section-tab-content-<?php echo get_row_index(); ?>" class="section-tab-content container mb-12 mb-lg-18">
      <div class="tab-content-separator text-center relative mb-8"><span class="tab-content-separator-icon relative d-inline-flex align-items-center justify-content-center fw-bold rounded-circle border border-2 border-secondary"><?php echo get_row_index(); ?></span></div>
      <?php
      if ( ! empty( $title ) ) :
        ?>
        <h2 class="mb-6 mb-lg-12 text-center"><?php echo ( $title ); ?></h2>
        <?php
      endif;
      if ( ! empty( $tabs ) ) :
        ?>
        <div class="row mb-6 mb-lg-12">
          <div class="col-lg-6 d-flex align-items-center mb-10 ps-lg-10 mb-lg-0 order-lg-2">
            <div class="tab-content tab-content-image w-100 h-100" id="v-pills-tabContent-<?php echo sanitize_title_with_dashes( $title ); ?>">
              <?php
              if ( ! empty( $tabs ) ) :
                foreach ( $tabs as $key => $tab ) :
                  $image      = $tab['image'];
                  $unique_id = sanitize_title_with_dashes( $title ) . '-' . $key;
                  ?>
                  <div class="tab-pane fade <?php echo ( 0 == $key ) ? 'show active' : ''; ?>" id="v-pills-<?php echo $unique_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $unique_id; ?>-tab">
                    <?php Acf::acfImage( $image, 'medium_large'); ?>
                  </div>
                  <?php
                endforeach;
              endif;
              ?>
            </div>
          </div>
          <div class="col-lg-6 order-lg-1 d-none d-lg-block">
            <div id="v-pills-tab-<?php echo sanitize_title_with_dashes( $title ); ?>-desktop" role="tablist" aria-orientation="vertical">
              <?php
              if ( ! empty( $tabs ) ) :
                foreach ( $tabs as $key => $tab ) :
                  $name      = $tab['name'];
                  $desc      = $tab['description'];
                  $unique_id = sanitize_title_with_dashes( $title ) . '-' . $key;
                  ?>
                  <a class="nav-link nav-link-<?php echo $key; ?> nav-link-<?php echo $unique_id; ?> relative p-6 mb-6 p-lg-8 border rounded <?php echo ( 0 == $key ) ? 'active' : ''; ?>" id="v-pills-<?php echo $unique_id; ?>-tab-desktop" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $unique_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $unique_id; ?>" aria-selected="true" data-tabnumber="<?php echo $key; ?>">
                    <h5 class="mb-5"><?php echo $name; ?></h5>
                    <p class="mb-0"><?php echo wp_kses_post( $desc ); ?></p>
                    <div class="progress absolute w-100">
                      <div class="progress-bar progress-bar-<?php echo $key; ?> progress-bar-<?php echo $unique_id; ?>" role="progressbar" aria-valuenow="1" aria-valuemin="0" data-valuenow="1" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                  </a>
                  <?php
                endforeach;
              endif;
              ?>
            </div>
          </div>
          <div class="col-lg-6 order-lg-1 d-lg-none">
            <div id="v-pills-tab-<?php echo sanitize_title_with_dashes( $title ); ?>" role="tablist" aria-orientation="vertical">
              <div class="swiper slider-features-tab">
                <div class="swiper-wrapper">
                  <?php
                  if ( ! empty( $tabs ) ) :
                    foreach ( $tabs as $key => $tab ) :
                      $name      = $tab['name'];
                      $desc      = $tab['description'];
                      $unique_id = sanitize_title_with_dashes( $title ) . '-' . $key;
                      ?>
                      <div class="swiper-slide">
                        <a class="nav-link nav-link-<?php echo $unique_id; ?> relative p-6 mb-6 p-lg-8 border rounded <?php echo ( 0 == $key ) ? 'active' : ''; ?>" id="v-pills-<?php echo $unique_id; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $unique_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $unique_id; ?>" aria-selected="true" data-tabnumber="<?php echo $key; ?>">
                          <h5 class="mb-5"><?php echo $name; ?></h5>
                          <p class="mb-0"><?php echo wp_kses_post( $desc ); ?></p>
                          <div class="progress absolute w-100">
                            <div class="progress-bar progress-bar-<?php echo $unique_id; ?>" role="progressbar" aria-valuenow="1" aria-valuemin="0" data-valuenow="1" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        </a>
                      </div>
                      <?php
                    endforeach;
                  endif;
                  ?>
                </div>
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
          </div>
        </div>
        <?php
      endif;
      if ( ! empty( $desc ) ) :
        ?>
        <h4 class="text-center"><?php echo wp_kses_post( $desc ); ?></h4>
        <?php
      endif;
      ?>
    </section>
    <?php
  endwhile;
endif;
