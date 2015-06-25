<?php
$options_home = get_option('home_opt');
?>
<div class="col-md-12 clear-mob"></div>
<div class="col-md-12">
	<?php if(!empty($options_home['marcas_img'])): ?>
	<?php
	$img = wp_get_attachment_image_src($options_home['marcas_img'],'full',false);
	$img = $img[0];
	?>
	<div class="col-md-5" id="marcas_home">
		<div class="col-md-12 clear-mob"></div>
		<h2><?php _e('Outras Marcas da TechCD', 'techcd-theme');?></h2>

		<div class="col-md-12 marcas_img">

		<?php $custom_query = new WP_Query('post_type=marcas&posts_per_page=-1');
		while($custom_query->have_posts()) : $custom_query->the_post(); ?>

			<div class="each marca col-md-6">
				<?php if ( $link = get_field( 'url_marca', get_the_ID() ) ): ?>
					<a href="<?php echo $link; ?>" target="_blank">
						<?php the_post_thumbnail( 'marca' ); ?>
					</a>
				<?php else: ?>
					<?php the_post_thumbnail( 'marca' ); ?>
				<?php endif ?>
			</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>

		</div><!-- .col-md-12 marcas_img -->

		<div class="col-md-12 clear-mob"></div>
	</div><!-- #marcas_home.col-md-5 -->
<?php endif; ?>
<?php if ( is_active_sidebar( 'newsletter_sidebar' ) ) : ?>
	<div class="col-md-6 pull-right" id="newsletter">
		<div class="col-md-12 clear-mob"></div>
		<?php dynamic_sidebar( 'newsletter_sidebar' ); ?>
		<div class="col-md-12 clear-mob"></div>
	</div><!-- #sidebar_newsletter.col-md-12 -->
<?php endif; ?>
</div><!-- .col-md-12 -->
<div class="col-md-12 clear-mob"></div>
