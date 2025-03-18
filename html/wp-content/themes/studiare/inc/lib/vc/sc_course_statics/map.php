<?php

vc_map( array(
	'base'             => 'sc_course_statics',
	'name'             => esc_html__( 'آمار دوره ها', 'studiare' ),
	'description'      => esc_html__( 'نمایش شمارنده با انیمیشن', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
	    
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'نوع آمار', 'studiare' ),
			'param_name'    => 'statics_type',
			'value'         => array(
				esc_html__( 'تعداد دوره ها', 'studiare' ) => 'total_courses',
				esc_html__( 'تعداد کل کاربران', 'studiare' ) => 'total_users',
				esc_html__( 'تعداد دانشجویان(خریداران)', 'studiare' ) => 'total_students',
				esc_html__( 'تعداد مدرسین ', 'studiare' ) => 'total_teachers',
			),
			'save_always'   => true,
			'admin_label'   => true,
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
			'type'          => 'textfield',
			'heading'       => esc_html__('مقدار عددی','studiare' ),
			'param_name'    => 'value',
			'description'   => esc_html__('مقدار نهایی را وارد کنید.مثلا.: 95','studiare' ),
			'save_always'   => true,
			'admin_label'   => true,
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('برچسب','studiare' ),
			'param_name'    => 'label',
			'save_always'   => true,
			'admin_label'   => true,
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'رنگ بندی', 'studiare' ),
			'param_name'    => 'color_scheme',
			'value'         => array(
				esc_html__( 'تیره', 'studiare' ) => 'dark',
				esc_html__( 'روشن', 'studiare' ) => 'light',
				esc_html__( 'سفارشی', 'studiare' ) => 'custom'
			),
			'save_always'   => true,
			'admin_label'   => true,
		),
		array(
			'type'          => 'colorpicker',
			'heading'       => esc_html__( 'رنگ سفارشی متن', 'studiare' ),
			'param_name'    => 'text_color',
			'dependency'    => array(
				'element' => 'color_scheme',
				'value' => array( 'custom' )
			)
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'استایل', 'studiare' ),
			'param_name'    => 'style_type',
			'value'         => array(
				esc_html__( 'استایل یک', 'studiare' ) => 'sc_statics_style1',
				esc_html__( 'استایل دو', 'studiare' ) => 'sc_statics_style2',
				esc_html__( 'استایل سه', 'studiare' ) => 'sc_statics_style3',

			),
			'save_always'   => true,
			'admin_label'   => true,
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name'     => 'el_class',
			'description'    => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' ),
		),
		
		array(
			'type'       => 'css_editor',
			'heading'    => 'Css',
			'param_name' => 'css',
			'group'      => esc_html__( 'تنظیمات طراحی', 'studiare' ),
		)
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Sc_Course_Statics extends WPBakeryShortCode {}
}