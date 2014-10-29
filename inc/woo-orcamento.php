<?php
class Woo_Orcamento{
	public function __construct() {
		add_action('woocommerce_checkout_order_processed',array($this,'order'));
	}
	public function order($id,$posted){
		$url = admin_url() . 'post.php?post='.$id.'&action=edit';
		$message = 'Você recebeu um novo pedido de orçamento: ';
		$message .= $url;
        wp_mail( get_bloginfo('admin_email'), get_bloginfo('admin_email'), $message, $headers );
    }
}
new Woo_Orcamento();
?>
