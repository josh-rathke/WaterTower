<?php

/**
 *	Front Page
 * 	Template Name: Front Page
 * 
 *	This is the template for the front page.
 */

get_header();
?>



<?php

/**
 *	Upcoming Schools Section
 * 
 * 	This section displays a list of the six most
 * 	upcoming schools.
 */
 
 $upcoming_schools = get_upcoming_schools(6);
 print_r($upcoming_schools);
 
 echo '<div class="row"><div class="small-12 columns">';
 echo '<div class="small-block-grid-2 medium-block-grid 3 large-block-grid-6">';
 foreach($upcoming_schools->schools as $upcoming_school) { ?>
 	
 	
 		<li><?php echo $upcoming_school['program_name']; ?></li>
 	
 <?php 	
 } 
 echo '</div></div>';
 echo '</div>';
 ?>



<div class="row front-page-featured-video-container">
	<div class="small-12 columns">
		<div class="row">
			<div class="medium-6 columns">
				<div class="flex-video widescreen vimeo">
					<iframe src="//player.vimeo.com/video/119893705?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="front-page-featured-video-desc">
					<h3>Featured Video</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<ul class="front-page-featured-video-footer">
						<li>Discipleship Training School</li>
						<li>View All Videos on Vimeo</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>





<?php get_footer(); ?>
