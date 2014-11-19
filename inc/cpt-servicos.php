<?php
if ( ! function_exists('cpt_servicos') ) {

// Register Custom Post Type
function cpt_servicos() {

	$labels = array(
		'name'                => _x( 'Serviço', 'Post Type General Name', 'techcd-theme' ),
		'singular_name'       => _x( 'Serviços', 'Post Type Singular Name', 'techcd-theme' ),
		'menu_name'           => __( 'Serviços', 'techcd-theme' ),
		'parent_item_colon'   => __( 'Serviço parente', 'techcd-theme' ),
		'all_items'           => __( 'Todos serviços', 'techcd-theme' ),
		'view_item'           => __( 'Ver serviço', 'techcd-theme' ),
		'add_new_item'        => __( 'Adicionar novo serviço', 'techcd-theme' ),
		'add_new'             => __( 'Adicionar novo', 'techcd-theme' ),
		'edit_item'           => __( 'Editar serviço', 'techcd-theme' ),
		'update_item'         => __( 'Atualizar serviço', 'techcd-theme' ),
		'search_items'        => __( 'Pesquisar serviço', 'techcd-theme' ),
		'not_found'           => __( 'Não encontrado', 'techcd-theme' ),
		'not_found_in_trash'  => __( 'Não encontrado', 'techcd-theme' ),
	);
	$args = array(
		'label'               => __( 'servicos', 'techcd-theme' ),
		'description'         => __( 'Serviços', 'techcd-theme' ),
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'labels'              => $labels,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => true,
		'capability_type'     => 'page',
		'menu_icon' => 'dashicons-hammer',
	);
	register_post_type( 'servicos', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cpt_servicos', 0 );

}
function servicos_per_page( $query ) {
    if ( is_post_type_archive('servicos') && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '-1' );
    }
}
add_action( 'pre_get_posts', 'servicos_per_page' );
?>
