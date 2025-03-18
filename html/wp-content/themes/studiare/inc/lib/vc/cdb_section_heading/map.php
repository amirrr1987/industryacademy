<?php

vc_map( array(
	'base'             => 'cdb_section_heading',
	'name'             => esc_html__( 'عنوان بخش', 'studiare' ),
	'description'      => esc_html__( 'عنوان، زیرنویس و دکمه', 'studiare' ),
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
			'heading'     => esc_html__( 'زیرنویس عنوان', 'studiare' ),
			'param_name'  => 'subtitle',
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
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ زیرنویس', 'studiare' ),
			'param_name'  => 'subtitle_color',
			'admin_label' => true,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ المان  طراحی', 'studiare' ),
			'param_name'  => 'element_color',
			'admin_label' => true,
		),
		array(
			'type'          => 'dropdown',
			'heading'       => esc_html__( 'استایل عنوان', 'studiare' ),
			'param_name'    => 'sc_studi_heading_style',
			'value'         => array(
				esc_html__( 'پیش فرض', 'studiare' ) => 'sc_heading_default',
				esc_html__( 'استایل یک', 'studiare' ) => 'sc_head_style1',
				esc_html__( 'استایل دو', 'studiare' ) => 'sc_head_style2',
				esc_html__( 'استایل سه', 'studiare' ) => 'sc_head_style3',
				esc_html__( 'استایل چهار', 'studiare' ) => 'sc_head_style4',
			),
			'save_always'   => true,
			'admin_label'   => true,
		),
		array(
			'type' 				=> 'iconpicker',
			'heading' 			=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 		=> 'icon',
			'settings' => array(
					'emptyIcon' => true,
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
	class WPBakeryShortCode_Cdb_Section_Heading extends WPBakeryShortCode {}
}