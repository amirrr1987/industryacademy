<?php
/**
 * Codebean Filters File
 */

// Social Media Networks by Codebean
if ( class_exists( 'Redux' ) ) {
	function shortcode_cdb_social_networks( $atts = array(), $content = '' ) {
		$custom_icon 		= codebean_option( 'social_network_custom_link_icon' );

		$social_order		= codebean_option( 'social_order' );
		$social_order_list  = apply_filters( 'codebean_social_networks_array', array(
			'fb'      => array(
				'title'  => 'Facebook',
				'icon'   => 'fab fa-facebook-f'
			),
			'aparat'      => array(
				'title'  => 'Aparat',
				'icon'   => 'fab fa-apart'
			),
			'telegram'      => array(
				'title'  => 'Telegram',
				'icon'   => 'fab fa-telegram'
			),
			'tw'      => array(
				'title'  => 'Twitter',
				'icon'   => 'fab fa-twitter'
			),
			'lin'     => array(
				'title'  => 'LinkedIn',
				'icon'   => 'fab fa-linkedin'
			),
			'yt'      => array(
				'title'  => 'YouTube',
				'icon'   => 'fab fa-youtube'
			),
			'vm'      => array(
				'title'  => 'Vimeo',
				'icon'   => 'fab fa-vimeo'
			),
			'drb'     => array(
				'title'  => 'Dribbble',
				'icon'   => 'fab fa-dribbble'
			),
			'ig'      => array(
				'title'  => 'Instagram',
				'icon'   => 'fab fa-instagram'
			),
			'pi'      => array(
				'title'  => 'Pinterest',
				'icon'   => 'fab fa-pinterest'
			),
			'gp'      => array(
				'title'  => 'Google+',
				'icon'   => 'fab fa-google-plus'
			),
			'vk'      => array(
				'title'  => 'VKontakte',
				'icon'   => 'fab fa-vk'
			),
			'fl'      => array(
				'title'  => 'Flickr',
				'icon'   => 'fab fa-flickr'
			),
			'be'      => array(
				'title'  => 'Behance',
				'icon'   => 'fab fa-behance'
			),
			'fs'      => array(
				'title'  => 'Foursquare',
				'icon'   => 'fab fa-foursquare'
			),
			'sk'      => array(
				'title'  => 'Skype',
				'icon'   => 'fab fa-skype'
			),
			'tu'      => array(
				'title'  => 'Tumblr',
				'icon'   => 'fab fa-tumblr'
			),
			'da'      => array(
				'title'  => 'DeviantArt',
				'icon'   => 'fab fa-deviantart'
			),
			'gh'      => array(
				'title'  => 'GitHub',
				'icon'   => 'fab fa-github'
			),
			'hz'      => array(
				'title'  => 'Houzz',
				'icon'   => 'fab fa-houzz'
			),
			'px'      => array(
				'title'  => '500px',
				'icon'   => 'fab fa-500px',
				'prefix' => 's',
			),
			'xi'      => array(
				'title'  => 'Xing',
				'icon'   => 'fab fa-xing'
			),
			'vi'      => array(
				'title'  => 'Vine',
				'icon'   => 'fab fa-vine'
			),
			'sn'      => array(
				'title'  => 'Snapchat',
				'icon'   => 'fab fa-snapchat-ghost',
				'dark'	 => true
			),
			'em'      => array(
				'title'  => esc_html__( 'Email', 'studiare' ),
				'icon'   => 'fab fa-envelope'
			),
			'yp'      => array(
				'title'  => 'Yelp',
				'icon'   => 'fab fa-yelp'
			),
			'ta'      => array(
				'title'  => 'TripAdvisor',
				'icon'   => 'fab fa-tripadvisor'
			),

			'custom'  => array(
				'title'  => codebean_option( 'social_network_custom_link_title' ),
				'href'   => codebean_option( 'social_network_custom_link_link' ),
				'icon'   => 'fab ' . ( $custom_icon ? "fa-{$custom_icon}" : 'fa-telegram' ),
			),
		) );

		// Social Networks Class
		$class = 'studiare-social-links';

		if ( isset( $atts['class'] ) ) {
			$class .= ' ' . $atts['class'];
		}

		// Rounded Social Networks
		if ( is_array( $atts ) && in_array( 'rounded', $atts ) ) {
			$class .= ' rounded';
		}

		// Light color on Dark Backgrounds
        if ( is_array( $atts ) && in_array( 'light', $atts ) ) {
		    $class .= ' light';
        }



		$html = '<ul class="' . esc_attr( $class ) . '">';

		foreach ( $social_order['enabled'] as $key => $title ) {

			if ( $key == 'placebo' ) {
				continue;
			}

			$sn = $social_order_list[ $key ];

			$href = codebean_option( "social_network_link_{$key}" );
			$class = sanitize_title( $title );

			// Prefixed
			if ( isset( $sn['prefix'] ) ) {
				$class = "{$sn['prefix']}-" . $class;
			}

			if ( $key == 'custom' ) {
				$title   = $sn['title'];
				$href    = $sn['href'];
				$class 	 = 'custom';
			}

			$title_span = $title;

			if ( isset( $atts['class'] ) && strpos( $atts['class'], 'rounded' ) >= 0 ) {
				$title_span = $title;
			}

			$link_target = codebean_option( 'social_networks_target_attr', '_blank' );

			if ( is_email( $href ) ) {
				$link_target = '_self';
				$subject = codebean_option( 'social_network_link_em_subject' );

				$href = "mailto:{$href}";

				if ( $subject ) {
					$href .= '?subject=' . esc_attr( $subject );
				}
			}

			// Dark Class
			if ( ! empty( $sn['dark'] ) ) {
				$class .= ' dark';
			}

			$html .= '<li>';
			$html .= '<a href="' . esc_url( $href ) . '" target="' . esc_attr( $link_target ) . '" class="' . esc_attr( $class ) . '" title="' . esc_attr( $title ) . '">';
			$html .= '<i class="' . $sn['icon'] . '"></i>';
			$html .= '</a>';
			$html .= '</li>';
		}

		$html .= '</ul>';

		return apply_filters( 'shortcode_social_networks_shortcode', $html );

	}

	codebean_add_short( 'social_networks', 'shortcode_cdb_social_networks' );
}

// Share Network Story
function share_story_network_link( $network, $post_id = null, $class = '', $icon = true ) {

	$title     = esc_attr( get_the_title( $post_id ) );
	$excerpt   = esc_attr( wp_trim_words( codebean_clean_excerpt( get_the_excerpt( $post_id ), true ), 40, '&hellip;' ) );
	$permalink = esc_attr( get_permalink( $post_id ) );

	$networks = array(
		'fb'          => array(
			'url'        => 'https://www.facebook.com/sharer.php?u=' . $permalink,
			'title'    => 'Facebook',
			'name'       => 'facebook',
			'icon'       => 'facebook-f'
		),

		'tw'          => array(
			'url'        => 'https://twitter.com/share?text=' . $title,
			'title'    => 'Twitter',
			'name'       => 'twitter',
			'icon'       => 'twitter'
		),

		'gp'          => array(
			'url'        => 'https://plus.google.com/share?url=' . $permalink,
			'title'    => 'Google+',
			'name'       => 'google',
			'icon'       => 'google-plus'
		),

		'tlr'         => array(
			'url'        => 'http://www.tumblr.com/share/link?url=' . $permalink . '&name=' . $title . '&description=' . $excerpt,
			'title'    => 'Tumblr',
			'name'       => 'tumblr',
			'icon'       => 'tumblr'
		),

		'lin'         => array(
			'url'        => 'https://linkedin.com/shareArticle?mini=true&amp;url=' . $permalink . '&amp;title=' . $title,
			'title'    => 'LinkedIn',
			'name'       => 'linkedin',
			'icon'       => 'linkedin'
		),

		'pi'          => array(
			'url'        => 'https://pinterest.com/pin/create/button/?url=' . $permalink . '&amp;description=' . $title . '&' . ( $post_id ? ( 'media=' . wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ) ) : '' ),
			'title'    => 'Pinterest',
			'name'       => 'pinterest',
			'icon'       => 'pinterest'
		),

		'vk'          => array(
			'url'        => 'https://vkontakte.ru/share.php?url=' . $permalink . '&title=' . $title . '&description=' . $excerpt,
			'title'    => 'VKontakte',
			'name'       => 'vkontakte',
			'icon'       => 'vk'
		),

		'em'          => array(
			'url'        => 'mailto:?subject=' . $title . '&body=' . esc_attr( sprintf( esc_html__( 'Enjoy our funniest story: %s', 'studiare' ), $permalink ) ),
			'title'    => esc_html__( 'Email', 'studiare' ),
			'name'       => 'email',
			'icon'       => 'envelope-o'
		),

		'pr'          => array(
			'url'        => 'javascript:window.print();',
			'title'    => esc_html__( 'Print', 'studiare' ),
			'icon'       => 'print'
		),
	);

	$network_entry = $networks[ $network ];
	$new_window = $network ? false : true;
	?>
	<li>
		<a class="<?php echo esc_attr( trim( "{$network_entry['name']} {$class}" ) ); ?>" href="<?php echo esc_url($network_entry['url']); ?>"<?php when_match( $new_window, 'target="_blank"' ); ?> onclick="window.open(this.href,this.title,'width=600,height=600,top=200px,left=200px');  return false;" title="<?php echo esc_attr( $network_entry['title'] ); ?>" >
			<?php if ( $icon ) : ?>
				<i class="fa fa-<?php echo esc_attr( $network_entry['icon'] ); ?>"></i>
			<?php else : ?>
				<?php echo esc_html( $network_entry['title'] ); ?>
			<?php endif; ?>
		</a>
	</li>
	<?php
}


/**
 * Filter map single event
 */
if ( ! function_exists( 'studiare_filter_event_map' ) ) {
	function studiare_filter_event_map( $map_data ) {
		$map_data['height']                  = '210px';
		$map_data['map_data']['scroll-zoom'] = false;
		$map_data['map_data']['marker-icon'] = get_theme_file_uri( '/assets/images/map_icon.png' );

		return $map_data;
	}
}
add_filter( 'tp_event_filter_event_location_map', 'studiare_filter_event_map' );


/**
 * Excerpt Length & More
 */
add_filter( 'excerpt_length', 'studiare_default_excerpt_length' );
add_filter( 'excerpt_more', 'studiare_default_excerpt_more' );

function studiare_default_excerpt_length() {
	return 40;
}

function studiare_short_excerpt_length() {
	return 16;
}

function studiare_supershort_excerpt_length() {
	return 6;
}

function studiare_default_excerpt_more() {
	return "&hellip;";
}
