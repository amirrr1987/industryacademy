<?php
/**
 * Nuovo WordPress Theme
 *
 * Codebean.co
 * www.codebean.co
 */

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

$image_url = wp_get_attachment_image_src($video_banner, 'full');
$aspect_ratio = $video_banner ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
$img_id="sc_studi_video_img_".rand(1,6000);
$video_id="sc_studi_video_".rand(1,6000);
$video_info="sc_studi_video_info_".rand(1,6000);
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
            <div class="studi_play_video_trigger" data-img_id="<?php echo $img_id;?>" data-video_id="<?php echo $video_id;?>" data-video_info="<?php echo $video_info;?>"><i class="fad fa-play-circle"></i></div>
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