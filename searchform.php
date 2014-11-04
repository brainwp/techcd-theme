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
		</fieldset>
	</form>
</div><!-- .col-md-2 busca_top -->
