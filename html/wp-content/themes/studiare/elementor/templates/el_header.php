<?php

    //elementor header start 
$contentElementor = "";
$gen_page_id="6830";
$gen_page_id="7191";
$gen_page_id= $args['header_page_id'];
        
 if (class_exists("\\Elementor\\Plugin")) {
     
     
 
     //$pluginElementor = \Elementor\Plugin::instance();
     //$contentElementor = $pluginElementor->frontend->get_builder_content($gen_page_id,true);
     
     $frontend = new \Elementor\Frontend();

     $contentElementor= $frontend->get_builder_content_for_display( $gen_page_id, $with_css = true );
     
     
 }    
	
    ?>
    <header class="site-header studi_el_head">
    
    <?php    echo $contentElementor;    ?>
    
    </header>
    <?php
    //elementor header end
    ?>