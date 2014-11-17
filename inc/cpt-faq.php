<?php
if ( ! function_exists('cpt_faq') ) {

// Register Custom Post Type
function cpt_faq() {

	$labels = array(
		'name'                => _x( 'Tópicos de ajuda', 'Post Type General Name', 'techcd-theme' ),
		'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'techcd-theme' ),
		'menu_name'           => __( 'FAQ', 'techcd-theme' ),
		'parent_item_colon'   => __( 'Tópico parente', 'techcd-theme' ),
		'all_items'           => __( 'Todos tópicos', 'techcd-theme' ),
		'view_item'           => __( 'Ver tópico', 'techcd-theme' ),
		'add_new_item'        => __( 'Adicionar novo tópico', 'techcd-theme' ),
		'add_new'             => __( 'Adicionar novo', 'techcd-theme' ),
		'edit_item'           => __( 'Editar tópico', 'techcd-theme' ),
		'update_item'         => __( 'Atualizar tópico', 'techcd-theme' ),
		'search_items'        => __( 'Pesquisar tópico', 'techcd-theme' ),
		'not_found'           => __( 'Nada encontrado', 'techcd-theme' ),
		'not_found_in_trash'  => __( 'Nada encontrado', 'techcd-theme' ),
	);
	$args = array(
		'label'               => __( 'faq', 'techcd-theme' ),
		'description'         => __( 'FAQ', 'techcd-theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => true,
		'capability_type'     => 'page',
		'menu_icon' => 'dashicons-testimonial',
	);
	register_post_type( 'faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cpt_faq', 0 );

}
function faq_per_page( $query ) {
    if ( is_post_type_archive('faq') && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '-1' );
    }
}
add_action( 'pre_get_posts', 'faq_per_page' );
?>
