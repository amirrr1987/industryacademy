<?php

class Cdb_Contacts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contacts',
			esc_html__('Studiare: Contact Info', 'studiare'),
			array( 'description' => esc_html__( 'Contacts widget', 'studiare' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($args['before_widget']);
		if ( ! empty( $title ) ) {
			echo wp_kses_post($args['before_title']) . esc_html( $title ) . wp_kses_post($args['after_title']);
		}
		echo '<ul>';
		if(!empty($instance['address'])){
			echo '<li><div class="contact-info-icon"><i class="fal fa-map-marker-alt"></i></div><div class="contact-info-value">' . html_entity_decode( $instance['address'] ) . '</div></li>';
		}

		if(!empty($instance['phone'])){
			echo '<li><div class="contact-info-icon"><i class="fal fa-mobile"></i></div><div class="contact-info-value">' . html_entity_decode( $instance['phone'] ) . '</div></li>';
		}

		if(!empty($instance['fax'])){
			echo '<li><div class="contact-info-icon"><i class="fal fa-fax"></i></div><div class="contact-info-value">' . html_entity_decode( $instance['fax'] ) . '</div></li>';
		}

		if(!empty($instance['email'])){
			echo '<li><div class="contact-info-icon"><i class="fal fa-envelope"></i></div><div class="contact-info-value"><a href="mailto:'.sanitize_email( $instance['email'] ).'">'.sanitize_email( $instance['email'] ).'</a></div></li>';
		}
		echo '</ul>';


		echo wp_kses_post($args['after_widget']);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title = '';
		$address = '';
		$phone = '';
		$fax = '';
		$email = '';

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = esc_html__( 'Contact', 'studiare' );
		}

		if ( isset( $instance[ 'address' ] ) ) {
			$address = $instance[ 'address' ];
		}

		if ( isset( $instance[ 'phone' ] ) ) {
			$phone = $instance[ 'phone' ];
		}

		if ( isset( $instance[ 'fax' ] ) ) {
			$fax = $instance[ 'fax' ];
		}

		if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php esc_html_e( 'Fax:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'E-mail:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo sanitize_email( $email ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_attr( $new_instance['title'] ) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? esc_attr( $new_instance['address'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? esc_attr( $new_instance['phone'] ) : '';
		$instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? esc_attr( $new_instance['fax'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';

		return $instance;
	}

}

function register_contacts_widget() {
	register_widget( 'Cdb_Contacts_Widget' );
}
add_action( 'widgets_init', 'register_contacts_widget' );