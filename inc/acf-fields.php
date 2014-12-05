<?php
require get_template_directory() . '/inc/advanced-custom-fields/acf.php';
add_action('acf/register_fields', 'my_register_fields');
function my_register_fields(){
    include_once(get_template_directory() . '/inc/acf-repeater/repeater.php');
	//include_once(get_template_directory() . '/inc/acf-hidden/acf-hidden.php');
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'sub_title',
		'title' => 'Outros',
		'fields' => array (
			array (
				'key' => 'field_54402d412e368',
				'label' => 'Sub título do post',
				'name' => 'sub_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'acf_resumo',
				'label' => 'Resumo',
				'name' => 'resumo',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'shop_order',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => '',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_orcamento-opcoesinformacoes',
		'title' => 'Orçamento - Opções/Informações',
		'fields' => array (
			array (
				'key' => 'field_54590abb24535',
				'label' => 'Disponibilidade',
				'name' => 'woo_status_orcamento',
				'type' => 'radio',
				'choices' => array (
					'Em estoque' => 'Em estoque',
					'Sob encomenda' => 'Sob encomenda',
				),
				'other_choice' => 1,
				'save_other_choice' => 1,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_546a2a0547322',
				'label' => 'Arquivos relacionados',
				'name' => 'downloads_rel',
				'type' => 'relationship',
				'instructions' => 'Selecione os downloads relacionados a esse produto',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'downloads',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_5481f94d7a989',
				'label' => 'Código do produto',
				'name' => 'id_produto',
				'type' => 'text',
				'instructions' => 'Classificação numérica do produto (ID)',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_downloads',
		'title' => 'Downloads',
		'fields' => array (
			array (
				'key' => 'field_546a1e4dfcf53',
				'label' => 'Arquivo',
				'name' => 'downloads_file',
				'type' => 'file',
				'required' => 1,
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'downloads',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_servicos',
		'title' => 'Serviços',
		'fields' => array (
			array (
				'key' => 'field_546cc9f67fcb0',
				'label' => 'Icone',
				'name' => 'servicos_icone',
				'type' => 'select',
				'instructions' => 'Selecione o icone que ficará do lado direito do serviço',
				'choices' => array (
					'monitor' => 'Monitor',
					'camera' => 'Câmera',
					'chave' => 'Chave inglesa',
					'lapis' => 'Lápis',
					'musica' => 'Musica',
					'raio' => 'Raio',
					'false' => 'Sem ícone',
				),
				'default_value' => 'false',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_546cd621749cd',
				'label' => 'Itens',
				'name' => 'servicos_itens',
				'type' => 'repeater',
				'instructions' => 'Adicione itens ao serviço',
				'sub_fields' => array (
					array (
						'key' => 'field_546cd665749ce',
						'label' => 'Texto',
						'name' => 'servicos_itens_text',
						'type' => 'text',
						'instructions' => 'Texto do item',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => 1,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Adicionar novo item',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'servicos',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
			),
		),
		'menu_order' => 0,
	));
}
?>
