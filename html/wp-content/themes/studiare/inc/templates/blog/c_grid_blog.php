<?php
// get_template_part( '/inc/templates/blog/suncode_postgrid' ); 
			/* start suncode postgrid */
			$blog_grid_columns = 'two';

			if ( class_exists('Redux') ) {
				$blog_grid_columns = codebean_option('blog_grid_columns');
			}

			$categories = get_the_category();

			?>
			<div  id="post-<?php the_ID(); ?>" <?php post_class('post sc_pgrid_three'); ?>>
				<div class="sc_equal_height_item">

					<?php if ( has_post_thumbnail() ){
					    
					//the_post_thumbnail_url('studiare-image-250x400-croped');
					 $thumbnail_url = get_the_post_thumbnail_url();
					}else{
					    // Get the default WordPress image URL
                        //$default_image_url = get_template_directory_uri() . '/path/to/default/image.jpg';
                        //$thumbnail_url = $default_image_url;
                        $thumbnail_url = '';
					}
					?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>" class="grid_three_t" style="overflow: hidden; background-image: url(<?php echo $thumbnail_url;  ?>)">
								
								<span class="image-overlay"></span>
							
							
							
						
					<?php //} //endif; ?>
					
                <div class="scpost_data <?php  if($args['sc_show_readmore'] == 'true'){echo "has_readmore";}?>">
					
						<div class="post-title">
						<h4 class="entry-title"><?php the_title(); ?></h4>
						</div>
					<div class="pmeta">
					   <?php 
					    $excerpt = get_the_excerpt(); 
					   ?>
						<div class="post-excerpt">
						<?php //echo get_the_excerpt(get_the_ID()); ?>
						<?php 
						if ( !empty($excerpt) ) {echo the_excerpt();}else{
						    $content = get_the_content();
                            $content = strip_tags($content);
                            $words = explode(' ', $content);
                            $excerpt = implode(' ', array_slice($words, 0, 20));
                            echo $excerpt . '...';
						} ?>
						</div>
						
						<?php  
				$sc_readmore_label = !empty($args['sc_readmore_txt'])?$args['sc_readmore_txt']:"مطالعه بیشتر";
				
				if($args['sc_show_readmore'] == 'true'){?><div class="scpreadmore"><?php echo $sc_readmore_label ; ?><i class="<?php echo $args['readmore_icon'];?>"></i></div><?php } ?>
					
					</div>
					</div>
					
				
				</a>
				</div>
				
				
</div>	

			</div>
<?php
			/* end suncode postgrid */