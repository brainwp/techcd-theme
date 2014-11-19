<?php
/**
 * front-page.php
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */
get_header();
?>
<?php
get_header(); ?>
<div class="col-md-12 clear-mob"></div>
<header class="col-md-12 wooheader">
		<div class="col-md-5 pull-left">
			<h1 class="page-title"><?php _e('Serviços','techcd-theme'); ?></h1>
		</div><!-- .col-md-5 pull-left -->
		<div class="col-md-12 clear-mob"></div>
		<div class="woo-term-maislidos pull-right">
			Talvez colocar uns icones de rede social aqui?
		</div><!-- .pull-right -->
</header><!-- .wooheader -->
<div class="col-md-12 clear-mob"></div>
<div class="col-md-12" style="height:20px"></div>
<div id="sidebar_home" class="site-content col-md-12" role="main">
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content','servicos');

	endwhile;
	?>
</div><!-- #sidebar_home -->


<div class="line"></div>

<?php get_template_part('content','bottom'); ?>
<?php
//get_sidebar();
get_footer();
