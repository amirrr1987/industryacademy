<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

// Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

$css_class = "products grid-view courses-3-columns";

$paged = get_query_var( 'paged', 1 );

//$teachers = new WP_Query( array( 'post_type' => 'teacher', 'posts_per_page' => $per_page ,'paged' => $paged ) );
//echo $teacher_name;

$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish',
    'fields' => 'ids',  //just return ids of products
    'posts_per_page' => -1,
    'meta_key'=>'_studiare_course_teacher',
    'meta_value'=>$teacher_name,
    );
    $teachers = new WP_Query($args);
    //echo count($teachers->posts);

?>

<?php if($teachers->have_posts()): ?>
    <div class="products owl-carousel owl-rtl <?php //echo esc_attr( $css_class ) . vc_shortcode_custom_css_class($css, ' '); ?>">

	    <?php while($teachers->have_posts()): $teachers->the_post(); ?>

		    <?php get_template_part( 'woocommerce/content-product' ); ?>

	    <?php endwhile; ?>
    </div>

<?php else: ?>

	<?php get_template_part( 'inc/templates/not-found' ); ?>

<?php endif; ?>
<script>
    jQuery(document).ready(function($) {
 
  $(".owl-carousel").owlCarousel({
    loop:false,
    nav:true,
    dots:true,
	navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
    responsive:{
                                0:{
                                    items:1,
									nav:true,
                                },
                                768:{
                                    items:2
                                },
                                1000:{
                                    items:3
                                }
                            }
 
  });
 
});
</script>
