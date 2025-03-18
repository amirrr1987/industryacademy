<?php

vc_map( array(
	'name'        => esc_html__( 'معرفی مدرس', 'studiare' ),
	'base'        => 'cdb_teacher_detail',
	'description' => esc_html__('فقط در برگه مدرس', 'studiare'),
	'category'    => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'      => array(
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'studiare' ),
			'param_name' => 'css',
			'group'      => esc_html__( 'تنظیمات طراحی', 'studiare' )
		)
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Teacher_Detail extends WPBakeryShortCode {}
}