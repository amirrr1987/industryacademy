<?php

# Social Media Links
$social_networks_ordering = array(
	'enabled' => array (
		'placebo'	=> 'placebo',
		'fb'   	 	=> 'Facebook',
		'aparat'   	=> 'Aparat',
		'telegram'  => 'Telegram',
		'tw'   	 	=> 'Twitter',
		'ig'        => 'Instagram',
		'vm'        => 'Vimeo',
		'be'        => 'Behance',
		'fs'        => 'Foursquare',
		'custom'    => 'Custom Link',
	),
	'disabled' => array (
		'placebo'   => 'placebo',
		'gp'        => "Google+",
		'lin'       => 'LinkedIn',
		'yt'        => 'YouTube',
		'drb'       => 'Dribbble',
		'pi'        => 'Pinterest',
		'vk'        => 'VKontakte',
		'da'        => 'DeviantArt',
		'fl'        => 'Flickr',
		'vi'        => 'Vine',
		'tu'        => 'Tumblr',
		'sk'        => 'Skype',
		'gh'        => 'GitHub',
		'hz'        => 'Houzz',
		'px'        => '500px',
		'xi'        => 'Xing',
		'sn'        => 'Snapchat',
		'em'        => 'Email',
		'yp'        => 'Yelp',
		'ta'        => 'TripAdvisor',
	),
);


Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Social Networks', 'studiare' ),
	'id'                => 'social_networks',
	'desc'              => '',
	'customizer_width'  => '400px',
	'submenu'           => true,
	'icon'              => 'fal fa-share-alt',
	'fields'            => array(
		// Social Networks Ordering
		array(
			'id'        => 'social_order',
			'type'      => 'sorter',
			'title'     => esc_html__( 'Social Networks Sorting', 'studiare' ),
			'subtitle'  => esc_html__( 'Adjust the order of appearance of social networks at the bottom of the screen. To use social network links, copy this shortcode:', 'studiare' ). '<br>'. $codebean_social_networks_shortcode,
			'options'   => $social_networks_ordering,
		),
		array(
			'id'        => 'social_networks_target_attr',
			'type'      => 'select',
			'title'     => esc_html__( 'Window Target', 'studiare' ),
			'subtitle'  => esc_html__( 'Open social links in new window or current window', 'studiare' ),
			'default'   => '_blank',
			'options'   => array(
				'_self' => esc_html__( 'Same Tab', 'studiare' ),
				'_blank' => esc_html__( 'New Tab', 'studiare' ),
			),
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'       => 'social_network_link_fb',
			'type'     => 'text',
			'title'    => 'Facebook',
			'placeholder' => 'https://facebook.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_aparat',
			'type'     => 'text',
			'title'    => 'Aparat',
			'placeholder' => 'https://www.aparat.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_telegram',
			'type'     => 'text',
			'title'    => 'Telegram',
			'placeholder' => 'https://t.me/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_tw',
			'type'     => 'text',
			'title'    => 'Twitter',
			'placeholder' => 'https://twitter.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_lin',
			'type'     => 'text',
			'title'    => 'Linkedin',
			'placeholder' => 'https://linkedin.com/in/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_yt',
			'type'     => 'text',
			'title'    => 'YouTube',
			'placeholder' => 'https://youtube.com/user/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_vm',
			'type'     => 'text',
			'title'    => 'Vimeo',
			'placeholder' => 'https://vimeo.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_drb',
			'type'     => 'text',
			'title'    => 'Dribbble',
			'placeholder' => 'https://dribbble.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_ig',
			'type'     => 'text',
			'title'    => 'Instagram',
			'placeholder' => 'https://instagram.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_pi',
			'type'     => 'text',
			'title'    => 'Pinterest',
			'placeholder' => 'https://pinterest.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_gp',
			'type'     => 'text',
			'title'    => 'Google Plus',
			'placeholder' => 'https://plus.google.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_vk',
			'type'     => 'text',
			'title'    => 'VKontakte',
			'placeholder' => 'https://vk.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_da',
			'type'     => 'text',
			'title'    => 'DeviantArt',
			'placeholder' => 'https://username.deviantart.com/',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_tu',
			'type'     => 'text',
			'title'    => 'Tumblr',
			'placeholder' => 'https://username.tumblr.com/',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_vi',
			'type'     => 'text',
			'title'    => 'Vine',
			'placeholder' => 'https://vine.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_be',
			'type'     => 'text',
			'title'    => 'Behance',
			'placeholder' => 'https://behance.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_fl',
			'type'     => 'text',
			'title'    => 'Flickr',
			'placeholder' => 'https://flickr.com/photos/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_fs',
			'type'     => 'text',
			'title'    => 'Foursquare',
			'placeholder' => 'https://foursquare.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_sk',
			'type'     => 'text',
			'title'    => 'Skype',
			'placeholder' => 'skype:username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_gh',
			'type'     => 'text',
			'title'    => 'GitHub',
			'placeholder' => 'https://github.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_hz',
			'type'     => 'text',
			'title'    => 'Houzz',
			'placeholder' => 'https://houzz.com/user/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_px',
			'type'     => 'text',
			'title'    => '500px',
			'placeholder' => 'https://500px.com/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_vi',
			'type'     => 'text',
			'title'    => 'Xing',
			'placeholder' => 'https://xing.com/profile/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_sn',
			'type'     => 'text',
			'title'    => 'Snapchat',
			'placeholder' => 'https://snapchat.com/add/username',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_yp',
			'type'     => 'text',
			'title'    => 'Yelp',
			'placeholder' => 'https://yelp.com/biz/alias',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_ta',
			'type'     => 'text',
			'title'    => 'Trip Advisor',
			'placeholder' => 'https://tripadvisor.com',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_em',
			'type'     => 'text',
			'title'    => 'Contact Email',
			'placeholder' => 'john.doe@email.com',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_link_em_subject',
			'type'     => 'text',
			'title'    => 'Contact Subject',
			'placeholder' => 'Hello!',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_custom_link_title',
			'type'     => 'text',
			'title'    => 'Custom Link',
			'placeholder' => 'Custom Link Title',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_custom_link_link',
			'type'     => 'text',
			'title'    => 'Link',
			'placeholder' => 'https://www.mywebsite.com/',
			'default'  => '',
		),
		array(
			'id'       => 'social_network_custom_link_icon',
			'type'     => 'text',
			'title'    => 'Custom Link Icon',
			'desc'     => 'Icon (optional)<br><small>Note: If you want to set custom icon, enter icon alias from <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a> icon collection.</small>',
			'placeholder' => 'Example: bookmark',
			'default'  => '',
		),

	)
) );