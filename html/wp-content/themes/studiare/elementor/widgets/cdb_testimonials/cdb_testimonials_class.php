<?php
namespace Elementor;

class Cdb_Testimonials extends Widget_Base {
	
	public function get_name() {
		return 'users-testimonialls';
	}
	
	public function get_title() {
		return  __( 'Testimonials', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-testimonial-carousel';
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
			'role', [
				'label' => __( 'Role', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial', [
				'label' => __( 'User Testimonial', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image', [
				'label' => __( 'User Image', 'studiare' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Testimonials List', 'studiare' ),
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
                'default' => '4',
			]
		);
		$this->add_control(
			'sc_studi_cat_carouseitems_in_tablet',
			[
				'label' => __( 'Columns in tablet', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '2',
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
        $css_class = "testimonials-wrapper";
       
        
        /*$date  = $settings['date'];
        $size  = $settings['size'] ;
        $style = $settings['style'] ;
        $light = $settings['light'] ;
        $align = $settings['align'] ;*/
        
        $sc_studi_cat_carouseitems_in_desktop = $settings['sc_studi_cat_carouseitems_in_desktop'] ;
        $sc_studi_cat_carouseitems_in_tablet = $settings['sc_studi_cat_carouseitems_in_tablet'] ;
        $sc_studi_cat_carouseitems_in_mobile = $settings['sc_studi_cat_carouseitems_in_mobile'] ;
        
 $jrand=rand(100,10000);       
        if ( $settings['list'] ) {
            ?>
                        <style>
                            .tuimage img { max-width: 112px; margin: 0 auto; border-radius: 20px 5px; box-shadow: -6px 6px #ffffff6e, 6px 13px #ffffff63; }
#customers-testimonials<?php echo $jrand; ?> .item {
    text-align: center;
    margin-bottom: 50px;
    padding: 15px;
    opacity: .2;
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.8, 0.8, 1);
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    background-color: #FFF;
    border-radius: 3px;
}
#customers-testimonials<?php echo $jrand; ?> .owl-item.active.center .item {
    opacity: 1;
    -webkit-transform: scale3d(1.0, 1.0, 1);
    transform: scale3d(1.0, 1.0, 1);
    background-color: #FFF;
}
#customers-testimonials<?php echo $jrand; ?>.owl-carousel .owl-item img {
    transform-style: preserve-3d;
    max-width: 112px;
    margin: 0 auto 17px;
}
#customers-testimonials<?php echo $jrand; ?> .owl-dots.disabled{display:block;}
.commo img {
    width: 30px !important;
    height: auto;
    float: left;
}
.author-img img {
    width: 112px !important;
    height: auto;
    border-radius: 100%;
    margin-bottom: 0 !important;
}
                        </style>
                        <div class="<?php echo  esc_attr( $css_class );?>">
                                    
                                    	 <div id="customers-testimonials<?php echo $jrand; ?>" class="owl-carousel"> 
                                    		<?php 
                                    		$class = "testimonial-item";
                                    		foreach (  $settings['list'] as $item ) {
                                    		    $img = wp_get_attachment_image(  $item['image']['id'],  'thumbnail', '',array('class' => 'testimonial-avatar-image') );
                                				?>
                                				
                                            
                                            <!--start TESTIMONIAL  -->
                                            <div class="item shadow-lg">
                                                <div class="p-4 bg-white rounded"> 
                                                
                                                <div class="author-img mr-3"> <?php if ( $img != '') {  echo wp_kses_post( $img );} ?> </div>
                                                <p class="mb-4 text-muted">	<?php echo do_shortcode( $item['testimonial'] ); ?></p>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    
                                                    <div>
                                                <?php if ( $item['title'] !== '' ) { ?>        
                                                    <h6 class="testo_title"><?php echo esc_html( $item['title'] ); ?></h6>
                                                <?php } ?>
                                                <?php if ( $item['role'] !== '' ) { ?>
                                                    <p class="testo_role"><?php echo esc_html( $item['role'] ); ?></p>
                                                <?php } ?>
                                                  </div>
                                                  </div>
                                              </div>
                                              </div>
                                            <!--END OF TESTIMONIAL  -->
        				<?php
        			}
            		?>
            	</div>
            
            </div>
            <script>
              jQuery(document).ready(function($) {
                            "use strict";
                            //  TESTIMONIALS CAROUSEL HOOK
                            $('#customers-testimonials<?php echo $jrand; ?>').owlCarousel({
                                loop: true,
                                center: true,
                                margin:-38,                   
                                dots:true,
                                autoplayTimeout: 5000,
                                smartSpeed: 450,
                                responsive: {
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
                        });
              </script>
        <?php
        }
        
        
        
	}
	
	protected function _content_template() {
	 
    }
	
	
}