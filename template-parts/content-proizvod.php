<section class="proizvod">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="image-box trigger">
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'thumbnail' ) ); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="info">
                    <h2 class="trigger"><?php echo the_title(); ?></h2>
                    <p class="trigger"><?php echo the_content(); ?></p>
                    <?php
                    $pdf_section = carbon_get_the_post_meta( 'crb_pdf_sekcija' );;

                    foreach ($pdf_section as $pdf) {
                    ?>

                    <button class="btn trigger">
                        <a href="<?php echo wp_get_attachment_url( $pdf['crb_docs_pdf'] ); ?>">
                            <img src="/wp-content/uploads/2021/07/pdf-orange-icon.svg" class="orange-icon">
                            <img src="/wp-content/uploads/2021/07/pdf-icon.svg" class="white-icon">
                            <?php echo $pdf['crb_docs_pdf_ime']; ?>
                        </a>
                    </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</section>