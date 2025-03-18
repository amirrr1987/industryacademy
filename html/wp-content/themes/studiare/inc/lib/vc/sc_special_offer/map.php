<?php

vc_map( array(
	'base'             => 'sc_special_offer',
	'name'             => esc_html__( 'تخفیف های ویژه', 'studiare' ),
	'description'      => esc_html__( 'نمایش تفیف های ویژه', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'متن دکمه', 'studiare' ),
			'param_name'  => 'buy_btn_title',
			'admin_label' => true,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'رنگ دکمه', 'studiare' ),
			'param_name'  => 'buy_btn_color',
			'admin_label' => true,
			'default'     => '#459ae5'
		),
		array(
			'type' 				=> 'iconpicker',
			'heading' 			=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 		=> 'icon',
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
				'type'			=> 'colorpicker',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'رنگ نقطه فعال', 'studiare' ),
				'param_name'	=> 'sc_dots_active_color',
				'value'			=> '',
			),
			array(
				'type'			=> 'colorpicker',
				'holder'		=> 'div',
				'class' 		=> 'hide_in_vc_editor',
				'admin_label' 	=> false,
				'heading'		=> esc_html__( 'رنگ نقطه ', 'studiare' ),
				'param_name'	=> 'sc_dots_normal_color',
				'value'			=> '',
			),
		//end adding carouse by suncode
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

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Sc_Special_Offer extends WPBakeryShortCode {}
}