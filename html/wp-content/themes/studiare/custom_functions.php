<?php
/**
 * you can insert any custom function here
 * */
 

function studiare_customize_search_query( $query ) {
    // Ensure this only modifies the main search query in the front-end
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        $sp_result_perpage = "9";
        if ( class_exists('Redux')) {
        
        $sp_result_perpage = codebean_option("sp_result_perpage");
    }
        
        // Set custom number of posts per page
        $query->set( 'posts_per_page', $sp_result_perpage ); // Replace with your desired value

    }
}
add_action( 'pre_get_posts', 'studiare_customize_search_query' );


/**
 * for loading elementor header and footer properly
 *
 **/

/* solve problem that not showing price in variations with same price */
add_filter( 'woocommerce_show_variation_price', function() { return true; } );
 
function studi_load_elementor_assets() {

    // Check if Elementor is active and in edit mode
    if ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
        // Load Elementor frontend styles
        wp_enqueue_style( 'elementor-frontend' );
    }

    // Check if Elementor Pro is active
    if ( class_exists( '\ElementorPro\Plugin' ) ) {
        // Load Elementor Pro styles by enqueuing its main frontend style handle
        wp_enqueue_style( 'elementor-pro' );
    }
}
add_action('wp_enqueue_scripts', 'studi_load_elementor_assets');



function studi_get_post_orderby() {

  if ( ! is_admin() ) {
    return false;
  }

  $orderby_data = array(
    'menu_order'              => __( 'Menu Order', 'studiare' ),
    'date_post'               => __( 'Newest', 'studiare' ),
    'comment_count'           => __( 'Comment Count', 'studiare' ),
    'popularity'              => __( 'Popular ', 'studiare' ),
    //'top_review'              => __( 'Top Review', 'studiare' ),
    'rand'                    => __( 'Random', 'studiare' ),
    'author'                  => __( 'Author', 'studiare' ),
    'alphabetical_order_decs' => __( 'Alphabetical Descending', 'studiare' ),
    'alphabetical_order_asc'  => __( 'Alphabetical Asceding', 'studiare' ),
    'best_selling'            => __( 'Best Selling', 'studiare' ),
    'featured_product'        => __( 'Featured Product', 'studiare' ),
    'top_rate'                => __( 'Top Rate', 'studiare' ),
    'on_sale'                 => __( 'Onsale', 'studiare' )
  );

  return $orderby_data;
  
}



/**
 * style mejs player
 * */
add_action( 'wp_footer', 'ci_theme_footer_scripts' );

function ci_theme_footer_scripts() {
	if ( wp_style_is( 'wp-mediaelement', 'enqueued' ) ) {
		//wp_enqueue_style( 'my-theme-player', get_template_directory_uri() . '/css/my-theme-player.css', array('wp-mediaelement',), '1.0' );
		?>
<style>


    /* Player background */
.studi_podcast_slider .mytheme-mejs-container.mejs-container,
.studi_podcast_slider .mytheme-mejs-container .mejs-controls,
.studi_podcast_slider .mytheme-mejs-container .mejs-embed,
.studi_podcast_slider .mytheme-mejs-container .mejs-embed body {
  background-color: #efefef !important;border-radius: 10px;
}

/* Player controls */
.studi_podcast_slider .mytheme-mejs-container .mejs-button > button {
  background-image: url("<?php echo get_template_directory_uri()."/assets/images/studi_mejs_player_buttons.svg" ?>");   /*wp-includes/js/mediaelement/mejs-controls-dark.svg*/
}

.studi_podcast_slider .mytheme-mejs-container .mejs-time {
  color: #888888;
}

/* Progress and audio bars */

/* Progress and audio bar background */
.studi_podcast_slider .mytheme-mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total,
.studi_podcast_slider .mytheme-mejs-container .mejs-controls .mejs-time-rail .mejs-time-total {
  background-color: #fff;
}

/* Track progress bar background (amount of track fully loaded)
  We prefer to style these with the main accent color of our theme */
.studi_podcast_slider .mytheme-mejs-container .mejs-controls .mejs-time-rail .mejs-time-loaded {
  background-color: rgba(219, 78, 136, 0.075);
}

/* Current track progress and active audio volume level bar */
.studi_podcast_slider .mytheme-mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.studi_podcast_slider .mytheme-mejs-container .mejs-controls .mejs-time-rail .mejs-time-current {
  background: var(--primary_color);
}

/* Reduce height of the progress and audio bars */
.studi_podcast_slider .mytheme-mejs-container .mejs-time-buffering,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-current,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-float,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-float-corner,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-float-current,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-hovered,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-loaded,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-marker,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-total,
.studi_podcast_slider .mytheme-mejs-container .mejs-horizontal-volume-total,
.studi_podcast_slider .mytheme-mejs-container .mejs-time-handle-content {
  height: 3px;
}

.studi_podcast_slider .mytheme-mejs-container .mejs-time-handle-content {
  top: -6px;
}

.studi_podcast_slider .mytheme-mejs-container .mejs-time-total {
  margin-top: 8px;
}

.studi_podcast_slider .mytheme-mejs-container .mejs-horizontal-volume-total {
  top: 19px;
}

.studi_podcast_slider .mytheme-mejs-container.mejs-container { max-width: 400px; }
.mytheme-mejs-container .mejs-controls { flex-direction: row-reverse; }
.studi_podcast_slider .mytheme-mejs-container .mejs-time-handle-content { border: 4px solid var(--primary_color);
</style>		
		<?php
	}
} 

/**
 * Add an HTML class to MediaElement.js container elements to aid styling.
 *
 * Extends the core _wpmejsSettings object to add a new feature via the
 * MediaElement.js plugin API.
 */
add_action( 'wp_print_footer_scripts', 'mytheme_mejs_add_container_class' );

function mytheme_mejs_add_container_class() {
	if ( ! wp_script_is( 'mediaelement', 'done' ) ) {
		return;
	}
	?>
	<script>
	(function() {
		var settings = window._wpmejsSettings || {};
		settings.features = settings.features || mejs.MepDefaults.features;
		settings.features.push( 'exampleclass' );
		MediaElementPlayer.prototype.buildexampleclass = function( player ) {
			player.container.addClass( 'mytheme-mejs-container' );
		};
	})();
	</script>
	<?php
}





add_action('wp_head','studi_page_bg_color');
function studi_page_bg_color(){
    
    $prefix = '_studiare_';
    $color = get_post_meta( get_the_ID(), $prefix . 'bg_color', true );
    if(!empty($color)){
        echo "<style>.main-page-content{background:$color !important;}</style>";
    }
}


/* start svg upload support  */
// Wp v4.7.1 and higher
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function studi_cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'studi_cc_mime_types' );

function studi_fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'studi_fix_svg' );



add_filter( 'upload_mimes', 'studi_myme_types', 1, 1 );

function studi_myme_types( $mime_types ) {

  $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension



  return $mime_types;

}


/* end svg upload support  */




// Remove Google Fonts
add_filter( 'style_loader_tag', function($tag, $handle, $href){
    if (strpos($href, 'fonts.googleapis.com') !== false) {
        return '';
    }
    return $tag;
}, 10, 3);



/* add walker to mobile nav */
function studi_mobile_filter_primary_nav_menu_dropdown( $item_output, $item, $depth, $args ) {

    // Only for our primary menu location.
    if ( empty( $args->theme_location ) || 'mobile-menu' !== $args->theme_location ) {
        return $item_output;
    }

    // Add the dropdown for items that have children.
    if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
        return $item_output . '<span class="subtri"><i class="fal fa-chevron-down"></i></span>';
    }

    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'studi_mobile_filter_primary_nav_menu_dropdown', 10, 4 );
