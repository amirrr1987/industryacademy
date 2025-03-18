<?php
// This is your option name where all the Redux data is stored.
$opt_name = "codebean_option";

$studiare_selectors = codebean_get_config('selectors');

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

/*adding persian fonts array*/
$std_fonts = array(
            'sc_dana'=>'sc_dana',
            'sc_iranyekan'=>'sc_iranyekan',
            'Yekan_Bakh' => 'Yekan_Bakh',
            'sc_iransans'=>'sc_iransans',
            'IRANSansX_SunCode'=>'IRANSansX_SunCode',
            'IRANSansX_English_Numbers'=>'IRANSansX_English_Numbers',
            'Doran'=>'Doran',
            'sc_iransansdn'=>'sc_iransansdn',
            'sc_iran'=>'sc_iran',
            'Azhdar'=>'Azhdar',
            'Pelak'=>'Pelak',
            'sc_mahboobeh'=>'sc_mahboobeh',
            'sc_anjoman'=>'sc_anjoman',
            'scirsnsyekan' => 'scirsnsyekan',
			'Shabnam' => 'Shabnam',
			'Shabnam-Bold' => 'Shabnam-Bold',
			'irsns-regular-fa' => 'irsns-regular-fa',
			'irsns-light-fa' => 'irsns-light-fa',
			'irsns-bold-fa' => 'irsns-bold-fa',
			'Lalezar-Regular' => 'Lalezar-Regular',
			'broyabold' => 'broyabold',
			'rezvan' => 'rezvan',
			'khodkar' => 'khodkar',
			'DastNevis' => 'DastNevis',
			'BTitrBold' => 'BTitrBold',
			'BYekan' => 'BYekan',
			'BZar' => 'BZar',
			'BSinaBold' => 'BSinaBold',
			'BZiba' => 'BZiba',
			'scirsnsdn' => 'scirsnsdn',
			'Javanweb' => 'Javanweb',
			'Modam' => 'Modam',
			'farhang_fa_num' => 'farhang_fa_num',
			'rokh' => 'rokh',
			'Peyda' => 'Peyda',
			'Shoor' => 'Shoor',
			'ShoorRounded' => 'ShoorRounded',
			'Azar' => 'Azar',
			'Edameh' => 'Edameh',
			'MahalWebFN' => 'MahalWebFN',
			'Darvish' => 'Darvish',
			'Gozar' => 'Gozar',
			'GramophoneFaNum-Clean' => 'GramophoneFaNum-Clean',
			'GramophoneFaNum-CleanCnd' => 'GramophoneFaNum-CleanCnd',
			'GramophoneFaNum-Grunge' => 'GramophoneFaNum-Grunge',
			'GramophoneFaNum-Stone' => 'GramophoneFaNum-Stone',
			'Kamand' => 'Kamand',
			'custom_one' => 'custom_one',
			'custom_two' => 'custom_two',
			'custom_three' => 'custom_three',
			'custom_four' => 'custom_four',
			'custom_five' => 'custom_five',
        );
$codebean_social_networks_shortcode = "
<code style='font-size: 10px; display: inline-block; margin-top: 10px;'>[social_networks]</code><br>
<code style='font-size: 10px; display: inline-block; margin-top: 10px;'>[social_networks rounded]</code><br>
<code style='font-size: 10px; display: inline-block; margin-top: 10px;'>[social_networks light]</code><br>";

$args = array(
	'opt_name'             => $opt_name,
	'display_name' => __( $theme->get( 'Name' ), 'studiare' ),
	'display_version'      => $theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'studiare' ),
	'page_title'           => esc_html__( 'Theme Options', 'studiare' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-laptop',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'show_options_object'  => false,
	'update_notice'        => true,
	'customizer'           => true,
	'disable_tracking'     => true,

	// OPTIONAL -> Give you extra features
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-laptop',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => 'theme-options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,

	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	// HINTS
	'hints'                => array(
		'icon'          => 'el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	)

);

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */