<?php
# Header Settings
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Header', 'studiare' ),
	'id' => 'header',
	'icon' => 'fal fa-window-maximize'
) );

function sc_get_menus_list(){
        
        $menu_list =array();
		$locations = get_terms('nav_menu');
        if($locations){
            foreach($locations as $menu){
                $menu_list[$menu->term_id]=$menu->name;
            }
            if(!empty($menu_list)){
                return $menu_list;
            }
        }
}

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Header Layout', 'studiare' ),
	'id' => 'branding',
	'subsection' => true,
	'icon' => 'fal fa-window-maximize',
	'fields' => array(
	    
	    /* elementor header start */
	    array(
			'id'        => 'studi_header_type',
			'type'      => 'select',
			'title'     => esc_html__( 'Header Type', 'studiare' ),
			'subtitle'  => esc_html__( 'Choose the type of header. Made by studiare codes or design by Elementor', 'studiare' ),
			'description'  => "<span class='notice-badge'>".esc_html__( 'Notice:', 'studiare' )."</span>".esc_html__( 'This option applies to your entire website, if a page has a different header, you can set the header to the default option from the page settings by editing the same page.', 'studiare' ),
			//'required'  => array('footer_visibility', '=', '1'),
			'default'   => 'default',
			'options'   => array(
				'default' => esc_html__( 'Default', 'studiare' ),
				'page'  => esc_html__( 'Page (Elementor)', 'studiare' )
			),
			'select2'   => array('allowClear' => false)
		),
		array(
        'id'       => 'header_page_id',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'studi_header' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Header Page', 'studiare' ),
        'subtitle' => esc_html__( 'First add a Header from Studiare Panel => Headers', 'studiare' ),
		'required'  => array('studi_header_type', '=', 'page'),
        //'desc'     => __( 'Page will be marked as front for this post type', 'studiare' ),
		),
	    /* elementor header end */
	    array(
			'id'       => 'sc_header_bg_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Main Header Background Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => true,
			'preview' => false,
			'output'   => array('.site-header:not(.studi_el_head)'),
			'default'  => array(
				'background-color' => '#fff'
			),
		),
	    
		array(
			'id'        => 'header_height',
			'type'      => 'slider',
			'title'     => esc_html__('Header Height', 'studiare'),
			"default"   => 60,
			"min"       => 40,
			"step"      => 1,
			"max"       => 220,
			'display_value' => 'label',
			'tags'     => 'header size logo height logo size'
		),
		array(
			'id' => 'custom_logo_image',
			'type' => 'media',
			'desc' => esc_html__('Upload Image: png, jpg or gif file', 'studiare'),
			'operator' => 'and',
			'title' => esc_html__('Logo Image', 'studiare'),
		),
		array(
			'id'        => 'logo_img_width',
			'type'      => 'slider',
			'title'     => esc_html__('Logo Max Width (px)', 'studiare'),
			'desc'      => esc_html__('Select the maximum width of the logo in the header in pixels.', 'studiare'),
			"default"   => 200,
			"min"       => 40,
			"step"      => 1,
			"max"       => 600,
			'display_value' => 'label',
			'tags'     => 'logo width logo size'
		),
		array(
			'id'        => 'mobile_logo_img_width',
			'type'      => 'slider',
			'title'     => esc_html__('Mobile Logo Max Width (px)', 'studiare'),
			'desc'      => esc_html__('Select the maximum width of the logo in the mobile header in pixels.', 'studiare'),
			"default"   => 60,
			"min"       => 40,
			"step"      => 1,
			"max"       => 480,
			'display_value' => 'label',
			'tags'     => 'logo width logo size'
		),
		array(
			'id'        => 'logo_img_height',
			'type'      => 'slider',
			'title'     => esc_html__('Logo Max Height (px)', 'studiare'),
			'desc'      => esc_html__('Select the height of the logo in the header in pixels.', 'studiare'),
			"default"   => 50,
			"min"       => 40,
			"step"      => 1,
			"max"       => 600,
			'display_value' => 'label',
			'tags'     => 'logo width logo size'
		),
		array(
			'id'        => 'mobile_logo_img_height',
			'type'      => 'slider',
			'title'     => esc_html__('Mobile Logo Max Height (px)', 'studiare'),
			'desc'      => esc_html__('Select the height of the logo in the mobile header in pixels.', 'studiare'),
			"default"   => 50,
			"min"       => 40,
			"step"      => 1,
			"max"       => 600,
			'display_value' => 'label',
			'tags'     => 'logo width logo size'
		),
		array(
			'id'             => 'logo_padding',
			'type'           => 'spacing',
			'mode'           => 'padding',
			'units'          => array('px'),
			'units_extended' => 'false',
			'title'          => esc_html__('Logo image padding', 'studiare'),
			'desc'           => esc_html__('Add space around the logo image', 'studiare'),
			'default'            => array(
				'padding-top'     => '10px',
				'padding-right'   => '20px',
				'padding-bottom'  => '10px',
				'padding-left'    => '0px',
				'units'          => 'px',
			),
			'tags'     => 'logo padding logo spacing',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'show_notif_icon_in_header',
			'type'     => 'switch',
			'title'    => esc_html__('Show the notification button in the header', 'studiare'),
			'default'  => true,
		),
		array(
			'id'       => 'show_search_icon_in_header',
			'type'     => 'switch',
			'title'    => esc_html__('Display the search icon on the header', 'studiare'),
			'default'  => false,
		),
		array(
			'id'       => 'show_shopping_icon_in_header',
			'type'     => 'switch',
			'title'    => esc_html__('Display the Shopping cart icon on the header', 'studiare'),
			'default'  => true,
		),
		
	),
) );
#header_button
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Header Button', 'studiare' ),
	'id'                => 'sc_header_button',
	'subsection' => true,
	'icon' => 'fal fa-hand-pointer',
	'fields'            => array(
    array(
			'id'        => 'header_button',
			'type'      => 'switch',
			'title'     => esc_html__( 'Header Button', 'studiare' ),
			'subtitle'  => esc_html__( 'Show header button at the right', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'header_button_link',
			'type'      => 'select',
			'title'     => esc_html__( 'Button Link', 'studiare' ),
			'subtitle'  => esc_html__( 'Set Button Function', 'studiare' ),
			'default'   => 'account',
			'options'   => array(
				'account' => esc_html__( 'Show Popup woocommerce Login and Register Form', 'studiare' ),
				'sc_digits' => esc_html__( 'Digits Plugin Login and Register Form', 'studiare' ),
				'custom'  => esc_html__( 'Custom Link', 'studiare' ),
			),
			'required'  => array('header_button', '=', true),
			'select2'   => array('allowClear' => false)
		),
		//since v 12.7 adding submenu 
		array(
			'id'        => 'header_button_type',
			'type'      => 'select',
			'title'     => esc_html__( 'Button Type', 'studiare' ),
			'subtitle'  => esc_html__( 'Select link for direct access or submenu to show a menu under the button', 'studiare' ),
			'default'   => 'link',
			'options'   => array(
				'link' => esc_html__( 'Link', 'studiare' ),
				'submenu' => esc_html__( 'Submenu', 'studiare' ),
			),
			'required'  => array('header_button', '=', true),
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'hb_submenu',
			'type'      => 'select',
			'title'     => esc_html__( 'Menu', 'studiare' ),
			'subtitle'  => esc_html__( 'Select menu to show on button submenu', 'studiare' ),
			'default'   => 'link',
			'options'   => sc_get_menus_list(),
			'required'  => array('header_button_type', '=', 'submenu'),
			'select2'   => array('allowClear' => false)
		),
		
		array(
			'id'        => 'header_button_custom_text_0',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Text For Non-Users', 'studiare' ),
			'required'  => array('header_button_link', '=', 'account'),
			'default'   => esc_html__( 'Start Here', 'studiare' ),
		),
			array(
			'id'        => 'header_button_custom_text_1',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Text For Users', 'studiare' ),
			'required'  => array('header_button_link', '=', 'account'),
			'default'   => esc_html__( 'My Account', 'studiare' ),
		),
		array(
			'id'        => 'header_button_custom_text',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Text', 'studiare' ),
			'required'  => array('header_button_link', '=', 'custom'),
		),
			array(
			'id'        => 'header_button_custom_text_2',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Text For Users', 'studiare' ),
			'required'  => array('header_button_link', '=', 'custom'),
			'default'   => esc_html__( 'My Account', 'studiare' ),
		),
		array(
			'id'        => 'header_button_custom_link',
			'type'      => 'text',
			'title'     => esc_html__( 'Button Link', 'studiare' ),
			'required'  => array('header_button_link', '=', 'custom'),
		),
		array(
			'id'       => 'show_avatar',
			'type'     => 'switch',
			'title'    => esc_html__('Show Avatar', 'studiare'),
			'subtitle'  => esc_html__( 'After the user enters the site, it displays the avatar.', 'studiare' ),
			'required'  => array('header_button_link', '=', 'account'),
			'default'  => true,
		),
		array(
			'id'       => 'show_display_name',
			'type'     => 'switch',
			'title'    => esc_html__('Show User Name', 'studiare'),
			'subtitle'  => esc_html__( 'After the user enters the site, it displays the user display name.', 'studiare' ),
			'required'  => array('header_button_link', '=', 'account'),
			'default'  => true,
		),
		array(
			'id'       => 'sc_header_button_bg_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Button Background Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => true,
			'preview' => false,
			'required' => array('header_button', '=', true),
			'output'   => array('.header-button-link .btn-filled'),
			'default'  => array(
				'background-color' => '#E8F5FB'
			),
		),
		array(
			'id'       => 'sc_header_button_txt_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Header Button Text Color', 'studiare' ),
			'required' => array('header_button', '=', true),
			'output'   => array('.header-button-link .btn-filled span, .site-header .header-button-link .login-button i'),
			'transparent' => false,
			'default'  => '#6c8d9d',
		),
		array( 
        'id'       => 'header_button_border',
        'type'     => 'border',
        'title'    => __('Header Button Border Option', 'studiare'),
        'output'   => array('.header-button-link .btn-filled'),
        'required'  => array('header_button', '=', true),
        'default'  => array(
            'border-color'  => '#e8f5fb', 
            'border-style'  => 'solid', 
            'border-top'    => '1px', 
            'border-right'  => '1px', 
            'border-bottom' => '1px', 
            'border-left'   => '1px'
        )
    ),
	),	
) );    
#menu_style
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Menu Style', 'studiare' ),
	'id'                => 'sc_menu_style',
	'icon' => 'fal fa-highlighter',
	'subsection' => true,
	'fields'            => array(
	    array( 
        'id' => 'menu-style-section',
        'type' => 'section',
        'title' => esc_html__('Menu Styles', 'studiare'),
        'subtitle' => esc_html__('options for styling main menu box.', 'studiare'),
        'indent' => true 
        ),
	    array( 
        'id'       => 'header_menuholder_border',
        'type'     => 'border',
        'title'          => __('Border', 'studiare'),
        'subtitle'    => __('Main Navigation Box Border Option', 'studiare'),
        'output'   => '.sc_studi-main-menu.visible-lg',
        'default'  => array(
            'border-color'  => '#e91e63', 
            'border-style'  => 'solid', 
            'border-top'    => '0', 
            'border-right'  => '0', 
            'border-bottom' => '0', 
            'border-left'   => '0'
        )
        ),
        	array(
        'id'             => 'sc-menuholder-spc',
        'type'           => 'spacing',
        'output'         => '.sc_studi-main-menu.visible-lg',
        'mode'           => 'padding',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Padding', 'studiare'),
        'subtitle'       => __('Menu Box Paddings.', 'studiare'),
        'default'            => array(
            'padding-top'     => '0',
            'padding-right'   => '0',
            'padding-bottom'  => '0',
            'padding-left'    => '0',
            'units'          => 'px',
        ),
    ),
        	array(
        'id'             => 'sc-menuholder-border-radius',
        'type'           => 'spacing',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Border Radius', 'studiare'),
        'subtitle'       => __('Main Navigation Box Border Radius', 'studiare'),
        'default'            => array(
            'margin-top'     => '10px',
            'margin-right'   => '10px',
            'margin-bottom'  => '10px',
            'margin-left'    => '10px',
            'units'          => 'px',
        ),
        'output_variables' => true,
    ),
    array( 
        'id' => 'menu-items-style-section',
        'type' => 'section',
        'title' => esc_html__('Menu Items Styles', 'studiare'),
        'subtitle' => esc_html__('options for styling main menu items.', 'studiare'),
        'indent' => true 
        ),
		array(
			'id'       => 'sc_menu_style_links_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Menu Links Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => array('.sc_studi-main-menu li > a, .sc_studi-main-menu li .sc_studi-megamenu-title, .studiare-navigation ul.menu li.sc_studi-megamenu-menu .sc_studi-megamenu-title > a'),
			'default'  => '#464749', //'#000000'
		),
		array(
			'id'       => 'sc_menu_style_links_hover_active_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Menu Links Hover/Active Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => array('body .studiare-navigation ul.menu li.current-menu-item>a,body .studiare-navigation ul.menu li.current-menu-ancestor>a,body .studiare-navigation ul.menu li.current-menu-parent>a,.studiare-navigation ul.menu li.current-menu-ancestor>a:hover, .studiare-navigation ul.menu li.current-menu-parent>a:hover,.studiare-navigation ul.menu li.current-menu-item>a:hover,.sc_studi-main-menu li > a:hover,.sc_studi-main-menu li > a:active, .studiare-navigation ul.menu li.current-menu-item>a, .studiare-navigation ul.menu li.current-menu-ancestor>a, .sc_studi-main-menu li .sc_studi-megamenu-title:hover, .sc_studi-main-menu li .sc_studi-megamenu-title:active, .studiare-navigation ul.menu li.sc_studi-megamenu-menu .sc_studi-megamenu-title > a:hover'),
			'default'  => '#4ECDC4', //'#000000'
		),
			array(
			'id'       => 'menu_item_active_bg_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu items Hover/Active Background Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => true,
			'preview' => false,
			'output'   => array('body .studiare-navigation ul.menu li.current-menu-item>a,body .studiare-navigation ul.menu li.current-menu-ancestor>a,body .studiare-navigation ul.menu li.current-menu-parent>a,.studiare-navigation ul.menu li.current-menu-ancestor>a:hover, .studiare-navigation ul.menu li.current-menu-parent>a:hover,.studiare-navigation ul.menu li.current-menu-item>a:hover,.sc_studi-main-menu li > a:hover,.sc_studi-main-menu li > a:active, .studiare-navigation ul.menu li.current-menu-item>a, .studiare-navigation ul.menu li.current-menu-ancestor>a, .sc_studi-main-menu li .sc_studi-megamenu-title:hover, .sc_studi-main-menu li .sc_studi-megamenu-title:active, .studiare-navigation ul.menu li.sc_studi-megamenu-menu .sc_studi-megamenu-title > a:hover'),
		),
		 	array(
        'id'             => 'sc-menu-items-border-radius',
        'type'           => 'spacing',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Border Radius', 'studiare'),
        'subtitle'       => __('Menu Items Border Radius', 'studiare'),
        'default'            => array(
            'margin-top'     => '5px',
            'margin-right'   => '5px',
            'margin-bottom'  => '5px',
            'margin-left'    => '5px',
            'units'          => 'px',
        ),
        'output_variables' => true,
    ),
		array(
        'id'             => 'sc-menu-items-mrg',
        'type'           => 'spacing',
        'output'         => '.studiare-navigation ul.menu > li, .studiare-navigation .menu > ul > li',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Margin', 'studiare'),
        'subtitle'       => __('Menu Items Margins.', 'studiare'),
        'top' => 'false',
        'bottom' => 'false',
        'default'            => array(
            'margin-right'     => '5px',
            'margin-left'  => '5px',
            'units'          => 'px',
            ),
        ),
        	array(
        'id'             => 'sc-menu-items-spc',
        'type'           => 'spacing',
        'output'         => '.studiare-navigation ul.menu > li > a, .studiare-navigation .menu > ul > li > a',
        'mode'           => 'padding',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Padding', 'studiare'),
        'subtitle'       => __('Menu Items Paddings.', 'studiare'),
        'default'            => array(
            'padding-top'     => '5px',
            'padding-right'   => '10px',
            'padding-bottom'  => '5px',
            'padding-left'    => '10px',
            'units'          => 'px',
        ),
    ),
    array( 
        'id' => 'submenu-style-section',
        'type' => 'section',
        'title' => esc_html__('Sub-Menu Styles', 'studiare'),
        'subtitle' => esc_html__('options for styling sub-menu items.', 'studiare'),
        'indent' => true 
        ),
        array(
			'id'       => 'sc_sub_menu_style_links_color',
			'type'     => 'color',
			'title'    => esc_html__( 'SubMenu Links Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => array('ul.menu .sc_studi-megamenu-wrapper .sub-menu, .studiare-navigation ul.menu .sub-menu li > a, .sc_studi-main-menu li .sc_studi-megamenu-title, .sc_studi-main-menu li .sc_studi-megamenu-title, .sc_studi-main-menu li .sc_studi-megamenu-title a'),
			'default'  => '#464749', //'#000000'
		),
		array(
			'id'       => 'sc_sub_menu_style_links_hover_active_color',
			'type'     => 'color',
			'title'    => esc_html__( 'SubMenu Links Hover/Active Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => array('.studiare-navigation ul.menu .sub-menu li > a:hover, .studiare-navigation ul.menu .sub-menu li.current-menu-item>a, .sc_studi-main-menu li .sc_studi-megamenu-title:hover, .sc_studi-main-menu li .sc_studi-megamenu-title:active, .studiare-navigation ul.menu li.sc_studi-megamenu-menu .sc_studi-megamenu-title > a:active, .studiare-navigation ul.menu li.sc_studi-megamenu-menu .sc_studi-megamenu-title > a:hover'),
			'default'  => '#4ECDC4', //'#000000'
		),
		array(
			'id'       => 'sub_menu_bg_color',
			'type'     => 'background',
			'title'    => esc_html__( 'SubMenu Background', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => false,
			'preview' => false,
			'output'   => '.sub-menu, .studiare-navigation ul.menu:not(.sc_studi-megamenu-menu) > li:not(.sc_studi-megamenu-menu) ul, .studiare-navigation .menu > ul > li ul',
			'default'  => array(
				'background-color' => '#ffff'
			),
		),
			array(
        'id'             => 'sc-submenu-box-spc',
        'type'           => 'spacing',
        'output'         => '.studiare-navigation ul.menu > li ul, .studiare-navigation .menu > ul > li ul',
        'mode'           => 'padding',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Padding', 'studiare'),
        'subtitle'       => __('Sub-Menu Box Paddings.', 'studiare'),
        'default'            => array(
            'padding-top'     => '0',
            'padding-right'   => '0',
            'padding-bottom'  => '0',
            'padding-left'    => '0',
            'units'          => 'px',
        ),
    ),
    array(
        'id'             => 'sc-submenu-box-border-radius',
        'type'           => 'spacing',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Border Radius', 'studiare'),
        'subtitle'       => __('Sub-Menu Box Border Radius', 'studiare'),
        'default'            => array(
            'margin-top'     => '4px',
            'margin-right'   => '4px',
            'margin-bottom'  => '4px',
            'margin-left'    => '4px',
            'units'          => 'px',
        ),
        'output_variables' => true,
    ),
		array(
			'id'       => 'sub_menu_lines_color',
			'type'     => 'background',
			'title'    => esc_html__( 'SubMenu Lines Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => false,
			'preview' => false,
			'output'   => '.sc_studi-megamenu-holder .sc_studi-megamenu-title:after, .studiare-navigation ul.menu > li ul li:after, .studiare-navigation .menu > ul > li ul li:after',
			'default'  => array(
				'background-color' => '#e9ecef'
			),
		),
		
		array(
        'id'             => 'sc-submenu-items-border-radius',
        'type'           => 'spacing',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Border Radius', 'studiare'),
        'subtitle'       => __('Sub-Menu Items Border Radius', 'studiare'),
        'default'            => array(
            'margin-top'     => '5px',
            'margin-right'   => '5px',
            'margin-bottom'  => '5px',
            'margin-left'    => '5px',
            'units'          => 'px',
        ),
        'output_variables' => true,
    ),
		array(
        'id'             => 'sc-submenu-items-mrg',
        'type'           => 'spacing',
        'output'         => '.studiare-navigation ul.menu>li ul li>a, .studiare-navigation .menu>ul>li ul li>a',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Margin', 'studiare'),
        'subtitle'       => __('Sub-Menu Items Margins.', 'studiare'),
        'default'            => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '0',
            'margin-left'    => '0',
            'units'          => 'px',
            ),
        ),
        	array(
        'id'             => 'sc-submenu-items-spc',
        'type'           => 'spacing',
        'output'         => '.studiare-navigation ul.menu>li ul li>a, .studiare-navigation .menu>ul>li ul li>a',
        'mode'           => 'padding',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Padding', 'studiare'),
        'subtitle'       => __('Sub-Menu Items Paddings.', 'studiare'),
        'default'            => array(
            'padding-top'     => '10px',
            'padding-right'   => '20px',
            'padding-bottom'  => '10px',
            'padding-left'    => '20px',
            'units'          => 'px',
        ),
    ),
		
	)
) );
#top_notiBar
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Top Notification Bar', 'studiare' ),
	'id'                => 'sc_top_notifbar',
	'icon' => 'fal fa-file-alt',
	'subsection' => true,
	'fields'            => array(
	    array(
			'id'       => 'sc_top_notifbar_situ',
			'title'    => esc_html__( 'Show Top Notification Bar', 'studiare' ),
			'type'     => 'switch',
			'default'  => false,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' ),
			'desc'     => __( 'A section will be added at the top of your site. This section displays the content of a desired tab. You can design and customize the page you want with the page builder.', 'studiare' ),
		),
			array(
        'id'       => 'sc_top_notifbar_content',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'Notification Page Content', 'studiare' ),
		'required'  => array('sc_top_notifbar_situ', '=', '1'),
		),
		array(
			'id'       => 'sc_top_notifbar_bg_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Background Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => '',
			'default'  => '#ffd700', //'#000000'
			'required'  => array('sc_top_notifbar_situ', '=', '1'),
		),
		array(
			'id'       => 'sc_top_notifbar_bg',
			'type'     => 'background',
			'background-color' => 'false',
			'title'    => esc_html__( 'Background Image', 'studiare' ),
			'output'   => '.studi_notif_bar',
			'required'  => array('sc_top_notifbar_situ', '=', '1'),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Top Bar', 'studiare' ),
	'id' => 'header-topbar',
	'subsection' => true,
	'icon' => 'fal fa-window',
	'fields' => array(
		array(
			'id'        => 'topbar_display_opt',
			'type'      => 'switch',
			'title'     => esc_html__( 'Top Bar', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'topbar_color',
			'type'      => 'select',
			'title'     => esc_html__( 'Top Bar Text Color', 'studiare' ),
			'default'   => 'light',
			'options'   => array(
				'dark' => esc_html__( 'Dark', 'studiare' ),
				'light'  => esc_html__( 'Light', 'studiare' )
			),
			'required'  => array('topbar_display_opt', '=', '1'),
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'top-bar-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Background Color', 'studiare' ),
			'background-image' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-repeat' => false,
			'transparent' => false,
			'preview' => false,
			'output'   => '.top-bar',
			'default'  => array(
				'background-color' => '#2e3e77'
			),
			'required'  => array('topbar_display_opt', '=', '1'),
		),
		array(
			'id'      => 'top_bar_phone',
			'type'    => 'text',
			'title'   => esc_html__( 'Phone Number', 'studiare' ),
			'default'   => '0123456789',
		),
		array(
			'id'        => 'top_bar_phone_link',
			'type'      => 'switch',
			'title'     => esc_html__( 'Add Link to Phone Number', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'      => 'top_bar_email',
			'type'    => 'text',
			'title'   => esc_html__( 'Email Address', 'studiare' ),
			'default'   => 'info@studiaretheme.ir',
		),
		array(
			'id'        => 'top_bar_email_link',
			'type'      => 'switch',
			'title'     => esc_html__( 'Add Link to Email', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'topbar_menu',
			'type'      => 'switch',
			'title'     => esc_html__( 'Menu', 'studiare' ),
			'description'  => "<span class='notice-badge'>".esc_html__( 'Notice:', 'studiare' )."</span>".esc_html__( 'If this option is enabled, the menu activated from Dashboard > Appearance > Menus should be displayed in the right menu position of the top bar.', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'topbar_search',
			'type'      => 'switch',
			'title'     => esc_html__( 'Search Button', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'topbar_search_ajax',
			'type'      => 'switch',
			'title'     => esc_html__( 'Ajax Search', 'studiare' ),
			'default'   => false,
		),
		array(
			'id'        => 'topbar_cart',
			'type'      => 'switch',
			'title'     => esc_html__( 'Shopping Cart', 'studiare' ),
			'default'   => false,
		),
		array(
			'id'        => 'topbar_woo_wallet',
			'type'      => 'switch',
			'title'     => esc_html__( 'Woocommerce Wallet', 'studiare' ),
			'subtitle'       => __('If the woo wallet plugin is active, it will be displayed.', 'studiare'),
			'default'   => true,
		)
	)
) );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Title And Breadcrumbs', 'studiare' ),
	'id' => 'sc-brdcm',
	'subsection' => true,
	'icon' => 'fal fa-heading',
	'fields' => array(
	    array(
			'id'        => 'enable_disable_brdcr',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Title And Breadcrumbs', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'sc_disable_title',
			'type'      => 'switch',
			'title'     => esc_html__( 'Title', 'studiare' ),
			'default'   => true,
			'required'  => array('enable_disable_brdcr', '=', true),
		),
		array(
			'id'        => 'sc_disable_brdcr',
			'type'      => 'switch',
			'title'     => esc_html__( 'Breadcrumbs', 'studiare' ),
			'default'   => true,
			'required'  => array('enable_disable_brdcr', '=', true),
		),
		array(
			'id'        => 'sc_header_boxed',
			'type'      => 'switch',
			'title'     => esc_html__( 'Boxed Layout', 'studiare' ),
			'default'   => false,
			'required'  => array('enable_disable_brdcr', '=', true),
		),
		array(
			'id'       => 'sc-brdcm-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Background', 'studiare' ),
			'output'   => array('.page-title'),
			'default'  => array(
				'background-color' => '#4ecdc4',
			),
			'required'  => array('enable_disable_brdcr', '=', true),
			//'output_variables' => true,
		),
			array(
        'id'             => 'sc-brdcm-bg-spc',
        'type'           => 'spacing',
        'output'         => array('.page-title'),
        'mode'           => 'padding',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Padding', 'studiare'),
        'subtitle'       => __('Page Title Paddings.', 'studiare'),
        'required'  => array('enable_disable_brdcr', '=', true),
        'default'            => array(
            'padding-top'     => '40px',
            'padding-right'   => '',
            'padding-bottom'  => '30px',
            'padding-left'    => '',
            'units'          => 'px',
        )
			
    ),
    	array(
        'id'             => 'sc-brdcm-bg-mrg',
        'type'           => 'spacing',
        'output'         => array('.page-title'),
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Margin', 'studiare'),
        'subtitle'       => __('Page Title Margins.', 'studiare'),
        'required'  => array('enable_disable_brdcr', '=', true),
        'left' => 'false',
        'right' => 'false',
        'default'            => array(
            'margin-top'     => '0',
            'margin-bottom'  => '0',
            'units'          => 'px',
        ),
    ),
    array( 
        'id'       => 'header_brdcm_border',
        'type'     => 'border',
        'title'    => __('Header Title Border Option', 'studiare'),
        'output'   => array('.page-title'),
        'required'  => array('enable_disable_brdcr', '=', true),
        'default'  => array(
            'border-color'  => '#e91e63', 
            'border-style'  => 'solid', 
            'border-top'    => '0', 
            'border-right'  => '0', 
            'border-bottom' => '0', 
            'border-left'   => '0'
        )
        ),
        	array(
        'id'             => 'sc-brdcm-border-radius',
        'type'           => 'spacing',
        'mode'           => 'margin',
        'units'          => array('em', 'px'),
        'units_extended' => 'false',
        'title'          => __('Border Radius', 'studiare'),
        'required'  => array('enable_disable_brdcr', '=', true),
        'subtitle'       => __('Page Title Border Radius', 'studiare'),
        'default'            => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '0',
            'margin-left'    => '0',
            'units'          => 'px',
        ),
        'output_variables' => true,
    ),
		array(
			'id'       => 'sc-brdcm-bg-txclr',
			'type'     => 'color',
			'title'    => esc_html__( 'Page Title Text Color', 'studiare' ),
			'validate' => 'color',
			'transparent' => false,
			'output'   => array('.page-title .h2,.page-title .breadcrumbs,.woocommerce-breadcrumb a, .breadcrumbs a,.page-title .woocommerce-breadcrumb'),
			'default'  => '#fff',
			'required'  => array('enable_disable_brdcr', '=', true),
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Mobile Header', 'studiare' ),
	'id' => 'mobile-nav',
	'subsection' => true,
	'icon' => 'fal fa-mobile',
	'fields' => array(
	    	array(
			'id'        => 'header_button_link_show_on_mobile',
			'type'      => 'select',
			'title'     => esc_html__( 'Mobile Header Button', 'studiare' ),
			'required'  => array('header_button', '=', true),
			'options'   => array(
				'show_icon' => esc_html__( 'Icon', 'studiare' ),
				'show_text' => esc_html__( 'Text', 'studiare' ),
				'show_icon_and_text'  => esc_html__( 'Icon And Text', 'studiare' ),
				'do_not_show'  => esc_html__( 'Disable Mobile Header Button', 'studiare' ),
			),
			'select2'   => array('allowClear' => false),
			'default'  => 'show_icon_and_text',
		),
	    array(
			'id'       => 'sc_off_canvas_navigation_position',
			'title'    => esc_html__( 'Off Convas Navigation Position', 'studiare' ),
			'subtitle' => esc_html__( 'Select the Position of Navigation in Mobile', 'studiare' ),
			'type'     => 'switch',
			'default'  => false,
			'on'       => esc_html__( 'from Right', 'studiare' ),
			'off'      => esc_html__( 'from Left', 'studiare' ),
		),
	    array(
			'id'       => 'show_shopping_icon_in_header_mobile',
			'type'     => 'switch',
			'title'    => esc_html__('Mobile Header Shopping Cart', 'studiare'),
			'default'  => true,
		),
		array(
			'id' => 'sc_bg_header_color_in_chrome',
			'type' => 'color',
			'validate' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Chrome Mobile Header Background', 'studiare' ),
			'subtitle' => esc_html__( 'Set A Color for Chrome Mobile Browser Addressbar and header Background.', 'studiare' ),
			'default' => '#2e3e77'
		),
		
		array(
			'id'       => 'sc_bg_off_canvas_navigation',
			'type'     => 'background',
			'title' => esc_html__( 'Off Canvas Background Color', 'studiare' ),
			'output'   => '.off-canvas-navigation',
			'default'  => array(
				'background-color' => '#212529'
			)
		),
		array(
			'id' => 'sc_txtcolor_off_canvas_navigation',
			'type' => 'color',
			'validate' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Off Canvas Text Color', 'studiare' ),
			'output'   => array('.off-canvas-main .mobile-menu a, .off-canvas-navigation .off-canvas-cart .cart-icon-link, .off-canvas-main .subtri, .off-canvas-main .mobile-menu ul a, .off-canvas-main .mobile-menu ul, .off-canvas-main .mobile-menu a, .off-canvas-navigation .off-canvas-cart .cart-icon-link, .off-canvas-main .subtri, .off-canvas-main .mobile-menu ul a, .off-canvas-main li .sc_studi-megamenu .sc_studi-megamenu-title'),
			'default' => '#fff'
		),
		array(
			'id' => 'off_canvas_search',
			'type' => 'switch',
			'title' => esc_html__( 'Off Canvas Search', 'studiare' ),
			'default' => true
		),
		array(
			'id' => 'off_canvas_cart',
			'type' => 'switch',
			'title' => esc_html__( 'Off Canvas Shopping Cart', 'studiare' ),
			'default' => true
		),
		array(
			'id' => 'off_canvas_footer',
			'type' => 'textarea',
			'title' => esc_html__( 'Off Canvas Footer Text/Shortcode', 'studiare' ),
			'subtitle' => esc_html__( 'Enter the text you want to be displayed in the mobile navigation footer. You can also use a shortcode. Example: [social_buttons]', 'studiare' )
		),
		array( 
        'id' => 'show-mobile-bottom-navbar',
        'type' => 'section',
        'title' => esc_html__('Bottom Navbar', 'studiare'),
        'subtitle' => esc_html__('options for Mobile Bottom Navbar.', 'studiare'),
        'indent' => true 
        ),
	    array(
			'id'       => 'show_mobile_bottom_navbar',
			'type'     => 'switch',
			'title'    => esc_html__('Show Mobile Bottom Navbar', 'studiare'),
			'subtitle'  => esc_html__( 'Show Navbar in bottom of the mobile devices', 'studiare' ),
			'default'  => true,
		),
		array(
        'id'       => 'mobile_more_menu',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'More Button content', 'studiare' ),
        'subtitle' => esc_html__( 'select a page to view content in more button at the Mobile Bottom Navbar', 'studiare' ),
		'required'  => array('show_mobile_bottom_navbar', '=', 'true'),
		),
		array(
        'id'      => 'mobile-button-nav-blocks',
        'type'    => 'sorter',
        'title'   => esc_html__( 'Mobile Bottom Navbar Items', 'studiare' ),
        'subtitle'    => esc_html__( 'Organize how you want the layout to appear on the Mobile Bottom Navbar', 'studiare' ),
        'desc'    => esc_html__( 'Drag and Drop Items', 'studiare' ),
        'required'  => array('show_mobile_bottom_navbar', '=', 'true'),
        'options' => array(
            'enabled'  => array(
                'backtotop' => esc_html__( 'Back To Top', 'studiare' ),
                'home'     => esc_html__( 'Home', 'studiare' ),
                'search' => esc_html__( 'Search', 'studiare' ),
                'account'   => esc_html__( 'Account', 'studiare' ),
                'cart'   => esc_html__( 'Cart', 'studiare' ),
                'more'   => esc_html__( 'More Button', 'studiare' ),
            ),
            'disabled' => array(
            )
        ),
	    ),
	    
	    array(
			'id'      => 'btm_account_link',
			'type'    => 'text',
			'title'   => esc_html__( 'Account Link', 'studiare' ),
			'description'   => esc_html__( 'Leave empty if you want to link to default login page', 'studiare' ),
			'default'   => '',
			'required'  => array('show_mobile_bottom_navbar', '=', 'true'),
		),
	    
	    )
) );
/* sc_sticky_header start */
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Sticky Header', 'studiare' ),
	'id' => 'sc_sticky_header',
	'subsection' => true,
	'icon' => 'fal fa-window-maximize',
	'fields' => array(
		array(
			'id'        => 'sc_topfix_header',
			'type'      => 'switch',
			'title'     => esc_html__( 'Top Bar', 'studiare' ),
			'default'   => false,
		),
		array(
			'id'        => 'sc_middlefix_header',
			'type'      => 'switch',
			'title'     => esc_html__( 'Header', 'studiare' ),
			'default'   => false,
		),
		)
) );
/* sc_sticky_header end */