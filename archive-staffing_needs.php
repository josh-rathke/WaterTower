<?ph;

/**
 *	Staffing Needs Archive
 * 	Template Name: Staffing Needs
 * 
 *	This is the template for the staffing needs page.
 */

$page_id = get_id_by_slug('staffing-needs');
get_header();
?>

<div class="row staffing-needs-container">
	<div class="large-8 columns">
		
	<h1><?php echo get_the_title($page_id); ?></h1>
	<?php echo apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
	
	<?php
	
	$staff_needs = new WP_Query( 'post_type=staffing_needs' );
	
	// Loop through all Staffing Needs
	if ( $staff_needs->have_posts() ) {
		echo '<ul class="small-block-grid-2 medium-block-grid-3 staffing-needs-preview-container">';
		while ( $staff_needs->have_posts() ) {
			$staff_needs->the_post();
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
	
	
	
	
	<?php
	
	/**
	 *	What To Expect Section
	 * 	This section is the what to expect section that
	 * 	includes a seasoned veteran of YWAM Montana's writing
	 * 	about all of the great things to expect while on staff
	 * 	with YWAM Montana
	 */
	 
	 	if (rwmb_meta('enable_what_to_expect', '', $page_id)) {
	 		echo '<h2>' . rwmb_meta('what_to_expect_title', '', $page_id) . '</h2>';
			echo '<p>' . rwmb_meta('what_to_expect', '', $page_id) . '</p>';
	 	}
	 
	 ?>
	
	
	
	
	<?php
	
	$staff_needs = new WP_Query( 'post_type=staffing_needs' );
	
	// Loop through all Staffing Needs
	if ( $staff_needs->have_posts() ) {
		while ( $staff_needs->have_posts() ) {
			$staff_needs->the_post();
				echo '<div id="' . $post->post_name . '" class="staffing-needs-info-container">';
				

					echo '<h3>' . get_the_title() . '</h3>';
					the_content();
					
					echo '<div class="staffing-needs-additional-info">';
						if (rwmb_meta('helpful_skills')) {
							echo '<h6><i class="fa fa-cubes"></i> Helpful Skills</h6>';
					 		echo '<p class="staffing-needs-helpful-skills">' . rwmb_meta('helpful_skills') . '</p>';
						}
					 	
						if (rwmb_meta('requirements')) {
					 		echo '<h6><i class="fa fa-check-circle-o"></i> Requirements</h6>';
					 		echo '<p class="staffing-needs-requirements">' . rwmb_meta('requirements') . '</p>';
						}
					echo '</div>';
					
				echo '</div>';
		}
	} else {
		// no posts found
	}
	wp_reset_postdata();
	
	?>
	
	
	
	</div>
	
	<div class="large-4 columns">
		sidebar
	</div>
</div>

<?php get_footer() ?>
