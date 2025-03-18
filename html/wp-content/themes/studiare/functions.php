<?php

/**
 * Studiare functions and definitions
 */

# Constants
define('STUDIARE_THEMEDIR', 		get_theme_file_path() . '/');
define('STUDIARE_THEMEURL', 		get_theme_file_uri() . '/');
define('STUDIARE_THEMEASSETS',	    STUDIARE_THEMEURL . 'assets/');
define('STUDIARE_TD', 			    'studiare');
define('STUDIARE_TS', 			    microtime(true));

/* suncode integrations */
load_theme_textdomain( 'studiare', get_template_directory() . '/languages' );
include_once 'sc_main_functions.php';

# Initial Actions
add_action( 'after_setup_theme',    'studiare_after_setup_theme' );
add_action('init', 				    'studiare_init');

add_action('wp_enqueue_scripts',    'studiare_wp_enqueue_scripts');

/* add admin script by suncode */
add_action( 'admin_enqueue_scripts', 'sc_studi_admin_scripts' );
function sc_studi_admin_scripts(){
	wp_enqueue_script( 'studi_admin', STUDIARE_THEMEASSETS . '/js/admin.js', array() );
}

if (!isset($content_width)) {
	$content_width = 1120;
}
// wp_enqueue_style( 'sc-min-hint.css',  STUDIARE_THEMEURL . 'assets/css/sc-min-hint.css' );
// wp_enqueue_style( 'toastr.css',  STUDIARE_THEMEURL . 'assets/css/toastr.css' );

# Core Files
require get_parent_theme_file_path( '/inc/codebean_functions.php' );
require get_parent_theme_file_path( '/inc/codebean_actions.php' );
require get_parent_theme_file_path( '/inc/codebean_filters.php' );
require get_parent_theme_file_path( '/inc/codebean_vc.php' );
require get_parent_theme_file_path( '/inc/codebean_woocommerce.php' );
require get_parent_theme_file_path( '/inc/backend_styles.php' );
# Widgets
require get_parent_theme_file_path( '/inc/widgets/contacts.php' );
require get_parent_theme_file_path( '/inc/widgets/namad_carousel.php' );

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/codebean_options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/codebean_options.php' );
}
# Libraries
require get_parent_theme_file_path('/inc/tgm/tgm-plugin-registration.php');

//add_action('wp_footer','studi_add_rtl');
function studi_add_rtl(){
    if(is_child_theme() =="true"){
//wp_enqueue_style( 'rtl', get_template_directory_uri(). '/rtl.css' ); 
}
}

include_once 'custom_functions.php';
include_once 'inc/studi_panel/studi_panel_helper.php';

/* redirect login page */
add_action('wp_logout','studi_redirect_after_logout');
function studi_redirect_after_logout(){
    
	$url = get_site_url().'/my-account';
	if(class_exists('Redux')){
	    $urlOption = codebean_option('sc_custom_logout_url');
	    if(!empty($urlOption)){
	        $url =$urlOption;
	    }
	    
	}
         wp_redirect( $url );
         exit();
}
function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );
//for translate theme name and description
if (defined('WP_CLI') || (isset($_GET['lang']) && $_GET['lang'] === 'update_po')) {
    __('Studiare', 'studiare');
    __('Studiare Child Theme', 'studiare');
    __('With Studiare, you can sell, market and create your online courses in one place. It is perfect for universities, teachers, and tutors, but can also be used by individuals and businesses.', 'studiare');
    __('The Studiare child theme is designed for your custom coding and styling needs. If you don\'t require it, activate the main theme and remove the child theme.', 'studiare');
}
