<?php
/**
 * The header for our theme
 */
?> <!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<?php if ( !class_exists('Redux')) {
    $txt= "لطفا برای استفاده از قالب افزونه redux‌ را نصب نمایید";
    echo "<div style='paddig:10px;text-align:center'>$txt</div>";
    exit();
}?>
<body <?php body_class(); ?>>

<?php do_action( 'studiare_before_body' ); ?>

<?php

$header_button = true;
$header_button_link = 'account';
$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );

if ( class_exists('Redux') ) {
	$header_button = codebean_option('header_button');
	$header_button_link = codebean_option('header_button_link');
	
	//since ver 12.3
	$studi_header_type = codebean_option('studi_header_type');
	$header_page_id = codebean_option('header_page_id');
} 

$prefix = '_studiare_';
$post_id = get_the_ID();

$header_type =  get_post_meta($post_id, $prefix . 'header_type', true);

if( empty($header_type) || $header_type=='default_from_theme_options' ){
    if($studi_header_type=='default'){
     $header_type = 'default';
     
    }
    if($studi_header_type=='page'){
        $header_type = 'page';
    }
    
}
if( is_category() || is_single() || is_home() || is_author() || is_404() || is_search() || (is_search() && isset($wp_query->query['paged'])) ){
	$header_type = $studi_header_type;
}

?>

<?php if ( ( $header_button ) && ( $header_button_link == 'account' ) ) : ?>

<?php if( function_exists('is_account_page') && !is_account_page() ){ 
    if(!is_user_logged_in()){
    ?>
        <div class="modal studi_loginmodal">
            <div class="login-form-overlay"></div>
            <div class="login-form-modal">
                <div class="login-form-modal-inner">
                    <div class="login-form-modal-box woocommerce">
                         <?php 
    
                         get_template_part('/woocommerce/myaccount/login_template-03' ); ?>
    
                        <a href="javascript:void(0)" class="close">
                            <?php get_template_part('/assets/images/close-icon.svg'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    
    } 
}
?>

<?php endif; ?>
<?php 
$prefix = '_studiare_';

 if(get_post_meta( get_the_ID(),  $prefix . 'transparent_header', true )){
    $transparent_header = get_post_meta( get_the_ID(),  $prefix . 'transparent_header', true );
}else{
    $transparent_header ='off';
}
?>
<div class="wrap <?php if($transparent_header=='on'){echo 'transhead';}?>">
    
<?php 



?>    
    <?php if ( studiare_needs_header() && get_post_meta($post_id, $prefix . 'header_type', true)!="off" ){ //: ?>

        <?php get_template_part('/inc/templates/header/top-bar' ); ?>
        
        <?php 
        if( $header_type == "page"){
            
            $gen_page_id = get_post_meta( get_the_ID(),  $prefix . 'el_header_page', true );
            if( empty($gen_page_id) || $gen_page_id=='' || $gen_page_id ==null){
                $gen_page_id = $header_page_id;
            }
            
            if( !empty(get_post_meta($post_id, $prefix . 'header_type', true)) && get_post_meta($post_id, $prefix . 'header_type', true)=="default_from_theme_options" ){
                $gen_page_id = codebean_option("header_page_id");
            }
			if(is_category() || is_single() || is_home() || is_author() || is_404() || is_search()) {
            	$gen_page_id = codebean_option("header_page_id");
            }
            if(!empty( $_GET['header_id'] )){
                $gen_page_id = $_GET['header_id'];
            }
            
            get_template_part('/elementor/templates/el_header' , null, array('header_page_id' => $gen_page_id)); 
        }else{
            get_template_part( '/inc/templates/header/header-main' ); 
        }
        ?>

        <?php get_template_part('/inc/templates/page-title'); ?>

    <?php } //endif; ?> 