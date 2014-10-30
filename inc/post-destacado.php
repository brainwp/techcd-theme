<?php
class Post_Destacado {
	public function __construct($types) {
		$this->types = $types;
		add_image_size( 'th-destaque', 400, 220, true );
		add_action( 'add_meta_boxes', array( $this, 'add' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add($type){
		if(in_array( $type, $this->types )){
			add_meta_box(
				'post_destacado_metabox'
				,__( 'Post destacado', 'techcd-theme' )
				,array( $this, 'render' )
				,$type
				,'advanced'
				,'high'
			);
		}
	}
	public function render($post){
		wp_nonce_field( 'post_destacado_metabox', 'post_destacado_nonce' );
		$option = get_option('post_destacado_option');
		_e('<label>Deseja colocar esse post como destacado na página inicial? (somente um post irá aparecer)</label><br>','techcd-theme');
		if($option == $post->ID){
			echo '<input type="radio" name="post_destacado" value="true" checked>Sim <br>';
            echo '<input type="radio" name="post_destacado" value="false">Não';
		}
		else{
			echo '<input type="radio" name="post_destacado" value="true">Sim <br>';
            echo '<input type="radio" name="post_destacado" value="false" checked>Não';
		}
	}
	public function save($post_id){
		if(isset($_POST['post_destacado'])){
			$radio = $_POST['post_destacado'];
			if($radio == 'true'){
				update_option('post_destacado_option', $post_id);
			}
			elseif($radio == 'false' && get_option('post_destacado_option') == $post_id){
				delete_option('post_destacado_option');
			}
		}
	}
}
new Post_Destacado(array('post','page','products'));
