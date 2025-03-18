<?php
/**
 * The template for displaying all footers
 */

get_header();
echo "<style>
        footer,.studi_notif_bar,header.site-header:not(.studi_el_head),header.site-header,.page-title,.studi_pre_footer{display:none !important;}
        </style>";
        
the_content();
get_footer(); 

//if(class_exists('Elementor')){
    if(\Elementor\Plugin::$instance->editor->is_edit_mode()){
        
        add_action('wp_footer',function(){
        echo "<style>
        footer{display:none !important;}
        </style>";
        });
        
    }
//}
