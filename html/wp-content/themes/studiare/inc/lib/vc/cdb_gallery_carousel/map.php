<?php

vc_map( array(
	'base'             => 'cdb_gallery_carousel',
	'name'             => esc_html__( 'گردونه گالری', 'studiare' ),
	'description'      => esc_html__( 'نمایش اسلایدی گالری', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'           => 'attach_images',
			'heading'        => esc_html__( 'تصاویر', 'studiare' ),
			'param_name'     => 'images',
			'value'          => '',
			'description'    => esc_html__( '', 'studiare' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'سایز تصویر', 'studiare' ),
			'param_name'     => 'img_size',
			'value'          => '',
			'description'    => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'studiare' )
		),
		array(
			'type'          => 'checkbox',
			'heading'       => esc_html__( 'نمایش صفحه بندی', 'studiare' ),
			'param_name'    => 'show_pagination_control',
			'description'   => esc_html__( '', 'studiare' ),
			'dependency'    => array( 'element' => 'view', 'value' => array('carousel') ),
			'group'         => esc_html__( 'گردونه', 'studiare' ),
		),
		array(
			'type'          => 'checkbox',
			'heading'       => esc_html__( 'نمایش دکمه های قبلی بعدی', 'studiare' ),
			'param_name'    => 'show_prev_next_buttons',
			'description'   => esc_html__( '', 'studiare' ),
			'dependency'    => array( 'element' => 'view', 'value' => array('carousel') ),
			'group'         => esc_html__( 'گردونه', 'studiare' ),
		),
		array(
			'type'          => 'checkbox',
			'heading'       => esc_html__( 'حلقه گردونه', 'studiare' ),
			'param_name'    => 'wrap',
			'description'   => esc_html__( '', 'studiare' ),
			'dependency'    => array( 'element' => 'view', 'value' => array('carousel') ),
			'group'         => esc_html__( 'گردونه', 'studiare' ),
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'عمل کلیک کردن', 'studiare' ),
			'param_name'     => 'on_click',
			'value'          => array(
				esc_html__('لایت باکس','studiare') => 'lightbox',
				esc_html__('لینک سفارشی', 'studiare') => 'links',
				esc_html__('هیچ', 'studiare') => 'none'
			),
			'group'         => esc_html__( 'تنظیمات', 'studiare' ),
		),
		array(
			'type'           => 'exploded_textarea_safe',
			'heading'        => esc_html__( 'لینک های سفارشی', 'studiare' ),
			'param_name'     => 'custom_links',
			'description'    => esc_html__( 'ورود لینک برای هر اسلاید.برای جدا کردن اینتر بزنید.', 'studiare' ),
			'dependency'     => array(
				'element' => 'on_click',
				'value' => array( 'links' ),
			),
			'group'         => esc_html__( 'تنظیمات', 'studiare' ),
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'باز شدن در زبانه جدید', 'studiare' ),
			'save_always'    => true,
			'param_name'     => 'target_blank',
			'value'          => array( esc_html__( 'بله، لطفا', 'studiare' ) => 'yes' ),
			'default'        => 'yes',
			'dependency'     => array(
				'element' => 'on_click',
				'value' => array( 'links' ),
			),
			'group'         => esc_html__( 'تنظیمات', 'studiare' ),
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name'    => 'el_class',
			'description'   => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'studiare' ),
			'param_name' => 'css',
			'group'      => esc_html__( 'تنظیمات طراحی', 'studiare' )
		)
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Gallery_Carousel extends WPBakeryShortCode {}
}