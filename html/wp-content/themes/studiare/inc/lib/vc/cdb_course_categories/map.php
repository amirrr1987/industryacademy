<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || codebean_is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) {

	vc_map( array(
		'base'             => 'cdb_course_categories',
		'name'             => esc_html__( 'دسته بندی های دوره ها', 'studiare' ),
		'icon'             => 'admin_vc_addon',
		'description'      => esc_html__( 'نمایش جدولی دسته بندی ها', 'studiare' ),
		'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
		'params'           => array(
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'نوع نمایش دسته بندی ها', 'studiare' ),
				'param_name'	=> 'parent',
				'value'			=> array(
					esc_html__( 'فقط دسته بندی های والد', 'studiare' )				    => '0',
					esc_html__( 'همه دسته بندی ها', 'studiare' )		=> '999'
				),
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> true,
				'heading'		=> esc_html__('تعداد دسته بندی های دوره ها برای نمایش', 'studiare' ),
				'param_name'	=> 'number',
				'value'			=> '',
			),
			array(
			"type" => "autocomplete",
			"heading" => esc_html__( "دسته بندی های استثناء", "studiare" ),
			"class"		=> "hide_in_vc_editor",
			"param_name" => "exclude_cats",
			'settings' 		=> array(
						'multiple'		=> true,
						'save_always'	=> true,
						'values'         => sc_studi_get_categoru_list(),
					),
			"description" => esc_html__( "این دسته بندی ها در نتایج نشان داده نخواهد شد.", "studiare" )
		),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'مرتب سازی بر اساس ', 'studiare' ),
				'param_name'	=> 'orderby',
				'value'			=> array(
					esc_html__( 'عنوان', 'studiare' )		=> 'title',
					esc_html__( 'ترتیب منو', 'studiare' )	    => 'menu_order'
				),
			),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'ترتیب ', 'studiare' ),
				'param_name'	=> 'order',
				'value'			=> array(
					esc_html__( 'صعودی', 'studiare' )		=> 'asc',
					esc_html__( 'نزولی', 'studiare' )	    => 'desc'
				),
			),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'طرح نمایش', 'studiare' ),
				'param_name'	=> 'sc_studi_cats_layout',
				'value'			=> array(
					esc_html__( 'پیش فرض', 'studiare' )		=> 'default',
					esc_html__( 'متریال', 'studiare' )	    => 'material',
					esc_html__( 'جدولی', 'studiare' )	    => 'grid',
					esc_html__( 'مورفی', 'studiare' )	    => 'morphing',
				),
			),
			array(
				'type'			=> 'attach_image',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'تصویر پیش فرض', 'studiare' ),
				'param_name'	=> 'sc_studi_cat_default_image',
				'value'			=> '',
			),
			array(
				'type'			=> 'checkbox',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'فعالسازی گردونه', 'studiare' ),
				'param_name'	=> 'sc_studi_cat_carousel',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( ' نمایش قبل و بعد', 'studiare' ),
				'param_name'	=> 'sc_studi_cats_car_nav',
				'value'			=> array(
					esc_html__( 'بله', 'studiare' )		=> 'true',
					esc_html__( 'خیر', 'studiare' )	    => 'false'
				),
				'group'	        => 'گردونه',
			),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( ' نمایش نقاط', 'studiare' ),
				'param_name'	=> 'sc_studi_cats_car_dots',
				'value'			=> array(
					esc_html__( 'بله', 'studiare' )		=> 'true',
					esc_html__( 'خیر', 'studiare' )	    => 'false'
				),
				'group'	        => 'گردونه',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'تعداد آیتم ها در دسکتاپ', 'studiare' ),
				'param_name'	=> 'sc_studi_cat_carouseitems_in_desktop',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'تعداد آیتم ها در تبلت', 'studiare' ),
				'param_name'	=> 'sc_studi_cat_carouseitems_in_tablet',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'تعداد آیتم ها در موبایل', 'studiare' ),
				'param_name'	=> 'sc_studi_cat_carouseitems_in_mobile',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'colorpicker',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'رنگ نقطه فعال', 'studiare' ),
				'param_name'	=> 'sc_dots_active_color',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'colorpicker',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'رنگ نقطه ', 'studiare' ),
				'param_name'	=> 'sc_dots_normal_color',
				'group'	        => 'گردونه',
				'value'			=> '',
			),
			array(
				'type'			=> 'dropdown',
				'holder'		=> 'div',
				'class'			=> 'hide_in_vc_editor',
				'heading'		=> esc_html__( 'پنهان کردن خالی ها', 'studiare' ),
				'param_name'	=> 'hide_empty',
				'value'			=> array(
					esc_html__( 'بلی', 'studiare' )	=> '1',
					esc_html__( 'خیر', 'studiare' )	=> '0'
				),
				'admin_label' 	=> true
			)
		)
	) );

	if ( class_exists('WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Cdb_Course_Categories extends WPBakeryShortCode {}
	}

}