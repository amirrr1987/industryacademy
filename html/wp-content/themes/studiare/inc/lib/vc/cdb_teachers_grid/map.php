<?php

vc_map( array(
	'name'        => esc_html__( 'نمایش مدرسان', 'studiare' ),
	'base'        => 'cdb_teachers_grid',
	'category'    => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'description' => esc_html__( 'نمایش جدولی مدرسان', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'مدرس در برگه', 'studiare' ),
			'param_name' => 'per_page',
			'default'	 => '8',
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'ستون ها', 'studiare' ),
			'param_name'     => 'columns_count',
			'std'            => '4',
			'value'          => array(
				esc_html__( '2 آیتم در ردیف', 'studiare' )    => 'two',
				esc_html__( '3 آیتم در ردیف', 'studiare' )    => 'three',
				esc_html__( '4 آیتم در ردیف', 'studiare' )    => 'four',
				esc_html__( '5 آیتم در ردیف', 'studiare' )    => 'five',
				esc_html__( '6 آیتم در ردیف', 'studiare' )    => 'six',
			),
			'description' => esc_html__( '', 'studiare' ),
			'admin_label'    => true
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'کلاس اضافی css', 'studiare' ),
			'param_name'     => 'el_class',
			'description'    => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' ),
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
	class WPBakeryShortCode_Cdb_Teachers_Grid extends WPBakeryShortCode {}
}