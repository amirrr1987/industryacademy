<?php

vc_map( array(
	'base'             => 'cdb_icon_box',
	'name'             => esc_html__( 'باکس های آیکن', 'studiare' ),
	'description'      => esc_html__( 'ایجاد باکس های آیکن', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'URL (لینک)', 'studiare' ),
			'param_name' => 'link',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'نوع آیکن', 'studiare' ),
			'param_name'  => 'icon_style',
			'value'       => array(
				esc_html__( 'فونت آیکن', 'studiare' ) => 'icon-font',
				esc_html__( 'تصویر', 'studiare' ) => 'image',
			),
			'save_always' => true,
			'admin_label' => true,
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 	=> 'icon',
			'description' 	=> esc_html__( '', 'studiare' ),
			// 'value' 		=> '',
			// 'dependency'    => array('element' => 'icon_style', 'value' => array('icon-font')),
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
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'تصویر سفارشی', 'studiare' ),
			'param_name'     => 'custom_icon',
			'dependency'  => array('element' => 'icon_style', 'value' => array('image')),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'مکان آیکن', 'studiare' ),
			'param_name'  => 'icon_position',
			'value'       => array(
				esc_html__( 'بالا', 'studiare' )             => 'top',
				esc_html__( 'راست', 'studiare' )            => 'left',
				esc_html__( 'چپ', 'studiare' )           => 'right'
			),
			'description' => esc_html__( '', 'studiare' ),
			'save_always' => true,
			'admin_label' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'استایل آیکن', 'studiare' ),
			'param_name'  => 'icon_type',
			'value'       => array(
				esc_html__( 'نرمال', 'studiare' ) => 'normal',
				esc_html__( 'دایره', 'studiare' ) => 'circle',
				esc_html__( 'مربع', 'studiare' ) => 'square'
			),
			'save_always' => true,
			'admin_label' => true,
			'description' => esc_html__( 'این ویژگی هنگامی که وضعیت آیکن بالا است کار نمی کند. در این مورد نوع آیکون عادی است','studiare' ),
			'dependency'  => array('element' => 'icon_style', 'value' => array('icon-font')),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'سایز آیکن', 'studiare' ),
			'param_name'  => 'icon_size',
			'value'       => array(
				esc_html__( 'کوچک', 'studiare' )      => 'icon-box-small',
				esc_html__( 'متوسط', 'studiare' )     => 'icon-box-medium',
				esc_html__( 'بزرگ', 'studiare' )      => 'icon-box-large'
			),
			'admin_label' => true,
			'save_always' => true,
			'description' => esc_html__( 'این ویژگی هنگامی که وضعیت آیکون بالا است کار نمی کند.', 'studiare' ),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'سایز سفارشی آیکن (px)', 'studiare' ),
			'param_name' => 'custom_icon_size',
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'فاصله آیکن', 'studiare' ),
			'param_name'  => 'icon_margin',
			'value'       => '',
			'description' => esc_html__( 'بر حسب پیکسل مقدارهای مارجین را وارد کنید.', 'studiare' ),
			'admin_label' => true,
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'سایز شکل (px)', 'studiare' ),
			'param_name'  => 'shape_size',
			'description' => '',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'icon_type',
				'value' => array('circle', 'square')
			),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'رنگ آیکن', 'studiare' ),
			'param_name' => 'icon_color',
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ پس زمینه آیکن', 'studiare' ),
			'param_name'  => 'icon_background_color',
			'description' => esc_html__( '', 'studiare' ),
			'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__('خمیدگی مرز', 'studiare'),
			'param_name'  => 'border_radius',
			'description' => esc_html__('یک مقدار بر حسب پیکسل وارد کنید. مثلا 4 ', 'studiare'),
			'dependency'  => array(
				'element' => 'icon_type',
				'value' => array('circle', 'square')
			),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ مرز آیکن', 'studiare' ),
			'param_name'  => 'icon_border_color',
			'description' => esc_html__( '', 'studiare' ),
			'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'ضخامت مرز', 'studiare' ),
			'param_name'  => 'icon_border_width',
			'description' => esc_html__( '', 'studiare' ),
			'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
			'group'       => esc_html__('تنظیمات آیکن', 'studiare'),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'عنوان', 'studiare' ),
			'param_name'  => 'title',
			'value'       => '',
			'admin_label' => true
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'برچسب عنوان', 'studiare' ),
			'param_name' => 'title_tag',
			'value'      => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'std'        => 'h4',
			'dependency' => array('element' => 'title', 'not_empty' => true),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Title Text Transform', 'studiare' ),
			'param_name'  => 'title_text_transform',
			'value'       => array_flip(studiare_get_text_transform_array(true)),
			'save_always' => true,
			'dependency' => array('element' => 'title', 'not_empty' => true),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'ضحامت فونت عنوان', 'studiare' ),
			'param_name'  => 'title_text_font_weight',
			'value'       => array_flip(studiare_get_font_weight_array(true)),
			'save_always' => true,
			'dependency' => array('element' => 'title', 'not_empty' => true),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'رنگ عنوان', 'studiare' ),
			'param_name' => 'title_color',
			'dependency' => array('element' => 'title', 'not_empty' => true),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'       => 'textarea_html',
			'holder'     => 'div',
			'heading'    => esc_html__( 'متن', 'studiare' ),
			'param_name' => 'content',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'رنگ متن', 'studiare' ),
			'param_name' => 'text_color',
			'dependency' => array('element' => 'text', 'not_empty' => true),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'فاصله متن از راست (px)', 'studiare' ),
			'param_name' => 'text_left_padding',
			'dependency' => array('element' => 'icon_position', 'value' => array('left')),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'قاصله متن از چپ (px)', 'studiare' ),
			'param_name' => 'text_right_padding',
			'dependency' => array('element' => 'icon_position', 'value' => array('right')),
			'group'      => esc_html__('تنظیمات متن', 'studiare')
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
	class WPBakeryShortCode_Cdb_Icon_Box extends WPBakeryShortCode {}
}