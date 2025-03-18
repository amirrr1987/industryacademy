<?php
namespace Elementor;

class Sc_Video_Podcast extends Widget_Base {
	
	public function get_name() {
		return 'studi-video-podcast';
	}
	
	public function get_title() {
		return  __( 'Podcasts', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-posts-ticker';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	public function get_style_depends(): array {
		return [ 'swiper' ];
	}

	public function get_script_depends(): array {
		return [ 'swiper' ];
	}
	
	protected function register_controls() {

		
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
		$this->add_control(
			'podcast_type',
			[
				'label' => __( 'Type', 'studiare' ),
				'description' => esc_html__( 'Note: To use this element, you must have created your own audio or video podcasts from the menu > Posts >. To do this, go to the menu > Posts > Add and create a new post. Choose audio/video from the left sidebar and enter your full audio/video link from the fields below. (The full link means a link that can be played automatically by entering it directly in the address bar of the browser.)', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
				'options' => [
					'audio'  => __( 'Audio', 'studiare' ),
					'video' => __( 'Video', 'studiare' ),
				],
				'default' => [ 'audio' ],
			]
		);
		
		$this->add_control(
			'pnumber',
			[
				'label' => __( 'Podcasts number to show', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '5',
				'placeholder' => '',
			]
		);
		
		
		
		
		$this->add_control(
			'color1',
			[
				'label' => __( 'Color', 'studiare' ).' 1',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fd3838'
				
			]
		);
		$this->add_control(
			'color2',
			[
				'label' => __( 'Color', 'studiare' ).' 2',
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fe8a39'
				
			]
		);
		
		$this->add_control(
			'addSwipper',
			[
				'label' => esc_html__( 'Conflict Solver', 'studiare' ),
				'description' => esc_html__( 'only if the widget shows wrong, please activate this.', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'studiare' ),
				'label_off' => esc_html__( 'Off', 'studiare' ),
				'return_value' => 'yes',
				'default' => 'false',
			]
		);
		
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        $pnumber  = $settings['pnumber']?:'5';
        $podcast_type  = isset($settings['podcast_type']) ? $settings['podcast_type'] : 'audio';
        $color1        = $settings['color1'];
        $color2        = $settings['color2'];
        $addSwipper    = $settings['addSwipper'];
//print_r($settings) ;
if($podcast_type=="audio"){
    
        /**
         * 
         * <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" type="text/css" media="all">
         *  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js" ></script>
         **/
         
         if($addSwipper){
             //echo '<script type="text/javascript" src="'.plugins_url().'/elementor/assets/lib/swiper/v8/swiper.min.js" ></script>';
             //echo '<link type="text/css" rel="stylesheet" href="'.plugins_url().'/elementor/assets/lib/swiper/v8/css/swiper.min.css" media="all">';
         }
        ?>
        
        
        <style>
            .studi_podcast_slider { width: 95%; position: relative; max-width: 800px; margin: auto; background: #fff; box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2); padding: 25px; border-radius: 25px; height: 400px; transition: all 0.3s; } 
            @media screen and (max-width: 992px) { .studi_podcast_slider { max-width: 680px; height: 400px; } } 
            @media screen and (max-width: 768px) { .studi_podcast_slider { min-height: 500px; height: auto; margin: 180px auto 0 auto; } } 
            @media screen and (max-height: 500px) and (min-width: 992px) { .studi_podcast_slider { height: 350px; } } 
            .studi_podcast_slider__item { display: flex; align-items: center; } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__item { flex-direction: column; } } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__img img { opacity: 1; transition-delay: 0.3s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > * { opacity: 1; transform: none; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(1) { transition-delay: 0.3s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(2) { transition-delay: 0.4s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(3) { transition-delay: 0.5s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(4) { transition-delay: 0.6s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(5) { transition-delay: 0.7s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(6) { transition-delay: 0.8s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(7) { transition-delay: 0.9s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(8) { transition-delay: 1s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(9) { transition-delay: 1.1s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(10) { transition-delay: 1.2s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(11) { transition-delay: 1.3s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(12) { transition-delay: 1.4s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(13) { transition-delay: 1.5s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(14) { transition-delay: 1.6s; } 
            .studi_podcast_slider__item.swiper-slide-active .studi_podcast_slider__content > *:nth-child(15) { transition-delay: 1.7s; } 
            .studi_podcast_slider__img { width: 300px; flex-shrink: 0; height: 300px; background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);background-image: linear-gradient(147deg, <?php echo $color2;?> 0%, <?php echo $color1;?> 74%); box-shadow: 4px 13px 30px 1px rgba(252, 56, 56, 0.2);box-shadow: 4px 13px 30px 1px <?php echo studi_hex_to_rgba($color1, .2); ?>; border-radius: 20px; transform: translateX(80px); overflow: hidden; } 
            .studi_podcast_slider__img:after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);background-image: linear-gradient(147deg, <?php echo $color2;?> 0%, <?php echo $color1;?> 74%); border-radius: 20px; opacity: 0.8; } 
            .studi_podcast_slider__img img { width: 100%; height: 100%; object-fit: cover; display: block; opacity: 0; border-radius: 20px; transition: all 0.3s; } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__img { transform: translateY(-50%); width: 90%; } } 
            @media screen and (max-width: 576px) { .studi_podcast_slider__img { width: 95%; } } 
            @media screen and (max-height: 500px) and (min-width: 992px) { .studi_podcast_slider__img { height: 270px; } } 
            .studi_podcast_slider__content { padding-left: 25px; } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__content { margin-top: -80px; text-align: center; padding: 0 30px; } } 
            @media screen and (max-width: 576px) { .studi_podcast_slider__content { padding: 0; } } 
            .studi_podcast_slider__content > * { opacity: 0; transform: translateY(25px); transition: all 0.4s; } 
            .studi_podcast_slider__code { color: #7b7992; margin-bottom: 15px; display: block; font-weight: 500; } 
            .studi_podcast_slider__title { font-size: 24px; font-weight: 700; color: #0d0925; margin-bottom: 20px; } 
            .studi_podcast_slider__text { color: #4e4a67; margin-bottom: 30px; line-height: 1.5em; } 
            .studi_podcast_slider__button { display: inline-flex; background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%); padding: 15px 35px; border-radius: 50px; color: #fff; box-shadow: 0px 14px 80px rgba(252, 56, 56, 0.4); text-decoration: none; font-weight: 500; justify-content: center; text-align: center; letter-spacing: 1px; } 
            @media screen and (max-width: 576px) { .studi_podcast_slider__button { width: 100%; } } 
            .studi_podcast_slider .swiper-container-horizontal > .swiper-pagination-bullets, .studi_podcast_slider .swiper-pagination-custom, .studi_podcast_slider .swiper-pagination-fraction { bottom: 10px; left: 0; width: 100%; } 
            .studi_podcast_slider__pagination { position: absolute; z-index: 21; left: 20px !important; width: 11px !important; text-align: center; right: auto !important; top: 50%; bottom: auto !important; transform: translateY(-50%); } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__pagination { transform: translateX(-50%); left: 50% !important; top: 205px; width: 100% !important; display: flex; justify-content: center; align-items: center; } } 
            .studi_podcast_slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet { margin: 8px 0 !important; } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet { margin: 0 5px; } } 
            .studi_podcast_slider__pagination .swiper-pagination-bullet { width: 11px; height: 11px; display: block; border-radius: 10px; background: var(--primary_color); opacity: 0.2; transition: all 0.3s; } 
            .studi_podcast_slider__pagination .swiper-pagination-bullet-active { opacity: 1; background: var(--primary_color); height: 30px; box-shadow: 0px 0px 20px rgba(252, 56, 56, 0.3); height: 30px; box-shadow: 0px 0px 20px rgba(252, 56, 56, 0.3);box-shadow: 0px 0px 20px <?php echo studi_hex_to_rgba($color1, .3); ?>; } 
            @media screen and (max-width: 768px) { .studi_podcast_slider__pagination .swiper-pagination-bullet-active { height: 11px; width: 30px; } }
            .studi_podcast_slider__item.swiper-slide { overflow: visible; }
            
            
        </style>
    <div class="studi_podcast_slider">
  <div class="studi_podcast_slider__wrp swiper-wrapper" dir="">
      
    
    
    <?php 
    
    $args = array( 'post_format' => 'post-format-audio','post_status' => 'publish', 'posts_per_page' => $pnumber );
        $loop = new \WP_Query( $args );
        //print_r($loop->posts);
        foreach($loop->posts as $post){
            
            $post_id    = $post->ID;
            $post_date  = $post->post_date;
            $post_title = $post->post_title;
            $post_excerpt = $post->post_excerpt;
            $post_url = get_permalink( $post_id );
            
            $imag_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
            
            $audio_url = get_post_meta($post_id,"_studiare_studi_audio_url",true);
            ?>
            
            <div class="studi_podcast_slider__item swiper-slide">
                  <div class="studi_podcast_slider__img">
                    
                    <img src="<?php echo $imag_url; ?>" alt="">
                  </div>
                  <div class="studi_podcast_slider__content">
                    <span class="studi_podcast_slider__code"><?php echo date_i18n(get_option( 'date_format' ), strtotime( $post_date )); ?></span>
                    <div class="studi_podcast_slider__title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></div>
                    <div class="studi_podcast_slider__text"><?php echo $post_excerpt; ?> </div>
                    [audio src="<?php echo $audio_url;?>"]
                    <a style="display:none;" href="#" class="studi_podcast_slider__button"><?php echo $post_date; ?></a>
                  </div>
            </div>
            
            <?php
            
            
        }
    
    ?>
    
    
    
    
  </div>
  <div class="studi_podcast_slider__pagination"></div>
</div>    
     
     <script>
         jQuery(document).ready(function(){
             
             var swiper = new Swiper('.studi_podcast_slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.studi_podcast_slider__pagination',
        clickable: true,
      }
    });
             
         });
     </script>   
        
        <?php
}

if($podcast_type=="video"){
    
    
        $args = array( 'post_format' => 'post-format-video','post_status' => 'publish', 'posts_per_page' => $pnumber );
        $loop = new \WP_Query( $args );
        //print_r($loop->posts);
        if( $loop->posts ){
            $studi_video_hoolder_id = rand(1,5000);
            ?>
            <style>
                .studi_video_podcast_container { position: relative; margin: auto; background: #fff; box-shadow: 0px 14px 80px rgb(34 35 58 / 20%); padding: 25px; border-radius: 25px; }
                .studi_video_podcast_playlist { height: 100%; border-left: 1px solid #eeeef0;padding: 10px 0; }
                .studi_video_podcast_playlist_item {transition:.3s; cursor: pointer; border-bottom: 1px solid #eeeef0; padding: 10px 5px; display: flex; align-items: center; justify-content: flex-start; } 
                .studi_video_podcast_playlist_item i { padding: 0 5px; }
                img.studi_vthumb { width: 50px; height: 50px; border-radius: 10px 0; padding: 3px; background: #eeeef0; }
                .studi_video_podcast_playlist_item.active,.studi_video_podcast_playlist_item:hover {transition:.3s; border-left: 0px solid #0ec7dc; transform: translateX(0); }
                span.studi_tab_indicator { position: absolute; left: 13px; top: 10px; width: 4px; height: 71px; background: var(--primary_color); border-radius: 20px;transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms; }
                .studi_video_podcast_playlist_item i { transition: 0.3s; }
                .studi_video_podcast_playlist_item.active i, .studi_video_podcast_playlist_item:hover i { color: var(--primary_color); font-size: 30px; margin-right: -14px; transition: 0.3s; }
                .studi_video_podcast_playlist_item.active .h6 { font-weight: 700 !important; }
            </style>
            <?php
            echo "<div id='studi_vpc_holder_$studi_video_hoolder_id' class='studi_video_podcast_container'>";
                echo "<div class='row'>";
                    echo "<div class='col-md-4 col-xs-12'>";
                        echo "<div class='studi_video_podcast_playlist'>";
                        $j = 1;
                            foreach($loop->posts as $post){
                                
                                $vclass="active";
                                if($j!=1){ $vclass="";}
                                $post_id    = $post->ID;
                                $post_date  = $post->post_date;
                                $post_title = $post->post_title;
                                $post_excerpt = $post->post_excerpt;
                                $post_url = get_permalink( $post_id );
                                
                                $imag_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'thumbnail');
                                $image_id = get_post_thumbnail_id($post_id); // Get the image ID
                                $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                $video_url = get_post_meta($post_id,"_studiare_studi_video_url",true);
                                ?>
                                
                                <div class="studi_video_podcast_playlist_item  <?php echo $vclass;?>" data-vid="<?php echo $post_id;?>" data-vholderid="<?php echo $studi_video_hoolder_id;?>">
                                    <img class='studi_vthumb' src='<?php echo $imag_url;?>' alt='<?php echo $alt_text;?>'> <i class='fal fa-play'></i><h3 class="h6" style=" font-weight: 600; margin-bottom: 0; "><?php echo $post_title; ?></h3>
                                </div>
                                
                                <?php
                                
                              $j++;  
                            }
                        echo "<span class='studi_tab_indicator'></span>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-md-8 col-xs-12'>";
                    $i = 1;
                    foreach($loop->posts as $post){
                        
                        $vstyle="";
                        
                        if($i!=1){ $vstyle="display:none;";}
                        $post_id    = $post->ID;
                        $post_date  = $post->post_date;
                        $post_title = $post->post_title;
                        $post_excerpt = $post->post_excerpt;
                        $post_url = get_permalink( $post_id );
                        
                        $imag_url = wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full');
                        
                        $video_url = get_post_meta($post_id,"_studiare_studi_video_url",true);
                        
                        ?>
                        
                        <div class="studi_video_podcast"  style="<?php echo $vstyle;?>" id='studi_video_item_<?php echo $post_id."_".$studi_video_hoolder_id;?>'>
                              
                              <div class="">
                                
                                <?php 
                                
                                if( str_contains($video_url, ".aparat.com/v") ){
                        
                                $course_video_aparat = substr($video_url, strrpos($video_url, '/') + 1);
                                $video_url = studi_get_aparat_file_link($course_video_aparat);
                                $video_url = esc_url($video_url);
                                ?>
                                <video id="studi_course_video_holder" width="100%" controls style="" poster="<?php echo esc_url( $imag_url ); ?>"  preload="none">
                                		       
                                            <source id="studi_course_video" src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
                                                 <?php echo __('مرورگر شما از HTML5 پشتیبانی نمی کند.','studiare'); ?>
                                            </video>
                                                                        
                                <?php
                                
                                }else{
                                    echo do_shortcode("[video src='$video_url' poster='$imag_url' autoplay='false' preload='none']"); 
                                }
                                
                                
                                ?>
                                
                              </div>
                        </div>
                        
                        <?php
                        
                        
                        $i++;
                        
                    }
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            ?>
            <script>
            jQuery(document).ready(function($){
                
                var el = jQuery(".studi_video_podcast_playlist_item");
                el.click(function(){
                    
                    $('video,audio').trigger('pause');
                    var vid       = jQuery(this).attr("data-vid");
                    var vholderid = jQuery(this).attr("data-vholderid");
                    
                    jQuery("#studi_vpc_holder_"+vholderid+" .studi_video_podcast").hide(); 
                    jQuery("#studi_video_item_"+vid+"_"+vholderid).show();
                    
                    jQuery("#studi_vpc_holder_"+vholderid+" .studi_video_podcast_playlist_item").removeClass("active");
                    jQuery(this).addClass("active");
                    
                    //var from_top = jQuery(".studi_tab_indicator").offset().top;
                    var parent_from_top = jQuery(this).parent().offset().top;
                    var el_from_top = jQuery(this).offset().top;
                    var el_pos = el_from_top -parent_from_top ;
                    
                    jQuery(".studi_tab_indicator").css("top",el_pos);
                    
                });
                
            });
            
            </script>
            <?php
            
        }else{
            echo __("There is nothing to show","studiare");
        }

    

    
} //end video type

      
	}
	
	protected function content_template() {
	 
    }
	
	
}