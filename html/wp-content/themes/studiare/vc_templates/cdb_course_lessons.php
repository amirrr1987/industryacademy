<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

// Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

$css_class = "course-section";
$rand_id = rand();

/* open close by default */
if($atts['list_open_situ']){$openclass = " active_tab_by_suncode";}else{$openclass = " ";}
?>
<div class="<?php echo esc_attr( $css_class ) . vc_shortcode_custom_css_class($css, ' ');  ?>">
	<?php if(!empty($title)): ?>
      <div data-id="<?php echo $rand_id;?>" class="sc-course-lesson-toggle-wrapper">  <h5 class="course-section-title"><i class="fal fa-ellipsis-h-alt"></i> <?php echo esc_attr($title); ?></h5>
			<div class="sc-course-lesson-toggle"><i class="fad fa-chevron-down"></i></div></div>
	<?php endif; ?>
    <div class="panel-group" style="display:none;">
	    <?php echo wpb_js_remove_wpautop($content); ?>
    </div>
</div>
<script>
    jQuery(".sc-course-lesson-toggle-wrapper").off('click').click(function(el){
        var id = jQuery(this).data('id');
        var query = "[data-id='"+id+"']";
        var item = jQuery(query);
        //alert(id);
        item.toggleClass("active_tab_by_suncode");
        item.next('.panel-group').slideToggle();
    });
	<?php if($atts['list_open_situ']){?>
	jQuery(document).ready(function(){
		var query = "[data-id='"+<?php echo $rand_id;?>+"']";
        var item = jQuery(query);
        //alert(id);
        item.toggleClass("active_tab_by_suncode");
        item.next('.panel-group').slideToggle();
	});
	<?php } ?>
</script>
