<?php
class Woo_Term_Views{
	public function __construct(){
		add_action('init', array($this,'register_cpt'));
		add_action('template_redirect', array($this,'counter'));
		add_action('woo_term_hide_mini_query', array($this,'mini_query'));
	}
	public function register_cpt(){
		$labels = array(
			'name'                => _x( 'woo-term-hide', 'Post Type General Name', 'techcd-theme' ),
			'singular_name'       => _x( 'woo-term-hide', 'Post Type Singular Name', 'techcd-theme' ),
			'menu_name'           => __( 'Post Type', 'techcd-theme' ),
			'parent_item_colon'   => __( 'Parent Item:', 'techcd-theme' ),
			'all_items'           => __( 'All Items', 'techcd-theme' ),
			'view_item'           => __( 'View Item', 'techcd-theme' ),
			'add_new_item'        => __( 'Add New Item', 'techcd-theme' ),
			'add_new'             => __( 'Add New', 'techcd-theme' ),
			'edit_item'           => __( 'Edit Item', 'techcd-theme' ),
			'update_item'         => __( 'Update Item', 'techcd-theme' ),
			'search_items'        => __( 'Search Item', 'techcd-theme' ),
			'not_found'           => __( 'Not found', 'techcd-theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'techcd-theme' ),
			);
		$args = array(
			'label'               => __( 'woo-term-hide', 'techcd-theme' ),
			'description'         => __( 'woo-term-hide', 'techcd-theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => false,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => false,
			'capability_type'     => 'page',
			);
		register_post_type( 'woo-term-hide', $args );

	}

	public function counter(){
		if(is_product()){
			global $wp_query;
			$terms = get_the_terms($wp_query->post->ID,'product_cat');
			foreach($terms as $term){
				$hide_post = get_page_by_title( $term->term_id, OBJECT, 'woo-term-hide' );
				if($hide_post !== null){
					$views = get_post_meta($hide_post->ID, 'woo-term-views', true );
					$views = intval($views);
					update_post_meta( $hide_post->ID, 'woo-term-views', $views + 1);
				}
				else{
					$args = array('post_title' => $term->term_id, 'post_type' => 'woo-term-hide');
					$hide_post = wp_insert_post( $args, false );
					if($hide_post != 0){
						update_post_meta( $hide_post, 'woo-term-views', 1);
					}
				}
			}
		}
		elseif(is_product_category()){
			global $wp_query;
			$term = get_term_by( 'slug', $wp_query->query_vars['product_cat'], 'product_cat' );
			$hide_post = get_page_by_title( $term->term_id, OBJECT, 'woo-term-hide' );
			if($hide_post !== null){
				$views = get_post_meta($hide_post->ID, 'woo-term-views', true );
				$views = intval($views);
				update_post_meta( $hide_post->ID, 'woo-term-views', $views + 1);
			}
			else{
				$args = array('post_title' => $term->term_id, 'post_type' => 'woo-term-hide');
				$hide_post = wp_insert_post( $args, false );
				if($hide_post != 0){
					update_post_meta( $hide_post, 'woo-term-views', 1);
				}
			}
		}
	}
	public function mini_query(){
	// WP_Query argument
		$args = array (
			'post_type'              => 'woo-term-hide',
			'post_status'            => 'draft',
			'order'                  => 'DESC',
			'orderby'                => 'meta_value_num',
			'meta_key'               => 'woo-term-views',
			'posts_per_page'         => 5
			);

        // The Query
		$query = new WP_Query( $args );

        // The Loop
		if ( $query->have_posts() ) {
			$html = '<div class="woo-term-hide">';
			$html .= '<ul>';
			$html .= __('<b>Mais acessados: </b>','techcd-theme');
			while ( $query->have_posts() ) {
				$query->the_post();
				$term = get_term_by( 'id', get_the_title(), 'product_cat' );
				$html .= '<li>';
				$link = get_term_link($term, 'product_cat');
				$html .= '<a href="'.esc_url($link).'">';
				$html .=  $term->name;
				$html .= '</a>';
				$html .= '</li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
			echo $html;
		}
		// Restore original Post Data
		wp_reset_postdata();
	}
}
new Woo_Term_Views();
?>
