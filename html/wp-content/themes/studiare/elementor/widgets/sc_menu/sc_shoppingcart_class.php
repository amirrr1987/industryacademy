<?php
namespace Elementor;

class Sc_ShoppingCart extends Widget_Base {
	
	public function get_name() {
		return 'studi-shopping-cart';
	}
	
	public function get_title() {
		return  __( 'Shopping Cart', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-basket-light';
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
        $cart_icon = true;
       
        if ( class_exists( 'Redux' ) ) {
        	//$cart_icon = codebean_option('topbar_cart');
        }

        if ( class_exists( 'WooCommerce' ) ) {
            if (  function_exists('WC' ) ){  //$cart_icon &&
                ?>
                
        <div class="top-bar-cart">
            <a href="<?php echo wc_get_cart_url(); ?>" class="mini-cart-opener">
                <span class="bag-icon">
                    <?php get_template_part( 'assets/images/shop-bag-two.svg' ); ?>
                </span>
                
	            <?php studiare_cart_count(); ?>
            </a>
            <div class="dropdown-cart">
		        <?php

		        // Insert cart widget placeholder - code in woocommerce.js will update this on page load
		        echo '<div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>';

		        ?>
            </div>
        </div>
                <?php
                
            }
        }						  
        
	}
	
	protected function content_template() {
	 
    }
	
	
}