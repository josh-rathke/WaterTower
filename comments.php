<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<h2 id="comments-title">Comments <i class="fa fa-comments"></i></h2>

    <?php if ( have_comments() ) { ?>

    <?php wp_list_comments(
	array(
		'walker' => new WaterTowerWalkerComment,
		'style' => 'ul',
		'callback' => null,
		'end-callback' => null,
		'type' => 'all',
		'page' => null,
		'avatar_size' => 65,
	 )
);

} ?>
	
	<div class="row respond-container">
		<div class="small-2 columns comments-avatar-container">
    <?php
	$current_user = wp_get_current_user();
	if ( ($current_user instanceof WP_User) ) {
		echo get_avatar( $current_user->ID, 150 );
	} ?>
		</div>
		<div class="small-10 columns">
    <?php
	$args = array(
				'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . ' You can use the links below to login using account you already have with trusted services and sites.</p>',
				'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <span class="comments-logout"><a href="%3$s" title="Log out of this account">Log Out <i class="icon-signout"></i></a></span>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
				'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Your comment here..." id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => apply_filters(
					'comment_form_default_fields', array(
					'author' => '<p class="comment-form-author"><input placeholder="Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email' => '<p class="comment-form-email"><label for="email"><input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
					'url' => '',
					)
				)
	);

	comment_form( $args ); ?>
			
		</div>
	</div>

</div><!-- #comments -->