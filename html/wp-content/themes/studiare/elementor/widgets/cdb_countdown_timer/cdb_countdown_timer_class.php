<?php
namespace Elementor;

class Cdb_Countdown_Timer extends Widget_Base {
	
	public function get_name() {
		return 'countdown-timer';
	}
	
	public function get_title() {
		return  __( 'Countdown Timer', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-countdown';
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
			'date',
			[
				'label' => __( 'Date', 'studiare' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'picker_options' =>['enableTime'=>false]
			]
		);
		
		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'medium',
				'options' => [
					'small'  => __( 'Small', 'studiare' ),
					'medium' => __( 'Medium', 'studiare' ),
					'large' => __( 'Large', 'studiare' ),
				],
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'standard',
				'options' => [
					'standard'  => __( 'Standard', 'studiare' ),
					'transparent' => __( 'Transparent', 'studiare' ),
				],
			]
		);
		$this->add_control(
			'align',
			[
				'label' => __( 'Style', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => __( 'Left', 'studiare' ),
					'center' => __( 'Center', 'studiare' ),
					'right' => __( 'Right', 'studiare' ),
				],
			]
		);
		$this->add_control(
			'light',
			[
				'label' => __( 'Light', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'studiare' ),
				'label_off' => __( 'Disable', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        
       
        
        //$date  = strtotime( $settings['date'] );
        $date  = $settings['date'];
        $size  = $settings['size'] ;
        $style = $settings['style'] ;
        $light = $settings['light'] ;
        $align = $settings['align'] ;
        
        $css_class = "countdown-timer-holder {$size} {$align} {$style}";
        if ( $light == true ) {
        	$css_class .= ' light';
        }
        
        $now = date('Y-m-d');
        $due_date  = strtotime( $settings['date'] );
        
        $diff = strtotime($now) - strtotime($settings['date'] );
        $days =ceil(abs( $diff / 86400 ));
        
        ?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
        
        	 <div id="" class="countdown-item" data-date="<?php echo esc_attr( $date ) ?>">
        	        <div class="countdown-col">
        	            <span class="countdown-unit countdown-days"><span class="number"><?php echo $days;?> </span><span class="text">روز</span></span></div> 
        	       <div class="countdown-col"><span class="countdown-unit countdown-hours"><span class="number">0 </span><span class="text">ساعت</span></span></div> 
        	       <div class="countdown-col"><span class="countdown-unit countdown-min"><span class="number">0 </span><span class="text">دقیقه</span></span></div>
        	       <div class="countdown-col"><span class="countdown-unit countdown-sec"><span class="number">0 </span><span class="text">ثانیه</span></span></div>
        	   </div>
        </div>
      

<?php
        
	}
	
	protected function _content_template() {
	 
    }
	
	
}