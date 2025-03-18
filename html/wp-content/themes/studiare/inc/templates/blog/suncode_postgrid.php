<?php
// get_template_part( '/inc/templates/blog/suncode_postgrid' ); 
			/* start suncode postgrid */
			$blog_grid_columns = 'two';

			if ( class_exists('Redux') ) {
				$blog_grid_columns = codebean_option('blog_grid_columns');
				$blog_pro_image_size = codebean_option('blog_pro_image_size')?:"studiare-image-420x294-croped";
			}

			$categories = get_the_category();

			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
				<div class="post-inner sc_equal_height_item">

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php
					            the_post_thumbnail($blog_pro_image_size, array('class'=>'img-fluid'));
					            ?>
							</a>
							<div class="post-meta post-category">
							<?php if ( ! empty( $categories ) ) {
								echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							} ?>
						</div>
						</div>
					<?php endif; ?>
					
                <div class="scpost_data <?php  if($args['sc_show_readmore'] == 'true'){echo "has_readmore";}?>">
					<div class="post-content">
						
						<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php if ( $blog_grid_columns == 'one' ) : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						<div class="post-meta date">
							<i class="fal fa-calendar-alt"></i>
							<?php echo get_the_date(); ?>
						</div>
						<?php if ( $blog_grid_columns == 'one' ) : ?>
							<div class="post-meta author">
								  <i class="fal fa-user"></i>
								<?php esc_html_e('Posted by', 'studiare'); ?>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
							</div>
						<?php endif; ?>
					</div>
					
				</div>
				<?php  
				$sc_readmore_label = !empty($args['sc_readmore_txt'])?$args['sc_readmore_txt']:"مطالعه بیشتر";
				
				if($args['sc_show_readmore'] == 'true'){?><div  class="post_readmore"><a href="<?php the_permalink(); ?>"><?php echo $sc_readmore_label ; ?><i class="<?php echo $args['readmore_icon'];?>"></i></a></div><?php } ?>
</div>				
			</div>
<?php
			/* end suncode postgrid */