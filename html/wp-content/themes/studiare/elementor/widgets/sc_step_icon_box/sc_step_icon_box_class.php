<?php

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || exit;

class Sc_Step_Icon_Box extends Widget_Base {
	
	public function get_name() {
		return 'sc-step-icon-box';
	}

	public function get_title() {
		return __( 'Step Icon Box', 'studiare' );
	}

	public function get_icon() {
		return 'sc eicon-icon-box';
	}
    
    public function get_categories() {
		return [ 'studiare' ];
	}
	public function get_keywords() {
		return [ 'icon box', 'icon', 'box', 'box icon' ];
	}
	
	protected function register_controls() {
		$this->register_common_button_style_section();
		/** start add_icon_box_section **/
		$this->start_controls_section( 'icon_box_section', [
			'label' => esc_html__( 'Icon Box', 'studiare' ),
		] );

		$this->add_control( 'style', [
			'label'        => esc_html__( 'Style', 'studiare' ),
			'type'         => Controls_Manager::SELECT,
			'options'      => [
				'01' => '01',
			],
			'default'      => '01',
			'prefix_class' => 'studiare-step-icon-box-style-',
		] );

		$this->add_control( 'link', [
			'label'       => esc_html__( 'Link', 'studiare' ),
			'type'        => Controls_Manager::URL,
			'dynamic'     => [
				'active' => true,
			],
			'placeholder' => esc_html__( 'https://your-link.com', 'studiare' ),
			'separator'   => 'before',
		] );

		$this->add_control( 'link_click', [
			'label'     => esc_html__( 'Apply Link On', 'studiare' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => [
				'box'    => esc_html__( 'Whole Box', 'studiare' ),
				'button' => esc_html__( 'Button Only', 'studiare' ),
			],
			'default'   => 'box',
			'condition' => [
				'link[url]!' => '',
			],
		] );
		/** end add_icon_box_section **/
		
		/** start add_content_icon_section **/
		$this->add_control( 'icon_heading', [
			'label'     => esc_html__( 'Icon', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_control( 'icon', [
			'label'      => esc_html__( 'Icon', 'studiare' ),
			'show_label' => false,
			'type'       => Controls_Manager::ICONS,
			'default'    => [
				'value'   => 'fas fa-star',
				'library' => 'fa-solid',
			],
		] );

		$this->add_control( 'view', [
			'label'        => esc_html__( 'View', 'studiare' ),
			'type'         => Controls_Manager::SELECT,
			'options'      => [
				'default' => esc_html__( 'Default', 'studiare' ),
				'stacked' => esc_html__( 'Stacked', 'studiare' ),
				'bubble'  => esc_html__( 'Bubble', 'studiare' ),
			],
			'default'      => 'default',
			'prefix_class' => 'studiare-view-',
			'condition'    => [
				'icon[value]!' => '',
			],
		] );

		$this->add_control( 'shape', [
			'label'        => esc_html__( 'Shape', 'studiare' ),
			'type'         => Controls_Manager::SELECT,
			'options'      => [
				'circle' => esc_html__( 'Circle', 'studiare' ),
				'square' => esc_html__( 'Square', 'studiare' ),
			],
			'default'      => 'circle',
			'condition'    => [
				'view'         => [ 'stacked' ],
				'icon[value]!' => '',
			],
			'prefix_class' => 'studiare-shape-',
		] );

		$this->add_control( 'position', [
			'label'        => esc_html__( 'Position', 'studiare' ),
			'type'         => Controls_Manager::CHOOSE,
			'default'      => 'top',
			'options'      => [
				'left'  => [
					'title' => esc_html__( 'Left', 'studiare' ),
					'icon'  => 'eicon-h-align-left',
				],
				'top'   => [
					'title' => esc_html__( 'Top', 'studiare' ),
					'icon'  => 'eicon-v-align-top',
				],
				'right' => [
					'title' => esc_html__( 'Right', 'studiare' ),
					'icon'  => 'eicon-h-align-right',
				],
			],
			'prefix_class' => 'elementor-position-',
			'toggle'       => false,
			'condition'    => [
				'icon[value]!' => '',
			],
		] );

		$this->add_control( 'mobile_top_position', [
			'label'        => esc_html__( 'Mobile Top Position', 'studiare' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'condition'    => [
				'icon[value]!' => '',
				'position!'    => 'top',
			],
			'prefix_class' => 'mobile-position-top-',
		] );

		$this->add_control( 'content_vertical_alignment', [
			'label'        => esc_html__( 'Vertical Alignment', 'studiare' ),
			'type'         => Controls_Manager::CHOOSE,
			'options'      => SC_Widget_Utils::get_control_options_vertical_alignment(),
			'default'      => 'top',
			'prefix_class' => 'elementor-vertical-align-',
			'condition'    => [
				'icon[value]!' => '',
				'position!'    => 'top',
			],
		] );
		/** end add_content_icon_section **/
		
		/** start add_content_title_section **/
		$this->add_control( 'title_heading', [
			'label'     => esc_html__( 'Title', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_control( 'title_text', [
			'label'       => esc_html__( 'Text', 'studiare' ),
			'type'        => Controls_Manager::TEXT,
			'dynamic'     => [
				'active' => true,
			],
			'default'     => esc_html__( 'This is the heading', 'studiare' ),
			'placeholder' => esc_html__( 'Enter your title', 'studiare' ),
			'label_block' => true,
		] );

		$this->add_control( 'title_size', [
			'label'   => esc_html__( 'HTML Tag', 'studiare' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'h1'   => 'H1',
				'h2'   => 'H2',
				'h3'   => 'H3',
				'h4'   => 'H4',
				'h5'   => 'H5',
				'h6'   => 'H6',
				'div'  => 'div',
				'span' => 'span',
				'p'    => 'p',
			],
			'default' => 'h3',
		] );

		// Divider.
		$this->add_control( 'title_divider_enable', [
			'label' => esc_html__( 'Display Divider', 'studiare' ),
			'type'  => Controls_Manager::SWITCHER,
		] );
		/** end add_content_title_section **/
		
		/** start add_content_description_section **/
		$this->add_control( 'description_heading', [
			'label'     => esc_html__( 'Description', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_control( 'description_text', [
			'label'       => esc_html__( 'Text', 'studiare' ),
			'type'        => Controls_Manager::TEXTAREA,
			'dynamic'     => [
				'active' => true,
			],
			'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'studiare' ),
			'placeholder' => esc_html__( 'Enter your description', 'studiare' ),
			'rows'        => 10,
			'separator'   => 'none',
		] );
		/** end add_content_description_section **/
		
		/** start add_content_badge_text **/
		$this->add_control( 'badge_text_heading', [
			'label'     => esc_html__( 'Badge Text', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_control( 'badge_text', [
			'label'   => esc_html__( 'Text', 'studiare' ),
			'type'    => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
		] );
		/** end add_content_badge_text **/
		
		$this->add_group_control( Group_Control_Button::get_type(), [
			'name'           => 'button',
			// Use box link instead of.
			'exclude'        => [
				'link',
			],
			// Change button style text as default.
			'fields_options' => [
				'style' => [
					'default' => 'text',
				],
			],
		] );

		$this->end_controls_section();
		
		/** start add_box_style_section **/
		$this->start_controls_section( 'box_style_section', [
			'label' => esc_html__( 'Box', 'studiare' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'text_align', [
			'label'     => esc_html__( 'Alignment', 'studiare' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => SC_Widget_Utils::get_control_options_text_align_full(),
			'selectors' => [
				'{{WRAPPER}} .icon-box-wrapper' => 'text-align: {{VALUE}};',
			],
		] );

		$this->add_responsive_control( 'box_padding', [
			'label'      => esc_html__( 'Padding', 'studiare' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .tm-step-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'box_max_width', [
			'label'      => esc_html__( 'Max Width', 'studiare' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'unit' => 'px',
			],
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'%'  => [
					'min' => 1,
					'max' => 100,
				],
				'px' => [
					'min' => 1,
					'max' => 1600,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .tm-step-icon-box' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'box_horizontal_alignment', [
			'label'                => esc_html__( 'Horizontal Alignment', 'studiare' ),
			'label_block'          => true,
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => SC_Widget_Utils::get_control_options_horizontal_alignment(),
			'default'              => 'center',
			'toggle'               => false,
			'selectors_dictionary' => [
				'left'  => 'flex-start',
				'right' => 'flex-end',
			],
			'selectors'            => [
				'{{WRAPPER}} .elementor-widget-container' => 'display: flex; justify-content: {{VALUE}}',
			],
		] );

		$this->start_controls_tabs( 'box_colors' );

		$this->start_controls_tab( 'box_colors_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'box',
			'selector' => '{{WRAPPER}} .tm-step-icon-box',
		] );

		$this->add_group_control( Group_Control_Advanced_Border::get_type(), [
			'name'     => 'box_border',
			'selector' => '{{WRAPPER}} .tm-step-icon-box',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'box',
			'selector' => '{{WRAPPER}} .tm-step-icon-box',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'box_colors_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'box_hover',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:before',
		] );

		$this->add_group_control( Group_Control_Advanced_Border::get_type(), [
			'name'     => 'box_hover_border',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'box_hover',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/** end add_box_style_section **/
		
		/** start add_icon_style_section **/
				$this->start_controls_section( 'icon_style_section', [
			'label'     => esc_html__( 'Icon', 'studiare' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'icon[value]!' => '',
			],
		] );

		$this->add_responsive_control( 'icon_wrap_height', [
			'label'     => esc_html__( 'Wrap Height', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'min' => 6,
					'max' => 300,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .studiare-icon-wrap' => 'height: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_control( 'icon_vertical_align', [
			'label'                => esc_html__( 'Vertical Alignment', 'studiare' ),
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => SC_Widget_Utils::get_control_options_vertical_alignment(),
			'default'              => 'middle',
			'selectors_dictionary' => [
				'top'    => 'flex-start',
				'middle' => 'center',
				'bottom' => 'flex-end',
			],
			'selectors'            => [
				'{{WRAPPER}} .studiare-icon' => 'align-items: {{VALUE}}',
			],
		] );

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab( 'icon_colors_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'icon',
			'selector' => '{{WRAPPER}} .icon',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'icon_colors_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'hover_icon',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .icon',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control( 'icon_space', [
			'label'     => esc_html__( 'Spacing', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'selectors' => [
				'{{WRAPPER}}.elementor-position-right .studiare-icon-wrap'        => 'margin-left: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}}.elementor-position-left .studiare-icon-wrap'         => 'margin-right: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}}.elementor-position-top .studiare-icon-wrap'          => 'margin-bottom: {{SIZE}}{{UNIT}};',
				'(mobile){{WRAPPER}}.mobile-position-top-yes .studiare-icon-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'separator' => 'before',
		] );

		$this->add_responsive_control( 'icon_size', [
			'label'     => esc_html__( 'Size', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'min' => 6,
					'max' => 300,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .studiare-icon-view, {{WRAPPER}} .studiare-icon' => 'font-size: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_control( 'icon_rotate', [
			'label'     => esc_html__( 'Rotate', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'default'   => [
				'unit' => 'deg',
			],
			'selectors' => [
				'{{WRAPPER}} .studiare-icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
			],
		] );

		// Icon View Settings.
		$this->add_control( 'icon_view_heading', [
			'label'     => esc_html__( 'Icon View', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'view' => [ 'stacked', 'bubble' ],
			],
		] );

		$this->add_control( 'icon_padding', [
			'label'     => esc_html__( 'Padding', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => [
				'{{WRAPPER}} .studiare-icon-view' => 'padding: {{SIZE}}{{UNIT}};',
			],
			'range'     => [
				'em' => [
					'min' => 0,
					'max' => 5,
				],
			],
			'condition' => [
				'view' => [ 'stacked' ],
			],
		] );

		$this->add_control( 'icon_border_radius', [
			'label'      => esc_html__( 'Border Radius', 'studiare' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .studiare-icon-view' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'condition'  => [
				'view' => [ 'stacked' ],
			],
		] );

		$this->start_controls_tabs( 'icon_view_colors', [
			'condition' => [
				'view' => [ 'stacked', 'bubble' ],
			],
		] );

		$this->start_controls_tab( 'icon_view_colors_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'icon_view',
			'selector' => '{{WRAPPER}} .studiare-icon-view',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'icon_view',
			'selector' => '{{WRAPPER}} .studiare-icon-view',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'icon_view_colors_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'hover_icon_view',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .studiare-icon-view',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'hover_icon_view',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .studiare-icon-view',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/** end add_icon_style_section **/
		
		/** start add_title_style_section **/
		$this->start_controls_section( 'title_style_section', [
			'label' => esc_html__( 'Title', 'studiare' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title',
			'selector' => '{{WRAPPER}} .heading',
		] );

		$this->start_controls_tabs( 'title_colors' );

		$this->start_controls_tab( 'title_color_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'title',
			'selector' => '{{WRAPPER}} .heading',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'title_color_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'title_hover',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .heading',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/** end add_title_style_section **/
		
		/** start add_title_divider_style **/
		$this->start_controls_section( 'title_divider_style_section', [
			'label'     => esc_html__( 'Title Divider', 'studiare' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'title_divider_enable' => 'yes',
			],
		] );

		$this->start_controls_tabs( 'title_divider_colors' );

		$this->start_controls_tab( 'title_divider_colors_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'title_divider',
			'selector' => '{{WRAPPER}} .heading-divider:before',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'title_divider_colors_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'hover_title_divider',
			'selector' => '{{WRAPPER}} .heading-divider:after',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/** end add_title_divider_style **/
		
		/** start add_description_style_section **/
		$this->start_controls_section( 'description_style_section', [
			'label'     => esc_html__( 'Description', 'studiare' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'description_text!' => '',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'description',
			'selector' => '{{WRAPPER}} .description',
		] );

		$this->start_controls_tabs( 'description_colors' );

		$this->start_controls_tab( 'description_color_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'description',
			'selector' => '{{WRAPPER}} .description',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'description_color_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'description_hover',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .description',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control( 'description_spacing', [
			'label'      => esc_html__( 'Spacing', 'studiare' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'unit' => 'px',
			],
			'size_units' => [ 'px', '%', 'em' ],
			'range'      => [
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
				'px' => [
					'min' => 0,
					'max' => 200,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .description-wrap' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
			'separator'  => 'before',
		] );

		$this->add_responsive_control( 'description_max_width', [
			'label'      => esc_html__( 'Max Width', 'studiare' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'unit' => 'px',
			],
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'%'  => [
					'min' => 1,
					'max' => 100,
				],
				'px' => [
					'min' => 1,
					'max' => 1600,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .description' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->end_controls_section();
		/** end add_description_style_section **/
		
		/** start add_badge_text_style_section **/
		$this->start_controls_section( 'badge_text_style_section', [
			'label'     => esc_html__( 'Badge', 'studiare' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => [
				'badge_text!' => '',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'badge_typography',
			'selector' => '{{WRAPPER}} .badge-text',
		] );

		$this->start_controls_tabs( 'badge_colors' );

		$this->start_controls_tab( 'badge_colors_normal', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'badge',
			'selector' => '{{WRAPPER}} .badge-text',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'badge_colors_hover', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'badge_hover',
			'selector' => '{{WRAPPER}} .tm-step-icon-box:hover .badge-text',
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/** end add_badge_text_style_section **/
		
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'box', 'class', 'tm-step-icon-box studiare-box' );

		$box_tag = 'div';

		if ( ! empty( $settings['link']['url'] ) && 'box' === $settings['link_click'] ) {
			$box_tag = 'a';

			$this->add_render_attribute( 'box', 'class', 'link-secret' );
			$this->add_link_attributes( 'box', $settings['link'] );
		}
		?>
		<?php printf( '<%1$s %2$s>', $box_tag, $this->get_render_attribute_string( 'box' ) ); ?>
		<?php $this->print_badge_text( $settings ); ?>
		<div class="icon-box-wrapper">
			<?php $this->print_icon( $settings ); ?>

			<div class="icon-box-content">
				<?php $this->print_title( $settings ); ?>

				<?php $this->print_description( $settings ); ?>

				<?php $this->render_common_button(); ?>
			</div>
		</div>
		<?php printf( '</%1$s>', $box_tag ); ?>
		<?php
	}
	
	private function print_badge_text( array $settings ) {
		if ( empty( $settings['badge_text'] ) ) {
			return;
		}

		$this->add_render_attribute( 'badge_text', 'class', 'badge-text' );
		?>
		<div <?php $this->print_attributes_string( 'badge_text' ); ?>>
			<?php echo wp_kses_post($settings['badge_text']); ?>
		</div>
		<?php
	}
	private function print_icon( array $settings ) {
		$this->add_render_attribute( 'icon', 'class', [
			'studiare-icon',
			'icon',
		] );

		$is_svg = isset( $settings['icon']['library'] ) && 'svg' === $settings['icon']['library'] ? true : false;

		if ( $is_svg ) {
			$this->add_render_attribute( 'icon', 'class', [
				'studiare-svg-icon',
			] );
		}

		if( !empty( $settings['icon_color_type'] ) ) {
			switch ( $settings['icon_color_type'] ) {
				case 'gradient':
					$this->add_render_attribute( 'icon', 'class', [
						'studiare-gradient-icon',
					] );
					break;
				case 'classic':
					$this->add_render_attribute( 'icon', 'class', [
						'studiare-solid-icon',
					] );
					break;
			}
		}
		?>
		<div class="studiare-icon-wrap">
			<div class="studiare-icon-view first">
				<div class="studiare-icon-view-inner">
					<div <?php $this->print_attributes_string( 'icon' ); ?>>
						<?php $this->render_icon( $settings, $settings['icon'], [ 'aria-hidden' => 'true' ], $is_svg, 'icon' ); ?>
					</div>
				</div>
			</div>

			<?php if( 'bubble' === $settings['view'] ) { ?>
				<div class="studiare-icon-view second"></div>
			<?php } ?>
		</div>
		<?php
	}

	private function print_title( array $settings ) {
		if ( empty( $settings['title_text'] ) ) {
			return;
		}

		$this->add_render_attribute( 'title', 'class', 'heading' );
		?>
		<div class="heading-wrap">
			<?php printf( '<%1$s %2$s>%3$s</%1$s>', $settings['title_size'], $this->get_render_attribute_string( 'title' ), $settings['title_text'] ); ?>

			<?php $this->print_title_divider( $settings ); ?>
		</div>
		<?php
	}

	private function print_title_divider( array $settings ) {
		if ( empty( $settings['title_divider_enable'] ) || 'yes' !== $settings['title_divider_enable'] ) {
			return;
		}
		?>
		<div class="heading-divider-wrap">
			<div class="heading-divider"></div>
		</div>
		<?php
	}

	private function print_description( array $settings ) {
		if ( empty( $settings['description_text'] ) ) {
			return;
		}

		$this->add_render_attribute( 'description', 'class', 'description' );
		?>
		<div class="description-wrap">
			<div <?php $this->print_attributes_string( 'description' ); ?>>
				<?php echo wp_kses_post($settings['description_text']); ?>
			</div>
		</div>
		<?php
	}
	
	protected function print_attributes_string( $attr ) {
		echo '' . $this->get_render_attribute_string( $attr );
	}
	/**
	 * Get Render Icon
	 *
	 * Used to render Icon for \Elementor\Controls_Manager::ICONS
	 *
	 * @param array  $icon       Icon Type, Icon value
	 * @param array  $attributes Icon HTML Attributes
	 * @param string $tag        Icon HTML tag, defaults to <i>
	 *
	 * @return mixed|string
	 */
	protected function get_icons_html( $icon, $attributes = [], $tag = 'i' ) {
		ob_start();

		Icons_Manager::render_icon( $icon, $attributes, $tag );

		$template = ob_get_clean();

		return $template;
	}

	protected function render_icon( $settings, $icon, $attributes = [], $svg = false, $color_prefix = 'icon' ) {
		$template = $this->get_render_icon( $settings, $icon, $attributes, $svg, $color_prefix );

		echo '' . $template;
	}

	protected function get_render_icon( $settings, $icon, $attributes = [], $svg = false, $color_prefix = 'icon' ) {
		$tag = 'i';

		ob_start();
		Icons_Manager::render_icon( $icon, $attributes, $tag );
		$template = ob_get_clean();

		if ( $svg === true ) {
			$color_type = isset( $settings["{$color_prefix}_color_type"] ) ? $settings["{$color_prefix}_color_type"] : '';

			if ( 'gradient' === $color_type ) {
				$id = uniqid( 'svg-gradient' );

				$stroke_attr = 'stroke="' . "url(#{$id})" . '"';
				$fill_attr   = 'fill="' . "url(#{$id})" . '"';

				$line_stroke_attr = '$1stroke="' . "url(#{$id}-line)" . '"$2';
				$line_fill_attr   = '$1fill="' . "url(#{$id}-line)" . '"$2';

				/**
				 * Replace stroke & fill attributes of <line> tag with gradient id
				 */
				$template = preg_replace( '/(<line\s+[^>]*)stroke="#[^"]*"([^>]*>)/', $line_stroke_attr, $template );
				$template = preg_replace( '/(<line\s+[^>]*)fill="#[^"]*"([^>]*>)/', $line_fill_attr, $template );

				/**
				 * Replace stroke & fill attributes of other tags with gradient id
				 */
				$template = preg_replace( '/stroke="#(.*?)"/', $stroke_attr, $template );
				$template = preg_replace( '/fill="#(.*?)"/', $fill_attr, $template );

				$svg_defs = $this->get_svg_gradient_defs( $settings, $color_prefix, $id );

				if ( ! empty( $svg_defs ) ) {
					$template = $svg_defs . $template;
				}
			}
		}

		return $template;
	}

	protected function get_svg_gradient_defs( array $settings, $name, $id ) {
		if ( 'gradient' !== $settings["{$name}_color_type"] ) {
			return false;
		}

		$color_a_stop = $settings["{$name}_color_a_stop"];
		$color_b_stop = $settings["{$name}_color_b_stop"];

		$color_a_stop_value = $color_a_stop['size'] . $color_a_stop['unit'];
		$color_b_stop_value = $color_b_stop['size'] . $color_a_stop['unit'];

		ob_start();
		?>
		<svg aria-hidden="true" focusable="false" class="svg-defs-gradient">
			<defs>
				<linearGradient id="<?php echo esc_attr( $id ); ?>" x1="0%" y1="0%" x2="0%" y2="100%">
					<stop class="stop-a" offset="<?php echo esc_attr( $color_a_stop_value ); ?>"/>
					<stop class="stop-b" offset="<?php echo esc_attr( $color_b_stop_value ); ?>"/>
				</linearGradient>
				<linearGradient id="<?php echo esc_attr( $id . '-line' ); ?>" x1="0%" y1="0%" x2="0%" y2="100%"
				                gradientUnits="userSpaceOnUse">
					<stop class="stop-a" offset="<?php echo esc_attr( $color_a_stop_value ); ?>"/>
					<stop class="stop-b" offset="<?php echo esc_attr( $color_b_stop_value ); ?>"/>
				</linearGradient>
			</defs>
		</svg>
		<?php
		return ob_get_clean();
	}

	protected function render_common_button() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['button_text'] ) && empty( $settings['button_icon']['value'] ) ) {
			return;
		}

		$this->add_render_attribute( 'button', 'class', 'tm-button style-' . $settings['button_style'] );

		if ( ! empty( $settings['button_size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'tm-button-' . $settings['button_size'] );
		}

		$button_tag = 'a';

		if ( ! empty( $settings['button_link'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
		} else {
			$button_tag = 'div';

			if ( ! empty( $settings['link'] ) && ! empty( $settings['link_click'] ) && 'button' === $settings['link_click'] ) {
				$button_tag = 'a';
				$this->add_link_attributes( 'button', $settings['link'] );
			}
		}

		$has_icon = false;

		if ( ! empty( $settings['button_icon']['value'] ) ) {
			$has_icon = true;
			$this->add_render_attribute( 'button', 'class', 'icon-' . $settings['button_icon_align'] );

			$this->add_render_attribute( 'button-icon', 'class', 'button-icon' );
		}
		?>
		<div class="tm-button-wrapper">
			<?php printf( '<%1$s %2$s>', $button_tag, $this->get_render_attribute_string( 'button' ) ); ?>
			<div class="button-content-wrapper">
				<?php if ( $has_icon && 'left' === $settings['button_icon_align'] ) : ?>
					<span <?php $this->print_attributes_string( 'button-icon' ); ?>>
							<?php Icons_Manager::render_icon( $settings['button_icon'] ); ?>
						</span>
				<?php endif; ?>

				<?php if ( ! empty( $settings['button_text'] ) ): ?>
					<span class="button-text"><?php echo esc_html( $settings['button_text'] ); ?></span>
				<?php endif; ?>

				<?php if ( $has_icon && 'right' === $settings['button_icon_align'] ) : ?>
					<span <?php $this->print_attributes_string( 'button-icon' ); ?>>
							<?php Icons_Manager::render_icon( $settings['button_icon'] ); ?>
						</span>
				<?php endif; ?>
			</div>
			<?php printf( '</%1$s>', $button_tag ); ?>
		</div>
		<?php
	}

	/**
	 * Register common button style controls.
	 */
	protected function register_common_button_style_section() {
		$this->start_controls_section( 'button_style_section', [
			'label' => esc_html__( 'Button', 'studiare' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$icon_condition = [
			'button_icon[value]!' => '',
		];

		$line_condition = [
			'button_style' => [ 'bottom-line', 'left-line' ],
		];

		$this->add_control( 'button_width', [
			'label'      => esc_html__( 'Width', 'studiare' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ '%', 'px' ],
			'range'      => [
				'%'  => [
					'max'  => 100,
					'step' => 1,
				],
				'px' => [
					'max'  => 1000,
					'step' => 1,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .tm-button' => 'width: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_control( 'button_margin', [
			'label'      => esc_html__( 'Margin', 'studiare' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} .tm-button-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_control( 'button_skin_heading', [
			'label' => esc_html__( 'Skin', 'studiare' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$this->start_controls_tabs( 'button_skin_tabs' );

		$this->start_controls_tab( 'button_skin_normal_tab', [
			'label' => esc_html__( 'Normal', 'studiare' ),
		] );

		/**
		 * Button wrapper style.
		 * Background working only with style: flat, border, thick-border.
		 */

		$this->add_control( 'button_wrapper_color_normal_heading', [
			'label'   => esc_html__( 'Wrapper', 'studiare' ),
			'type'    => Controls_Manager::HEADING,
			'classes' => 'control-heading-in-tabs',
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'      => 'button_background',
			'types'     => [ 'classic', 'gradient' ],
			'selector'  => '{{WRAPPER}} .tm-button:before',
			'condition' => [
				'button_style' => [ 'flat', 'border', 'thick-border' ],
			],
		] );

		$this->add_control( 'button_border_color', [
			'label'     => esc_html__( 'Border', 'studiare' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tm-button' => 'border-color: {{VALUE}};',
			],
			'condition' => [
				'button_style!' => [ 'flat', 'bottom-line', 'left-line' ],
			],
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow',
			'selector' => '{{WRAPPER}} .tm-button',
		] );

		/**
		 * Text Color
		 */
		$this->add_control( 'button_text_color_normal_heading', [
			'label'     => esc_html__( 'Text', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'     => 'button_text',
			'selector' => '{{WRAPPER}} .tm-button .button-text',
		] );

		/**
		 * Icon Color
		 */
		$this->add_control( 'button_icon_color_normal_heading', [
			'label'     => esc_html__( 'Icon', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
			'condition' => $icon_condition,
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'      => 'button_icon',
			'selector'  => '{{WRAPPER}} .tm-button .button-icon',
			'condition' => $icon_condition,
		] );

		/**
		 * Line Color
		 */
		$this->add_control( 'button_line_color_normal_heading', [
			'label'     => esc_html__( 'Line', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
			'condition' => $line_condition,
		] );

		$this->add_control( 'button_line_color', [
			'label'     => esc_html__( 'Color', 'studiare' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tm-button.style-bottom-line .button-content-wrapper:before' => 'background: {{VALUE}};',
				'{{WRAPPER}} .tm-button.style-left-line .button-content-wrapper:before'   => 'background: {{VALUE}};',
			],
			'condition' => $line_condition,
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'button_skin_hover_tab', [
			'label' => esc_html__( 'Hover', 'studiare' ),
		] );

		/**
		 * Button wrapper style.
		 * Background working only with style: flat, border, thick-border.
		 */

		$this->add_control( 'button_wrapper_color_hover_heading', [
			'label'   => esc_html__( 'Wrapper', 'studiare' ),
			'type'    => Controls_Manager::HEADING,
			'classes' => 'control-heading-in-tabs',
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'      => 'hover_button_background',
			'types'     => [ 'classic', 'gradient' ],
			'selector'  => '{{WRAPPER}} .tm-button:after',
			'condition' => [
				'button_style' => [ 'flat', 'border', 'thick-border' ],
			],
		] );

		$this->add_control( 'hover_button_border_color', [
			'label'     => esc_html__( 'Border', 'studiare' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tm-button:hover' => 'border-color: {{VALUE}};',
			],
			'condition' => [
				'button_style!' => [ 'flat', 'bottom-line', 'left-line' ],
			],
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'hover_button_box_shadow',
			'selector' => '{{WRAPPER}} .studiare-box:hover div.tm-button, {{WRAPPER}} a.tm-button:hover',
		] );

		/**
		 * Text Color
		 */
		$this->add_control( 'button_text_color_hover_heading', [
			'label'     => esc_html__( 'Text', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'label'    => 'test',
			'name'     => 'hover_button_text',
			'selector' => '{{WRAPPER}} .studiare-box:hover div.tm-button .button-text, {{WRAPPER}} a.tm-button:hover .button-text',
		] );

		/**
		 * Icon Color
		 */
		$this->add_control( 'button_icon_color_hover_heading', [
			'label'     => esc_html__( 'Icon', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
			'condition' => $icon_condition,
		] );

		$this->add_group_control( Group_Control_Text_Gradient::get_type(), [
			'name'      => 'hover_button_icon',
			'selector'  => '{{WRAPPER}} .studiare-box:hover div.tm-button .button-icon, {{WRAPPER}} a.tm-button:hover .button-icon',
			'condition' => $icon_condition,
		] );

		/**
		 * Line Color
		 */
		$this->add_control( 'button_line_color_hover_heading', [
			'label'     => esc_html__( 'Line', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'classes'   => 'control-heading-in-tabs',
			'condition' => $line_condition,
		] );

		$this->add_control( 'hover_button_line_color', [
			'label'     => esc_html__( 'Color', 'studiare' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tm-button.style-bottom-line .button-content-wrapper:after' => 'background: {{VALUE}};',
				'{{WRAPPER}} .tm-button.style-left-line .button-content-wrapper:after'   => 'background: {{VALUE}};',
			],
			'condition' => $line_condition,
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		/**
		 * Button text style
		 */
		$this->add_control( 'button_text_style_heading', [
			'label'     => esc_html__( 'Text', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'button_text',
			'selector' => '{{WRAPPER}} .tm-button',
		] );

		/**
		 * Button icon style
		 */
		$this->add_control( 'button_icon_style_heading', [
			'label'     => esc_html__( 'Icon', 'studiare' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => $icon_condition,
		] );

		$this->add_control( 'button_icon_indent', [
			'label'     => esc_html__( 'Spacing', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'max' => 50,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .tm-button.icon-left .button-icon'  => 'margin-right: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .tm-button.icon-right .button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
			],
			'condition' => $icon_condition,
		] );

		$this->add_responsive_control( 'button_icon_font_size', [
			'label'     => esc_html__( 'Font Size', 'studiare' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'min' => 8,
					'max' => 30,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .tm-button .button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'condition' => $icon_condition,
		] );

		$this->end_controls_section();
	}
	/**private function print_attributes_string(){
	    
	}
	private function render_icon(array $settings){
		
		if ( empty( $settings['icon'] ) ) {
			return;
		}
		?>
		<i class='<?php echo $settings['icon']['value'];?>'></i>
		<?php
	}
	private function render_common_button(){}**/
	protected function content_template() {
	    /**
		$id = uniqid( 'svg-gradient' );
		// @formatter:off
		?>
		<# var svg_id = '<?php echo esc_html( $id ); ?>'; #>

		<#
		view.addRenderAttribute( 'box', 'class', 'tm-step-icon-box studiare-box' );
		var box_tag = 'div';

		if ( '' !== settings.link.url && 'box' === settings.link_click ) {
			box_tag = 'a';

			view.addRenderAttribute( 'box', 'class', 'link-secret' );
			view.addRenderAttribute( 'box', 'href', '#' );
		}

		view.addRenderAttribute( 'icon', 'class', 'studiare-icon icon' );

		if ( 'svg' === settings.icon.library ) {
			view.addRenderAttribute( 'icon', 'class', 'studiare-svg-icon' );
		}

		if ( 'gradient' === settings.icon_color_type ) {
			view.addRenderAttribute( 'icon', 'class', 'studiare-gradient-icon' );
		} else if ( 'classic' === settings.icon_color_type ) {
			view.addRenderAttribute( 'icon', 'class', 'studiare-solid-icon' );
		}

		var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' );
		#>
		<{{{ box_tag }}} {{{ view.getRenderAttributeString( 'box' ) }}}>

			<# if ( settings.badge_text ) { #>
				<#
				view.addRenderAttribute( 'badge_text', 'class', 'badge-text' );
				#>
				<div {{{ view.getRenderAttributeString( 'badge_text' ) }}}>
					{{{ settings.badge_text }}}
				</div>
			<# } #>

			<div class="icon-box-wrapper">
				<div class="studiare-icon-wrap">
					<div class="studiare-icon-view first">
						<div class="studiare-icon-view-inner">
							<div {{{ view.getRenderAttributeString( 'icon' ) }}}>
								<# if ( iconHTML.rendered ) { #>
									<#
									var stop_a = settings.icon_color_a_stop.size + settings.icon_color_a_stop.unit;
									var stop_b = settings.icon_color_b_stop.size + settings.icon_color_b_stop.unit;

									var iconValue = iconHTML.value;
									if ( typeof iconValue === 'string' ) {
										var strokeAttr = 'stroke="' + 'url(#' + svg_id + ')"';
										var fillAttr = 'fill="' + 'url(#' + svg_id + ')"';

										iconValue = iconValue.replace(new RegExp(/stroke="#(.*?)"/, 'g'), strokeAttr);

										iconValue = iconValue.replace(new RegExp(/stroke="#(.*?)"/, 'g'), strokeAttr);
										iconValue = iconValue.replace(new RegExp(/fill="#(.*?)"/, 'g'), fillAttr);
									}
									#>
									<svg aria-hidden="true" focusable="false" class="svg-defs-gradient">
										<defs>
											<linearGradient id="{{{ svg_id }}}" x1="0%" y1="0%" x2="0%" y2="100%">
												<stop class="stop-a" offset="{{{ stop_a }}}"/>
												<stop class="stop-b" offset="{{{ stop_b }}}"/>
											</linearGradient>
										</defs>
									</svg>

									{{{ iconValue }}}
								<# } #>
							</div>
						</div>
					</div>

					<# if ( 'bubble' == settings.view ) { #>
						<div class="studiare-icon-view second"></div>
					<# } #>
				</div>
				<div class="icon-box-content">
					<# if ( settings.title_text ) { #>
						<#
						view.addRenderAttribute( 'title', 'class', 'heading' );
						#>
						<div class="heading-wrap">
							<{{{ settings.title_size }}} {{{ view.getRenderAttributeString( 'title' ) }}}>
								{{{ settings.title_text }}}
							</{{{ settings.title_size }}}>

							<# if ( 'yes' === settings.title_divider_enable ) { #>
								<div class="heading-divider-wrap">
									<div class="heading-divider"></div>
								</div>
							<# } #>
						</div>
					<# } #>

					<# if ( settings.description_text ) { #>
						<#
						view.addRenderAttribute( 'description', 'class', 'description' );
						#>
						<div class="description-wrap">
							<div {{{ view.getRenderAttributeString( 'description' ) }}}>
								{{{ settings.description_text }}}
							</div>
						</div>
					<# } #>

					<# if ( settings.button_text || settings.button_icon.value ) { #>
						<#
						var buttonIconHTML = elementor.helpers.renderIcon( view, settings.button_icon, { 'aria-hidden': true }, 'i' , 'object' );
						var buttonTag = 'div';

						view.addRenderAttribute( 'button', 'class', 'tm-button style-' + settings.button_style );
						view.addRenderAttribute( 'button', 'class', 'tm-button-' + settings.button_size );

						if ( '' !== settings.link.url && 'button' === settings.link_click ) {
							buttonTag = 'a';
							view.addRenderAttribute( 'button', 'href', '#' );
						}

						if ( settings.button_icon.value ) {
							view.addRenderAttribute( 'button', 'class', 'icon-' + settings.button_icon_align );
						}

						view.addRenderAttribute( 'button-icon', 'class', 'button-icon' );
						#>
						<div class="tm-button-wrapper">
							<{{{ buttonTag }}} {{{ view.getRenderAttributeString( 'button' ) }}}>
								<div class="button-content-wrapper">
									<# if ( buttonIconHTML.rendered && 'left' === settings.button_icon_align ) { #>
										<span {{{ view.getRenderAttributeString( 'button-icon' ) }}}>
											{{{ buttonIconHTML.value }}}
										</span>
									<# } #>

									<# if ( settings.button_text ) { #>
										<span class="button-text">{{{ settings.button_text }}}</span>
									<# } #>

									<# if ( buttonIconHTML.rendered && 'right' === settings.button_icon_align ) { #>
										<span {{{ view.getRenderAttributeString( 'button-icon' ) }}}>
											{{{ buttonIconHTML.value }}}
										</span>
									<# } #>
								</div>
							</{{{ buttonTag }}}>
						</div>
					<# } #>
				</div>

			</div>
		</{{{ box_tag }}}>
		<?php
		// @formatter:off
		**/ 
	}
	
	
}