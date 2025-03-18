<?php

namespace Elementor;

        // Register the Elementor widget
class Studi_Product_Rating_Widget extends Widget_Base {

            public function get_name() {
                return 'woocommerce-product-rating';
            }
            
            public function get_icon() {
        		return 'sc eicon-counter';
        	}

            public function get_title() {
                return __( 'Product Rating', 'studiare' );
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
                $this->add_control(
    			'stars',
    			[
    				'label' => __( 'Stars', 'studiare' ),
    				'type' => \Elementor\Controls_Manager::SELECT2,
    				'multiple' => false,
    				'options' => [
    				    true    => __( 'star', 'studiare' ),
    				    false   => __( 'number', 'studiare' ),
    				    "fromt" => __( 'Theme Settings', 'studiare' ), //from theme settings
    				    ],
    				'default' => true,
    			]
    		);
    		
    		$this->add_control(
			'active_star_color',
			[
				'label' => __( 'Star color', 'studiare' ),
				'label_block' => false,
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.stratingamount:before' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'deactive_star_color',
			[
				'label' => __( 'Star color background', 'studiare' ),
				'label_block' => false,
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .studistarrating:before' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'rating_txt_color',
			[
				'label' => __( 'Rating color', 'studiare' ),
				'label_block' => false,
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.rating' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'vote_txt_color',
			[
				'label' => __( 'Vote color', 'studiare' ),
				'label_block' => false,
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.votes-number' => 'color: {{VALUE}}',
				],
			]
		);
    		
    		 $this->end_controls_section();
                
            }

            public function render() {
               
               $settings = $this->get_settings_for_display();

                $stars = $settings['stars'];

                if($stars == 'fromt'){
                    if ( class_exists('Redux')) {
                        $stars = codebean_option("product_stars");
                    }else{
                        $stars=true;
                    }
                }
               ?><div class='scrating'><?php
               sc_show_p_rating($stars);
               ?></div><?php
               
            }
}


