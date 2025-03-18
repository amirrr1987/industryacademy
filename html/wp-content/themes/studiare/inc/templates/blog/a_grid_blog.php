<?php
$colnum = $args['colnum']?:"1";
switch($colnum){
    case 1 :
    $colname = "mainpost";
    break;
    case 2 :
    $colname = "secondpost";
    break;
    case 3 :
    $colname = "thirdpost";
    break;
    case 4 :
    $colname = "fourthpost";
    break;
    case 5 :
    $colname = "fifthpost";
    break;
    default:
    $colname = "mainpost";
}
if ( class_exists('Redux') ) {
    $blog_pro_image_size = codebean_option('blog_pro_image_size')?:"studiare-image-420x294-croped";
}
?>

<div class="studigriditem <?php echo $colname;?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
  <div class="post-inner">
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
						
						<div class="post-meta date">
							<i class="fal fa-calendar-alt"></i>
							<?php echo get_the_date(); ?>
						</div>
						
					</div>
					
				</div>
				
  </div>
</div>
 
