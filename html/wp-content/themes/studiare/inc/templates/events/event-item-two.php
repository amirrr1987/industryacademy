<?php if( !is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ){ return;}  ?>
          <div id="event-<?php the_ID(); ?>" <?php post_class( 'studiare-event-item' ); ?>>
        <div class="studiare-event-item-holder">

            

            <div class="event-inner-content">

                <div class="top-part">

                    <div class="date-holder">
                        <div class="date-holder-dayofweek" style=" text-align: center; " >
                            <?php echo( wpems_event_start( 'l' ) ); ?>
                        </div>
                        <div class="date">
                            <span class="date-day"><?php echo( wpems_event_start( 'd' ) ); ?></span>
                            <span class="date-month"><?php echo( wpems_event_start( 'F' ) ); ?></span>
                        </div>
                        <div class="date-holder-year" style=" text-align: center; margin-top: 3px; border-radius: 3px; color: white; ">
                            <?php echo( wpems_event_start( 'Y' ) ); ?>
                        </div>
                    </div>

                    <div class="content">
                        <div class="event-meta">
                        <span class="event-meta-piece start-time">
							<i class="fal fa-alarm-clock"></i> <?php echo( wpems_event_start( 'g:i a' ) ); ?> - <?php echo( wpems_event_end( 'g:i a' ) ); ?>
						</span>
			                <?php if ( wpems_event_location() ) { ?>
                                <span class="event-meta-piece location">
								<i class="fal fa-map-marker-alt"></i> <?php echo( wpems_event_location() ); ?>
							</span>
			                <?php } ?>
                        </div>
                        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </div>

                </div> <!-- /.top-part -->

	            <?php if ( has_post_thumbnail() ) : ?>
                    <div class="event-thumbnail">
                        <?php do_action( 'tp_event_single_event_thumbnail' ); ?>
                    </div>
	            <?php endif; ?>

            </div>

            

        </div>

	</div>