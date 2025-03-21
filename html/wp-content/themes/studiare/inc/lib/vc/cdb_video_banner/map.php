<?php

vc_map( array(
	'base'             => 'cdb_video_banner',
	'name'             => esc_html__( 'بنر ویدئو', 'studiare' ),
	'description'      => esc_html__( 'نمایش بنر ویدئو', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__('لینک ویدئو', 'studiare'),
			'param_name'  => 'video_link',
			'value'       => '',
			'description' => esc_html__( 'لینک مستقیم یا ویمئو یا یوتیوب', 'studiare' ),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__('عنوان', 'studiare'),
			'param_name'  => 'title',
			'save_always' => true,
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
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__('زیرنویس عنوان', 'studiare'),
			'param_name'  => 'subtitle',
			'save_always' => true,
			'admin_label' => true
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__('بنر ویدئو', 'studiare'),
			'param_name'  => 'video_banner',
			'value'       => '',
			'save_always' => true,
			'admin_label' => true
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'سایز بنر ویدئو', 'studiare' ),
			'param_name' => 'image_size',
			'value'      => array(
			  'تصویر کامل'=>	'full',
				 'تصویر متوسط'=>'medium' ,
				  'تصویر بندانگشتی'=>'thumbnail',
				  'پیش فرض قالب'=>'studiare-course-thumb',
			),
			'std'        => 'full',
		),

	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Video_Banner extends WPBakeryShortCode {}
}