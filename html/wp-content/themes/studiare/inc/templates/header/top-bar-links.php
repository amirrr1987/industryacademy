<?php
/**
 * The template for displaying top bar links like search, shop cart & secondary menu
 */

$search_icon = true;
$cart_icon = false;
$topbar_woo_wallet = true;
$topbar_menu = true;

if ( class_exists( 'Redux' ) ) {
	$search_icon = codebean_option('topbar_search');
	$cart_icon = codebean_option('topbar_cart');
	$topbar_woo_wallet = codebean_option('topbar_woo_wallet');
	$topbar_menu = codebean_option('topbar_menu');
}

$menu = wp_nav_menu(
	array(
		'theme_location'    => 'top-bar-menu',
		'container'         => 'nav',
		'menu_class'        => 'top-menu',
		'echo'				=> false
	)
);

?>
<div class="top-bar-links">

    <?php if ( has_nav_menu('top-bar-menu') && $topbar_menu ) : ?>
        <div class="top-bar-secondary-menu">
	        <?php echo wp_kses_post($menu); ?>
        </div>
    <?php endif; ?>

	<?php if ( $search_icon ) : ?>
		<div class="top-bar-search">
			<a href="#" class="search-form-opener">
				<span class="search-icon">
                    <?php get_template_part('assets/images/search-icon.svg'); ?>
                </span>
				<span class="close-icon">
                    <?php get_template_part( 'assets/images/close-icon.svg'); ?>
                </span>
			</a>
		</div>
	<?php endif; ?>
	
            	<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) && is_plugin_active( 'woo-wallet/woo-wallet.php' ) && $topbar_woo_wallet && is_user_logged_in()   ) :
                $title      = __( 'Current wallet balance', 'woo-wallet' );
                $menu_item  = '<div class="topbar-woo-wallet"><a class="woo-wallet-menu-contents hint--bottom" href="' . esc_url( wc_get_account_endpoint_url( get_option( 'woocommerce_woo_wallet_endpoint', 'woo-wallet' ) ) ) . '" aria-label="' . $title . '">';
                $menu_item .= '<span dir="rtl" class="fal fa-wallet"></span>&nbsp;';
                $menu_item .= woo_wallet()->wallet->get_wallet_balance( get_current_user_id() );
                $menu_item .= '</a></div>';
                echo $menu_item;
                endif; ?>

    <?php if ( $cart_icon && function_exists('WC' ) ) : ?>
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
    <?php endif; ?>

</div>
