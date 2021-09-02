<?php
/* Template Name: Proizvodi */
?>

<?php get_header( 'custom' ); ?>

<section class="nasi-proizvodi">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="section-info">
               <div class="text-background trigger" style="background: url(/wp-content/uploads/2021/07/Dots_1.png); background-repeat: repeat; height: 100px;">
               
                  <?php $proizvodi_head = carbon_get_the_post_meta( 'crb_proizvodi_head' ); ?>
                  <h2><?php echo $proizvodi_head[0]['crb_proizvodi_head_naslov']; ?></h2>
                  <p><?php echo $proizvodi_head[0]['crb_proizvodi_head_opis']; ?></p>
               </div>


            </div>
         </div>
      </div>

      <div class="row trigger-box" id="lista-proizvoda">

         <?php
            $args = array(
                        'taxonomy'  => 'proizvodi_cat',
                        'orderby'   => 'name',
                        'order'     => 'ASC',
                        'parent'    => 0
                  );

            $cats = get_categories($args);
            foreach($cats as $cat) {
               $image_id = carbon_get_term_meta($cat->term_id, 'crb_tax_image');
               $image_atr = wp_get_attachment_image_src( $image_id, 'full' );
               $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
         ?>
         <div class="col-6 col-md-3 box-fade">
            <a href="<?php echo get_category_link( $cat->term_id ) ?>">
               <div class="box">
                  <img src="<?php echo $image_atr[0] ?>" alt="<?php echo $image_alt ?>">
               </div>
               <p><?php echo $cat->name; ?></p>
            </a>
         </div>
         <?php } ?>


      </div>



   </div>
</section>

<?php get_footer( 'custom' ); ?>