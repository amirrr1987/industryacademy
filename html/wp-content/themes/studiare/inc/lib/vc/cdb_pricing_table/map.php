<?php

vc_map( array(
	'base'             => 'cdb_pricing_table',
	'name'             => esc_html__( 'جدول قیمت', 'studiare' ),
	'description'      => esc_html__( 'ایجاد جدول قیمت با آیکن', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'          => 'textfield',
			'admin_label'   => true,
			'heading'       => esc_html__('عنوان','studiare'),
			'param_name'    => 'title',
			'value'         => esc_html__('بسته پایه','studiare')
		),
		array(
			'type'          => 'textfield',
			'admin_label'   => true,
			'heading'       => esc_html__('زیرنویس','studiare'),
			'param_name'    => 'subtitle',
			'value'         => ''
		),
		array(
			'type'          => 'textfield',
			'admin_label'   => true,
			'heading'       => esc_html__('قیمت', 'studiare'),
			'param_name'    => 'price'
		),
		array(
			'type'          => 'textfield',
			'admin_label'   => true,
			'heading'       => esc_html__('واحد پول', 'studiare'),
			'param_name'    => 'currency'
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__('نمایش دکمه', 'studiare'),
			'param_name'    => 'show_button',
			'value'         => array(
				esc_html__('بلی', 'studiare')     => 'yes',
				esc_html__('خیر', 'studiare')      => 'no'
			)
		),
		array(
			'type'          => 'vc_link',
			'heading'       => esc_html__('لینک دکمه', 'studiare'),
			'param_name'    => 'button_link',
			'dependency'    => array(
				'element'   => 'show_button',
				'value'     => 'yes'
			),
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__('متن دکمه', 'studiare'),
			'param_name'    => 'button_text'
		),
		array(
			'type'          => 'textarea_html',
			'holder'        => 'div',
			'class'         => '',
			'heading'       => esc_html__('محتوا', 'studiare'),
			'param_name'    => 'content',
			'value'         => '<li>' . esc_html__('سان کد سان کد سان کد', 'studiare') . '</li><li>' . esc_html__('سان کد سان کد سان کد', 'studiare') . '</li><li>' . esc_html__('سان کد سان کد سان کد', 'studiare') . '</li>',
			'description'   => ''
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__('کلاس اضافی css','studiare'),
			'param_name'    => 'el_class',
			'description'   => esc_html__('اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.','studiare')
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'Css', 'studiare' ),
			'param_name' => 'css',
			'group' => esc_html__( 'تنظیمات طراحی', 'studiare' )
		)
	)
) );

if ( class_exists('WPBakeryShortCode') ) {
	class WPBakeryShortCode_Cdb_Pricing_Table extends WPBakeryShortCode {}
}