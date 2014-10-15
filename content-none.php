<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<header class="page-header">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'techcd-theme' ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'techcd-theme' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'techcd-theme' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'techcd-theme' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
