<?php
/**
 * Template File for Main Header
 */

$prefix = '_studiare_';


$detect_mobile = new Mobile_Detect;
$show_shopping_icon_in_header_mobile= null;
$show_shopping_icon_in_header= null;

$custom_logo_image = get_theme_file_uri('assets/images/logo_default.svg');
$search_header = true;
$show_search_icon_in_header = false;
$header_button = false;
$header_button_link = 'account';
$header_button_custom_link = null;
$header_button_custom_text = null;

$header_button_type = 'link';
$hb_submenu = null;


if ( class_exists( 'Redux') ) {
	$search_header = codebean_option('topbar_search');
	$show_search_icon_in_header = codebean_option('show_search_icon_in_header');
	$logo_uploaded = codebean_option('custom_logo_image');
	if(isset($logo_uploaded['url']) && $logo_uploaded['url'] != '') {
		$custom_logo_image = $logo_uploaded['url'];
	}
	$header_button = codebean_option('header_button');
	$header_button_link = codebean_option('header_button_link');
	$header_button_custom_link = codebean_option('header_button_custom_link');
	$header_button_custom_text = codebean_option('header_button_custom_text');
	$header_button_custom_text_0 = codebean_option('header_button_custom_text_0')?:"شروع کنید";
	$header_button_custom_text_1 = codebean_option('header_button_custom_text_1')?:"حساب کاربری";
	$header_button_custom_text_2 = codebean_option('header_button_custom_text_2')?:"حساب کاربری";
	$show_notif_icon_in_header = codebean_option("show_notif_icon_in_header");
	 $topbar_search_ajax = codebean_option('topbar_search_ajax');
	 $show_avatar = codebean_option('show_avatar');
	 $show_display_name = codebean_option('show_display_name');
	 
	 //since v 12.7
	 $header_button_type = codebean_option('header_button_type');
	 $hb_submenu = codebean_option('hb_submenu');
	
	$show_shopping_icon_in_header_mobile= codebean_option('show_shopping_icon_in_header_mobile');
    $show_shopping_icon_in_header= codebean_option('show_shopping_icon_in_header');
	
}

/* 
$menu = wp_nav_menu( array(
    'theme_location'  => 'main-menu',
    'container'       => false,
    'menu_class'      => 'menu',
    'echo'            => false
) ); */
$menu = wp_nav_menu( array( 'theme_location' 	=> 'main-menu',
										'menu_class'      	=> 'menu sc_studi-horizontal-menu main-navigation',
										'container_class'	=> 'sc_studi-main-menu visible-lg',
										'fallback_cb' 		=> 'sc_studiFrontendWalker::fallback',
										'walker' 			=> new sc_studiFrontendWalker(),
										'echo'            => false
								  ) );

if ( ! get_post_meta( get_the_ID(),  $prefix . 'header_off', true ) ){
    
    
?>
<header class="site-header">
    <div class="container">
        <div class="site-header-inner">

            <div class="navigation-left">

                <div class="site-logo">
                    <div class="studiare-logo-wrap">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="studiare-logo studiare-main-logo" rel="home">
                            <img    src="<?php echo esc_url( $custom_logo_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    </div>
                </div>

                <div class="site-navigation studiare-navigation" role="navigation">
	                <?php if($menu){echo wp_kses_post($menu);} ?>
                </div>

            </div>
            <?php if ( $header_button ) : ?>
            <?php 
            $header_button_link_show_on_mobile ="show_icon_and_text";  //since ver 12.4
            if ( class_exists( 'Redux') ) {
               $header_button_link_show_on_mobile = codebean_option('header_button_link_show_on_mobile'); //since ver 12.4
            }   
            
            if(function_exists('is_account_page') && !is_account_page() ){ ?>
                <div class="header-button-link <?php echo "sc_lgreg_btn_".$header_button_link_show_on_mobile ;?>">

                    <?php if ( $header_button_link == 'account' || $header_button_link == 'sc_digits') : ?>
                        <?php $account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
                        $current_user = wp_get_current_user();
                        if ( is_user_logged_in() ) { 
                            
                            if($header_button_type == 'link'){
                        ?>
                        
                            <a href="<?php echo esc_url( $account_link ); ?>" class="login-button btn btn-filled"><?php if ( $show_avatar==1) { echo get_avatar( get_current_user_id(), 32 );?> <i class="fas fa-circle scstatus"></i> <?php } else {?><i class="fas fa-circle scstatus"></i><i class="fal fa-user"></i> <?php } ?><span><?php if ( $show_display_name==1) { echo  esc_html( $current_user->display_name );} else echo esc_html($header_button_custom_text_1); ?></span></a>
                            <?php 
                            }
                            else{
                                include_once 'dropdown_file.php'; 
                            }
                            ?>
                        <?php 
                        } elseif ( is_plugin_active( 'digits/digit.php' ) && $header_button_link == 'sc_digits' )  { ?>
                        <a href="#" class="login-button btn btn-filled scdigits"><i class="fal fa-user-plus"></i> <span><?php echo do_shortcode("[dm-modal]"); ?></span></a>
                        <?php } else {?>
                            <a href="#" class="register-modal-opener login-button btn btn-filled"><i class="fal fa-user-plus"></i> <span><?php echo esc_html($header_button_custom_text_0); ?></span></a>
                        <?php } ?>

                    <?php else: ?>
                    <?php if ( is_user_logged_in() ) { ?>
                        <?php if ( $header_button_link == 'custom' && $header_button_type == 'submenu'){ 
                                include_once 'dropdown_file.php'; 
                            }else{ ?>
                                <a href="<?php echo esc_url($header_button_custom_link); ?>" class="btn btn-filled" rel="nofollow"><i class="fal fa-user"></i><span><?php echo esc_html($header_button_custom_text_2); ?></span></a>
                            <?php } ?>
                        
                        <?php }else{ ?>
                        
                        <a href="<?php echo esc_url($header_button_custom_link); ?>" class="btn btn-filled" rel="nofollow"><i class="fal fa-user"></i><span><?php echo esc_html($header_button_custom_text); ?></span></a>
                       
                        <?php } ?>
                    <?php endif; ?>

                </div>
            <?php } ?>
            <?php endif; ?>
            
            <?php 


if($show_notif_icon_in_header=="1"){
    if ( class_exists( 'WooCommerce' ) ) {
    if(!is_account_page() ){
        
        echo "<div class='sc_notif_in_header'>";
        echo do_shortcode("[studi_notifi]"); 
        echo "</div>";
    }
    }
}
?>
            
            
    <?php if($show_search_icon_in_header ){ ?>         
    <div class="top-bar-search top-bar-search-main-header ">
			<a href="#" class="search-form-opener">
				<span class="search-icon">
                    <?php get_template_part('assets/images/search-icon.svg'); ?>
                </span>
				<span class="close-icon">
                    <?php get_template_part( 'assets/images/close-icon.svg'); ?>
                </span>
			</a>
		</div>
		<?php } ?>  
<?php

//if($detect_mobile->isMobile()){echo "mobile";}else{echo "desk";}


$cart_icon = 'false';
//if ($detect_mobile->isMobile() && $show_shopping_icon_in_header_mobile || $show_shopping_icon_in_header) {
if ($detect_mobile->isMobile() && $show_shopping_icon_in_header_mobile){$cart_icon ='true';} 
if(!$detect_mobile->isMobile() && $show_shopping_icon_in_header) {$cart_icon ='true';}
            
            /*

            if ( class_exists( 'Redux' ) ) {
            $cart_icon = codebean_option('off_canvas_cart');
            }

			//if ( $cart_icon && function_exists('WC' ) ) : */
			if ($cart_icon=='true' &&  function_exists('WC' ) ) { ?>
        <div class="top-bar-cart">
            <a href="<?php echo wc_get_cart_url(); ?>" class="mini-cart-opener">
                <span class="bag-icon">
                    <?php get_template_part( 'assets/images/shop-bag-two.svg' ); ?>
                </span>
	            <?php studiare_cart_count(); ?>
            </a>
            <div class="dropdown-cart">
		        <?php

		        // Insert cart widget placeholder - code in woocommerce.js will update this on page load
		        echo '<div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>';

		        ?>
            </div>
         </div>
<?php 
        }; 
//}
?>

            <a href="#" class="mobile-nav-toggle">
                <span class="the-icon"></span>
            </a>
			


        </div>

        <?php if ( $search_header && ! get_post_meta( get_the_ID(), $prefix . 'top_bar_off', true ) ) { 
            
            $is_active_search ="true";}elseif($show_search_icon_in_header){$is_active_search="true";}else{$is_active_search="false";}
            if($is_active_search=="true"){
        ?>
            <?php
   
    if($topbar_search_ajax==1){
    ?>
            <div class="site-search-wrapper sc-ajax-search">
                <?php echo do_shortcode('[wcas-search-form]'); ?>
            </div>
             <?php 
    } else { 
    ?>
             <div class="site-search-wrapper">
                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" class="search-input" placeholder="<?php esc_attr_e( 'Search for courses, products, teachers, posts and ...', 'studiare' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
                    <button type="submit" class="submit">
                        <?php get_template_part( 'assets/images/search-icon.svg' ); ?>
                    </button>
                </form>
            </div>
    <?php } ?>
        <?php 
            }
        //} //endif; ?>
    </div>
</header>
<?php } ?>
<?php //if ( $search_header && ! get_post_meta( get_the_ID(), $prefix . 'top_bar_off', true ) ) : 
   // if($is_active_search=="true"){
?>
    <div class="search-capture-click"></div>
<?php //}//endif; ?>
