<?php
/**
 * The Template for displaying shortcode user account.
 *
 * Override this template by copying it to yourtheme/wp-events-manager/shortcodes/user-account.php
 *
 * @author        ThimPress, leehld
 * @package       WP-Events-Manager/Template
 * @version       2.1.7.4
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$query = new WP_Query( $args );

wpems_print_notices();

if ( ! is_user_logged_in() ) {
	printf( __( 'You are not <a href="%s">login</a>', 'studiare' ), wpems_login_url() );

	return;
}

if ( $query->have_posts() ) { ?>

    <table>
        <thead>
        <th><?php _e( 'Booking ID', 'studiare' ); ?></th>
        <th><?php _e( 'Events', 'studiare' ); ?></th>
        <th><?php _e( 'Type', 'studiare' ); ?></th>
        <th><?php _e( 'Cost', 'studiare' ); ?></th>
        <th><?php _e( 'Quantity', 'studiare' ); ?></th>
        <th><?php _e( 'Method', 'studiare' ); ?></th>
        <th><?php _e( 'Status', 'studiare' ); ?></th>
        <th></th>
        </thead>

        <tbody>
		<?php foreach ( $query->posts as $post ) { ?>
			<?php $booking = WPEMS_Booking::instance( $post->ID ) ?>
            <tr>
                <td><?php printf( '%s', wpems_format_ID( $post->ID ) ) ?></td>
                <td><?php printf( '%s', get_the_title( $booking->event_id ) ) ?></td>
                <td><?php printf( '%s', floatval( $booking->price ) == 0 ? __( 'Free', 'studiare' ) : __( 'Cost', 'studiare' ) ) ?></td>
                <td><?php printf( '%s', wpems_format_price( floatval( $booking->price ), $booking->currency ) ) ?></td>
                <td><?php printf( '%s', $booking->qty ) ?></td>
                <td><?php printf( '%s', $booking->payment_id ? wpems_get_payment_title( $booking->payment_id ) : __( 'No payment', 'studiare' ) ) ?></td>
                <th><?php printf( '%s', wpems_booking_status( $booking->ID ) ); ?></th>
                <td><?php printf( '<a href="%s" class="button">%s</a>', get_the_permalink( $booking->event_id ), __( 'Show Event', 'studiare' ) ) ?></td>
            </tr>
		<?php } ?>
        </tbody>
    </table>

	<?php
	$args = array(
		'base'               => '%_%',
		'format'             => '?paged=%#%',
		'total'              => 1,
		'current'            => 0,
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 2,
		'prev_next'          => true,
		'prev_text'          => __( '« Previous', 'studiare' ),
		'next_text'          => __( 'Next »', 'studiare' ),
		'type'               => 'plain',
		'add_args'           => false,
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => ''
	);

	echo paginate_links( array(
		'base'      => str_replace( 9999999, '%#%', esc_url( get_pagenum_link( 9999999 ) ) ),
		'format'    => '?paged=%#%',
		'prev_text' => __( 'Previous', 'studiare' ),
		'next_text' => __( 'Next', 'studiare' ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages
	) );
	?>

<?php } else { ?>
    <p><?php esc_html_e( 'No event booking has been made yet.', 'studiare' ); ?></p>
    <a class="button"
       href="<?php echo get_post_type_archive_link( 'tp_event' ); ?>"><?php esc_html_e( 'Go to Events', 'studiare' ); ?></a>
<?php } ?>

<?php wp_reset_postdata(); ?>
