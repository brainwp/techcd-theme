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
$option_destaque = get_option('post_destacado_option');
if(!empty($option_destaque)){
	$post_destacado = get_post($option_destaque);
	get_template_part('content','post-destacado');
}
?>
<?php
//get_sidebar();
get_footer();
