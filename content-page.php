<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div class="col-md-12" id="header_separator"></div><!-- #header_separator.col-md-12 -->
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
	<?php the_title( '<header class="entry-header"><h1 class="entry-title page">', '</h1></header><!-- .entry-header -->' ); ?>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
