<?php
/**
 * single product layout 03
 **/
 if ( class_exists( 'Redux' ) ) {
	$course_post_share = codebean_option('course_share_story');
	$course_share_text = codebean_option('course_share_text');
} else {
	$course_post_share = false;
	$course_share_text = '';
}
 $product_layout_class = "studi_single_pro_".$product_layout;
 ?>

<div id="product-<?php the_ID(); ?>" <?php post_class($product_layout_class); ?>>

<?php
    $product_sidebar_position = codebean_option('product_sidebar_position');
    if($product_sidebar_position==1){
        $position_of_single_sidebar='screversed';
    }
    else{
          $position_of_single_sidebar='';
    }
    ?>
    <div class="container <?php echo $position_of_single_sidebar; ?>">
        
        <?php include_once "sc_pro_offer_box.php"; ?>   
        <!-- Product Top Part-->
        <div class="single_pro_top row">
            <div class="col-md-3 col-xs-12">
                <div class="desktopfreespace" style=" height: 48px; "></div>
                <div class="studi_simple_box studi_price_box">
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
                </div> 
                
                
            
            </div>
                <!-- Product Gallery -->
            <div class="col-md-6 col-xs-12 pro_gallery_holder">   
                <div class="course-single-gallery">
                    
                    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
                </div>
            </div>
            
            <div class="col-md-3 col-xs-12 ">    
                <div class="desktopfreespace" style=" height: 40px; "></div>
                    <div class="studi_share_view">
                <div class="">
                     <?php if($course_post_share==1){ ?>
                <div class="sc_studi_share_box studi_simple_box  ">
                    <span> <?php esc_html_e( 'Share', 'studiare' ); ?> :</span><?php echo do_shortcode('[sc_studiare_product_share_box]');  ?>
                </div>
                 <?php } ?>
                </div>
                <div class="">
                <div class="sccommentnumber studi_simple_box ">
                    <a href="javascript:void(0);" onclick="jQuery('html, body').animate({scrollTop: jQuery('#reviews').offset().top}, 2000);"><span class="icon"> <i class="fal fa-comments-alt"></i> </span><?php echo get_comments_number();  esc_html_e( 'Comment', 'studiare' );  ?> </a>
                    <span class="sc_studi_number_of_views"> <i class="fal fa-eye"></i><?php echo sc_studi_gt_get_post_view(); ?></span>
                </div>
                </div>
                </div> 
            <?php 
            $product_meta_info_list_short_link = codebean_option('product_meta_info_list_short_link');
            if($product_meta_info_list_short_link==1){ ?>
                <div class="">
					<div class="studi_shortlink studi_simple_box ">
							<span class="icon">
                                <i class="fal fa-link"></i>
                            </span>
							<span class="info"><?php esc_html_e( 'Short Link :', 'studiare' ); ?></span>
							<span class="scshort-link"><?php echo wp_get_shortlink(); ?><span class="sc_autocopy sc_autocopy_l3  hint--top" aria-label="<?php esc_html_e( 'Copy Link', 'studiare' ); ?>" onclick="sc_auto_copy_text('<?php echo wp_get_shortlink(); ?>','<?php _e('Copy Link', 'studiare'); ?>','<?php _e('Copied', 'studiare'); ?>')"><i class="fal fa-clone"></i></span></span>
					</div>
				
				</div>
				<?php } ?> 
                
            </div>
    <!-- middle_box bottom start -->
    <div class="studi_public_pro_data_bottom col-xs-12">
        <?php
    $product_meta_info_list_cats = codebean_option('product_meta_info_list_cats');
    if($product_meta_info_list_cats==1){
    ?>
					<?php $product_cats = get_the_terms( get_the_id(), 'product_cat');   ?>

                    <?php if ( !empty( $product_cats ) ) :  ?>
                        <div class="col-md-4 col-xs-12">
                            <div class=" studi_simple_box pro_cat_holder">
                            <span class="icon">
                                <i class="fal fa-folder-open"></i>
                            </span>
                            <span class="info">
                                <span class="label"><?php esc_html_e( 'Category', 'studiare' ); ?></span>
                                <span class="value">
                                    <?php foreach($product_cats as $product_cat):  ?>
                                       <a href="<?php echo get_term_link($product_cat); ?>"><?php echo($product_cat->name.'<span></span>'); ?></a>
                                    <?php endforeach; ?>
                                </span>
                            </span>
                        </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
                    	 <?php
    $product_meta_info_list_stars = codebean_option('product_meta_info_list_stars');
    if($product_meta_info_list_stars==1){
    ?>
				

                    <?php if ( !empty( $product_cats ) ) :  ?>
                        <div class="col-md-2 col-xs-12">
                            <div class=" studi_simple_box proRating_holder">
                             <?php 
                        /**since v 12.5 **/
                        
                        $product_stars = true;
                        if ( class_exists('Redux')) {
                            $product_stars = codebean_option("product_stars");
                        }
                        if($product_stars!=true){ ?>   
                            <span class="icon">
                               <i class="fal fa-star"></i>
                            </span>
                            <?php } ?>
                            <span class="info">
                                 <?php woocommerce_template_loop_rating(); ?>
                            </span>
                        </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
                 <?php
    $product_meta_info_list_date_published = codebean_option('product_meta_info_list_date_published');
    if($product_meta_info_list_date_published==1){
    ?>   	
                <div class="col-md-3 col-xs-12">
                <div class=" studi_simple_box">
                   <i class="fal fa-calendar-alt"></i> <span class="date_published"><?php esc_html_e( 'Published on', 'studiare' ); ?> : <?php echo get_the_date(); ?> </span>
                </div>
                </div>
          <?php } ?>  
<?php
    $product_meta_info_list_date_modified = codebean_option('product_meta_info_list_date_modified');
    if($product_meta_info_list_date_modified==1){
        $date_update = get_post_meta($post->ID,'_studiare_woo_course_date_update', true);
    ?>          
                <div class="col-md-3 col-xs-12">
                <?php if ( !empty ( $date_update )):?>   
                <div class=" studi_simple_box">
                   
                    <i class="fal fa-calendar-edit"></i> <span class="date_published"><?php esc_html_e( 'Updated on', 'studiare' ); ?> : <?php if ( !empty ( $date_update )){ echo 	date_i18n("j F Y", $date_update);} ?> </span>
                </div>
                <?php endif; ?>
                </div>
          <?php } ?>                    
                 
            
            </div>
    <!-- middle_box bottom end -->            
<div class="container">
<?php include_once "sc_post_excerpt.php"; ?>
</div>

</div>



<!-- start tab header section -->
<div class="tab studi_simple_box">
    <button id='sctdescr' class="tablinks active" onclick="studi_tab(event, 'description')"><?php esc_html_e( 'Description', 'studiare' ); ?></button>
    <button class="tablinks "       onclick="studi_tab(event, 'proinfos')"><?php esc_html_e( 'Information', 'studiare' ); ?></button>
    <?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' ){?>
    <button class="tablinks "       onclick="studi_tab(event, 'teacherTab')"><?php esc_html_e( 'About Teacher', 'studiare' ); ?></button>
    <?php } ?>
    <button class="tablinks "       onclick="studi_tab(event, 'commentstab')"><?php esc_html_e( 'Reviews', 'studiare' ); ?></button>
    <?php
    /* since version 12.5 adding support tab */
    
    $tickets_status=null;
    if ( class_exists('Redux')) {
        $tickets_status = codebean_option('tickets_status');
    } 
    if($tickets_status){
    if( class_exists('SWSS_ProductPageTab') ){
        ?>
        <button class="tablinks "       onclick="studi_tab(event, 'supporttab')"><?php echo __("Support","studiare");?></button>
        <?php
    }
    }
    ?>
    <?php
    if ( is_user_logged_in() ) {
        //since version 12.6 user can disable the tab
    $product_single_sc_show_buyers="0";
    if ( class_exists('Redux') ) {
        $product_single_sc_show_buyers = codebean_option("product_single_sc_show_buyers");
    }
    if( $product_single_sc_show_buyers !='0'){
        if( current_user_can( 'administrator' ) ){?>
            <button  class="tablinks "       onclick="studi_tab(event, 'sc_pro_buyers_list')"><?php echo __( 'Buyers List', 'studiare' );?></button>
        <?php } 
    }
    }?>
</div>
<!-- end tab header section -->
<!-- start tab content section -->
<div class="row prothree_tabholder">

<?php
    /* since version 12.5 adding support tab */
    if($tickets_status){
    if( class_exists('SWSS_ProductPageTab') ){
        ?>
        <div id="supporttab" class="tabcontent">
            <?php 
                $SWSS_ProductPageTab = new SWSS_ProductPageTab();
                $SWSS_ProductPageTab->render_ticket_product_tab(); 
            ?>
        </div> 
        <?php
    } 
    }
?> 

<?php 
    /* adding buyers list since version 12.5 */
    //since version 12.6 user can disable the tab
    $product_single_sc_show_buyers="0";
    if ( class_exists('Redux') ) {
        $product_single_sc_show_buyers = codebean_option("product_single_sc_show_buyers");
    }
    if( $product_single_sc_show_buyers !='0'){
        if( current_user_can( 'administrator' ) ){
            echo "<div id='sc_pro_buyers_list' class='tabcontent'><div class='sc_pro_buyers_list'>";
            sc_pro_buyers_list_render(); //show product buyers to admin
            echo "</div></div>";
        } 
    }
                	?>


<div id="description" class="tabcontent" style="display: block;">
    <?php include_once "sc_public_items.php"; ?>
    <?php include_once "studi_content.php"; ?>
</div>    
<div id="proinfos" class="tabcontent" >
            <div class="single_middle_info row">
            <div class="studi_public_pro_data col-md-12 col-xs-12">
                               
                 
            
            </div>
<?php 
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
            $product_meta_info_list = codebean_option('product_meta_info_list');
            if($product_meta_info_list==1){
    ?>
        <div class="product-meta-info-holders col-md-12 col-xs-12">
           <!-- <h6><?php esc_html_e('Course Features', 'studiare' ); ?></h6> -->
             <?php if($product_buyers_insingle==1){ ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo $course_buyers_text_hint;?>">
                    <div class="icon"><i class="<?php echo substr($course_buyers_text_icon, 0, 3)." ".substr($course_buyers_text_icon, 3);?>"></i></div>
                    <div class="value"><?php $count = get_post_meta($post->ID,'total_sales', true); $text = sprintf( _n( "%s $course_buyers_text", "%s $course_buyers_text", $count, 'wpdocs_textdomain' ), number_format_i18n($count));echo $text;  ?></div>
                </div>
                </div>
<?php } ?>
            <?php if ( !empty($course_language) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($course_language_hint); ?>">
                    <div class="icon"><i class="fal fa-language"></i></div>
                      <div class="value"><?php echo esc_attr(__('Language:', 'studiare').' '.$course_language); ?></div>
                </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($duration) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($duration_hint); ?>">
                    <div class="icon"><i class="fal fa-clock"></i></div>
                      <div class="value"><?php echo esc_html($duration); ?></div>
                </div>
                </div>
            <?php endif; ?>
            
             <?php if ( $sc_course_type_selector==1 ) : ?>
               <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html__( 'Course Type', 'studiare' ); ?>">
                    <div class="icon"><i class="fal fa-signal"></i></div>
                      <div class="value"><?php echo esc_html($sc_course_type_title_1); ?></div>
                </div>
                </div>
            <?php endif; ?>
            <?php if ( $sc_course_type_selector==2 ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html__( 'Course Type', 'studiare' ); ?>">
                    <div class="icon"><i class="fal fa-signal-slash"></i></div>
                      <div class="value"><?php echo esc_html($sc_course_type_title_2); ?></div>
                </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($lessons) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($lessons_hint); ?>">
                    <div class="icon"><i class="fal fa-list-alt"></i></div>
                      <div class="value"><?php echo esc_html($lessons); ?></div>
                </div>
                </div>
            <?php endif; ?>
			
			<?php if ( !empty($sc_sessions) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($sc_sessions_hint); ?>">
                    <div class="icon"><i class="fal fa-list"></i></div>
                      <div class="value"><?php echo esc_html($sc_sessions); ?></div>
                </div>
                </div>
            <?php endif; ?>

            <?php if ( !empty($skill_level) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($skill_level_hint); ?>">
                    <div class="icon"><i class="fal fa-signal-4"></i></div>
                      <div class="value"><?php echo $skill_level;//esc_attr(__('Study Level:', 'studiare') ?></div>
                </div>
                </div>
            <?php endif; ?>
						<?php if ( !empty($sc_file_type) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($sc_file_type_hint); ?>">
                    <div class="icon"><i class="<?php echo esc_html($sc_file_type_icon); ?>"></i></div>
                      <div class="value"><?php echo esc_html($sc_file_type); ?></div>
                </div>
                </div>
            <?php endif; ?>
			<?php if ( !empty($sc_file_size) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($sc_file_size_hint); ?>">
                    <div class="icon"><i class="fal fa-save"></i></div>
                      <div class="value"><?php echo esc_html($sc_file_size); ?></div>
                </div>
                </div>
            <?php endif; ?>
            <?php if ( !empty($certificate) ) : ?>
                <div class="col-md-2 col-xs-6">
                <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($certificate_hint); ?>">
                    <div class="icon"><i class="fal fa-award"></i></div>
                      <div class="value"><?php echo esc_html($certificate); ?></div>
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
       <div class="col-md-2 col-xs-6">
       <div class="meta-info-unit-box hint--top" aria-label="<?php echo esc_html($content); ?>">
                    <div class="icon"><i class="<?php echo $icon; ?>"></i></div>
                      <div class="value"><?php echo esc_html($title); ?></div>
                </div>
                </div>
<?php       
       }
    } //* end foreach; 
}    
?>
        </div>
<?php } ?>




        </div>
</div>    
<div id="commentstab" class="tabcontent" >
     <?php include_once "sc_comments.php"; ?>   
</div>    
<div id="teacherTab" class="tabcontent" >

    <!-- teacher start -->
<?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' ){
                
            sc_adding_teachers_to_layout($teacher_id);
    		sc_adding_teachers_to_layout($teacher_id_2);
    		sc_adding_teachers_to_layout($teacher_id_3);
    		sc_adding_teachers_to_layout($teacher_id_4);
                
                
} ?>

                <!-- teacher end -->
</div>    
 </div> 
<!-- end tab content section -->
        

        <div class="row">
            <div class="col-xs-12">
                
                <!-- start tags -->
                 <?php
    $product_meta_info_list_tags = codebean_option('product_meta_info_list_tags');
    if($product_meta_info_list_tags==1){
    ?>
					<?php $product_tags = get_the_terms( get_the_id(), 'product_tag');  ?>

                    <?php if ( !empty( $product_tags ) ) : ?>
                        <div class="studi_boot_pad_remover col-xs-12 mb20 protags_holder">
                            <div class=" studi_simple_box">
                            <span class="icon">
                                <i class="fal fa-tags"></i>
                            </span>
                            <span class="info">
                                <span class="label"><?php esc_html_e( 'Tags', 'studiare' ); ?></span>
                                <span class="value">
                                    <?php foreach($product_tags as $product_tag): ?>
                                        <a href="<?php echo get_term_link($product_tag); ?>"><?php echo($product_tag->name.'<span></span>'); ?></a>
                                    <?php endforeach; ?>
                                </span>
                            </span>
                        </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
                <!-- end tags -->
                
                
                	<?php sc_related_courses(); ?>
                	
               
            </div>
             
       
        </div>
       
    </div>

</div> 


<!-- Styles -->
<style>
.row.prothree_tabholder {
    margin-left: 0;
    margin-right: 0;
}
g[aria-labelledby="id-66-title"] { display: none; }
g[aria-label="Chart created using amCharts library"] { display: none; }
#chartdiv {
    direction:ltr;
  width: 100%;
  height: 200px;
}
/* Style the tab */
.tab.studi_simple_box {
    position: sticky;
    top: 60px;
    left: 0;
    right: 0;
    z-index: 10;
    overflow-x: auto;
}
.admin-bar .tab.studi_simple_box {top: 92px;}
.tab {
  overflow: hidden;
  display:flex;
  justify-content: center;background: var(--primary_color);
}
@media screen and (max-width:428px){ .tab {display: block} }
/* Style the buttons that are used to open the tab content */
.tab button {
    float: none;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    padding: 5px;
    color: #fff;
    background: transparent;
    margin: 0 5px;
    border-bottom: 1px solid transparent;
}
.Atabcontent i {
    display: inline;
}



/* Create an active/current tablink class */
.tab button.active {
    background-color: transparent;
    color: #fff;
    border-bottom: 1px solid;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding:0;margin-top:20px;margin-bottom:20px;
text-align: right;width: 100%;
}
.tabcontent ul.sc_notifs_holder li {
    border-bottom: 1px dashed gainsboro;
}
</style>


<script>
    function studi_tab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
  
  //document.getElementById(tabName).scrollIntoView({behavior: 'smooth'});
  var elementPosition = document.getElementById(tabName).offsetTop;

window.scrollTo({
  top: elementPosition - 120, //add your necessary value
  behavior: "smooth"  //Smooth transition to roll
});
}
</script>