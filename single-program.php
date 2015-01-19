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
 	<div class="medium-9 columns single-program-content-container">
 		<?php while (have_posts()) : the_post(); ?>
 			
 			<?php
 			
 			/**
			 * Populate the $program_id variable to pass to
			 * any functions that require it to function.
			 */
			
			$program_id = $post->ID;
			print_r($program_id);
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
		
		
		
		<?php
		/**
		 *	Program Schedule Section
		 * 	This is the section where all of the dates for
		 * 	upcoming programs are displayed along with links to
		 * 	apply for each of the scheduled schools. 
		 */

		echo '<ul class="medium-block-grid-3 program-dates-container">';
			if (!empty($program_object->schedule)) {
				foreach ($program_object->schedule as $program_occurance) {
					echo '<li><div class="program-date-info-container">';
					echo '<h3>' . $program_occurance['quarter'] . '</h3>';
						echo '<ul>';
							echo '<li>' . $program_occurance['start_date'] . '</li>';
							echo '<li>' . $program_occurance['end_date'] . '</li>';
							echo '<li>' . $program_occurance['total_cost'] . '</li>';
							echo '<li>' . $program_occurance['app_deadline'] . '</li>';
						echo '</ul>';
						echo '<a href="#_" class="button">Apply Online</a>';
					echo '</div></li>';
				}
			} else {
				echo "Sorry there aren't any available dates at this time.";
			}
		echo '</ul>';
		
		?>
		
		
 	</div>
 	
 	<div class="medium-3 columns">
 		
 	</div>
 	
 </div>
 
 
 
<?php
 
get_footer();
 
?>
