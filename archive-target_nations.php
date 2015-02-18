<?php

/**
 *	Program Archive Page Template
 *	This page template displays all of the programs
 * 	we offer.
 * 
 *	Template Name: Target Nations
 */
 
//	Get Page ID from the slug
$page_id = get_id_by_slug('target-nations');

get_header();
?>

<div class="row">
	<div class="medium-9 columns">
		
		<h1><?php echo get_the_title($page_id); ?></h1>
		<?php echo apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
		
		<?php
		$the_query = new WP_Query( 'post_type=target_nations' );
		
		// Loop through Target Nations
		if ( $the_query->have_posts() ) {
			echo '<ul class="medium-block-grid-3">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li>';
				echo '<a href="#' . $post->post_name . '">';
					the_post_thumbnail('thumbnail-card');
					echo '<h4>' . get_the_title() . '</h4>';
				echo '</a>';
				echo '</li>';
			}
			echo '</ul>';
		} else {
			// no posts found
		}
		wp_reset_postdata();	
		?>
		
	</div>
	
	<div class="medium-3 columns">
		Some stuff
	</div>
</div>


<?php get_footer(); ?>
