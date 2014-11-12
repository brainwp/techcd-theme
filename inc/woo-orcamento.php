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
        add_filter( 'gettext', array($this,'gettext'), 20, 3 );
        add_filter('woocommerce_shipping_fields', array($this, 'remove_shipping'));
        add_action('admin_init',array($this,'update_options'));
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
    	_e('<input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="Finalizar Orçamento">','techcd-theme');
    	return false;
    }
    public function remove_text(){
    	echo '';
    }
    public function gettext($translated_text, $untranslated_text, $domain){
    	$pos = strpos($translated_text, 'foi adicionado com sucesso ao seu carrinho.');
    	if($pos !== false){
    		$translated_text = str_replace('carrinho', 'orçamento', $translated_text);
    	}
    	$pos = strpos($translated_text, 'Atualizar carrinho');
    	if($pos !== false){
    		$translated_text = str_replace('carrinho', 'orçamento', $translated_text);
    	}
    	$pos = strpos($translated_text, 'Crie uma conta preenchendo as informações abaixo. Se você já comprou conosco antes, faça o login no topo da página.');
    	if($pos !== false){
    		$translated_text = 'Crie uma conta preenchendo as informações abaixo. Se você já fez um orçamento conosco antes, faça o login no topo da página.';
    	}
    	return $translated_text;
    }
    public function remove_shipping($fields){
    	return array();
    }
    public function update_options(){
    	$opts = get_option('woocommerce_new_order_settings');
    	if($opts['enabled'] != 'no'){
    		$opts['enabled'] = 'no';
    		update_option( 'woocommerce_new_order_settings', $opts );
    	}
    	$opts = get_option('woocommerce_customer_processing_order_settings');
    	if($opts['enabled'] != 'no'){
    		$opts['enabled'] = 'no';
    		update_option( 'woocommerce_customer_processing_order_settings', $opts );
    	}
    }
}
new Woo_Orcamento();
?>
