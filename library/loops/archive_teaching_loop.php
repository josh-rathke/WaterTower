<?php
				
/*	Archive Teaching Loop
 *	This loop is the archive loop used for teachings
 *	throughout the Water Tower theme.
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 	
 	<div id="post-<?php the_ID(); ?>" <?php post_class('archive-loop-post-container row'); ?>>
 	
 		<div class="col-md-3 hidden-sm hidden-xs archive-teaching-thumbnail" style="position: relative;">
 			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
 				<div class="teaching-media">
 					<?php 
 					
 					/*	Determine which kind of overlay to show
 					 *	for teaching media type.
 					 */
 					 
 					 if (rwmb_meta('media_type')=='text') {
	 					 echo '<i class="fa fa-pencil"></i>Text';
 					 } elseif (rwmb_meta('media_type')=='video') {
	 					 echo '<i class="fa fa-film"></i>Video';
 					 } else {
	 					 echo '<i class="fa fa-headphones"></i>Audio';
	 				 }
	 				 
	 				 ?>
 				</div>
 			<?php get_teaching_featured_image($post->ID); ?>
 			</a>
 		</div>
 		
 		<div class="col-md-9">
 			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 			<?php the_excerpt(); ?>
 			<div class="archive-postmetadata-container">
 				<div class="archive-postmetadata-read-post">
 					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-paper-plane-o"></i> View Teaching</a>
 				</div>
 				<div><i class="fa fa-calendar"></i><?php the_time('F jS, Y') ?></div>
 				<div><i class="fa fa-user"></i>
	 				<?php 
					$authors = new authorInfo($post->ID);
					$authors->author_links_list();
					?>
 				</div>
 			</div>
 		</div>
 	</div>

<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>