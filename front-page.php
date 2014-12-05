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
<div class="col-md-12" style="height:20px"></div>
<?php
	echo do_shortcode( '[brasa_slider name="Slider Home"]' );
?>

<?php
	$option_destaque = get_option('post_destacado_option');
	if(!empty($option_destaque)){
		global $post_destacado;
		$post_destacado = get_post($option_destaque);
		get_template_part('content','post-destacado');
	}
?>

<div class="line"></div>

<?php if ( is_active_sidebar( 'home_sidebar' ) ) : ?>
	<div class="col-md-12" id="sidebar_home">
		<?php dynamic_sidebar( 'home_sidebar' ); ?>
	</div><!-- #sidebar_home.col-md-12 -->
<?php endif; ?>

<div class="line"></div>

<?php get_template_part('content','bottom'); ?>
<?php
//get_sidebar();
get_footer();
