<?php

 /**
 * This file will generate studiare panel
 * created date: 18-02-2022 | 1400-11-28
 */

 /**
 * Register Studiare Panel Page.
 */
function studi_add_panel_link() {
    add_menu_page(
        __( 'Studiare Panel', 'studiare' ),
        __( 'Studiare Panel', 'studiare' ),
        'manage_options',
        'studiare_panel',
        'studiare_panel_callback',
        get_template_directory_uri() . '/assets/images/icons/studiare_panel.png',
        3
    );
}
add_action( 'admin_menu', 'studi_add_panel_link', 8 );

function studi_add_panel_link_topbar ($wp_admin_bar) {

    $args = array (
            'id'        => 'studiare-panel',
            'title'     => __( 'Studiare Panel', 'studiare' ),
            'href'      => get_admin_url().'admin.php?page=studiare_panel',
            //'parent'    => 'new-content'
    );

    $wp_admin_bar->add_node( $args );
    
    $args_spanel = array (
            'id'        => 'studiare-theme-settings',
            'title'     => __( 'Theme Settings', 'studiare' ),
            'href'      => get_admin_url().'admin.php?page=theme-options',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_spanel );
    
    $args_sheader = array (
            'id'        => 'studiare-header',
            'title'     => __( 'Header', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=studi_header',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sheader );
    
    $args_sfooter = array (
            'id'        => 'studiare-footer',
            'title'     => __( 'Footer', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=studi_footer',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sfooter );
    
    $args_smegamenu = array (
            'id'        => 'studiare-megamenu',
            'title'     => __( 'Megamenu', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=sc_megamenu',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_smegamenu );
    
    $args_scdownload = array (
            'id'        => 'studiare-download',
            'title'     => __( 'Downloads', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=cdownload',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_scdownload );
    
    $args_sclessons = array (
            'id'        => 'studiare-lessons',
            'title'     => __( 'Lessons', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=studi_lesson',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sclessons );
    
    $args_sc_notification = array (
            'id'        => 'studiare-notifications',
            'title'     => __( 'Notifications', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=sc_notification',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sc_notification );
    
    $args_sc_teacher = array (
            'id'        => 'studiare-teacher',
            'title'     => __( 'Teachers', 'studiare' ),
            'href'      => get_admin_url().'edit.php?post_type=teacher',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sc_teacher );
    
    $args_sc_iplugins = array (
            'id'        => 'studiare-iplugins',
            'title'     => __( 'Install Plugins', 'studiare' ),
            'href'      => get_admin_url().'admin.php?page=tgmpa-install-plugins',
            'parent'    => 'studiare-panel'
    );

    $wp_admin_bar->add_node( $args_sc_iplugins );
}

add_action('admin_bar_menu', 'studi_add_panel_link_topbar',62);


function studi_add_panel_selector_to_admin(){
    $sc_disable_admin_menu_button = codebean_option('sc_disable_admin_menu_button');
    if ($sc_disable_admin_menu_button) :
    ?>
    <style>
       .studi_panel_btn_link a { position: fixed; left: 40px; bottom: 50px; text-decoration: none; background: #03a9f4; padding: 5px; border-radius: 5px; color: #fafafa; box-shadow: 0 0 10px #64b2d5;font-size: 0; transition: .8s ;}
       .studi_panel_btn_link a:hover { font-size: 12px; }
    </style>
    <div class="studi_panel_btn_link">
        <a href="admin.php?page=studiare_panel"><span class="dashicons dashicons-dashboard"></span><?php echo __( 'Studiare Panel', 'studiare' ); ?></a>
    </div>
    <?php
    endif;
}

add_action( 'admin_footer', 'studi_add_panel_selector_to_admin' );
function studiare_panel_callback(){
    
    ?>
    <style>
        .studiare_panel_holder { margin: 20px auto; max-width: 1024px;}
        .studiare_panel_holder:not(:first-child) { padding-top: 3.5rem;}
        .studipnl_header,.studipnl_footer { background: #fff; padding: 20px; border-radius: 7px; box-shadow: 0 0 20px #eceff1; color: #90a4ae;display: flex; justify-content: space-between; }
        .studipnl_header h2 { color: #90a4ae; font-size: 14px; margin: 0; font-weight: 100; }
        .studipnl_content { background: #fff; padding: 20px; border-radius: 7px; box-shadow: 0 0 20px #eceff1; margin: 20px 0;display: flow-root; position: relative;background: repeating-linear-gradient(45deg, white, #fcfdfe 40px); }
        
        
        .studipnl_icon { font-size: 47px; margin-bottom: 15px; color: #eeeeee; position: absolute; transform: rotate(-25deg); bottom: -20px; right: -20px; }
        .studipnl_box a { color: gray; text-decoration: none; font-size: 14px; padding: 0; display: flex; min-height: 100px; align-items: center; justify-content: center; width: 100%;font-variation-settings: "wght" 650; }
        .studipnl_box:hover a, .studipnl_box:hover .studipnl_icon { color: #fff; }
        .studipnl_box:hover { background: #03a9f4;border-radius:10px; }
        .studipnl_box:before { content: ""; width: 50px; height: 50px; background: #03a9f4; position: absolute; left: -25px; top: -25px; border-radius: 0 0 100px;transition: .4s; }
        .studipnl_box:hover:before { transform: scale(2) translate(21px, -6px); z-index: 2; background: #03a9f4; }
        
        .studipnl_boxes { display: block; width: 50%; float: right;}
        .studipnl_box { background:#fff;box-shadow: 0 0 10px #ede7f6; border-radius: 4px; text-align: center; width: calc(33.33% - 30px); margin: 10px; transition: .3s; overflow: hidden; position: relative; min-height: 100px; align-items: center; justify-content: center; display: inline-block; }
        .studipnl_header h2 small { background: gold; border-radius: 3px; position: relative; top: -2px; right: revert; padding: 0 5px; color: yellow; margin: 0 5px; }
        .spicons_description { min-height: 50px; }
        a.sun_rtl_link {color:#80808b; text-decoration: none;  }
        .spicons_cone{width:70%;}
        .spicons_ctwo{width:30%;}
        .studiare-nav { position: relative; }
        .studiare-nav-inner { margin-bottom: 30px; margin-top: 15px; border-bottom: 2px solid rgba(150, 144, 162, 0.15); display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .studiare-nav > a:not(.selected), .studiare-nav .studiare-nav-inner a:not(.selected) { opacity: 0.75; }
        .studiare-nav-inner li:not(:last-child) { margin-right: 26px }
        .rtl .studiare-nav-inner li:not(:last-child) { margin-left: 26px; margin-right: 0; }
        .studiare-nav .docs { position: absolute; right: 0px; top: 0px; margin-right: 0px; }
        .rtl .studiare-nav .docs { left: 0px; right: auto; margin-left: 0px; margin-right: auto; }
        .studiare-nav > a, .studiare-nav .studiare-nav-inner a { padding: 15px 0; display: block; font-size: 1.05em; color: #161519; border-bottom: 2px solid transparent; margin-bottom: -2px; -webkit-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; -o-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; font-variation-settings: "wght" 600;}
        .studiare-nav > a.selected, .studiare-nav .studiare-nav-inner a.selected { border-color: #111013; }
        .studiare-nav-inner li { margin-bottom: 0;}
        .studiare-nav-inner li a { text-decoration: none;}
        .studiare-nav .docs > svg { display: inline-block; vertical-align: middle; margin: -2px 5px 0 0; }
        .rtl .studiare-nav .docs > svg { margin: -2px 0 0 5px; }
        .o-notice.warning { border-left: 5px solid #ec8013; background-color: #f9d9b8; }
        a:focus { box-shadow: none; outline: none; }
        .studiare_panel_holder .notice { margin: 0; }
        mark { background: transparent; }
        .studiare-hub-intro .studiare-hub-container { -webkit-box-pack: justify; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .studiare-hub-intro .details { line-height: 1.5; font-size: inherit; display: -webkit-inline-box; display: -webkit-inline-flex; display: -ms-inline-flexbox; display: inline-flex; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .studiare-hub-intro .details-icon { background-image: url(../wp-content/themes/studiare/assets/images/icons/favicon.png); background-size: contain; background-repeat: no-repeat; height: 40px; width: 40px; }
        .studiare-hub-intro { background-color: rgba(252, 252, 252, 0.9); padding: 10px 20px; min-height: 42px; position: fixed; z-index: 10; left: 160px; right: 0; top: 32px; box-shadow: 0 0 20px #d6d6d6; }
        .rtl .studiare-hub-intro { right: 160px; left: 0; }
        @media screen and (max-width: 782px) { .studiare-hub-intro, .rtl .studiare-hub-intro { right: 0; left: 0; } }
        @media screen and (max-width: 600px) { .studiare-hub-intro { top: 0; } }
        @media screen and (max-width: 960px) and (min-width: 783px) { .studiare-hub-intro { right: 0; left: 36px; }  .rtl .studiare-hub-intro { right: 36px ; left: 0; } }
        .studiare-hub-intro .details h1 { font-size: 1.2em; margin-left: 10px; }
        .rtl .studiare-hub-intro .details h1 { margin-right: 10px; margin-left: 0; }
        .tablenav p { display: none !important; }
       .rtl td.version.column-version span { text-align: left !important; float: left !important; }
       .o-notice.gray { border-left: 5px solid #9E9E9E; background-color: #E0E0E0; }
       .o-notice.gray a.btn { background-color: #9e9e9e; border: 1px solid #9e9e9e}
       @media screen and (max-width: 600px) { .studiare-nav-inner { flex-wrap: wrap; } }
    </style>
    <script>
        jQuery(document).ready(function(){
            jQuery(".studiare_panel_holder #tabs > ul a").on('click', function () {
            jQuery(".studiare_panel_holder #tabs > ul a").removeClass('selected');
            jQuery(this).addClass('selected');

            jQuery('.studiare_panel_holder #tabs .tab-item').hide();
            jQuery(jQuery(this).attr('href')).show();

            return false;
        });
        });
        jQuery(document).ready(function($){
        if ($('#tabs-2 mark.no').length) {
           $('.wp-header-end').after('<div class="notice o-notice warning is-dismissible"><div class="holder"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg> وضعیت سیستم خود را بررسی کنید تا مطمئن شوید که سرور شما به درستی پیکربندی شده است.</div></div>');
        }
        });
    </script>
    <div class="studiare-hub-intro">
		<div class="studiare-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Studiare Panel', 'studiare' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=studiare_panel" class="btn btn-flat"><?php _e( 'Studiare Panel', 'studiare' ); ?></a>
				<a href="admin.php?page=theme-options" class="btn btn-outline"><?php _e( 'Theme Settings', 'studiare' ); ?></a>
			</div>
		</div>
	</div>
    <div class="studiare_panel_holder">
        <div class="wp-header-end"></div>
        <div id="tabs" class="studiare-nav">
				<ul class="studiare-nav-inner">
					<li><a href="#tabs-1" class="selected"><?php _e( 'Studiare Panel', 'studiare' ); ?></a></li>
					<li><a href="#tabs-7"><?php _e( 'Plugins', 'studiare' ); ?></a></li>
					<li><a href="#tabs-2"><?php _e( 'System Status', 'studiare' ); ?></a></li>
					<li><a href="#tabs-3"><?php _e( 'What’s New', 'studiare' ); ?></a></li>
					<li><a href="#tabs-4"><?php _e( 'Help Center', 'studiare' ); ?></a></li>
					<li><a href="#tabs-5"><?php _e( 'FAQs', 'studiare' ); ?></a></li>
					<li><a href="#tabs-6"><?php _e( 'Feedback', 'studiare' ); ?></a></li>
				</ul>

				<!-- Registration container -->
				<div class="tab-item" id="tabs-1">
					<?php include 'studiare-panel-welcome.php'; ?>
				</div>

				<!-- System status container -->
				<div class="tab-item" id="tabs-2" style="display: none;">
					<?php include 'system-status-section.php'; ?>
				</div>
				
				<!-- What’s new container -->
				<div class="tab-item" id="tabs-3" style="display: none;">
					<?php include 'whats-new-section.php'; ?>
				</div>

				<!-- Help container -->
				<div class="tab-item" id="tabs-4" style="display: none;">
					<?php include 'help-section.php'; ?>
				</div>

				<!-- Help container -->
				<div class="tab-item" id="tabs-5" style="display: none;">
					<?php include 'faq-section.php'; ?>
				</div>
				
				<!-- Help container -->
				<div class="tab-item" id="tabs-6" style="display: none;">
					<?php include 'feedback-section.php'; ?>
				</div>
				
				<!-- Help container -->
				<div class="tab-item" id="tabs-7" style="display: none;">
					<?php include 'plugins-section.php'; ?>
				</div>

				<a class="docs" target="_blank" href="https://docs.studiaretheme.ir/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><?php _e( 'Docs', 'studiare' ); ?></a>
			</div>
        
        
        
            
            
            
        
        <div class="studipnl_footer">
            <a class="sun_rtl_link" target="_blank" href="https://www.rtl-theme.com/author/bagherpebs/products/"><?php echo __('View Suncode Products','studiare'); ?></a>
            <small><?php echo __('All Rights Reserved By Suncode','studiare'); ?> <i class="fal fa-sun"></i></small>
            
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery(".studipnl_box").hover(function(){
                var des = jQuery(this).attr("data-spicon_desc");
                jQuery(".spicons_description").html(des);
            },function(){
                jQuery(".spicons_description").html("");
            });
        });
    </script>
    <?php
    //include 'system-status-section.php';
}
 