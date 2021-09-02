<?php get_header( 'custom' ); ?>


<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'proizvod' );

	endwhile; // End of the loop.
?>

<?php get_template_part( 'template-parts/content', 'cta_section' ); ?>

<?php get_footer( 'custom' );