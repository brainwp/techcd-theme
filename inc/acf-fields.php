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
?>
