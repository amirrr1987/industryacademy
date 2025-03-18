<?php

# Testimonials Parent
vc_map( array(
	'base'             => 'cdb_testimonials',
	'name'             => esc_html__( 'نظرات مشتریان', 'studiare' ),
	'description'      => esc_html__( 'نمایش اسلایدی یا مشبک نظرات مشتریان', 'studiare' ),
	'as_parent'        => array('only' => 'cdb_testimonial_item'),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'          => 'checkbox',
			'heading'       => esc_html__( 'نمایش صفحه بندی', 'studiare' ),
			'param_name'    => 'show_pagination_control',
			'description'   => esc_html__( '', 'studiare' ),
		),
		array(
			'type'          => 'checkbox',
			'heading'       => esc_html__( 'حلقه اسلایدر', 'studiare' ),
			'param_name'    => 'wrap',
			'description'   => esc_html__( '', 'studiare' ),
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name'    => 'el_class',
			'description'   => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => 'Css',
			'param_name' => 'css',
			'group'      => esc_html__( 'تنظیمات طراحی', 'studiare' ),
		)
	),
	'js_view'          => 'VcColumnView'
) );

# Testimonials Child
vc_map( array(
	'base'             => 'cdb_testimonial_item',
	'name'             => esc_html__( 'نظر مشتری', 'studiare' ),
	'description'      => esc_html__( 'نظرات مشتریان', 'studiare' ),
	'as_child'         => array('only' => 'cdb_testimonials'),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'params'           => array(
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'نام', 'studiare' ),
			'param_name'    => 'name',
			'description'   => esc_html__( 'نام کاربر', 'studiare' )
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'سمت کاربر', 'studiare' ),
			'param_name'    => 'user_role',
			'description'   => esc_html__( 'سمت کاربر', 'studiare' )
		),
		array(
			'type'          => 'attach_image',
			'heading'       => esc_html__( 'تصویر کاربر', 'studiare' ),
			'param_name'    => 'image',
			'value'         => '',
			'description'   => esc_html__( '', 'studiare' )
		),
		
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'سایز تصویر', 'studiare' ),
			'param_name'    => 'img_size',
			'description'   => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'studiare' )
		),
		array(
			'type'          => 'textarea_html',
			'holder'        => 'blockquote',
			'heading'       => esc_html__( 'متن', 'studiare' ),
			'param_name'    => 'content'
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name'    => 'el_class',
			'description'   => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
		),
	)
) );

if ( class_exists('WPBakeryShortCodesContainer') ) {
	class WPBakeryShortCode_Cdb_Testimonials extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Testimonial_Item extends WPBakeryShortCode {}
}