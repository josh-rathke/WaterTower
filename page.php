<?php get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

    <?php do_action('watertower_before_content'); ?>

    <?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
    <?php do_action('watertower_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
    <?php 
endwhile;?>

    <?php do_action('watertower_after_content'); ?>

	</div>
	<div class="small-12 large-4 columns">
    <?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
