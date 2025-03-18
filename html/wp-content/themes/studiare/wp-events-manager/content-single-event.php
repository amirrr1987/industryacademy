<?php
/**
 * The template for displaying single event content in single event page.
 *
 * Override this template by copying it to yourtheme/wp-events-manager/content-single-event.php
 *
 * @version     2.1
 * @package     WPEMS/Templates
 * @category    Templates
 * @author      Thimpress, leehld
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;
?>

<div class="main-page-content default-margin" id="content">
	<div class="site-content-inner container" role="main">

		<div class="row">

			<div class="event-single-main">

				<div id="event-item-<?php the_ID(); ?>" <?php post_class('event-item-single' ); ?>>

					<div class="event-single-top">

						<?php do_action( 'tp_event_single_event_thumbnail' ); ?>

                        <?php

                            $time_format = get_option( 'time_format' );
                            $time_from   = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
                            $time_finish = get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ) : time();
                            $time_start  = wpems_event_start( $time_format );
                            $time_end    = wpems_event_end( $time_format );

                            //$location = get_post_meta( get_the_ID(), 'tp_event_location', true ) ? get_post_meta( get_the_ID(), 'tp_event_location', true ) : 'Birmingham, UK';
                            $location = get_post_meta( get_the_ID(), 'tp_event_location', true );

                        ?>
                        <div class="event-meta-info">
                            <div class="box-content start-time">
                                <div class="inner">
                                    <div class="text">
                                        <span class="label"><?php esc_html_e( 'Start Time', 'studiare' ); ?></span>
                                        <p><?php echo esc_html( $time_start ); ?></p>
                                        <p><?php echo date_i18n( 'l - Y/m/d', $time_from );//date_i18n( 'l, F j, Y', $time_from ) ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fal fa-calendar-times"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="box-content end-time">
                                <div class="inner">
                                    <div class="text">
                                        <span class="label"><?php esc_html_e( 'End Time', 'studiare' ); ?></span>
                                        <p><?php echo esc_html( $time_end ); ?></p>
                                        <p><?php echo date_i18n( 'l - Y/m/d', $time_finish ); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fal fa-calendar-minus"></i>
                                    </div>
                                </div>
                            </div>
                            <?php if ( ! empty( $location ) ) : ?>
                            <div class="box-content address">
                                <div class="inner">
                                    <div class="text">
                                        <span class="label"><?php esc_html_e( 'Address', 'studiare' ); ?></span>
                                        <p><?php echo esc_html( $location ); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

					</div>

					<div class="event-single-description">
						<?php do_action( 'tp_event_single_event_content' ); ?>

						<?php do_action( 'tp_event_loop_event_location' ); ?>
					</div>

				</div>

			</div>

			<div class="event-single-side sticky-sidebar">
			     <?php do_action( 'tp_event_loop_event_countdown' ); ?>
			     <br>
			     <?php 
			     //if ($time_finish>time() ){ 


                // Provided timestamp
                $timestamp = $time_finish;
                
                // Provided time (hour and minute)
                $time_part = $time_end;
                
                // Convert timestamp to a DateTime object
                $datetime = new DateTime();
                $datetime->setTimestamp($timestamp);
                
                // Extract hour and minute from the provided time
                list($hour, $minute) = explode(':', $time_part);

                // Add the hour and minute to the DateTime object
                $datetime->setTime((int)$hour, (int)$minute);
                
                // Get the combined timestamp
                $combined_timestamp = $datetime->getTimestamp();
			     
			     if ( ($combined_timestamp )>time() ){ ?>
				<div class="event-single-side-inner">
					<?php do_action( 'tp_event_after_single_event' ); ?>
				</div>
				<?php } ?>
			</div>

		</div>

	</div>
</div>
