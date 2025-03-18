<?php
namespace Elementor;

class Cdb_Animated_Counter extends Widget_Base {
	
	public function get_name() {
		return 'anmated-counter';
	}
	
	public function get_title() {
		return  __( 'Animated Counter', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-counter';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		
		$this->add_control(
			'value',
			[
				'label' => __( 'Value', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::NUMBER,
				'placeholder' => __( 'Enter a number', 'studiare' ),
			]
		);

		$this->add_control(
			'label',
			[
				'label' => __( 'Label', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your label', 'studiare' ),
			]
		);
		$this->add_control(
			'color_scheme',
			[
				'label' => __( 'Color Scheme', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
                'default' => 'dark',
				'options' => [
					'dark'  => __( 'Dark', 'studiare' ),
					'light' => __( 'Light', 'studiare' ),
					'custom' => __( 'Custom', 'studiare' ),

				],
			]
		);
        
        $this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-custom .counter-text' => 'color: {{VALUE}}',
				],
			]
		);
		
		

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        $url = $settings['link']['url'];
        $value = $settings['value'];
        $label = $settings['label'];
        $color_scheme = $settings['color_scheme'];
        $text_color = $settings['text_color'];
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		
		$css_class = "animated-counter counter-{$color_scheme}";
		
		if ( $label !== '' ) {
		    $label = wp_kses_post( $label );
		    $label = "<span class='counter-label'>$label</span>";
		}
		
		
		
		
		
		echo "<div class='$css_class'>
		    <div class='counter-text' $text_color>
		        <span class='counter-number'>$value</span>
		        $label
		    </div>
		</div>";
		 

	}
	
	protected function _content_template() {
	    
	    ?>
	    <div class='animated-counter counter-{{{ settings.color_scheme}}}'>
		    <div class='counter-text' >
		        <span class='counter-number'>{{{ settings.value}}}</span>
		        <span class='counter-label'>{{{ settings.label}}}</span>
		    </div>
		</div>
	    <?php

    }
	
	
}