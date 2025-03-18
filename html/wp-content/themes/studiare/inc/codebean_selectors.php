<?php

/**
 * Prepare CSS selectors for theme settions (colors, borders, typography etc.)
 */

return apply_filters( 'goseowp_codebean_get_selectors', array(

	'primary_color' => array(

		'color' => studiare_text2line( '.event-single-side a.event_register_submit, .event_register_submit, li.woocommerce-MyAccount-navigation-link.is-active,.yith-wcwl-add-button a:hover,.yith-wcwl-add-button.show:before,.yith-wcwl-wishlistexistsbrowse.show a:hover,body.woocommerce-account ul li.woocommerce-MyAccount-navigation-link--purchased-products a:before,.scshortlink .icon,.product-info-box .before-gallery-unit .icon,.highlight, .pricing-table .pricing-price, .course-section .panel-group .course-panel-heading:hover .panel-heading-left .course-lesson-icon i, .course-section .panel-group .course-panel-heading.active .panel-heading-left .course-lesson-icon i, .countdown-timer-holder.standard .countdown-unit .number, .blog-loop-inner .post .post-meta i, .studiare-event-item .studiare-event-item-holder .event-inner-content .event-meta .event-meta-piece i, .countdown-amount, .products .course-item .course-item-inner .course-content-holder .course-content-bottom .course-price, .product-meta-info-list .meta-info-unit .icon, .woocommerce-account .woocommerce-MyAccount-navigation ul li:before, .product_list_widget li > .amount, .product_list_widget li ins .amount,body.woocommerce-account ul li.woocommerce-MyAccount-navigation-link a:before' ),

		'background-color' => studiare_text2line( '.course-rating-teacher .sc-teacher, .date-holder-year, .wcsts_button, input.woocommerce-Button.button.otp_reg_dig_wc, .sc-buttons-sq-sw .woosq-btn,.sc-buttons-sq-sw .woosw-btn,.sk-cube-grid .sk-cube, .main-sidebar-holder .widget .widget-title:before, .page-pagination > span, input[type="button"], input[type="reset"], input[type="submit"], .button, .button-secondary, .woocommerce_message .button, .woocommerce-message .button, .studiare-social-links.rounded li a.custom:hover, ul.page-numbers .page-numbers.current, ul.page-numbers .page-numbers:hover, .page-numbers.studiare_wp_link_pages > .page-number, .studiare-event-item .studiare-event-item-holder .event-inner-content .date-holder .date:before, .studiare-event-item .studiare-event-item-holder .event-inner-content .date-holder .date:after, .product-reviews .product-review-title .inner:after, .product-reviews-stats .detailed-ratings .detailed-ratings-inner .course-rating .bar .bar-fill, .owl-dots .owl-dot.active span, .double-bounce1, .double-bounce2' ),

		'border-color' => studiare_text2line( '.course-rating-teacher .sc-teacher, .wcsts_button, .wcsts_button:hover, .studiare-social-links.rounded li a.custom:hover, .studiare-event-item .studiare-event-item-holder .event-inner-content .date-holder .date' ),
	),

	'secondary_color' => array(

		'color' => studiare_text2line( '.blog-loop-inner .post .post-meta i,a:hover, .top-bar-cart .dropdown-cart .cart-item-content .product-title:hover, .btn-border, .studiare-navigation ul.menu li.current_page_item>a, .studiare-navigation ul.menu li.current-menu-ancestor>a, .studiare-navigation ul.menu li.current-menu-parent>a, .studiare-navigation ul.menu li.current-menu-item>a, .studiare-navigation .menu>ul li.current_page_item>a, .studiare-navigation .menu>ul li.current-menu-ancestor>a, .studiare-navigation .menu>ul li.current-menu-parent>a, .studiare-navigation .menu>ul li.current-menu-item>a .event-single-side a.event_register_submit, .event_register_submit, .cart-collaterals .shop_table tr.shipping .button, .btn-link, .course-section .panel-group .panel-content a, .cart-collaterals .shop_table tr.shipping .shipping-calculator-button, .section-heading .section-subtitle, .not-found .not-found-icon-wrapper .error-page, .products .course-item .course-item-inner .course-content-holder .course-content-main .course-rating-teacher .course-loop-teacher, .product-single-main .product-single-top-part .before-gallery-unit .icon, .bbpress #bbpress-forums .bbp-author-name, .blog-loop-inner .post.sticky .entry-title a, .page .commentlist .comment .reply .comment-reply-link, .single-post .commentlist .comment .reply .comment-reply-link, .page .commentlist .comment .vcard .fn a:hover, .single-post .commentlist .comment .vcard .fn a:hover' ),

		'background-color' => studiare_text2line( '.btn-filled, .top-bar-cart .dropdown-cart .woocommerce-mini-cart__buttons a:first-child, .wcsts_ticket_status, .wcsts_ticket_subject, .sc-buttons-sq-sw .woosq-btn:hover,.sc-buttons-sq-sw .woosw-btn:hover,.woosw-area .woosw-inner .woosw-content .woosw-content-top,.woosw-area .woosw-inner .woosw-content .woosw-content-bot,.event-single-main .event-meta-info,.mini-cart-opener .studiare-cart-number, .widget_tag_cloud .tag-cloud-link, .off-canvas-navigation .off-canvas-cart .cart-icon-link .studiare-cart-number, .back-to-top:hover, .btn-border:hover, .event-single-side a.event_register_submit:hover, .event_register_submit:hover, .cart-page-inner .woocommerce-cart-form td.actions .button_update_cart:hover, .cart-collaterals .shop_table tr.shipping .button:hover, .partners-logos .partner-logo-item .partner-logo-inner .hover-mask:after, .portfolio-entry .portfolio-entry-thumb .overlay-icon, .portfolio-list-cat ul li a.mixitup-control-active, .courses-holder .courses-top-bar .layout-switcher > a.active, .select2-container--default .select2-selection--single:hover, .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--single' ),

		'border-color' => studiare_text2line( 'ul.product-categories>li.cat-item:hover:before, .select2-container--open .select2-dropdown--below,.btn-border, .event-single-side a.event_register_submit, .event_register_submit, .cart-page-inner .woocommerce-cart-form td.actions .button_update_cart, .cart-collaterals .shop_table tr.shipping .button, .portfolio-list-cat ul li a.mixitup-control-active, .courses-holder .courses-top-bar .layout-switcher > a.active, .select2-container--default .select2-selection--single:hover, .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .blog-loop-inner .post.sticky .entry-title a' ),

	),
    'eshare_color'=> array(
		'background-color' => studiare_text2line( '[class*=hint--]:after, .woocommerce-account [class*=hint--bottom]:after'),
		'border-top-color' => studiare_text2line('.hint--top-left:before, .hint--top-right:before, .hint--top:before'),
		'border-left-color' => studiare_text2line('.hint--left:before'),
		'border-right-color' => studiare_text2line('.hint--right:before'),
		'border-bottom-color' => studiare_text2line('.hint--bottom-left:before, .hint--bottom-right:before, .hint--bottom:before'),

    ),
    'sc_contact_floating_btn_bg'=>array(
        'background' => studiare_text2line('.studi_custom_floating_btn'),
    ),
    'sc_contact_floating_btn_brdr'=>array(
        'border-color' => studiare_text2line('.studi_custom_floating_btn'),
    ),
    'sc_floating_btn_color3' => array (
        'fill' => studiare_text2line('.shape-overlays__path:nth-of-type(3)'),
    ),
    'sc_floating_btn_color2' => array (
        'fill' => studiare_text2line('.shape-overlays__path:nth-of-type(2)'),
    ),  
    'sc_floating_btn_color1' => array (
        'fill' => studiare_text2line('.shape-overlays__path:nth-of-type(1)'),
    ),
) );
