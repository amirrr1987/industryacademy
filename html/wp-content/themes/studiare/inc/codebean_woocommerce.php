<?php
/**
 * Codebean WooCommerce functions, actons and filters
 */


//add lessons since version 12.8

function add_shortcode_to_end_of_content($content) {
    
    if (is_singular('product') && is_main_query()) {
        $prefix = '_studiare_';
        $view_lessons_end_of_content = get_post_meta(get_the_ID(), $prefix . 'view_lessons_end_of_content', true);

        if (isset($view_lessons_end_of_content) && $view_lessons_end_of_content == 'on') {
            $shortcode = '[sc_get_lessons_for_product]';
            $content .= do_shortcode($shortcode);
        }
    }
    return $content;
}
add_filter('the_content', 'add_shortcode_to_end_of_content');

//add_action("woocommerce_before_single_product","sc_get_lessons_for_product");
add_shortcode("sc_get_lessons_for_product","sc_get_lessons_for_product");
function sc_get_lessons_for_product($post_id){
    ob_start();
    if(empty($post_id)){
        $post_id = get_the_ID();
    }
    $lessons_group =  get_post_meta($post_id, 'lessons_group', true);

    foreach($lessons_group as $section){
        
        $title                 = $section['title'];
        $list_open_situ        = isset($section['list_open_situ'])?$section['list_open_situ']:null;
        $section_number = isset($section['section_number']) ? $section['section_number'] : '';
        $section_num_title = isset($section['section_num_title']) ? $section['section_num_title'] : '';
        $list_has_section_num = isset($section['list_has_section_num']) ? $section['list_has_section_num'] : false; // Assuming false as a default
        
        $lessons = $section['lessons_list'];
            
            
                
            
            $showicon  = isset($section['showicon'])?$section['showicon']:null;
    
            $css_class = "course-section";
            $rand_id = rand();
            /* open close by default */
            if($list_open_situ=='on'){$openclass = " active_tab_by_suncode";}else{$openclass = " ";}
            ?>
            <div class="<?php echo esc_attr( $css_class ) ;  ?>">
            	<?php if(!empty($title)): ?>
                  <div data-id="<?php echo $rand_id;?>" class="sc-course-lesson-toggle-wrapper">
                       <h5 class="course-section-title">
                           <?php if($list_has_section_num=='on') { ?>
                           <span class="chapterholder">
                           <?php if(!empty($section_num_title)): ?><span class="scchapturetitle"><?php echo $section_num_title ?></span><?php endif; ?>
                           <?php if(!empty($section_number)): ?><span class="scchapturenumber"><?php echo $section_number ?></span><?php endif; ?>
                           </span>
                           <?php } ?>
                           <?php if($showicon=='on'): ?><i class="fal fa-ellipsis-h-alt"><?php endif; ?></i> <?php echo esc_attr($title); ?></h5>
            			<div class="sc-course-lesson-toggle"><i class="fad fa-chevron-down"></i></div></div>
            	<?php endif; ?>
                <div class="panel-group" style="display:none;">
                    
 <?php
if ( $lessons ) {
    foreach ( $lessons as $lesson ) {
        $item = get_post_meta($lesson, 'lesson_data', true);
        if (!$item) { break; }
        
        // Get lesson properties
        $icon = isset($item[0]['icon']) ? $item[0]['icon'] : null;
        $title = isset($item[0]['lesson_title']) ? $item[0]['lesson_title'] : null;
        $subtitle = isset($item[0]['lesson_subtitle']) ? $item[0]['lesson_subtitle'] : null;
        $badge = isset($item[0]['badge']) ? $item[0]['badge'] : null;
        $preview_video = isset($item[0]['preview_video']) ? $item[0]['preview_video'] : '';
        $private_lesson = isset($item[0]['private_lesson']) ? $item[0]['private_lesson'] : 'lesson_protected'; // Use 'lesson_protected' as the default value
        $sc_pls = isset($item[0]['sc_pls']) ? $item[0]['sc_pls'] : null;
        $content_main = get_post_field('post_content', $lesson);
        $content = wpautop($content_main);
        
        $atts['sc_download_file'] = isset($item[0]['sc_download_file']) ? $item[0]['sc_download_file'] : '';
        $atts['sc_download_access'] = isset($item[0]['sc_download_access']) ? $item[0]['sc_download_access'] : '';
        
        $lesson_video = isset($item[0]['lesson_video']) ? $item[0]['lesson_video'] : null;
        $lesson_audio = isset($item[0]['lesson_audio']) ? $item[0]['lesson_audio'] : null;
        
        // Toast messages and placeholder for private lessons
        $login_toast_title = codebean_option('login_toast_title');
        $login_toast_message = codebean_option('login_toast_message');
        $bought_toast_title = codebean_option('bought_toast_title');
        $bought_toast_message = codebean_option('bought_toast_message');
        $private_placeholder = codebean_option('private_lesson_message');
        $login_placeholder = codebean_option('login_lesson_message'); // Add this to support the new message for lesson_free_users
        
        // Check if the current user has purchased the course
        $bought_course = false;
        $current_user = wp_get_current_user();
        if (!empty($current_user->user_email) && !empty($current_user->ID)) {
            if (wc_customer_bought_product($current_user->user_email, $current_user->ID, get_the_id())) {
                $bought_course = true;
            }
        }
        
        $isbought = studi_has_bought_items($current_user->ID, get_the_id());
        if ($isbought == "true") {
            $bought_course = true;
        }
        
        ?>
        
        <div class="course-panel-heading">
            <div class="panel-heading-left">
                <?php if (!empty($icon)) {
                    $icon = substr_replace($icon, " ", 3, -strlen($icon));
                    ?>
                    <div class="course-lesson-icon">
                        <?php echo "<i class='$icon'></i>"; ?>
                    </div>
                <?php } ?>
                <?php if (!empty($title) || !empty($subtitle)) : ?>
                    <div class="title">
                        <h4><?php echo esc_attr($title); ?>
                            <?php if (!empty($badge) && $badge != 'no_badge') : ?>
                                <span class="badge-item <?php echo esc_attr($badge); ?>"><?php echo add_class_value_in_any_lang($badge); ?></span>
                            <?php endif; ?>
                        </h4>
                        <?php if (!empty($subtitle)) : ?><p class="subtitle"><?php echo esc_attr($subtitle); ?></p><?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($preview_video) || !empty($private_lesson) || !empty($sc_pls)) : ?>
            <?php 
                        //check if video from aparat
                        if( str_contains($preview_video, ".aparat.com/v") ){
                            
                            $course_video_aparat = substr($preview_video, strrpos($preview_video, '/') + 1);
                            $preview_video = studi_get_aparat_file_link($course_video_aparat);
                        }
                        ?>
                <div class="panel-heading-right">
                    <?php if (!empty($preview_video)) : ?>
                        <a class="video-lesson-preview preview-button" href="<?php echo esc_url($preview_video); ?>"><i class="fa fa-play-circle"></i><?php esc_html_e('Preview', 'studiare'); ?></a>
                    <?php endif; ?>
                    <?php if ($private_lesson == 'lesson_protected') : ?>
                        <div class="private-lesson"><i class="fa fa-lock"></i><span><?php esc_html_e('Private', 'studiare'); ?></span></div>
                    <?php elseif ($private_lesson == 'lesson_free_users') : ?>
                        <div class="private-lesson"><i class="fa fa-user-lock"></i><span><?php echo esc_html($login_placeholder ? $login_placeholder : __('for Users', 'studiare')); ?></span></div>
                    <?php endif; ?>
                    <?php
                    $sc_protect_link_status = ($sc_pls == "on") ? 'true' : "false";
                    if ($atts['sc_download_file'] !== 'none') {
                        echo generate_dl_section($atts, get_the_ID(), $private_lesson, $bought_course, $login_toast_title, $login_toast_message, $bought_toast_title, $bought_toast_message, $sc_protect_link_status);
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($content) || !empty($lesson_audio) || !empty($lesson_video)) : ?>
            <div class="panel-content">
                <div class="panel-content-inner">
                    <?php
                    // Display content based on lesson access
                    if ($private_lesson == 'lesson_protected') {
                        if ($bought_course) {
                            echo do_shortcode($content);
                            if (!empty($lesson_video) || !empty($lesson_audio)) {
                                echo "<div class='sc_le_vi_au'>";
                                if (!empty($lesson_video)) {
                                    echo "<video preload='none' style='width:100%' controls controlsList='nodownload' oncontextmenu='return false;'><source src=$lesson_video></video>";
                                }
                                if (!empty($lesson_audio)) {
                                    echo "<audio preload='none' style='width:100%' controls controlsList='nodownload' oncontextmenu='return false;'><source src=$lesson_audio></audio>";
                                }
                                echo "</div>";
                            }
                        } else {
                            ?>
                            <div class="lessonaccessdenied">
                                <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                                <?php
                                if (!empty($private_placeholder)) {
                                    echo balancetags($private_placeholder);
                                } else {
                                    esc_html_e('This lesson is private, for full access to all lessons you need to buy this course.', 'studiare');
                                }
                                ?>
                            </div>
                            <?php
                        }
                    } elseif ($private_lesson == 'lesson_free_users' && !is_user_logged_in()) {
                        ?>
                        <div class="lessonaccessdenied">
                            <span class="icon"><i class="fas fa-user-lock"></i></span>
                            <?php esc_html_e('This lesson is private. Please log in to access.', 'studiare'); ?>
                        </div>
                        <?php
                    } else {
                        echo do_shortcode($content);
                        if (!empty($lesson_video) || !empty($lesson_audio)) {
                            echo "<div class='sc_le_vi_au'>";
                            if (!empty($lesson_video)) {
                                echo "<video preload='none' style='width:100%' controls controlsList='nodownload' oncontextmenu='return false;'><source src=$lesson_video></video>";
                            }
                            if (!empty($lesson_audio)) {
                                echo "<audio preload='none' style='width:100%' controls controlsList='nodownload' oncontextmenu='return false;'><source src=$lesson_audio></audio>";
                            }
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
    <?php } // End foreach
} // End if $lessons
?>

                </div>
            </div>
            <script>
                jQuery(".sc-course-lesson-toggle-wrapper").off('click').click(function(el){
                    var id = jQuery(this).data('id');
                    var query = "[data-id='"+id+"']";
                    var item = jQuery(query);
                    //alert(id);
                    item.toggleClass("active_tab_by_suncode");
                    item.next('.panel-group').slideToggle();
                });
            	<?php if($list_open_situ=='on'){?>
            	jQuery(document).ready(function(){
            		var query = "[data-id='"+<?php echo $rand_id;?>+"']";
                    var item = jQuery(query);
                    //alert(id);
                    item.toggleClass("active_tab_by_suncode");
                    item.next('.panel-group').slideToggle();
            	});
            	<?php } ?>
            </script>
    
            <?php
        
    }
    
   return ob_get_clean();
}    
    
    






/**
 * Remove general buttons from single product
 * since v12.6 add ability to enable/disable some buttons in product single page
 */
function get_generalBtnsSinglePro_situ() {
    

    if (is_plugin_active('woocommerce/woocommerce.php')) {
    	if ( is_singular('product') ) {
    	    $prefix = '_studiare_'	;
    	    $sc_sections_off = get_post_meta( get_the_ID(), $prefix . 'sc_sections_off', false );
    	    
    	    //print_r($sc_sections_off);
    	    if(!empty($sc_sections_off)){
        	    $sc_sections_off=$sc_sections_off[0];
        	    
        	    if(in_array('contact',$sc_sections_off)){
        	        remove_action("wp_footer","studi_custom_floating_btn_gen");
        	    }
        	    if(in_array('float',$sc_sections_off)){
        	        remove_action("wp_footer","sc_studi_smart_nav_builder");
        	    }
        	    if(in_array('floating_add_to_cart',$sc_sections_off)){
        	        remove_action("wp_footer","sc_studi_add_to_cart_fixed_btn");
        	    }
        	    if(in_array('fullscreen_viewer',$sc_sections_off)){
        	        remove_action('woocommerce_single_product_summary','sc_add_fullscreen_btn_to_course_area');
        	    }
        	    if(in_array('support',$sc_sections_off)){
        	        remove_action("wp_footer","swss_add_floating_button_to_frontend");
        	    }
    	    }
    	
    	} 
    }
}
add_action('woocommerce_before_single_product', 'get_generalBtnsSinglePro_situ');


/** remove show full screen mode **/
function sc_remove_full_viewer(){
    
    if ( class_exists('Redux') ) {
		$fullview = codebean_option('show_fullscreen_mode_button');
		if(!$fullview){
		     remove_action('woocommerce_single_product_summary','sc_add_fullscreen_btn_to_course_area');
		}
	}
    
}
add_action('woocommerce_before_single_product', 'sc_remove_full_viewer');

//add edit button to notifications
function sc_notifs_edit_link_to_admin_bar() {
    if (isset($_GET['item_id'])) {
        $item_id = sanitize_text_field($_GET['item_id']);
        $edit_link = admin_url('post.php?post=' . $item_id . '&action=edit');
        global $wp_admin_bar;
        $wp_admin_bar->add_menu(array(
            'id' => 'sc-notifs-edit-link',
            'icon' => 'custom-edit-link',
            'title' => esc_html__( 'Edit Notification', 'studiare' ),
            'href' => $edit_link
        ));
    }
}
add_action('admin_bar_menu', 'sc_notifs_edit_link_to_admin_bar', 999);


// Remove Woo Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Remove result count and catalog ordering
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove Cross-Sells from the shopping cart page
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// Change out of stock text
add_filter( 'woocommerce_get_availability', 'studiare_custom_get_availability', 1, 2);

// Our hooked in function $availablity is passed via the filter!
function studiare_custom_get_availability( $availability, $_product ) {
    $product_single_outstock_message    = codebean_option('product_single_outstock_message');
	if ( !$_product->is_in_stock() ) $availability['availability'] = $product_single_outstock_message;
	return $availability;
}

//Change the breadcrumb separator
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<i class="fa fa-angle-right"></i>';
	return $defaults;
}

// Remove breadcrumb before content add it on page title
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Remove tabs & upsell display
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

// Remove functions before single product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Remove thumbnails from product single
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );


/**
 * Get Teachers List and Return it as array
 */
if ( ! function_exists( 'studiare_get_teachers_list' ) ) {
	function studiare_get_teachers_list() {

		$teachers = array(
			'no-teacher' => esc_html__( 'Choose a Teacher', 'studiare' ),
		);

		$teachers_args = array(
			'post_type'     => 'teacher',
			'post_status'   => 'publish',
			'posts_per_page'=> -1,
		);

		// Makes a query for the teacher post type
		$teachers_query = new WP_Query( $teachers_args );

		// Adds every teacher to the $teachers array
		foreach( $teachers_query->posts as $teacher ){
			$teachers[$teacher->ID] = $teacher->post_title;
		}

		// Return these teachers
		return $teachers;
	}
}

/**
 * Shop products per page
 */
function studiare_shop_products_per_page() {

	$shop_per_page = '12';

	if ( class_exists('Redux') ) {
		$shop_per_page = codebean_option('shop_per_page');
	}

	$per_page = 12;
	$number = apply_filters('studiare_shop_per_page', $shop_per_page );
	if( is_numeric( $number )  &&  $number > 0) {
		$per_page = $number;
	}

	return $per_page;
}

add_filter( 'loop_shop_per_page', 'studiare_shop_products_per_page', 20 );


if( ! function_exists( 'studiare_cart_data' ) ) {
	add_filter('woocommerce_add_to_cart_fragments', 'studiare_cart_data', 30);
	function studiare_cart_data( $array ) {
		ob_start();
		studiare_cart_count();
		$count = ob_get_clean();

		ob_start();
		studiare_cart_subtotal();
		$subtotal = ob_get_clean();

		$array['span.studiare-cart-number'] = $count;
		$array['span.studiare-cart-subtotal'] = $subtotal;

		return $array;
	}
}

if( ! function_exists( 'studiare_cart_count' ) ) {
	function studiare_cart_count() {
		$count = WC()->cart->cart_contents_count;
		?>
		<span class="studiare-cart-number"><?php echo esc_html($count); ?></span>
		<?php
	}
}

if( ! function_exists( 'studiare_cart_subtotal' ) ) {
	function studiare_cart_subtotal() {
		?>
		<span class="studiare-cart-subtotal"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
		<?php
	}
}

/**
 * Remove sidebar from single product
 */
function remove_sidebar_shop() {
	if ( is_singular('product') ) {
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
	}
}
add_action('template_redirect', 'remove_sidebar_shop');

/**
 * Render custom price html
 */
function studiare_custom_get_price_html( $price, $product ) {
    
	if ( $product->get_price() == 0 ) {
		if ( $product->is_on_sale() && $product->get_regular_price() ) {
			$regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );

			//$price = wc_format_price_range( $regular_price, esc_html__( 'Free!', 'studiare' ) );
			$price = "<del><span class='woocommerce-Price-amount amount'>$regular_price" .get_woocommerce_currency_symbol()."</span></del> <ins><span class='woocommerce-Price-amount amount'>".esc_html__( 'Free!', 'studiare' )."</span></ins>";
		} 
		else {
		    $price = '<span class="amount">' . esc_html__( 'Free!', 'studiare' ) . '</span>';
		}
	}
	if('' === $product->get_price() ){
		   
            if(codebean_option('free_or_call_for_price')){
			    $price = '<span class="amount">' . esc_html__( 'Free!', 'studiare' ) . '</span>';
		    }else{
		        $price = '<span class="amount">' . esc_html__( 'Call for price', 'studiare' ) . '</span>';
		    }
                        
		}

	return $price;
	
	
    

}

add_filter( 'woocommerce_get_price_html', 'studiare_custom_get_price_html', 10, 2 );




/**
 * Cart Page markup
 */
add_action( 'woocommerce_before_cart', function() {
	echo '<div class="cart-page-inner row">';
}, 1);

add_action( 'woocommerce_after_cart', function() {
	echo '</div><!--.cart-totals-inner-->';
}, 200);

/**
 * Custom Excerpt for Products
 */
function studiare_product_custom_excerpt_length( $length ) {
	global $post;
	if ($post->post_type == 'product') {
		return 20;
	}
}

/**
 * Cart Mobile Menu Item
 */
function studiare_get_menu_item_cart() {
    $show_cart_item = true;

	if ( class_exists( 'Redux' ) ) {
		$show_cart_item = codebean_option('off_canvas_cart');
	}

	if ( ! $show_cart_item || ! function_exists( 'WC' ) ) {
		return;
	}

	$cart_items = WC()->cart->get_cart_contents_count();

	?>
    <div class="off-canvas-cart">
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon-link">
            <span class="bag-icon"><?php get_template_part( 'assets/images/shop-bag-two.svg' ); ?></span>
            <span class="cart-text"><?php esc_html_e( 'Cart', 'studiare' ); ?></span>
            <?php studiare_cart_count(); ?>
        </a>
    </div>
    <?php
}

/**
 * ------------------------------------------------------------------------------------------------
 * Determine is it product attribute archieve page
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'studiare_is_product_attribute_archieve' ) ) {
	function studiare_is_product_attribute_archieve() {
		$queried_object = get_queried_object();
		if( $queried_object && property_exists( $queried_object, 'taxonomy' ) ) {
			$taxonomy = $queried_object->taxonomy;
			return substr($taxonomy, 0, 3) == 'pa_';
		}
		return false;
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Disable address fields for downloadable products checkout
 * ------------------------------------------------------------------------------------------------
 */
add_filter('woocommerce_checkout_fields', 'custom_checkout_fields_based_on_cart');
function custom_checkout_fields_based_on_cart($fields) {
    // Get the value of the Redux option
    $enable_address_fields = get_option('codebean_option')['course_checkout_address_fields'] ?? false;

    // If the option is disabled, do nothing
    if (!$enable_address_fields) {
        return $fields;
    }

    // Initialize product type flags
    $has_virtual_product = false;
    $has_physical_product = false;

    // Check the cart items to determine product types
    foreach (WC()->cart->get_cart() as $cart_item) {
        if ($cart_item['data']->is_virtual()) {
            $has_virtual_product = true;
        } else {
            $has_physical_product = true;
        }
    }

    // Remove address fields if only virtual products are in the cart
    if ($has_virtual_product && !$has_physical_product) {
        // Unset billing fields
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_state']);
        unset($fields['billing']['billing_country']);

        // Unset shipping fields
        unset($fields['shipping']['shipping_address_1']);
        unset($fields['shipping']['shipping_address_2']);
        unset($fields['shipping']['shipping_city']);
        unset($fields['shipping']['shipping_postcode']);
        unset($fields['shipping']['shipping_state']);
        unset($fields['shipping']['shipping_country']);
    }

    return $fields;
}
