<?php
function options_techcd() {

	$settings = new Odin_Theme_Options(
		'techcd-options', // Slug/ID of the Settings Page (Required)
		'Opções do tema', // Settings page name (Required)
		'edit_theme_options' // Page capability (Optional) [default is manage_options]
	);

	$settings->set_tabs(
		array(
			array(
				'id' => 'home_opt', // Slug/ID of the Settings tab (Required)
				'title' => __( 'Home', 'techcd-theme' ), // Settings tab title (Required)
			),
			array(
				'id' => 'footer', // Slug/ID of the Settings tab (Required)
				'title' => __( 'Rodapé', 'techcd-theme' ), // Settings tab title (Required)
			),
			array(
				'id' => 'woo_opt', // Slug/ID of the Settings tab (Required)
				'title' => __( 'Vitrine', 'techcd-theme' ), // Settings tab title (Required)
			),
			//array(
			//	'id' => 'odin_html5',
			//	'title' => __( 'HTML5 Fields', 'techcd-theme' )
			//)
		)
	);

	$settings->set_fields(
		array(
			'rodape_section' => array( // Slug/ID of the section (Required)
				'tab'   => 'footer', // Tab ID/Slug (Required)
				'title' => __( 'Opções do Rodapé', 'techcd-theme' ), // Section title (Required)
				'fields' => array( // Section fields (Required)

					/**
					 * Default input examples.
					 */

					// Text Field.
					array(
						'id'         => 'footer_cnpj', // Required
						'label'      => __( 'CNPJ', 'techcd-theme' ), // Required
						'type'       => 'text', // Required
						// 'default'  => 'Default text', // Optional
						//'description' => __( 'Text field description', 'techcd-theme' ) // Optional
					),
					array(
						'id'         => 'footer_endereco', // Required
						'label'      => __( 'Endereço', 'techcd-theme' ), // Required
						'type'       => 'textarea', // Required
						// 'default'  => 'Default text', // Optional
						'description' => __( 'Dentro da caixa de texto aperte enter para quebrar a linha', 'techcd-theme' ) // Optional
					),
					array(
						'id'         => 'footer_tel', // Required
						'label'      => __( 'Telefone', 'techcd-theme' ), // Required
						'type'       => 'text', // Required
						// 'default'  => 'Default text', // Optional
						//'description' => __( 'Text field description', 'techcd-theme' ) // Optional
					),
			        array(
						'id'         => 'footer_emails', // Required
						'label'      => __( 'Emails de contato / venda', 'techcd-theme' ), // Required
						'type'       => 'textarea', // Required
						// 'default'  => 'Default text', // Optional
						'description' => __( 'Coloque um email por linha', 'techcd-theme' ) // Optional
					),
			        array(
						'id'         => 'footer_mapa_link', // Required
						'label'      => __( 'Link do mapa', 'techcd-theme' ), // Required
						'type'       => 'text', // Required
						// 'default'  => 'Default text', // Optional
					),
					array(
						'id'         => 'footer_mapa_img', // Required
						'label'      => __( 'Imagem do mapa', 'techcd-theme' ), // Required
						'type'       => 'image', // Required
						// 'default'  => 'Default text', // Optional
					),
				)
			),
			'home_section' => array( // Slug/ID of the section (Required)
				'tab'   => 'home_opt', // Tab ID/Slug (Required)
				'title' => __( 'Opções da Página Inicial', 'techcd-theme' ), // Section title (Required)
				'fields' => array( // Section fields (Required)

					/**
					 * Default input examples.
					 */

					// Text Field.
					array(
						'id'         => 'marcas_img', // Required
						'label'      => __( 'Imagem das Marcas', 'techcd-theme' ), // Required
						'type'       => 'image', // Required
						// 'default'  => 'Default text', // Optional
					),
				)
			),
			'woo_section' => array( // Slug/ID of the section (Required)
			'tab'   => 'woo_opt', // Tab ID/Slug (Required)
			'title' => __( 'Opções da Vitrine', 'techcd-theme' ), // Section title (Required)
			'fields' => array( // Section fields (Required)

					/**
					 * Default input examples.
					 */

					array(
						'id'         => 'telefone_img', // Required
						'label'      => __( 'Imagem do telefone', 'techcd-theme' ), // Required
						'type'       => 'image', // Required
						// 'default'  => 'Default text', // Optional
					),
					array(
						'id'         => 'blog_link_img', // Required
						'label'      => __( 'Imagem do blog', 'techcd-theme' ), // Required
						'type'       => 'image', // Required
						// 'default'  => 'Default text', // Optional
					),
					// Text Field.
					array(
						'id'         => 'blog_link_url', // Required
						'label'      => __( 'Link para o blog', 'techcd-theme' ), // Required
						'type'       => 'text', // Required
						'default'  =>  home_url() . '/blog', // Optional
					),
				)
			),
		)
	);
}

add_action( 'init', 'options_techcd', 1 );
?>
