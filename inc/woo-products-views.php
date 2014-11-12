<?php
/*classe Produtos mais lidos */
class Woo_Products_Views{
	public function __construct(){
		add_action( 'init', array($this, 'add_page'), 1);
	    add_action( 'template_redirect', array($this, 'counter'));
	    add_action('woo_product_views_page_title',array($this, 'title'));
	}
	public function title(){
		$page = get_page_by_path(__('mais-acessados','techcd-theme'));
		echo $page->post_title;
	}
	public function add_page(){
		if(is_admin() && isset($_GET['activated']) && $_GET['activated'] == true){
			$page = get_page_by_path(__('mais-acessados','techcd-theme'));
			if($page == null){
				$args = array(
					'post_title' => __('Mais acessados','techcd-theme'),
					'post_type' => 'page',
				    'post_status' => 'publish',
				    'post_name'   => __('mais-acessados','techcd-theme')
					);
				wp_insert_post( $args, false );
			}
		}
	}
	public function counter(){
		if(is_product()){
			global $wp_query;
			$views = get_post_meta($wp_query->post->ID, 'woo-product-views', true );
			$views = intval($views);
			update_post_meta( $wp_query->post->ID, 'woo-product-views', $views + 1);
		}
	    $this->query();
		$this->template();
	}
	public function query(){
		$conditional = is_page(__('mais-acessados','techcd-theme'));
		if($conditional == true){
			global $views_query;
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			// WP_Query arguments
			$args = array (
				'pagination'             => true,
				'paged'                  => $paged,
				'posts_per_page'         => get_option('posts_per_page'),
				'post_type'              => 'product',
				'order'                  => 'DESC',
				'orderby'                => 'meta_value_num',
				'meta_key'               => 'woo-product-views',
				);
		    $views_query = new WP_Query($args);
		}
	}
	public function template(){
		$conditional = is_page(__('mais-acessados','techcd-theme'));
		if($conditional == true){
			require get_template_directory() . '/woocommerce/woo-product-views.php';
			die();
		}
	}
}
new Woo_Products_Views();
?>
