<?php
if ( ! function_exists('cpt_marcas') ) {

// Register Custom Post Type
function cpt_marcas() {

	$labels = array(
		'name'                => _x( 'Marca', 'Post Type General Name', 'techcd-theme' ),
		'singular_name'       => _x( 'Marca', 'Post Type Singular Name', 'techcd-theme' ),
		'menu_name'           => __( 'Outras Marcas', 'techcd-theme' ),
		'parent_item_colon'   => __( 'Marca Parente', 'techcd-theme' ),
		'all_items'           => __( 'Todas Marcas', 'techcd-theme' ),
		'view_item'           => __( 'Ver Marca', 'techcd-theme' ),
		'add_new_item'        => __( 'Adicionar Nova Marca', 'techcd-theme' ),
		'add_new'             => __( 'Adicionar Marca', 'techcd-theme' ),
		'edit_item'           => __( 'Editar Marca', 'techcd-theme' ),
		'update_item'         => __( 'Atualizar Marca', 'techcd-theme' ),
		'search_items'        => __( 'Pesquisar Marca', 'techcd-theme' ),
		'not_found'           => __( 'Não encontrado', 'techcd-theme' ),
		'not_found_in_trash'  => __( 'Não encontrado', 'techcd-theme' ),
	);
	$args = array(
		'label'               => __( 'marcas', 'techcd-theme' ),
		'description'         => __( 'Outras Marcas', 'techcd-theme' ),
		'supports'            => array( 'title', 'thumbnail' ),
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
		'menu_icon' => 'dashicons-money',
	);
	register_post_type( 'marcas', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cpt_marcas', 0 );

}
?>
