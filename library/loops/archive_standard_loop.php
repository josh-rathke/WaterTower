<?php
				
/*	Archive Standard Loop
 *	This loop is the standard archive loop used for most of
 *	the archives within Water Tower.
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 	
 	<div id="post-<?php the_ID(); ?>" <?php post_class('archive-loop-post-container row'); ?>>
 	
 		<div class="col-md-3 hidden-sm hidden-xs">
 			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
 			<?php the_post_thumbnail('16:9-media-thumbnail', array('class'=>'img-responsive')); ?>
 			</a>
 		</div>
 		
 		<div class="col-md-9">
 			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 			<?php the_excerpt(); ?>
 			<div class="archive-postmetadata-container">
 				<div class="archive-postmetadata-read-post">
 					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-paper-plane-o"></i> Read Post</a>
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