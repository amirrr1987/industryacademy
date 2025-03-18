<?php
namespace Elementor;

class Sc_LoginBtn extends Widget_Base {
	
	public function get_name() {
		return 'studi-login-btn';
	}
	
	public function get_title() {
		return  __( 'Login Button', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-lock-user';
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
		
		/**
		//since version 12.7 adding submenu elements by user
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'link_title', [
				'label' => __( 'Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'studiare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'studiare' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fal fa-user',
					'library' => 'light',
				],
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url'],//[ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					//'is_external' => true,
					//'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'submenu_list',
			[
				'label' => __( 'Submenu', 'studiare' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				//'default' => '',
				'title_field' => '{{{ link_title }}}',
			]
		);
		**/
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_design',
			[
				'label' => __( 'Design', 'studiare' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'btn_txt_color',
			[
				'label' => esc_html__( 'Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-button-link a>span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-button-link a.btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'studiare' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-button-link a.btn' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
  
        $header_button_link = 'account';
        $header_button_custom_text = null;
        
        $header_button_type = 'link';
        $hb_submenu = null;
        
        $header_button_link_show_on_mobile ="show_icon_and_text";  //since ver 12.4
       if ( class_exists( 'Redux') ) {
           $header_button_link = codebean_option('header_button_link');
           $header_button_custom_text = codebean_option('header_button_custom_text');
           $header_button_custom_text_0 = codebean_option('header_button_custom_text_0')?:"شروع کنید";
	       $header_button_custom_text_1 = codebean_option('header_button_custom_text_1')?:"حساب کاربری";
	       $header_button_custom_text_2 = codebean_option('header_button_custom_text_2')?:"حساب کاربری";
	       $header_button_custom_link = codebean_option('header_button_custom_link');
	       $header_button_link_show_on_mobile = codebean_option('header_button_link_show_on_mobile'); //since ver 12.4
	       $show_avatar = codebean_option('show_avatar');
	       $show_display_name = codebean_option('show_display_name');

            //since v 12.7
	        $header_button_type = codebean_option('header_button_type');
	        $hb_submenu = codebean_option('hb_submenu');	       
	       
       }
        if ( class_exists( 'WooCommerce' ) ) {
         if(!is_account_page() ){
             ?>
                <div class="header-button-link <?php echo "sc_lgreg_btn_".$header_button_link_show_on_mobile ;?>">
                    <?php if ( $header_button_link == 'account' || $header_button_link == 'sc_digits'){
                        
                        $account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
                        $current_user = wp_get_current_user();
                        
                        if ( is_user_logged_in() ) { 
                            if($header_button_type == 'link'){
                        ?>
                           <a href="<?php echo esc_url( $account_link ); ?>" class="login-button btn btn-filled"><?php if ( $show_avatar==1) { echo get_avatar( get_current_user_id(), 32 );} else {?><i class="fal fa-user"></i> <?php } ?><span><?php if ( $show_display_name==1) { echo  esc_html( $current_user->display_name );} else echo esc_html($header_button_custom_text_1); ?></span></a>
                            
                            <?php 
                            }else{
                            include 'dropdown_file.php'; 
                            }
                            ?>
                            
                        <?php }
                        elseif ( is_plugin_active( 'digits/digit.php' ) && $header_button_link == 'sc_digits' )  { ?>
                        <a href="#" class="login-button btn btn-filled scdigits"><i class="fal fa-user-plus"></i> <span><?php echo do_shortcode("[dm-modal]"); ?></span></a>
                        <?php 
                            
                        } 
                        else {
                        ?>
                            <a href="#" class="register-modal-opener login-button btn btn-filled"><i class="fal fa-user-plus"></i> <span><?php echo esc_html($header_button_custom_text_0); ?></span></a>
                        <?php } 
                        
                    }else{
                        
                        if ( is_user_logged_in() ) {
             ?>
                        <a href="<?php echo esc_url($header_button_custom_link); ?>" class="btn btn-filled" rel="nofollow"><i class="fal fa-user"></i><span><?php echo esc_html($header_button_custom_text_2); ?></span></a>
             <?php
                        }else{ ?>
                        <a href="<?php echo esc_url($header_button_custom_link); ?>" class="btn btn-filled" rel="nofollow"><i class="fal fa-user"></i><span><?php echo esc_html($header_button_custom_text); ?></span></a>
                        <?php }
         } 
                        ?>
                   
                </div>    
            <?php
            
        				  
         }
        }
	}
	
	protected function content_template() {
	 
    }
	
	
}