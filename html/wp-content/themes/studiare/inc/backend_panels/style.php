<?php
# Styling
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Style', 'studiare' ),
	'id' => 'colors',
	'icon' => 'fal fa-highlighter',
) );


Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Style', 'studiare' ),
	'id' => 'light_mode',
	'subsection' => true,
	'icon' => 'fal fa-highlighter',
	'fields' => array(
	    array(
			'id'       => 'siteb_backgrount_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Site Background', 'studiare' ),
			'output'   => array('.main-page-content.default-margin, body, .wrap, .main-page-content'),
			'default'  => array(
				'background-color' => '#f8f9fa'
			)
		),
		array(
			'id'       => 'primary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Primary Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['primary_color'],
			'default'  => '#26a69a', //'#f9a134'
			'output_variables' => true,
		),
		array(
			'id'       => 'secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['secondary_color'],
			'default'  => '#4ecdc4', //'#1e83f0'
			'output_variables' => true,
		),
		array(
			'id'       => 'eshare_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Tooltips Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => $studiare_selectors['eshare_color'],
			'default'  => '#494949' //'#484848'
		)
	)
) );
#header_button
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Dark Mode', 'studiare' ),
	'id'                => 'sc_darkmode',
	'subsection' => true,
	'icon' => 'fal fa-moon',
	'fields'            => array(
	    array(
			'id'        => 'sc_darkmode_ready',
			'type'      => 'switch',
			'title'     => esc_html__( 'Dark Mode', 'studiare' ),
			'subtitle'  => esc_html__( 'By this option you can change light colors of theme to dark', 'studiare' ),
			'default'   => false,
		),
		array(
			'id'       => 'dark_primary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Primarry Dark Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'required'  => array('sc_darkmode_ready', '=', true),
			'output_variables' => true,
			'default'  => '#150550' 
		),
		array(
			'id'       => 'dark_secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Dark Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'required'  => array('sc_darkmode_ready', '=', true),
			'output_variables' => true,
			'default'  => '#020134' 
		),
		array(
			'id'       => 'dark_light_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Text light color for Dark mode', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'required'  => array('sc_darkmode_ready', '=', true),
			'output_variables' => true,
			'default'  => '#fff' 
		),

	),	
) );    