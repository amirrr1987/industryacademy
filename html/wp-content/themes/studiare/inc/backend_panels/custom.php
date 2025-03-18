<?php

#Search Page
$search_post_types = array(
	'enabled' => array (
		'post'=>__("Post","studiare"), 
		'product'=>__("Product","studiare"), 
		'page'=>__("Page","studiare"), 
		'tp_event'=>__("Event","studiare")

	),'disabled' => array (
		'teacher'=>__("Teacher","studiare"),
	),
);
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Search Page', 'studiare' ),
	'id'                => 'search_page_settings',
	'icon'              => 'fal fa-search',
	'fields'            => array(
		array(
			'id'        => 'sp_post_types',
			'type'      => 'sorter',
			'title'     => esc_html__( 'Post Types', 'studiare' ),
			'subtitle'  => esc_html__( 'Select which post type to show in search box and search results.', 'studiare' ),
			'options'   => $search_post_types,
		),
		array(
			'id'        => 'sp_result_perpage',
			'type'      => 'text',
			'title'     => esc_html__( 'Number of results per page', 'studiare' ),
			'default'   => '9',
		),
	)
) );

#custom codes
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Custom Codes', 'studiare' ),
	'id'                => 'sc_custom_code_settings',
	'icon'              => 'fal fa-code',
	'fields'            => array(
		array(
			'id'       => 'sc_custom_css_codes',
			'type'     => 'ace_editor',
			'mode'      => 'css',
			'title'    => esc_html__('Custom Css', 'studiare'),
		),
	)
) );
