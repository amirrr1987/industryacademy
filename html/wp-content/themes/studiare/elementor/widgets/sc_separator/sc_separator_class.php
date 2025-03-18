<?php
namespace Elementor;

class SC_Separator extends Widget_Base {
	
	public function get_name() {
		return 'studi-separator';
	}
	
	public function get_title() {
		return  __( 'Separator', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-divider-shape';
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
			'style',
			[
				'label' => __( 'Style', 'studiare' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'classes'=>'sun_img_select',
				'options' => [
					'1' => [
						'title' => '1',
						'icon' => 'waicon waicon1',
					],
					'2' => [
						'title' => '2',
						'icon' => 'waicon waicon2',
					],
					'3' => [
						'title' => '3',
						'icon' => 'waicon waicon3',
					],
					'4' => [
						'title' => '4',
						'icon' => 'waicon waicon4',
					],
					'5' => [
						'title' => '5',
						'icon' => 'waicon waicon5',
					],
					'6' => [
						'title' => '6',
						'icon' => 'waicon waicon6',
					],
					'7' => [
						'title' => '7',
						'icon' => 'waicon waicon7',
					],
					'8' => [
						'title' => '8',
						'icon' => 'waicon waicon8',
					],
					'9' => [
						'title' => '9',
						'icon' => 'waicon waicon9',
					],
					'10' => [
						'title' => '10',
						'icon' => 'waicon waicon10',
					],
					'11' => [
						'title' => '11',
						'icon' => 'waicon waicon11',
					],
					'12' => [
						'title' => '12',
						'icon' => 'waicon waicon12',
					],
					'13' => [
						'title' => '13',
						'icon' => 'waicon waicon13',
					],
					'14' => [
						'title' => '14',
						'icon' => 'waicon waicon14',
					],
					'15' => [
						'title' => '15',
						'icon' => 'waicon waicon15',
					],
					'16' => [
						'title' => '16',
						'icon' => 'waicon waicon16',
					],
					'17' => [
						'title' => '17',
						'icon' => 'waicon waicon17',
					],
					'18' => [
						'title' => '18',
						'icon' => 'waicon waicon18',
					],
					'19' => [
						'title' => '19',
						'icon' => 'waicon waicon19',
					],
					'20' => [
						'title' => '20',
						'icon' => 'waicon waicon20',
					],
					'21' => [
						'title' => '21',
						'icon' => 'waicon waicon21',
					],
					'22' => [
						'title' => '22',
						'icon' => 'waicon waicon22',
					],
					'23' => [
						'title' => '23',
						'icon' => 'waicon waicon23',
					],
					'24' => [
						'title' => '24',
						'icon' => 'waicon waicon24',
					],
					'25' => [
						'title' => '25',
						'icon' => 'waicon waicon25',
					],
					'26' => [
						'title' => '26',
						'icon' => 'waicon waicon26',
					],
					'27' => [
						'title' => '27',
						'icon' => 'waicon waicon27',
					],
					'28' => [
						'title' => '28',
						'icon' => 'waicon waicon28',
					],
					'29' => [
						'title' => '29',
						'icon' => 'waicon waicon29',
					],
					'30' => [
						'title' => '30',
						'icon' => 'waicon waicon30',
					],
					'31' => [
						'title' => '31',
						'icon' => 'waicon waicon31',
					],
					'32' => [
						'title' => '32',
						'icon' => 'waicon waicon32',
					],
					'33' => [
						'title' => '33',
						'icon' => 'waicon waicon33',
					],
					'34' => [
						'title' => '34',
						'icon' => 'waicon waicon34',
					],
					'35' => [
						'title' => '35',
						'icon' => 'waicon waicon35',
					],
					'36' => [
						'title' => '36',
						'icon' => 'waicon waicon36',
					],
					'37' => [
						'title' => '37',
						'icon' => 'waicon waicon37',
					],
					'38' => [
						'title' => '38',
						'icon' => 'waicon waicon38',
					],
					'39' => [
						'title' => '39',
						'icon' => 'waicon waicon39',
					],
					'40' => [
						'title' => '40',
						'icon' => 'waicon waicon40',
					],
					'41' => [
						'title' => '41',
						'icon' => 'waicon waicon41',
					],
					'42' => [
						'title' => '42',
						'icon' => 'waicon waicon42',
					],
					'43' => [
						'title' => '43',
						'icon' => 'waicon waicon43',
					],
					'44' => [
						'title' => '44',
						'icon' => 'waicon waicon44',
					],
					'45' => [
						'title' => '45',
						'icon' => 'waicon waicon45',
					],
					'46' => [
						'title' => '46',
						'icon' => 'waicon waicon46',
					],
					'47' => [
						'title' => '47',
						'icon' => 'waicon waicon47',
					],
					'48' => [
						'title' => '48',
						'icon' => 'waicon waicon48',
					],
					'49' => [
						'title' => '49',
						'icon' => 'waicon waicon49',
					],
					'50' => [
						'title' => '50',
						'icon' => 'waicon waicon50',
					],
					'51' => [
						'title' => '51',
						'icon' => 'waicon waicon51',
					],
					'52' => [
						'title' => '52',
						'icon' => 'waicon waicon52',
					],
					'53' => [
						'title' => '53',
						'icon' => 'waicon waicon53',
					],
					'54' => [
						'title' => '54',
						'icon' => 'waicon waicon54',
					],
					'55' => [
						'title' => '55',
						'icon' => 'waicon waicon55',
					],
					'56' => [
						'title' => '56',
						'icon' => 'waicon waicon56',
					],
					'57' => [
						'title' => '57',
						'icon' => 'waicon waicon57',
					],
					'58' => [
						'title' => '58',
						'icon' => 'waicon waicon58',
					],
					'59' => [
						'title' => '59',
						'icon' => 'waicon waicon50',
					],
					'60' => [
						'title' => '60',
						'icon' => 'waicon waicon60',
					],
					'61' => [
						'title' => '61',
						'icon' => 'waicon waicon61',
					],
					'62' => [
						'title' => '62',
						'icon' => 'waicon waicon62',
					],
					'63' => [
						'title' => '63',
						'icon' => 'waicon waicon63',
					],
					'64' => [
						'title' => '64',
						'icon' => 'waicon waicon64',
					],
					'65' => [
						'title' => '65',
						'icon' => 'waicon waicon65',
					],
					'66' => [
						'title' => '66',
						'icon' => 'waicon waicon66',
					],
					'67' => [
						'title' => '67',
						'icon' => 'waicon waicon67',
					],
					'68' => [
						'title' => '68',
						'icon' => 'waicon waicon68',
					],
					'69' => [
						'title' => '69',
						'icon' => 'waicon waicon69',
					],
					'70' => [
						'title' => '70',
						'icon' => 'waicon waicon70',
					],
					
					'71' => [
						'title' => '71',
						'icon' => 'waicon waicon71',
					],
					'72' => [
						'title' => '72',
						'icon' => 'waicon waicon72',
					],
					'73' => [
						'title' => '73',
						'icon' => 'waicon waicon73',
					],
					'74' => [
						'title' => '74',
						'icon' => 'waicon waicon74',
					],
					'75' => [
						'title' => '75',
						'icon' => 'waicon waicon75',
					],
					'76' => [
						'title' => '76',
						'icon' => 'waicon waicon76',
					],
					'77' => [
						'title' => '77',
						'icon' => 'waicon waicon77',
					],
					
				],
				'label_block' => true,
				'default' => '1',
				'toggle' => false,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_design',
			[
				'label' => __( 'Design', 'studiare' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'transform',
			[
				'label' => __( 'Transform', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'sc_sep_bottom',
				'options' => [
					'sc_sep_bottom' => __( 'Bottom', 'studiare' ),
					'sc_sep_rotatey_bottom' => __( 'Bottom - Rotate Y', 'studiare' ),
					'sc_sep_top'  => __( 'Top', 'studiare' ),
					'sc_sep_rotatey_top' => __( 'Top - Rotate X', 'studiare' ),
				],
			]
		);
		$this->add_control(
			'sep_width',
			[
				'label' => __( 'Width', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 100,
			]
		);
		$this->add_responsive_control(
			'sep_height',
			[
				'label' => __( 'Height', 'studiare' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 500,
				'step' => 5,
				'default' => 100,
			]
		);
		$this->add_control(
			'relative',
			[
				'label' => __( 'Relative', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'priority',
			[
				'label' => __( 'Priority', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'color1',
			[
				'label' => __( 'Color', 'studiare' ).' 1',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#36c9f4'
				
			]
		);
		$this->add_control(
			'color2',
			[
				'label' => __( 'Color', 'studiare' ).' 2',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#27a1c5'
				
			]
		);
		$this->add_control(
			'color3',
			[
				'label' => __( 'Color', 'studiare' ).' 3',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#107b9b'
				
			]
		);
		
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        
       
        
        //$date  = strtotime( $settings['date'] );
        $transform  = $settings['transform'];
        //$size  = $settings['size'] ;
        $style = $settings['style'] ;
        $sep_width = $settings['sep_width'] ;
        $sep_height = $settings['sep_height'] ;
        $priority = $settings['priority'] ;
        $relative = $settings['relative'] ;
        
        $color1 = $settings['color1'] ;
        $color2 = $settings['color2'] ;
        $color3 = $settings['color3'] ;
        
        
        
       $separator_num_id = rand(1,1000);
		$separator_id = "sc_separator_".$separator_num_id;

		$css_id = '#' . $separator_id;

		$c1 = $color1 ? $color1 : 'greenyellow';
		$c2 = $color2 ? $color2 : 'transparent';
		$c3 = $color3 ? $color3 : 'transparent';
		$h = $sep_height ? $sep_height.'px' : '';
		$w = $sep_width ? $sep_width.'%' : '100%';

		$transform .= empty( $priority ) ? '' : ' z99';
		$transform .= empty($relative ) ? '' : ' sc_relative';
		
		
		  if ( \Elementor\Plugin::$instance->editor->is_edit_mode()  ) {$free_space_to_show_in_edit_mode ="<div style='display:none;'>...</div>";}else{$free_space_to_show_in_edit_mode="";}
		
		$out = '<div  class="sc_relative"><div id="' . $separator_id . '" class="sc_separator cz_sep2_' . $style . ' ' . $transform . '" >';

		$out .= sc_studi_separators_svg( $style , $c1 , $c2, $c3 , $h, $w );

		// Inner
		$out .= '</div>'.$free_space_to_show_in_edit_mode.'</div>';
		
		echo $out;
        
	}
	
	protected function content_template() {
	 
    }
	
	
}