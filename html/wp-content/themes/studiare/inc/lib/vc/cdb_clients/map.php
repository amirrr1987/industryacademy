<?php

vc_map( array(
	'base'             => 'cdb_clients',
	'name'             => esc_html__( 'مشتریان', 'studiare' ),
	'description'      => esc_html__( 'لوگوی مشتریان و همکاران', 'studiare' ),
	'as_parent'        => array('only' => 'cdb_client_item'),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'تعداد مشتری در هر ردیف', 'studiare' ),
			'param_name'     => 'columns_count',
			'std'            => '4',
			'value'          => array(
				esc_html__( '2 لوگو در ردیف', 'studiare' )    => 'two',
				esc_html__( '3 لوگو در ردیف', 'studiare' )    => 'three',
				esc_html__( '4 لوگو در ردیف', 'studiare' )    => 'four',
				esc_html__( '5 لوگو در ردیف', 'studiare' )    => 'five',
				esc_html__( '6 لوگو در ردیف', 'studiare' )    => 'six',
			),
			'description' => esc_html__( '', 'studiare' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'فضای خالی', 'studiare' ),
			'param_name' => 'column_spacing',
			'std'		 => 'no',
			'value'      => array(
				esc_html__( 'نیازی نیست', 'studiare' )             => 'no',
				esc_html__( 'اعمال فضای خالی بین لوگوها به صورت پیشفرض', 'studiare' )  => 'yes',
			),
			'description' => esc_html__( '', 'studiare' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'مرز تصاویر','studiare' ),
			'param_name' => 'image_borders',
			'std'		 => 'yes',
			'value'      => array(
				esc_html__( 'خیر', 'studiare' )     => 'no',
				esc_html__( 'بلی', 'studiare' )    => 'yes',
			),
			'description' => esc_html__('', 'studiare' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'استایل شناور', 'studiare' ),
			'param_name' => 'hover_style',
			'std'		 => 'bg-hover',
			'value'      => array(
				esc_html__( 'غیرفعال', 'studiare' )                  => 'none',
				esc_html__( 'روکش پس زمینه', 'studiare' )      => 'bg-hover',
				esc_html__( 'رنگ تصویر', 'studiare' )             => 'color',
			),
			'description' => esc_html__( '', 'studiare' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'سایز تصویر', 'studiare' ),
			'param_name'     => 'img_size',
			'description'    => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'studiare' )
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

vc_map( array(
	'base'             => 'cdb_client_item',
	'name'             => esc_html__( 'لوگوی مشتری', 'studiare' ),
	'description'      => esc_html__( 'افزودن اطلاعات مشتری', 'studiare' ),
	'as_child'         => array('only' => 'cdb_clients'),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'params'           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'تصویر', 'studiare' ),
			'param_name'     => 'image',
			'value'          => '',
			'description'    => esc_html__( '', 'studiare' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'عنوان', 'studiare' ),
			'param_name'     => 'title',
			'admin_label'	 => true,
			'description'    => esc_html__( 'عنوان مشتری/همکار نمایش در حالت شناور.', 'studiare' ),
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'توضیحات', 'studiare' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'توضیحات کوچک در مورد مشتری / شریک، این منطقه متن همچنین از HTML پشتیبانی می کند (نشان داده شده در شناور).', 'studiare' ),
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'لینک', 'studiare' ),
			'param_name'     => 'link',
			'description'    => esc_html__( 'اختیاری', 'studiare' ),
		),
		array(
			"type"           => "textfield",
			"heading"        => esc_html__( "کلاس اضافی css", 'studiare' ),
			"param_name"     => "el_class",
			"description"    => esc_html__( "اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.", 'studiare' ),
		)
	)
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Cdb_Clients extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Client_Item extends WPBakeryShortCode {}
}