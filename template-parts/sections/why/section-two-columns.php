<?php
/**
 * Template part for displaying page content in content-why.php
 *
 */

use CheckBeforeTheme\Plugins\Acf;

$two_columns = get_field( 'two_columns' );
$allowedHtml = array(
  'br' => array(),
);
?>
<section class="section-why-two-columns my-10 my-lg-18">
  <div class="container">
    <div class="row justify-content-center">
      <?php
      if ( !empty( $two_columns['two_columns_blocks'] ) ) :
        foreach ( $two_columns['two_columns_blocks'] as $column ) :
          ?>
          <div class="col-lg-6">
            <?php
            if ( !empty( $column['image'] ) ) :
              ?>
              <div class="why-two-columns-image mb-8">
                <?php Acf::acfImage( $column['image'], 'medium_large', 'd-block mx-auto' ); ?>
              </div>
              <?php
            endif;
            if ( !empty( $column['title'] ) ) :
              ?>
              <h3 class="mb-6"><?php echo wp_kses( $column['title'], $allowedHtml ); ?></h3>
              <?php
            endif;
            if ( !empty( $column['content'] ) ) :
              ?>
              <div class="">
                <?php echo wp_kses_post( $column['content'] ); ?>
              </div>
              <?php
            endif;
            ?>
          </div>
          <?php
        endforeach;
        ?>
        <?php
      endif;
      ?>
    </div>
  </div>
</section>
