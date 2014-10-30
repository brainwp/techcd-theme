<?php
class Woo_Orcamento{
	public function __construct() {
		add_action('woocommerce_checkout_order_processed',array($this,'order'));
		add_filter('woocommerce_order_button_text',array($this,'change_order_text'));
		add_filter('woocommerce_product_single_add_to_cart_text',array($this,'change_buy_text'));
		add_action('woocommerce_cart_actions',array($this,'change_cart_text'));
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        add_action( 'woocommerce_after_shop_loop_item_title', array($this,'remove_text'), 10 );
        add_action( 'woocommerce_single_product_summary', array($this,'remove_text'), 10 );

	}
	public function order($id,$posted){
		$url = admin_url() . 'post.php?post='.$id.'&action=edit';
		$message = 'Você recebeu um novo pedido de orçamento: ';
		$message .= $url;
        wp_mail( get_bloginfo('admin_email'), get_bloginfo('admin_email'), $message, $headers );
    }
    public function change_order_text($text){
    	return __('Finalizar Orçamento','techcd-theme');
    }
    public function change_buy_text(){
    	return __('Adicionar ao carrinho','techcd-theme');
    }
    public function change_cart_text(){
    	die('erro');
    	_e('<input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="Finalizar Orçamento">','techcd-theme');
    	return false;
    }
    public function remove_text(){
    	echo '';
    }
}
new Woo_Orcamento();
?>
