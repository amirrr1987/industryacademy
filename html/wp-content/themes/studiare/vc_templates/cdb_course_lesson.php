<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}



extract( $atts );
/* get toast title and message */
$login_toast_title = codebean_option('login_toast_title');
$login_toast_message = codebean_option('login_toast_message');
$bought_toast_title = codebean_option('bought_toast_title');
$bought_toast_message = codebean_option('bought_toast_message');



// Get current user and check if he bought current course
$bought_course = false;
$current_user = wp_get_current_user();
if( !empty($current_user->user_email) and !empty($current_user->ID) ) {
	if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, get_the_id() ) ) {
		$bought_course = true;
	}
}

$isbought = studi_has_bought_items($current_user->ID,get_the_id());
	if($isbought =="true"){
		$bought_course = true;
	}
?>
<div class="course-panel-heading">
    <div class="panel-heading-left">
	    <?php if(!empty($icon)): ?>
            <div class="course-lesson-icon">
                <i class="<?php echo esc_attr($icon); ?>"></i>
            </div>
	    <?php endif; ?>
	    <?php if(!empty($title)): ?>
            <div class="title">
                <h4><?php echo esc_attr($title); ?>
                    <?php if(!empty($badge) and $badge != 'no_badge'): ?>
                        <span class="badge-item <?php echo esc_attr($badge); ?>"><?php  echo add_class_value_in_any_lang($badge); ?></span>
	                <?php endif; ?>
                </h4>
                <?php if(!empty($subtitle)) : ?><p class="subtitle"><?php echo esc_attr($subtitle); ?></p><?php endif; ?>
            </div>

        <?php endif; ?>
    </div>

    <?php if ( ( !empty( $preview_video ) ) || !empty( $private_lesson ) ) : ?>
        <div class="panel-heading-right">
            <?php if(!empty($preview_video)): ?>
                <a class="video-lesson-preview preview-button" href="<?php echo esc_url( $preview_video ); ?>"><i class="fa fa-play-circle"></i><?php esc_html_e( 'Preview', 'studiare' ); ?></a>
            <?php endif; ?>
	        <?php if(!empty($private_lesson)): ?>
                <div class="private-lesson"><i class="fa fa-lock"></i><span><?php esc_html_e('Private', 'studiare'); ?></span></div>
	        <?php endif; ?>
			
        </div>
    <?php endif; ?>
	<?php 
	if($sc_pls){$sc_protect_link_status = $sc_pls;}else{$sc_protect_link_status = "false";}
	echo generate_dl_section($atts,get_the_ID(),$private_lesson,$bought_course,$login_toast_title,$login_toast_message,$bought_toast_title,$bought_toast_message,$sc_protect_link_status); ?>
</div>

<?php if(!empty($content)): ?>
    <div class="panel-content">
        <div class="panel-content-inner">
	        <?php
	        // Check for private content only on course page
	        if(!empty($private_lesson) and $private_lesson){
		        if($bought_course) {
		            echo do_shortcode( $content );
		           
		            
		        } else {
			        // placeholder
			        if(!empty($private_placeholder)) {
				        echo balancetags($private_placeholder);
			        } else {
				        esc_html_e( 'This lesson is private, for full access to all lessons you need to buy this course.', 'studiare' );
			        }
		        }
	        } else {
		        echo do_shortcode( $content );
		        
	        }
	        
	        ?>
        </div>
    </div>
<?php endif; ?>