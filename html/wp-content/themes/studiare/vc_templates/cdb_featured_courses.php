<?php


// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

list( $query_args, $products_query ) = vc_build_loop_query( $products_query );

// Element Class
$class_to_filter = "products grid-view courses-{$columns}-columns";
$class_to_filter .= $this->getExtraClass( $el_class );
//$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$dots = $carousel_dots;
$navs = $carousel_navs;
$jp_id = rand(1,1000);
$jp_id = "jpcarousel".$jp_id;
if( $columns<=$products_query->post_count && $is_carousel=="yes"  ){
	$css_class ="";
	$post_class = "products sc_featured_owl owl-carousel owl-rtl owl-theme";
			add_action('wp_footer','load_carousel_by_sun_for_stud_featured');
    if(!function_exists('load_carousel_by_sun_for_stud_featured')){
    function load_carousel_by_sun_for_stud_featured(){
        ?>
        <script>
            jQuery(document).ready(function(){
                 jQuery('.sc_featured_owl.owl-carousel').each(
                    function(){
                        var numberofcols = jQuery(this).data('numberofcols');
                        var show_nav = jQuery(this).data('show_nav');
                        var show_dots = jQuery(this).data('show_dots');
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:10,
                            nav:show_nav,
                            dots:show_dots,
							navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
                            responsive:{
                                0:{
                                    items:1
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:numberofcols
                                }
                            }
                        });
                    }
                );
              
/* start equal height */
var FeatsetMinHeight = function(minheight = 0) {
  jQuery('.sc_featured_owl.owl-carousel').each(function(i,e){
    var oldminheight = minheight;
    jQuery(e).find('.sc_equal_height_item').each(function(i,e){
      minheight = jQuery(e).height() > minheight ? jQuery(e).height() : minheight;    
    });
    jQuery(e).find('.sc_equal_height_item').css("min-height",minheight + "px");
    minheight = oldminheight;
  });
};

FeatsetMinHeight();
/* start equal height */
                
            });
        </script>
        <?php
    }
    }
	}else{
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
		$post_class ="";
	}
?>

<div data-show_nav="<?php echo $navs; ?>" data-show_dots="<?php echo $dots; ?>" data-car_id="<?php echo $jp_id; ?>" id="<?php echo $jp_id; ?>" data-numberofcols="<? echo $columns;?>"class="<?php echo $post_class; echo esc_attr( $css_class ) . vc_shortcode_custom_css_class($css, ' '); ?>">
    <?php if ( $products_query->have_posts() ) : $i = 0; 
	
	
	?>
        <?php while( $products_query->have_posts() ) : $products_query->the_post(); ?>
            <?php 
			if(1==1){
			get_template_part( '/woocommerce/content-product' ); 
			}else{
				                global $product;
                
                // Custom Meta
                $prefix = '_studiare_';
                $teacher_id = get_post_meta( get_the_ID(), $prefix . 'course_teacher', true );
                $stock = get_post_meta( get_the_ID(), '_stock', true );
                $regular_price = get_post_meta(get_the_id(), '_regular_price', true );
                $sale_price = get_post_meta(get_the_id(), '_sale_price', true );
		    ?>
            <div <?php post_class( 'course-item' ); ?>>
                <div class="course-item-inner sc_equal_height_item">

		            <?php if ( has_post_thumbnail( ) ) : ?>
                        <div class="course-thumbnail-holder">
                            <a href="<?php the_permalink(); ?>">
					            <?php the_post_thumbnail('studiare-course-thumb', array('class'=>'img-fluid')); ?>
                            </a>
                        </div>
		            <?php endif; ?>

                    <div class="course-content-holder">

                        <div class="course-content-main">
                            <h4 class="course-title">
                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="course-rating-teacher">
					            <?php woocommerce_template_loop_rating(); ?>
					            <?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' ) : ?>
                                    <a href="<?php echo esc_url( get_the_permalink( $teacher_id ) ); ?>" class="course-loop-teacher"><?php echo esc_attr( get_the_title( $teacher_id ) ); ?></a>
					            <?php else : ?>
                                    <h6>&nbsp;</h6>
					            <?php endif; ?>
                            </div>
                            <div class="course-description">
					            <?php the_excerpt(); ?>
                            </div>
                        </div>

                        <div class="course-content-bottom">

				           
                                <div class="course-students">
                                    <i class="material-icons">group</i><span><?php $count = get_post_meta(get_the_ID(),'total_sales', true); $text = sprintf( _n( '%s', '%s', $count, 'wpdocs_textdomain' ), number_format_i18n($count));echo $text;  ?>
                                </div>
				           

                            <div class="course-price">
					            <?php if ( !empty( $sale_price ) && $sale_price != '0' ) : ?>
                                    <span class="price-sale"><?php echo esc_attr( $sale_price        .get_woocommerce_currency_symbol() ); ?></span>
					            <?php elseif( !empty( $regular_price ) && $regular_price != '0' ) : ?>
                                    <span><?php echo esc_attr( $regular_price.get_woocommerce_currency_symbol()); ?></span>
					            <?php else : ?>
                                    <span class="price-free"><?php esc_html_e('Free Course!', 'studiare' ); ?></span>
					            <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        <?php $i++;
			}
 endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
