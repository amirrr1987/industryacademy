<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}


$panel_args =array('args','general', 'style','typography','header','footer', 'floating','product','dashboard', 'ticket', 'blog','events','portfolio','social','custom','optimize');

foreach($panel_args as $panel){
    
    include_once ("backend_panels/".$panel.".php");
    
}


// Function used to retrieve theme option values
if ( ! function_exists( 'codebean_option' ) ) {
	function codebean_option( $id, $fallback = false, $param = false ) {
		global $codebean_option;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset( $codebean_option[$id] ) && $codebean_option[$id] !== '' ) ? $codebean_option[$id] : $fallback;
		if ( !empty( $codebean_options[$id] ) && $param ) {
			$output = $codebean_options[$id][$param];
		}
		return $output;
	}
}

//theme setting fullscreen option
function studi_admin_theme_options_page() {
    // Check if we're on the theme options page
    if ( isset($_GET['page']) && $_GET['page'] == 'theme-options' ) {
        ?>
        <style>
           .studi_fscreen_btn { position: absolute; left: 20px; top: 24px; background: ghostwhite; padding: 5px; border-radius: 4px; font-size: 20px;transition:.4s;}
           body.studi_toption_full #adminmenumain{display:none;}
           body.studi_toption_full #wpcontent{margin-right:0;}
           a.studi_fscreen_btn.stbtac { transform: rotate(45deg); }
        </style>


        <script>
            jQuery(document).ready(function($){
                $("#redux-header").append("<a href='#' class='studi_fscreen_btn'><i class='fas fa-expand'></i></a>");
                
                $('.studi_fscreen_btn').on('click',function(a){
                    a.preventDefault();
                    $(this).toggleClass('stbtac');
                    $('body.wp-admin').toggleClass('studi_toption_full');
                });
            });
        </script>
        <?php
    }
    
    // Check if we're on the theme options page
    if ( isset($_GET['page']) && $_GET['page'] == 'studiare_panel' ) {
        ?>
        <style>
        .studiare-hub-container { margin-left: 50px; }
           .studi_fscreen_btn { position: absolute; left: 20px; top: 16px; background: ghostwhite; padding: 5px; border-radius: 4px; font-size: 20px;transition:.4s;}
           body.studi_toption_full #adminmenumain{display:none;}
           body.studi_toption_full #wpcontent{margin-right:0;}
           body.rtl.studi_toption_full .studiare-hub-intro{right:0;}
           a.studi_fscreen_btn.stbtac { transform: rotate(45deg); }
        </style>


        <script>
            jQuery(document).ready(function($){
                $(".studiare-hub-intro").append("<a href='#' class='studi_fscreen_btn'><i class='fas fa-expand'></i></a>");
                
                $('.studi_fscreen_btn').on('click',function(a){
                    a.preventDefault();
                    $(this).toggleClass('stbtac');
                    $('body.wp-admin').toggleClass('studi_toption_full');
                });
            });
        </script>
        <?php
    }
    
}
add_action('admin_footer', 'studi_admin_theme_options_page');





