<?php
/**
 * The template for displaying comments.
 *
 * @package RED_Starter_Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php esc_html( comments_number( '0 Comments', '1 Comment', '% Comments' ) ); ?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html( 'Comment navigation' ); ?></h2>
			<div class="nav-links">

			<div class="nav-previous"><?php previous_comments_link( esc_html( 'Older Comments' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html( 'Newer Comments' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'callback' => 'red_starter_comment_list'
				) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html( 'Comment navigation' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html( 'Older Comments' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html( 'Newer Comments' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html( 'Comments are closed.' ); ?></p>
	<?php endif; ?>

	<?php comment_form( array(
		'title_reply'          => esc_html( 'Post a Comment' ),
		'comment_notes_before' => wp_kses( '<p class="comment-notes">Want to join the discussion? Feel free to contribute!</p>', array( 'p' => array( 'class' => '' ) ) ),
		'label_submit'         => esc_html( 'Submit' ),
		'cancel_reply_link'    => esc_html( '[Cancel reply]' )
	) ); ?>

</div>
