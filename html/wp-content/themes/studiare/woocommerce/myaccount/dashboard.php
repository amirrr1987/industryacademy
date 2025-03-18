<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes. old 2.6.0
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version    4.4.0   
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}





/* get total number of user comments */
global $wpdb;
$table_name = $wpdb->prefix.'comments';
$user_id = get_current_user_id();
$total_comments = count($wpdb->get_results("SELECT * FROM $table_name WHERE user_id=$user_id ORDER BY comment_date DESC "));
?>
<style>
    .gotoshop { background: var(--primary_color); padding: 10px; border-radius: 5px; color: #fff; position: relative; top: 20px; }
    .gotoshop:hover { color: #fff;}
    .status-user-widget { overflow: hidden; }
    .status-user-widget ul { list-style: none; padding: 0; margin: 0; margin-bottom: 30px; float: right; width: 100%; }
    .status-user-widget ul li { float: right; width: 25%; padding: 0 15px 0 0; }
    .status-user-widget ul li:first-child { padding-right: 0; }
    .status-user-widget ul li .key_wrapper { height: 75px; float: right; width: 100%; color: #666; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; padding: 0 15px; }
    .status-user-widget ul li.all_course .key_wrapper { background: #f8f8f8; }
    .status-user-widget ul li .key_wrapper span.wc-amount { display: block; padding: 17px 0 0; text-align: center; font-weight: 700; font-size: 14px; }
    .status-user-widget ul li .key_wrapper span.title { text-align: center; display: block; padding: 3px 0 0; font-size: 12px; line-height: 20px; }
    .status-user-widget ul li .key_wrapper span.icon { float: right; font-size: 28px; margin-top: 7px; background: rgba(0,0,0,.06); -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; width: 60px; height: 60px; line-height: 64px; text-align: center; }
    @media (max-width: 500px){ .status-user-widget ul li { width: calc((100%/1) - 10px); padding: 0; margin: 5px; }}
    
</style>
<?php 

$total_events = count( get_posts( array('post_type' => 'tp_event', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) );
$total_products = count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) );
$total_posts = count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) );


?>






<!-- grid start -->
<!--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridstack@1.1.2/dist/gridstack.min.css" />
<script src="https://cdn.jsdelivr.net/npm/gridstack@1.1.2/dist/gridstack.all.js"></script>
-->

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/gridstack.min.css" />
<script src="<?php echo get_template_directory_uri();?>/assets/js/gridstack.all.js"></script>
<style>
    .ui-draggable-handle { -ms-touch-action: auto; touch-action: auto; }
    .sc_user_puchased_admin .course-rating-teacher, .sc_user_puchased_admin .course-description,.sc_user_puchased_admin .course-content-mid { display: none !important; }
    .sc_user_puchased_admin .course-item .course-item-inner .course-content-holder .course-content-main { padding: 5px; }
    .sc_user_puchased_admin .course-title { padding: 7px; margin: 0 !important; line-height: 12px !important; font-size: 13px !important; font-weight: 300; min-height: 20px !important; }
   .rtl .grid-stack>.grid-stack-item[data-gs-width='3'] {  right: 0;left: auto; }
   .rtl .grid-stack>.grid-stack-item[data-gs-width='9'] {  right: 0;left: auto; }
   .rtl .grid-stack>.grid-stack-item[data-gs-x='3'] { right: 25%; left: auto; }
   .rtl .grid-stack>.grid-stack-item[data-gs-x='8'] { right: 66.6666666667%;  left: auto;}
   .rtl .grid-stack>.grid-stack-item[data-gs-x='9'] { right: 75%;  left: auto;}
   .rtl .grid-stack>.grid-stack-item[data-gs-x='10'] { right: 83.3333333333%; left: auto; }
   .sc_dashboard_box .icon-wrapper.icon-wrapper-alt.rounded-circle { margin-bottom: 10px; }
   .sc_dashboard_box span.wc-amount { color: #23282d; }
   
   .rtl .grid-stack>.grid-stack-item[data-gs-width='8'] { left: auto; right: 0%; }
   .rtl .grid-stack>.grid-stack-item.sc_incart_box[data-gs-width='3'] { left: 25%; }
</style>

<?php 
    //add support system to myaccount page
    if( class_exists("SWSS_HtmlHelper") ){
        $tickets_in_dashbard_page=null;
        if ( class_exists('Redux')) {
            $tickets_in_dashbard_page = codebean_option('tickets_in_dashbard_page');
        } 
        if($tickets_in_dashbard_page){
	        (new SWSS_HtmlHelper)->swss_show_ticket_stats_infront();
        }
	    
	    
    }
    
  
/** adding grid box based on sidebar **/
$dashsidebar = "myaccount-temp-01";
if ( class_exists('Redux')) {
    $dashsidebar = codebean_option("my_account_page_template");
}
//echo $dashsidebar;
if($dashsidebar =='myaccount-temp-01'){
    

    if( !is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) &&  !is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ){
      $chartW=8; 
      $chartX=0;
    }
    else{$chartW=5;$chartX=3;}
    $PXW_one =2;
    $PX_one =8;
    $PY_one =0;
    
    $PXW_two =2;
    $PX_two =10;
    $PY_two =0;
    
    $PXW_three =2;
    $PX_three =8;
    $PY_three =2;
    
    $PXW_four =2;
    $PX_four =10;
    $PY_four =2;
}else{
    if( !is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) &&  !is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ){
      $chartW=12; 
      $chartX=0;
    }
    else{$chartW=9;$chartX=3;}
    $PXW_one =3;
    $PX_one =0;
    $PY_one =4;
    
    $PXW_two =3;
    $PX_two =3;
    $PY_two =4;
    
    $PXW_three =3;
    $PX_three =6;
    $PY_three =4;
    
    $PXW_four =3;
    $PX_four =9;
    $PY_four =4;
}
?>

<div class="grid-stack">

<?php if( is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ){ ?>
<div class="grid-stack-item <?php if( !is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ){ echo "hidden";}  ?>" data-gs-x="0" data-gs-y="0" data-gs-width="3" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo get_site_url();?>/events">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-primary"></div>
		        <i class="fal fa-calendar-alt text-primary"></i>
		      </div>
            <span class="wc-amount"> <?php echo $total_events; echo str_repeat('&nbsp;', 1); esc_html_e( 'Event', 'studiare' );?></span>
            <div class="wc-information"><?php esc_html_e( 'there is in site', 'studiare' ); ?></div></a>
        </div>
</div>
<?php } ?>
<div class="grid-stack-item" data-gs-x="<?php echo $chartX;?>" data-gs-y="0" data-gs-width="<?php echo $chartW;?>" data-gs-height="4">
    <div class="grid-stack-item-content sc_dashboard_box">
            <?php 
            ob_start();
            include_once 'chart.php';
            echo ob_get_clean();
            ?>
        </div>
</div>
<?php $shop_page_url = get_permalink( wc_get_page_id ( 'shop' ) ); ?>
<div class="grid-stack-item" data-gs-x="<?php echo $PX_one;?>" data-gs-y="<?php echo $PY_one;?>" data-gs-width="<?php echo $PXW_one;?>" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo $shop_page_url;?>">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-primary"></div>
		        <i class="fal fa-book  text-primary"></i>
		      </div>
            <span class="wc-amount"> <?php echo $total_products; echo str_repeat('&nbsp;', 1); esc_html_e( 'Product', 'studiare' ); ?></span>
            <div class="wc-information"><?php esc_html_e( 'there is in site', 'studiare' ); ?></div></a>
        </div>
</div>
<div class="grid-stack-item" data-gs-x="<?php echo $PX_two;?>" data-gs-y="<?php echo $PY_two;?>" data-gs-width="<?php echo $PXW_two;?>" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo get_site_url();?>/my-account/purchased-products">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-success"></div>
		        <i class="fal fa-user-graduate  text-success"></i>
		      </div>
            <span class="wc-amount"> <?php echo sc_populate_products_page(); echo str_repeat('&nbsp;', 1); esc_html_e( 'Product', 'studiare' ); ?></span>
            <div class="wc-information"><?php esc_html_e( 'You have registered', 'studiare' ); ?></div></a>
        </div>
</div>

<?php if( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ){ ?>
<div class="grid-stack-item" data-gs-x="0" data-gs-y="2" data-gs-width="3" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box <?php if( !is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ){ echo "hidden";}  ?>"><a href="<?php echo get_site_url();?>/wishlist">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-warning"></div>
		        <i class="fal fa-heart  text-warning"></i>
		      </div>
            <span class="wc-amount"> <?php if(class_exists("WPcleverWoosw")){echo WPcleverWoosw::get_count();} esc_html_e( 'Product', 'studiare' ); ?></span>
            <div class="wc-information"><?php esc_html_e( 'in Your Whishlist', 'studiare' ); ?></div></a>
        </div>
</div>
<?php } ?>
<div class="grid-stack-item sc_incart_box" data-gs-x="<?php echo $PX_three;?>" data-gs-y="<?php echo $PY_three;?>" data-gs-width="<?php echo $PXW_three;?>" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo get_site_url();?>/my-account/orders">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-danger"></div>
		        <i class="fal fa-cart-plus  text-danger"></i>
		      </div>
            <span class="wc-amount"> <?php echo sc_get_user_orders_on_hold_total(); echo str_repeat('&nbsp;', 1); esc_html_e( 'Product', 'studiare' ); ?></span>
            <div class="wc-information"><?php esc_html_e( 'waiting for payment', 'studiare' ); ?></div></a>
        </div>
</div>
<div class="grid-stack-item" data-gs-x="<?php echo $PX_four;?>" data-gs-y="<?php echo $PY_four;?>" data-gs-width="<?php echo $PXW_four;?>" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo get_site_url();?>/my-account/user_comments/">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-focus"></div>
		        <i class="fal fa-comments  text-primary"></i>
		      </div>
            <span class="wc-amount"> <?php echo $total_comments; echo str_repeat('&nbsp;', 1); esc_html_e( 'Comment', 'studiare' ); ?></span>
            <div class="wc-information"><?php esc_html_e( 'You have write', 'studiare' ); ?></div></a>
        </div>
</div>

<?php 
if(function_exists("woo_wallet")){
  $purch_pro_width = "9"  ;
  $number = 3;
}else{
   $purch_pro_width = "12"  ;
    $number = 4;
}

if ( class_exists('Redux') ) {
    $dashsidebar = codebean_option("my_account_page_template");

    if($dashsidebar !='myaccount-temp-01'){
                 if(function_exists("woo_wallet")){
          $purch_pro_width = "9"  ;
          $number = 2;
        }else{
           $purch_pro_width = "12"  ;
            $number = 3;
        }
    }
}    
?>
<div class="grid-stack-item" data-gs-x="0" data-gs-y="6" data-gs-width="<?php echo $purch_pro_width;?>" data-gs-height="6">
    
    <div class="grid-stack-item-content sc_dashboard_box">
        <div class="icon-wrapper icon-wrapper-alt rounded-circle" style=" display: inline-flex; margin-left: 10px; ">
		  <div class="icon-wrapper-bg bg-success"></div>
		    <i class="fal fa-shopping-basket   text-success"></i>
		</div>           
        <span class="wc-amount"><?php esc_html_e( 'Purchased Products', 'studiare' ); ?></span>
            <?php echo  sc_get_purchased_pro($number) ;    ?>
        </div>
        
</div>

<?php if(function_exists("woo_wallet")){ ?>
<div class="grid-stack-item" data-gs-x="9" data-gs-y="6" data-gs-width="3" data-gs-height="2">
    
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo esc_url( wc_get_account_endpoint_url( get_option( 'woocommerce_woo_wallet_endpoint', 'woo-wallet' ) ));?>">
        <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		    <div class="icon-wrapper-bg bg-success"></div>
		        <i class="fal fa-wallet   text-success"></i>
		</div>
            <span class="wc-amount"> 
                <?php if(function_exists("woo_wallet")){echo  woo_wallet()->wallet->get_wallet_balance( get_current_user_id() ) ;  }            ?>
            </span>
           <div class="wc-information"><?php esc_html_e( 'Your wallet balance', 'studiare' ); ?></div></a>
        </div>
        
</div>


<div class="grid-stack-item" data-gs-x="9" data-gs-y="8" data-gs-width="3" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo esc_url(wc_get_endpoint_url(get_option('woocommerce_woo_wallet_endpoint', 'woo-wallet'), 'add', wc_get_page_permalink('myaccount')));?>">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-primary"></div>
		        <i class="fal fa-plus   text-primary"></i>
		      </div>
            <span class="wc-amount"> 

            </span>
           <div class="wc-information"><?php esc_html_e( 'Increase the amount of the wallet', 'studiare' ); ?></div></a>
        </div>
</div>
<div class="grid-stack-item" data-gs-x="9" data-gs-y="10" data-gs-width="3" data-gs-height="2">
    <div class="grid-stack-item-content sc_dashboard_box"><a href="<?php echo esc_url(wc_get_endpoint_url(get_option('woocommerce_woo_wallet_endpoint', 'woo-wallet'), 'transfer', wc_get_page_permalink('myaccount')));?>">
            <div class="icon-wrapper icon-wrapper-alt rounded-circle">
		      <div class="icon-wrapper-bg bg-warning"></div>
		        <i class="fal fa-random   text-warning"></i>
		      </div>
            <span class="wc-amount"> 
            
            </span>
           <div class="wc-information"><?php esc_html_e( 'Transfer wallet balance', 'studiare' ); ?></div></a>
        </div>
</div>

<?php } ?>
    
</div>



<script type="text/javascript">

    var grid = GridStack.init();
    grid.movable('.grid-stack-item', false);
    grid.resizable('.grid-stack-item', false); 
  
</script>
<!-- grid start -->



<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
