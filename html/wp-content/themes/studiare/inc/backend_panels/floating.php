<?php

# floating button
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Floating Buttons', 'studiare' ),
	'id' => 'floating_btns',
	'icon' => 'fal fa-location-arrow',
	'fields' => array(
	    )));
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Floating Button', 'studiare' ),
	'id' => 'floating_btn',
	'subsection' => true,
	'icon' => 'fal fa-bars',
	'fields' => array(
		array(
			'id'        => 'sc_floating_btn',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Floating Button', 'studiare' ),
			'subtitle'  => esc_html__( 'A Nice Button at Right Side of Your Website That Shows Content of A Page Designed By Elementor in A Popup', 'studiare' ),
			'default'   => false,
		),
		array(
        'id'       => 'sc_floating_btn_content',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Floating Button Page Content', 'studiare' ),
        'subtitle' => esc_html__( 'Select A Page Designed By Elemntor To Show Content in Popup Container', 'studiare' ),
		'required'  => array('sc_floating_btn', '=', '1'),
        //'desc'     => __( 'Page will be marked as front for this post type', 'studiare' ),
		),
		array(
			'id'       => 'sc_floating_btn_color1',
			'type'     => 'color',
			'title'    => esc_html__( 'Wave Color  1', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['sc_floating_btn_color1'],
			'default'  => '#FFC107', //'#000000'
			'required'  => array('sc_floating_btn', '=', '1'),
		),
		array(
			'id'       => 'sc_floating_btn_color2',
			'type'     => 'color',
			'title'    => esc_html__( 'Wave Color 2', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['sc_floating_btn_color2'],
			'default'  => '#E91E63', //'#1d1d1f'
			'required'  => array('sc_floating_btn', '=', '1'),
		),
		array(
			'id'       => 'sc_floating_btn_color3',
			'type'     => 'color',
			'title'    => esc_html__( 'Background Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['sc_floating_btn_color3'],
			'default'  => '#fff', //'#e0e0e0'
			'required'  => array('sc_floating_btn', '=', '1'),
		)
	)
) );

# floating contact button
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Contact Floating Button', 'studiare' ),
	'id' => 'contact_floating_btn',
	'subsection' => true,
	'icon' => 'fal fa-phone-alt',
	'fields' => array(
		array(
			'id'        => 'sc_contact_floating_btn',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Contact Floating Button', 'studiare' ),
			'default'   => false,
		),
		array(
        'id'       => 'sc_contact_floating_btn_content',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Contact Button Page Content', 'studiare' ),
        'subtitle' => esc_html__( 'Select A Page Designed By Elemntor To Show Content in Popup Container', 'studiare' ),
		'required'  => array('sc_contact_floating_btn', '=', '1'),
        //'desc'     => __( 'Page will be marked as front for this post type', 'studiare' ),
		),
		array(
			'id'       => 'sc_contact_floating_btn_bg',
			'type'     => 'color',
			'title'    => esc_html__( 'Background Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['sc_contact_floating_btn_bg'],
			'default'  => '#8BC34A', //'#000000'
			'required'  => array('sc_contact_floating_btn', '=', '1'),
		),
		array(
			'id'       => 'sc_contact_floating_btn_brdr',
			'type'     => 'color',
			'title'    => esc_html__( 'Button Border Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['sc_contact_floating_btn_brdr'],
			'default'  => '#C5E1A5', //'#000000'
			'required'  => array('sc_contact_floating_btn', '=', '1'),
		),
		array(
			'id'        => 'sc_contact_floating_btn_title',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Button Title', 'studiare' ),
			'required'  => array('sc_contact_floating_btn', '=', '1'),
			'default'   => true,
		),
		array(
			'id'        => 'sc_contact_floating_btn_title_txt',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Title', 'studiare' ),
			'required'  => array('sc_contact_floating_btn_title', '=', '1'),
			'default'   => esc_html__( 'Contact Us', 'studiare' ),
		),
		array(
			'id'        => 'studi_custom_floating_btn_content_margin',
			'type'      => 'slider',
			'title'     => esc_html__( 'Content around spacing', 'studiare' ),
			'required'  => array('sc_contact_floating_btn', '=', '1'),
			"default" => 10,
            'min' => 0,
            'step' => 1,
            'max' => 45,
		),
		
	)
) );