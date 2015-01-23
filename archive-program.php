<?php

/**
 *	Program Archive Page Template
 *	This page template displays all of the programs
 * 	we offer. 
 */
get_header(); 

// Get all program classifications
$program_classifications = get_terms('program_classification'); ?>

<div class="row">
	
	<div class="medium-9 columns archive-program-content-container entry">	
		<?php
		
		// Loop through all of the program classifications
		foreach ($program_classifications as $program_classification) {
			
			
		
			$archive_program_query_args = array(
				'posts_per_page'			=>  -1 ,
				'post_type' 	 			=>	'program',
				'program_classification' 	=>  $program_classification->slug,
			); ?>
		   
		   <div id="<?php echo $program_classification->slug; ?>" data-magellan-destination="<?php echo $program_classification->slug; ?>" class="program-archive-programs-container row">
		   <?php $archive_program_query = new WP_Query( $archive_program_query_args ); ?>
		   <?php if ( $archive_program_query->have_posts() ) : ?>
		   		<h2 class="program-archive-title"><?php echo $program_classification->name; ?></h2>
			   <?php while ($archive_program_query->have_posts()) : $archive_program_query->the_post(); ?>
				   
				   <div class="row program-archive-program-container">
				   	<div class="medium-4 columns program-archive-program-image">
				   		<?php the_post_thumbnail('thumbnail-card'); ?>
				   	</div>
				   	<div class="medium-8 columns program-archive-program-content">
				   		<h5><?php the_title(); ?></h5>
				   		<?php the_excerpt(); ?>
				   	</div>
				   </div>
				   
			   <?php endwhile; ?>
		   <?php endif; ?>
		   </div>
		   <?php wp_reset_postdata(); ?>
		   
		<?php } ?>
	</div>
	
	<div class="medium-3 columns">
		<div class="magellan-container" data-magellan-expedition="fixed">
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
	</div>

</div>
   
<?php get_footer(); ?>
