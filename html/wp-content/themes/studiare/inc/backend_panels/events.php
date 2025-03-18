<?php



# Portfolio Settings
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Events', 'studiare' ),
	'id'                => 'events_settings',
	'icon'              => 'fal fa-calendar-alt',
	'fields'            => array(
	
		array(
			'id'        => 'event_login_to_woo',
			'type'      => 'switch',
			'title'     => esc_html__( 'Change events login url to woocommerce', 'studiare' ),
			'default'   => false,
		)
	)
) );
