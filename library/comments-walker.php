<?php

/** COMMENTS WALKER */
	class ywammontana_walker_comment extends Walker_Comment {
	
	// init classwide variables
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() { ?>
		<ul id="comment-list">
	<?php }
	
	/** START_LVL 
	 * Starts the list before the CHILD elements are added. Unlike most of the walkers,
	 * the start_lvl function means the start of a nested comment. It applies to the first
	 * new level under the comments that are not replies. Also, it appear that, by default,
	 * WordPress just echos the walk instead of passing it to &$output properly. Go figure.  */
	function start_lvl( &$output, $depth = 0, $args = array() ) {		
		$GLOBALS['comment_depth'] = $depth + 1; ?>

		<ul class="children">
		
	<?php }

	/** END_LVL 
	 * Ends the children list of after the elements are added. */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>

		</ul><!-- /.children -->
		
	<?php }
	
	/** START_EL */
	function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment; 
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
		
		<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
			<div id="comment-body-<?php comment_ID() ?>" class="comment-body">
			
			<div class="row">
				<div class="hidden-for-small-only medium-2 columns comment-author vcard author">
					<?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
				</div><!-- /.comment-author -->

				<div id="comment-content-<?php comment_ID(); ?>" class="small-12 medium-10 columns comment-content">
					
					
						
						<!-------- COMMENTS BODY---------->
						<div class="row">
							<div class="medium-12 columns">
								<?php if( !$comment->comment_approved ) : ?>
									<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>	
								<?php else: ?>
									<p><span class="comment-author-name"><?php if (0 != count_user_posts($comment->user_id)) { the_author_posts_link(); } else { echo get_comment_author_link(); } ?></span> - <?php echo str_replace( '<p>' and '</p>', '', get_comment_text()); ?></p>
							</div>
						</div>
						
						
						
						
						<!---------- COMMENTS META --------->
						<div class="row">
							<div class="medium-12 columns comment-footer">
								<div class="comment-meta comment-meta-data">
									<?php comment_date(); ?> at <?php comment_time(); ?> 					
									
									<?php $reply_args = array(
										'add_below' => $add_below, 
										'depth' => $depth,
										'reply_text' => '<i class="fa fa-reply"></i> Reply',
										'max_depth' => $args['max_depth'] );
										
					
									comment_reply_link( array_merge( $args, $reply_args ) );  ?><?php edit_comment_link( '<i class="fa fa-pencil"></i> Edit Comment' ); ?>
									
								</div>
							</div>
							
						</div>
					<?php endif; ?>
				</div>

				
			</div>
				
			</div><!-- /.comment-body -->

	<?php }

	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
		
		</li><!-- /#comment-' . get_comment_ID() . ' -->
		
	<?php }
	
	/** DESTRUCTOR
	 * I just using this since we needed to use the constructor to reach the top 
	 * of the comments list, just seems to balance out :) */
	function __destruct() { ?>
	
	</ul><!-- /#comment-list -->

	<?php }
}	