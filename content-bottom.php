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
			<img src="<?php echo $img;?>">
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
