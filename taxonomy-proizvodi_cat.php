<?php get_header('custom'); ?>

<section class="nasi-proizvodi">
   <div class="container">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <div class="section-info">
               <div class="text-background trigger" style="background: url(/wp-content/uploads/2021/07/Dots_1.png); background-repeat: repeat; height: 100px;">
                  <h2><?php
                  $taxonomy = get_queried_object();
                  echo  $taxonomy->name;
                  ?></h2>
                  <p> <?php echo  $taxonomy->description; ?> </p>
               </div>


            </div>
         </div>
      </div>

      <div class="row trigger-box" id="lista-proizvoda">
<?php
   $terms = get_terms( [
      'taxonomy'     => get_queried_object()->taxonomy,
      'parent'       => get_queried_object_id(),
   ] );
   

   if ( have_posts() && empty($terms)) :
      while ( have_posts() ) :
         the_post();

         get_template_part( 'template-parts/content', 'category' ); 

      endwhile;
      else:
      
         get_template_part( 'template-parts/content', 'subcategory', array('terms' => $terms ) ); 

      endif;
    ?>

    </div>
   </div>
</section>

<?php get_template_part( 'template-parts/content', 'cta_section' ); ?>

<?php
get_footer("custom");
