<?php
//content single product woocommerce
?>
<div class="col-md-12 woo-single-title">
	<h1><?php the_title(); ?></h1>
</div><!-- .col-md-12 woo-single-title -->
<?php
$slider = get_post_meta( get_the_ID(), '_product_image_gallery', true );
$slider = explode(',', $slider);
if(!empty($slider) && isset($slider)){
	$html = '<div class="col-md-12 is_slider" id="slider-woo-product">';
	foreach ($slider as $img) {
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
<div class="col-md-6 pull-left" id="woo-content-single">
	<h3><?php _e('Descrição do Produto','techcd-theme'); ?></h3>
	<?php the_content(); ?>
</div><!-- #woo-content-single.col-md-9 pull-left -->
<div class="col-md-5 pull-right" id="woo-content-cart">
	<?php do_action( 'woocommerce_single_product_summary' ); ?>
</div><!-- #woo-content-cart.col-md-5 pull-right -->
<?php $posts = get_post_meta( get_the_ID(), 'downloads_rel', true ); ?>
<?php $max = count($posts); ?>
<?php $i = 1; ?>
<?php if( $posts ): ?>
    <div class="col-md-5 pull-right" id="woo-content-downloads">
    	<div class="col-md-12" id="download-ico"></div>
    	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
           <?php if($i != $max): ?>
             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>,
           <?php else: ?>
             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
           <?php endif; ?>
           <?php $i++; ?>
        <?php endforeach; ?>
    </div><!-- #woo-content-downloads.col-md-5 pull-right -->
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
