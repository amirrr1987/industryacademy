<?php
/**
 * Nuovo WordPress Theme
 *
 * Codebean.co
 * www.codebean.co
 */

vc_map( array(
	'base'             => 'cdb_social_networks',
	'name'             => esc_html__( 'شبکه های اجتماعی', 'studiare' ),
	'description'      => esc_html__( 'لینک شبکه های اجتماعی', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'نوع نمایش', 'studiare' ),
			'param_name' => 'display_type',
			'value' => array(
				esc_html__( 'آیکن با دایره', 'studiare' ) => 'rounded',
				esc_html__( 'فقط آیکن', 'studiare' ) => 'icon-only',
			),
			'description' => esc_html__( '', 'studiare' ),
			'admin_label' => true
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'رنگ روشن؟', 'studiare' ),
			'param_name' => 'light',
			'admin_label' => true,
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

if ( class_exists('WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Social_Networks extends WPBakeryShortCode {}
}