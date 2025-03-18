<?php
namespace Elementor;


class Sc_Demo_Box extends Widget_Base {
	
	public function get_name() {
		return 'studi-demo-box';
	}
	
	public function get_title() {
		return  __( 'Demo Box', 'studiare' );
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
			'box_height',
			[
				'label' => __( 'Height', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 400,
				
			]
		);
		$this->add_control(
			'badge_bg_color',
			[
				'label' => __( 'Badge Background', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#E91E63',
				'selectors' => [
					'{{WRAPPER}} .studi_demo_linker .newbadge' => 'background: {{VALUE}}; box-shadow: 0 3px 13px {{VALUE}}',
				
				],
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
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
		
        ?>
        <div class="studi_demo_linker">
            <?php if(!empty($badge)){ ?>
            <span class="newbadge"><?php echo $badge;?></span>
            <?php } 
            echo '<a href="' . $settings['link']['url'] . '"' . $target . $nofollow . '>';
            ?>
        
            <div class="studi_landing_image studi_slippery" style="background-image: url(<?php echo $image;?>);padding-top:<?php echo $box_height;?>px;">
            </div>
            </a>
            <?php echo '<a class="studi_demo_link" href="' . $settings['link']['url'] . '"' . $target . $nofollow . '>'.$title.'</a>'; ?>
        </div>
        <?php
        
	}
	
	protected function content_template() {
	 
    }
	
	
}

