<?php

$prefix = '_studiare_';
$post_id = get_the_ID();
$is_shop = false;
$is_product = false;
$page_for_posts = get_option('page_for_posts');

if (is_home() || is_category() || is_search() || is_tag() || is_tax()) {
    $post_id = $page_for_posts;
}

/* Adding icon and color to product categories */
$sc_studi_cat_icon = '';
if (class_exists('WooCommerce') && is_product_category()) {
    $category = get_queried_object();
    $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_cat_color', true) ?: "var(--sc-brdcm-bg-background-color)";
    $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_cat_icon', true);
    $sc_studi_cat_color_forbg = get_term_meta($category->term_id, 'sc_studi_cat_color_forbg', true) ?: "yes";

    if ($sc_studi_cat_color_forbg == "yes") {
        echo "<style>.page-title { background-color: " . esc_attr($sc_studi_cat_color) . "; }</style>";
    }
}

/* Enable/Disable page title and breadcrumbs from site settings since version 6 */
$enable_disable_brdcr = $sc_disable_title = $sc_disable_brdcr = 1;
if (class_exists('Redux')) {
    $enable_disable_brdcr = codebean_option('enable_disable_brdcr');
    $sc_disable_title = codebean_option('sc_disable_title');
    $sc_disable_brdcr = codebean_option('sc_disable_brdcr');
    $sc_header_boxed = codebean_option('sc_header_boxed');
    $sc_bdrcm = codebean_option('sc-brdcm-bg');
    
    $css_string = '';
    foreach ($sc_bdrcm as $key => $value) {
        if ($key != "media") {
            $css_string .= "--sc-brdcm-bg-$key: $value;";
        }
    }
    echo "<style>:root { $css_string }</style>";
}

// Set Hsize based on conditions (version 12.6)
$Hsize = (is_singular('post')) ? "h3" : "h1";
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && (is_product() || is_product_category())) {
    $Hsize = "h1";
}

?>
<?php if ((!get_post_meta($post_id, $prefix . 'disable_title', true) || !get_post_meta($post_id, $prefix . 'disable_breadcrumbs', true)) && $enable_disable_brdcr == 1): ?>
    <div class="page-title mnhy <?php echo ($sc_header_boxed == 1) ? 'container' : ''; ?>">
        <div class="container">
            <?php if (!get_post_meta($post_id, $prefix . 'disable_title', true) && $sc_disable_title == 1): ?>
                <?php if (studiare_page_title(false, esc_html__('News', 'studiare'))): ?>
                    <<?php echo $Hsize; ?> class="h2">
                        <?php if ($sc_studi_cat_icon): 
                            $img_link = esc_url(wp_get_attachment_url($sc_studi_cat_icon)); 
                            echo "<img class='sc_studi_cat_icon_in_temp' src='$img_link'>"; 
                        endif; ?>
                        <?php echo studiare_page_title(false, esc_html__('News', 'studiare')); ?>
                    </<?php echo $Hsize; ?>>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (!get_post_meta($post_id, $prefix . 'disable_breadcrumbs', true) && !studiare_is_shop_archive() && $sc_disable_brdcr == 1) {
                studiare_breadcrumbs();
            } elseif (studiare_is_shop_archive() && $sc_disable_brdcr == 1) {
                woocommerce_breadcrumb();
            }
            ?>
        </div>
    </div>
<?php endif; ?>
