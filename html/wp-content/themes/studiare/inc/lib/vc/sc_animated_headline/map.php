<?php

/**
 * Animated Text
 * 
 * @author Javad Pourshahabadi
 * @copyright Suncode
 * @link http://suncode.ir
 */


vc_map( array(
	'base'             => 'sc_animated_headline',
	'name'             => esc_html__( 'متن متحرک', 'studiare' ),
	'description'      => esc_html__( 'نمایش متن متحرک با انیمیشن', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
	            array(
					'type' 			=> 'textfield',
					'param_name' 	=> 'id',
					'save_always' 	=> true
				),
				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__("متن ابتدایی", 'studiare'),
					"param_name"  	=> "before_text",
					'edit_field_class' => 'vc_col-xs-99',
					'value'			=> 'This is'
				),
				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__("کلمات متغیر", 'studiare'),
					"description"   => "e.g. word1,word2,word3",
					"param_name"  	=> "words",
					'edit_field_class' => 'vc_col-xs-99',
					'value'			=> 'Awesome,Fantastic,Wonderful'
				),
				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__("متن انتهایی", 'studiare'),
					"param_name"  	=> "after_text",
					'edit_field_class' => 'vc_col-xs-99',
					'value'			=> 'Theme!'
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('افکت', 'studiare'),
					'edit_field_class' => 'vc_col-xs-99',
					'param_name' 	=> 'fx',
					'value' 		=> array(
						esc_html__( "چرخش", 'studiare') . ' 1' 	=> 'rotate-1',
						esc_html__( "تایپی", 'studiare') 			=> 'letters_type',
						esc_html__( "چرخش", 'studiare') . ' 2' 	=> 'letters_rotate-2',
						esc_html__( "بار", 'studiare') 			=> 'loading-bar',
						esc_html__( "اسلاید", 'studiare') 			=> 'slide',
						esc_html__( "کلیپ", 'studiare') 			=> 'clip_is-full-width',
						esc_html__( "زوم", 'studiare') 			=> 'zoom',
						esc_html__( "چرخش", 'studiare') . ' 3' 	=> 'letters_rotate-3',
						esc_html__( "مقیاس", 'studiare') 			=> 'letters_scale',
						esc_html__( "هل دادن", 'studiare') 			=> 'push',
					)
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('تگ HTML', 'studiare'),
					'edit_field_class' => 'vc_col-xs-99',
					'param_name' 	=> 'tag',
					'value'			=> array(
						'H2' 		=> 'h2',
						'H1' 		=> 'h1',
						'H3' 		=> 'h3',
						'H4' 		=> 'h4',
						'H5' 		=> 'h5',
						'H6' 		=> 'h6',
						'Span' 		=> 'span',
						'Div' 		=> 'div',
						'P' 		=> 'p',
					)
				),
				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__("تاخیر انیمیشن", 'studiare'),
					"description"   => "e.g. 3000",
					'edit_field_class' => 'vc_col-xs-99',
					"param_name"  	=> "time",
					"value"			=>"3000",
              		'options' => array( 'unit' => '', 'step' => 500, 'min' => 0, 'max' => 10000 ),
				),

				array(
					'type' 			=> 'colorpicker',
					'param_name' 	=> 'st_title',
					'class' 		=> '',
					"heading"     	=> esc_html__("رنگ متن", 'studiare'),
				),

				array(
					'type' 			=> 'colorpicker',
					'param_name' 	=> 'st_words',
					'class' 		=> '',
					"heading"     	=> esc_html__("رنگ کلمات متغیر", 'studiare'),
				),
				

				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__( "کلاس اضافی", 'studiare' ),
					"param_name"  	=> "xtraclass",
					'edit_field_class' => 'vc_col-xs-99',
				),

				
				

	    )
	
	)
);

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Sc_Animated_Headline extends WPBakeryShortCode {}
}