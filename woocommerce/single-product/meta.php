<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php $stats = get_post_meta($post->ID, 'woo_status_orcamento', true ); ?>
	<?php if(!empty($stats) || $stats != false || $stats != null): ?>
	    <span class="posted_in col-md-12">
		  <?php _e('Disponibilidade: ','techcd-theme'); ?>
		  <?php echo $stats; ?>
	    </span>
	    <div class="col-md-12 cart-separator"></div><!-- .col-md-12 cart-separator -->
	<?php endif; ?>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

	<?php endif; ?>
	<?php if($cat_count > 1 && !empty($cat_count)): ?>
		<?php echo $product->get_categories( ', ', '<span class="col-md-12 posted_in">' . _n( 'Categoria:', 'Categorias:', $cat_count, 'techcd-theme' ) . ' ', '.</span>' ); ?>
		<div class="col-md-12 cart-separator"></div><!-- .col-md-12 cart-separator -->
	<?php endif; ?>
	<?php if($tag_count > 1 && !empty($tag_count)): ?>
	    <?php echo $product->get_tags( ', ', '<span class="col-md-12 tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'techcd-theme' ) . ' ', '.</span>' ); ?>
	    <div class="col-md-12 cart-separator"></div><!-- .col-md-12 cart-separator -->
	<?php endif; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
