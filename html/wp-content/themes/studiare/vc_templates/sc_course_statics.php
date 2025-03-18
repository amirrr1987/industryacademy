<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

// Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

$css_class = "animated-counter counter-{$color_scheme}";

$text_styles = array();

if ( $color_scheme == 'custom') {

	if ( $text_color !== '' ) {
		$text_styles[] = 'color: '. $text_color .'';
	}
}
//echo $statics_type;
$tvalue=0;
switch($statics_type){
    case 'total_courses':
        $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'posts_per_page' => -1,
        );
        $courses_array =  new WP_Query($args);
        $Total = count($courses_array->posts);//print_r($courses_array->posts);
        $tvalue = intval($Total)+intval($value);
    break;
    
    case 'total_users':
        $usercount = count_users();
        $Total = $usercount['total_users']; 
        $tvalue = intval($Total)+intval($value);
    break;
    
    case 'total_students':
        global $wpdb;
        $result = $wpdb->get_row("
              SELECT SUM(pm.meta_value) AS total_sales
              FROM $wpdb->posts AS p
              LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
              WHERE p.post_type = 'product'
          ");
        $Total = $result->total_sales;  
        $tvalue = intval($Total)+intval($value);
    break;
    
    
    case 'total_teachers':
        $args = array(
        'post_type'             => 'teacher',
        'post_status'           => 'publish',
        );
        $courses_array =  new WP_Query($args);
        $Total = count($courses_array->posts);
        $tvalue = intval($Total)+intval($value);
    break;
    
    default:
    break;
}

?>
<div class="sc_statics_holder <?php echo esc_attr( $style_type ) .' '. esc_attr( $css_class ) . vc_shortcode_custom_css_class($css, ' '); ?>">

	<div class="counter-text" <?php studiare_inline_style($text_styles); ?>>
	<span class="sc_studi_statistic_icon"><i class="<?php echo $icon; ?>"></i></span>
		<div class="counter-number"><?php echo esc_attr( $tvalue ); ?></div>
		
		<?php if ( $label !== '' ) { ?>
			<div class="counter-label"><?php echo wp_kses_post( $label ); ?></div>
		<?php } ?>
	</div>

</div>
