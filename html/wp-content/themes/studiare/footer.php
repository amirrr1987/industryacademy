<?php
/**
 * The template for displaying the footer
 */

$prefix = '_studiare_';
$post_id = get_the_ID();

$footer_visiblity      = true;
$footer_widgets_opt    = true;
$footer_coyprights_opt = true;
$back_to_top           = true;
$footer_color_scheme   = 'light';

if ( class_exists('Redux')) {
    $footer_visiblity      = codebean_option('footer_visibility');
    $footer_widgets_opt    = codebean_option('footer_widgets');
    $footer_color_scheme   = codebean_option('footer_color_scheme');
	$footer_coyprights_opt = codebean_option('disable_copyrights');
	$back_to_top           = codebean_option('scroll_top_btn');
	
	//since ver 12.2
	$studi_footer_type = codebean_option('studi_footer_type');
	$footer_page_id    = codebean_option('footer_page_id');
}

//if( ! is_user_logged_in() && is_account_page() ){}else{ 

//since version 12.9 check id of shop pages
// Check if we're on a WooCommerce or archive page
    if (function_exists('is_shop') && is_shop()) {
        $post_id = wc_get_page_id('shop');
    } elseif (function_exists('is_product_category') && is_product_category()) {
        $post_id = get_queried_object_id(); // Get the current category ID
    } elseif (function_exists('is_product_tag') && is_product_tag()) {
        $post_id = get_queried_object_id(); // Get the current tag ID
    } elseif (is_archive()) {
        $post_id = get_queried_object_id(); // Get the ID of the archive
    } else {
        $post_id = get_the_ID(); // Default for regular pages and posts
    }
    

$footer_type =  get_post_meta($post_id, $prefix . 'footer_type', true);

if( empty($footer_type)  || $footer_type=='default_from_theme_options'){
    if($studi_footer_type=='default'){
     $footer_type = 'default';
     
    }
    if($studi_footer_type=='page'){
        $footer_type = 'page';
    }
    
}
if(isset($_GET['s'])){
        $footer_type = 'default';
        $post_id = null;
    }
if(is_category() || is_single() || is_home() || is_author() || is_404()  || is_archive() || is_search()){
	//$footer_type = $studi_footer_type;
	if(empty($footer_type) || $footer_type=='default_from_theme_options'){
	    $footer_type = $studi_footer_type;
	}
}
//echo $post_id."-".$footer_type;
 
/* add pre footer */
if ( ! get_post_meta( $post_id,  $prefix . 'prefooter_off', true ) ){sc_studi_pre_footer_builder();}

?>
<?php if ( studiare_needs_footer() && get_post_meta($post_id, $prefix . 'footerr_type', true)!="off"){ ?>
    <?php if($footer_type !='off'){?>
    <?php if ( $footer_visiblity || ! get_post_meta($post_id, $prefix . 'footer_off', true) || ! get_post_meta($post_id, $prefix . 'copyrights_off', true) ) { ?>
        
        <?php if($footer_type=='default' && $footer_visiblity !='0'){ ?>
        <footer id="footer" class="site-footer footer-color-<?php echo esc_attr( $footer_color_scheme ); ?>">

            <?php if ( $footer_widgets_opt && ! get_post_meta($post_id, $prefix . 'footer_off', true) ) {
                get_template_part( 'inc/templates/footer-widgets' );
            } ?>

            <?php if ( $footer_coyprights_opt && ! get_post_meta( $post_id, $prefix . 'copyrights_off', true ) ) {
                get_template_part( 'inc/templates/footer-copyrights' );
            } ?>


        </footer>
        <?php } ?>
        <!-- new elementor footer start -->
        <?php
        if($footer_type=='page'){     
            $gen_page_id = get_post_meta( $post_id,  $prefix . 'el_footer_page', true );
            if( empty($gen_page_id) || $gen_page_id=='' || $gen_page_id ==null){
                $gen_page_id = $footer_page_id;
            }
            
            if( !empty(get_post_meta($post_id, $prefix . 'footer_type', true)) && get_post_meta($post_id, $prefix . 'footer_type', true)=="default_from_theme_options" ){
                $gen_page_id = codebean_option("footer_page_id");
            }
            
			if(is_category() || is_single() || is_home() || is_author() || is_404()  || is_archive()) {
	           if(empty($gen_page_id)){
	            $gen_page_id = codebean_option("footer_page_id");
	           }
            }
            if(!empty( $_GET['footer_id'] )){
                $gen_page_id = $_GET['footer_id'];
            }
            $slug = get_post_field( 'post_name', get_post($gen_page_id) );
        	if(!empty($slug) || is_category() || is_single() || is_home() || is_author()  || is_archive() || is_search()){?>
        		<style>.main-page-content {padding-bottom: 80px !important;}</style>
        		<div id="footer"  class="el_footer"><?php
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
        ?>		
        <!-- new elementor footer end -->
    <?php } //endif; ?>
<?php } //endif; ?>

<?php }//endif; ?>
<?php 
//remove footer in login page end
?>





</div> <!-- end .wrap -->


<?php if ( $back_to_top ) : ?>
    <a id="back-to-top" class="back-to-top">
        <span id="sc_bt_progress"></span>
        <i class="fa fa-chevron-up"></i>
    </a>
<?php endif; ?>

<?php wp_footer(); ?>
<!-- scroll progress start -->
<?php
$progressbar = 'disable';
$progressbar_color="var(--primary_color)";
if ( class_exists('Redux')) {
    $progressbar = codebean_option('progressbar');
    $progressbar_color = codebean_option('progressbar_color');
}
if($progressbar !='disable'){
    $show_progress = true;
    if($progressbar == 'show_in_singles'){ 
        if( is_single() ){$show_progress = true;}else{$show_progress = false;}
    }
    
    if($show_progress == true){
?>
<style>
#sc_bt_progress { content: ""; background: <?php echo $progressbar_color; ?>; height: 0; width: 100%; display: block; z-index: 0; position: absolute; bottom: 0; }
.back-to-top {  overflow: hidden; }
.back-to-top i {z-index: 9; position: relative; }
#sc_scroll_progress { position: fixed; top: 0; width: 0%; height: 4px; background:  <?php echo $progressbar_color; ?>; z-index: 100000000; }   
</style>
<div id="sc_scroll_progress"></div>

<script>
/** check if height of page changes **/
const resize_ob = new ResizeObserver(function(entries) {
	studi_scroll_progress();
});
resize_ob.observe(document.querySelector("html"));
jQuery(document).ready(function(){studi_scroll_progress();});
function studi_scroll_progress(){
        
        const scrollProgress = document.getElementById('sc_scroll_progress');
        const bactotop = document.getElementById('sc_bt_progress');
        const height =
          document.documentElement.scrollHeight - document.documentElement.clientHeight;
        
        window.addEventListener('scroll', () => {
          const scrollTop =
            document.body.scrollTop || document.documentElement.scrollTop;
          scrollProgress.style.width = `${(scrollTop / height) * 100}%`;
          bactotop.style.height = `${(scrollTop / height) * 100}%`;
        });   
        
}    
</script>
<?php 
    }
}
?>
<!-- scroll progress end -->
</body>
</html>