<?php
//single downloads
?>
<h1><?php the_title(); ?></h1>
<div class="col-md-12 thumbnail-download">
	<?php the_post_thumbnail('brasa_slider_img'); ?>
</div><!-- .col-md-12 thumbnail-download -->
<div class="col-md-12 content-download">
	<?php the_content(); ?>
</div>
<div class="col-md-12 content-download">
	<?php
	$file_id = get_post_meta( get_the_ID(), 'downloads_file', true );
	?>
	<a href="<?php echo wp_get_attachment_url($file_id); ?>" download>
		<?php _e('Baixar arquivo','techcd-theme'); ?>
	</a>
</div>
