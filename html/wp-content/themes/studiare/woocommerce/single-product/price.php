<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
if ( $product->is_on_sale() )  {$custom_class=""; }else{$custom_class="notOnSale";}
?>

<div class="prcbox">
    <div class="prcrightside">
	<p class="price  <?php echo $custom_class;?>">
		<span class="price-label"><?php esc_html_e('Price', 'studiare'); ?></span>
	</p>		
	</div>
	<div class="prcrleftside">
		<?php echo wp_kses_post( $product->get_price_html() ); ?>

	</div>
</div>