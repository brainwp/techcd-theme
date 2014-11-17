<?php
if ( ! function_exists('cpt_downloads') ) {

// Register Custom Post Type
function cpt_downloads() {

	$labels = array(
		'name'                => _x( 'Downloads', 'Post Type General Name', 'techcd-theme' ),
		'singular_name'       => _x( 'Download', 'Post Type Singular Name', 'techcd-theme' ),
		'menu_name'           => __( 'Downloads', 'techcd-theme' ),
		'parent_item_colon'   => __( 'Download parente', 'techcd-theme' ),
		'all_items'           => __( 'Todos downloads', 'techcd-theme' ),
		'view_item'           => __( 'Ver download', 'techcd-theme' ),
		'add_new_item'        => __( 'Adicionar novo download', 'techcd-theme' ),
		'add_new'             => __( 'Adicionar novo', 'techcd-theme' ),
		'edit_item'           => __( 'Editar download', 'techcd-theme' ),
		'update_item'         => __( 'Atualizar download', 'techcd-theme' ),
		'search_items'        => __( 'Pesquisar download', 'techcd-theme' ),
		'not_found'           => __( 'Nada encontrado', 'techcd-theme' ),
		'not_found_in_trash'  => __( 'Nada encontrado na lixeira', 'techcd-theme' ),
	);
	$args = array(
		'label'               => __( 'downloads', 'techcd-theme' ),
		'description'         => __( 'Downloads', 'techcd-theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
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
		'capability_type'     => 'page',
		'menu_icon' => 'dashicons-download',
	);
	register_post_type( 'downloads', $args );

	//tax
		$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'techcd-theme' ),
		'singular_name'              => _x( 'Tipos', 'Taxonomy Singular Name', 'techcd-theme' ),
		'menu_name'                  => __( 'Tipos', 'techcd-theme' ),
		'all_items'                  => __( 'Ver todos tipos', 'techcd-theme' ),
		'parent_item'                => __( 'Ver tipo parente', 'techcd-theme' ),
		'parent_item_colon'          => __( 'Tipo parente:', 'techcd-theme' ),
		'new_item_name'              => __( 'Novo nome do Tipo', 'techcd-theme' ),
		'add_new_item'               => __( 'Adicionar novo Tipo', 'techcd-theme' ),
		'edit_item'                  => __( 'Editar Tipo', 'techcd-theme' ),
		'update_item'                => __( 'Atualizar Tipo', 'techcd-theme' ),
		'separate_items_with_commas' => __( 'Separe os Tipos por virgula', 'techcd-theme' ),
		'search_items'               => __( 'Pesquisar Tipos', 'techcd-theme' ),
		'add_or_remove_items'        => __( 'Adicionar ou Remover Tipos', 'techcd-theme' ),
		'choose_from_most_used'      => __( 'Escolher entre os mais usados', 'techcd-theme' ),
		'not_found'                  => __( 'Nada encontrado', 'techcd-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
	);
	register_taxonomy( 'downloads_tipos', array( 'downloads' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'cpt_downloads', 0 );

}
?>
