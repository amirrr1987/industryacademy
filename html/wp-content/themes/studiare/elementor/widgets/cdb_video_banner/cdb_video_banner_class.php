<?php
namespace Elementor;

class Cdb_Video_Banner extends Widget_Base {
	
	public function get_name() {
		return 'vide-banner';
	}
	
	public function get_title() {
		return  __( 'Video Banner', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-video-playlist';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		
		$this->add_control(
			'video_link',
			[
				'label' => __( 'Link', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => '',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
                'default' => 'h2',
				'options' => [
					'h2' => 'h2',
					'h3' => 'h3',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',

				],
			]
		);
        $this->add_control(
			'video_banner',
			[
				'label' => __( 'Video Banner Image', 'studiare' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image_size',
			[
				'label' => __( 'Image Size', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
                'default' => 'full',
				'options' => [
					'full'   => __( 'Full', 'studiare' ),
					'medium' => __( 'Medim', 'studiare' ),
					'thumbnail' => __( 'Thumbnail', 'studiare' ),
					'studiare-course-thumb' => __( 'Theme Default', 'studiare' ),

				],
			]
		);
        
		
		

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        //$url = $settings['link']['url'];
        $video_link = $settings['video_link'];
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];
        $title_tag = $settings['title_tag'];
        $image_size = $settings['image_size'];
        $video_banner = $settings['video_banner']['id'];
        
        $image_url = wp_get_attachment_image_src($video_banner, 'full');
        $aspect_ratio = $video_banner ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
        $img_id="sc_studi_video_img_".rand(1,6000);
        $video_id="sc_studi_video_".rand(1,6000);
        $video_info="sc_studi_video_info_".rand(1,6000);
        
        
        //since version 12.6 adding aparat compability
        if(!empty($video_link) && str_contains($video_link, 'aparat.com/v/')){
            $video_link = strstr($video_link, 'aparat.com/v/');
            $video_link = str_replace( 'aparat.com/v/','',$video_link);
            $video_link = studi_get_aparat_file_link($video_link);
        }

		
?>		
		<?php if ( !empty( $video_link ) ) : ?>
	<div class="video-banner">
        
		<div id="<?php echo $img_id;?>" class="video-banner-image" style="<?php echo esc_attr('padding-bottom: '.$aspect_ratio.';'); ?>">
            <?php if ( !empty( $video_banner ) ) : 
            $vide_image_size = $image_size?:'full';
            ?>
			    <?php echo wp_get_attachment_image($video_banner, $vide_image_size); ?>
				
            <?php endif; ?>
		</div>
		<!-- suncode video player -->
		<video id="<?php echo $video_id;?>" width="100%" controls style="display:none;" preload="none">
		       
            <source  id="source_<?php echo $video_id;?>" src="<?php echo esc_url( $video_link ); ?>" type="video/mp4">
                 <?php echo __('مرورگر شما از HTML5 پشتیبانی نمی کند.','studiare'); ?>
        </video>
        <div class="video-button ">
            <div class="studi_play_video_trigger" data-img_id="<?php echo $img_id;?>" data-video_id="<?php echo $video_id;?>" data-video_info="<?php echo $video_info;?>"><svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#fff" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path> </svg></div>
        </div>
				<!-- suncode video player -->
        <?php if ( !empty( $title ) || !empty( $subtitle) ) : ?>
            <div class="video-banner-info" id="<?php echo $video_info;?>">
                <?php if ( !empty( $title ) ) : ?>
                    <<?php echo esc_attr($title_tag);?> class="title"><?php echo esc_html( $title ); ?></<?php echo esc_attr($title_tag);?>>
                <?php endif; ?>
	            <?php if ( !empty( $subtitle ) ) : ?>
                    <span class="subtitle"><?php echo esc_html( $subtitle ); ?></span>
	            <?php endif; ?>
            </div>
        <?php endif; ?>
	</div>
<?php endif; ?>
<script>
jQuery(".studi_play_video_trigger").click(function(){
	var videoID = jQuery(this).data('video_id');
	var img_id = jQuery(this).data('img_id');
	var video_info = jQuery(this).data('video_info');
	jQuery("#"+img_id).hide();
	jQuery("#"+video_info).hide();
	jQuery(this).hide();
	jQuery("#"+videoID).show();
	 video = document.getElementById(videoID);
	 video.play();
});
</script>
		
<?php		
		 

	}
	
	protected function _content_template() {
	    
	    

    }
	
	
}