<?php 
$show_mode = codebean_option('courses_layout_mode');
if($show_mode=='grid'){$grid_active="active";$list_active="";}
else{$grid_active="";$list_active="active";}
?>
<div class="courses-top-bar">

    <div class="courses-top-bar-inner">

        <div class="courses-top-bar-left">
<?php             if( have_posts() ) {
            // There is a post
?>
             <div class="scorderby"> <?php woocommerce_catalog_ordering() ?></div>
            <div class="layout-switcher switch-courses-layout" data-layout="grid-view">
                <a href="#" class="switcher-view-grid <?php echo $grid_active;?> hint--top" aria-label="<?php esc_html_e( 'grid view', 'studiare' ); ?>">
                    <?php get_template_part('assets/images/grid.svg' ); ?>
                </a>
                <a href="#" class="switcher-view-list <?php echo $list_active;?> hint--top" aria-label="<?php esc_html_e( 'list view', 'studiare' ); ?>">
	                <?php get_template_part('assets/images/list.svg' ); ?>
                </a>
            </div>
            <?php } else {
    // No results
} ?>
            <div class="results-count">
                <?php woocommerce_result_count(); ?>
            </div>
        </div> <!-- end .courses-top-bar-left -->

        <div class="courses-top-bar-right">
            <div class="courses-search">
                <?php get_product_search_form(); ?>
            </div>
        </div> <!-- end .courses-top-bar-right -->

    </div> <!-- end .courses-top-bar-inner -->

</div> <!-- end .courses-top-bar -->
