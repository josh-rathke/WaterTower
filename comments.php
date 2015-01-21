<<<<<<< HEAD
<?php

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<h2 id="comments-title">Comments <i class="fa fa-comments"></i></h2>
=======
<?php 
if ( have_comments() ) : 
	if( (is_page() || is_single()) && (!is_home() && !is_front_page()) ) :
?>
	<section id="comments"><?php 	
		
				
		wp_list_comments(
			
			array(
				'walker'            => new FoundationPress_comments(), 
				'max_depth'         => '',
				'style'             => 'ol',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __('Reply', 'FoundationPress'),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 48,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5', 
				'short_ping'        => false, 
				'echo'  	    => true,							
				'moderation' 	    => __('Your comment is awaiting moderation.', 'FoundationPress'),					
			)
		);
		
		?>

 	</section>
<?php 
	endif;
endif;
?>
>>>>>>> upstream/master

	<?php if ( have_comments() ) { ?>

		<?php wp_list_comments( array(
        'walker' => new ywammontana_walker_comment,
        'style' => 'ul',
        'callback' => null,
        'end-callback' => null,
        'type' => 'all',
        'page' => null,
        'avatar_size' => 65
    ) );
	
	} ?>
	
	<div class="row respond-container">
		<div class="small-2 columns comments-avatar-container">
			<?php
			$current_user = wp_get_current_user();
			if ( ($current_user instanceof WP_User) ) {
				echo get_avatar( $current_user->ID, 150 );
			} ?>
		</div>
<<<<<<< HEAD
		<div class="small-10 columns">
			<?php
			$args = array(
				'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . ' You can use the links below to login using account you already have with trusted services and sites.</p>',
				'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <span class="comments-logout"><a href="%3$s" title="Log out of this account">Log Out <i class="icon-signout"></i></a></span>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Your comment here..." id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<p class="comment-form-author"><input placeholder="Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email' => '<p class="comment-form-email"><label for="email"><input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
					'url' => '',
					)
				)
			);
		
			comment_form( $args ); ?>
			
		</div>
	</div>

</div><!-- #comments -->
=======
	</section>
	<?php
		return;
	}
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php 
if ( have_comments() ) : 
	if( (is_page() || is_single()) && (!is_home() && !is_front_page()) ) :
?>
	<section id="comments">
		<h3><?php comments_number(__('No Responses to', 'FoundationPress'), __('One Response to', 'FoundationPress'), __('% Responses to', 'FoundationPress') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
		<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=FoundationPress_comments'); ?>

		</ol>
		<footer>
			<nav id="comments-nav">
				<div class="comments-previous"><?php previous_comments_link( __( '&larr; Older comments', 'FoundationPress' ) ); ?></div>
				<div class="comments-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'FoundationPress' ) ); ?></div>
			</nav>
		</footer>
	</section>
<?php 
	endif;
endif;
?>
<?php 
if ( comments_open() ) : 
	if( (is_page() || is_single()) && (!is_home() && !is_front_page()) ) :
?>
<section id="respond">
	<h3><?php comment_form_title( __('Leave a Reply', 'FoundationPress'), __('Leave a Reply to %s', 'FoundationPress') ); ?></h3>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf( __('You must be <a href="%s">logged in</a> to post a comment.', 'FoundationPress'), wp_login_url( get_permalink() ) ); ?></p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'FoundationPress'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'FoundationPress'); ?>"><?php _e('Log out &raquo;', 'FoundationPress'); ?></a></p>
		<?php else : ?>
		<p>
			<label for="author"><?php _e('Name', 'FoundationPress'); if ($req) _e(' (required)', 'FoundationPress'); ?></label>
			<input type="text" class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
		</p>
		<p>
			<label for="email"><?php _e('Email (will not be published)', 'FoundationPress'); if ($req) _e(' (required)', 'FoundationPress'); ?></label>
			<input type="text" class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
		</p>
		<p>
			<label for="url"><?php _e('Website', 'FoundationPress'); ?></label>
			<input type="text" class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
		</p>
		<?php endif; ?>
		<p>
			<label for="comment"><?php _e('Comment', 'FoundationPress'); ?></label>
			<textarea name="comment" id="comment" tabindex="4"></textarea>
		</p>
		<p id="allowed_tags" class="small"><strong>XHTML:</strong> <?php _e('You can use these tags:','FoundationPress'); ?> <code><?php echo allowed_tags(); ?></code></p>
		<p><input name="submit" class="button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment', 'FoundationPress'); ?>"></p>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; // If registration required and not logged in ?>
</section>
<?php 
	endif; // if you delete this the sky will fall on your head
endif; // if you delete this the sky will fall on your head 
?>
>>>>>>> upstream/master
