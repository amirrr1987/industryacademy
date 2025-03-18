<?php
/**
 * sc_image_tilter
 * date: 2024-03-31
 * 
 * */
namespace Elementor;


class Sc_Image_Tilter extends Widget_Base {
	
	public function get_name() {
		return 'studi-image-tilter';
	}
	
	public function get_title() {
		return  __( 'Image Tilt', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-image-box';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	
	protected function register_controls() {

		
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
	
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title', 'studiare' ),
				
			]
		);
		$this->add_control(
			'badge',
			[
				'label' => __( 'Badge', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'New', 'studiare' ),
				
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'studiare' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .sctilt_bg',
			]
		);
		
		/*
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'studiare' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'studiare' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
	
		$this->add_control(
			'button',
			[
				'label' => __( 'Button', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => __( 'If blank no button show', 'studiare' ),
				
			]
		);
		*/
		$this->add_control(
			'box_height',
			[
				'label' => __( 'Height', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 400,
				
			]
		);
		$this->add_control(
			'box_width',
			[
				'label' => __( 'Max Width', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 300,
				'selectors' => [
					'{{WRAPPER}} .sc_tilt_card' => 'max-width: {{VALUE}}px;',
				
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Title Typography', 'studiare' ),
				'selector' => '{{WRAPPER}} .sctitlt_title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'selectors' => [
					'{{WRAPPER}} .sctitlt_title' => 'color: {{VALUE}};',
				
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .sctitlt_title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typo',
				'label' => __( 'Subtitle Typography', 'studiare' ),
				'selector' => '{{WRAPPER}} .sctitlt_subtitle',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'selectors' => [
					'{{WRAPPER}} .sctitlt_subtitle' => 'color: {{VALUE}};',
				
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_shadow',
				'selector' => '{{WRAPPER}} .sctitlt_subtitle',
			]
		);
		
		$this->add_control(
			'inside_border_color',
			[
				'label' => __( 'Inside Border Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'selectors' => [
					'{{WRAPPER}} .titler_border' => 'border-color: {{VALUE}};',
				
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'custom_css_filters',
				'selector' => '{{WRAPPER}} .sctilt_bg',
			]
		);
		
		
		$this->end_controls_section();
		
		//button group
		 // Group Controls
        $this->start_controls_section(
            'button_group',
            [
                'label' => __( 'Button Group', 'studiare' ),
            ]
        );

        // Title Control
        $this->add_control(
            'button',
            [
                'label' => __( 'Title', 'studiare' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button',
            ]
        );

        // Link Control
        $this->add_control(
			'link',
			[
				'label' => __( 'Link', 'studiare' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'studiare' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        // Color Controls
        $this->add_control(
            'color',
            [
                'label' => __( 'Color', 'studiare' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sctilt_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Controls
        /*$this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'studiare' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sctilt_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        */
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color',
				'label' => __( 'Background Color', 'studiare' ),
				'types' => [ 'classic', 'gradient' ],//, 'video'
				'selector' => '{{WRAPPER}} .sctilt_btn',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_color_hover',
				'label' => __( 'Background Color Hover', 'studiare' ),
				'types' => [ 'classic', 'gradient' ],//, 'video'
				'selector' => '{{WRAPPER}} .sctilt_btn:hover',
			]
		);

        // Icon Control
        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'studiare' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->end_controls_section();
	}
	
	protected function render() {

        $settings   = $this->get_settings_for_display();
        $title      = $settings['title'];
        $badge      = $settings['badge'];
        $box_height = $settings['box_height'];
        $image      = $settings['image']['url'];
        $link       = $settings['link']['url'];
        $button     = $settings['button'];
        $target     = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow   = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
		
        ?>
        <style>
           

.sc_tilt_card {
  position: relative;
  width: auto;
  /*max-width:300px;*/
  padding: 40px;
  transform-style: preserve-3d;
}

.sc_tilt_card .sctitlt_title {
  position: relative;
  z-index: 2;
  transform: translateZ(20px);
}

.sc_tilt_card .sctitlt_subtitle {
  transform: translateZ(20px);
}

.sc_tilt_card .sctilt_bg {
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 10px;
  background-size: cover;
  background-position: center;
}

.titler_border {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    border: 2px solid white;
    border-radius: 5px;
    margin: 20px;
    transform: translateZ(50px);
}
a.sctilt_btn {
    transform: translateZ(60px);
    padding: 5px 10px;
    border-radius: 6px;
    color: #fff;
    position: absolute;
}
a.sctilt_btn i { margin: 0 5px; }
        </style>
<script src="<?php echo get_template_directory_uri();?>/assets/js/tilt.jquery.js"></script>
<div class="sc_tilt_holder">
    <?php if($link && !$button){ ?> <a href="<?php echo $link;?>" <?php echo "$target $nofollow";?>> <?php } ?>
    <div class="sc_tilt_card" data-tilt style="height: <?php echo $box_height;?>px;">
        <h3 class="sctitlt_title"><?php echo $title;?></h3>
        <p class="sctitlt_subtitle"><?php echo $badge;?></p>
        <div class="sctilt_bg" style="background-image: url(<?php echo $image;?>);"></div>
        <?php //if($button){ echo "<a class='sctilt_btn' href='$link' $target $nofollow >$button</a>";}?>
        
        <?php
        echo '<a href="' . $settings['link']['url'] . '" class="sctilt_btn " >';
        echo $settings['button'];
        if (!empty($settings['icon'])) {
            echo '<i class="' . $settings['icon']['value'] .'"></i>';
        }
        echo '</a>';
        
        ?>
        
        
        <div class="titler_border"></div>
    </div>
    <?php if($link && !$button){ ?></a><?php } ?>
</div>    
<script>
    ( function( $ ) {

	"use strict";

  $(".sc_tilt_card").tilt({
    maxTilt: 15,
    perspective: 1400,
    easing: "cubic-bezier(.03,.98,.52,.99)",
    speed: 1200,
    glare: true,
    maxGlare: 0.2,
    scale: 1.04
  });
  
   
  
}( jQuery ) );
</script>    
        <?php
        
	}
	
	protected function content_template() {
	 
    }
	
	
}

 