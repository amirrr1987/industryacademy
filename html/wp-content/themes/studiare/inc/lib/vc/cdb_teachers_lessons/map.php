<?php
// Shim to fix the late load of the WooCommerce autoloader.
if ( defined( 'WC_PLUGIN_FILE' ) && ! function_exists( 'wc_get_loop_prop' ) ) {
					$woocommerce_file = dirname( WC_PLUGIN_FILE ) . '/includes/wc-template-functions.php';
					if ( file_exists( $woocommerce_file ) ) {
						require_once $woocommerce_file;						
					}
}
if(!function_exists('sc_get_techers')){
    function sc_get_techers(){
       
    $teachers = new WP_Query( array( 'post_type' => 'teacher' ) );
    if($teachers){
    $teachers_array =array();
    foreach($teachers->posts as $teacher){
    $teacher_id = $teacher->ID;
    $teacher_name = $teacher->post_title;
    $teachers_array += [ $teacher_name => $teacher_id];
    }
    }else{
        $teachers_array='';
    }
     return $teachers_array;
    }
   
}				
vc_map( array(
	'name'        => esc_html__( 'نمایش دروس', 'studiare' ),
	'base'        => 'cdb_teachers_lessons',
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
			'heading'        => esc_html__( 'مدرس', 'studiare' ),
			'param_name'     => 'teacher_name',
			'std'            => '4',
			'value'          => sc_get_techers(),
			'description' => esc_html__( '', 'studiare' ),
			'admin_label'    => true
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
	class WPBakeryShortCode_Cdb_Teachers_Lessons extends WPBakeryShortCode {}
}