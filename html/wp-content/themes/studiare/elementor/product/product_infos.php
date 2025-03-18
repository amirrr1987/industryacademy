<?php

namespace Elementor;

        // Register the Elementor widget
class Studi_Product_Informations_Widget extends Widget_Base {

            public function get_name() {
                return 'woocommerce-product-informations';
            }
            
            public function get_icon() {
        		return 'sc eicon-info';
        	}

            public function get_title() {
                return __( 'Product Informations', 'studiare' );
            }

            public function get_categories() {
                return [ 'woocommerce-elements' ];
            }
            
            protected function register_controls() {
                
               
        
        $this->start_controls_section(
			'general',
			[
				'label' => __( 'General', 'studiare' ),
			]
		);      
		
		        /*$this->add_control(
        			'title',
        			[
        				'label' => esc_html__( 'Title', 'studiare' ),
        				'type' => \Elementor\Controls_Manager::TEXT,
        				'placeholder' => esc_html__( 'Title', 'studiare' ),
        			]
        		);*/
                $this->add_control(
    			'info_type',
    			[
    				'label' => __( 'Information Type', 'studiare' ),
    				'type' => \Elementor\Controls_Manager::SELECT2,
    				'multiple' => true,
    				'options'=> [
    				    "total_sells"             => __( 'Total Sells', 'studiare' ), 
    				    "course_language"         => __( 'course language', 'studiare' ), 
    				    "course_duration"         => __( 'course duration', 'studiare' ), 
    				    "course_lesseons"         => __( 'course lesseons', 'studiare' ), 
    				    "course_level"            => __( 'course level', 'studiare' ), 
    				    "sc_file_type"            => __( 'File Type', 'studiare' ), 
    				    "sc_file_size"            => __( 'File Size', 'studiare' ), 
    				    "course_certificate"      => __( 'Course Certificate', 'studiare' ), 
    				    "course_sessions"         => __( 'Course Sessions', 'studiare' ), 
    				    "metaboxjff_sections"     => __( 'Custom Options', 'studiare' ), 
    				    ],
    				'default' => ['total_sells'],
    			]
    		);
    		
    		$this->add_control(
			'show_empties',
			[
				'label' => esc_html__( 'Show Empty Options', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
    		/*
    		$this->add_control( 'icon', [
			'label'      => esc_html__( 'Icon', 'studiare' ),
			'show_label' => false,
			'type'       => Controls_Manager::ICONS,
			 
		] ); */
    		
    		$this->add_control(
			'layout-hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
    		$this->add_control(
    			'layout',
    			[
    				'label' => __( 'Layout', 'studiare' ),
    				'type' => \Elementor\Controls_Manager::SELECT,
    				'multiple' => false,
    				'options'=> [
    				    "layout_one"         => __( 'Layout One', 'studiare' ), 
    				    "layout_two"         => __( 'Layout Two', 'studiare' ), 
    				    ],
    				'default' => 'layout_one',
    			]
    		);
    		
    		$this->add_control(
    			'info_cols',
    			[
    				'label'               => __( 'Number Of Columns', 'studiare' ),
    				'type'                => \Elementor\Controls_Manager::SELECT2,
    				'multiple'            => false,
    				'condition' => [
            			'layout' => 'layout_two',
            		],
    				'options'=> [
    				    "one"             => '1', 
    				    "two"             => '2', 
    				    "three"           => '3', 
    				    "four"            => '4', 
    				    "six"             => '6', 
    				    ],
    				'default'             => 'six',
    			]
    		);
    		
    		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .value',
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
    		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'studiare' ),
				'label_block' => false,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stelementori_lay_one-meta-info-unit .icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .stelementori_lay_two-meta-info-unit .icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .stelementori_lay_one-meta-info-unit .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stelementori_lay_two-meta-info-unit .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'studiare' ),
				'label_block' => false,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc-meta-item' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => __( 'Value Color', 'studiare' ),
				'label_block' => false,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .value' => 'color: {{VALUE}}',
				],
			]
		);
		
		
    		
    		 $this->end_controls_section();
                
            } 
            
            public function layout_render($layout,$icon,$title,$data){
                
                $settings     = $this->get_settings_for_display();
                $info_cols    = $settings['info_cols']?:"six";
                if($info_cols =="one"){$cols="col-md-12";}
                if($info_cols =="two"){$cols="col-md-6";}
                if($info_cols =="three"){$cols="col-md-4";}
                if($info_cols =="four"){$cols="col-md-3";}
                if($info_cols =="six"){$cols="col-md-2";}
                
                if($layout=="layout_one"){
                    ?>
                    <div class="stelementori_lay_one-meta-info-unit">
                        <?php if($icon){?> <div class="icon"><?php echo $icon;?></div> <?php } ?>
                        <div class="sc-meta-holder">
                          <div class="sc-meta-item"><?php echo $title;?></div><div class="value"><?php echo $data;?></div>
                          </div>
                    </div>
                    <?php
                }
                
                if($layout=="layout_two"){
                    ?>
                    <div class="<?php echo $cols;?> col-xs-6">
                        <div class="stelementori_lay_two-meta-info-unit hint--top" aria-label="<?php echo $title;?>">
                        <?php if($icon){?> <div class="icon"><?php echo $icon;?></div> <?php } ?>
                          <div class="value"><?php echo $data;?></div>
                        </div>
                    </div>
                    <?php
                }
                
            }
 
            public function render() {
               
               $settings = $this->get_settings_for_display();
                
               
               $info_type = $settings['info_type'];
               if(!$info_type){
                    echo __("Nothing To Show","studiare");
                    return;
               }
               $layout = $settings['layout'];
               $show_empties = $settings['show_empties'];
               $pro_id = get_the_ID();
               
               if(in_array("metaboxjff_sections",$info_type)){
                   
                   

               }


                
               
               foreach($info_type as $key=>$info){
                   
                $data = sc_get_pro_infos($pro_id,$info); 
               $icon =array();
               if($info=="total_sells"){
                   $title = sc_get_pro_infos($pro_id,'course_buyers_text');
                   $icon['value']=sc_get_pro_infos($pro_id,'course_buyers_text_icon');
                   $icon['value']=   substr($icon['value'], 0, 3). ' ' .substr($icon['value'], 3); 
               }
               if($info=="course_language"){
                   $title = sc_get_pro_infos($pro_id,'course_language_hint');
                   $icon['value']="fal fa-language";
               }
               if($info=="course_duration"){
                   $title = sc_get_pro_infos($pro_id,'course_duration_hint');
                   $icon['value']="fal fa-clock";
               }
               if($info=="course_lesseons"){
                   $title = sc_get_pro_infos($pro_id,'course_lesseons_hint');
                   $icon['value']="fal fa-list";
               }
               if($info=="course_level"){
                   $title = sc_get_pro_infos($pro_id,'course_level_hint');
                   $icon['value']="fal fa-signal-4";
               } 
               if($info=="sc_file_type"){
                   $title = sc_get_pro_infos($pro_id,'sc_file_type_hint');
                   $icon['value']=sc_get_pro_infos($pro_id,'sc_file_type_icon');;
               } 
               if($info=="sc_file_size"){
                   $title = sc_get_pro_infos($pro_id,'sc_file_size_hint');
                   $icon['value']="fal fa-save";
               } 
               if($info=="course_certificate"){
                   $title = sc_get_pro_infos($pro_id,'course_certificate_hint');
                   $icon['value']="fal fa-award";
               } 
               if($info=="course_sessions"){
                   $title = sc_get_pro_infos($pro_id,'course_sessions_hint');
                   $icon['value']="fal fa-list";
               } 
               
               
               if($icon){ $icon = "<i class='".$icon['value']."'></i>"; }else{ $icon='';}


               
               
               
               
               
               if($info=="metaboxjff_sections"){
                    $prefix = '_studiare_';
                    $custom_ops = sc_get_pro_infos($pro_id,'metaboxjff_sections');
                       if($custom_ops){
                           foreach($custom_ops as $key => $entry){
                               
                               if ( isset( $entry[ $prefix . 'sc_studi_custom_title_1' ] ) ) 
        
                        		        $title = esc_html( $entry[ $prefix . 'sc_studi_custom_title_1' ] );
                        		        
                        		        		        
                        		if ( isset( $entry[ $prefix .'sc_studi_custom_text_1' ] ) )
                        				        
                        		        $data = $entry[ $prefix . 'sc_studi_custom_text_1' ];
                        		        
                        		if ( isset( $entry[ $prefix .'sc_studi_custom_icon_1' ] ) ){
                        		     $icon_raw = $entry[ $prefix . 'sc_studi_custom_icon_1' ];
                        		     $icon = substr($icon_raw, 0, 3)." ".substr($icon_raw, 3);
                        		}
                        		if($icon){ $icon = "<i class='".$icon."'></i>"; }else{ $icon='';}
                        	
                        		if($show_empties=="yes"){
                                   if(!$data ){$data="-";}
                                    $this->layout_render($layout,$icon,$title,$data);
                               }else{
                                   if($data ){
                                       $this->layout_render($layout,$icon,$title,$data);
                                   }
                               }
                               
                           }
                    }
               }else{
                   if($show_empties=="yes"){
                       if(!$data ){$data="-";}
                        $this->layout_render($layout,$icon,$title,$data);
                   }else{
                       if($data ){
                           $this->layout_render($layout,$icon,$title,$data);
                       }
                   }
                   
               } 
                
               
               
            }
            }
}


