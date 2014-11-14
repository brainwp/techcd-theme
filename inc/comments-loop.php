<?php
if ( ! function_exists( 'odin_comment_loop' ) ) {

	/**
	 * Custom comments loop.
	 *
	 * @since 2.2.0
	 *
	 * @param  object $comment Comment object.
	 * @param  array  $args    Comment arguments.
	 * @param  int    $depth   Comment depth.
	 *
	 * @return void
	 */
	function odin_comments_loop( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ) {
				default :
					?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div class="col-md-2 author">
                       <?php echo get_avatar($comment, 64); ?>
                       <div><a href="<?php echo get_comment_author_url(); ?>"><?php echo get_comment_author(); ?></a></div>
                       <span><?php echo get_comment_date('d/m/Y'); ?></span>
                       <div class="col-md-12">
                       	<?php edit_comment_link( __( 'Editar', 'techcd-theme' ), '<span class="edit-link">', '</span>' ); ?>
                       </div>
                    </div>
                    <div class="col-md-10">
                    	<?php $text = get_comment_text(); ?>
                    	<?php if(!empty($text)): ?>
                    	   <div class="text curved shaded col-md-12">
                              <span></span>
                              <?php echo $text; ?>
                           </div>
                        <?php endif; ?>
                        <div class="pull-right">
                        	<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Responder', 'techcd-theme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div><!-- .col-md-12 pull-right -->
                    </div><!-- .col-md-12 -->
				<div class="clear-all" style="width:100%;clear:both;height:10px;"></div>
				<?php break;
		}
	}

}
