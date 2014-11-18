<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
$classes[] = 'col-md-6';
$classes[] = 'col-sm-6';
$classes[] = 'woo_post_box';
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<div <?php post_class( $classes ); ?>>
	<div class="woo_each">
	<div class="thumb">
		<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('medium');
			} else {
				echo '<img src="'.get_bloginfo('template_url').'/assets/images/woo-default-th.png">';
			}
		?>
	</div>
	<a href="<?php the_permalink();?>" class="col-md-12 woo_infos">
		<h3><?php the_title();?></h3>
		<span><?php the_excerpt();?></span>
	</a><!-- .col-md-12 woo_infos -->
	<div class="bottom">
		<a href="<?php the_permalink();?>" class="mais_detalhes"></a>
	</div>
</div><!-- woo_each -->
</div>
