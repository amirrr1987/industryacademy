<?php
return;
/*
vc_map( array(
	'base'             => 'sc_accordion',
	'name'             => esc_html__( 'آکاردئون', 'studiare' ),
	'description'      => esc_html__( 'نمایش آکاردئون  ', 'studiare' ),
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

//WPBakeryShortCode_Sc_Accordion_Tab
*/


//second start//
//Backend visual composer add-on code 

vc_map(array(
  'name' => 'Accordions',
  'base' => 'maxima_accordion',
  'category' => 'Maxima',
  'params' => array(
    array(
      'type' => 'textfield',
      'name' => __('Title', 'rrf-maxima'),
      'holder' => 'div',
      'heading' => __('Title', 'rrf-maxima'),
      'param_name' => 'title',
    ),
    array(
      'type' => 'param_group',
      'param_name' => 'values',
      'params' => array(
        array(
          'type' => 'textfield',
          'name' => 'label',
          'heading' => __('Heading', 'rrf-maxima'),
          'param_name' => 'label',
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
          'type' => 'textarea',
          'name' => 'Content',
          'heading' => __('Content', 'rrf-maxima'),
          'param_name' => 'excerpt',
        )
      )

    ),
  ),

));


//shortcode



function maxima_accordion_shortcode($atts){
  extract(shortcode_atts(array(
    'title' => '',
    'values' => '',
  ), $atts));

  $list = '<h4>'.$title.'</h4>';


  $values = vc_param_group_parse_atts($atts['values']);

  $new_accordion_value = array();
  foreach($values as $data){
    $new_line = $data;
    $new_line['label'] = isset($new_line['label']) ? $new_line['label'] : '';
    $new_line['excerpt'] = isset($new_line['excerpt']) ? $new_line['excerpt'] : '';

    $new_accordion_value[] = $new_line;

  }

  $idd = 0;
  foreach($new_accordion_value as $accordion):
  $idd++;
    $list .=
    '<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$idd.'">
						<i class="'.$accordion['icon'].'"></i> '.$accordion['label'].'
						<span class="fa fa-plus"></span>
						</a>
					</h4>
				</div>
				<div id="collapse'.$idd.'" class="panel-collapse collapse">
					<div class="panel-body">
						
						<p>'.$accordion['excerpt'].'</p>
					</div>
				</div>
			</div>';

  endforeach;
  return $list;
  wp_reset_query();

}
add_shortcode('maxima_accordion', 'maxima_accordion_shortcode');

//second end //

