<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php do_action('watertower_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action('watertower_post_before_entry_content'); ?>
			
			<div class="entry-content">
				<?php the_content(); ?>
				
				<?php
				
					if (rwmb_meta('enable_featured_program')) : ?>
						<?php $featured_program = get_post(rwmb_meta('featured_program_id')); ?>
						<div class="post-featured-program-container">
							<div class="row">
								<div class="medium-5 columns">
									<?php echo get_the_post_thumbnail($featured_program->ID, 'thumbnail-card'); ?>
									<a href="<?php echo of_get_option('apply_url'); ?>" class="button">Apply</a>
								</div>
								<div class="medium-7 columns post-featured-program-desc">
									<h5>Want to know more about <?php echo $featured_program->post_title; ?>?</h5>
									<?php echo get_excerpt_by_id($featured_program->ID, 60) ?>
									<a href="<?php get_permalink($featured_program->ID); ?>">View School</a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				
			</div>
			
			<footer>
				<?php get_template_part('parts/post-meta') ?>
			</footer>
			
			<?php do_action('watertower_post_before_comments'); ?>
				<?php comments_template(); ?>
			<?php do_action('watertower_post_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php do_action('watertower_after_content'); ?>

	</div>
	
	<aside id="sidebar" class="small-12 large-4 columns stick-to-parent">
		
		<div class="post-author-container">
			<h4><i class='fa fa-user'></i>Post Author<i class='fa fa-caret-down'></i></h4>
			
			<?php 
			
			/**
			 * 	Display Author of Post in Sidebar
			 * 	So far not compatible with the "married_couples" array within
			 * 	the Authors Class. It only scans the singles array.
			 */
			
			$authors = new authorInfo($post->ID);
				
			foreach ($authors->singles as $author) {
				
				echo get_the_post_thumbnail($author['ID'], 'thumbnail-card');
				echo '<h5>' . $author['author_info']['display_name'] . '</h5>';
				echo '<p>' . $author['author_info']['description'] . '</p>';
				echo '<ul>';
					echo '<li><a href="' . get_bloginfo('url') . '/author/' . $author['author_info']['user_login'] . '"><i class="fa fa-paper-plane-o"></i> View All Posts (' . $author['author_info']['post_count'] . ')</a></li>';
					echo '<li><a href="' . $author['author_info']['website'] . '"><i class="fa fa-globe"></i> ' . properize($author['author_info']['first_name']) . " Website </a></li>";
					echo '<li><i class="fa fa-map-marker"></i> Hometown: ' . $author['author_info']['hometown'] . '</li>';
				echo '</ul>';
			}
			
			?>
			
		</div>
		
		<?php get_sidebar(); ?>
	</aside>
</div>
<?php get_footer(); ?>
