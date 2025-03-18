<?php

vc_map( array(
	'name'        => esc_html__( 'نمونه کار', 'studiare' ),
	'base'        => 'cdb_portfolio',
	'description'      => esc_html__( 'نمایش آیتم های نمونه کار', 'studiare' ),
	'category'    => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'      => array(
		array(
			'type' => 'loop',
			'heading' => esc_html__( 'آیتم های نمونه کار', 'studiare' ),
			'param_name' => 'portfolio_query',
			'settings' => array(
				'size' => array('hidden' => false, 'value' => 4 * 3),
				'order_by' => array('value' => 'date'),
				'post_type' => array('value' => 'portfolio', 'hidden' => false)
			),
			'description' => esc_html__( 'ایجاد حلقه وردپرس، برای پر کردن محتوا از سایت شما.', 'studiare' )
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'فیلتر دسته بندی ها', 'studiare' ),
			'param_name'     => 'category_filter',
			'value'          => array(
				esc_html__( 'بلی', 'studiare' ) => 'yes',
				esc_html__( 'خیر', 'studiare' )  => 'no',
			),
			'description'    => esc_html__('نمایش فیلتر دسته بندی ها در بالای آیتم ها.', 'studiare' ),
			'admin_label'    => true
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'ستون ها', 'studiare' ),
			'param_name'     => 'columns_count',
			'std'            => '4',
			'value'          => array(
				esc_html__( '2 آیتم در ردیف', 'studiare' )    => 'two',
				esc_html__( '3 آیتم در ردیف', 'studiare' )    => 'three',
				esc_html__( '4 آیتم در ردیف', 'studiare' )    => 'four',
				esc_html__( '5 آیتم در ردیف', 'studiare' )    => 'five',
				esc_html__( '6 آیتم در ردیف', 'studiare' )    => 'six',
			),
			'description' => esc_html__( '', 'studiare' ),
			'admin_label'    => true
		),
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
	class WPBakeryShortCode_Cdb_Portfolio extends WPBakeryShortCode {}
}