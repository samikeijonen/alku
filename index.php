<?php
/**
 * Index file.
 *
 * @package Alku
 */

get_header();
?>
<main>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			// Displays post content.
			the_content();
		endwhile;
	endif;
	?>
</main>
<?php
get_footer();
