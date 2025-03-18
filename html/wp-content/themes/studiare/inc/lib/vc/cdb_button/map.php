<?php

vc_map( array(
	'base'             => 'cdb_button',
	'name'             => esc_html__( 'دکمه', 'studiare' ),
	'description'      => esc_html__( 'دکمه چشمگیر', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'عنوان', 'studiare' ),
			'param_name' 	=> 'title',
			'description'	=> esc_html__( '', 'studiare' ),
			'value' 		=> esc_html__( 'دکمه با متن', 'studiare' ),
			'admin_label'   => true
		),
		array(
			'type'			=> 'vc_link',
			'heading'		=> esc_html__( 'URL (لینک)', 'studiare' ),
			'param_name'	=> 'link',
			'description'	=> esc_html__( '', 'studiare' )
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'سبک', 'studiare' ),
			'param_name'	=> 'style',
			'description'	=> esc_html__( '', 'studiare' ),
			'value' 		=> array(
				esc_html__( 'پر', 'studiare' ) => 'filled',
				esc_html__( 'مرز', 'studiare' ) => 'border',
				esc_html__( 'لینک', 'studiare' ) => 'link'
			),
			'std'			=> 'filled',
			'admin_label'   => true
		),
		array(
			'type' 			=> 'colorpicker',
			'heading' 		=> esc_html__( 'رنگ', 'studiare' ),
			'param_name' 	=> 'color',
			'description'	=> esc_html__( 'رنگ دکمه.', 'studiare' )
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'سایز', 'studiare' ),
			'param_name'	=> 'size',
			'description'	=> esc_html__( '', 'studiare' ),
			'value'			=> array(
				esc_html__( 'بزرگ', 'studiare' ) => 'lg',
				esc_html__( 'متوسط', 'studiare' )	=> 'md',
				esc_html__( 'کوچک', 'studiare' ) => 'sm',
			),
			'std' 			=> 'lg'
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'تراز', 'studiare' ),
			'param_name'	=> 'align',
			'description'	=> esc_html__( '', 'studiare' ),
			'value'			=> array(
				esc_html__( 'چپ', 'studiare' ) => 'left',
				esc_html__( 'وسط', 'studiare' )	=> 'center',
				esc_html__( 'راست', 'studiare' ) => 'right',
				esc_html__( 'تمام عرض', 'studiare' ) => 'full',
			),
			'std' 			=> 'left',
			'admin_label'   => true
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

if ( class_exists('WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_CDB_button extends WPBakeryShortCode {}
}