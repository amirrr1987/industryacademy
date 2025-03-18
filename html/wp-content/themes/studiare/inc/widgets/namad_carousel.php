<?php

class Cdb_Namad_carousel_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'namad_carousel',
			esc_html__('Studiare - Namad Carusel', 'studiare'),
			array( 'description' => esc_html__( 'A widget For Display Enamad and other namads in carusel', 'studiare' ), )
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
		echo '<div class="sc_namad_carousel owl-carousel">';
		if(!empty($instance['namad_one'])){
			echo '<div>' . html_entity_decode( $instance['namad_one'] ) . '</div>';
		}

		if(!empty($instance['namad_two'])){
			echo '<div>' . html_entity_decode( $instance['namad_two'] ) . '</div>';
		}

		if(!empty($instance['namad_three'])){
				echo '<div>' . html_entity_decode( $instance['namad_three'] ) . '</div>';
		}

		if(!empty($instance['namad_four'])){
				echo '<div>' . html_entity_decode( $instance['namad_four'] ) . '</div>';
		}
		echo '</div>';
		
		
		$number = 2;
        ?>
        <style>
		    .sc_namad_carousel img { max-width: 150px; margin: 0 auto; }
		</style>
        <script>
            jQuery(document).ready(function(){
                 jQuery('.sc_namad_carousel').each(
                    function(){
                        var numberofcols = jQuery(this).data('numberofcols');
                        var show_nav = jQuery(this).data('show_nav');
                        var show_dots = jQuery(this).data('show_dots');
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:10,
                            nav:show_nav,
                            dots:show_dots,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:1,
                                },
                                600:{
                                    items:2
                                },
                                1000:{
                                    items:<?php echo $number;?>
                                }
                            }
                        });
                    }
                );
               
                
            });
        </script>
        
        <?php

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
		$namad_one = '';
		$namad_two = '';
		$namad_three = '';
		$namad_four = '';

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = esc_html__( 'Namads', 'studiare' );
		}

		if ( isset( $instance[ 'namad_one' ] ) ) {
			$namad_one = $instance[ 'namad_one' ];
		}

		if ( isset( $instance[ 'namad_two' ] ) ) {
			$namad_two = $instance[ 'namad_two' ];
		}

		if ( isset( $instance[ 'namad_three' ] ) ) {
			$namad_three = $instance[ 'namad_three' ];
		}

		if ( isset( $instance[ 'namad_four' ] ) ) {
			$namad_four = $instance[ 'namad_four' ];
		}

		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'studiare' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'namad_one' ) ); ?>"><?php esc_html_e( 'Namad 1:', 'studiare' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'namad_one' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'namad_one' ) ); ?>" ><?php echo esc_attr( $namad_one ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'namad_two' ) ); ?>"><?php esc_html_e( 'Namad 2:', 'studiare' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'namad_two' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'namad_two' ) ); ?>" ><?php echo esc_attr( $namad_two ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'namad_three' ) ); ?>"><?php esc_html_e( 'Namad 3:', 'studiare' ); ?></label>
		    <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'namad_three' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'namad_three' ) ); ?>" ><?php echo esc_attr( $namad_three ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'namad_four' ) ); ?>"><?php esc_html_e( 'Namad 4:', 'studiare' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'namad_four' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'namad_four' ) ); ?>" ><?php echo esc_attr( $namad_four ); ?></textarea>
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
		$instance['namad_one'] = ( ! empty( $new_instance['namad_one'] ) ) ? esc_attr( $new_instance['namad_one'] ) : '';
		$instance['namad_two'] = ( ! empty( $new_instance['namad_two'] ) ) ? esc_attr( $new_instance['namad_two'] ) : '';
		$instance['namad_three'] = ( ! empty( $new_instance['namad_three'] ) ) ? esc_attr( $new_instance['namad_three'] ) : '';
		$instance['namad_four'] = ( ! empty( $new_instance['namad_four'] ) ) ? esc_attr( $new_instance['namad_four'] ) : '';

		return $instance;
	}

}

function register_namad_carousel_widget() {
	register_widget( 'Cdb_Namad_carousel_Widget' );
}
add_action( 'widgets_init', 'register_namad_carousel_widget' );