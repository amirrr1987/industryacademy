<?php

vc_map( array(
	'base'             => 'cdb_box_content',
	'name'             => esc_html__( 'باکس محتوا', 'studiare' ),
	'description'      => esc_html__( 'ایجاد بلوک محتوا', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'as_parent'        => array('except' => 'vc_tabs'),
	'content_element'  => true,
	'show_settings_on_create'   => false,
	'js_view'          => 'VcColumnView',
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'params'           => array(
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


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cdb_box_content extends WPBakeryShortCodesContainer {}
}