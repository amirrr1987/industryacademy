<?php
# ticket Settings
Redux::setSection( $opt_name, array(
	'title'             => esc_html__( 'Support System', 'studiare' ),
	'id'                => 'tickets_settings',
	'icon'              => 'fal fa-ticket',
	'fields'            => array(
		array(
			'id'        => 'tickets_status',
			'type'      => 'switch',
			'title'     => esc_html__( 'Support System', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'tickets_in_dashbard_page',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Support System stats in dashboard', 'studiare' ),
			'default'   => true,
			'required'  => array('tickets_status', '=', '1'),
		),
	)
) );