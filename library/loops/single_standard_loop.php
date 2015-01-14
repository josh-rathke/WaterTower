<?php
				
/*	Single Standard Loop
 *	This loop is the standard Water Tower loop that displays for
 *	most posts and displays all relevant information to the
 *	particular post.
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		 <div class="entry">
		   <?php the_content(); ?>
		 </div>

		<?php // Post Metadata Section ?>
		<div class="postmetadata row">
			
			<?php // Post Date and Author Info ?>
			
			<?php $authors = new authorInfo($post->ID); ?>
			
			<div class="col-md-4 pmd-date-author">
				<div class="pmd-data-section">
					<div class="pmd-data-title">
						<i class="fa fa-calendar"></i>Date Published
					</div>
					<div class="pmd-data">
						<?php the_time('F jS, Y') ?>
					</div>
				</div>
				
				
				<div class="pmd-data-section">
					<div class="pmd-data-title">
						<i class="fa fa-user"></i>Author
					</div>
					<div class="pmd-data">
						<?php 
						$authors = new authorInfo($post->ID);
						$authors->author_links_list();
						?>
					</div>
				</div>
			</div>
			
			<?php // Post Categories and Tags ?>
			<div class="col-md-4">
				<div class="pmd-data-section">
					<div class="pmd-data-title">
						<i class="fa fa-sitemap fa-rotate-270"></i>Categories
					</div>
					<div class="pmd-data">
						<?php the_category(', '); ?>
					</div>
				</div>
				
				<div class="pmd-data-section">
					<div class="pmd-data-title">
						<i class="fa fa-tags"></i>Tags
					</div>
					<div class="pmd-data">
						<?php the_tags('', ', '); ?>
					</div>
				</div>
			</div>
			
			<?php // Post Related Programs ?>
			<div class="col-md-4">
				<div class="pmd-data-section">
					<div class="pmd-data-title">
						<i class="fa fa-mortar-board"></i>Related Programs
					</div>
					<div class="pmd-data">
						<?php
							$related_programs = wp_get_post_terms( $post->ID, 'program_taxo');
							foreach ($related_programs as $related_program) {
								$link_url = get_bloginfo('url') . '/programs/' . $related_program->slug;
								$name = $related_program->name;
								$link_format = '<div><a href="%s">%s</a></div>';
								echo sprintf($link_format, $link_url, $name);
							}
						?>
					</div>
				</div>
			</div>
			
		</div>
	
	<?php // Author Section ?>
	<?php display_authors($post->ID, null); ?>
	
	<?php // Comments ?>
	<?php comments_template(); ?>
	
 	</div>

<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>