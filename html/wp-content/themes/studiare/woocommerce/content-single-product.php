<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
/* view counter  */
sc_studi_gt_set_post_view();

$rating_enabled = get_option('woocommerce_enable_review_rating');

// Custom Meta
$prefix = '_studiare_';
$teacher_id = get_post_meta( get_the_ID(), $prefix . 'course_teacher', true );
$teacher_id_2 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_2', true );
$teacher_id_3 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_3', true );
$teacher_id_4 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_4', true );

$stock = get_post_meta( get_the_ID(), '_stock', true );


$product_layout = codebean_option("single_product_layout")?:"layout-01";

$selected_layout_in_edit_pro = get_post_meta( get_the_ID(), $prefix . 'sc_pro_layout', true );
if(!empty($selected_layout_in_edit_pro)){
    $product_layout = $selected_layout_in_edit_pro;
}

if(isset($_GET['proLayout'])){
   $product_layout =  $_GET['proLayout'];
}
$product_layout_file = "sc_templates/single_product-".$product_layout.".php";

ob_start();
include_once($product_layout_file);
echo ob_get_clean();
?>

<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
