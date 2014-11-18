<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Odin
 * @since 1.9.0
 */
?>
<div id="comments" class="comments content-wrap" itemscope itemtype="http://schema.org/Comment">
	<?php if ( post_password_required() ) : ?>
		<span class="nopassword"><?php _e( 'This post is password protected. Enter the password to view all comments.', 'techcd-theme' ); ?></span>
</div><!-- #comments -->
		<?php
		return;
	endif;

	if ( have_comments() ) : ?>
		<h5 id="comments-title">
			<?php
			comments_number( __( 'Comentários (0):', 'techcd-theme' ), __( 'Comentários (1):', 'techcd-theme' ), __( 'Comentários (%):', 'techcd-theme' ) );
			?>
		</h5>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Old Comments', 'techcd-theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'New Comments &rarr;', 'techcd-theme' ) ); ?></div>
			</nav>
		<?php endif; ?>
		<ul class="commentlist">
			<li>
				<?php wp_list_comments( array( 'callback' => 'odin_comments_loop' ) ); ?>
		    </li>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Old Comments', 'techcd-theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'New Comments &rarr;', 'techcd-theme' ) ); ?></div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<span class="nocomments"><?php _e( 'Comments closed.', 'techcd-theme' ); ?></span>
	<?php endif; ?>
	<div class="reply">
		<div class="form reply">
			<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			comment_form(
				array(
					'comment_notes_after' => '',
					'comment_field' => '<div class="comment-form-comment form-group" id="respond"><label class="control-label" for="comment">' . __( 'Comment', 'techcd-theme' ) . '</label><div class="controls"><textarea id="comment" name="comment" cols="45" rows="8" class="form-control" aria-required="true"></textarea></div></div>',
					'fields' => apply_filters( 'comment_form_default_fields',
						array(
							'author' => '<div class="comment-form-author form-group">' . '<label class="control-label" for="author">' . __( 'Name', 'techcd-theme' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label><input class="form-control input-text" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
						    'email' => '<div class="comment-form-email form-group"><label class="control-label" for="email">' . __( 'E-mail', 'techcd-theme' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label><input class="form-control input-text" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
						    'url' => ''
						    ) )
				)
	        ); ?>
		</div><!-- .form reply -->
	</div><!-- .reply -->
</div><!-- #comments -->
