<?php
global $wp_query;
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
    <?php if(!is_singular('servicos')): ?>
	<?php $woo_cat = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0)  ); ?>
	<?php foreach($woo_cat as $cat): ?>
	     <?php if($cat->parent == 0): ?>
	         <?php $class = '';?>
	         <?php $link = get_term_link($cat, 'product_cat'); ?>
	         <?php if(is_single()):?>
	            <?php global $wp_query;?>
	            <?php if(has_term($cat->term_id, 'product_cat', $wp_query->post->ID)) $class = 'active';?>
	         <?php endif;?>
	         <?php if(is_tax('product_cat')):?>
	             <?php if($wp_query->query_vars['product_cat'] == $cat->slug) $class = 'active'; ?>
	         <?php endif;?>
	         <a href="<?php echo esc_url($link); ?>" class="<?php echo $class;?>">
	         	<?php echo $cat->name; ?>
	         </a>
	    <?php endif; ?>
    <?php endforeach; ?>
   <?php endif; ?>
</div><!-- #woo_list_cat.col-md-12 -->
<?php if(!empty($opts['blog_link_img']) && isset($opts['blog_link_img'])): ?>
	<?php
	$link = esc_url($opts['blog_link_url']);
	$img = wp_get_attachment_image_src($opts['blog_link_img'],'full',false);
	$img = $img[0];
	?>
	<a href="<?php echo $link; ?>">
		<img class="woo-telefone" src="<?php echo $img; ?>">
	</a>
<?php endif; ?>
