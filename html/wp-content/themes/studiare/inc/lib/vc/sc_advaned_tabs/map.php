<?php


/**
 * start advanced tab for visual composer
 * */

class Sc_Studi_AdvanceTabs {


    /**
     * Get things started
     */
    function __construct() {

        add_action('init', array($this, 'sc_studi_tabs_parent'));
        add_action('init', array($this, 'sc_studi_tabs_child'));
        add_shortcode('sc_studi_advance_tabs', array($this, 'sc_studi_advance_tabs_rendering'));
        add_shortcode('sc_studi_advance_tab', array($this, 'sc_studi_advance_tab_rendering'));
        add_action( 'init', array( $this, 'check_if_vc_is_install' ) );

        define( 'TABS_URL', plugins_url('/', __FILE__ ) );
        
    }



    function sc_studi_tabs_parent() {
        if (function_exists("vc_map")) {

    	    vc_map(array(
    	        "name" => __("تب های پیشرفته", "studiare"),
    	        "base" => "sc_studi_advance_tabs",
    	        "as_parent" => array('only' => 'sc_studi_advance_tab'),
    	        'category' => esc_html__( 'اختصاصی قالب', 'studiare' ),
    	        "js_view" => 'VcColumnView',
                "content_element" => true,
                "show_settings_on_create" => true,
                "is_container" => true,
                "icon" => 'admin_vc_addon',
    	        "params" => array(

                	array(
                		'type'			=> 'dropdown',
                		'admin_label'	=> true,
                		'heading'		=> esc_html__('استایل تب', 'studiare'),
                		'param_name'	=> 'sc_studi_tabs_style',
                		'value' => array(
                			'Select Style' => '',
                			'Style1' => 'style1',
                		)
                	),
/*
                    array(
                        'type'          => 'dropdown',
                        'admin_label'   => true,
                        'heading'       => esc_html__('Tabs Type (PRO Feature)', 'studiare'),
                        'param_name'    => 'sc_studi_tabs_type',
                        'value' => array(
                            'Select Type' => '',
                            'Vertical' => 'vertical',
                            'Horizontal' => 'horizantal',
                        )
                    ),

                	

                	array(
                		'type'			=> 'dropdown',
                		'admin_label'	=> true,
                		'heading'		=> esc_html__('Color Scheme (More in Pro Version)', 'studiare'),
                		'param_name'	=> 'sc_studi_color_scheme',
                		'group' => esc_html__('Color Scheme','studiare'),
                		'value' => array(
                			'Select Color Scheme' => '',
                			'Blue' => 'blue',
                			'Green' => 'green',
                			'MidNight Blue' => 'midnightblue',
                			'Orange' => 'orange',
                		)
                	),
*/

                    
                   
    			)
    	    ));


        }
    }

    function sc_studi_tabs_child() {
        if (function_exists("vc_map")) {


	        vc_map(array(
	            "name" => __("تب پیشرفته", "studiare"),
	            "base" => "sc_studi_advance_tab",
	            "as_child" => array('only' => 'sc_studi_advance_tabs'),
	            'as_parent'			=> array(''),
	            'allowed_container_element' => 'vc_row',
				'js_view'					=> 'VcColumnView',
	            "icon" => 'extended-custom-icon-sc_studi icon-wpb-advanced-tab',
	            'params' => array_merge(
					array(
						array(
							'type' => 'textfield',
							"holder" => "div",
							'admin_label' => true,
							'heading' => esc_html__('عنوان تب', "studiare"),
							'param_name' => 'sc_studi_tab_title',
							"description" => "",
						),
						array(
							'type' => 'textfield',
							"holder" => "div",
							'admin_label' => true,
							'heading' => esc_html__('شناسه تب', "studiare"),
							'param_name' => 'sc_studi_tab_uniq_id',
							"description" => esc_html__('شناسه تب باید به زبان انگلیسی و یکتا باشد', "studiare"),
						),
					)
				)
	        ));


        }
    }

    function sc_studi_advance_tabs_rendering($atts, $content = null, $tag) {
    	

        $args = array(
        	'sc_studi_title_tag' => '',
            'sc_studi_tabs_style' => 'style1',
            'sc_studi_color_scheme' => 'blue',
        );

        $params  = shortcode_atts($args, $atts);

        extract($params);

        // Extract tab titles
        preg_match_all('/sc_studi_tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $tab_titles = array();

        /**
         * get tab titles array
         *
         */
        if (isset($matches[0])) {
        	$tab_titles = $matches[0];
        }

        $tab_title_array = array();

        foreach($tab_titles as $tab) {
        	preg_match('/sc_studi_tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
        	$tab_title_array[] = $tab_matches[1][0];
        }

        $params['sc_studi_tabs_titles'] = $tab_title_array;
        
        //add by javad start
        // Extract tab titles
        preg_match_all('/sc_studi_tab_uniq_id="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $tab_ids = array();

        /**
         * get tab titles array
         *
         */
        if (isset($matches[0])) {
        	$tab_ids = $matches[0];
        }

        $tab_ids_array = array();

        foreach($tab_ids as $tab) {
        	preg_match('/sc_studi_tab_uniq_id="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
        	$tab_ids_array[] = $tab_matches[1][0];
        }

        $params['sc_studi_tabs_titles'] = $tab_ids_array;
        //add by javad end
        
        
        
        $params['content'] = $content;

        $tabs_color_scheme = $params['sc_studi_color_scheme'];
        $color_scheme_path =  'assests/colors/'.$tabs_color_scheme.'.css';


        ob_start();
        $final_array = array_combine($tab_title_array,$tab_ids_array);
        $id = $this->gen_id();
        ?>
     
    	<div id="<?php echo $id ;?>" class="studi-tabs-<?php echo $params['sc_studi_tabs_style']; ?>  sc_studi-tabs-container">
            <ul class="studi-nav-tabs">
                <?php //foreach ($tab_title_array as $tab_title): ?>
                <?php foreach ($final_array as $tab_title=>$tab_id){ ?>
                	<li>
                		<a data-tabsid="<?php echo $id ;?>" data-toggle="tab" data-href=".tab-<?php echo sanitize_title($tab_id);?>" class="studi_tab_title"><?php echo $tab_title; ?></a>
                	</li>
                <?php } //endforeach ?>
            </ul>
            <div class="tab-content">
            	<?php do_shortcode( $content ); ?>
            </div>                			
    	</div>
    	<script>
    	    //advanced tabs start
 jQuery(document).ready(function($) {
	$('.sc_studi-tabs-container').find('.tab-pane').first().addClass('active in');
	$('.sc_studi-tabs-container').find('.studi-nav-tabs li').first().addClass('active');
	var tabs = $('.sc_studi-tabs-container');
	
	
	tabs.each(function(){
		var thisTabs = $(this);
		thisTabs.children('.tab-content').find('.tab-pane').each(function(index){
			index = index + 1;
			
			var that = $(this),
				link = that.attr('id'),
				// activeNav = that.closest('.tab-content').parent().find('.nav-tabs li').first().addClass('active'),
				navItem = that.closest('.tab-content').parent().find('.studi-nav-tabs li:nth-child('+index+') a'),
				navLink = navItem.attr('href');
				//console.log(navLink);

			link = '#'+link;
			if(link.indexOf(navLink) > -1) {
				navItem.attr('href',link);
			}
		});
	});

	$(".studi_tab_title").click(function(){
	    var href = $(this).attr("data-href");
	    var tabsid = $(this).attr("data-tabsid");
	    var tabs = $("#"+tabsid);
	    tabs.each(function(){
	       var thisTabs = $(this); 
	       thisTabs.children('.tab-content').find('.tab-pane').each(function(index){
	           var that = $(this);
	           that.removeClass("active");
	       });
	    });
	    $("#"+tabsid+" "+href).addClass("active");
	    //alert(href+tabsid);
	    $(this).closest(".studi-nav-tabs").find("li").removeClass("active");
	    $(this).closest("li").addClass("active");
	});
	
});
 //advanced tabs end
    	</script>
        <?php

        $output = ob_get_clean();

        return $output;
    }

    function sc_studi_advance_tab_rendering($atts, $content = null, $tag) {
        extract(shortcode_atts(array(

        ), $atts));

        $default_atts = array(
        	'sc_studi_tab_title' => 'Tab',
        	'sc_studi_tab_uniq_id' => '',
        	'tab_id' => ''
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $rand_number = $this->gen_id();//rand(0, 1000);
        //$params['sc_studi_tab_title'] = $params['sc_studi_tab_title'].'-'.$rand_number;
        $tab_id = $params['sc_studi_tab_uniq_id'].'-'.$rand_number;

        $params['content'] = $content;
        ?>
     	
     	    <div  id="tab-<?php echo $tab_id; ?>" class="tab-<?php echo $params['sc_studi_tab_uniq_id'] ?> tab-pane fade">
     	    	<?php echo do_shortcode($content); ?>
     	    </div>

        <?php
    }
    
    function gen_id(){
        $id = "studi_tab_".rand(100,1500);
        return $id;
    }
    function check_if_vc_is_install(){
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            
            return;
        }
    }

    

}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_sc_studi_advance_tabs extends WPBakeryShortCodesContainer {
    }
}
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_sc_studi_advance_tab extends WPBakeryShortCodesContainer {
    }
}

if (class_exists('Sc_Studi_AdvanceTabs')) {
	    $obj_init = new Sc_Studi_AdvanceTabs;
	}


/**
 * end advanced tab for visual composer
 * */
  