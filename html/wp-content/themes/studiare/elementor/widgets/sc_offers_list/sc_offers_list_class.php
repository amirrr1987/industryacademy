<?php
namespace Elementor;

class Sc_Offers_List extends Widget_Base {
	
	public function get_name() {
		return 'sc-offers-list';
	}
	
	public function get_title() {
		return  __( 'Offers', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-carousel';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	protected function register_controls() {
        
        
        /*help section */
        $this->start_controls_section(
			'section_help',
			[
				'label' => __( 'Help', 'studiare' ),
			]
		);
		
		$this->add_control(
			'important_note',
			[
				'label' => '',
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => __( 'For show product on this widget you must edit product and from price section add sale price then set start/end time for sale', 'studiare' ),
				'content_classes' => 'your-class',
			]
		);
		
		
	
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'studiare' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				/*'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],*/
			]
		);
		$this->add_control(
			'buy_txt',
			[
				'label' => __( 'Buy Text', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => __( 'Buy', 'studiare' ),
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
			'layout',
			[
				'label' => esc_html__( 'Layout', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one'      => esc_html__( 'Layout', 'studiare' ).' 1',
					'two'      => esc_html__( 'Layout', 'studiare' ).' 2',
					//'three'    => esc_html__( 'Layout', 'studiare' ).' 3',
				],
			]
		);
		$this->add_control(
			'img_cover',
			[
				'label' => esc_html__( 'Image Cover', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
        			'layout' => 'two',
        		],
				'default' => 'one',
				'options' => [
					'one'    => esc_html__( 'Layout', 'studiare' ).' 1',
					'two'    => esc_html__( 'Layout', 'studiare' ).' 2',
					'three'  => esc_html__( 'Layout', 'studiare' ).' 3',
					'four'   => esc_html__( 'Layout', 'studiare' ).' 4',
					'five'   => esc_html__( 'Layout', 'studiare' ).' 5',
					'six'   => esc_html__( 'Layout', 'studiare' ).' 6',
					'seven'   => esc_html__( 'Layout', 'studiare' ).' 7',
					'eight'   => esc_html__( 'Layout', 'studiare' ).' 8',
				],
			]
		);
		$this->add_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'medium',
				'options' => [
					'medium'    => esc_html__( 'Medium', 'studiare' ),
					'full'    => esc_html__( 'Full', 'studiare' ),
				],
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
			'btncolor',
			[
				'label' => __( 'Button Background Color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .soc_buy_btn' => 'background: {{VALUE}} !important',
					'{{WRAPPER}} .soc_buy_btn_ltwo' => 'background: {{VALUE}} !important;box-shadow:0 0 13px {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'btncolorhover',
			[
				'label' => __( 'Button Background Color Hover', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					
					'{{WRAPPER}} .soc_buy_btn_ltwo:hover' => 'background: {{VALUE}} !important;box-shadow:0 0 13px {{VALUE}} !important',
				],
			]
		);
		
		$this->add_control(
			'btntxtcolor',
			[
				'label' => __( 'Button Text Color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .soc_buy_btn' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .soc_buy_btn_ltwo' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'btntxtcolorhover',
			[
				'label' => __( 'Button Text Color Hover', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					
					'{{WRAPPER}} .soc_buy_btn:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .soc_buy_btn_ltwo:hover' => 'color: {{VALUE}} !important;',
				],
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
		$this->add_control(
			'sc_coundown_numbers_color',
			[
				'label' => __( 'Countdown Numbers color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .proTimer div span.off_nums' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'sc_coundown_text_color',
			[
				'label' => __( 'Countdown text color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .proTimer div span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'sc_coundown_text_backgroun',
			[
				'label' => __( 'Countdown text Background color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .proTimer div' => 'background: {{VALUE}} !important',
				],
			]
		);
		
		
		$this->end_controls_section();
	}
	
	protected function render() {
	    
	    //check if woocommerce is active
	    if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            
            return _e('Please activate woocommerce plugin','studiare');
        } 

        $settings = $this->get_settings_for_display();

        $icon = $settings['icon']['value'] ;
        
        $buy_btn_color = "true" ;
        $layout = $settings['layout'] ;
        $sc_studi_cat_carouseitems_in_desktop = $settings['sc_studi_cat_carouseitems_in_desktop'] ;
        $sc_studi_cat_carouseitems_in_desktop = $settings['sc_studi_cat_carouseitems_in_desktop'] ;
        $sc_studi_cat_carouseitems_in_tablet  = $settings['sc_studi_cat_carouseitems_in_tablet'] ;
        $sc_studi_cat_carouseitems_in_mobile  = $settings['sc_studi_cat_carouseitems_in_mobile'] ;
        $image_size  = $settings['image_size'] ;
        $img_cover  = $settings['img_cover'] ;
        $btnTitle  = $settings['buy_txt'] ;
        
        $jp_id = rand(1,1000);
        $jp_id = "studi_soc_".$jp_id;
        
        if($icon){$btn_icon = $icon;}else{$btn_icon = "fal fa-shopping-basket";}

        
        //$sales_ids = wc_get_product_ids_on_sale();
        
        /*$args = array(
            'post_type'      => 'product',
            'fields'        => 'ids',
            'posts_per_page' => -1,
            'meta_query'     => array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            )
        ); */
        
        $args = array(
                        'post_type'      => array('product','product_variation'),
                        'fields'        => 'ids',
                        'posts_per_page' => -1,
                                    'meta_query'     => array(
                                    'relation' => 'AND',
                                    array(
                                        'key'       => '_sale_price',
                                        'compare'   => 'EXISTS',
                                    ),
                                    array(
                                        'key'       => '_sale_price_dates_to',
                                        'compare'   => 'EXISTS',
                                    ),
                            ),
                    );

        $sales_ids = new \WP_Query( $args );
        
        $sales_ids = $sales_ids->posts;


        $onsale_with_date_array = array();
        foreach($sales_ids as $pro_id){
            
            $sales_price_to   = get_post_meta( $pro_id, '_sale_price_dates_to', true );
            if($sales_price_to){
                $onsale_with_date_array[] = $pro_id;
            }
        }
        if($onsale_with_date_array){
            
            if( $layout=="one" ){
                
                $html = "<div id='$jp_id' class='studi_special_offer_holder soc_lone owl-carousel'>"; 
               
                foreach($onsale_with_date_array as $id){
                    $sales_price_to   = get_post_meta( $id, '_sale_price_dates_to', true );
                    $sales_price_to =  date('Y-m-d H:i:s',$sales_price_to);
                    
                    $regul_price   = get_post_meta( $id, '_regular_price', true );
                    $sales_price   = get_post_meta( $id, '_sale_price', true );
                    
                    $offPercent = round(100-(($sales_price/$regul_price)*100))."%";
                    
                    $regul_price   = number_format($regul_price);
                    $sales_price   = number_format($sales_price);
                    $price_sym = get_woocommerce_currency_symbol();
                    $price_html="<div class='scoPriceHtml'><span class='sco_regp'>$regul_price</span><span class='sco_salep'>$sales_price</span><span class='sco_currency'>$price_sym</span></div>";
                    
                    $title = get_the_title($id);
                    $link = get_permalink($id);
                    
                    $post = get_post( $id );
                    $excerpt = $post->post_excerpt;
                    
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $image_size );
                    $html .= "<div data-offpercent='$offPercent' class='prosale_holder '><div class='prosale_image col-md-4 col-xs-12'><img src='$image[0]' style='width:100%;height:200px;'></div><div class='prosale_data col-md-8 col-xs-12'><div class='col-md-8'><h2><a href='$link'>$title</a></h2>$price_html<div class='sco_excerpt'>$excerpt</div></div><div class='col-md-4'><div id='pro_$id' data-proid='pro_$id'  data-enddate='$sales_price_to'  class='proTimer'></div><a class='soc_buy_btn' href='$link'><i class='$icon'></i> $btnTitle</a></div></div></div>";
                    
                    
                }
                $html .="</div>";
            }
            elseif($layout=="two"){
                
                $html = "
               <div id='$jp_id' class='studi_special_offer_holder soc_ltwo  owl-carousel'>";
                foreach($onsale_with_date_array as $id){
                    $sales_price_to   = get_post_meta( $id, '_sale_price_dates_to', true );
                    $sales_price_to =  date('Y-m-d H:i:s',$sales_price_to);
                    
                    $regul_price   = get_post_meta( $id, '_regular_price', true );
                    $sales_price   = get_post_meta( $id, '_sale_price', true );
                    
                    $offPercent = round(100-(($sales_price/$regul_price)*100))."%";
                    
                    $regul_price   = number_format($regul_price);
                    $sales_price   = number_format($sales_price);
                    $price_sym = get_woocommerce_currency_symbol();
                    $price_html="<div class='studi_scoPriceHtml'><div class='studi_sco_regp'>$regul_price</div><div class='soc_offPercent'>$offPercent</div><div class='studi_sco_salep'>$sales_price<span class='studi_sco_currency'>$price_sym</span></div></div>";
               
                    $title = get_the_title($id);
                    $link = get_permalink($id);
                    
                    $post = get_post( $id );
                    $excerpt = $post->post_excerpt;
                    
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $image_size );
                    //$html .= "<div data-offpercent='$offPercent' class='prosale_holder '><div class='prosale_image col-md-4 col-xs-12'><img src='$image[0]' style='width:100%;height:200px;'></div><div class='prosale_data col-md-8 col-xs-12'><h2><a href='$link'>$title</a></h2><div class='col-md-8'>$price_html<div class='sco_excerpt'>$excerpt</div></div><div class='col-md-4'><div id='pro_$id' data-proid='pro_$id'  data-enddate='$sales_price_to'  class='proTimer'></div><a class='soc_buy_btn' href='$link'><i class='$icon'></i> $btnTitle</a></div></div></div>";
                    $html .= "
                    <div data-offpercent='' class='prosale_holder '>
                    <div class='sc_prosale_image stimgcover_$img_cover'><img src='$image[0]' ></div>
                    <div class='sc_prosale_data'>
                    
                        <div class='sc_so_content'>
                        <h2><a href='$link'>$title</a></h2>
                        <div class='sco_excerpt'>$excerpt</div>
                        $price_html
                        <a class='soc_buy_btn_ltwo' href='$link'><i class='$icon'></i> $btnTitle</a>
                        </div>
                        <div class='sc_so_timer'>
                        
                        <div id='pro_$id' data-proid='pro_$id'  data-enddate='$sales_price_to'  class='proTimer'></div>
                        
                        </div>
                    </div>
                    </div>";
                    
                }
                $html .="</div>"; 
            }
            elseif($layout=="three"){
                
                $html = "<div class='sc_special_offer_three'>";
                $rand_id = rand(1,1000);
                $rand_id = "sc_ot_".$rand_id;
                $html .="<style>
                        .sc_special_offer_three { display: flex;align-items: center; }
                        .sc_ot_titles { width: 25%;position: relative; }
                        .sc_ot_content { width: 75%; background: #fff; padding: 10px; border-radius: 10px; transform: translateY(-10px);  }
                        .sc_ot_subcon { display: flex; justify-content: space-between;display: none; }
                        .sc_ot_subcon.sc_ot_tactice { display: flex;  }
                        .sc_ot_img img { border-radius: 5px; height: 178px; width: 300px; }
                        .sc_ot_oti {text-indent: 10px;cursor: pointer; color: #fff;position: relative;border-bottom: 1px solid #ffffff2b; padding: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
                        .sc_ot_oti.sc_ot_tactice { background: linear-gradient(90deg,#fff0,#ffffff78); }
                        .sc_ot_titles:before { content: ''; width: 4px; height: 100%; position: absolute; right: 0px; background: #ffffff6e; }
                        .sc_ot_img { position: relative; }
                        .sc_ot_offPercent { position: absolute; bottom: 0; background: white; padding: 7px 22px; border-radius: 10px 10px 0 0; box-shadow: 0 4px 5px inset #878484; transform: translateX(-160%); }
                        .sc_ot_ofbox { width: 60%; }
                        .sc_special_offer_three .sale-perc { right: -26px; top: -26px; -webkit-transform: rotate(30deg); transform: rotate(0deg); -webkit-transition: all 0.3s; }
                        .scot_title { font-weight: 600; }
                        a.soc_buy_btn_lthree { background: #6fd79b; padding: 5px 10px; border-radius: 4px; min-width: 90px; display: inline-flex; text-align: center; box-shadow: 0 0 14px #24c76e6b; color: #fff; justify-content: space-between; }
                        a.soc_buy_btn_lthree i { background: #ffffff2e; padding: 5px 8px; border-radius: 3px; border: 1px solid #f5f5f51f; }
                        .sc_ot_PriceHtml { display: inline-block; padding: 0 15px; }
                        .sc_ot__regp { color: gainsboro; }
                        .sc_ot__salep { color: #6fd79b; font-size: 22px; }
                        span.sc_ot_currency { font-size: 10px; right: 6px; position: relative; }
                        .scbtm_els { align-items: end; display: flex; justify-content: flex-start; }
                        
                        .sc_special_offer_three .proTimer { margin-top: 0; }
                        .sc_special_offer_three .proTimer div { background: transparent; }
                        .sc_special_offer_three .proTimer div span { display: block; color: #cbcbcb; }
                        .sc_special_offer_three .proTimer div span:first-child { color: #E91E63; }
                        .sc_special_offer_three .proTimer div span:first-child:before { content: ''; width: 30px; height: 25px; position: absolute; transform: translate(-6px, 0px); border-radius: 5px 8px 2px; z-index: -1; background: linear-gradient(0,#FCE4EC,transparent); }
                       
                        
                        </style>"; 
                
                $html .= "<div class='sc_ot_titles'>";
                $i   = 1;
                foreach($onsale_with_date_array as $id){
                    
                    $tid = $rand_id."".$i;
                    
                    if($i ==1 ){$isactive="sc_ot_tactice";}else{$isactive="";}
                    
                    $title = get_the_title($id);
                    
                    $html .= "<div data-scof-id='$tid' class='sc_ot_oti $isactive'>$title</div>";
                    $i++;
                }
                $html .= "</div>";
                
                $html .= "<div class='sc_ot_content'>";
                 $i   = 1;
                foreach($onsale_with_date_array as $id){
                    
                   
                    $tid = $rand_id."".$i;
                    if($i ==1 ){$isactive="sc_ot_tactice";}else{$isactive="";}
                    
                    $sales_price_to   = get_post_meta( $id, '_sale_price_dates_to', true );
                    $sales_price_to =  date('Y-m-d H:i:s',$sales_price_to);
                    
                    $regul_price   = get_post_meta( $id, '_regular_price', true );
                    $sales_price   = get_post_meta( $id, '_sale_price', true );
                    
                    $offPercent = round(100-(($sales_price/$regul_price)*100))."%";
                    
                    $regul_price   = number_format($regul_price);
                    $sales_price   = number_format($sales_price);
                    $price_sym = get_woocommerce_currency_symbol();
                    $price_html="<div class='sc_ot_PriceHtml'><div class='sc_ot__regp'>$regul_price</div><div class='sc_ot__salep'>$sales_price<span class='sc_ot_currency'>$price_sym</span></div></div>";
               
                    $title = get_the_title($id);
                    $title = "<div class='scot_title'>$title</div>";
                    $link = get_permalink($id);
                    
                    $post = get_post( $id );
                    $excerpt = $post->post_excerpt;
                    
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $image_size );
                    
                    
                        $percentage = '<div class="sale-perc"><span class="sc_offer_txt">'.$offPercent.'</span>تخفیف</div>';
                        $html .= "<div id='$tid' class='sc_ot_subcon $isactive'>
                                    <div class='sc_ot_img'><img src='$image[0]'>$percentage</div>
                                    <div class='sc_ot_ofbox'>
                                        
                                        
                                        
                                        <div class='sc_so_timer'>
                        
                        <div id='pro_$id' data-proid='pro_$id'  data-enddate='$sales_price_to'  class='proTimer'></div>
                        
                        </div>
                        $title
                        <div class='sco_excerpt'>$excerpt</div>
                        <div class='scbtm_els'>
                                        <a class='soc_buy_btn_lthree' href='$link'>$btnTitle <i class='$icon'></i></a>
                                        $price_html
                        </div>                
                                    </div>
                                  </div>
                                ";
                        
                    $i++;
                }
                $html .= "</div>";
                
                
                
                $html .= "</div>";
                
                
            }
            //
            
        
            
        }else{
            $html = "<div class='studi_special_offer_holder'>";
            $html .= "<div>محصولی یافت نشد</div>";
            $html .="</div>";
        }

        echo $html;
?>

        
<script>
    jQuery(document).ready(function($){
        
                <?php if($layout=="three"){ ?>
                
                 jQuery('.sc_ot_oti').click(
                    function(){
                       var sc_ot_id = $(this).data('scof-id');
                       jQuery('.sc_ot_oti').removeClass('sc_ot_tactice');
                       
                       $(this).addClass('sc_ot_tactice');
                       
                       jQuery('.sc_ot_subcon').removeClass('sc_ot_tactice');
                       $('#'+sc_ot_id).addClass('sc_ot_tactice');
                        
                    }
                );
                
                <?php } ?>
                
                 //jQuery('.studi_special_offer_holder.owl-carousel').each(
                 jQuery('.studi_special_offer_holder.owl-carousel').each(
                    function(){
                        
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:0,
                            nav:false,
                            dots:true,
							loop:false,
							autoplay:true,
							items:1,
							autoplayHoverPause:true,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                        });
                    }
                );
                
                 
    });
    jQuery('.proTimer').each(
                    function(){
                      
                        var enddate = jQuery(this).data("enddate");
                        var proid = jQuery(this).data("proid");
                        
                       setInterval(function() { studi_soc_pro_timer(proid,enddate); }, 1000);	 
                         
                     
                        
                    }
                );
    function studi_soc_pro_timer(proid,enddate){
        var endTime = new Date(enddate);			
            			endTime = (Date.parse(endTime) / 1000);
            
            			var now = new Date();
            			now = (Date.parse(now) / 1000);
            
            			var timeLeft = endTime - now;
            
            			var days = Math.floor(timeLeft / 86400); 
            			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
              
            			if (hours < "10") { hours = "0" + hours; }
            			if (minutes < "10") { minutes = "0" + minutes; }
            			if (seconds < "10") { seconds = "0" + seconds; }
            			var output = "<div class='offdays'><span class='off_nums'>"+days + "</span><span>روز</span></div>"+"<div class='offhours'><span class='off_nums'>"+hours + "</span><span>ساعت</span></div>"+"<div class='offminutes'><span class='off_nums'>"+minutes + "</span><span>دقیقه</span></div>"+"<div class='offseconds'><span class='off_nums'>"+seconds + "</span><span>ثانیه</span></div>";
            			 jQuery("#"+proid).html(output); 
    }
</script>        
                        
                        
                        
        <?php

	}
	
	protected function content_template() {
	 
    }
	
	
}