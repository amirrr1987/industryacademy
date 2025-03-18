<?php



# Portfolio Settings
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Portfolio', 'studiare' ),
	'id'                => 'portfolio_settings',
	'icon'              => 'fal fa-table',
	'fields'            => array(
	    array(
			'id'        => 'portfolio_status',
			'type'      => 'switch',
			'title'     => esc_html__( 'Portfolio Post Type', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'       => 'portfolio_columns',
			'type'     => 'button_set',
			'title'    => esc_html__('Columns', 'studiare'),
			'subtitle' => esc_html__('Number of Portfolios in a Row', 'studiare'),
			'options'  => array(
				'two'  => esc_html__( '2-Column', 'studiare' ),
				'three'  => esc_html__( '3-Column', 'studiare' ),
				'four'  => esc_html__( '4-Column', 'studiare' ),
			),
			'default' => 'three',
			'required'  => array('portfolio_status', '=', 'true'),
		),
		array(
			'id'        => 'portfolio_filters',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Portfolio Filters', 'studiare' ),
			'options'   => array(
				'left'  => esc_html__( 'Right', 'studiare' ),
				'right' => esc_html__( 'Left', 'studiare' ),
				'no'    => esc_html__( 'Disable', 'studiare' )
			),
			'default'   => 'left',
			'required'  => array('portfolio_status', '=', 'true'),
		),
		array(
			'id'       => 'portfolio_per_page',
			'type'     => 'spinner',
			'title'    => esc_html__( 'Portfolios Per Page', 'studiare' ),
			'default'  => '9',
			'min'      => '1',
			'max'      => '20',
			'required'  => array('portfolio_status', '=', 'true'),
		),
		array(
			'id'        => 'portfolio_nav',
			'type'      => 'switch',
			'title'     => esc_html__( 'Portfolio Navigation', 'studiare' ),
			'default'   => true,
			'required'  => array('portfolio_status', '=', 'true'),
		),
		array(
			'id'        => 'portfolio_featured_image',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Feautured Image in Single Portfolio', 'studiare' ),
			'default'   => true,
			'required'  => array('portfolio_status', '=', 'true'),
		),
		array(
            'id'       => 'portfolio_slug',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Post Type Slug', 'studiare' ),
            'default'  => 'portfolio',
            'placeholder' => 'portfolio',
            'required'  => array('portfolio_status', '=', 'true'),
        ),
        array(
            'id'       => 'portfolio_singular_name',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Post Type Name', 'studiare' ),
            'default'  => esc_html__( 'Portfolio', 'studiare' ),
            'placeholder' => esc_html__( 'Portfolio', 'studiare' ),
            'required'  => array('portfolio_status', '=', 'true'),
        ),
        array(
            'id'       => 'portfolio_plural_name',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Post Type Name for Plural', 'studiare' ),
            'default'  => esc_html__( 'Portfolios', 'studiare' ),
            'placeholder' => esc_html__( 'Portfolios', 'studiare' ),
            'required'  => array('portfolio_status', '=', 'true'),
        ),
        array(
            'id'       => 'portfolio_category_slug',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Post Type Category Slug', 'studiare' ),
            'default'  => 'portfolio_category',
            'placeholder' => 'portfolio_category',
            'required'  => array('portfolio_status', '=', 'true'),
        ),
        array(
            'id'       => 'portfolio_tag_slug',
            'type'     => 'text',
            'title'    => esc_html__( 'Portfolio Post Type Tag Slug', 'studiare' ),
            'default'  => 'portfolio_tag',
            'placeholder' => 'portfolio_tag',
            'required'  => array('portfolio_status', '=', 'true'),
        ),
	)
) );
