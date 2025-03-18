<?php

vc_map( array(
	'base'             => 'cdb_animated_counter',
	'name'             => esc_html__( 'شمارنده', 'studiare' ),
	'description'      => esc_html__( 'نمایش شمارنده با انیمیشن', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
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
	class WPBakeryShortCode_Cdb_Animated_Counter extends WPBakeryShortCode {}
}