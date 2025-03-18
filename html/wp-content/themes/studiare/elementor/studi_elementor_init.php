<?php
if( !function_exists('is_plugin_active') ) {
			
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			
}
if (!is_plugin_active( 'elementor/elementor.php' )) {
	return;
	}


/**require_once get_template_directory() .'/elementor/studi_widget_base.php';
function studi_init_widgets_base( ) {
    
    
   \Elementor\Plugin::$instance()->widgets_manager->register_widget_type(  new \Elementor\Base() );

   
}
add_action( 'elementor/widgets/register', 'studi_init_widgets_base');
**/






require_once get_template_directory() . '/elementor/controls/group-control-advanced-border.php';
require_once get_template_directory() . '/elementor/controls/group-control-text-gradient.php';
require_once get_template_directory() . '/elementor/controls/group-control-button.php';

add_action('elementor/controls/controls_registered', function() {
    
    \Elementor\Plugin::$instance->controls_manager->add_group_control('advanced-border', new \Elementor\Group_Control_Advanced_Border());
    \Elementor\Plugin::$instance->controls_manager->add_group_control('text-gradient', new \Elementor\Group_Control_Text_Gradient());
    \Elementor\Plugin::$instance->controls_manager->add_group_control('button', new \Elementor\Group_Control_Button());
    
});









include_once 'studi_elementor_helper.php';

/**
 * Adding custom icon to icon control in Elementor
 */
function studi_add_custom_icons_tab( $tabs = array() ) {

	// Append new icons
	
	
	$tabs['studi-light-icons'] = array(
		'name'          => 'studi-light-icons',
		'label'         => esc_html__( 'Light Icons', 'studiare' ),
		'labelIcon'     => 'fal fa-archive',
		'prefix'        => 'fa-',
		'displayPrefix' => 'fal',
		'url'           => get_template_directory_uri().'/assets/css/fonawesomeall.min.css',
		'icons'         => studi_get_elementor_fonts_array('light'),
		'ver'           => '1.0.0',
	);
	

	$tabs['studi-solid-icons'] = array(
		'name'          => 'studi-solid-icons',
		'label'         => esc_html__( 'Solid Icons', 'studiare' ),
		'labelIcon'     => 'fas fa-archive',
		'prefix'        => 'fa-',
		'displayPrefix' => 'fas',
		'url'           => get_template_directory_uri().'/assets/css/fonawesomeall.min.css',
		'icons'         => studi_get_elementor_fonts_array('solid'),
		'ver'           => '1.0.0',
	);
	
	$tabs['studi-regular-icons'] = array(
		'name'          => 'studi-regular-icons',
		'label'         => esc_html__( 'Regular Icons', 'studiare' ),
		'labelIcon'     => 'far fa-archive',
		'prefix'        => 'fa-',
		'displayPrefix' => 'far',
		'url'           => get_template_directory_uri().'/assets/css/fonawesomeall.min.css',
		'icons'         => studi_get_elementor_fonts_array('regular'),
		'ver'           => '1.0.0',
	);
	$tabs['studi-duotone-icons'] = array(
		'name'          => 'studi-duotone-icons',
		'label'         => esc_html__( 'Duotone Icons', 'studiare' ),
		'labelIcon'     => 'fad fa-archive',
		'prefix'        => 'fa-',
		'displayPrefix' => 'fad',
		'url'           => get_template_directory_uri().'/assets/css/fonawesomeall.min.css',
		'icons'         => studi_get_elementor_fonts_array('duotone'),
		'ver'           => '1.0.0',
	);
	$tabs['studi-brands-icons'] = array(
		'name'          => 'studi-brands-icons',
		'label'         => esc_html__( 'Brands Icons', 'studiare' ),
		'labelIcon'     => 'fab fa-gg',
		'prefix'        => 'fa-',
		'displayPrefix' => 'fab',
		'url'           => get_template_directory_uri().'/assets/css/fonawesomeall.min.css',
		'icons'         => studi_get_elementor_fonts_array('brands'),
		'ver'           => '1.0.0',
	);

	return $tabs;
}

add_filter( 'elementor/icons_manager/additional_tabs', 'studi_add_custom_icons_tab' );


//https://develowp.com/build-a-custom-elementor-widget/

//include_once 'widgets/cdb_animated_counter/cdb_animated_counter_class.php';

function studi_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'studiare',
		[
			'title' => __( 'Studiare', 'studiare' ),
			'icon' => 'fa fa-plug',
		]
	);
	

}
add_action( 'elementor/elements/categories_registered', 'studi_add_elementor_widget_categories',0 );


class Studiare_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
	    
		require_once('widgets/cdb_animated_counter/cdb_animated_counter_class.php');
		require_once('widgets/cdb_blog_posts/cdb_blog_posts_class.php');
		require_once('widgets/cdb_countdown_timer/cdb_countdown_timer_class.php');
		require_once('widgets/cdb_course_categories/cdb_course_categories_class.php');
		require_once('widgets/cdb_blog_categories/cdb_blog_categories_class.php');//since version 12.5
		require_once('widgets/cdb_testimonials/cdb_testimonials_class.php');
		require_once('widgets/cdb_section_heading/cdb_section_heading_class.php');
		require_once('widgets/sc_separator/sc_separator_class.php');
		require_once('widgets/cdb_video_banner/cdb_video_banner_class.php');
		require_once('widgets/sc_namad_carousel/sc_namad_carousel_class.php');
		require_once('widgets/sc_course_statics/sc_course_statics_class.php');
		require_once('widgets/sc_video_podcast/sc_video_podcast_class.php');
		require_once('widgets/sc_lessons/sc_lessons_class.php');
		require_once('widgets/sc_teacher_lessons/sc_teacher_lessons_class.php');
		require_once('widgets/sc_demo_box/sc_demo_box_class.php');
		require_once('widgets/sc_offers_list/sc_offers_list_class.php');
		require_once('widgets/sc_menu/sc_menu_class.php');
		require_once('widgets/sc_menu/sc_notification_class.php');
		require_once('widgets/sc_menu/sc_loginbtn_class.php');
		require_once('widgets/sc_menu/sc_shoppingcart_class.php');
		require_once('widgets/sc_download_box/sc_download_box_class.php');
		require_once('widgets/sc_step_icon_box/sc_step_icon_box_class.php');
		require_once('widgets/infinitescrollingtext/init.php');
		
		//since v 12.8
		require_once('widgets/sc_image_tilter/sc_image_tilter_class.php');
		
		//since v 12.9 adding single product elements
		require_once('product/rating.php');
		require_once('product/product_infos.php');
		require_once('product/image.php'); 
		 
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
	    
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Animated_Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Blog_Posts() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Countdown_Timer() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Course_Categories() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Blog_Categories() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Section_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\SC_Separator() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cdb_Video_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Namad_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Course_Statics() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Video_Podcast() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Lessons() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Teacher_Lessons() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Demo_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Offers_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Notification() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_LoginBtn() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_ShoppingCart() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Download_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Step_Icon_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Sc_Image_Tilter() );
	    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\SC_Core_InfiniteScrollingText() );
		
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Studi_Product_Rating_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Studi_Product_Informations_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Studi_Product_Image_Widget() );
		
	}

}

add_action( 'init', 'studi_elementor_init' );
function studi_elementor_init() {
	Studiare_Elementor_Widgets::get_instance();
}