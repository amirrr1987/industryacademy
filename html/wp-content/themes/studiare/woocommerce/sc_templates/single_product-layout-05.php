<?php
/**
 * single product layout 05
 **/
$detect_mobile = new Mobile_Detect();
if (class_exists("Redux")) {
    $course_post_share = codebean_option("course_share_story");
    $course_share_text = codebean_option("course_share_text");
    $product_meta_info_comment_number = codebean_option(
        "product_meta_info_comment_number"
    );
} else {
    $course_post_share = false;
    $course_share_text = "";
}
?>
<style>
    .studi_pro_layout_four { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 40px #f3f3f3; }
    .woocommerce-tabs.wc-tabs-wrapper {background: #fff;box-shadow: 0 0 10px gainsboro; margin: 10px 0; border-radius: 10px; padding: 0 15px 15px 15px; }
    .woocommerce-product-gallery__image { display: inline-block;margin: 10px; }
    .woocommerce-product-gallery__image a { margin: 10px; }
    .product-image-wrapper { text-align: center; }
    button.single_add_to_cart_button.button.alt { width: 100%; }
    /*.summary .price { border: 2px dashed gainsboro; padding: 10px; border-radius: 10px; font-size: 18px; display: flex; justify-content: space-between; }*/
    ul.tabs.wc-tabs { display: flex; list-style: none; padding: 10px 0; margin: 0; transform: translateY(-23px); margin: 40px auto 0 auto; justify-content: center; }
    ul.tabs.wc-tabs li a { padding: 10px; background: #fff; border-radius: 5px; margin-left: 5px;  transition: .4s; box-shadow: 0 -4px 20px gainsboro; }
    ul.tabs.wc-tabs li.active a { background: var(--primary_color); border-color: var(--primary_color); color: #fff; box-shadow: 0 0px 20px var(--primary_color); }
    .video-button { position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }
    body.admin-bar .dialog-lightbox-widget { z-index: 1400; }
    .product-image-wrapper img { border-radius: 5px; padding: 5px; box-shadow: 0 0 10px gainsboro; }
    
    @media screen and (max-width:426px){
        ul.tabs.wc-tabs { display: inline-flex; text-align: center; overflow-x: scroll; max-width: 100%; justify-content: space-between; }
        ul.tabs.wc-tabs li a { display: block; margin: 5px 0; border-radius: 6px; font-size: 12px; min-width: 126px; position: relative; line-height: 10px; top: 5px; padding: 16px; margin: 0 5px; } 
    }
</style>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

       <?php
       $product_sidebar_position = codebean_option("product_sidebar_position");
       if ($product_sidebar_position == 1) {
           $position_of_single_sidebar = "screversed";
       } else {
           $position_of_single_sidebar = "";
       }
       ?>
    	
    <div class="productintro product-info-box mb-30 col-md-12">
        <div class="productintro_col1 col-md-6">
            <div class="info header-rating"> <?php woocommerce_template_loop_rating(); ?></div>
       <?php
       $mycontent_post = get_post(get_the_ID());
       $my_excerpt = $mycontent_post->post_excerpt;
       $my_title = $mycontent_post->post_title;
       ?>
		<p class="h1"> <?php echo $my_title; ?> </p>
		 <?php if ($my_excerpt != null) { ?>
            <div class="product-single-content-lfive" id="sc-product-single-excerpt">
               <?php echo $my_excerpt; ?>
            </div>
<?php } 

            global $product;
if ( $product->is_on_sale() )  {$custom_class=""; }else{$custom_class="notOnSale";}
?>

<div class="prcbox">
    <div class="prcrightside">
	<p class="price  <?php echo $custom_class;?>">
		<span class="price-label"><?php esc_html_e('Price', 'studiare'); ?></span>
	</p>		
	</div>
	<div class="prcrleftside">
		<?php echo wp_kses_post( $product->get_price_html() ); ?>

	</div>
</div>
				<?php include_once "sc_public_items.php"; ?>
       </div>
        <div class="productintro_col2 col-md-6">
            <div class="course-single-gallery"><?php do_action(
                "woocommerce_before_single_product_summary"
            ); ?> </div> 
         </div>           
                    
    </div>
    <div class="row <?php echo $position_of_single_sidebar; ?> prolayoutfive">
        <?php if ($detect_mobile->isMobile()) { ?>
                    <div class="product-single-aside sticky-sidebar">
            <div class="theiaStickySidebar">
                    <?php include_once "sc_pro_offer_box.php"; ?>
                    
                    <div class="studi_simple_box studi_price_box">
                <?php
                do_action("woocommerce_single_product_summary"); ?>
                </div> 
                    
                    <?php include_once "sc_public_items.php"; ?>
                </div> 
                </div> 
                <?php } ?>
        <div class="product-single-main">
        
        <!-- Product Top Part-->
        <div class="product-single-top-part">

                <?php include_once "sc_main_info.php"; ?>
                <!-- Product Gallery -->
                

        </div>
       
                <div class="single_middle_info_five row">
<?php
$prefix = "_studiare_";

// Product Meta
$course_stock = get_post_meta(get_the_id(), "_stock", true);
$duration = get_post_meta(get_the_ID(), $prefix . "course_duration", true);
$lessons = get_post_meta(get_the_ID(), $prefix . "course_lesseons", true);
$skill_level = get_post_meta(get_the_ID(), $prefix . "course_level", true);
$sc_file_type = get_post_meta(get_the_ID(), $prefix . "sc_file_type", true);
$sc_file_size = get_post_meta(get_the_ID(), $prefix . "sc_file_size", true);
$sc_file_type_icon = get_post_meta(
    get_the_ID(),
    $prefix . "sc_file_type_icon",
    true
);
$certificate = get_post_meta(
    get_the_ID(),
    $prefix . "course_certificate",
    true
);
$course_language = get_post_meta(
    get_the_ID(),
    $prefix . "course_language",
    true
);
$sc_sessions = get_post_meta(get_the_ID(), $prefix . "course_sessions", true);
$sc_course_type_selector = get_post_meta(
    get_the_ID(),
    $prefix . "sc_course_type_selector",
    true
);

$course_buyers_text =
    get_post_meta(get_the_ID(), $prefix . "course_buyers_text", true) ?:
    "دانشجو";
$course_buyers_text_hint =
    get_post_meta(get_the_ID(), $prefix . "course_buyers_text_hint", true) ?:
    "تعداد دانشجویان";
$course_buyers_text_icon =
    get_post_meta(get_the_ID(), $prefix . "course_buyers_text_icon", true) ?:
    "fal fa-users";

$duration_hint =
    get_post_meta(get_the_ID(), $prefix . "course_duration_hint", true) ?:
    "مدت زمان آموزش";
$lessons_hint =
    get_post_meta(get_the_ID(), $prefix . "course_lesseons_hint", true) ?:
    "تعداد سرفصل ها";
$skill_level_hint =
    get_post_meta(get_the_ID(), $prefix . "course_level_hint", true) ?:
    "سطح آموزش";
$sc_file_type_hint =
    get_post_meta(get_the_ID(), $prefix . "sc_file_type_hint", true) ?:
    "نوع فایل";
$sc_file_size_hint =
    get_post_meta(get_the_ID(), $prefix . "sc_file_size_hint", true) ?:
    "حجم فایل";
$certificate_hint =
    get_post_meta(get_the_ID(), $prefix . "course_certificate_hint", true) ?:
    "نوع گواهی";
$course_language_hint =
    get_post_meta(get_the_ID(), $prefix . "course_language_hint", true) ?:
    "زبان آموزش";
$sc_sessions_hint =
    get_post_meta(get_the_ID(), $prefix . "course_sessions_hint", true) ?:
    "تعداد جلسات";
$sc_course_type_title_1 = get_post_meta(
    get_the_ID(),
    $prefix . "sc_course_type_title_1",
    true
);
$sc_course_type_title_2 = get_post_meta(
    get_the_ID(),
    $prefix . "sc_course_type_title_2",
    true
);
$product_buyers_insingle = codebean_option("product_buyers_insingle");

$sc_custom_entries = get_post_meta(
    get_the_ID(),
    $prefix . "metaboxjff_sections",
    true
);
$product_meta_info_list = codebean_option("product_meta_info_list");
if ($product_meta_info_list == 1) { ?>
        <div class="product-meta-info-holders col-md-12 col-xs-12">
           <!-- <h6><?php esc_html_e("Course Features", "studiare"); ?></h6> -->
            <?php if ($product_buyers_insingle == 1) { ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="<?php echo substr(
                        $course_buyers_text_icon,
                        0,
                        3
                    ) .
                        " " .
                        substr($course_buyers_text_icon, 3); ?>"></i></div>
                    <div>    
                      <div><?php echo esc_html(
                          $course_buyers_text_hint
                      ); ?></div>
                    <div class="value"><?php
                    $count = get_post_meta($post->ID, "total_sales", true);
                    $text = sprintf(
                        _n(
                            "%s $course_buyers_text",
                            "%s $course_buyers_text",
                            $count,
                            "wpdocs_textdomain"
                        ),
                        number_format_i18n($count)
                    );
                    echo $text;
                    ?></div>
                </div>
                </div>
                </div>
<?php } ?>
            <?php if (!empty($course_language)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-language"></i></div>
                        
                      <div>    
                      <div><?php echo esc_html($course_language_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $course_language
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($duration)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-clock"></i></div>
                    <div>    
                      <div><?php echo esc_html($duration_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $duration
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
            
             <?php if ($sc_course_type_selector == 1): ?>
               <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-signal"></i></div>
                    <div>    
                      <div><?php echo esc_html_e(
                          "Course Type",
                          "studiare"
                      ); ?></div>
                      <div class="value"><?php echo esc_html(
                          $sc_course_type_title_1
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
            <?php if ($sc_course_type_selector == 2): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-signal-slash"></i></div>
                    <div>    
                      <div><?php echo esc_html_e(
                          "Course Type",
                          "studiare"
                      ); ?></div>
                      <div class="value"><?php echo esc_html(
                          $sc_course_type_title_2
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($lessons)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-list-alt"></i></div>
                    <div>    
                      <div><?php echo esc_html($lessons_hint); ?></div>
                      <div class="value"><?php echo esc_html($lessons); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
			
			<?php if (!empty($sc_sessions)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-list"></i></div>
                    <div>    
                      <div><?php echo esc_html($sc_sessions_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $sc_sessions
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($skill_level)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-signal-4"></i></div>
                    <div>    
                      <div><?php echo esc_html($skill_level_hint); ?></div>
                      <div class="value"><?php echo $skill_level;
                //esc_attr(__('Study Level:', 'studiare')
                ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
						<?php if (!empty($sc_file_type)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="<?php echo esc_html(
                        $sc_file_type_icon
                    ); ?>"></i></div>
                    <div>    
                      <div><?php echo esc_html($sc_file_type_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $sc_file_type
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
			<?php if (!empty($sc_file_size)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-save"></i></div>
                    <div>    
                      <div><?php echo esc_html($sc_file_size_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $sc_file_size
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($certificate)): ?>
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-award"></i></div>
                    <div>    
                      <div><?php echo esc_html($certificate_hint); ?></div>
                      <div class="value"><?php echo esc_html(
                          $certificate
                      ); ?></div>
                      </div>
                </div>
                </div>
            <?php endif; ?>
            <?php
    $product_meta_info_list_date_published = codebean_option('product_meta_info_list_date_published');
    if($product_meta_info_list_date_published==1){
    ?>   	
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                   <div> 
                   <div><?php esc_html_e( 'Published on', 'studiare' ); ?></div>
                      <div class="value"><?php echo get_the_date(); ?></div>
                      </div>
                </div>
                </div>
                 <?php } ?> 
            <?php
    $product_meta_info_list_date_modified = codebean_option('product_meta_info_list_date_modified');
    if($product_meta_info_list_date_modified==1){
        $date_update = get_post_meta($post->ID,'_studiare_woo_course_date_update', true);
    ?>    
    
                <?php if ( !empty ( $date_update )):?>   
                <div class="col-md-4 col-xs-6">
                <div class="meta-info-unit-box">
                    <div class="icon"><i class="fal fa-calendar-edit"></i></div>
                   <div>    
                      <div><?php esc_html_e( 'Updated on', 'studiare' ); ?></div>
                      <div class="value"><?php if ( !empty ( $date_update )){ echo 	date_i18n("j F Y", $date_update);} ?></div>
                      </div>
                </div>
                 </div>
                <?php endif; ?>
               
          <?php } ?>     
<?php if ($sc_custom_entries) {
    foreach ((array) $sc_custom_entries as $key => $entry) {
        $title = $content = "";
        if (isset($entry[$prefix . "sc_studi_custom_title_1"])) {
            $title = esc_html($entry[$prefix . "sc_studi_custom_title_1"]);
        }
        if (isset($entry[$prefix . "sc_studi_custom_text_1"])) {
            $content = $entry[$prefix . "sc_studi_custom_text_1"];
        }
        if (isset($entry[$prefix . "sc_studi_custom_icon_1"])) {
            $icon_raw = $entry[$prefix . "sc_studi_custom_icon_1"];
            $icon = substr($icon_raw, 0, 3) . " " . substr($icon_raw, 3);
        } else {
            $icon = "fal fa-list";
        } //$content = $entry[ $prefix . 'sc_studi_custom_text_1' ];
        if (!empty($title)) { ?>
       <div class="col-md-4 col-xs-6">
       <div class="meta-info-unit-box">
                    <div class="icon"><i class="<?php echo $icon; ?>"></i></div>
                    <div>    
                      <div><?php echo esc_html($content); ?></div>
                      <div class="value"><?php echo esc_html($title); ?></div>
                      </div>
                </div>
                </div>
<?php }
    }
    //* end foreach;
} ?>
        </div>
<?php }
?>
</div>
        <?php
        global $product;
        $product_single_sc_message = codebean_option(
            "product_single_sc_message"
        );
        $sale_price = $product->get_sale_price();
        $regular_price = $product->get_regular_price();
        if (
            ($product_single_sc_message == 1 && !empty($regular_price)) ||
            ($product_single_sc_message == 1 && $sale_price === "0")
        ) {
            //since version 12.6
            $sc_sections_off = [];
            $prefix = "_studiare_";
            $sc_sections_off = get_post_meta(
                get_the_ID(),
                $prefix . "sc_sections_off",
                false
            );
            if (
                !in_array(
                    "discount_message",

                    $sc_sections_off
                )
            ) { ?>
						<div class="sc-single-product-message">
						<span class="sc-amazing-offer-final-price-icon"> <i class="fal fa-gift"></i> </span>
						<?php $product_single_sc_message_0 = codebean_option(
          "product_single_sc_message_0"
      ); ?>
						<?php echo do_shortcode($product_single_sc_message_0); ?>

						</div>
					<?php }
        }
        ?>
        <?php
        $product = wc_get_product(get_the_ID());
        add_action(
            "woocommerce_single_product_summary_bysuncode",
            "woocommerce_output_product_data_tabs",
            80
        );
        do_action("woocommerce_single_product_summary_bysuncode");
        ?>
        
        <?php
        $product_meta_info_teacher_profile = codebean_option('product_meta_info_teacher_profile');
        if($product_meta_info_teacher_profile==1){?>
        <!-- teacher start -->
        
                <?php if (!empty($teacher_id) && $teacher_id != "no-teacher") {
                    sc_adding_teachers_to_layout($teacher_id);
                    sc_adding_teachers_to_layout($teacher_id_2);
                    sc_adding_teachers_to_layout($teacher_id_3);
                    sc_adding_teachers_to_layout($teacher_id_4);
                } }
    ?>
               
        
        <?php sc_related_courses(); ?>
         <!-- Product Review -->
        
        </div>
        <div class="product-single-aside sticky-sidebar">
            <div class="theiaStickySidebar">
                <?php if ($detect_mobile->isMobile()) {
                } else {
                     ?>
                    <?php include_once "sc_pro_offer_box.php"; ?>
                    
                    <div class="studi_simple_box studi_price_box">

                    <?php do_action("woocommerce_single_product_summary"); ?>
                </div> 
                 
                   
                
                <?php
                } ?>
            </div>
        </div> 
       
    </div>

</div> 