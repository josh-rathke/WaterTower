<div class="postmetadata post-meta row">
			
			<?php // Post Date and Author Info ?>
			
    <?php $authors = new authorInfo( $post->ID ); ?>
			
			<div class="small-12 medium-4 columns">
				<div class="post-meta-section">
					<h6><i class="fa fa-calendar"></i>Date Published</h6>
					<div class="post-meta-content">
        <?php the_time( 'F jS, Y' ) ?>
					</div>
				</div>
				
				
				<div class="post-meta-section">
					<h6><i class="fa fa-user"></i>Author</h6>
					<div class="post-meta-content">
        <?php
		$authors = new authorInfo( $post->ID );
		$authors->author_links_list();
		?>
					</div>
				</div>
			</div>
			
    <?php // Post Categories and Tags ?>
			<div class="small-12 medium-8 columns">
				<div class="post-meta-section">
					<h6><i class="fa fa-sitemap fa-rotate-270"></i>Categories</h6>
					<div class="post-meta-content">
        <?php
		$categories = get_the_category( $post->ID );

		foreach ( $categories as $category ) {
			$category_link = get_category_link( $category->term_id );
			echo "<a href='{$category_link}'>{$category->name}</a>";
		}

		?>
						
					</div>
				</div>
				
				<div class="post-meta-section">
					<h6><i class="fa fa-tags"></i>Tags</h6>
					<div class="post-meta-content">
        <?php the_tags( '', '' ); ?>
					</div>
				</div>
				
				<div class="post-meta-section">
					<h6><i class="fa fa-mortar-board"></i>Related Programs</h6>
					<div class="post-meta-content">
        <?php
		$related_programs = wp_get_post_terms( $post->ID, 'program_taxo' );
		foreach ( $related_programs as $related_program ) {
			$program_object = get_page_by_path( $related_program->slug, OBJECT, 'program' );

			$link_url = get_permalink( $program_object->ID );
			$name = $related_program->name;
			$link_format = '<div><a href="%s">%s</a></div>';
			echo sprintf( $link_format, $link_url, $name );
		}
		?>
					</div>
				</div>
			</div>
		</div>