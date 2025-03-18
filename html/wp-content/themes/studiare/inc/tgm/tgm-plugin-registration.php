<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Studiare
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

//add_action( 'tgmpa_register', 'studiare_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
add_action('tgmpa_register', 'studiare_register_plugins');
function studiare_register_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$api = 'https://studiaretheme.ir/api/';
	$plugins = array(
	    array(
			'name'      => esc_html__( 'Redux Framework', 'studiare' ),
			'slug'      => 'redux-framework',
			'required'  => true,
		),
	    array(
			'name'      => esc_html__( 'Studiare Core', 'studiare' ),
			'slug'      => 'studiare-core',
			'source'    => $api . 'studiare-core.zip',
			'required'  => true,
			'version'   => '13.0',
			'force_activation'   => true,
		),
		array(
			'name'      => esc_html__( 'Elementor', 'studiare' ),
			'slug'      => 'elementor',
			'required'  => true,
		),
		array(
			'name'      => esc_html__( 'Elementor Pro', 'studiare' ),
			'slug'      => 'elementor-pro',
			'required'  => true,
			'version'   => '3.26.0',
			'external_url' => $api . 'elementor-pro.zip',
			'source'    => $api . 'elementor-pro.zip',
		),
		array(
			'name'               => esc_html__( 'WooCommerce', 'studiare' ),
			'slug'               => 'woocommerce',
			'required'           => true,
		),
		array(
			'name'               => esc_html__( 'Persian Woocommerce', 'studiare' ),
			'slug'               => 'persian-woocommerce',
			'required'           => true,
		),

		array(
			'name'      => esc_html__( 'Slider Revolution', 'studiare' ),
			'slug'      => 'revslider',
			'source'    => $api . 'revslider.zip',
			'external_url' => $api . 'revslider.zip',
			'required'  => false,
			'version'   => '6.7.24',
		),


		array(
			'name'      => esc_html__( 'Events Manager', 'studiare' ),
			'slug'      => 'wp-events-manager',
			'required'  => false,
		),
		
	array(
			'name'      => esc_html__( 'MailChimp for WordPress', 'studiare' ),
			'slug'      => 'mailchimp-for-wp',
		'required'  => false,
		),

		
		array(
			'name'        => esc_html__( 'FiboSearch', 'studiare' ),
			'slug'        => 'ajax-search-for-woocommerce',
			'required'    => false,
		),
		
		array(
			'name'        => esc_html__( 'Smart Wishlist', 'studiare' ),
			'slug'        => 'woo-smart-wishlist',
			'required'    => false,
		),
		

	);

	$config = array(
		'default_path'    => '',
		'menu'            => 'tgmpa-install-plugins',
		'has_notices'     => true,
		'dismissable'     => true,
		'dismiss_msg'     => '',
		'is_automatic'    => true,
		'message'         => '',
	);

	tgmpa( $plugins, $config );
}
