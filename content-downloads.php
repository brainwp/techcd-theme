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
	<div class="col-md-8 pull-left resumo">
		<h4><?php the_title();?></h4>
		<span><?php the_content();?></span>
	</div><!-- .col-md-8 resumo -->
	<?php $file = get_field('downloads_file'); ?>
	<a href="<?php echo $file;?>" target="_blank" class="col-md-1 pull-right download-bt">
		<?php _e('Baixar','techcd-theme'); ?>
	</a><!-- .col-md-12 woo_infos -->
</div>
