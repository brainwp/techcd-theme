<?php
$opts = get_option('woo_opt');
?>

<?php if(!empty($opts['telefone_img']) && isset( $opts['telefone_img']) ): ?>
	<?php
		$img = wp_get_attachment_image_src( $opts['telefone_img'],'full',false );
		$img = $img[0];
	?>
	<img class="woo-telefone" src="<?php echo $img; ?>">
<?php endif; ?>

<div class="col-md-12" id="woo_list_cat">
	<?php $woo_cat = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0)  ); ?>
	<?php foreach($woo_cat as $cat): ?>
	     <?php if($cat->parent == 0): ?>
	         <?php $link = get_term_link($cat, 'product_cat'); ?>
	         <a href="<?php echo esc_url($link); ?>">
	         	<?php echo $cat->name; ?>
	         </a>
	    <?php endif; ?>
    <?php endforeach; ?>
</div><!-- #woo_list_cat.col-md-12 -->
