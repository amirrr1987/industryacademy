<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );
print_r($atts);

		$separator_num_id = rand(1,1000);
		$separator_id = "sc_separator_".$separator_num_id;

		$css_id = '#' . $separator_id;

		$style = $atts['style'];
		$c1 = $atts['color1'] ? $atts['color1'] : 'transparent';
		$c2 = $atts['color2'] ? $atts['color2'] : 'transparent';
		$c3 = $atts['color3'] ? $atts['color3'] : 'transparent';
		$h = $atts['sep_height'] ? $atts['sep_height'] : '';
		$w = $atts['sep_width'] ? $atts['sep_width'] : '100%';

		$atts['transform'] .= empty( $atts['priority'] ) ? '' : ' z99';
		$atts['transform'] .= empty( $atts['relative'] ) ? '' : ' sc_relative';
		
		$out = '<div class="sc_relative"><div id="' . $separator_id . '" class="sc_separator cz_sep2_' . $style . ' ' . $atts['transform'] . '" >';

		$out .= sc_studi_separators_svg( $style , $c1 , $c2, $c3 , $h, $w );

		// Inner
		$out .= '</div></div>';
		
		return $out;

