<?php
/*
 *
 * ---> START SECTIONS
 *
 */

# General Settings
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'General', 'studiare' ),
	'id'                => 'codebean_general',
	'desc'              => '',
	'customizer_width'  => '400px',
	'submenu'           => true,
	'icon'              => 'fal fa-home-alt',
	'fields' => array(
	    
	    
	    
	    
		array (
			'id' => 'favicon',
			'type' => 'media',
			'desc' => esc_html__( 'Upload image: png, ico, Note: If the Favicon of your browser tab does not change, choose an icon from menu>Appearance>Customization>Site Identity.', 'studiare' ),
			'operator' => 'and',
			'title' => esc_html__( 'Favicon', 'studiare' ),
			'subtitle'  => esc_html__( 'Select your Favicon', 'studiare' ),
		),
		array (
			'id' => 'favicon_retina',
			'type' => 'media',
			'desc' => esc_html__( 'Upload image: png, ico', 'studiare' ),
			'operator' => 'and',
			'title' => esc_html__( 'Retina Favicon', 'studiare' ),
			'subtitle'  => esc_html__( 'Select your Favicon for Retina', 'studiare' ),
		),
		array( 
        'id' => 'preloader-section',
        'type' => 'section',
        'title' => esc_html__('Preloader Options', 'studiare'),
        'indent' => true 
        ),
		array(
			'id'       => 'studiare_preloader',
			'type'     => 'switch',
			'title'    => esc_html__('Website Preloader', 'studiare'),
			'default'  => false
		),
		array(
			'id'       => 'preloader_icon',
			'type'     => 'select',
			'title'    => esc_html__('Preloader Type', 'studiare'),
			'default'  => 'circle',
			'options'   => array(
				
				'custom-image' => esc_html__( 'Custom Image', 'studiare' ),
				'circle' => esc_html__( 'Circle', 'studiare' ),
				'square-boxes' => esc_html__( 'Square Boxes', 'studiare' ),
				'dots' => esc_html__( 'Dots', 'studiare' ),
				'book' => esc_html__( 'Book', 'studiare' ),
				'book2' => esc_html__( 'Book 2', 'studiare' ),
				'pencil' => esc_html__( 'Pencil', 'studiare' ),
				'bicycle' => esc_html__( 'Bicycle', 'studiare' ),
			),
			'required' => array('studiare_preloader', '=', true),
			'select2'   => array('allowClear' => false)
		),
		array (
			'id' => 'custom_preloader_image',
			'type' => 'media',
			'operator' => 'and',
			'title' => esc_html__( 'Choose Image', 'studiare' ),
			'required' => array('preloader_icon', '=', 'custom-image'),
		),
		array(
			'id'       => 'sc_preloader_icon_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Preloader Icon Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => false,
			'preview' => false,
			'required' => array('studiare_preloader', '=', true),
			'output'   => array('.studiare-preloader-icon .double-bounce1, .studiare-preloader-icon .double-bounce2, .studiare-preloader-icon .sk-cube-grid .sk-cube, .dotspreloader .dot'),
			'default'  => array(
				'background-color' => '#26A69A'
			),
			'output_variables' => true,
		),
		array(
			'id'       => 'sc_preloader_background',
			'type'     => 'background',
			'title'    => esc_html__( 'Preloader Background Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => false,
			'preview' => false,
			'required' => array('studiare_preloader', '=', true),
			'output'   => '.studiare-preloader',
			'default'  => array(
				'background-color' => '#fff'
			),
		),
		array( 
        'id' => 'other-options-section',
        'type' => 'section',
        'title' => esc_html__('Other Options', 'studiare'),
        'indent' => true 
        ),
		array(
			'id'        => 'google_api_key',
			'type'      => 'text',
			'title'     => esc_html__( 'Google API Key', 'studiare' ),
			'description' => esc_html__( 'Enter here the secret api key you have created on Google APIs', 'studiare' )
		),
		/* progressbar start */
	    array(
			'id'        => 'progressbar',
			'type'      => 'select',
			'title'     => __( 'Progress Bar', 'studiare' ),
			'options'   => array(
				'disable'         => __( 'Disable', 'studiare' ),
				'show_in_singles' => __( 'Show In Single Posts', 'studiare' ),
				'show_in_all'     => __( 'Show In All', 'studiare' ),
			),
			'select2'   => array('allowClear' => false),
			'default'  => 'disable',
		),
		array(
			'id'       => 'progressbar_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Progress Bar Color', 'studiare' ),
			'transparent' => false,
			'output'   => array('#sc_bt_progress,#sc_scroll_progress'),
			'default'  => '#7983ff', //'#000000'
			'required' => array('progressbar', '!=', 'disable'),
		),
	    /* progressbar end */
		/*
		array(
			'id'        => 'sc_site_layout',
			'type'      => 'image_select',
			'title'     => esc_html__( 'Site Layout', 'studiare' ),
			'default'   => 'boxed',
			'options'   => array(
				'boxed'      => array(
					'alt'   => esc_html__( 'Boxed', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
				),
				'fullwidth'      => array(
					'alt'   => esc_html__( 'Full Width', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/1col.png'
				)
			)
		), */
		
		
	)
) );

