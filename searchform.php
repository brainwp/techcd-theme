<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div id="search" class="pull-right busca_top">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="form-search">
		<fieldset>
			<input type="text" name="s" placeholder="Busca" class="input-text autoclear" />
			<input type="submit" value="" class="input-submit" />
			<?php if(is_home() || is_post_type_archive('post') || is_singular('post') || is_category() || is_tag() || is_search() && isset($_GET['post_type']) && $_GET['post_type'] == 'post' ): ?>
				<input type="hidden" name="post_type" value="post" />
				<?php global $pagination_float; ?>
				<?php $pagination_float = 'pull-left'; ?>
		    <?php else: ?>
		        <input type="hidden" name="post_type" value="product" />
		        <?php global $pagination_float; ?>
				<?php $pagination_float = 'pull-right'; ?>
	     	<?php endif; ?>
		</fieldset>
	</form>
</div><!-- .col-md-2 busca_top -->
