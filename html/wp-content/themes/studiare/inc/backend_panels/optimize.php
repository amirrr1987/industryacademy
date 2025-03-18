<?php
#theme_optimization
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Advanced', 'studiare' ),
	'id'                => 'sc_theme_optimization',
	'icon'              => 'fal fa-globe',
	'fields'            => array(
	    /*array(
			'id'       => 'sc_defer_scripts',
			'title'    => esc_html__( 'تعویق بارگذاری فایل های جاوا اسکریپت', 'studiare' ),
			'type'     => 'switch',
			'default'  => false,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		array(
			'id'       => 'sc_defer_scripts_exclude',
			'type'     => 'textarea',
			'mode'      => 'css',
			'title'    => esc_html__('نادیده گرفتن تعویق برای فایل های جاوا اسکریپت', 'studiare'),
			'subtitle' => esc_html__('نام فایل را بدون پسوند بنویسید و برای نوشتن نام چند فایل بین آنها کاما قرار دهید', 'studiare'),
			'placeholder' => 'myscript,yourscript'
		),*/
		
		array(
			'id'       => 'sc_remove_ver_css_js',
			'title'    => esc_html__( 'Delete version of CSS and JavaScript files', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		array(
			'id'       => 'sc_disable_gutenberg_widgets',
			'title'    => esc_html__( 'Disable gutenberg for widgets page', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		array(
			'id'       => 'sc_disable_gutenberg_in_posts',
			'title'    => esc_html__( 'Disable gutenberg for post page', 'studiare' ),
			'type'     => 'switch',
			'default'  => false,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		array(
			'id'       => 'sc_disable_admin_menu_button',
			'title'    => esc_html__( 'Disable Admin Menu Button', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		array(
			'id'       => 'sc_dequee_elementor_fontawesome',
			'title'    => esc_html__( 'Disable Elementor Fontawesome', 'studiare' ),
			'subtitle' => esc_html__( 'for increasing load page speed you can disable these fonticons', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
	)
) );