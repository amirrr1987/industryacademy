<?php
/** 
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     7.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<section class="courses-no-post-found not-found">
    <div class="not-found-icon-wrapper">
        <span class="not-found-icon">!</span>
    </div>
    <div class="not-found-content">
        <h1><?php esc_html_e( 'No products were found.', 'studiare' ); ?></h1>
	<?php //wc_print_notice( esc_html_e( 'No products were found matching your selection.', 'studiare' ), 'notice' ); ?>
        
    </div>
</section>
