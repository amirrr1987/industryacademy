<?php
 /* add css to elementor page editor start*/
 add_action('elementor/editor/before_enqueue_scripts','add_elementor_css_by_suncode');
 function add_elementor_css_by_suncode(){
     $page_action = isset($_GET['action']) ? $_GET['action'] :'';
     if($page_action == 'elementor'){
         wp_enqueue_style( 'suncode_elementor_front_css',  get_template_directory_uri().'/inc/backend_styles/suncode_elementor_front_css.css');
     }
     if(is_admin()){
         
     }
 } 
/** add css to elementor page editor end **/

 function suncode_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/inc/backend_styles/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'suncode_login_stylesheet' );
// customize admin bar css
function suncode_override_admin_bar_css() { 

   if ( is_admin_bar_showing() ) { 
       wp_enqueue_style( 'custom-adminbar', get_template_directory_uri() . '/inc/backend_styles/style-adminbar.css' );


    }

}
// on frontend area
add_action( 'wp_head', 'suncode_override_admin_bar_css' );

# Enqueue admin styles
function sc_admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/backend_styles/admin.css');
}
add_action('admin_enqueue_scripts', 'sc_admin_style');