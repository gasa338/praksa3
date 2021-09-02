<?php
get_header( 'custom' );
?>
<?php
$terms = get_terms( array(
    'taxonomy' => 'proizvodi_cat',
    'hide_empty' => false,
) );
echo $terms->name;
echo '<pre>';
print_r($terms->name);
echo '<pre>';
?>	
<?php
get_footer( 'custom' );
