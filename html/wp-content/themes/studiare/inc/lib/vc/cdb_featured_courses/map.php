<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || codebean_is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) {

	vc_map( array(
		'base'             => 'cdb_featured_courses',
		'name'             => esc_html__( 'دوره های ویژه', 'studiare' ),
		'description'      => esc_html__( 'نمایش دوره های ویژه', 'studiare' ),
		'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
		'icon'             => 'admin_vc_addon',
		'params'           => array(
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'جستار دوره ها', 'studiare' ),
				'param_name' => 'products_query',
				'admin_label' => true,
				'settings' => array(
					'size' => array('hidden' => false, 'value' => 12),
					'order_by' => array('value' => 'date'),
					'post_type' => array('value' => 'product', 'hidden' => false)
				),
				'description' => esc_html__( 'ایجاد حلقه وردپرس، برای پر کردن محصولات از سایت شما.', 'studiare' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'ستون ها', 'studiare' ),
				'param_name' => 'columns',
				'admin_label' => true,
				'std' => 4,
				'value' => array(
					esc_html__( '4 ستون', 'studiare' )  => 4,
					esc_html__( '3 ستون', 'studiare' )  => 3,
					esc_html__( '2 ستون', 'studiare' )  => 2,
				),
				'description' => esc_html__( '', 'studiare' )
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'گردونه', 'studiare' ),
			'param_name' => 'is_carousel',
			'std' => 'no',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'yes',
				esc_html__( 'خیر', 'studiare' )   => 'no',
			),
			'description' => esc_html__( '', 'studiare' )
		),array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'نمایش فلش های بعد و قبل', 'studiare' ),
			'param_name' => 'carousel_navs',
			'std' => 'false',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'description' => esc_html__( '', 'studiare' )
		),array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'نمایش نقطه های ناوبری', 'studiare' ),
			'param_name' => 'carousel_dots',
			'std' => 'false',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'description' => esc_html__( '', 'studiare' )
		),//end adding carouse by suncode
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'کلاس اضافی css', 'studiare' ),
				'param_name' => 'el_class',
				'value' => '',
				'description' => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
			),

			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Css', 'studiare' ),
				'param_name' => 'css',
				'group' => esc_html__( 'تنظیمات طراحی', 'studiare' )
			)
		)
	) );

	if ( class_exists('WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Cdb_Featured_Courses extends WPBakeryShortCode {}
	}

}