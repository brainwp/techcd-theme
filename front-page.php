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
$options_home = get_option('home_opt');
?>
<div class="col-md-12" style="height:20px"></div>
<?php
echo do_shortcode( '[brasa_slider name="titulo pra pesquisar no shortcode"]' );
$option_destaque = get_option('post_destacado_option');
if(!empty($option_destaque)){
	$post_destacado = get_post($option_destaque);
	get_template_part('content','post-destacado');
}
?>
<?php if ( is_active_sidebar( 'home_sidebar' ) ) : ?>
	<div class="col-md-12" id="sidebar_home">
		<?php dynamic_sidebar( 'home_sidebar' ); ?>
	</div><!-- #sidebar_home.col-md-12 -->
<?php endif; ?>
<?php if(!empty($options_home['marcas_img'])): ?>
	<?php
	$img = wp_get_attachment_image_src($options_home['marcas_img'],'full',false);
	$img = $img[0];
	?>
	<div class="col-md-5" id="marcas_home">
		<h2><?php _e('Outras Marcas da TechCD', 'techcd-theme');?></h2>
		<div class="col-md-12 marcas_img">
			<img src="<?php echo $img;?>">
		</div><!-- .col-md-12 marcas_img -->
	</div><!-- #marcas_home.col-md-5 -->
<?php endif; ?>
<?php if ( is_active_sidebar( 'newsletter_sidebar' ) ) : ?>
	<div class="col-md-5 pull-right" id="newsletter">
		<?php dynamic_sidebar( 'newsletter_sidebar' ); ?>
	</div><!-- #sidebar_newsletter.col-md-12 -->
<?php endif; ?>
<?php
//get_sidebar();
get_footer();
