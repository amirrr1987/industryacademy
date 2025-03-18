<?php

vc_map( array(
	'base'             => 'cdb_countdown_timer',
	'name'             => esc_html__( 'شمارنده معکوس', 'studiare' ),
	'description'      => esc_html__( 'نمایش روز شمار', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'تاریخ', 'studiare' ),
			'param_name'    => 'date',
			'admin_label'   => true,
			'description'   => esc_html__( 'تاریخ اتمام با این فرمت تکلمیل شود Y/m/d. برای مثال 2019/12/12', 'studiare' )
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'سایز', 'studiare' ),
			'param_name'    => 'size',
			'value'         => array(
				esc_html__( 'کوچک', 'studiare' ) => 'small',
				esc_html__( 'متوسط', 'studiare' ) => 'medium',
				esc_html__( 'بزرگ', 'studiare' ) => 'large',
			),
			'admin_label'   => true,
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'سبک', 'studiare' ),
			'param_name'    => 'style',
			'value'         => array(
				esc_html__( 'استاندارد', 'studiare' ) => 'standard',
				esc_html__( 'بی رنگ', 'studiare' ) => 'transparent',
			),
			'admin_label'   => true,
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'روشن؟', 'studiare' ),
			'param_name' => 'light',
			'admin_label' => true,
			'dependency' => array('element' => 'style', 'value' => array('transparent') ),
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'تراز', 'studiare' ),
			'param_name'    => 'align',
			'value'         => array(
				esc_html__( 'چپ', 'studiare' ) => 'left',
				esc_html__( 'وسط', 'studiare' ) => 'center',
				esc_html__( 'راست', 'studiare' ) => 'right',
			),
			'admin_label'   => true,
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
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
	class WPBakeryShortCode_Cdb_Countdown_Timer extends WPBakeryShortCode {}
}