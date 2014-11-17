<?php
// Extra post classes
$classes = array();
$classes[] = 'col-md-12';
$classes[] = 'col-sm-12';
$classes[] = 'woo_post_box_downloads';
?>
<div <?php post_class( $classes ); ?>>
	<div class="thumb col-md-3 pull-left">
		<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('thumbnail');
			} else {
				echo '<img src="'.get_bloginfo('template_url').'/assets/images/woo-default-th.png">';
			}
		?>
	</div>
	<a href="<?php the_permalink();?>" class="col-md-5 pull-left">
		<h4><?php the_title();?></h4>
		<span><?php custom_the_excerpt();?></span>
	</a><!-- .col-md-12 woo_infos -->
	<a href="<?php the_permalink();?>" class="col-md-3 pull-right download-bt">
		<?php _e('Baixar','techcd-theme'); ?>
	</a><!-- .col-md-12 woo_infos -->
</div>
