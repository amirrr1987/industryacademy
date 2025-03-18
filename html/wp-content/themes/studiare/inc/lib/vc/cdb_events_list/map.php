<?php

vc_map( array(
	'name'        => esc_html__( 'لیست رویدادها', 'studiare' ),
	'base'        => 'cdb_events_list',
	'description'      => esc_html__( 'نمایش لیست رویدادها', 'studiare' ),
	'category'    => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'تعداد رویداد در هر صفحه', 'studiare' ),
			'param_name' => 'per_page',
			'default'	 => '8',
			'admin_label' => true,
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
	class WPBakeryShortCode_Cdb_Events_List extends WPBakeryShortCode {}
}