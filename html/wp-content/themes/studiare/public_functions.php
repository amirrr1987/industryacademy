<?php


// advanced search since version 13
function custom_advanced_search_shortcode() {
    // Define the post types you want to allow searching
    $post_types = ['post'=>__("Post","studiare"), 'product'=>__("Product","studiare"), 'page'=>__("Page","studiare"), 'tp_event'=>__("Event","studiare")];
    
    // Get current page number
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    // Start output buffering
    ob_start();
    // Search form
    if (isset($_GET['ss']) && !empty($_GET['ss'])) {
        $search_query = sanitize_text_field($_GET['ss']);
        $selected_post_types = isset($_GET['post_types']) ? (array) $_GET['post_types'] : array_keys($post_types); // Default to all post types if none selected
    }else{
        $selected_post_types = []; // Default to all post types if none selected
    }
    ?>
    <style>
        .studiare_advanced_search { padding: 20px; box-shadow: 0 0 10px gainsboro; border-radius: 10px; margin-bottom: 20px; }
        .sas_form input[type="submit"] { margin-right: 10px; }
        .sas_ptypes { display: flex ;  margin-top: 25px; }
        .sas_ptypes label { display: flex ; align-items: center; }
        .sas_ptypes label input { margin: 0 10px !important; }
        .sas_form { display: flex ; justify-content: space-between; }
        ul.sas_rholder { margin: 0; }
        ul.sas_rholder li { margin: 10px ; padding: 10px; border-radius: 5px; border: 1px solid var(--primary_color); position: relative; overflow: hidden;display: inline-flex ; justify-content: space-between; width: calc(33% - 20px);}
        img.sas_img { max-width: 80px; border-radius: 5px; box-shadow: -4px 4px #3f3d4112; }
        ul.sas_rholder li a { display: flex ; align-items: center; z-index: 1; position: relative;width: 100%;}
        .sas_pagination { text-align: center; }
        .sas_pagination .page-numbers { border: 1px solid gainsboro; padding: 3px; margin: 0 2px; min-width: 36px; display: inline-block; border-radius: 3px; }
        .sas_pagination .page-numbers.current, .sas_pagination .page-numbers:hover { background: var(--primary_color); color: #fff; border-color: var(--primary_color); }
        ul.sas_rholder li:hover .sas_image-container { transform: skewX(-10deg); }
        .sasr_title{transition:.4s;}
        i.sas_read { position: absolute; bottom: 20px; left: 45px; transition: .4s; background: var(--primary_color); padding: 10px 14px; border-radius: 138px; color: #fff; transform: skewX(10deg); }
        ul.sas_rholder li:hover i.sas_read { left: -100%;  }
        ul.sas_rholder li:hover .sasr_title{transform: translate(8px, -10px);}
        .sasr_bg { position: absolute; left: 0; top: 0; bottom: 0; right: 0; background-repeat: no-repeat !important; background-size: cover !important; filter: blur(15px); opacity: .05;z-index:0; background-position: center !important;}
        @media screen and (max-width:1000px){ul.sas_rholder li { width: 100%; }}
        .sas_image-container {
    position: relative;
    display: inline-block;    padding: 10px;transition:.4s;
}

.sas_border-image {
    display: block;
    max-width: 100px; /* Adjust as needed to fit your layout */
    position: relative; /* To ensure it stays above the overlay */
    z-index: 1; /* Ensure it is above the overlay */
    border-radius: 5px;
}

.sas_border-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover; /* Ensures the background covers overlay */
    background-blur: 5px; /* Apply blur effect if supported, see note below */
    filter: blur(10px); /* Adjust the blur effect */
    pointer-events: none; /* So the overlay doesn't interfere with image clicks */
    z-index: 0; /* Behind the image */
    opacity: 0.3; /* Adjust transparency */
}

/* Note: The `background-blur` property is not standard and may not work in all browsers. The `filter: blur` is used instead. */
    </style>
    <form class="studiare_advanced_search" method="GET" > 
        <div class="sas_form">
            <input type="text" id="ss" name="ss" placeholder="<?php echo esc_html__('Search', 'studiare');?>" value="<?php echo isset($search_query) ? esc_attr($search_query) : ''; ?>" required>
            <input type="submit" value="<?php echo esc_attr__('Search', 'studiare'); ?>">
        </div>
        
        <div class="sas_ptypes">
        <label><?php echo esc_html__('Search in:', 'studiare'); ?></label>
        <?php foreach ($post_types as $type=>$val): ?>
            <label>
            <input type="checkbox" name="post_types[]" value="<?php echo esc_attr($type); ?>" 
                <?php checked(in_array($type, (array) (isset($_GET['post_types']) ? $_GET['post_types'] : $selected_post_types))); ?>
            /> <?php echo esc_html(ucfirst($val)); ?></label>
        <?php endforeach; ?>
        </div>
        
    </form>
    <?php
    // Check if there is a search query
    if (isset($_GET['ss']) && !empty($_GET['ss'])) {
        $search_query = sanitize_text_field($_GET['ss']);
        $selected_post_types = isset($_GET['post_types']) ? (array) $_GET['post_types'] : array_keys($post_types); // Default to all post types if none selected

        // Ensure we only search selected post types
        $args = [
            'post_type' => $selected_post_types,
            's' => $search_query,
            'posts_per_page' => 12, // Adjust according to your needs
            'paged' => $paged,
        ];
        $query = new WP_Query($args);

        // Display results
        if ($query->have_posts()) {
            echo "<div class='studiare_advanced_search'>";
            $nfr = $query->found_posts;
            $nfr = sprintf(__("%s Results Found.","studiare"),$nfr);
            echo '<h2>' . esc_html__('Search Results:', 'studiare') . '</h2>'.$nfr.'<hr><ul class="sas_rholder">';
            while ($query->have_posts()) {
                $query->the_post();
                if (has_post_thumbnail()) {
                    $image = get_the_post_thumbnail_url( null, 'thumbnail' );
                }else{
                    $image = get_template_directory_uri()."/assets/images/no-image.jpg";
                }
                echo '<li  data-sasptype="'.esc_html(get_post_type()).'">';
                echo '<div class="sasr_bg" style="background:url('.$image.')"></div>';
                //echo '<a href="' . esc_url(get_permalink()) . '"><img class="sas_img" src="'.$image.'">  ' . esc_html(get_the_title()) . '</a>';
                echo '<a href="' . esc_url(get_permalink()) . '"><div class="sas_image-container"> <i class="sas_read fal fa-chevron-left"></i> <img src="'.$image.'" alt="" class="sas_border-image"> <div style="background-image:url('.$image.')" class="sas_border-overlay"></div> </div> <span class="sasr_title"> ' . esc_html(get_the_title()) . '</span></a>';
                echo '</li>';
            }
            echo '</ul>';
            
            // Pagination
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1) {
                echo '<div class="sas_pagination">';
                echo paginate_links(array(
                    'total' => $total_pages,
                    'current' => $paged,
                    'format' => '?ss=' . urlencode($search_query) . '&paged=%#%', // Preserve the search query and add paged parameter
                    'add_args' => array('ss'=>urlencode($search_query),'post_types' => $selected_post_types), // Add selected post types to pagination links
                    'prev_text' => __('« Previous', 'studiare'),
                    'next_text' => __('Next »', 'studiare'),
                ));
                echo '</div>';
            }
            
            echo '</div>';
        } else {
            echo "<div class='studiare_advanced_search'>";
            echo '<p>' . esc_html__('No results found.', 'studiare') . '</p>';
            echo '</div>';
        }

        // Reset post data
        wp_reset_postdata();
    }

   

    // Return the output
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('advanced_search', 'custom_advanced_search_shortcode');




/** remove event bookings from search **/
add_action( 'init', 'remove_event_booking_from_seach', 99 );

function remove_event_booking_from_seach() {
    global $wp_post_types;

    if ( post_type_exists( 'event_auth_book' ) ) {

        // exclude from search results
        $wp_post_types['event_auth_book']->exclude_from_search = true;
    }
}


function scallow_style_and_script_tags( $allowed_tags ) {
    $allowed_tags['style'] = array();
    $allowed_tags['script'] = array(
        'src' => array(),
        'type' => array()
    );
    return $allowed_tags;
}
add_filter( 'wp_kses_allowed_html', 'scallow_style_and_script_tags', 10, 2 );


//adding svg tooman
function sc_custom_currency_symbol( $currency_symbol, $currency ) {
    // Check if the currency is 'USD'
    $toman_as_image=0;
    if ( class_exists('Redux')) {
        $toman_as_image = codebean_option("toman_as_image");
    }
    
    if($toman_as_image =='1'){
        if ( $currency === 'IRT' ) {
                
            // Add a custom class to the body
            add_filter( 'body_class', 'sc_add_custom_body_class' );
             // Get the URL of the SVG icon
            $icon_url = get_stylesheet_directory_uri() . '/assets/images/toman.svg.php';
            return '<span class="sc-toman-cur"></span>';
        }
        
    }
    return $currency_symbol;
}

add_filter( 'woocommerce_currency_symbol', 'sc_custom_currency_symbol', 10, 2 );
function sc_add_custom_body_class( $classes ) {
    $classes[] = 'toman_cur_active';
    return $classes;
}

//solving lazy load problem in wordpress	
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
function disable_lazy_load_featured_images($attr, $attachment = null) {
	$attr['loading'] = 'eager';
	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'disable_lazy_load_featured_images');

function allow_style_and_script_tags($content) {
    return $content;
}
add_filter('the_content', 'allow_style_and_script_tags', 10);
/**
 * Studiare  Public Functions
 **/

/**
 * add new menu to user dashboard
 * */
function jp_account_menu_items( $menu_links ) {
 
    //$items['user_comments'] = "نظرات من";
 	// we use array_slice() because we want our link to be on the 3rd position
	return array_slice( $menu_links, 0, 3, true )
	+ array( 'user_comments' => esc_html__( 'My Comments', 'studiare' ),)
	+ array_slice( $menu_links, 3, NULL, true );
    //return $items;
 
}
add_filter( 'woocommerce_account_menu_items', 'jp_account_menu_items', 41 );

 /**
  * Add endpoint
 */
function jp_add_my_account_endpoint() {
 
    add_rewrite_endpoint( 'user_comments', EP_PAGES );
 
}
 
add_action( 'init', 'jp_add_my_account_endpoint' );

function jp_user_comments_endpoint_content() {
    global $wpdb;
    $user_id = get_current_user_id();
    if(!$user_id){return;}
    $table_name = $wpdb->prefix.'comments';
    
    $items_per_page = codebean_option('sc_comments_per_page') ?: "5";
    $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
    $offset = ( $page * $items_per_page ) - $items_per_page;
    
    $total = count($wpdb->get_results("SELECT * FROM $table_name WHERE user_id=$user_id ORDER BY comment_date DESC "));
    $results = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id=$user_id ORDER BY comment_date DESC LIMIT ${offset}, ${items_per_page}");
    //print_r($results);
    if(count($results)>0){
        echo"
        <style>
        .singleCommentHolder { background: #ffffff; padding: 10px; border-radius: 3px; margin: 10px 0; box-shadow: 0 0 25px #ecf0fb;transition: .4s; }
        .singleCommentContent { background: #fafbfe; padding: 0 10px; border-radius: 3px; }
        .singleCommentContent .fal {  margin-left: 10px; font-weight:300;}
        .singleCommentHolder:hover { box-shadow: 0 0 25px #dadada; transition: .4s; transform: scale(1.01); }
        .singleCommentTitle time { float: left; font-size: 12px;min-width: 150px; }
        .comSitu {color:#fff; background: #ecf0fb; min-width: 110px; display: block; text-align: center; }
        .comSitu .text-danger  { background: #ffd6e0; }
        .comSitu .text-success { background: #ecf9f2; }
        .comSitu .text-warning { background: #fff6e6; }
        </style>
        ";
        $i=1;
        echo "<div class='row'>";
        foreach($results as $comment){
            //print_r($comment);
        $post_id = $comment->comment_post_ID;
        $content = $comment->comment_content;
        $approved = $comment->comment_approved;
        $postType= get_post_type($comment->comment_post_ID);
        $title = get_the_title($post_id);
        $url = get_the_permalink($post_id);
        $cDate = $comment->comment_date;
        $cDate = date_i18n("d F Y - H:i:s",strtotime($cDate));
        if($approved==1){
            $coloring = "success";
            $approved_text = esc_html__( 'Approved', 'studiare' );
            $approved ="<div class='text-success'>$approved_text</div>";}
        elseif($approved==0){
            $coloring = "danger";
            $disapproval_text = esc_html__( 'Rejected', 'studiare' );
            $approved="<div class='text-danger'>$disapproval_text</div>";}
        else{
            $coloring = "warning";
            $awaiting_text = esc_html__( 'Awaiting confirmation', 'studiare' );
            $approved="<div class='text-warning'>$awaiting_text</div>";}
        echo " 
        <div class='singleCommentHolder col-xs-12'>
            <div class='col-md-1 col-sm-12'>
            <div class='icon-wrapper icon-wrapper-alt rounded-circle'>
		                    <div class='icon-wrapper-bg bg-$coloring salam'></div>
		                    <i class='fal fa-comments  text-$coloring'></i>		                    
		      </div>
		     
		      </div>
		      <div class='col-md-8 col-sm-12'>
            <div class='singleCommentTitle'><a href='$url' target='_blank'>$title</a>  </div>
            <div class='singleCommentContent text-primary'><i class='fal fa-quote-right'></i>$content</div>
            
            </div>
            <div class='col-md-3 col-sm-12'>
            <time><i class='fal fa-clock'></i> $cDate </time>
            <span class='comSitu'> $approved </span>
            </div>
        </div>";
        $i++;
        }  
        echo "</div>";
        
        echo "<div class='studi_dashboard_pagination'>";
        echo paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'type' => 'list',
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => '<i class="fa fa-angle-right"></i>',
        'total' => ceil($total / $items_per_page),
        'current' => $page
        ));
        echo "</div>";
    
    }
    
}
 
add_action( 'woocommerce_account_user_comments_endpoint', 'jp_user_comments_endpoint_content' );

/**
 * add new menu to user dashboard end
 * */


/** show sidebar menu on left or right **/
add_filter( 'body_class','sc_side_menu' );

function sc_side_menu( $classes){
    
    if ( class_exists('Redux') ) {
        
        $sc_off_canvas_navigation_position = codebean_option("sc_off_canvas_navigation_position");
        
        if($sc_off_canvas_navigation_position){
            $classes[]="off-canvas-right";
        }
        
        //since version 12.8 dark mode
        $sc_darkmode_ready = codebean_option("sc_darkmode_ready");
        
        if($sc_darkmode_ready){
            $classes[]="scdarkcolors";
        }
        
        return $classes;
        
    }
}


/** adding preview to some products page **/

add_action('woocommerce_single_product_summary','sc_add_pv_btn_to_pro');
function sc_add_pv_btn_to_pro(){
    
    $prefix = '_studiare_';
    $url = get_post_meta(get_the_ID(), $prefix . 'woo_preview_url', true);
    $title = get_post_meta(get_the_ID(), $prefix . 'woo_preview_url_text', true);
    if(empty($url)){return;}
    
    if(empty($title)){
        $title = __('Preview','studiare');
    }
    echo "<a href='$url' class='button sc_preview_btn_in_pro' target='_blank'>$title</a>";
    
}

/** adding fullscreen button to course area
 * the button moved after add to cart button
 **/

/**
 * Customize product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
	echo "<div id='sc-product-single-content'>";
	echo the_content();
	echo "</div>";
}

//add_action('woocommerce_after_add_to_cart_form','sc_add_fullscreen_btn_to_course_area');
add_action('woocommerce_single_product_summary','sc_add_fullscreen_btn_to_course_area');
function sc_add_fullscreen_btn_to_course_area(){
    
    $title = __('Show Course Fullscreen','studiare');
    echo "<a class='button sc_pro_content_fullscreener' href='#'>$title</a>";
    
    ?>
    <style>
       #sc-product-single-content.scfullscreened{position:fixed;top:0;left:0;right:0;bottom:0;z-index:1000000000;margin: 0; overflow-y: auto;}
       .scfullcloser { position: fixed; top: 30px; left: 40px; width: 36px; height: 36px; border-radius: 100px; color: #ECEFF1; background: #607D8B; text-align: center; font-size: 23px; padding-top: 6px; }
       .scfullcloser:hover { background: #ECEFF1; color: #263238; }
       a.button.sc_pro_content_fullscreener { margin: 10px 0; border: 1px solid #F1F8E9; color: yellowgreen; width: 100%; background: #F1F8E9; }
       .pro_fulls_activated .wrap{transform: none;}
       .pro_fulls_activated {height: 100%; overflow: hidden;}
		.studi_pro_layout_four #sc-product-single-content { background: #fff; padding: 30px; }
    </style>
    <script>
    jQuery(document).ready(function(){
        
        jQuery(".sc_pro_content_fullscreener").click(function(e){
            e.preventDefault();
            jQuery("#sc-product-single-content").addClass('scfullscreened');
            document.body.classList.add("pro_fulls_activated");
            window.scrollTo({ top: 0, behavior: 'smooth' });
            if (jQuery('.scfullcloser').length > 0) {
                
            } else {
                var buttonEl = document.createElement("a");
            	buttonEl.href = '#';
            	buttonEl.className = "scfullcloser";
            	buttonEl.id = "scfullcloser";
            	buttonEl.innerHTML  = "<i class='fal fa-times'></i>";
            	document.getElementById('sc-product-single-content').appendChild(buttonEl);
            }
			if (jQuery('#tab-title-description').length > 0) {
				jQuery('#tab-title-description a').click();
			}
			if (jQuery('#sctdescr').length > 0) {
				jQuery('#sctdescr').click();
			}
            
        });
        
        jQuery(document).on('click', '.scfullcloser', function(e) {
            
            e.preventDefault();
            jQuery("#sc-product-single-content").removeClass('scfullscreened');
            document.body.classList.remove("pro_fulls_activated");
            var element = document.querySelector("#sc-product-single-content");
			var dims = element.getBoundingClientRect();
            element.scrollIntoView({ behavior: 'smooth',top: -100});
            document.getElementById("scfullcloser").remove();
            
        });  
        
    });        
    </script>
    <?php
}


/* product buyers list for admin */

if( current_user_can( 'administrator' ) ){add_action('woocommerce_product_tabs', 'sc_pro_buyers_list' , 999 );}

function sc_pro_buyers_list($tabs){
    //since version 12.6 user can disable the tab
    $product_single_sc_show_buyers="0";
    if ( class_exists('Redux') ) {
        $product_single_sc_show_buyers = codebean_option("product_single_sc_show_buyers");
    }
    if( $product_single_sc_show_buyers =='0'){return $tabs;}
    
    
    $tabs['sc_pro_buyers_list'] = array(
		'title' 	=> __( 'Buyers List', 'studiare' ),
		'priority' 	=> 50,
		'callback' 	=> 'sc_pro_buyers_list_render',
	);

	return $tabs;
    
}
function sc_pro_buyers_list_render(){
    
    $product_id = get_the_id();//$product->get_id(); // Put here the product ID.
    $orders_ids = sc_retrieve_orders_ids_from_a_product_id( $product_id );
    $orderID_array = array_unique($orders_ids);
    
    if(!$orderID_array){echo __("No buyer found","studiare");return;}
 ?>
  <button class="button" id="studi_buyers_Export" onclick="exportReportToExcel(this)"><?php echo __("Download Buyers List","studiare");?></button>
 <?php   
    echo '<div id="scpblist_holder"><table id="sc_pro_buyers_list_holder" class="sc_pro_buyers_list_holder">';
    echo '<thead>';
    echo '<tr><td></td><td>'.__("User Name","studiare").'</td><td>'.__("Email","studiare").'</td><td>'.__("Order Date","studiare").'</td><td>'.__("Order Number","studiare").'</td></tr>';
    echo '</thead><tbody>';
    $i=1;
    foreach ( $orderID_array as $orderID ) {
        $order = wc_get_order( $orderID );
        
        $order_num = $order->get_id();
        $buydate = $order->get_date_created();
        $buydate = date_i18n(get_option('date_format'),strtotime($buydate));
        $email =  $order->get_billing_email();

        $profile_name = get_the_author_meta( 'display_name', $order->get_user_id() );
        $profile_user = get_the_author_meta( 'user_login', $order->get_user_id() );

        

        echo '<tr><td>'.$i++.'</td><td><span class="hint--left" aria-label="'.$profile_user.'">'.$profile_name.'</span></td><td>'.$email.'</td><td>'.$buydate.'</td><td>'.$order_num.'</td></tr>';
        
    }
    
    echo '</tbody></table></div>';
    
    ?>
  


<script type="text/javascript">
  function exportReportToExcel() {
    var table = document.getElementById("sc_pro_buyers_list_holder");
    
     /* Declaring array variable */
    var rows =[];
 
      //iterate through rows of table
    for(var i=0,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
        column5 = row.cells[4].innerText;
 
    /* add a new records in the array */
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5
            ]
        );
 
        }
         const bom = "\uFEFF";
        csvContent = "data:text/csv;charset=utf-8,"+bom;
         /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });
 
        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "studi_buyers_list.csv");
        document.body.appendChild(link);
         /* download the data file named "Stock_Price_Report.csv" */
        link.click();
    
  }
</script>       
    <?php
    
    
}

function sc_retrieve_orders_ids_from_a_product_id( $product_id ) {
    global $wpdb;
    
    // Define HERE the orders status to include in  <==  <==  <==  <==  <==  <==  <==
    $orders_statuses = "'wc-completed'";

    # Get All defined statuses Orders IDs for a defined product ID (or variation ID)
    return $wpdb->get_col( "
        SELECT DISTINCT woi.order_id
        FROM {$wpdb->prefix}woocommerce_order_itemmeta as woim, 
             {$wpdb->prefix}woocommerce_order_items as woi, 
             {$wpdb->prefix}posts as p
        WHERE  woi.order_item_id = woim.order_item_id
        AND woi.order_id = p.ID
        AND p.post_status IN ( $orders_statuses )
        AND woim.meta_key IN ( '_product_id', '_variation_id' )
        AND woim.meta_value LIKE '$product_id'
        ORDER BY woi.order_item_id DESC"
    );
}



/*  Custom Field for Categories start */
function studi_blog_taxonomy_add_meta_fields( $taxonomy ) { 
    
    ?> 
  
    <div class="form-field">
        <label for="sc_studi_blog_cat_color"><?php _e('Featured Color', 'studiare'); ?></label>
        <input class="colorpicker" type="text" name="sc_studi_blog_cat_color" id="sc_studi_blog_cat_color">
        <p class="description"><?php _e('This color will be used to identify categories on the site.', 'studiare'); ?></p>
    </div>
    
    <div class="form-field">
        <label for="sc_studi_blog_cat_color_forbg"><?php _e('Use category color for background', 'studiare'); ?></label>
        <?php _e('Yes', 'studiare'); ?> <input class="" type="radio" name="sc_studi_blog_cat_color_forbg" value="yes" checked>
        <?php _e('No', 'studiare'); ?> <input class="" type="radio" name="sc_studi_blog_cat_color_forbg" value="no">
        <p class="description"><?php _e('If you want this color to be displayed as the background color of the title on the category page, select Yes', 'studiare'); ?></p>
    </div>
    
    <div class="form-field">
        <label for="sc_studi_cat_icon"><?php _e('Feautured Icon', 'studiare'); ?></label>
        <input type="hidden" id="sc_studi_cat_icon" name="sc_studi_cat_icon" class="custom_media_url" value="<?php echo isset($sc_studi_cat_icon) ? esc_attr($sc_studi_cat_icon) : ''; ?>">
     <div id="category-image-wrapper">
	 <?php if ( isset($sc_studi_cat_icon) ) { ?>
           <?php echo wp_get_attachment_image ( $ssc_studi_cat_icon, 'thumbnail' ); ?>
         <?php } ?>
	 </div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Upload/Add Image', 'studiare' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Delete Image', 'studiare' ); ?>" />
    </p>
	<p class="description"><?php _e('This icon will be used to specify the category on the site.', 'studiare'); ?></p>
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'studi_blog_taxonomy_add_meta_fields', 10, 2 );


// Edit term page
function studi_blog_taxonomy_edit_meta_fields( $term, $taxonomy ) {
    
    //getting term ID
    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field.
    $sc_studi_blog_cat_color = get_term_meta($term_id, 'sc_studi_blog_cat_color', true);
    $sc_studi_blog_cat_icon  = get_term_meta($term_id, 'sc_studi_blog_cat_icon', true);

    $sc_studi_blog_cat_color_forbg     = get_term_meta($term_id, 'sc_studi_blog_cat_color_forbg', true)?:"yes";
    ?>
   
    <tr class="form-field">
        <th scope="row" valign="top"><label for="sc_studi_blog_cat_color"><?php _e('Featured Color', 'studiare'); ?></label></th>
        <td>
            <input  class="colorpicker" type="text" name="sc_studi_blog_cat_color" id="sc_studi_blog_cat_color" value="<?php echo esc_attr($sc_studi_blog_cat_color) ? esc_attr($sc_studi_blog_cat_color) : ''; ?>">
            <p class="description"><?php _e('This color will be used to identify categories on the site.', 'studiare'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
         <th scope="row" valign="top"><label for="sc_studi_blog_cat_color_forbg"><?php _e('Use category color for background', 'studiare'); ?></label></th>
         <td>
        <?php _e('Yes', 'studiare'); ?> <input class="" type="radio" name="sc_studi_blog_cat_color_forbg" value="yes" <?php if($sc_studi_blog_cat_color_forbg=="yes"){echo "checked";}?> >
        <?php _e('No', 'studiare'); ?> <input class="" type="radio" name="sc_studi_blog_cat_color_forbg" value="no" <?php if($sc_studi_blog_cat_color_forbg=="no"){echo "checked";}?> >
        <p class="description"><?php _e('If you want this color to be displayed as the background color of the title on the category page, select Yes', 'studiare'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="sc_studi_cat_icon"><?php _e('Feautured Icon', 'studiare'); ?></label></th>
        <td>
            <input type="hidden" id="sc_studi_cat_icon" name="sc_studi_cat_icon" class="custom_media_url" value="<?php echo esc_attr($sc_studi_blog_cat_icon) ? esc_attr($sc_studi_blog_cat_icon) : ''; ?>">
     <div id="category-image-wrapper">
	 <?php if ( $sc_studi_blog_cat_icon ) { ?>
           <?php echo wp_get_attachment_image ( $sc_studi_blog_cat_icon, 'thumbnail' ); ?>
         <?php } ?>
	 </div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Upload/Add Image', 'studiare' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Delete Image', 'studiare' ); ?>" />
    </p>
	<p class="description"><?php _e('This icon will be used to specify the category on the site.', 'studiare'); ?></p>
        </td>
    </tr>
    <?php
    
}
add_action( 'category_edit_form_fields', 'studi_blog_taxonomy_edit_meta_fields', 10, 2 );


// Save custom meta
function studi_blog_taxonomy_save_taxonomy_meta( $term_id, $tag_id ) {
    
    /*$sc_studi_blog_cat_color = filter_has_var(INPUT_POST, 'sc_studi_blog_cat_color'); //filter_input
    $sc_studi_blog_cat_icon = filter_has_var(INPUT_POST, 'sc_studi_cat_icon');
    $sc_studi_blog_cat_color_forbg = filter_has_var(INPUT_POST, 'sc_studi_blog_cat_color_forbg');*/
    
    if( isset( $_POST['sc_studi_blog_cat_color'] ) ){
        update_term_meta($term_id, 'sc_studi_blog_cat_color', $_POST['sc_studi_blog_cat_color']);
    }
    if( isset( $_POST['sc_studi_cat_icon'] ) ){
        update_term_meta($term_id, 'sc_studi_blog_cat_icon', $_POST['sc_studi_cat_icon'] );
    }
    if( isset( $_POST['sc_studi_blog_cat_color_forbg'] ) ){
        update_term_meta($term_id, 'sc_studi_blog_cat_color_forbg', $_POST['sc_studi_blog_cat_color_forbg']);
    }
    
}
add_action( 'created_category', 'studi_blog_taxonomy_save_taxonomy_meta', 10, 2 );
add_action( 'edited_category', 'studi_blog_taxonomy_save_taxonomy_meta', 10, 2 );


/*  Custom Field for Categories end*/


if( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ){
         add_filter( 'woocommerce_account_menu_items', 'studi_reorder_link_my_account' );
     }

 
function studi_reorder_link_my_account( $items ) {
    
     
   $save_for_later = array( 'wishlist' => __( 'Wishlist', 'woo-smart-wishlist' ) ); // SAVE TAB
   unset( $items['wishlist'] ); // REMOVE TAB
   $items = array_merge( array_slice( $items, 0, 2 ), $save_for_later, array_slice( $items, 2 ) ); // PLACE TAB AFTER POSITION 2
   return $items;
     
}
 
function studi_get_aparat_file_link($course_video_aparat){
    
    $aparat_api ="https://www.aparat.com/etc/api/video/videohash/";
    $aparat_video_address =$aparat_api."".$course_video_aparat;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $aparat_video_address);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $obj = json_decode($result);
    if($obj){
        $aparat_video_file = $obj->video->file_link;
    }else{
        $aparat_video_file = null;
    }
    return $aparat_video_file;
} 





function sc_get_purchased_pro($number){
    
    $current_user = wp_get_current_user();
    if ( 0 == $current_user->ID ) return;
    $shop_page_url = get_permalink( wc_get_page_id ( 'shop' ) ); 
    
    // GET USER ORDERS (COMPLETED + PROCESSING)
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'posts_per_page' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $current_user->ID,
        'post_type'   => wc_get_order_types(),
        'post_status' => 'wc-completed',
    ) );
    
    $purchased_products_ids = array();
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order->ID );
        $items = $order->get_items();
        foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            $purchased_products_ids[] = $product_id;
        }
    }
    
    $purchased_products_ids = array_unique( $purchased_products_ids );
    if( !empty( $purchased_products_ids ) ){
        
        $purchased_products = new WP_Query( array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'post__in' => $purchased_products_ids,
			'orderby' => 'post__in'
		) );
		?>
		<div class="products sc_user_puchased_admin owl-carousel owl-rtl owl-theme" data-show_nav="false" data-show_dots="true">
		<?php
		while ( $purchased_products->have_posts() ) : $purchased_products->the_post();

			wc_get_template_part( 'content', 'product' );

		endwhile;
		?>
		<script>
            jQuery(document).ready(function(){
                 jQuery('.sc_user_puchased_admin').each(
                    function(){
                        var numberofcols = jQuery(this).data('numberofcols');
                        var show_nav = jQuery(this).data('show_nav');
                        var show_dots = jQuery(this).data('show_dots');
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:10,
                            nav:show_nav,
                            dots:show_dots,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:1,
									nav:true,
									dots:false,
                                },
                                600:{
                                    items:2
                                },
                                1000:{
                                    items:<?php echo $number;?>
                                }
                            }
                        });
                    }
                );
               
                
            });
        </script>
		<?php
		echo "</div>";
		
    }else{
        ?>
            <div class="noproductsfounded">
                <div class="cart_empty_icon">
                    
              <?php get_template_part( 'assets/images/emptycart.svg' ); ?>
                </div>
                <div> <?php echo esc_html__( 'You have not purchased any products yet.', 'studiare' );?> </div>
                <div>
                    <a class="gotoshop" href="<?php echo $shop_page_url;?>"> <?php echo esc_html__( 'Go To Shop Page', 'studiare' );?>  </a>
                </div>
        	
        	</div>
        <?php
    }
    wp_reset_query();
    	
}

if(!function_exists('sc_populate_products_page')){
    function sc_populate_products_page() {
 
// GET CURR USER
    $current_user = wp_get_current_user();
    if ( 0 == $current_user->ID ) return;
   
    // GET USER ORDERS (COMPLETED + PROCESSING)
    /*$customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $current_user->ID,
        'post_type'   => wc_get_order_types(),
        //'post_status' => array_keys( wc_get_is_paid_statuses() ),
        'post_status' => 'completed',
    ) );*/
    
    $customer_orders = wc_get_orders( array(
            'limit' => -1,
            'customer_id' => $current_user->ID,
            'status' => array('completed'),
        ) );

    // LOOP THROUGH ORDERS AND GET PRODUCT IDS
    if ( ! $customer_orders )  return "0";
    $product_ids = array();
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order->get_id() );
        $items = $order->get_items();
        foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            $product_ids[] = $product_id;
        }
    }
    $product_ids = array_unique( $product_ids );
    echo count($product_ids);
 
}
}


if(!function_exists('sc_get_user_orders_on_hold_total')){
    function sc_get_user_orders_on_hold_total() {
    $total_amount = 0; // Initializing

    // Get current user
    if( $user = wp_get_current_user() ){

        // Get 'on-hold' customer ORDERS
        $on_hold_orders = wc_get_orders( array(
            'limit' => -1,
            'customer_id' => $user->ID,
            'status' => array('on-hold','pending','processing'),
        ) );

        foreach( $on_hold_orders as $order) {
           // $total_amount += $order->get_total();
        }
         $total_amount = count($on_hold_orders); 
    }
    return $total_amount;
}
}
 
add_action("init","sc_gutenberg_disabler");
function sc_gutenberg_disabler(){

    $sc_disable_gutenberg_widgets ="off";
    $sc_disable_gutenberg_in_posts="off";
    if ( class_exists('Redux') ) {
    			$sc_disable_gutenberg_widgets  = codebean_option("sc_disable_gutenberg_widgets");
    			$sc_disable_gutenberg_in_posts = codebean_option("sc_disable_gutenberg_in_posts");
    			
    }
    if($sc_disable_gutenberg_widgets=="1"){
        
        // Disables the block editor from managing widgets in the Gutenberg plugin.
        add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
    
        // Disables the block editor from managing widgets.
        add_filter( 'use_widgets_block_editor', '__return_false' );
    }
    
    if($sc_disable_gutenberg_in_posts=="1"){
        //disable gutenberg
        add_filter('use_block_editor_for_post', '__return_false');
    }
}

/** show navigation on top or side in myaccount panel **/
add_filter( 'body_class','sc_woonavin_account' );

function sc_woonavin_account( $classes){
    
    if ( class_exists('Redux') ) {
    $dashsidebar = codebean_option("my_account_page_template");
    
    if($dashsidebar !='myaccount-temp-01'){
         $classes[]="sc_woonav_in_side";
    }else{
          $classes[]="";
    }
    return $classes;
        
    }
}

function modify_woocommerce_category_description_position() {
    if(!function_exists("codebean_option")){
        return;
    }
    // Retrieve the option from Redux
    $cat_description_position = codebean_option('place_of_discriptions_of_cats', 'bottom'); // Default value is 'bottom'
    
    // Remove the default action that displays the category description
    remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );

    if ( $cat_description_position === 'top' ) {
        // If the setting is 'top', display the description before the products
        add_action( 'woocommerce_before_shop_loop', 'woocommerce_taxonomy_archive_description', 100 );
    } elseif ( $cat_description_position === 'bottom' ) {
        // If the setting is 'bottom', display the description after the products
        add_action( 'woocommerce_after_shop_loop', 'woocommerce_taxonomy_archive_description', 100 );
    }
}
add_action( 'wp', 'modify_woocommerce_category_description_position' );


/* adding user avatar to woocommerce dashboard */
add_action('woocommerce_before_account_navigation','sc_studi_adding_user_avatar');
function sc_studi_adding_user_avatar(){
    
    $dashsidebar = codebean_option("my_account_page_template");
    //echo $dashsidebar;
    if($dashsidebar =='myaccount-temp-02'){
        $cclass="style='display:none'";
    }else{
         $cclass="";
    }
    
	?>
	<div class="row my_acount_topbar">
	<div class="col-md-2 col-xs-12 sc_studi_account_info">
        <div class="account-avatar">
			<?php
			$user = wp_get_current_user();
			 
			if ( $user ) :
			$user_display_name = $user->data->display_name;
			$picture_id = get_user_meta($user->data->ID,'profile_pic');
			if($picture_id){$imageLink = wp_get_attachment_url( $picture_id[0] );}else{$imageLink = esc_url( get_avatar_url( $user->ID ) );}
				?>
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>"> <img class='profimage' src="<?php echo $imageLink;  ?>" /></a>
			<?php 
			
			endif; ?>
		</div>
		<?php echo "<span class='userTitle'>$user_display_name</span>";?>
	</div>	    
	<div class="col-md-7 col-xs-12">
	    <div class="panel_left_top dashboard_nav_items" <?php echo $cclass; ?>>
		       
		        
		          
		          <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) { 
		              $menu_bg_color = 'primary';
		              $menu_txt_color = 'primary';
		          switch($endpoint){
		              case "dashboard":
		              $menu_icon = "window-alt";
		              $menu_bg_color = 'success';
		              $menu_txt_color = 'success';
		              break;
		              case "orders":
		              $menu_icon = "book";
		              break;
		              case "purchased-products":
		              $menu_icon = "shopping-bag";
		              break;
		              case "user_comments":
		              $menu_icon = "comments";
		              break;
		              case "downloads":
		              $menu_icon = "download";
		              break;
		              case "edit-address":
		              $menu_icon = "map";
		              break;
		              case "woo-wallet":
		              $menu_icon = "wallet";
		              break;
                      case "user-tickets":
		              $menu_icon = "ticket";
		              break;
		              case "edit-account":
		              $menu_icon = "edit";
		              break;
		              case "events":
		              $menu_icon = "calendar-alt";
		              break;
		              case "swss-user-tickets-area":
		              $menu_icon = "ticket";
		              break;
		              case "wishlist":
		              $menu_icon = "heart";
		              break;
		              case "customer-logout":
		              $menu_icon = "sign-out-alt";
		              $menu_bg_color = 'danger';
		              $menu_txt_color = 'danger';
		              break;
		              default:
		              $menu_icon = "list";
		              break;
		          }
		          $active_hint = "";
		          $current = wc_get_account_menu_item_classes( $endpoint );
		          //$current_title="";
		          //$current_endpoint="";
		          if (strpos($current, 'is-active') !== false) {
                       $current_title = $label;
                       $current_endpoint = $endpoint;
                       $active_hint = "hint--always";
                    }
		         
		          ?>
			        <a data-tooltip="<?php echo esc_html( $label ); ?>" aria-label="<?php echo esc_html( $label ); ?>" class="<?php echo $active_hint;?> hint--top btn btn-link <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>"  type="button" aria-expanded="false" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
		            <span>
		                <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		                    <div class="icon-wrapper-bg bg-<?php echo $menu_bg_color;?>"></div>
		                    <i class="fal fa-<?php echo $menu_icon." ".$endpoint;?> text-<?php echo $menu_txt_color;?>"></i>
		                    </div>
		              </span>
		          </a>
		                <?php } ?>
		       
		     </div>
<div class="row sc_dashboard_title" style="display:none">
	    <div class="col-md-4"></div>
	    <div class="col-md-4"><span data-page_title="<?php echo esc_html( $current_title );?>" class="sc_dashboard_title_holder"><?php echo esc_html( $current_title );?></span></div>
	    <div class="col-md-4"></div>
	</div>
		     
	</div>

		<div class="col-md-3 col-xs-12 studi_dash_datebox"> 
		    <div class="panel_left_top" style="  ">
		        
		        <a data-tooltip="<?php echo esc_html__( 'Home Page', 'studiare' );?>" aria-label="<?php echo esc_html__( 'Home Page', 'studiare' );?>" class="hint--top-left btn btn-link "  type="button" aria-expanded="false" href="<?php echo get_site_url();?>">
		            <span>
		                <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		                    <div class="icon-wrapper-bg bg-success"></div>
		                    <i class="fal fa-home text-success"></i>
		                    </div>
		              </span>
		          </a>
		        
		       <time class="text-primary"><?php echo date_i18n('l - Y/m/d'); ?> </time>


<?php echo do_shortcode("[studi_notifi tooltip='yes']"); ?>

		       
		        
		         
		     </div>
		 </div>

	</div>
<!-- start dashboard title -->	
<div class="row sc_dashboard_breadcrumb">
	    <div class="col-md-2"></div>
	    <div class="col-md-10 col-xs-12"><div  class="sc_breadcrumb"><i class="fal fa-window-alt dashboard text-success"></i> 
	    <?php
	    $home_title = __( 'Dashboard','studiare' );
	    if($current_endpoint !='dashboard'){echo "$home_title / $current_title";}else{
	         echo esc_html( $current_title );
	    }
	    ?></div></div>

</div>
<!-- end dashboard title -->	
<!--start notifications area-->	
<div class="row studi_notif_area" style="display:none;">
    <div class="col-md-12">
    <div class="studi_notif_content">
        <h2><?php __( 'Latest Notifications','studiare' ); ?></h2>
    </div>
    </div>
</div>
<!--end notifications area-->	

<?php //do_action( 'woocommerce_before_account_navigation' );?>	
<div class="studi_top_accoun_nav_holder">
<div class="studi_top_accoun_nav">
	
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<div class="top_accoun_nav_item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</div>
		<?php endforeach; ?>
	
</div>
</div>
<?php do_action( 'woocommerce_after_account_navigation' );?>	
	<?php
}


/**
 * Add Group Fonts
 **/

add_filter( 'elementor/fonts/groups', function( $font_groups ) {
  $font_groups['studiare_fonts'] = __( 'Studiare Fonts','studiare' );
  return $font_groups;
},10,1 );
add_filter( 'elementor/fonts/additional_fonts', function( $additional_fonts ) {
  // Key/value
  //Font name/font group
  $additional_fonts['sc_iranyekan']  = 'studiare_fonts';
  $additional_fonts['sc_iransans']   = 'studiare_fonts';
  $additional_fonts['IRANSansX_SunCode']   = 'IRANSansX_SunCode';
  $additional_fonts['IRANSansX_English_Numbers']   = 'IRANSansX_English_Numbers';
  $additional_fonts['sc_iransansdn'] = 'studiare_fonts';
  $additional_fonts['sc_dana']       = 'studiare_fonts';
  $additional_fonts['Yekan_Bakh']       = 'studiare_fonts';
  $additional_fonts['sc_iran']       = 'studiare_fonts';
  $additional_fonts['Azhdar']       = 'studiare_fonts';
  $additional_fonts['Pelak']       = 'studiare_fonts';
  $additional_fonts['sc_mahboobeh']       = 'studiare_fonts';
  $additional_fonts['sc_anjoman']       = 'studiare_fonts';
  $additional_fonts['Lalezar-Regular']       = 'studiare_fonts';
  $additional_fonts['scirsnsdn']       = 'studiare_fonts';
  $additional_fonts['Javanweb']       = 'studiare_fonts';
  $additional_fonts['Modam']       = 'studiare_fonts';
  $additional_fonts['Doran']       = 'studiare_fonts';
  $additional_fonts['farhang_fa_num']       = 'studiare_fonts';
  $additional_fonts['rokh']       = 'studiare_fonts';
  $additional_fonts['Peyda']       = 'studiare_fonts';
  $additional_fonts['Shoor']       = 'studiare_fonts';
  $additional_fonts['ShoorRounded']       = 'studiare_fonts';
  $additional_fonts['Azar']       = 'studiare_fonts';
  $additional_fonts['Edameh']       = 'studiare_fonts';
  $additional_fonts['MahalWebFN']       = 'studiare_fonts';
  $additional_fonts['Darvish']       = 'studiare_fonts';
  $additional_fonts['Gozar']       = 'studiare_fonts';
  $additional_fonts['GramophoneFaNum-Clean']       = 'studiare_fonts';
  $additional_fonts['GramophoneFaNum-CleanCnd']       = 'studiare_fonts';
  $additional_fonts['GramophoneFaNum-Grunge']       = 'studiare_fonts';
  $additional_fonts['GramophoneFaNum-Stone']       = 'studiare_fonts';
  $additional_fonts['Kamand']       = 'studiare_fonts';
  $additional_fonts['custom_one']       = 'studiare_fonts';
  $additional_fonts['custom_two']       = 'studiare_fonts';
  $additional_fonts['custom_three']       = 'studiare_fonts';
  $additional_fonts['custom_four']       = 'studiare_fonts';
  $additional_fonts['custom_five']       = 'studiare_fonts';
  return $additional_fonts;
},10,1 );


/* add course reached capacity badge */
add_action('woocommerce_before_single_product_summary','sc_add_reached_badge');
function sc_add_reached_badge(){
	$product_single_outstock    = codebean_option('product_single_outstock');
	$product_single_outstock_message    = codebean_option('product_single_outstock_message');
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() && $product_single_outstock ){
	/*	echo "<div class='sc_outofstock'>$product_single_outstock_message</div>";*/
	}
}

/* related products */
//add_action( 'woocommerce_single_product_summary', 'sc_related_courses', 20 );
function sc_related_courses(){
	
	if(!codebean_option('related_course_product')){return;}
	
	$related_products_count = codebean_option('related_products_count')?:1;
	$related_products_base = codebean_option('related_products_base')?:'product_cat';
    global $post;
    $genID = $post->ID;
    $cats_array=array();
	// get categories
	$terms = wp_get_post_terms( $post->ID, $related_products_base );//'product_cat'
	foreach ( $terms as $term ) $cats_array[] = $term->term_id;
		$query_args = array( 
		'orderby' => 'rand', 
		'post__not_in' => array( $post->ID ), 
		'posts_per_page' => $related_products_count, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 
		'tax_query' => array(
			array(
			'taxonomy' => $related_products_base,
			'field' => 'id',
			'terms' => $cats_array
			))
		);
	$r = new WP_Query($query_args);
	$navs="true";
	$dots="true";
	if ($r->have_posts()) { ?>



    <div class="sc_related_courses_holder product-single-content">
        <h2><?php _e( 'Related Items', 'studiare' ); ?></h2>
<div class="products sc_related_courses owl-carousel owl-rtl owl-theme" data-show_nav="<?php echo $navs; ?>" data-show_dots="<?php echo $dots; ?>">
        <?php //woocommerce_product_loop_start(); ?>

            <?php while ($r->have_posts()) : $r->the_post(); global $product; ?>

                <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php 
           
            endwhile; // end of the loop. ?>

        <?php //woocommerce_product_loop_end();
   $prefix = '_studiare_';
	$single_product_layout  = codebean_option('single_product_layout')?:"layout-01";
	$selected_layout_in_edit_pro = get_post_meta($genID, $prefix . 'sc_pro_layout', true );
    if(!empty($selected_layout_in_edit_pro)){
        $single_product_layout = $selected_layout_in_edit_pro;
    }  
	switch ($single_product_layout){
        case "layout-01":
            $related_columns        = codebean_option('related_products_per_slide')?:2;     
            break;
        case "layout-02":
            $related_columns        = codebean_option('related_products_per_slide_ltwo')?:3;     
            break;
        case "layout-03":
            $related_columns        = codebean_option('related_products_per_slide_lthree')?:3;     
            break;
        default:
            $related_columns        = codebean_option('related_products_per_slide')?:2;       
	}
//	echo $single_product_layout.' - '.$related_columns;
        
        ?>
</div>
    </div>
<script>
            jQuery(document).ready(function(){
                 jQuery('.sc_related_courses').each(
                    function(){
                        var numberofcols = jQuery(this).data('numberofcols');
                        var show_nav = jQuery(this).data('show_nav');
                        var show_dots = jQuery(this).data('show_dots');
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:10,
                            nav:show_nav,
                            dots:show_dots,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:1,
									nav:true,
									dots:false,
                                },
                                600:{
                                    items:2
                                },
                                1000:{
                                    items:<?php echo $related_columns; ?>
                                }
                            }
                        });
                    }
                );
               
                
            });
        </script>
<?php

wp_reset_query();
}
}

if(!function_exists('sc_studi_dl_file')){
	function sc_studi_dl_file($file_url){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header("Content-Length: ".sc_studi_get_file_size($file_url));
		header('Content-Disposition: attachment; filename='.basename($file_url)); 
		// header('Content-Transfer-Encoding: chunked'); 
		header('Content-Transfer-Encoding: binary'); 
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		$stream = fopen('php://output', 'w');
		$ch = curl_init($file_url);
		//curl_setopt($ch, CURLOPT_VERBOSE, FALSE);

		// curl_setopt($ch, CURLOPT_INFILESIZE, sc_studi_get_file_size($file_url));
		// curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_url));
		curl_setopt($ch, CURLOPT_READFUNCTION, function($ch, $fd, $length) use ($stream) {
			return fwrite($stream, fread($fd, $length));
		});
		curl_exec($ch);
		curl_close($ch);
		exit();
	}
} 

/* pre footer builder */
function sc_studi_pre_footer_builder(){
	$sc_before_footer    = codebean_option('sc_before_footer')?:0;
	$gen_page_id = codebean_option('sc_before_footer_content');
	if($sc_before_footer==0 || $gen_page_id=='' || empty($gen_page_id)){return;}	
	$slug = get_post_field( 'post_name', get_post($gen_page_id) );
	if(!empty($slug)){?>
		<style>.main-page-content {padding-bottom: 80px !important;}</style>
		<div class="studi_pre_footer"><?php
		// echo show_post($slug);
		$myPrefooter = get_post($gen_page_id);
		//echo do_shortcode($myPrefooter->post_content);
		
		                    $vc_enabled = get_post_meta($gen_page_id, '_wpb_vc_js_status', true);
							if($vc_enabled=='true'){
		                        echo do_shortcode($myPrefooter->post_content);
							}
		                    
		                    $contentElementor = "";

                            if (class_exists("\\Elementor\\Plugin")) {

                                $pluginElementor = \Elementor\Plugin::instance();
                                $contentElementor = $pluginElementor->frontend->get_builder_content($gen_page_id);
                            }
                            
                            echo $contentElementor;
		
		?>
		</div>
		<?php
		}
}
 
/**
 * check if user bought a product by user id
 * https://stackoverflow.com/questions/38769888/check-if-a-user-has-purchased-specific-products-in-woocommerce
 * */
function studi_has_bought_items( $user_var = 0,  $product_ids = 0 ) {
    global $wpdb;
    
    if($user_var==0){return false;}
    // Based on user ID (registered users)
    if ( is_numeric( $user_var) ) { 
        $meta_key     = '_customer_user';
        $meta_value   = $user_var == 0 ? (int) get_current_user_id() : (int) $user_var;
    } 
    // Based on billing email (Guest users)
    else { 
        $meta_key     = '_billing_email';
        $meta_value   = sanitize_email( $user_var );
    }
    
    $paid_statuses    = array_map( 'esc_sql', wc_get_is_paid_statuses() );
    $product_ids      = is_array( $product_ids ) ? implode(',', $product_ids) : $product_ids;

    $line_meta_value  = $product_ids !=  ( 0 || '' ) ? 'AND woim.meta_value IN ('.$product_ids.')' : 'AND woim.meta_value != 0';

    // Count the number of products
    $count = $wpdb->get_var( "
        SELECT COUNT(p.ID) FROM {$wpdb->prefix}posts AS p
        INNER JOIN {$wpdb->prefix}postmeta AS pm ON p.ID = pm.post_id
        INNER JOIN {$wpdb->prefix}woocommerce_order_items AS woi ON p.ID = woi.order_id
        INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woim ON woi.order_item_id = woim.order_item_id
        WHERE p.post_status IN ( 'wc-" . implode( "','wc-", $paid_statuses ) . "' )
        AND pm.meta_key = '$meta_key'
        AND pm.meta_value = '$meta_value'
        AND woim.meta_key IN ( '_product_id', '_variation_id' ) $line_meta_value 
    " );

    // Return true if count is higher than 0 (or false)
    return $count > 0 ? "true" : "false";
}


function studi_hex_to_rgba($hex,$alpha){
    
    $hex = preg_replace("/[^0-9a-fA-F]/", "", $hex);
    $split = str_split($hex, 2);
    $r = hexdec($split[0]);
    $g = hexdec($split[1]);
    $b = hexdec($split[2]);
    return "rgba(" . $r . ", " . $g . ", " . $b . " , " . $alpha . ")";
}
 
 
 //add currency for events
function sc_add_rial_to_events($currencies){
            $currencies["IRR"] ='ایران (ریال)';
            $currencies["IRT"] ='ایران (تومان)';
			return $currencies;

}
add_filter("wpems_currencies","sc_add_rial_to_events");

function sc_add_symbol_to_events($currency = ''){

		switch ( $currency ) {
			case 'IRR' :
			$currency_symbol = 'ریال';
			break;
			case 'IRT' :
			$currency_symbol = 'تومان';
			break;
		}
			return $currency_symbol;

}
add_filter("tp_event_currency_symbol","sc_add_symbol_to_events");
//add currency for events end


/* visual composer integration start */
// New Params for VC
	if ( function_exists( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'sc_image_select',  'sc_param_image_select' );
	}

function sc_param_image_select( $s, $v ) {
		$f = array(
			'id'    => esc_attr( $s['param_name'] ),
			'name'  => esc_attr( $s['param_name'] ),
			'type'  => 'image_select',
			'options' => isset( $s['options'] ) ? $s['options'] : [],
			'radio' => true,
			'title' => '',
			'after'	=> '<input type="hidden" name="' . $s['param_name'] . '" class="wpb_vc_param_value ' . $s['param_name'] . ' '.$s['type'].'_field" value="'.$v.'" />',
			'attributes' => array(
				'class' 			=> 'csf-onload',
				'data-depend-id' 	=> esc_attr( $s['param_name'] )
			),
		);

		if ( function_exists('csf_add_field') ) {
			return '<div class="csf-onload">' . csf_add_field( $f, $v ) . '</div>';
		} else {
			return '<div class="my_param_block">'
				.'<input name="' . esc_attr( $s['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
				esc_attr( $s['param_name'] ) . ' ' .
				esc_attr( $s['type'] ) . '_field" type="text" value="' . esc_attr( $v ) . '" />' .
				'</div>';
		}
	}	
/* visual composer integration end */


/* disabl gutenberg */
// add_filter('use_block_editor_for_post', '__return_false');

/* start get categories for autocomplete field in visual composer */
if(!function_exists('sc_studi_get_categoru_list')){
	function sc_studi_get_categoru_list() {
	
    $categories = get_terms( array(
    'orderby'      => 'name',
    'pad_counts'   => false,
    'hierarchical' => 1,
    'hide_empty'   => false,
    ) );
	$result = array();
    foreach( $categories as $category ) {
        if ($category->taxonomy == 'product_cat' ) {
            $result[] = array(
                'label' => $category->name,
                'value' => $category->term_id
            );
        }
    }
    return $result;
	
	
	}
}
/* end get categories for autocomplete field in visual composer */


/* generate dynamic style */
add_action("wp_head","sc_studi_dynamic_style_generator");
function sc_studi_dynamic_style_generator(){
	$prefix = '_studiare_';
	$post_id = get_the_ID();
	$style="";
	if ( get_post_meta( $post_id, $prefix . 'hide_top_empty_space', true ) ){
		$style .=".main-page-content { padding-top: 0 !important; }";
	}
	if ( get_post_meta( $post_id, $prefix . 'transparent_header_menu_white', true ) ){
	    $style .="header.site-header:not([class*='sc_sticky_active']) .studiare-navigation ul.menu > li > a, header.site-header:not([class*='sc_sticky_active']) .studiare-navigation ul.menu > li >.sc_studi-megamenu-title a:first-child{ color: white }";
	}
	?>
	<style>
	<?php echo $style; ?>
	</style>
	<?php
}


/* darken / lighten color */
function sc_studi_darken_lighten_color($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = preg_replace('/[^0-9A-Fa-f]/', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
    }

    // Split into three parts: R, G, and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color = hexdec($color); // Convert to decimal
        $color = max(0, min(255, $color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}



/* post view counter */
function sc_studi_gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    $viewtitle = __('Views','studiare');
    return "$count $viewtitle";
}
function sc_studi_gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function sc_studi_gt_posts_column_views( $columns ) {
    if ( get_post_type() == 'product'){
        $columns['post_views'] = __('Views','studiare');
    }
    
    return $columns;
}
function sc_studi_gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo sc_studi_gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'sc_studi_gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'sc_studi_gt_posts_custom_column_views' );


/* add fixed add to cart button on single page */
add_action("wp_footer","sc_studi_add_to_cart_fixed_btn");
function sc_studi_add_to_cart_fixed_btn(){
    if ( ! class_exists( 'Redux' ) ) {return;}
	global $product;
	$single_fixed_information = codebean_option('single_fixed_information');
	if(function_exists('is_product') && is_product() && $single_fixed_information==1 ){
		?>
		<div class="sc_studi_btm_addtocart_fixed_btn_holder_container">
		<div class="sc_studi_btm_addtocart_fixed_btn_holder">
			<div class="sc_studi_btm_addtocart_fixed_right_holder">
				<h2><?php echo get_the_title(get_the_ID()); ?></h2>
				<div class="sc_rating_sales_holder">
					<div class="average-rating">
						<div class="avareage-rating-inner">
						
							<div class="average-rating-stars">
								<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
							</div>
						</div>
					</div>
					<?php
					$product_buyers_insingle =codebean_option('product_buyers_insingle');
					if($product_buyers_insingle==1){
					?>
					<div><i class="fal fa-users"></i><?php echo get_post_meta(get_the_ID(),'total_sales', true) ?></div>
					<?php } ?>
				</div>
				
			</div>
		<?php
		$label = apply_filters( 'woocommerce_product_single_add_to_cart_text', '', $product );//version 12.8
		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" onclick=jQuery(".single_add_to_cart_button").click(); rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
			// esc_url( $product->add_to_cart_url() ),
			 'javascript:void(0);' ,
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			$product->is_purchasable() ? 'add_to_cart_button' : '',
			esc_attr( $product->get_type() ),
			//esc_html( $product->add_to_cart_text() )
			esc_html( $label )
		),
	$product );
	
	?>
	</div>
	</div>
	<script>
	jQuery(document).ready(function($){
        $(window).scroll(function (event) {
            var sc = $(window).scrollTop();
			var h = window.innerHeight;
			var footer_offset = jQuery("#footer").offset();
    		var winwidth = $(window).width();
    		if ($(".sc_studi_btm_addtocart_fixed_btn_holder_container").length > 0){
    			/* if(sc>h && sc<footer_offset.top){ //&& winwidth>768
    			    $('.sc_studi_btm_addtocart_fixed_btn_holder_container').addClass('sc_add_to_cart_fixed_active');
    			}else{
    			    $('.sc_studi_btm_addtocart_fixed_btn_holder_container').removeClass('sc_add_to_cart_fixed_active');
    			} */
				// var elementoffset = $('#show_floated_bar_here').offset();
				var elementoffsetlast = $('#footer').offset();
				var scrollBottom = $(this).scrollTop() + $(this).height();
				if ($(this).scrollTop() > h && scrollBottom < elementoffsetlast.top) {
					 $('.sc_studi_btm_addtocart_fixed_btn_holder_container').addClass('sc_add_to_cart_fixed_active');
				} else {
					 $('.sc_studi_btm_addtocart_fixed_btn_holder_container').removeClass('sc_add_to_cart_fixed_active');
				}
    		}
        });
    });
	</script>
	<?php
	
	}

}

///////by www.suncode.ir
function add_class_value_in_any_lang($badge_code){
	switch($badge_code){
		case 'free':
		$result = __('Free','studiare');
		break;
		case 'video':
		$result = __('Video','studiare');
		break;
		case 'exam':
		$result = __('Exam','studiare');
		break;
		case 'quiz':
		$result = __('Quiz','studiare');
		break;
		case 'lecture':
		$result = __('Lecture','studiare');
		break;
		case 'practice':
		$result = __('Practice','studiare');
		break;
		case 'file':
		$result = __('File','studiare');
		break;
		default:
		$result = '';
		break;
	}
	return $result;
}

///////jelogiri az kharoe mojaddad
add_filter('woocommerce_add_to_cart_validation','sd_bought_before_woocommerce_add_to_cart_validation',20, 2);
function sd_bought_before_woocommerce_add_to_cart_validation($valid, $product_id){
    $current_user = wp_get_current_user();
    $prefix = '_studiare_';
    $canbuy = get_post_meta( $product_id, $prefix . 'sc_canbuy_again', true )?:"no";

    if($canbuy != "no"){ return true;}
    if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product_id)) {
        wc_add_notice( __( 'You have already purchased this course and there is no need to purchase it again.', 'studiare' ), 'error' );
        $valid = false;
    }
    $isbought = studi_has_bought_items($current_user->ID,$product_id);
	if($isbought =="true"){
		wc_add_notice( __( 'You have already purchased this course and there is no need to purchase it again.', 'studiare' ), 'error' );
        $valid = false;
	}
    return $valid;
}

///////change add to cart text for purchased items

add_filter( 'woocommerce_product_single_add_to_cart_text', 'bbloomer_custom_add_cart_button_single_product' );

function bbloomer_custom_add_cart_button_single_product( $label ) {
		$prefix = '_studiare_';
		if(! is_admin()){
		        
            $cart_item =  WC()->cart->get_cart();
            if($cart_item){
                
                foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $product = $values['data'];
                if( get_the_ID() == $product->get_id() ) {
                    
                    //enable new buy since version 4
                    $prefix = '_studiare_';
                    $product_id = get_the_ID();
                    $canbuy = get_post_meta( get_the_ID(), $prefix . 'sc_canbuy_again', true )?:"no";
                    if($canbuy != "no"){  }//return $label;
                    else{
                         
                			$c_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_added_to_cart_text', true );
                			if(!empty($c_label)){$label = $c_label;}else{
                				$label =  codebean_option('product_single_sc_added_to_cart_text')?:__('The course is now available in the shopping cart', 'studiare');
                			}
                            
                             echo '
                        <script>
                        jQuery(document).ready(function(){
                            jQuery(".single_add_to_cart_button ").prop("disabled", true);
                            jQuery(".single_add_to_cart_button ").addClass("khariding");
                
                        });
                        </script>
                        ';
                    }
                }
        		else{
        		   
        			$d_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_add_to_cart_text', true );
        			if(!empty($d_label)){$label = $d_label;}else{
        				$label =  codebean_option('product_single_sc_add_to_cart_text')?:__('Add to Cart', 'studiare');
        			}
        				
        			}
            }
                
            }else{
                    $d_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_add_to_cart_text', true );
        			if(!empty($d_label)){$label = $d_label;}else{
        				$label =  codebean_option('product_single_sc_add_to_cart_text')?:__('Add to Cart', 'studiare');
        			}
            }

            
    }
    
    return $label;

}

// Part 2
// Edit Loop Pages Add to Cart

add_filter( 'woocommerce_product_add_to_cart_text', 'bbloomer_custom_add_cart_button_loop', 99, 2 );

function bbloomer_custom_add_cart_button_loop( $label, $product ) {
	$prefix = '_studiare_';
    if (! is_admin() ) {
    if ($product->get_type() == 'simple' && $product->is_purchasable() && $product->is_in_stock() ) {

        foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            if( get_the_ID() == $_product->get_id() ) {
				$c_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_added_to_cart_text', true );
			if(!empty($c_label)){$label = $c_label;}else{
			$label =  codebean_option('product_single_sc_added_to_cart_text')?:__('The course is now available in the shopping cart', 'studiare');
			}
            }
			else{
				$d_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_add_to_cart_text', true );
			if(!empty($d_label)){$label = $d_label;}else{
			$label =  codebean_option('product_single_sc_add_to_cart_text')?:__('Add to Cart', 'studiare');
			}
			}
        }

    }
    }

    return $label;

}

///////end by www.suncode


add_filter( 'woocommerce_product_add_to_cart_text', 'jp_remove_add_to_cart_for_purchased_user' );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'jp_remove_add_to_cart_for_purchased_user' );
function jp_remove_add_to_cart_for_purchased_user($label){
   
	$prefix = '_studiare_';
    $product_id = get_the_ID();
    $canbuy = get_post_meta( get_the_ID(), $prefix . 'sc_canbuy_again', true )?:"no";
    if($canbuy != "no"){ return $label;}
     $current_user = wp_get_current_user();
    if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product_id)) {
		$c_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_purchased_producct_text', true );
			if(!empty($c_label)){$label = $c_label;}else{
		$label = codebean_option('product_single_sc_purchased_producct_text')?:__('You are a student of this course', 'studiare');
		}
        echo '
        <script>
        jQuery(document).ready(function(){
            jQuery(".single_add_to_cart_button ").prop("disabled", true);
            jQuery(".single_add_to_cart_button ").addClass("kharide");
            jQuery(".private-lesson ").addClass("privateunlock");

        });
        </script>
        ';
    }
    
    $isbought = studi_has_bought_items($current_user->ID,$product_id);
	if($isbought =="true"){
		$c_label = get_post_meta( get_the_ID(), $prefix . 'product_single_sc_purchased_producct_text', true );
			if(!empty($c_label)){$label = $c_label;}else{
		$label = codebean_option('product_single_sc_purchased_producct_text')?:__('You are a student of this course', 'studiare');
		}
        echo '
        <script>
        jQuery(document).ready(function(){
            jQuery(".single_add_to_cart_button ").prop("disabled", true);
            jQuery(".single_add_to_cart_button ").addClass("kharide");
            jQuery(".private-lesson ").addClass("privateunlock");

        });
        </script>
        ';
	}
    
     return $label;

}
add_filter( 'woocommerce_default_address_fields' , 'roka_override_address_fields', 999, 1 );
function roka_override_address_fields( $fields ) {
	$persian_sort = array( 1 => 'country', 'state', 'city', 'address_1', 'address_2', 'postcode' );

	foreach( $fields as $key => $field ) {

		if( ! in_array( $key, $persian_sort ) ) {
			$fields[ $key ][ 'persian_sort' ] = 0;
		} else {
			$fields[ $key ][ 'persian_sort' ] = array_search( $key, $persian_sort );
		}

	}

	uasort( $fields, function( $val1, $val2 ) use( $persian_sort ) {

		if( $val1[ 'persian_sort' ] == 0 || $val2[ 'persian_sort' ] == 0 ) {
			return 0;
		}

		return $val1[ 'persian_sort' ] > $val2[ 'persian_sort' ] ? 1 : -1;
	} );

	$i = 10;

	foreach( $fields as $key => $field ) {
		$fields[ $key ][ 'priority' ] = $i;
		$i += 10;
	}

	return $fields;
}





/* equal height shop products */

// add_action('wp_footer','sc_studi_shop_product_equal_height');	

function sc_studi_shop_product_equal_height(){
if(is_woocommerce()){
?>
	
<script>
jQuery(document).ready(function(){
	

	/* start equal height */
var setProduct_MinHeight = function(minheight = 0) {
  jQuery('.products.grid-view').each(function(i,e){
    var oldminheight = minheight;
    jQuery(e).find('.course-content-holder').each(function(i,e){
      minheight = jQuery(e).height() > minheight ? jQuery(e).height() : minheight;    
    });
	if(jQuery('.course-content-mid').length>0){
		// minheight = minheight + 49;
	}
    jQuery(e).find('.course-content-holder').css("min-height",minheight + "px");
    minheight = oldminheight;
  });
};
setTimeout(function(){
	setProduct_MinHeight();
},1500);

/* start equal height */
});	
</script>
	<?php
	}
}

//add_action( 'wp_enqueue_scripts', 'sc_studi_enqueue_parent_styles' );

function sc_studi_enqueue_parent_styles() {
if(is_child_theme() =="true"){
    // wp_enqueue_style( 'rtl', get_template_directory_uri().'/rtl.css' );
}
	  
	  // wp_enqueue_style( 'studiare', get_template_directory_uri().'/assets/css/studiare.css' );
    
   // 
  
}

if( is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
add_filter ( 'woocommerce_account_menu_items', 'events_log_history_link', 40 );
function events_log_history_link( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 5, true ) 
	+ array( 'events' => esc_html__( 'Events', 'studiare' ),)
	+ array_slice( $menu_links, 5, NULL, true );
 
	return $menu_links;
 
}
/*
 * Part 2. Register Permalink Endpoint
 */
add_action( 'init', 'events_add_endpoint' );
function events_add_endpoint() {
 
	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
	add_rewrite_endpoint( 'events', EP_PAGES );
 
}
/*
 * Part 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
 */
add_action( 'woocommerce_account_events_endpoint', 'events_my_account_endpoint_content' );
function events_my_account_endpoint_content() {
 
	// Of course, you can print dynamic content here, one of the most useful functions here is get_current_user_id()
	echo do_shortcode("[wp_event_account]");
}

}
