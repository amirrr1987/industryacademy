<?php

namespace Elementor;

class SC_Core_InfiniteScrollingText extends Widget_Base {

    public function get_name() {
        return 'sc-core-infinite-scrolling-text';
    }

    public function get_title() {
        return esc_html__('Infinite Scrolling Text', 'studiare');
    }

    public function get_icon() {
        return 'sc eicon-text-field';
    }

    public function get_categories() {
        return ['studiare'];
    }

    protected function register_controls() {
        $this->start_controls_section(
        	'basic',
        	array(
        		'label' => esc_html__('General', 'studiare')
        	)
        );
        
        $this->add_control(
        	'text_content',
        	array(
        		'label' => esc_html__( 'Text', 'studiare' ),
        		'type' => Controls_Manager::TEXTAREA,
        		'dynamic' => array(
        			'active' => true,
        		),
        		'placeholder' => esc_html__( 'Enter your text', 'studiare' ),
        		'default' => esc_html__( 'Add Your Text Here', 'studiare' ),
        	)
        );
        
        $this->add_control(
        	'scrolling_direction',
        	array(
        		'label'     => esc_html__('Scrolling Direction', 'studiare'),
        		'type'      => Controls_Manager::SELECT,
        		'options'   => array(
        			'rtl' => esc_html__('RTL', 'studiare'),
        			'ltr' => esc_html__('LTR', 'studiare'),
        		),
        		'default'   => 'rtl',
        	)
        );
        
        $this->add_control(
        	'scrolling_speed',
        	array(
        		'label'     => esc_html__('Scrolling Speed', 'studiare'),
        		'type'      => Controls_Manager::SELECT,
        		'options'   => array(
        			'slower' => esc_html__('Slower', 'studiare'),
        			'slowest' => esc_html__('Slowest', 'studiare'),
        			'slow' => esc_html__('Slow', 'studiare'),
        			'medium' => esc_html__('Medium', 'studiare'),
        			'fast' => esc_html__('Fast', 'studiare'),
        			'static' => esc_html__('Static', 'studiare'),
        		),
        		'default'   => 'slower',
        	)
        );
        
        $this->add_control(
        	'text_repeat_number',
        	array(
        		'label'     => esc_html__('Text Repeat Counts', 'studiare'),
        		'type'      => Controls_Manager::SELECT,
        		'options'   => array(
        			'2' => '2',
        			'3' => '3',
        			'4' => '4',
        			'5' => '5',
        			'6' => '6',
        			'7' => '7',
        			'8' => '8',
        		),
        		'default'   => '2',
        	)
        );
        
        $this->add_control(
        	'overflow_visibility',
        	array(
        		'label'     => esc_html__('Overflow Visibility', 'studiare'),
        		'type'      => Controls_Manager::SELECT,
        		'options'   => array(
        			'visible' => esc_html__('Visible', 'studiare'),
        			'hidden' => esc_html__('Hidden', 'studiare'),
        		),
        		'default'   => 'hidden',
        	)
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
        	'section_text_style',
        	array(
        		'label' => esc_html__( 'Text Style', 'studiare' ),
        		'tab' => Controls_Manager::TAB_STYLE,
        	)
        );
        
        $this->add_control(
        	'text_color',
        	array(
        		'label'     => esc_html__('Color', 'studiare'),
        		'type'      => Controls_Manager::COLOR,
        		'selectors' => array(
        			'{{WRAPPER}} .sc-scrolling-text-wrapper' => 'color: {{VALUE}};',
        		),
        	)
        );
        
        $this->add_group_control(
        	Group_Control_Typography::get_type(),
        	array(
        		'name'     => 'text_typography',
        		'selector' => '{{WRAPPER}} .sc-scrolling-text-wrapper',
        	)
        );
        
        $this->end_controls_section();
            }

    protected function render() {
    $settings = array(
        'text_content'        => '',
        'scrolling_direction' => 'rtl',
        'scrolling_speed'     => 'slower',
        'text_repeat_number'  => '2',
        'overflow_visibility' => 'hidden',
    );
    
    $settings = wp_parse_args($this->get_settings_for_display(), $settings);
    
    $this->add_render_attribute('wrapper', 'class', array(
        'sc-scrolling-text-wrapper',
    ));
    
    $content = '<div class="sc-scrolling-text-element">' . $settings['text_content'] . '</div>';
    
    $content_inner = '';
    $text_repeat_number = (int)$settings['text_repeat_number'];
    
    // Text Repeat
    ?>
    <style>
    .elementor-widget-sc-core-infinite-scrolling-text .sc-scrolling-text-inner{width:100%;height:auto;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;white-space:nowrap}.elementor-widget-sc-core-infinite-scrolling-text .sc-scrolling-text-inner>*{-webkit-transform:translateX(-20%) translateZ(0);transform:translateX(-20%) translateZ(0);-webkit-animation:scrolling-text 15s linear infinite;animation:scrolling-text 15s linear infinite;margin:0 .2em}.elementor-widget-sc-core-infinite-scrolling-text [data-visibility=hidden] .sc-scrolling-text-inner{overflow:hidden}.elementor-widget-sc-core-infinite-scrolling-text [data-direction=rtl] .sc-scrolling-text-inner{-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end}.elementor-widget-sc-core-infinite-scrolling-text [data-direction=rtl] .sc-scrolling-text-inner>*{-webkit-transform:translateX(20%) translateZ(0);transform:translateX(20%) translateZ(0);-webkit-animation:scrolling-text-reverse 15s linear infinite;animation:scrolling-text-reverse 15s linear infinite}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=static] .sc-scrolling-text-inner>*{-webkit-animation:none;animation:none}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=slower] .sc-scrolling-text-inner>*{-webkit-animation-duration:45s;animation-duration:45s}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=slowest] .sc-scrolling-text-inner>*{-webkit-animation-duration:30s;animation-duration:30s}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=slow] .sc-scrolling-text-inner>*{-webkit-animation-duration:15s;animation-duration:15s}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=medium] .sc-scrolling-text-inner>*{-webkit-animation-duration:7s;animation-duration:7s}.elementor-widget-sc-core-infinite-scrolling-text [data-speed=fast] .sc-scrolling-text-inner>*{-webkit-animation-duration:4s;animation-duration:4s}@-webkit-keyframes scrolling-text{0%{-webkit-transform:translateX(-20%) translateZ(0);transform:translateX(-20%) translateZ(0)}to{-webkit-transform:translateX(-120%) translateZ(0);transform:translateX(-120%) translateZ(0)}}@keyframes scrolling-text{0%{-webkit-transform:translateX(-20%) translateZ(0);transform:translateX(-20%) translateZ(0)}to{-webkit-transform:translateX(-120%) translateZ(0);transform:translateX(-120%) translateZ(0)}}@-webkit-keyframes scrolling-text-reverse{0%{-webkit-transform:translateX(20%) translateZ(0);transform:translateX(20%) translateZ(0)}to{-webkit-transform:translateX(120%) translateZ(0);transform:translateX(120%) translateZ(0)}}@keyframes scrolling-text-reverse{0%{-webkit-transform:translateX(20%) translateZ(0);transform:translateX(20%) translateZ(0)}to{-webkit-transform:translateX(120%) translateZ(0);transform:translateX(120%) translateZ(0)}}.elementor-widget-sc-core-infinite-scrolling-text .sc-scrolling-text-wrapper{font-size:10vw;line-height:1.5}
    body.rtl .elementor-widget-sc-core-infinite-scrolling-text .sc-scrolling-text-inner>* { -webkit-transform: translateX(20%) translateZ(0); transform: translateX(20%) translateZ(0); } body.rtl .elementor-widget-sc-core-infinite-scrolling-text [data-direction=rtl] .sc-scrolling-text-inner>* { -webkit-transform: translateX(20%) translateZ(0); transform: translateX(20%) translateZ(0); } @-webkit-keyframes scrolling-text{0%{-webkit-transform:translateX(20%) translateZ(0);transform:translateX(20%) translateZ(0)}to{-webkit-transform:translateX(120%) translateZ(0);transform:translateX(120%) translateZ(0)}}@keyframes scrolling-text{0%{-webkit-transform:translateX(20%) translateZ(0);transform:translateX(20%) translateZ(0)}to{-webkit-transform:translateX(120%) translateZ(0);transform:translateX(120%) translateZ(0)}}@-webkit-keyframes scrolling-text-reverse{0%{-webkit-transform:translateX(-20%) translateZ(0);transform:translateX(-20%) translateZ(0)}to{-webkit-transform:translateX(-120%) translateZ(0);transform:translateX(-120%) translateZ(0)}}@keyframes scrolling-text-reverse{0%{-webkit-transform:translateX(-20%) translateZ(0);transform:translateX(-20%) translateZ(0)}to{-webkit-transform:translateX(-120%) translateZ(0);transform:translateX(-120%) translateZ(0)}}
</style>

    <?php
    for ($i = 0; $i < $text_repeat_number; $i++) {
        $content_inner .= $content;
    }
    
    ?>
    <div <?php echo $this->print_render_attribute_string('wrapper'); ?> data-direction="<?php echo esc_attr($settings['scrolling_direction']); ?>" data-speed="<?php echo esc_attr($settings['scrolling_speed']); ?>" data-visibility="<?php echo esc_attr($settings['overflow_visibility']); ?>">
        <div class="sc-scrolling-text-inner"><?php echo $content_inner; ?></div>
    </div>
    <?php

    }
}