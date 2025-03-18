<?php
	$sc_view_page_general_att = codebean_option('sc_view_page_general_att');
		if($sc_view_page_general_att==1){
			$gen_page_id = codebean_option('sc_select_page_general_att');
		    $gen_page_id_exclude_cats = codebean_option('sc_select_page_general_att_exclude_cats');
	    	$terms = get_the_terms ( get_the_id(), 'product_cat' );
		    $product_cats = array();
		    $show_tag = "true";
		    
		    if($terms){
		    foreach ( $terms as $term ) {
			    if($term){
			        if(is_array($gen_page_id_exclude_cats)){
			            if(in_array($term->term_id,$gen_page_id_exclude_cats)){$show_tag = "false";}
			        }
			        
			    }
		    }
		    }
		
			if(!empty($gen_page_id) && $show_tag==="true"){
			
			//since version 12.6
				        $sc_sections_off = array();
				        $prefix = '_studiare_'	;
    	                $sc_sections_off = get_post_meta( get_the_ID(), $prefix . 'sc_sections_off', false );
    	                if(!in_array('general_features',$sc_sections_off)){
			?>
			<div class="sc-courseCharacteristics">
		<?php 
            //$slug = get_post_field( 'post_name', get_post($gen_page_id) );
            //show_post($slug);
            
            $contentElementor = "";

                            if (class_exists("\\Elementor\\Plugin")) {

                                $pluginElementor = \Elementor\Plugin::instance();
                                $contentElementor = $pluginElementor->frontend->get_builder_content($gen_page_id);
                            }
                            
                echo $contentElementor;
            
		?>
			</div>
<?php 
			    
    	                } 
			}
} ?>