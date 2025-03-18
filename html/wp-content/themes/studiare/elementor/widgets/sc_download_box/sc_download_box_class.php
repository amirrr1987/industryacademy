<?php
/**
 * show a downlod box in blog pages
 * author: Javad Pourshahabadi
 * Creation Date: 2023-02-02
 * */

namespace Elementor;


class Sc_Download_Box extends Widget_Base {
	
	public function get_name() {
		return 'studi-download-box';
	}
	
	public function get_title() {
		return  __( 'Download Box', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-download-circle-o';
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
			'title',
			[
				'label' => __( 'Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title', 'studiare' ),
				
			]
		);
		$this->add_control(
			'password',
			[
				'label' => __( 'Password', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				
			]
		);
		$this->add_control(
			'dlbtn_title',
			[
				'label' => __( 'Download Button Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Download','studiare'),
				
			]
		);
		
		
		
		
		$this->add_control(
			'dl_list',
			[
				'label' => esc_html__( 'Download List', 'studiare' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'studiare' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Title' , 'studiare' ),
						'label_block' => true,
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'studiare' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '',
						'show_label' => true,
					],
					[
						'name' => 'file_size',
						'label' => esc_html__( 'File Size', 'studiare' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '',
						'show_label' => true,
					],
					
				],
				//'default' => '',
				'title_field' => '{{{ title }}}',
			]
		);
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings   = $this->get_settings_for_display();
        $title      = $settings['title'];
        $password   = $settings['password'];
        $dl_list    = $settings['dl_list'];
        $dlbtn_title= $settings['dlbtn_title'];
        
        ?>
        <style>
            .studi_dlbox_holder {  /*float: right;*/display: flow-root; width: 100%; background: #fff; border-radius: 20px; box-shadow: 0 0 15px 0px rgb(0 0 0 / 5%); padding: 15px; margin-bottom: 14px;}
            .sdlbox_header { float: right; width: 100%; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid rgb(161 171 179 / 10%); } 
            .sdlbox_passholder { float: left; direction: ltr; text-align: left; }
            .sdlbox_passholder p { display: block; letter-spacing: 2px; font-size: 12px;margin: 0; }
            .sdlbox_passholder span { display: block; letter-spacing: 2px; font-size: 12px; opacity: .6; cursor: pointer; margin: 0;}
            .stdlbox_dlicon { width: 40px; height: 40px; background: linear-gradient(45deg, #36c9f4, #0679ca);color: #f9f7f4; border-radius: 8px; text-align: center; font-size: 20px; padding-top: 10px;  margin-left: 15px; float: right; } 
            .sdlbox_header h3 { display: contents;font-size: 15px; color: #758694; float: right; line-height: 40px; }
            
            .sdlbox_content { float: right; width: 100%; }
            .sdlbox_item { position:relative;background: #f7f7f7; padding: 15px; border-radius: 5px; margin: 10px 0; display: flex; justify-content: space-between;}
            .sdlbox_item a { float: left; background: linear-gradient(45deg, #36c9f4, #0679ca);color: #f9f7f4; padding: 0 10px; border-radius: 5px; transition:.4s; }
            .sdlbox_item a:hover {  background: linear-gradient(-45deg, #36c9f4, #0679ca); }
            .sdlbox_item a i { margin: 0 5px; }
            .sdlbox_item:before { content: ""; width: 20px; height: 20px; background: #2bb7eb; position: absolute; right: -10px; border-radius: 100em; border: 5px solid #fff; transform: translate(0,20%); }
            .sdlbox_item:hover:before { background: gold; }
            .sdlbox_item_title { width: 50%; }
            .sdlbox_item_fsize { background: #dcedc8; padding: 0 5px; width: 15%; text-align: center; border-radius: 3px; color: #8bc34a; }
            
            @media screen and (max-width:767px){.sdlbox_item { display: block; } .sdlbox_item_title { width: 100%; display: block; } }
        </style>
        <div class="studi_dlbox_holder">
           <div class="sdlbox_header">
               <span class="stdlbox_dlicon fal fa-download"></span>
               <h3><?php echo $title; ?></h3> 
               <?php if(!empty($password)){?>
                    <div class="sdlbox_passholder"><p>Password</p><span><?php echo $password; ?></span></div> 
               <?php }?>
            </div>
            <div class="sdlbox_content">
                <?php 
                if($settings['dl_list']){
                    
                    foreach($settings['dl_list'] as $dl){
                        
                        $title     = $dl['title'];
                        $link      = $dl['link'];
                        $file_size = $dl['file_size'];
                        
                        if(empty($title)){$title = $link;}
                        
                        $html = "";
                        if($link){
                                $html .= "<div class='sdlbox_item'><span class='sdlbox_item_title'>$title</span>";
                            if($file_size){
                                $html .= "<span class='sdlbox_item_fsize'>$file_size</span>";  
                            }
                                $html .= "<a href='$link' target='_blank'><i class='fal fa-download'></i>".$dlbtn_title."</a></div>";  
                        }
                        
                        echo $html;
                    }
                }
                ?>
            </div>
        </div>
        <?php
        
	}
	
	protected function content_template() {
	 
    }
	
	
}

 