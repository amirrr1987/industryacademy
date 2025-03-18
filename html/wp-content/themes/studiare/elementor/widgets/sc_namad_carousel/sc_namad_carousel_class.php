<?php
namespace Elementor;

class Sc_Namad_Carousel extends Widget_Base {
	
	public function get_name() {
		return 'symbols-carousel';
	}
	
	public function get_title() {
		return  __( 'Symbols', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-carousel';
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
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'symbol_code', [
				'label' => __( 'Symbol Code', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
			]
		);
		
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Symbols List', 'studiare' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				/*'default' => [
					[
						'list_title' => __( 'Title #1', 'studiare' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'studiare' ),
					],
					[
						'list_title' => __( 'Title #2', 'studiare' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'studiare' ),
					],
				],*/
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'studiare' ),
			]
		);
		
		$this->add_control(
			'sc_studi_cat_carouseitems_in_desktop',
			[
				'label' => __( 'Columns in desktop', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '1',
			]
		);
		$this->add_control(
			'sc_studi_cat_carouseitems_in_tablet',
			[
				'label' => __( 'Columns in tablet', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '1',
			]
		);
		$this->add_control(
			'sc_studi_cat_carouseitems_in_mobile',
			[
				'label' => __( 'Columns in mobile', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '1',
			]
		);
		
		
        
		
		$this->add_control(
			'sc_dots_active_color',
			[
				'label' => __( 'Dots active color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-dot.active span' => 'background: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'sc_dots_normal_color',
			[
				'label' => __( 'Dots normal color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-dot span' => 'background: {{VALUE}} !important',
				],
			]
		);
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();

        $sc_studi_cat_carouseitems_in_desktop = $settings['sc_studi_cat_carouseitems_in_desktop'] ;
        $sc_studi_cat_carouseitems_in_tablet = $settings['sc_studi_cat_carouseitems_in_tablet'] ;
        $sc_studi_cat_carouseitems_in_mobile = $settings['sc_studi_cat_carouseitems_in_mobile'] ;
        
        
        if ( $settings['list'] ) {
            ?>
                        <div class="sc_namad_carousel owl-carousel">
                            <?php foreach (  $settings['list'] as $item ) { ?>    
                            <?php echo do_shortcode( $item['symbol_code'] ); ?>
                            <?php } ?>    
                            
                        </div>  
                        <style>
		    .sc_namad_carousel img { max-width: 150px; margin: 0 auto; }
		</style>
        <script>
            jQuery(document).ready(function(){
                 jQuery('.sc_namad_carousel').each(
                    function(){
                        var numberofcols = jQuery(this).data('numberofcols');
                        var show_nav = jQuery(this).data('show_nav');
                        var show_dots = jQuery(this).data('show_dots');
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:10,
                            nav:show_nav,
                            dots:show_dots,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                               0: {
                                    items: <?php echo $sc_studi_cat_carouseitems_in_mobile ?>
                                  },
                                  768: {
                                    items: <?php echo $sc_studi_cat_carouseitems_in_tablet ?>
                                  },
                                  1170: {
                                    items: <?php echo $sc_studi_cat_carouseitems_in_desktop ?>
                                  }
                            }
                        });
                    }
                );
               
                
            });
        </script>
                        
                        
                        
        <?php
        }
        
        
        
	}
	
	protected function content_template() {
	 
    }
	
	
}