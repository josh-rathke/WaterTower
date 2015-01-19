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
 	<div class="large-9 columns single-program-content-container">
 		<?php while (have_posts()) : the_post(); ?>
 			
 			<?php
 			
 			/**
			 * Populate the $program_id variable to pass to
			 * any functions that require it to function.
			 */
			
			$program_id = $post->ID;
			$program_object = new programInfo($program_id);
			
			print_r($program_object);
			 
			?>
 			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action('foundationPress_program_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile;?>
		
		
		<?php echo do_shortcode('[vimeography id="2"]'); ?>
		
		<?php
		/**
		 * Program Info Section
		 * This is a section that displays general information
		 * about the program, such as how long the program lasts,
		 * if there is an outreach how long it is, and the 
		 * accreditation information.
		 */
		 ?>
		 
		 <div class="row program-info-container">
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

		echo '<ul class="small-block-grid-1 medium-block-grid-3 program-dates-container">';
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
							echo sprintf($program_info_string, 'Apps Due', date('m/d/y', strtotime($program_occurance['app_deadline'])));
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
		
		
		
		<?php 
		/**
		 * Video Section
		 * This is the section of each school page where we pull in
		 * any videos that may lend themselves to the school.
		 */
		
		
		
		?>
		
		
 	</div>
 	
 	<div class="large-3 columns">
 		
 	</div>
 	
 </div>
 
 
 
<?php
 
get_footer();
 
?>
