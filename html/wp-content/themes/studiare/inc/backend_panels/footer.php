<?php


# Footer Settings
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Footer', 'studiare' ),
	'id'                => 'footer_settings',
	'customizer_width'  => '400px',
	'icon'              => 'fal fa-file',
	'fields'            => array(
	array(
			'id'        => 'sc_before_footer',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show A Page Content at Top of Footer', 'studiare' ),
			'default'   => false,
		),
		array(
        'id'       => 'sc_before_footer_content',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Select Page', 'studiare' ),
		'required'  => array('sc_before_footer', '=', '1'),
        'desc'     => __( 'Select A Page Designed By Elemntor To Show Before Footer Area. Example: Wave used in Studiare mian demo', 'studiare' ),
		),
		array(
			'id'        => 'footer_visibility',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Footer', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'studi_footer_type',
			'type'      => 'select',
			'title'     => esc_html__( 'Footer Type', 'studiare' ),
			'subtitle'  => esc_html__( 'Choose the type of footer. Made by studiare codes in the widgets or design by Elementor', 'studiare' ),
			'description'  => "<span class='notice-badge'>".esc_html__( 'Notice:', 'studiare' )."</span>".esc_html__( 'This option applies to your entire website, if a page has a different footer, you can set the footer to the default option from the page settings by editing the same page.', 'studiare' ),
			'required'  => array('footer_visibility', '=', '1'),
			'default'   => 'default',
			'options'   => array(
				'default' => esc_html__( 'Default', 'studiare' ),
				'page'  => esc_html__( 'Page', 'studiare' )
			),
			'select2'   => array('allowClear' => false)
		),
		array(
        'id'       => 'footer_page_id',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'studi_footer' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Footer Page', 'studiare' ),
		'required'  => array('studi_footer_type', '=', 'page'),
        //'desc'     => __( 'Page will be marked as front for this post type', 'studiare' ),
		),
		array(
			'id'        => 'footer_color_scheme',
			'type'      => 'select',
			'title'     => esc_html__( 'Footer Text Color', 'studiare' ),
			'default'   => 'light',
			'options'   => array(
				'dark' => esc_html__( 'Dark', 'studiare' ),
				'light'  => esc_html__( 'Light', 'studiare' )
			),
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'footer-widgets-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Background', 'studiare' ),
			'output'   => '.site-footer',
			'default'  => array(
				'background-color' => '#2e3e77'
			)
		),
		array(
			'id'        => 'footer_widgets',
			'type'      => 'switch',
			'required'  => array('footer_visibility', '=' , '1'),
			'title'     => esc_html__( 'Footer Widgets', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'footer_columns',
			'type'      => 'image_select',
			'required'  => array('footer_widgets', '=', '1'),
			'title'     => esc_html__( 'Footer Columns', 'studiare' ),
			'default'   => 'three',
			'options'   => array(
				'four'   => array(
					'alt'   => '4 Columns',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-4.png' ),
				),
				'three'  => array(
					'alt'   => '3 Columns',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-3.png' ),
				),
				'two'    => array(
					'alt'   => '2 Columns',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-2.png' ),
				),
				'doubleleft'    => array(
					'alt'   => 'Double Left',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-double-right.png'),
				),
				'doubleright'   => array(
					'alt'   => 'Double Right',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-double-left.png'),
				),
				'one'     => array(
					'alt'   => '1 Column',
					'img' => get_parent_theme_file_uri('assets/images/admin/footer-1.png'),
				),
			),
		),
		array(
			'id'       => 'disable_copyrights',
			'type'     => 'switch',
			'title'    => esc_html__('Copyright Bar', 'studiare'),
			'default' => true
		),
		array(
			'id'       => 'copyrights-layout',
			'type'     => 'select',
			'title'    => esc_html__('Copyright Bar Layout', 'studiare'),
			'options'  => array(
				'default' => esc_html__('2-Column', 'studiare'),
				'centered' => esc_html__('Centered', 'studiare'),
			),
			'default' => 'default',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'copyrights',
			'type'     => 'text',
			'title'    => esc_html__('Copyright Text', 'studiare'),
			'subtitle' => esc_html__('Here, put the text you want to see in the copyright area. You can use shortcodes. example: [social_networks]', 'studiare'),
			'default'  => '© 2024.   قالب استادیار (سیمین دانشور). طراحی شده توسط <a href="http://suncode.ir">سان کد</a>'
		),
		array(
			'id'       => 'copyrights2',
			'type'     => 'text',
			'title'    => esc_html__('Copyright Bar Text 2', 'studiare'),
			'subtitle' => esc_html__('You can use the shortcode. example: [social_networks]', 'studiare'),
			'default'  => '[social_networks rounded]'
		),
		array(
			'id'       => 'scroll_top_btn',
			'type'     => 'switch',
			'title'    => esc_html__( 'Back to Top Button', 'studiare' ),
			'default' => true
		),
	)
) );