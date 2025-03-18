<?php
/**
 * single product layout 04
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
<style>
    .studi_pro_layout_four { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 40px #f3f3f3; }
    .woocommerce-tabs.wc-tabs-wrapper { box-shadow: 0 0 10px gainsboro; margin: 10px 0; border-radius: 10px; padding: 0 15px 15px 15px; }
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
<div id="product-<?php the_ID(); ?>" <?php post_class( 'studi_pro_layout_four' ); ?>>
    
    <?php 	include_once 'sc_pro_offer_box.php'; ?>
    <div class="row studi_pro_layout_four_row">
	<?php

	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * 
	 */
	add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 ); 
	add_filter( 'woocommerce_single_product_image_gallery_classes', function( $classes ) {
    $classes[] = 'col-md-8';
    $classes[] = 'col-xs-12';

    return $classes;
} );
   
	//add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_thumbnails', 20 );
	do_action( 'woocommerce_before_single_product_summary' );
	?>
    
	
	<div class="summary entry-summary col-md-4 col-xs-12">
		<?php
		 
		include_once 'sc_main_info.php';
		
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		 add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',0);
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	</div>    
	
	<?php
	?>
	    <div class="row studi_topfourbox">
	    <div class="col-md-6 col-xs-12 ">
		<div class="sc_studi_info_box   ">
		    
            <?php if($course_post_share==1){echo do_shortcode('[sc_studiare_product_share_box]'); esc_html_e( 'Share', 'studiare' ); ?>  <?php } ?>
            <a class="sc_studi_number_of_views" href="#tab-reviews"  rel="nofollow"><span class="icon"> <i class="fal fa-comments-alt"></i> </span><?php echo get_comments_number(); esc_html_e( 'Comment', 'studiare' ); ?> </a>
                    <span class="sc_studi_number_of_views"> <i class="fal fa-eye"></i><?php echo sc_studi_gt_get_post_view(); ?></span>
        </div>
        </div>
        <div class="col-md-6 col-xs-12 ">
        <div class="studi_shortlink  ">
							<span class="icon">
                                <i class="fal fa-link"></i>
                            </span>
							<span class="info"><?php esc_html_e( 'Short Link :', 'studiare' ); ?></span>
							<!-- The text field -->


<!-- The button used to copy the text -->

							<span class="scshort-link"><?php echo wp_get_shortlink(); ?><span class="sc_autocopy hint--top" aria-label="<?php esc_html_e( 'Copy Link', 'studiare' ); ?>" onclick="sc_auto_copy_text('<?php echo wp_get_shortlink(); ?>','<?php _e('Copy Link', 'studiare'); ?>','<?php _e('Copied', 'studiare'); ?>')"><i class="fal fa-clone"></i></span></span>
					</div>
					</div>
				</div>

<!-- start tags -->
                 <?php
    $product_meta_info_list_tags = codebean_option('product_meta_info_list_tags');
    if($product_meta_info_list_tags==1){
    ?>
					<?php $product_tags = get_the_terms( get_the_id(), 'product_tag');  ?>

                    <?php if ( !empty( $product_tags ) ) : ?>
                        <div class="  protags_holder">
                            <div class=" studi_simple_box">
                            <span class="icon">
                                <i class="fal fa-tags"></i>
                            </span>
                            <span class="info">
                                <span class="label"><?php esc_html_e( 'Tags', 'studiare' ); ?></span>
                                <span class="value">
                                    <?php foreach($product_tags as $product_tag): ?>
                                        <a href="<?php echo get_term_link($product_tag); ?>" rel="nofollow"><?php echo($product_tag->name.'<span></span>'); ?></a>
                                    <?php endforeach; ?>
                                </span>
                            </span>
                        </div>
                        </div>
                    <?php endif; ?>
                    	<?php } ?>
                <!-- end tags -->
				
		<?php
	include_once 'sc_public_items.php';
	
	add_action( 'woocommerce_single_product_summary_bysuncode', 'woocommerce_output_product_data_tabs', 80 );
	do_action( 'woocommerce_single_product_summary_bysuncode' );
	?>

	<?php
	sc_related_courses();
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	
    //add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	do_action( 'woocommerce_after_single_product_summary' );
	?>
	
</div>
