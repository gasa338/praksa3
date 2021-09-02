<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package praksa2
 */

get_header('custom');
?>
<?php
$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
echo '<pre>';
print_r($term);
echo '</pre>';
?>
<?php
get_footer("custom");
