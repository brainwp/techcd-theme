<?php
get_header(); ?>
<div class="col-md-12 clear-mob"></div>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<header class="col-md-12 wooheader">
		<div class="col-md-5 pull-left">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		</div><!-- .col-md-5 pull-left -->
		<div class="col-md-12 clear-mob"></div>
		<div class="woo-term-maislidos pull-right">
			<?php do_action('woo_term_hide_mini_query'); ?>
		</div><!-- .pull-right -->
	</header><!-- .wooheader -->
<?php endif; ?>
<div class="col-md-12 clear-mob"></div>
<?php get_template_part('content','pagination'); ?>
<div class="col-md-3" id="sidebar-woo">
	<?php get_sidebar('woo'); ?>
</div><!-- #sidebar-woo.col-md-2 -->
<div class="col-md-12 clear-mob"></div>
<div id="primary" class="col-md-8 pull-right">
	<div class="col-md-12 clear-mob"></div>
	<div id="content" class="site-content" role="main">
		<?php
				// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			wc_get_template_part( 'content', 'product' );

		endwhile;
		?>
	</div><!-- #content -->
	<div class="col-md-12 clear-mob"></div>
</div><!-- #primary -->
<?php get_template_part('content','pagination'); ?>
<?php get_template_part('content','bottom'); ?>
<?php
get_footer();
?>
