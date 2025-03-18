<?php
/**
 * single product layout 01
 **/
 $detect_mobile = new Mobile_Detect;
 ?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

       <?php
    $product_sidebar_position = codebean_option('product_sidebar_position');
    if($product_sidebar_position==1){
        $position_of_single_sidebar='screversed';
    }
    else{
          $position_of_single_sidebar='';
    }
    ?>
    <div class="row <?php echo $position_of_single_sidebar; ?>">
        <div class="product-single-main">
        <?php include_once "sc_pro_offer_box.php"; ?>
        <!-- Product Top Part-->
        <div class="product-single-top-part">

                <?php include_once "sc_main_info.php"; ?>
                <!-- Product Gallery -->
                <div class="course-single-gallery">
                    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
                </div>

        </div>
        <?php include_once "sc_public_items.php"; ?>
        <?php include_once "sc_post_excerpt.php"; ?>
        <?php include_once "studi_content.php"; ?>
        <?php 
        if ($detect_mobile->isMobile()) {
            include_once "studi_sidebar.php";
        }
        ?>
        <?php sc_related_courses(); ?>
         <!-- Product Review -->
        <?php include_once "sc_comments.php"; ?>   
        <?php 
    $tickets_status=null;
    if ( class_exists('Redux')) {
        $tickets_status = codebean_option('tickets_status');
    }                 
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
    
    /* adding buyers list since version 12.5 */
    //since version 12.6 user can disable the tab
    $product_single_sc_show_buyers="0";
    if ( class_exists('Redux') ) {
        $product_single_sc_show_buyers = codebean_option("product_single_sc_show_buyers");
    }
    if( $product_single_sc_show_buyers !='0'){
        if( current_user_can( 'administrator' ) ){
            echo "<div class='sc_pro_buyers_list'><h2>".__( 'Buyers List', 'studiare' )."</h2>";
            sc_pro_buyers_list_render(); //show product buyers to admin
            echo "</div>";
        }
    }
        ?>   
        </div>
        <div class="product-single-aside sticky-sidebar">
            <div class="theiaStickySidebar">
                <?php 
                if ($detect_mobile->isMobile()) {
                    
                }else{
                    include_once "studi_sidebar.php";
                }
                ?>
            </div>
        </div> 
       
    </div>

</div> 