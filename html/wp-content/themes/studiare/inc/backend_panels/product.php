<?php
# Courses Settings
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Product and courses', 'studiare' ),
	'id' => 'courses',
	'icon' => 'fal fa-shopping-cart',

) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Product and courses', 'studiare' ),
	'id'               => 'course_settings',
	'subsection'       => true,
	'icon' => 'fal fa-store-alt',
	'fields' => array(
		array(
			'id'        => 'shop_sidebar',
			'type'      => 'image_select',
			'title'     => esc_html__( 'Sidebar Position', 'studiare' ),
			'default'   => 'left',
			'options'   => array(
				'none'      => array(
					'alt'   => esc_html__( 'Without Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/1col.png'
				),
				'left'      => array(
					'alt'   => esc_html__( 'Right Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
				),
				'right'      => array(
					'alt'   => esc_html__( 'Left Sidebar', 'studiare' ),
					'img'  => ReduxFramework::$_url.'assets/img/2cl.png'
				),
			)
		),
		array(
			'id'        => 'place_of_discriptions_of_cats',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Category Description Position', 'studiare' ),
			'subtitle'  => esc_html__( 'Show Category Description Before or After Category Products.', 'studiare' ),
			'options'   => array(
				'top' => esc_html__( 'Top', 'studiare' ),
				'bottom' => esc_html__( 'Bottom', 'studiare' ),
			),
			'default'   => 'bottom',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'courses_columns',
			'type'      => 'select',
			'title'     => esc_html__( 'Product Columns', 'studiare' ),
			'options'   => array(
				'2' => esc_html__( '2-Column', 'studiare' ),
				'3' => esc_html__( '3-Column', 'studiare' ),
				'4' => esc_html__( '4-Column', 'studiare' ),
			),
			'default'   => '3',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'courses_layout_mode',
			'type'      => 'select',
			'title'     => esc_html__( 'Products View Layout', 'studiare' ),
			'options'   => array(
				'grid' => esc_html__( 'Grid View', 'studiare' ),
				'list' => esc_html__( 'List View', 'studiare' ),
			),
			'default'   => 'grid',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'shop_pro_image_size',
			'type'      => 'select',
			'title'     => esc_html__( 'Product Image Size', 'studiare' ),
			'options'   => array(
				'studiare-course-thumb' => esc_html__( 'Theme Default', 'studiare' ),
				'thumbnail' => esc_html__( 'Wordpress Thumbnail', 'studiare' ),
				'medium'    => esc_html__( 'Wordpress Medium', 'studiare' ),
				'large'     => esc_html__( 'Wordpress Large', 'studiare' ),
				'full'      => esc_html__( 'Wordpress Full', 'studiare' ),
				'woocommerce_thumbnail'      => esc_html__( 'Woocommerce Thumbnail', 'studiare' ),
				'woocommerce_single'      => esc_html__( 'Woocommerce Single', 'studiare' ),
			),
			'default'   => 'studiare-course-thumb',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'shop_per_page',
			'type'     => 'spinner',
			'title'    => esc_html__( 'Number of Products Per Page', 'studiare' ),
			'default'  => '6',
			'min'      => '1',
			'max'      => '20',
		),
		array(
			'id'       => 'archive_teacher_view',
			'type'     => 'button_set',
			'title'    => esc_html__('Teacher', 'studiare'),
			'subtitle' => esc_html__('Select How to view Teachers On store pages and categories', 'studiare'),
			'options'  => array(
				'disable'  => esc_html__( 'Hide', 'studiare' ),
				'list'  => esc_html__( 'Teacher Name', 'studiare' ),
				'avatar'  => esc_html__( 'Teacher Avatar', 'studiare' ),
			),
			'default' => 'list',
		),
		array(
			'id'       => 'product_rating_view',
			'type'     => 'switch',
			'title'    => esc_html__('Product Rating', 'studiare'),
			'subtitle'  => esc_html__( 'Show Product Rating On store pages and categories', 'studiare' ),
			'default'  => true,
		),
		array(
			'id'       => 'product_stars',
			'type'     => 'switch',
			'title'    => esc_html__('Show Product Rating as Stars', 'studiare'),
			'subtitle'  => esc_html__( 'Enable this Option to Show Stars instead of Numbers for Product Rating', 'studiare' ),
			'default'  => true,
		),
		array(
			'id'       => 'product_descr_shop_page',
			'type'     => 'switch',
			'title'    => esc_html__('Product Description', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'default'  => true,
		),
		array(
			'id'       => 'toman_as_image',
			'type'     => 'switch',
			'title'    => esc_html__('Replace toman with image of toman', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'default'  => false
		),
		array(
			'id'       => 'sc_shop_page_addtocart',
			'type'     => 'switch',
			'title'    => esc_html__('Add to Cart Button', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'default'  => false
		),
		array(
			'id'       => 'sc_shop_page_qv',
			'type'     => 'switch',
			'title'    => esc_html__('Quick View Icon', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'desc'     => __( 'Note: Only Works with <a href="https://wordpress.org/plugins/woo-smart-quick-view/" target="_blank">"WPC Smart Quick View for WooCommerce"</a> Plugin', 'studiare' ),
			'default'  => false
		),
		array(
			'id'       => 'sc_shop_page_aw',
			'type'     => 'switch',
			'title'    => esc_html__('Add to Whishlist Icon', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'desc'     => __( 'Note: Only Works with <a href="https://wordpress.org/plugins/woo-smart-wishlist/" target="_blank">"WPC Smart Wishlist for WooCommerce"</a> Plugin', 'studiare' ),
			'default'  => true
		),
		array(
			'id'       => 'product_danshjou_icon_view',
			'type'     => 'switch',
			'title'    => esc_html__('Display the number of students / buyers', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'default'  => true
		),
		array(
			'id'       => 'product_sc_loop_main_feature',
			'type'     => 'switch',
			'title'    => esc_html__('Display course flagship feature', 'studiare'),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'default'  => true
		),
		array(
			'id'       => 'product_category_border',
			'type'     => 'switch',
			'title'    => esc_html__('The bottom colored line of products', 'studiare'),
			'subtitle'  => esc_html__( 'Displaying the bottom color line of products in the store view and Elementor add-ons based on the color selected in the settings of each category', 'studiare' ),
			'default'  => true
		),
		array(
			'id'       => 'free_or_call_for_price',
			'type'     => 'switch',
			'title'    => esc_html__('Free display for products that do not have a price', 'studiare'),
			'subtitle'  => esc_html__( 'If this option is not active, the call button will be substituted for the price', 'studiare' ),
			'default'  => true,
		),
		array(
			'id'        => 'danshjou_icon',
			'type'      => 'select',
			'title'     => esc_html__( 'The default icon for number of students', 'studiare' ),
			'subtitle'  => esc_html__( 'On store pages and categories', 'studiare' ),
			'options'   => array(
				'fal fa-user-chart' => esc_html__( 'User Chart Icon', 'studiare' ),
				'fal fa-user-check' => esc_html__( 'User Check Icon', 'studiare' ),
				'fal fa-user' => esc_html__( 'User Icon', 'studiare' ),
				'fal fa-user-alt' => esc_html__( 'User Alt Icon', 'studiare' ),
				'fal fa-user-circle' => esc_html__( 'User Circle Icon', 'studiare' ),
				'fal fa-users-class' => esc_html__( 'Users Class Icon', 'studiare' ),

			),
			'default'   => 'fal fa-users-class',
			'select2'   => array('allowClear' => false),
			'required' => array('product_danshjou_icon_view', '=', '1')
		),
	)
) );
//add by suncode start
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Product/Course', 'studiare' ),
	'id'               => 'single_course_settings',
	'subsection'       => true,
	'icon' => 'fal fa-money-check',
	'fields' => array(
	    array(
			'id'        => 'single_product_layout',
			'type'      => 'select',
			'title'     => esc_html__( 'Single Product/Course Layout', 'studiare' ),
			'options'   => array(
				'layout-01' => esc_html__( 'Layout 1', 'studiare' ),
				'layout-02' => esc_html__( 'Layout 2', 'studiare' ),
				'layout-03' => esc_html__( 'Layout 3', 'studiare' ),
				'layout-04' => esc_html__( 'Layout 4', 'studiare' ),
				'layout-05' => esc_html__( 'Layout 5', 'studiare' ),
			),
			'default'  => 'layout-01',
		),
		 array(
			'id'       => 'product_sidebar_position',
			'type'     => 'switch',
			'title'    => esc_html__('Sidebar Position', 'studiare'),
			'default'  => false,
			'on'       => esc_html__( 'Left Sidebar', 'studiare' ),
			'off'      => esc_html__( 'Right Sidebar', 'studiare' ),
			'desc'     => __( 'Works with Layout 1', 'studiare' ),
		),
		array(
			'id'       => 'product_meta_info_top_stuts',
			'type'     => 'switch',
			'title'    => esc_html__('Show Information at the Top Single Product', 'studiare'),
			'desc'     => __( 'Works with Layout 1', 'studiare' ),
			'default'  => false
		),
		array(
			'id'       => 'show_fullscreen_mode_button',
			'type'     => 'switch',
			'title'    => esc_html__('Show Fullscreenmode button', 'studiare'),
			'default'  => false
		),
		array(
			'id'       => 'related_course_product',
			'type'     => 'switch',
			'title'    => esc_html__('Show Related Products', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'single_fixed_information',
			'type'     => 'switch',
			'title'    => esc_html__('Show Sticky Info', 'studiare'),
			'subtitle'    => esc_html__('Display buyer information and add to shopping cart as a sticker at the bottom of the page', 'studiare'),
			'default'  => true
		),

		array(
			'id'       => 'product_single_sc_show_buyers',
			'type'     => 'switch',
			'title'    => esc_html__('Show buyers list', 'studiare'),
			'subtitle'  => esc_html__( 'Show buyers list only for admins', 'studiare' ),
			'default'  => true,
		),
		array( 
        'id' => 'single-product-meta-section',
        'type' => 'accordion',
        'title' => esc_html__('single product meta', 'studiare'),
        'subtitle' => esc_html__('options for single product meta.', 'studiare'),
        'position'  => 'start',    
        ),
        array(
			'id'       => 'product_meta_info_list',
			'type'     => 'switch',
			'title'    => esc_html__('Show Product Meta', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'product_buyers_insingle',
			'type'     => 'switch',
			'title'    => esc_html__('Display the number of students / buyers', 'studiare'),
			'subtitle'  => esc_html__( 'In Singel Product/Course', 'studiare' ),
			'default'  => true
		),
		
		array(
			'id'       => 'product_single_sc_single_navbar',
			'type'     => 'switch',
			'title'    => esc_html__('Show Navigation', 'studiare'),
			'default'  => false
		),
		array(
			'id'       => 'product_meta_info_comment_number',
			'type'     => 'switch',
			'title'    => esc_html__('Show Number of Comments', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'product_meta_info_list_2',
			'type'     => 'switch',
			'title'    => esc_html__('Show additional product features', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'product_meta_info_list_date_published',
			'type'     => 'switch',
			'title'    => esc_html__('Show the release date of the product', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_list_date_modified',
			'type'     => 'switch',
			'title'    => esc_html__('Show the update date of the product', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_list_stars',
			'type'     => 'switch',
			'title'    => esc_html__('Show users point', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_list_cats',
			'type'     => 'switch',
			'title'    => esc_html__('Show Categories', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_list_tags',
			'type'     => 'switch',
			'title'    => esc_html__('Show Tags', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_list_short_link',
			'type'     => 'switch',
			'title'    => esc_html__('Show Shortlink', 'studiare'),
			'default'  => true,
			'required' => array('product_meta_info_list_2', '=', '1')
		),
		array(
			'id'       => 'product_meta_info_teacher_profile',
			'type'     => 'switch',
			'title'    => esc_html__('Show Teacher', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'product_meta_info_teacher_about',
			'type'     => 'switch',
			'required'  => array('product_meta_info_teacher_profile', '=', '1'),
			'title'    => esc_html__('Show Teacher Bio', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'product_meta_info_teacher_other_courses',
			'type'     => 'switch',
			'required'  => array('product_meta_info_teacher_profile', '=', '1'),
			'title'    => esc_html__('Show Other Teacher Courses', 'studiare'),
			'default'  => true
		),          
        array(
                'id'        => 'opt-accordion-end-1',
                'type'      => 'accordion',
                'position'  => 'end'
        ),
		
		
		
		array( 
        'id' => 'single-product-style-section',
        'type' => 'accordion',
        'title' => esc_html__('single product styles', 'studiare'),
        'subtitle' => esc_html__('options for styling single product.', 'studiare'),
        'position'  => 'start',    
        ),
		array(
			'id'       => 'single_add_to_cart_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Single Add To Cart Button Color', 'studiare' ),
			'output'   => array('color' => 'button.single_add_to_cart_button.button.alt, .sc_studi_btm_addtocart_fixed_btn_holder .button'),
			'default'  => '#fff',
		),
		array(
			'id'       => 'single_add_to_cart_background',
			'type'     => 'color',
			'title'    => esc_html__( 'Single Add To Cart Button Background Color', 'studiare' ),
			'output'   => array('background' => 'button.single_add_to_cart_button.button.alt, .sc_studi_btm_addtocart_fixed_btn_holder .button, .sc-add-to-cart-four a'),
			'default'  => '#4CAF50',
		),
		array(
			'id'       => 'sc--amazing-offer-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Amazing Offer Background', 'studiare' ),
			'output'   => '.product-info-box.sc-amazing-offer,.woosw-area .woosw-inner .woosw-content .woosw-content-top,.woosw-area .woosw-inner .woosw-content .woosw-content-bot',
			'default'  => array(
				'background-color' => '#e91e63', //'#ffc107',
			)
		),
		array(
			'id'       => 'sc--amazing-offer-txt',
			'type'     => 'color',
			'title'    => esc_html__( 'Amazing Offer Text Color', 'studiare' ),
			'output'   => array('color' => '.product-info-box.sc-amazing-offer'),
			'default'  => '#ffffff',
		),
		
		array(
			'id'       => 'sc--amazing-offer-txt-disvalue',
			'type'     => 'color',
			'title'    => esc_html__( 'Amazing Offer Text Color Amount', 'studiare' ),
			'output'   => array('color' => '.sc-amazing-offer-discount'),
			'default'  => '#E91E63',
		),
		
		
		array(
			'id'       => 'lesson_header_color',
			'type'     => 'color_gradient',
			'title'    => esc_html__('Course title color', 'studiare'),
			 'validate' => 'color',
			 'output'         => '.course-section-title',
			'default'  => array(
            'from' => '#39DAA9',
            'to'   => '#13CE92', 
        ),
		),
		array(
			'id'       => 'lesson_header_active_color',
			'type'     => 'color_gradient',
			'title'    => esc_html__('Active Course title color', 'studiare'),
			 'validate' => 'color',
			 'output'         => '.sc-course-lesson-toggle-wrapper.active_tab_by_suncode .course-section-title, .course-section-title:hover',
			'default'  => array(
            'from' => '#2e3e77',
            'to'   => '#3F51B5', 
        ),
		),
		array(
			'id'       => 'lesson_header_icon_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Course title Icon color', 'studiare' ),
			'output'   => array('color' => '.sc-course-lesson-toggle i'),
			'default'  => '#009688',
		),
		array(
			'id'       => 'lesson_header_icon_active_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Active Course title Icon color', 'studiare' ),
			'output'   => array('color' => '.sc-course-lesson-toggle-wrapper.active_tab_by_suncode .sc-course-lesson-toggle i'),
			'default'  => '#3F51B5',
		),
		array(
			'id'       => 'private_lesson_message_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Private lesson Message color', 'studiare' ),
			'output'   => array('color' => '.lessonaccessdenied'),
			'default'  => '#7d7e7f',
		),
		array(
			'id'       => 'private_lesson_message_bg_color',
			'type'     => 'background',
			'title'    => esc_html__( 'Private lesson Message Background color', 'studiare' ),
			'output'   => '.lessonaccessdenied',
			'default'  => array(
				'background-color' => 'transparent', 
			)
		),
		array(
                'id'        => 'opt-accordion-end-2',
                'type'      => 'accordion',
                'position'  => 'end'
        ),
		
		
		array( 
        'id' => 'single-product-custom-cart-text-section',
        'type' => 'accordion',
        'title' => esc_html__('single product custom text', 'studiare'),
        'subtitle' => esc_html__('this options will apply to all products. you can change cart texts for individual proudcts from editing every single product', 'studiare'),
        'position'  => 'start'
        ),
		array(
			'id'       => 'private_lesson_message',
			'type'     => 'text',
			'title'    => esc_html__('Message for Private lessons', 'studiare'),
			'subtitle'    => esc_html__('If you checked the private lesson, this message shows to non-buyer users.', 'studiare'),
			'default'  => esc_html__( 'This lesson is private, for full access to all lessons you need to buy this course.', 'studiare' ),
		),
		array(
			'id'       => 'login_toast_message',
			'type'     => 'text',
			'title'    => esc_html__('Message to enter the site', 'studiare'),
			'subtitle'    => esc_html__('If you are not logged in to the site, you will encounter this message to download user files.', 'studiare'),
			'default'  => esc_html__('You must log in to your account to download this file.', 'studiare'),
		),
		array(
			'id'       => 'login_toast_title',
			'type'     => 'text',
			'title'    => esc_html__('Message title to enter the site', 'studiare'),
			'default'  => esc_html__('Note', 'studiare'),
		),
		array(
			'id'       => 'bought_toast_message',
			'type'     => 'text',
			'title'    => esc_html__('The message of the need to purchase a product to download', 'studiare'),
			'subtitle'    => esc_html__('If the user has not purchased the product, he/she will get this message by clicking on the product title or the download button.', 'studiare'),
			'default'  => esc_html__('To download this file, you must purchase the product', 'studiare'),
		),
		array(
			'id'       => 'bought_toast_title',
			'type'     => 'text',
			'title'    => esc_html__('The title of the message is the need to purchase the product to download', 'studiare'),
			'default'  => esc_html__('Note', 'studiare'),
		),
		array(
			'id'       => 'product_single_outstock',
			'type'     => 'switch',
			'title'    => esc_html__('Display the message of the end of the capacity', 'studiare'),
			'subtitle'  => esc_html__( 'Message of capacity depletion for in-person products', 'studiare' ),
			'default'  => true
		),
		array(
			'id'       => 'product_single_outstock_message',
			'type'     => 'text',
			'required'  => array('product_single_outstock', '=', '1'),
			'title'    => esc_html__(' message of the end of the capacity', 'studiare'),
			'subtitle'  => esc_html__( 'Message of capacity depletion for in-person products', 'studiare' ),
			'default'  => esc_html__('The capacity is over!', 'studiare'),
		),
		array(
			'id'       => 'product_single_sc_add_to_cart_text',
			'type'     => 'text',
			'title'    => esc_html__('Add to Cart Button Text', 'studiare'),
			'default'  => esc_html__('Add to Cart', 'studiare'),
		),
		array(
			'id'       => 'product_single_sc_added_to_cart_text',
			'type'     => 'text',
			'title'    => esc_html__('Add to Cart Button Text for the Product Placed in the Cart', 'studiare'),
			'default'  => esc_html__('The course is now available in the shopping cart', 'studiare'),
		),
		array(
			'id'       => 'product_single_sc_purchased_producct_text',
			'type'     => 'text',
			'title'    => esc_html__('Add to Cart Button Text for the Product that has Been Purchased', 'studiare'),
			'default'  => esc_html__('You are a student of this course', 'studiare'),
		),
		array(
                'id'        => 'opt-accordion-end-3',
                'type'      => 'accordion',
                'position'  => 'end'
        ),
		array( 
        'id' => 'other-single-product-options-section',
        'type' => 'accordion',
        'title' => esc_html__('Other Options', 'studiare'),
        'position'  => 'start'
        ),
        array(
			'id'        => 'related_products_base',
			'type'      => 'select',
			'title'     => esc_html__( 'Related Products', 'studiare' ),
			'options'   => array(
				'product_cat' => esc_html__( 'Products from same category', 'studiare' ),
				'product_tag' => esc_html__( 'Products from same tag', 'studiare' ),
			),
			'default'   => 'product_cat',
			'select2'   => array('allowClear' => false)
		),
        array(
			'id'       => 'radio_instead_dropdown_variable_items',
			'type'     => 'switch',
			'title'    => esc_html__('radio instead of dropdown variable items', 'studiare'),
			'subtitle'    => esc_html__('Display radio list instead of dropdown for variable products.', 'studiare'),
			'default'  => true
		),
        array(
			'id'       => 'studi_readmore_in_pro',
			'type'     => 'switch',
			'title'    => esc_html__('Show Read More In Mobile', 'studiare'),
			'default'  => true
		),
		array(
			'id'       => 'readmore_open_txt',
			'type'     => 'text',
			'title'    => esc_html__('Read more button text in closed mode', 'studiare'),
			'default'  => esc_html__('Show More', 'studiare'),
			'required' => array('studi_readmore_in_pro', '=', '1')
		),
		array(
			'id'       => 'readmore_close_txt',
			'type'     => 'text',
			'title'    => esc_html__('Read more button text in open mode', 'studiare'),
			'default'  => esc_html__('Show Less', 'studiare'),
			'required' => array('studi_readmore_in_pro', '=', '1')
		),
		array(
			'id'       => 'related_products_count',
			'type'     => 'text',
			'title'    => esc_html__('Number of related products/courses', 'studiare'),
			'default'  => '4'
		),
		array(
			'id'       => 'related_products_per_slide',
			'type'     => 'text',
			'title'    => esc_html__('The number of related products/courses columns in the carousel', 'studiare'),
			'subtitle'    => esc_html__('For Product Layout 1', 'studiare'),
			'default'  => '2'
		),
		array(
			'id'       => 'related_products_per_slide_ltwo',
			'type'     => 'text',
			'title'    => esc_html__('The number of related products/courses columns in the carousel', 'studiare'),
			'subtitle'    => esc_html__('For Product Layout 2', 'studiare'),
			'default'  => '3'
		),
		array(
			'id'       => 'related_products_per_slide_lthree',
			'type'     => 'text',
			'title'    => esc_html__('The number of related products/courses columns in the carousel', 'studiare'),
			'subtitle'    => esc_html__('For Product Layout 3', 'studiare'),
			'default'  => '3'
		),
		array(
			'id'       => 'user_other_products_count',
			'type'     => 'text',
			'title'    => esc_html__('Number of Other Teacher Courses', 'studiare'),
			'default'  => '4'
		),
		array(
                'id'        => 'opt-accordion-end-4',
                'type'      => 'accordion',
                'position'  => 'end'
        ),
	)
) );
$general_off_img = "<img src='".get_parent_theme_file_uri('assets/images/admin/general_off.jpg')."'>";
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'discount message', 'studiare' ),
	'id'               => 'product_single_sc_message_section',
	'subsection'       => true,
	'icon' => 'fal fa-gift',
	'fields' => array(
array(
			'id'       => 'product_single_sc_message',
			'type'     => 'switch',
			'title'    => esc_html__('Show discount message', 'studiare'),
			'subtitle'  => esc_html__( 'General discount message for all products', 'studiare' ),
			'default'  => false,
			'desc'     => $general_off_img,
		),
		array(
			'id'        => 'sc_offer_amount_in',
			'type'      => 'slider',
			'title'     => esc_html__('Amount of discount code', 'studiare'),
			'subtitle'  => esc_html__( 'If you have created a discount code or coupon in WooCommerce, enter the discount amount here', 'studiare' ),
			"default"   => 50,
			"min"       => 0,
			"step"      => 1,
			"max"       => 100,
			'display_value' => 'label',
			'required'  => array('product_single_sc_message', '=', '1'),
			//'tags'     => 'header size logo height logo size'
		),
		array(
			'id'        => 'product_single_sc_message_0',
			'type'      => 'editor',
			'title'     => esc_html__( 'Discount message text', 'studiare' ),
			'subtitle'  => esc_html__( 'Use the following shortcode to display the calculated price according to the above discount amount: [sc_amazing_offer_final_price]', 'studiare' ),
			'required'  => array('product_single_sc_message', '=', '1'),
			'default'   => esc_html__( 'Buy this product with %50 discount with suncode discount code. ie: [sc_amazing_offer_final_price]', 'studiare' ),
		),
		array(
			'id'       => 'sc--discount-bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Discount message Background', 'studiare' ),
			'output'   => '.sc-single-product-message',
			'required'  => array('product_single_sc_message', '=', '1'),
			'default'  => array(
				'background-color' => '#ffc107',
			)
		),
		array(
			'id'       => 'sc--discount-txt',
			'type'     => 'color',
			'title'    => esc_html__( 'Discount message text color', 'studiare' ),
			'output'   => array('color' => '.sc-single-product-message'),//'.sc-single-product-message',
			'required'  => array('product_single_sc_message', '=', '1'),
			'default'  => '#fff',
			'validate' => 'color',
		),
		)
) );
$img_hint = "<img src='".get_parent_theme_file_uri('assets/images/admin/general_atts.jpg')."'>";
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'General features', 'studiare' ),
	'id'               => 'sc_view_page_general_section',
	'subsection'       => true,
	'icon' => 'fal fa-digital-tachograph',
	'fields' => array(
	    array(
	        
			'id'       => 'sc_view_page_general_att_top',
			'type' => 'raw',
			'title'    => esc_html__('Show General features', 'studiare'),
			'subtitle' => $img_hint,
		),
        array(
			'id'       => 'sc_view_page_general_att',
			'type'     => 'switch',
			'title'    => esc_html__('Show General features', 'studiare'),
			'subtitle' => esc_html__( 'Display general features at the bottom of the product image', 'studiare' ),
			'default'  => false
		),
		array(
        'id'       => 'sc_select_page_general_att',
        'type'     => 'select',
        'multi'    => false,
        'data'     => 'posts',
        'args'     => array( 'post_type' =>  array( 'page' ), 'numberposts' => -1 ),
        'title'    => esc_html__( 'General Features Page', 'studiare' ),
        'subtitle' => esc_html__( 'The content of the selected Pageis displayed at the bottom of each product image.', 'studiare' ),
				'required'  => array('sc_view_page_general_att', '=', '1'),
    ),
	array(
        'id'       => 'sc_select_page_general_att_exclude_cats',
        'type'     => 'select',
        'multi'    => true,
         'data' => 'terms',
            'args' => array('taxonomies'=>'product_cat', 'args'=>array()),
        'title'    => esc_html__( 'Exclude categories', 'studiare' ),
        'subtitle' => esc_html__( 'The content of the selected pageis not displayed at the bottom of each product image in these categories.', 'studiare' ),
				'required'  => array('sc_view_page_general_att', '=', '1'),
    ),
	)
) );
//add by suncode end

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Share', 'studiare' ),
	'id'               => 'course_sharing_settings',
	'subsection'       => true,
	'icon' => 'fal fa-share-alt-square',
	'fields'           => array(
		array(
			'id'       => 'course_share_story',
			'title'    => esc_html__( 'Share Product', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
		//array(
		//	'id'       => 'course_share_story_networks',
		//	'title'    => esc_html__( 'اشتراک گذاری:', 'studiare' ),
		//	'subtitle' => esc_html__( 'برای فعال کردن یا غیرفعال کردن به داخل باکس مورد نظر بکشید و رها کنید.', 'studiare' ),
		//	'type'     => 'sorter',
		//	'options'  => $share_story_networks,
		//	'required' => array('course_share_story', '=', '1')
		//),
		//array(
		//	'id'       => 'course_share_text',
		//	'type'     => 'editor',
		//	'title'    => esc_html__( 'متن اشتراک گذاری', 'studiare' ),
		//	'subtitle' => esc_html__( 'قبل از آیکن ها قرار می گیرد.', 'studiare' ),
		//	'required' => array('course_share_story', '=', '1')
		//),
		array(
			'id'       => 'sc_site_email',
			'type'     => 'text',
			'title'    => esc_html__('Website e-Mail', 'studiare'),
			'subtitle'    => esc_html__('Only email with site domain should be placed in this section. Emails from Yahoo, Google, etc. will not work.', 'studiare'),
			'default'  => ''
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Checkout', 'studiare' ),
	'id'               => 'course_checkout_settings',
	'subsection'       => true,
	'icon' => 'fal fa-money-check',
	'fields'           => array(
		array(
			'id'       => 'course_checkout_address_fields',
			'title'    => esc_html__( 'Enable Address Fields Based on Product Type', 'studiare' ),
			'subtitle' => esc_html__( 'Enable or disable address fields in the checkout form dynamically based on the product type in the cart. Address fields will be removed for virtual/downloadable products.', 'studiare' ),
			'type'     => 'switch',
			'default'  => false,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' )
		),
	)
) );
