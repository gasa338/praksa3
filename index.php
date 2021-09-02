<?php
get_header( 'custom' );
?>
<?php
$terms = get_terms( array(
    'taxonomy' => 'proizvodi_cat',
    'hide_empty' => false,
) );
foreach ($terms as $key => $value) {
	echo $term_img = wp_get_attachment_url( get_post_thumbnail_id($value->term_id) );
	echo $value->term_id;
	echo '<br>';
}
echo $terms->name;
echo '<pre>';
print_r($terms);
echo '<pre>';
?>	
<?php
get_footer( 'custom' );
