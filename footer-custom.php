 <!--footer-->
 <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-lg-3">
            <?php
            $logo = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $logo , 'logo' );
            ?>
               <img src="<?php echo $image[0]; ?>" class="footer-logo">

               <?php 
                  if (is_active_sidebar( 'footer-adresa' )) {
                     dynamic_sidebar( 'footer-adresa' );
                  }
               ?>

            </div>
            <div class="col-md-4 col-lg-3 d-flex flex-column align-items-md-center footer-nav">
               <h3>Stranice</h3>
               <?php
							wp_nav_menu(
								array(
									'theme_location'		=> 'footer-menu',
									'container'            	=> false,
								)
							);
						?>
            </div>
            <div class="col-md-4 col-lg-3 kontaktirajte-nas">
               <h3>Kontaktirajte nas</h3>
               <?php
                  $data = carbon_get_theme_option( 'crb_contact' );

                  foreach($data as $value){
                     
               ?>
                  <div class="d-flex align-items-baseline">
                     <div class="icon-box"><img src="<?php echo wp_get_attachment_url( $value['crb_contact_photo'] ); ?>"></div>
                     
                     <p><?php echo $value['crb_contact_text']; ?></p>
                  </div>
               <?php } ?>

            </div>
            <div class="col-md-8 col-lg-3">
               <h3>Prijavite se</h3>
               <form>
                  <?php
                     echo do_shortcode( '[mc4wp_form id="300"]' );
                  ?>
                </form>
            </div>
         </div>
      </div>


      <?php 
         if (is_active_sidebar( 'footer-copyright' )) {
            dynamic_sidebar( 'footer-copyright' );
         }
      ?>

   </footer>
   
   <?php wp_footer(); ?>
</body>
</html>