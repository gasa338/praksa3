<?php
$terms = $args['terms'];

foreach ($terms as $term) {
$image_id = carbon_get_term_meta($term->term_id, 'crb_tax_image');
$image_atr = wp_get_attachment_image_src( $image_id, 'full' );
$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
?>
<div class="col-6 col-md-3 box-fade">
    <a href="<?php echo get_category_link( $term->term_id ); ?>">
        <div class="box">
            <img src="<?php echo $image_atr[0]; ?>">
        </div>
        <p><?php echo $term->name; ?></p>
    </a>
</div>
<?php
}