<?php
/**
 * The default template for displaying content. Used for index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<div class="row content-archive-post-container">
	<div class="medium-3 columns content-archive-post-image">
		<?php the_post_thumbnail('thumbnail-card'); ?>
	</div>
	<div class="medium-9 columns content-archive-post-content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			</header>
			<div class="entry-content">
				<?php the_excerpt(__('Continue reading...', 'FoundationPress')); ?>
			</div>
			
			<footer>
				<span>Posted: <?php the_date(); ?></span>
				<span>By: 
					<?php 
						$authors = new authorInfo($post->ID);
						$authors->author_links_list();
					?>
				</span>
			</footer>
			
		</article>
	</div>
</div>
