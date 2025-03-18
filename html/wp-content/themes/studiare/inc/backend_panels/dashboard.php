<?php
#dashboard
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Dashboard and Login', 'studiare' ),
	'id'               => 'sc_notification_settings',
	'subsection'       => false,
	'icon' => 'fal fa-user-cog',
	'fields' => array(
	    )));
	    Redux::setSection( $opt_name, array(
	        'title' => esc_html__( 'Login Form', 'studiare' ),
	'id' => 'sc_login_form',
	'subsection' => true,
	'icon' => 'fal fa-user-lock',
	'fields' => array(
		array(
			'id'       => 'show_logo_in_login',
			'type'     => 'switch',
			'title'    => esc_html__('Show Logo in Login and Register Page', 'studiare'),
			'default'  => true,
		),
		array(
			'id'        => 'login_page_template',
			'type'      => 'select',
			'title'     => esc_html__( 'Login And Register Layout', 'studiare' ),
			'subtitle'  => esc_html__( 'This Layout will Apply on Woocommerce My Account Page', 'studiare' ),
			'options'   => array(
				'temp-01' => esc_html__( 'Layout 1', 'studiare' ),
				'temp-02' => esc_html__( 'Layout 2', 'studiare' ),
				'temp-03' => esc_html__( 'Layout 3', 'studiare' ),
				'default' => esc_html__( 'Woocommerce Default', 'studiare' ),
			),
			'default'   => 'temp-01',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id' => 'login_image',
			'type' => 'media',
			'desc' => esc_html__('Upload Image: png, jpg or gif file', 'studiare'),
			'operator' => 'and',
			'title' => esc_html__('Login/Register Form Image', 'studiare'),
		),
		array(
			'id'       => 'login-page-main-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Main Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'description' => esc_html__( 'Layout 1 Default Color is  #26a69a - Layout 2 Default Color is  #8224e3', 'studiare' ),
			'output'   => '',
			'default'  => '#8224e3' //#26a69a
		)
		)
) );

/***
 * otp login register
 **/
 $smslink = "https://melipayamak.com/?aff=AB7RE";
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'OTP', 'studiare' ),
	'id' => 'sc_otp_settings',
	'subsection' => true,
	'icon' => 'fal fa-mobile',
	'fields' => array(
	    array(
			'id'       => 'otp',
			'type'     => 'switch',
			'title'    => esc_html__('Activate OTP', 'studiare'),
			'default'  => false,

		),
		array(
			'id'       => 'compulsion_mobile_num',
			'type'     => 'switch',
			'title'    => esc_html__('Compulsion to register mobile number', 'studiare'),
			'default'  => false,
			'required'  => array('otp', '=', 'true'),

		),
	    array(
			'id'        => 'otp_provider',
			'type'      => 'select',
			'title'     => esc_html__( 'OTP Provider', 'studiare' ),
			'subtitle'  => esc_html__( 'Select your otp provider', 'studiare' ),
			'options'   => array(
				'mellipayamak' => esc_html__( 'Melli Payamak', 'studiare' ),
				'suncode'      => esc_html__( 'Suncode', 'studiare' ),
			),
			'default'   => 'mellipayamak',
			'description'   => sprintf(__('You can register sms plan from <a target="_blank" href="%s">mellipayamak</a>','studiare'),$smslink),
			'select2'   => array('allowClear' => false),
			'required'  => array('otp', '=', 'true'),
		),
		array(
			'id'       => 'mellipayamak_api_address',
			'type'     => 'text',
			'title'    => esc_html__('Mellipayamak Api Address', 'studiare'),
			'default'  => '',
			'required'  => array('otp_provider', '=', 'mellipayamak'),
		),
		array(
			'id'       => 'suncode_api_address',
			'type'     => 'text',
			'title'    => esc_html__('Suncode Api Address', 'studiare'),
			'default'  => '',
			'required'  => array('otp_provider', '=', 'suncode'),
		),
		
		
		)
) ); 
# floating contact button
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Account Page', 'studiare' ),
	'id' => 'sc_account_page',
	'subsection' => true,
	'icon' => 'fal fa-id-card',
	'fields' => array(
        array(
			'id'        => 'my_account_page_template',
			'type'      => 'select',
			'title'     => esc_html__( 'Dashboard Page Layout', 'studiare' ),
			'subtitle'  => esc_html__( 'My Account Page Layout and How to Show Menus', 'studiare' ),
			'options'   => array(
				'myaccount-temp-01' => esc_html__( 'Show Menu at Top', 'studiare' ),
				'myaccount-temp-02' => esc_html__( 'Show Menu at Left', 'studiare' ),
				'myaccount-temp-03' => esc_html__( 'Show Menu at Top and Left', 'studiare' ),
			),
			'default'   => 'myaccount-temp-01',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'sc_notif_to_show',
			'title'    => esc_html__( 'Number of Notifications in Dropdown Menu', 'studiare' ),
			'type'     => 'text',
			'default'  => '5',
		),
		array(
			'id'       => 'sc_comments_per_page',
			'title'    => esc_html__( 'Comments Per Page', 'studiare' ),
			'type'     => 'text',
			'default'  => '5',
		),
		array(
        'id'   =>'divider_1',
        'title' => __('Dashboard Page Tabs' ,'studiare'),
        'type' => 'raw'
        ),
        array(
			'id'        => 'sc_active_dash_tab',
			'type'      => 'select',
			'title'     => esc_html__( 'Default Tab', 'studiare' ),
			'options'   => array(
				'notifs' => esc_html__( 'Latest Notifications', 'studiare' ),
				'statics' => esc_html__( 'Website Statistics', 'studiare' ),
				'scCustomTab' => esc_html__( 'Custom Tab', 'studiare' ),
			),
			'default'   => 'notifs',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'show_latest_notifs_tab',
			'type'     => 'switch',
			'title'    => esc_html__('Show Latest Notifications Tab', 'studiare'),
			'default'  => true,
		),
		array(
			'id'       => 'show_statistics_tab',
			'type'     => 'switch',
			'title'    => esc_html__('Show Website Statistics Tab', 'studiare'),
			'default'  => true,
		),
		array(
			'id'       => 'show_custom_tab',
			'type'     => 'switch',
			'title'    => esc_html__('Show Custom Tab', 'studiare'),
			'default'  => false,
		),
		array(
			'id'       => 'dash_custom_tab_title',
			'title'    => esc_html__( 'Custom Tab Title', 'studiare' ),
			'type'     => 'text',
			'required'  => array('show_custom_tab', '=', '1'),
			'default'  => esc_html__( 'Custom Tab', 'studiare' ),
		),
		array(
			'id'       => 'dash_custom_tab_content',
			'title'    => esc_html__( 'Custom Tab Content', 'studiare' ),
			'type'     => 'editor',
			'required'  => array('show_custom_tab', '=', '1'),
			'default'  => '',
		),
		array(
			'id'        => 'sc_custom_logout_url',
			'type'      => 'text',
			'title'     => esc_html__( 'Logout URL', 'studiare' ),
			'description' => esc_html__( 'redirect user after logout from my account page', 'studiare' ),

		),
		
	)
) );