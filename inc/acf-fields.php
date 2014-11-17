<?php
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
?>
