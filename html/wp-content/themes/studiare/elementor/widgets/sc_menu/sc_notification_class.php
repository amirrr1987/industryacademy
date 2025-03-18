<?php
namespace Elementor;

class Sc_Notification extends Widget_Base {
	
	public function get_name() {
		return 'studi-notification';
	}
	
	public function get_title() {
		return  __( 'Notification', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-woocommerce-notices';
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
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_design',
			[
				'label' => __( 'Design', 'studiare' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        
       
        
        if ( class_exists( 'WooCommerce' ) ) {
    if(!is_account_page() ){
        
        echo "<div class='sc_notif_in_header'>";
        echo do_shortcode("[studi_notifi]"); 
        echo "</div>";
    }
    }						  
        
	}
	
	protected function content_template() {
	 
    }
	
	
}