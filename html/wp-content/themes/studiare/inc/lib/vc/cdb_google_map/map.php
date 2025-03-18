<?php

vc_map(array(
	'name' => esc_html__('نقشه گوگل', 'studiare'),
	'base' => 'cdb_google_map',
	'description'      => esc_html__( 'نمایش بلوک نقشه گوگل', 'studiare' ),
	'category' => esc_html__('اختصاصی قالب', 'studiare'),
	'icon'             => 'admin_vc_addon',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('عرض نقشه', 'studiare'),
			'param_name' => 'map_width',
			'value' => '100%',
			'description' => esc_html__('بر حسب px یا %', 'studiare')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('ارتفاع نقشه', 'studiare'),
			'param_name' => 'map_height',
			'value' => '460px',
			'description' => esc_html__('بر حسب px', 'studiare')
		),
		array(
			'type' => 'attach_images',
			'heading' => esc_html__('تصویر مارکر', 'studiare'),
			'param_name' => 'image'
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Latitude', 'studiare'),
			'param_name' => 'lat',
			'description' => wp_kses(__('<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'studiare'), array('a' => array('href' => array())))
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Longitude', 'studiare'),
			'param_name' => 'lng',
			'description' => wp_kses(__('<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'studiare'), array('a' => array('href' => array())))
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('زوم نقشه', 'studiare'),
			'param_name' => 'map_zoom',
			'value' => 18
		),
		array(
			'type' => 'textarea_raw_html',
			'heading' => 'استایل نقشه',
			'param_name' => 'style_json',
			'value' => '',
			'description' => wp_kses(__('Paste the style code here. Browse map styles in <a href="https://snazzymaps.com/"">SnazzyMaps</a>.', 'studiare'), array('a' => array('href' => array())))
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('آدرس شما', 'studiare'),
			'param_name' => 'infowindow_text',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'disable_mouse_whell',
			'value' => array(
				esc_html__('غیرفعال کردن زوم نقشه با اسکرول موس.', 'studiare') => 'disable'
			)
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('کلاس اضافی css', 'studiare'),
			'param_name' => 'el_class',
			'description' => esc_html__('اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare')
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('Css', 'studiare'),
			'param_name' => 'css',
			'group' => esc_html__('تنظیمات طراحی', 'studiare')
		)
	)
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Google_Map extends WPBakeryShortCode {}
}