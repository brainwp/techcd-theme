<?php
class Campos_Antigos {
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add' ) );
	}

	public function add($type){
		add_meta_box(
			'campos_antigos_metabox'
			,__( 'Campos Antigos', 'techcd-theme' )
			,array( $this, 'render' )
			,'product'
			,'advanced'
			,'high'
		);
	}
	public function render($post){
		$fields = get_post_meta( $post->ID, 'campos_antigos', true );
		if(!empty($fields) && is_array($fields)){
			$html = '';
			foreach($fields as $key => $value){
				if(!empty($value) && !empty($key)){
					$html .= '<b>'.$key.'</b>: '.$value;
					$html .= '<br><br>';
				}
			}
			echo $html;
		}
	}
}
new Campos_Antigos();
