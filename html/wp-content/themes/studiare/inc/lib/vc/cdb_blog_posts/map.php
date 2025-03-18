<?php

vc_map( array(
	'base'             => 'cdb_blog_posts',
	'name'             => esc_html__( 'نمایش پست ها', 'studiare' ),
	'description'      => esc_html__( 'نمایش دوره ها، مطالب و ...', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'عنوان بخش', 'studiare' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'سایز عنوان', 'studiare' ),
			'param_name'  => 'title_font_size',
			'description'  => 'مقدار عددی را وارد نمایید',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'صخامت  عنوان', 'studiare' ),
			'param_name'  => 'title_font_weight',
			'description'  => 'مقدار عددی را وارد نمایید',
			'admin_label' => true,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ عنوان', 'studiare' ),
			'param_name'  => 'title_color',
			'admin_label' => true,
		),
		array(
			'type' 				=> 'iconpicker',
			'heading' 			=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 		=> 'icon',
			'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fapro',
					'iconsPerPage' => 100,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fapro',
				),
			'value'				=> ''
		),
		array(
			"type" => "loop",
			"heading" => esc_html__( "جستار وبلاگ", "studiare" ),
			"param_name" => "blog_query",
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'post', 'hidden' => false)
			),
			"description" => esc_html__( "ایجاد حلقه وردپرس، برای پر کردن پست های وبلاگ تنها از سایت شما.", "studiare" )
		),
		array(
			"type" => "autocomplete",
			"heading" => esc_html__( "دسته بندی های استثناء", "studiare" ),
			"class"		=> "hide_in_vc_editor",
			"param_name" => "blog_query_exclude",
			'settings' 		=> array(
						'multiple'		=> true,
						'save_always'	=> true,
						'values'         => sc_studi_get_categoru_list(),
					),
			"description" => esc_html__( "محصولات موجود در این دسته بندی ها در نتایج نشان داده نخواهد شد.", "studiare" )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'تعداد ستون ها', 'studiare' ),
			'param_name' => 'columns',
			'std' => '3',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => true,
			'value' => array(
				esc_html__( '1 ستونه', 'studiare' )    => 'one',
				esc_html__( '2 ستونه', 'studiare' )   => 'two',
				esc_html__( '3 ستونه', 'studiare' )   => 'three',
				esc_html__( '4 ستونه', 'studiare' )   => 'four',
			),
			'description' => esc_html__( '', 'studiare' )
		),//start adding carouse by suncode
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'طرح نمایش محصول', 'studiare' ),
			'param_name' => 'pro_layout',
			'std' => '3',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => true,
			'value' => array(
				esc_html__( 'طرح شماره یک', 'studiare' )    => 'layout1',
				esc_html__( 'طرح شماره دو', 'studiare' )    => 'layout2',
			),
			'description' => esc_html__( 'طرح شماره دو در حالت بدون گردونه کاربرد دارد', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'عدم نمایش امتیازهای دوره', 'studiare' ),
			'param_name' => 'teacher_ratings',
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'عدم نمایش توضیحات دوره', 'studiare' ),
			'param_name' => 'course_description',
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'عدم نمایش ویژگی اصلی', 'studiare' ),
			'param_name' => 'course_mid_feature', 
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'عدم نمایش تعداد فروش', 'studiare' ),
			'param_name' => 'course_sells_stat', 
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'عدم نمایش قیمت', 'studiare' ),
			'param_name' => 'course_price', 
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'محصول', 'studiare' )
		),
			array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'طرح نمایش پست', 'studiare' ),
			'param_name' => 'post_layout',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => true,
			'value' => array(
				esc_html__( 'پیش فرض', 'studiare' )    => 'default',
				esc_html__( 'جدولی - طرح یک', 'studiare' )    => 'grid_one',
			),
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'نمایش ادامه مطلب', 'studiare' ),
			'param_name' => 'sc_show_readmore',
			'admin_label' => false,
			"class"		=> "hide_in_vc_editor",
			'value' => array( 'بله' => 'true' ),
			'save_always' => true,
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'متن ادامه مطلب', 'studiare' ),
			'param_name' => 'sc_readmore_txt',
			'value' => '',
			"class"		=> "hide_in_vc_editor",
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'رنگ پس زمینه  ادامه مطلب', 'studiare' ),
			'param_name' => 'sc_readmore_bg_color',
			'value' => '',
			"class"		=> "hide_in_vc_editor",
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'رنگ هاور پس زمینه  ادامه مطلب', 'studiare' ),
			'param_name' => 'sc_readmore_bg_color_hover',
			'value' => '',
			"class"		=> "hide_in_vc_editor",
			'description' => esc_html__( '', 'studiare' ),
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' 				=> 'iconpicker',
			'heading' 			=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 		=> 'readmore_icon',
			'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fapro',
					'iconsPerPage' => 100,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fapro',
				),
			'value'				=> '',
			'group' => esc_html__( 'تنظیمات پست', 'studiare' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'گردونه', 'studiare' ),
			'param_name' => 'is_carousel',
			'std' => 'no',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => false,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'yes',
				esc_html__( 'خیر', 'studiare' )   => 'no',
			),
			'group'	        => 'گردونه',
			'description' => esc_html__( '', 'studiare' )
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
			'type' => 'dropdown',
			'heading' => esc_html__( 'نمایش فلش های بعد و قبل', 'studiare' ),
			'param_name' => 'carousel_navs',
			'std' => 'false',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => false,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'group'	        => 'گردونه',
			'description' => esc_html__( '', 'studiare' )
		),array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'نمایش نقطه های ناوبری', 'studiare' ),
			'param_name' => 'carousel_dots',
			'std' => 'false',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => false,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'group'	        => 'گردونه',
			'description' => esc_html__( '', 'studiare' )
		),array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'پخش خودکار', 'studiare' ),
			'param_name' => 'autoplay',
			'std' => 'false',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => false,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'group'	        => 'گردونه',
			'description' => esc_html__( '', 'studiare' )
		),array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'تکرار', 'studiare' ),
			'param_name' => 'car_loop',
			'std' => 'false',
			"class"		=> "hide_in_vc_editor",
			'admin_label' => false,
			'value' => array(
				esc_html__( 'بله', 'studiare' )    => 'true',
				esc_html__( 'خیر', 'studiare' )   => 'false',
			),
			'group'	        => 'گردونه',
			'description' => esc_html__( '', 'studiare' )
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
		//end adding carouse by suncode
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

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Blog_Posts extends WPBakeryShortCode {}
}