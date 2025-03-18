<?php
/**
 * Template for Single Product on Sie
 */


if ( class_exists( 'Redux' ) ) {
	$course_post_share = codebean_option('course_share_story');
	$course_share_text = codebean_option('course_share_text');
} else {
	$course_post_share = false;
	$course_share_text = '';
}

$prefix = '_studiare_';

// Product Meta
$course_stock = get_post_meta(get_the_id(), '_stock', true);
$duration = get_post_meta(get_the_ID(), $prefix . 'course_duration', true);
$lessons = get_post_meta(get_the_ID(), $prefix . 'course_lesseons', true);
$skill_level = get_post_meta(get_the_ID(), $prefix . 'course_level', true);
$sc_file_type = get_post_meta(get_the_ID(), $prefix . 'sc_file_type', true);
$sc_file_size = get_post_meta(get_the_ID(), $prefix . 'sc_file_size', true);
$sc_file_type_icon = get_post_meta(get_the_ID(), $prefix . 'sc_file_type_icon', true);
$certificate = get_post_meta(get_the_ID(), $prefix . 'course_certificate', true);
$course_language = get_post_meta(get_the_ID(), $prefix . 'course_language', true);
$sc_sessions = get_post_meta(get_the_ID(), $prefix . 'course_sessions', true);
$sc_course_type_selector = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_selector', true);

$course_buyers_text      = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text', true)?:"دانشجو";
$course_buyers_text_hint = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text_hint', true)?:"تعداد دانشجویان";
$course_buyers_text_icon = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text_icon', true)?:"fal fa-users";

$duration_hint = get_post_meta(get_the_ID(), $prefix . 'course_duration_hint', true)?:"مدت زمان آموزش";
$lessons_hint = get_post_meta(get_the_ID(), $prefix . 'course_lesseons_hint', true)?:"تعداد سرفصل ها";
$skill_level_hint = get_post_meta(get_the_ID(), $prefix . 'course_level_hint', true)?:"سطح آموزش";
$sc_file_type_hint = get_post_meta(get_the_ID(), $prefix . 'sc_file_type_hint', true)?:"نوع فایل";
$sc_file_size_hint = get_post_meta(get_the_ID(), $prefix . 'sc_file_size_hint', true)?:"حجم فایل";
$certificate_hint = get_post_meta(get_the_ID(), $prefix . 'course_certificate_hint', true)?:"نوع گواهی";
$course_language_hint = get_post_meta(get_the_ID(), $prefix . 'course_language_hint', true)?:"زبان آموزش";
$sc_sessions_hint = get_post_meta(get_the_ID(), $prefix . 'course_sessions_hint', true)?:"تعداد جلسات";
$sc_course_type_title_1 = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_title_1', true);
$sc_course_type_title_2 = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_title_2', true);

$product_buyers_insingle =codebean_option('product_buyers_insingle');


$sc_custom_entries = get_post_meta(get_the_ID() , $prefix . 'metaboxjff_sections', true);


 
?>
<div class="product-info-box">

	<?php
	/**
	 * woocommerce_single_product_summary hook
	 *
	 * @hooked woocommerce_template_single_title - 5 Removed
	 * @hooked woocommerce_template_single_rating - 10 Removed
	 * @hooked woocommerce_template_single_price - 10
	 * @hooked woocommerce_template_single_excerpt - 20 Removed
	 * @hooked woocommerce_template_single_add_to_cart - 30
	 * @hooked woocommerce_template_single_meta - 40 Removed
	 * @hooked woocommerce_template_single_sharing - 50 Removed
	 */
	do_action( 'woocommerce_single_product_summary' );
	?>

    <?php //if (!empty( $course_stock ) || !empty( $course_language ) || !empty( $duration) || !empty( $lessons ) || !empty( $skill_level ) || !empty( $certificate ) ) : ?>
    <?php
    $product_meta_info_list = codebean_option('product_meta_info_list');
    if($product_meta_info_list==1){
    ?>
        <div class="product-meta-info-list">
           <!-- <h6><?php esc_html_e('Course Features', 'studiare' ); ?></h6> -->
           <?php 
           if($product_buyers_insingle==1){
           ?>
                <div class="meta-info-unit sc_sellscount">
                    <div class="icon"><i class="<?php echo substr($course_buyers_text_icon, 0, 3)." ".substr($course_buyers_text_icon, 3);?>"></i></div>
                    <div class="sc-meta-holder">
                    <div class="sc-meta-item"><?php echo $course_buyers_text_hint;?></div><div class="value"><?php $count = get_post_meta($post->ID,'total_sales', true); $text = sprintf( _n( "%s $course_buyers_text", "%s $course_buyers_text", $count, 'wpdocs_textdomain' ), number_format_i18n($count));echo $text;  ?></div>
                    </div>
                </div>
            <?php } ?>
            <?php if ( !empty($course_language) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-language"></i></div>
                    <div class="sc-meta-holder">
                      <div class="sc-meta-item"><?php echo esc_html($course_language_hint); ?></div><div class="value"><?php echo esc_html($course_language); ?></div>
                      </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($duration) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-clock"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($duration_hint); ?></div> <div class="value"><?php echo esc_html($duration); ?></div>
                     </div>
                </div>
            <?php endif; ?>
            
             <?php if ( $sc_course_type_selector==1 ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-signal"></i></div>
                    <div class="sc-meta-holder">
                      <div class="sc-meta-item"><?php echo esc_html_e('Course Type', 'studiare' ); ?></div><div class="value"><?php echo esc_html($sc_course_type_title_1); ?></div>
                      </div>
                </div>
            <?php endif; ?>
            <?php if ( $sc_course_type_selector==2 ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-signal-slash"></i></div>
                    <div class="sc-meta-holder">
                      <div class="sc-meta-item"><?php echo esc_html_e('Course Type', 'studiare' ); ?></div><div class="value"><?php echo esc_html($sc_course_type_title_2); ?></div>
                      </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($lessons) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-list"></i></div>
                    <div class="sc-meta-holder">
                      <div class="sc-meta-item"><?php echo esc_html($lessons_hint); ?></div><div class="value"><?php echo esc_html($lessons); ?></div>
                      </div>
                </div>
            <?php endif; ?>
			
			<?php if ( !empty($sc_sessions) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-list"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($sc_sessions_hint); ?></div> <div class="value" ><?php echo esc_html($sc_sessions); ?></div>
                     </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($skill_level) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-signal-4"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($skill_level_hint); ?></div><div class="value"><?php echo esc_html($skill_level); ?></div>
                     </div>
                </div>
            <?php endif; ?>
						<?php if ( !empty($sc_file_type) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="<?php echo esc_html($sc_file_type_icon); ?>"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($sc_file_type_hint); ?></div> <div class="value"><?php echo esc_html($sc_file_type); ?></div>
                     </div>
                </div>
            <?php endif; ?>
			<?php if ( !empty($sc_file_size) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-save"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($sc_file_size_hint); ?></div><div class="value"><?php echo esc_html($sc_file_size); ?></div>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ( !empty($certificate) ) : ?>
                <div class="meta-info-unit">
                    <div class="icon"><i class="fal fa-award"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($certificate_hint); ?></div><div class="value"><?php echo esc_html($certificate); ?></div>
                      </div>
                </div>
            <?php endif; ?>
<?php

if($sc_custom_entries){
    

foreach((array)$sc_custom_entries as $key => $entry) {
    
    
        $title = $content = '';
        
		if ( isset( $entry[ $prefix . 'sc_studi_custom_title_1' ] ) ) 

		        $title = esc_html( $entry[ $prefix . 'sc_studi_custom_title_1' ] );
		        
		        		        
		if ( isset( $entry[ $prefix .'sc_studi_custom_text_1' ] ) )
				        
		        $content = $entry[ $prefix . 'sc_studi_custom_text_1' ];
		        
		if ( isset( $entry[ $prefix .'sc_studi_custom_icon_1' ] ) ){
		     $icon_raw = $entry[ $prefix . 'sc_studi_custom_icon_1' ];
		     $icon = substr($icon_raw, 0, 3)." ".substr($icon_raw, 3);
		}else{
		     $icon = "fal fa-list";
		}
				        
		        //$content = $entry[ $prefix . 'sc_studi_custom_text_1' ];
		        
		        
       if ( !empty($title) ) {
?>
       <div class="meta-info-unit">
                    <div class="icon"><i class="<?php echo $icon; ?>"></i></div>
                    <div class="sc-meta-holder">
                     <div class="sc-meta-item"><?php echo esc_html($content); ?></div> <div class="value"><?php echo esc_html($title); ?></div>
                     </div>
                </div>
<?php       
       }
    } //* end foreach; 
}    
?>
        </div>
        <?php } ?>
    <?php //endif;  //end main if ?>

</div>
 <?php
    $product_meta_info_comment_number = codebean_option('product_meta_info_comment_number');
    if($product_meta_info_comment_number==1){
    ?>
<div class="product-info-box">
<div class="sccommentnumber">

<a href="javascript:void(0);" onclick="jQuery('html, body').animate({scrollTop: jQuery('#reviews').offset().top}, 2000);"><span class="icon"> <i class="fal fa-comments-alt"></i> </span> <?php echo get_comments_number();  esc_html_e( 'Comment', 'studiare' );  ?></a>

<span class="sc_studi_number_of_views"> <i class="fal fa-eye"></i><?php echo sc_studi_gt_get_post_view(); ?></span>
</div>
</div>
<?php } ?>

 <?php
    //$product_meta_info_comment_number = codebean_option('product_meta_info_comment_number');
    if($course_post_share==1){
    ?>
<div class="product-info-box sc_stud_share_box_holder">
<div class="sc_stud_share_box">
<?php 
echo do_shortcode('[sc_studiare_product_share_box]'); 
?>
</div>
</div>
<?php } ?>
    <?php
    $product_meta_info_list_2 = codebean_option('product_meta_info_list_2');
    if($product_meta_info_list_2==1){
    ?>
	<div class="product-info-box">
	                 <?php
    $product_meta_info_list_date_published = codebean_option('product_meta_info_list_date_published');
    if($product_meta_info_list_date_published==1){
    ?>
						<div class="course-rating before-gallery-unit">
					 <div class="icon">
                                <i class="fal fa-calendar-alt"></i>
                            </div>
								<span class="date_published"><?php esc_html_e( 'Published on', 'studiare' ); ?> :
								<?php echo get_the_date(); ?>
								</span>
								</div>
								<?php } ?>
								 <?php
    $product_meta_info_list_date_modified = codebean_option('product_meta_info_list_date_modified');
    if($product_meta_info_list_date_modified==1){
    ?>


								<?php
								$date_update = get_post_meta($post->ID,'_studiare_woo_course_date_update', true);
								if ($date_update!=null){ ?>
								<div class="course-rating before-gallery-unit">
					 <div class="icon">
                              <i class="fal fa-calendar-edit"></i>
                            </div>
								    <span class="date_published"><?php esc_html_e( 'Updated on', 'studiare' ); ?> :
								    <?php echo 	date_i18n("j F Y", $date_update); ?>
								</span>
									</div>
								<?php
								}
								?>

								<?php } ?>
					<?php
    $product_meta_info_list_stars = codebean_option('product_meta_info_list_stars');
    if($product_meta_info_list_stars==1){
    ?>
					<div class="course-rating before-gallery-unit">
					 <div class="icon">
                                <i class="fal fa-star"></i>
                            </div>
							<div class="info"><?php esc_html_e( 'User Ratings', 'studiare' ); ?> :</div>
                            <?php woocommerce_template_loop_rating(); ?>
                        </div>
                        	<?php } ?>
                                            <?php
    $product_meta_info_list_cats = codebean_option('product_meta_info_list_cats');
    if($product_meta_info_list_cats==1){
    ?>
					<?php $product_cats = get_the_terms( get_the_id(), 'product_cat');  ?>

                    <?php if ( !empty( $product_cats ) ) : ?>
                        <div class="course-category before-gallery-unit">
                            <div class="icon">
                                <i class="fal fa-folder-open"></i>
                            </div>
                            <div class="info">
                                <span class="label"><?php esc_html_e( 'Category', 'studiare' ); ?></span>
                                <div class="value">
                                    <?php foreach($product_cats as $product_cat): ?>
                                        <a href="<?php echo get_term_link($product_cat); ?>"><?php echo($product_cat->name.'<span>/</span>'); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
                    <?php
    $product_meta_info_list_tags = codebean_option('product_meta_info_list_tags');
    if($product_meta_info_list_tags==1){
    ?>
					<?php $product_tags = get_the_terms( get_the_id(), 'product_tag');  ?>

                    <?php if ( !empty( $product_tags ) ) : ?>
                        <div class="course-category before-gallery-unit">
                            <div class="icon">
                                <i class="fal fa-tags"></i>
                            </div>
                            <div class="info">
                                <span class="label"><?php esc_html_e( 'Tags', 'studiare' ); ?></span>
                                <div class="value">
                                    <?php foreach($product_tags as $product_tag): ?>
                                        <a href="<?php echo get_term_link($product_tag); ?>"><?php echo($product_tag->name.'<span>/</span>'); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
					<?php
    $product_meta_info_list_short_link = codebean_option('product_meta_info_list_short_link');
    if($product_meta_info_list_short_link==1){
    ?>
					<div class="scshortlink">
							<div class="icon">
                                <i class="fal fa-link"></i>
                            </div>
							<div class="info"><?php esc_html_e( 'Short Link :', 'studiare' ); ?></div>
					</div>
				<div class="scshort-link"><?php echo wp_get_shortlink(); ?><span class="sc_autocopy hint--top" aria-label="<?php esc_html_e( 'Copy Link', 'studiare' ); ?>" onclick="sc_auto_copy_text('<?php echo wp_get_shortlink(); ?>','<?php _e('Copy Link', 'studiare'); ?>','<?php _e('Copied', 'studiare'); ?>')"><i class="fal fa-clone"></i></span></div>
				<?php } ?>
				</div>
				<?php } ?>
				<?php
				/**
				 * The Sidebar containing the main widget areas.
				 *
				 */
				if ( ! is_active_sidebar( 'singleshop' ) ) {
					return;
				}
				?>

				<div class="product-info-box singleshop">
					<div class="sidebar-widgets-wrapper">
						<?php if ( ! dynamic_sidebar( 'singleshop' ) ) :
							dynamic_sidebar( 'singleshop' );
						endif; ?>
					</div>
				</div>
