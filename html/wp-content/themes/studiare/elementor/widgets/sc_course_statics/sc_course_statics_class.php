<?php
namespace Elementor;

class Sc_Course_Statics extends Widget_Base {
	
	public function get_name() {
		return 'course-statics';
	}
	
	public function get_title() {
		return  __( 'Course statics', 'studiare' );
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
			'label',
			[
				'label' => __( 'Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title', 'studiare' ),
				'placeholder' => '',
			]
		);

		
		$this->add_control(
			'statics_type',
			[
				'label' => __( 'Static Type', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
                'default' => 'total_courses',
				'options' => [
					'total_courses'  => __("Total Courses","studiare"),
					'total_users'    => __("Total Users","studiare"),
					'total_students' => __("Total Buyers","studiare"),
					'total_teachers' => __("Total Teachers","studiare"),


				],
			]
		);
		$this->add_control(
			'value',
			[
				'label' => __( 'Fixed Value', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'description' => __( 'This value add up to result', 'studiare'),
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'studiare' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'skin' => 'inline',
				/*'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],*/
			]
		);
        
		
		

		$this->end_controls_section();
		
        $this->start_controls_section(
        	'style_section',
        	[
        		'label' => __( 'Box Style', 'studiare' ),
        		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        	]
        );  
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sc_statics_holder .counter-text',
			]
		);
		$this->add_control(
			'box_shadow_popover_toggle',
			[
				'label' => esc_html__( 'Box Shadow', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'textdomain' ),
				'label_on' => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->start_popover();
		$this->add_control(
			'custom_box_shadow',
			[
				'label' => esc_html__( 'Box Shadow', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .sc_statics_holder .counter-text' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
				'default' =>
								[
									'horizontal' => 0,
									'vertical' => 0,
									'blur' => 15,
									'spread' => 0,
									'color' => 'rgba(0,0,0,0.1)'
								],
			]
		);
		$this->end_popover();
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .sc_statics_holder .counter-text',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
        	'inside_style_section',
        	[
        		'label' => __( 'Elements Style', 'studiare' ),
        		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        	]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_size',
				'label' => __( 'Icon Size', 'studiare' ),
				'selector' => '{{WRAPPER}} .sc_studi_statistic_icon',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sc_studi_statistic_icon'=>'color: {{VALUE}}',
				],
				
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number_typo',
				'label' => __( 'Number Typography', 'studiare' ),
				'selector' => '{{WRAPPER}} .counter-number',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .counter-number',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-number'=>'color: {{VALUE}}',
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typo',
				'label' => __( 'Label Typography', 'studiare' ),
				'selector' => '{{WRAPPER}} .counter-label',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-label'=>'color: {{VALUE}}',
				],
				
			]
		);
        $this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        $statics_type = $settings['statics_type'];
        $icon = $settings['icon'] ;
        $label = $settings['label'] ;
        $value = $settings['value'] ;
        $color_scheme = '';
               

$css_class = "animated-counter counter-{$color_scheme}";

$text_styles = array();


//echo $statics_type;
$tvalue=0;
switch($statics_type){
    case 'total_courses':
        $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'posts_per_page' => -1,
        );
        $courses_array =  new \WP_Query($args);
        $Total = count($courses_array->posts);//print_r($courses_array->posts);
        $tvalue = intval($Total)+intval($value);
    break;
    
    case 'total_users':
        $usercount = count_users();
        $Total = $usercount['total_users']; 
        $tvalue = intval($Total)+intval($value);
    break;
    
    case 'total_students':
        global $wpdb;
        $result = $wpdb->get_row("
              SELECT SUM(pm.meta_value) AS total_sales
              FROM $wpdb->posts AS p
              LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
              WHERE p.post_type = 'product'
          ");
        $Total = $result->total_sales;  
        $tvalue = intval($Total)+intval($value);
    break;
    
    
    case 'total_teachers':
        $args = array(
        'post_type'             => 'teacher',
        'post_status'           => 'publish',
        );
        $courses_array =  new \WP_Query($args);
        $Total = count($courses_array->posts);
        $tvalue = intval($Total)+intval($value);
    break;
    
    default:
    break;
}

?>
<div class="sc_statics_holder <?php echo esc_attr( $css_class ) ; ?>">

	<div class="counter-text" <?php studiare_inline_style($text_styles); ?>>
	<span class="sc_studi_statistic_icon"><?php if($icon !=''){ \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );} ?></span>
		<div class="counter-number"><?php echo esc_attr( $tvalue ); ?></div>
		
		<?php if ( $label !== '' ) { ?>
			<div class="counter-label"><?php echo wp_kses_post( $label ); ?></div>
		<?php } ?>
	</div>

</div>
		


		
<?php		
		 

	}
	
	protected function content_template() {
	    
	    

    }
	
	
}