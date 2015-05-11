<?php
//content single product woocommerce
?>
<div class="col-md-12 woo-single-title">
	<h1><?php the_title(); ?></h1>
</div><!-- .col-md-12 woo-single-title -->
<?php
$slider = get_post_meta( get_the_ID(), '_product_image_gallery', true );
$slider = explode(',', $slider);
if(is_array($slider) && !empty($slider) && isset($slider)){
	$html = '<div class="col-md-12 is_slider" id="slider-woo-product">';
	foreach ($slider as $img) {
		if(empty($img))
			continue;

		$img = wp_get_attachment_image_src( $img, 'brasa_slider_img', false );
		$html .= '<div class="slick_slide">';
		//$html .= '<a href="#"><img src="'.$img[0].'" class="img_slider"></a>';
		$html .= '<img src="'.$img[0].'" class="img_slider">';
		$html .= '</div>';
	}
	$html .= '</div>';
    echo $html;
}
?>
<div class="col-md-12 clear-mob"></div><!-- .col-md-12 clear-mob -->
<div class="col-md-6 pull-left" id="woo-content-single">
	<h3><?php _e('Descrição do Produto','techcd-theme'); ?></h3>
	<?php the_content(); ?>
</div><!-- #woo-content-single.col-md-9 pull-left -->
<div class="col-md-12 clear-mob"></div><!-- .col-md-12 clear-mob -->

<div class="sidebar-single-produto col-md-5 pull-right">

	<div class="col-md-12 clear-mob"></div><!-- .col-md-12 clear-mob -->

	<?php $downloads = get_post_meta( get_the_ID(), 'downloads_rel', true ); ?>
	<?php if( $downloads && is_array($downloads)): ?>
	    <div class="col-md-12 content-servicos" id="woo-content-downloads">
	    	<div class="col-md-12" id="download-ico"></div>
	    	<div class="col-md-12 itens-servicos">
	    		<?php foreach( $downloads as $download_id): ?>
	    		    <?php $link = get_the_permalink($download_id); ?>
	    		    <?php $title = get_the_title($download_id); ?>
	    		    <?php if($link !== false && $title !== false): ?>
	    		        <a class="col-md-12" href="<?php echo $link; ?>"><?php echo $title; ?></a>
	    		    <?php endif; ?>
	            <?php endforeach; ?>
	        </div><!-- .col-md-12 itens-servicos -->
	    </div><!-- #woo-content-downloads.col-md-5 pull-right -->
	<?php endif; ?>

	<div class="col-md-12 clear-mob"></div><!-- .col-md-12 clear-mob -->
</div><!-- sidebar-single-produto -->
