<?php

/*
 * Program Single Template
 * 
 * This template is served up anytime a program page
 * is called to be displayed.
 */
 
 get_header();
 
 ?>
 
 
 <div class="row">
 	<div class="large-9 columns single-program-content-container entry">
 		<?php while (have_posts()) : the_post(); ?>
 			
 			<?php
 			
 			/**
			 * Populate the $program_id variable to pass to
			 * any functions that require it to function.
			 */
			
			$program_id = $post->ID;
			$program_object = new programInfo($program_id);
			 
			?>
 			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action('watertower_program_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile;?>
		
		
		
		
		<?php 
		/**
		 * Video Section
		 * This is the section of each school page where we pull in
		 * any videos that may lend themselves to the school.
		 */
		?>
		
		<div class="row">
			<div class="medium-12 columns">
			<?php echo do_shortcode('[vimeography id="1"]'); ?>
			</div>
		</div>
		
		
		
		
		
		<?php
		/**
		 * Program Info Section
		 * This is a section that displays general information
		 * about the program, such as how long the program lasts,
		 * if there is an outreach how long it is, and the 
		 * accreditation information.
		 */
		 ?>
		 
		 <div id="accreditation" data-magellan-destination="accreditation" class="row program-info-container">
		 	<h2 style="display: none;">Accreditation</h2>
		 	<div class="medium-3 columns program-info-duration-container">
		 		<div class="program-info-duration-number"><?php echo $program_object->academic_info['program_duration']; ?></div>
		 		<div class="program-info-duration-desc">Weeks Total</div>
		 	</div>
		 	<div class="medium-9 columns program-info-academic-container">
		 		<h5>Accreditation <i class="fa fa-graduation-cap"></i></h5>
		 		<?php echo $program_object->academic_info['accreditation']; ?>
		 	</div>
		 </div>
		
		
		
		<?php
		/**
		 *	Program Schedule Section
		 * 	This is the section where all of the dates for
		 * 	upcoming programs are displayed along with links to
		 * 	apply for each of the scheduled schools. 
		 */
		echo '<div data-magellan-destination="schedule">';
			echo '<ul id="schedule" class="small-block-grid-1 medium-block-grid-3 program-dates-container">';
				echo '<h2 style="display: none;">Schedule</h2>';
					if (!empty($program_object->schedule)) {
							
						// Dispaly available program instaces	
						foreach ($program_object->schedule as $program_occurance) {
							echo '<li><div class="program-date-info-container">';
							echo '<h4>' . $program_occurance['quarter'] . '</h4>';
								echo '<ul>';
								
									$program_info_string = '<li>%s:<span class="right">%s</span></li>';
									
									echo sprintf($program_info_string, 'Start Date', date('m/d/y', strtotime($program_occurance['start_date'])));
									echo sprintf($program_info_string, 'End Date', date('m/d/y', strtotime($program_occurance['end_date'])));
									echo sprintf($program_info_string, 'Total Cost', $program_occurance['total_cost']);
								echo '</ul>';
								
								echo '<ul class="program-app-due-dates-container">';
									echo '<h6>Apply By Dates<a href="#appdeadlineinfo"><i class="fa fa-info"></i></a></h6>';
									echo sprintf($program_info_string, 'African', date('m/d/y', strtotime($program_occurance['start_date'] . ' + 180 days')));
									echo sprintf($program_info_string, 'Canadian', date('m/d/y', strtotime($program_occurance['start_date'] . ' + 30 days')));
									echo sprintf($program_info_string, 'International', date('m/d/y', strtotime($program_occurance['start_date'] . ' + 120 days')));
									echo sprintf($program_info_string, 'Domestic', date('m/d/y', strtotime($program_occurance['start_date'] . ' + 14 days')));
								echo '</ul>';
									
								
								echo '<a href="#_" class="button">Apply Online</a>';
							echo '</div></li>';
							}
						
					} else {
						echo "Sorry there aren't any available dates at this time.";
					}
				echo '</ul>';
		
			// Display some of the academic and application requirements ?>
			<div class="row program-prereqs-container alert-box warning">
				<div class="small-3 medium-2 columns program-prereqs-icon-container">
					<i class="fa fa-check-square-o"></i>
				</div>
				<div class="small-9 medium-10 columns">
					<div class="program-pre-reqs">
						<h5>Pre-Requisites</h5>
						<?php echo $program_object->academic_info['recommended_prereqs']; ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		<div data-magellan-destination="<?php echo str_replace( ' ', '-', strtolower(rwmb_meta('lecture_phase_title'))); ?>" class="program-onbase-phase-info-container">
			
			<?php // OnBase phase description ?>
			<div class="program-onbase-phase-desc">
				<h2><?php echo rwmb_meta('lecture_phase_title'); ?></h2>
				<p><?php echo rwmb_meta('lecture_phase_desc'); ?></p>
			</div>
			
			
			<?php // On Base Phase Details ?>
			<div class="onbase-phase-detail-container">
															
				<div class="onbase-phase-details">
					<?php $n = 1; ?>
					<?php $activity_title = 'activity_title' . $n; ?>
					<?php $activity_hours = 'hours_per_week' . $n; ?>
					<?php $activity_desc = 'activity_description' . $n; ?>
										
					
					
					<?php 
					
					/*	Function find_total_hours()
					 *
					 *	This function finds the total amount of hours
					 *	per week for whichever particular program is
					 *	being displayed.
					 *
					 *	@input string $title
					 *	@output string $total_hours
					 */
					 
					function find_total_hours($title) {
						
						while (rwmb_meta($title) !== '') {
							$j = $j + 1;
							$title = 'activity_title' . $j;
							$activity_hours = 'hours_per_week' . $j;
							$total_hours = $total_hours + rwmb_meta($activity_hours);
							
						}
						return $total_hours;
					} 
					
					$total_hours = find_total_hours($activity_title); 
					
					?>
					
					
				
					<?php while (rwmb_meta($activity_title) !== '') { ?>
					<div class="onbase-phase-activity-details-container row">
						
						<div class="small-12 columns">
							<h4>
								<?php echo rwmb_meta($activity_title); ?>
								<span class="right show-for-medium-up onbase-phase-activity-hours"><?php echo rwmb_meta($activity_hours); ?> Hours/Week</span>
							</h4>
							<span class="show-for-small-only onbase-phase-activity-hours"><?php echo rwmb_meta($activity_hours); ?> Hours/Week</span>
						</div>
						
						<div class="small-12 medium-10 columns">
							<?php echo rwmb_meta($activity_desc); ?>
							
						</div>
					
					
						<div class="hide-for-small medium-2 columns onbase-phase-activity-detail-chart">
							<div class="chart-container">
								<i class="fa fa-caret-down"></i>
								<canvas id="activity-detail-<?php echo $n; ?>" class="chart" width="150" height="150"></canvas>
								
								<script>
									jQuery(document).ready(function($) {
									
									var onbaseOverview = [
									
									
									//LOOP THROUGH TOTAL CHART DATA
									<?php $i = 1; ?>
									<?php $activity_title = 'activity_title' . $i; ?>
									<?php $activity_hours = 'hours_per_week' . $i; ?>
									<?php $activity_desc = 'activity_description' . $i; ?>
									<?php $hours_before = 0; ?>
									<?php $hours_after = $total_hours - rwmb_meta($activity_hours); ?>
	
									<?php while (rwmb_meta($activity_title) !== '') { ?>
	
											<?php if ($n == $i) { ?>
												{value : <?php echo $hours_before; ?>, color : "#EFEFEF"},
												{value : <?php echo rwmb_meta($activity_hours); ?>, color : "#609FCE" },
												{value : <?php echo $hours_after; ?>, color : "#EFEFEF"},
											<?php } ?>
											
										<?php $hours_before = $hours_before + rwmb_meta($activity_hours); ?>
										
											
										<?php $i = $i + 1; ?>
										<?php $activity_title = 'activity_title' . $i; ?>
										<?php $activity_hours = 'hours_per_week' . $i; ?>
										<?php $activity_desc = 'activity_description' . $i; ?>
										<?php $hours_after = $total_hours - (rwmb_meta($activity_hours)+$hours_before); ?>
										
									<?php } ?>
									
										]
									var options = {
										segmentStrokeWidth : 2,
										percentageInnerCutout : 65,
										animation: false,
										responsive: true,
									}
									var ctx = document.getElementById("activity-detail-<?php echo $n; ?>").getContext("2d");
									var myNewChart = new Chart(ctx).Doughnut(onbaseOverview, options);
										
											
									});			
								</script>
								
							</div>
						</div>
					
					</div><!--/.onbase-phase-detail-container-->
					
					<?php $n = $n + 1; ?>
					<?php $activity_title = 'activity_title' . $n; ?>
					<?php $activity_hours = 'hours_per_week' . $n; ?>
					<?php $activity_desc = 'activity_description' . $n; ?>
					<?php } ?>
					
				</div>
			</div>
		</div>
		
		
		
		
		<div data-magellan-destination="related-posts">
			<div class="related-posts-header-container">
				<div class="related-posts-header-title">
					<div class="row">
						<div class="medium-9 columns">
							<h2>Related Posts</h2>
						</div>
						
						<div class="medium-3 columns">
							<a href="#_" class="related-posts-header-archive-link">
								View All Posts
							</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="medium-5 columns">
						<p>Want to know what it's like to go through <?php echo get_the_title($program_object->program_id); ?> from the perspective of students and staff who have done it before? Check out all of the posts related to it by clicking on the link to view the archive of related posts.</p>
					</div>
					
					<div class="medium-4 columns">
						<p class="related-posts-header-post-tags">
							<strong>Popular Tags:</strong>
							<?php 
								get_tags_related_to_tax_term_list('program_taxo', $program_object->program_slug, 20);
							?>
						</p>
					</div>
					
					<div class="medium-3 columns related-posts-header-post-num-container">
						<i class="fa fa-caret-down"></i>
						<div class="related-posts-header-post-num"><?php echo count(get_posts("post_type=post&posts_per_page=-1&program_taxo={$program_object->program_slug}")); ?></div>
						<div class="related-posts-header-post-num-desc">Related Posts</div>
					</div>
				</div>
			</div>
			
			
			<?php 
			
			$program_related_posts_query_args = array (
				'post_type'		=> 'post',
				'posts_per_page'	=> 2,
				'program_taxo'	=> $program_object->program_slug,
			);
				
				// The Query
				$the_query = new WP_Query( $program_related_posts_query_args );
				
				// The Loop
				if ( $the_query->have_posts() ) {
					echo '<div class="related-posts-container">';
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							
							echo '<div class="row related-post-container">';
								echo '<div class="medium-4 columns related-post-feat-img-container">';
									the_post_thumbnail('thumbnail-card');
								echo '</div>';
								
								echo '<div class="medium-8 columns related-post-content-container">';
									echo '<h5>' . get_the_title() . '</h5>';
									echo '<p>' . get_the_excerpt() . '</p>';
								echo '</div>';
							echo '</div>';
						}
						echo '</ul>';
					echo '</div>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			
			
			?>
		
		</div>
		
		
	<?php
			
	/**
	 *	Focus Tracks Section
	 *	This section displays all of our focus tracks,
	 *	and displays a modal box to reveal more information
	 *	about each track if/when selected.
	 */
	
	$focus_tracks_query_args = array (
		'post_type' 	=> 'focus_tracks',
		'program_taxo'	=> $program_object->program_slug,
	);
	 
	// Run Query for Focus Tracks Related to Program
	$focus_tracks = new WP_Query( $focus_tracks_query_args );
	
	// Loop through all Focus Tracks related to Program
	if ( $focus_tracks->have_posts() ) : ?>
		<div data-magellan-destination="focus-tracks" class="program-focus-tracks-container">
	 		<h2>Focus Tracks</h2>
	 		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In viverra elit id mauris bibendum hendrerit. Nulla metus enim, porttitor eget diam quis, sodales faucibus odio. Nunc eu tellus vitae metus suscipit sodales id nec ex. Vestibulum mollis eros nec odio interdum, non malesuada purus hendrerit.</p>
	 		<ul class="medium-block-grid-4">
	 			
			<?php while ( $focus_tracks->have_posts() ) : $focus_tracks->the_post(); ?>
				
				<li class="program-focus-track-container">
					<div class="program-focus-track-content">
						<a href="#" data-reveal-id="<?php echo $post->post_name; ?>">
				 			<div class="program-focus-track-icon">
				 				<img src="<?php echo wp_get_attachment_url(rwmb_meta('focus_track_icon')); ?>" />
				 			</div>
				 			<div class="program-focus-track-title"><h5><?php the_title(); ?></h5></div>
			 			</a>
		 			</div>
		 		</li>
		 		
		 		
				<div class="reveal-modal-bg" style="display: none"></div>
		 		<div id="<?php echo $post->post_name; ?>" class="reveal-modal small" data-reveal>
		 			<div class="reveal-modal-post-thumbnail" style="background: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full-width-banner')[0]; ?>) no-repeat center center;">
		 				<img class="reveal-modal-post-thumbnail-icon" src="<?php echo wp_get_attachment_url(rwmb_meta('focus_track_icon')); ?>" />
		 			</div>
					  
					 <div class="reveal-modal-post-content-container">
					 	<h3><?php the_title(); ?></h3>
					 	<?php the_content(); ?>
					 </div>
					 				 	
				 	<?php
				 	// Display Reveal Modal Footer 
				 	$quarters = rwmb_meta('focus_tracks_quarters', 'type=checkbox_list');
					
					if (!empty($quarters)) {
						echo '<footer>';
							echo '<i class="fa fa-check-square-o"></i>Available: ';
							foreach ($quarters as $quarter) {
								echo $quarter;
								echo end($quarters) !== $quarter ? ', ' : null;
							}
						echo '</footer>';
					}
				 	?>
				 	
				</div>
			<?php endwhile; ?>
			
			</ul>
		</div>
	<?php else : ?>
		// no posts found
	<?php endif; wp_reset_postdata(); ?>
		
		
		
	<?php
	
	/**
	 *	Leader Section
	 * 	This section displays all of the leaders of the
	 * 	particular program.
	 */									
									
	$terms = rwmb_meta('leaders', 'type=select&multiple=1');
	
	if (!empty($terms)) {
		echo '<div class="authors-container program-leaders-container">';
			echo '<h2>School Leaders</h2>';
			foreach ( $terms as $term ) {
				$author_object = get_post( $term, OBJECT);
				$leader_ids[] = $author_object->ID;
			}
			display_authors($program_id, $leader_ids);
		echo '</div>';
	}
		
	?>
		
		
		
	</div>
 	
 	<div class="large-3 columns">
 		<div class="magellan-container" data-magellan-expedition="fixed">
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
 	</div>
 	
 </div>
 
 
 
<?php
 
get_footer();
 
?>
