<?php
get_header('shop'); ?>
<div class="col-md-12 clear-mob"></div>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<header class="col-md-12 wooheader">
		<div class="col-md-5 pull-left">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		</div><!-- .col-md-5 pull-left -->
		<div class="woo-term-maislidos pull-right">
			<?php do_action('woo_term_hide_mini_query'); ?>
		</div><!-- .pull-right -->
	</header><!-- .wooheader -->
<?php endif; ?>
<div class="col-md-12 clear-mob"></div>
<div class="col-md-3 single" id="sidebar-woo">
	<?php get_sidebar('woo'); ?>
</div><!-- #sidebar-woo.col-md-2 -->
<div class="col-md-12 clear-mob"></div>
<div id="primary" class="col-md-8 pull-right single">
	<div class="col-md-12 clear-mob"></div>
	<div class="col-md-12" style="clear:both;height:20px;"></div>
	&nbsp;
	<div id="content" class="site-content" role="main">
		<h1><?php _e('Tópicos de ajuda / FAQ', 'techd-theme'); ?></h1>
		<ul id="help-faq">
		  <?php
				// Start the Loop.
		    while ( have_posts() ) : the_post();
			  // Include the page content template
			  get_template_part( 'content', 'faq' );

		    endwhile;
		?>
		</ul><!-- #help-faq -->
	</div><!-- #content -->
	<div class="col-md-12 clear-mob"></div>
</div><!-- #primary -->
<?php get_template_part('content','bottom'); ?>
<?php
get_footer();
?>
