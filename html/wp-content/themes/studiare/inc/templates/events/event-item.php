<?php if( !is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ){ return;}  ?>
   
          <div id="event-<?php the_ID(); ?>" class="course-item">
          <div class="scevent-inner">
                
                
                    
                     
                    <div class="event-thumbnail">
                        <?php if ( has_post_thumbnail() ){ 
                         do_action( 'tp_event_single_event_thumbnail' ); 
                        } 
                        
                        ?>
                    </div>
	             <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <div class="scdate-holder">
                        <div class="date">
                          	<i class="fal fa-calendar"></i>  <span class="date-day"><?php echo( wpems_event_start( 'd' ) ); ?></span>
                            <span class="date-month"><?php echo( wpems_event_start( 'F Y' ) ); ?></span>
                            <span class="event-meta-piece start-time">
							<i class="fal fa-alarm-clock"></i> <?php echo( wpems_event_start( 'g:i a' ) ); ?> - <?php echo( wpems_event_end( 'g:i a' ) ); ?>
						</span>
                        </div>
                        <div class="event-meta">
                        
			                <?php
			                
			                if ( wpems_event_location() ) { ?>
                                <span class="event-meta-piece location">
								<i class="fal fa-map-marker-alt"></i> <?php echo( wpems_event_location() ); ?>
							</span>
			                <?php } 
			                ?>
                        </div>
                </div>
                
          </div>
          </div>
 
       
      