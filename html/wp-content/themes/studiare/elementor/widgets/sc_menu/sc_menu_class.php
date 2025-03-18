<?php
namespace Elementor;

class SC_Menu extends Widget_Base {
	
	public function get_name() {
		return 'studi-menu';
	}
	
	public function get_title() {
		return  __( 'Menu', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-nav-menu';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	public function get_menus() {
		
		$menu_list =array();
		$locations = get_terms('nav_menu');
        if($locations){
            foreach($locations as $menu){
                $menu_list[$menu->term_id]=$menu->name;
            }
            if(!empty($menu_list)){
                return $menu_list;
            }
        }
        
        
		
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
		$this->add_control(
			'menu_id',
			[
				'label' => esc_html__( 'Menu', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_menus(),
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
        
       
        
        //$date  = strtotime( $settings['date'] );
        //$transform  = ;
      
        $menu_location ="main-menu";
        if($settings['menu_id'] !=''){
            $menu_location = $settings['menu_id'];
        }
		//print_r();

		 $menu = wp_nav_menu( array( 
		                                //'theme_location' 	=> $menu_location,
		                                'menu' 	=> $menu_location,
										'menu_class'      	=> 'menu sc_studi-horizontal-menu main-navigation',
										'container_class'	=> 'sc_studi-main-menu visible-lg',
										'fallback_cb' 		=> 'sc_studiFrontendWalker::fallback',
										'walker' 			=> new \sc_studiFrontendWalker,
										'echo'            => false
								  ) );
		?>
		<div class="site-navigation studiare-navigation" role="navigation">
	                <?php echo wp_kses_post($menu); ?>
        </div>
        
        <a href="#" class="mobile-nav-toggle">
                <span class="the-icon"></span>
            </a>
		<?php						  
        
	}
	
	protected function content_template() {
	 
    }
	
	
}