<?php
get_header('shop'); ?>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<header class="col-md-12 wooheader">
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
	</header><!-- .wooheader -->
<?php endif; ?>
<div class="col-md-3" id="sidebar-woo">
	<?php get_sidebar('woo'); ?>
</div><!-- #sidebar-woo.col-md-2 -->
<div class="col-md-12 clear-mob"></div>
<div id="primary" class="col-md-9 pull-right">
	<div class="col-md-12 clear-mob"></div>
	<div class="col-md-12" style="clear:both;height:20px"></div>
	<?php if(isset($_POST['add-to-cart'])): ?>
	    <a class="col-md-12 alert alert-success" role="alert" style="margin-top:10px" href="<?php echo home_url();?>/carrinho/">
	    	<?php _e('Adicionado ao orçamento - Clique aqui para ver todo orçamento!', 'techcd-theme');?>
        </a>
	<?php endif; ?>
	<div class="col-md-12" style="clear:both;height:20px"></div>
	<div id="content" class="site-content" role="main">
		<?php
				// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
		     wc_get_template_part( 'content', 'single-product' );

		endwhile;
		?>
	</div><!-- #content -->
	<div class="col-md-12 clear-mob"></div>
</div><!-- #primary -->
<div class="col-md-12">
	<?php get_template_part('content','bottom'); ?>
</div><!-- .col-md-12 -->
<?php
get_footer();
?>
