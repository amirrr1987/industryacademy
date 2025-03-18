<?php
/**
 * sc_studi Framework
 *
 * WARNING: This file is part of the sc_studi Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @version: 1.0.0
 * @package  sc_studi/Template
 * @author   Themesc_studi
 * @link	 http://theme-sc_studi.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

function sc_get_post_in_menu($pid){
	//WPBMap::addAllMappedShortcodes(); // This does all the work
	$result_page = '';
	global $post;
	$post = get_post($pid);
	//setup_postdata( $post );
	//$result_page = do_shortcode($post->post_content);
	//wp_reset_postdata( $post );
	//return $result_page; 
	$content = "";
	 $content .= \Elementor\Plugin::$instance->frontend->get_builder_content( $post->ID, false );
	 wp_reset_query();
	 wp_reset_postdata( $post );
	 return do_shortcode($content); 
}


add_action( 'wp_nav_menu_item_custom_fields', 'sc_studi_add_megamenu_fields', 10, 4 );
function sc_studi_add_megamenu_fields( $item_id, $item, $depth, $args ) { ?>
	<div class="clear"></div>
	<div class="sc_studi-mega-menu-options">
		<p class="field-megamenu-status description description-wide">
			<label for="edit-menu-item-megamenu-status-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-status-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-status" name="menu-item-sc_studi-megamenu-status[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->sc_studi_megamenu_status, 'enabled' ); ?> />
				<strong><?php esc_html_e( 'Activate megamenu (main menu only)', 'studiare' ); ?></strong>
			</label>
		</p>
		<p class="field-megamenu-width description description-wide">
			<label for="edit-menu-item-megamenu-width-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-width-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-width" name="menu-item-sc_studi-megamenu-width[<?php echo $item_id; ?>]" value="fullwidth" <?php checked( $item->sc_studi_megamenu_width, 'fullwidth' ); ?> />
				<?php esc_html_e( 'full width megamenu (column width is ignored)', 'studiare' ); ?>
			</label>
		</p>
		<p class="field-megamenu-columns description description-wide">
			<label for="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>">
				<?php esc_html_e( 'The number of megamanu columns', 'studiare' ); ?>
				<select id="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-columns" name="menu-item-sc_studi-megamenu-columns[<?php echo $item_id; ?>]">
					<option value="auto" <?php selected( $item->sc_studi_megamenu_columns, 'auto' ); ?>><?php esc_html_e( 'automatic', 'studiare' ); ?></option>
					<option value="1" <?php selected( $item->sc_studi_megamenu_columns, '1' ); ?>>1</option>
					<option value="2" <?php selected( $item->sc_studi_megamenu_columns, '2' ); ?>>2</option>
					<option value="3" <?php selected( $item->sc_studi_megamenu_columns, '3' ); ?>>3</option>
					<option value="4" <?php selected( $item->sc_studi_megamenu_columns, '4' ); ?>>4</option>
					<option value="5" <?php selected( $item->sc_studi_megamenu_columns, '5' ); ?>>5</option>
					<option value="6" <?php selected( $item->sc_studi_megamenu_columns, '6' ); ?>>6</option>
				</select>
			</label>
		</p>
		<p class="field-megamenu-columnwidth description description-wide">
			<label for="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>">
				<?php esc_html_e( 'megamanu column width (for example 30%)', 'studiare' ); ?>
				<input type="text" id="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-columnwidth" name="menu-item-sc_studi-megamenu-columnwidth[<?php echo $item_id; ?>]" value="<?php echo $item->sc_studi_megamenu_columnwidth; ?>" />
			</label>
		</p>		
		<p class="field-megamenu-title description description-wide">
			<label for="edit-menu-item-megamenu-title-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-title" name="menu-item-sc_studi-megamenu-title[<?php echo $item_id; ?>]" value="disabled" <?php checked( $item->sc_studi_megamenu_title, 'disabled' ); ?> />
				<?php esc_html_e( 'Hide megamenu column title', 'studiare' ); ?>
			</label>
		</p>
		<p class="field-megamenu-innertitle description description-wide">
			<label for="edit-menu-item-megamenu-innertitle-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-innertitle-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-innertitle" name="menu-item-sc_studi-megamenu-innertitle[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->sc_studi_megamenu_innertitle, 'enabled' ); ?> />
				<?php esc_html_e( 'Display the title of the megamanu column', 'studiare' ); ?>
			</label>
		</p>
		<p class="field-megamenu-widgetarea description description-wide">
			<label for="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>">
				<?php esc_html_e( 'Megamenu widget area', 'studiare' ); ?>
				<select id="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-widgetarea" name="menu-item-sc_studi-megamenu-widgetarea[<?php echo $item_id; ?>]">
					<option value="0"><?php esc_html_e( 'Select Widget Area', 'studiare' ); ?></option>
					<?php
					global $wp_registered_sidebars;
					if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ):
					foreach( $wp_registered_sidebars as $sidebar ):
					?>
					<option value="<?php echo $sidebar['id']; ?>" <?php selected( $item->sc_studi_megamenu_widgetarea, $sidebar['id'] ); ?>><?php echo $sidebar['name']; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</label>
		</p>
		<!-- add megamenu post type by suncode -->
		
		<p class="field-megamenu-posttype description description-wide">
			<label for="edit-menu-item-megamenu-posttype-<?php echo $item_id; ?>">
				<?php esc_html_e( 'Megamenu page area', 'studiare' ); ?>
				<select id="edit-menu-item-megamenu-posttype-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-posttype" name="menu-item-sc_studi-megamenu-posttype[<?php echo $item_id; ?>]">
					<option value="0"><?php esc_html_e( 'Select page', 'studiare' ); ?></option>
					<?php
					$megamenuposts = get_posts( array(
						'post_type' => 'sc_megamenu',
						'post_status' => 'publish',
						'nopaging' => true,
					) );
					if( $megamenuposts ):
					foreach( $megamenuposts as $post ):
					?>
					<option value="<?php echo $post->ID; ?>" <?php selected( $item->sc_studi_megamenu_posttype, $post->ID ); ?>><?php echo get_the_title($post->ID); ?></option>
					<?php endforeach; endif; ?>
				</select>
			</label>
		</p>
		<!-- add megamenu post type by suncode -->
		<p class="field-megamenu-label description description-wide">
			<label for="edit-menu-item-megamenu-label-<?php echo $item_id; ?>">
				<?php esc_html_e( 'New label', 'studiare' ); ?><input type="checkbox" id="edit-menu-item-megamenu-newlabel-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-newlabel" name="menu-item-sc_studi-megamenu-newlabel[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->sc_studi_megamenu_newlabel, 'enabled' ); ?> />
				
				&nbsp;&nbsp;<?php esc_html_e( 'Hot label', 'studiare' ); ?>
				<input type="checkbox" id="edit-menu-item-megamenu-hotlabel-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-hotlabel" name="menu-item-sc_studi-megamenu-hotlabel[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->sc_studi_megamenu_hotlabel, 'enabled' ); ?> />
				
				&nbsp;&nbsp;<?php esc_html_e( 'Sale label', 'studiare' ); ?>
				<input type="checkbox" id="edit-menu-item-megamenu-salelabel-<?php echo $item_id; ?>" class="widefat edit-menu-item-megamenu-salelabel" name="menu-item-sc_studi-megamenu-salelabel[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->sc_studi_megamenu_salelabel, 'enabled' ); ?> />
				
			</label>
		</p>
		<p class="field-megamenu-icon description description-wide">
			<label for="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>">
				<span><?php //echo $this->fields['icon'] ?></span>
				<a href="#" class="button-secondary pick-icon"><i class=" fa <?php echo $item->sc_studi_megamenu_icon; ?>"></i> <?php esc_html_e( 'Choose Icon', 'studiare' ) ?></a>
				<span class="icons-block">
					<input type="text" class="search-icon" placeholder="<?php esc_attr_e( 'Quick search', 'studiare' ) ?>">
					<span class="icon-selector">
						<i data-icon="">&nbsp;</i>
						<?php echo implode( "\n", sc_studi_get_icons( ) ); ?>
					</span>
				</span>
				<input type="hidden" name="menu-item-sc_studi-megamenu-icon[<?php echo $item_id; ?>]" value="<?php echo $item->sc_studi_megamenu_icon; ?>">
			</label>
		</p>
		<a href="#" id="sc_studi-media-upload-<?php echo $item_id; ?>" class="sc_studi-open-media button button-primary sc_studi-megamenu-upload-thumbnail"><?php esc_html_e( 'Set Image', 'studiare' ); ?></a>
		<p class="field-megamenu-thumbnail description description-wide">
			<label for="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>">
				<input type="hidden" id="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>" class="sc_studi-new-media-image widefat edit-menu-item-megamenu-thumbnail" name="menu-item-sc_studi-megamenu-thumbnail[<?php echo $item_id; ?>]" value="<?php echo $item->sc_studi_megamenu_thumbnail; ?>" />
				<img src="<?php echo $item->sc_studi_megamenu_thumbnail; ?>" id="sc_studi-media-img-<?php echo $item_id; ?>" class="sc_studi-megamenu-thumbnail-image" style="<?php echo ( trim( $item->sc_studi_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>" />
				<a href="#" id="sc_studi-media-remove-<?php echo $item_id; ?>" class="remove-sc_studi-megamenu-thumbnail" style="<?php echo ( trim( $item->sc_studi_megamenu_thumbnail ) ) ? 'display: inline;' : '';?>"><?php esc_html_e( 'Delete Image', 'studiare' ); ?></a>
			</label>
		</p>
	</div><!-- .sc_studi-mega-menu-options-->
<?php }


/**
 * Display field type icon
 *
 * @since  1.0.0
 *
 * @param  string $selected The selected icon
 */
function sc_studi_get_icons( $selected = '' ) {
	$icons = sc_studi_font_awesome_icon();
	$list = array();

	foreach( $icons as $icon ) {
		$list[] = sprintf(
			'<i class="fal %1$s" data-icon="%1$s %2$s"></i>',
			esc_attr( $icon ),
			$icon == $selected ? 'selected' : ''
		);
	}

	return $list;
}
	
// Dont duplicate me!
if( ! class_exists( 'sc_studiFrontendWalker' ) ) {
	class sc_studiFrontendWalker extends Walker_Nav_Menu {

		/**
		 * @var string $menu_megamenu_status are we currently rendering a mega menu?
		 */
		private $menu_megamenu_status = "";

		/**
		 * @var string $menu_megamenu_width use full width mega menu?
		 */
		private $menu_megamenu_width = "";

		/**
		 * @var int $num_of_columns how many columns should the mega menu have?
		 */
		private $num_of_columns = 0;

		/**
		 * @var int $max_num_of_columns mega menu allow for 6 columns at max
		 */
		private $max_num_of_columns = 6;

		/**
		 * @var int $total_num_of_columns total number of columns for a single megamenu?
		 */
		private $total_num_of_columns = 0;

		/**
		 * @var int $num_of_rows number of rows in the mega menu
		 */
		private $num_of_rows = 1;

		/**
		 * @var array $submenu_matrix holds number of columns per row
		 */
		private $submenu_matrix = array();

		/**
		 * @var float $menu_megamenu_columnwidth how large is the width of a column?
		 */
		private $menu_megamenu_columnwidth = 0;
		
		/**
		 * @var array $menu_megamenu_rowwidth_matrix how large is the width of each row?
		 */
		private $menu_megamenu_rowwidth_matrix = array();	

		/**
		 * @var float $menu_megamenu_maxwidth how large is the overall width of a column?
		 */
		private $menu_megamenu_maxwidth = 0;

		/**
		 * @var string $menu_megamenu_title should a colum title be displayed?
		 */
		private $menu_megamenu_title = '';
		
		/**
		 * @var string $menu_megamenu_inner_title should a colum title be displayed?
		 */
		private $menu_megamenu_innertitle = '';		

		/**
		 * @var string $menu_megamenu_widget_area should one column be a widget area?
		 */
		private $menu_megamenu_widget_area = '';
		
		/**
		 * @var string $menu_megamenu_newlabel should a colum new label be displayed?
		 */
		private $menu_megamenu_newlabel = '';
		
		/**
		 * @var string $menu_megamenu_hotlabel should a colum hot label be displayed?
		 */
		private $menu_megamenu_hotlabel = '';
		
		/**
		 * @var string $menu_megamenu_salelabel should a colum sale label be displayed?
		 */
		private $menu_megamenu_salelabel = '';

		/**
		 * @var string $menu_megamenu_icon does the item have an icon?
		 */
		private $menu_megamenu_icon = '';

		/**
		 * @var string $menu_megamenu_thumbnail does the item have a thumbnail?
		 */
		private $menu_megamenu_thumbnail = '';

		/**
		 * Sets the overall width of the megamenu wrappers
		 *
		 */
		private function set_megamenu_max_width() {
			global $smof_data;
			$smof_data=array('site_width'=>'1100','megamenu_max_width'=>'1100');
		
			// Set overall width of megamenu
			$site_width = (int) str_replace( 'px', '', $smof_data['site_width'] );
			$megamenu_max_width = (int) str_replace( 'px', '', $smof_data['megamenu_max_width'] );
			//$site_width = (int) str_replace( 'px', '', 1100);
			//$megamenu_max_width = (int) str_replace( 'px', '', 1100 );
			$megmanu_width = 0;

			// Site width in px
			if ( strpos( $smof_data['site_width'], 'px' ) !== false ) {
				if ( $site_width > $megamenu_max_width &&
					 $megamenu_max_width > 0
				) {
					$megamenu_width = $megamenu_max_width;	
				} else {
					$megamenu_width = $site_width;
				}
			// Site width in %
			} else {
				$megamenu_width = $megamenu_max_width;
			}
			$this->menu_megamenu_maxwidth = $megamenu_width;
		}

		/**
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );

			if( $depth === 0 && $this->menu_megamenu_status == "enabled" ) {
				// set overall width of megamenu				
				if( ! $this->menu_megamenu_maxwidth ) {
					$this->set_megamenu_max_width();
				}
				
				$output .= "\n{first_level}\n";
				$output .= "\n$indent<div class=\"sc_studi-megamenu-holder\" {megamenu_final_width}>\n<ul class='sc_studi-megamenu {megamenu_border}'>\n";
			} elseif( $depth >= 2 && $this->menu_megamenu_status == "enabled" ) {
				$output .= "\n$indent<ul class=\"sub-menu deep-level\">\n";
			} else {
				$output .= "\n$indent<ul class=\"sub-menu\">\n";
			}
		}

		/**
		 * @see Walker::end_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			global $smof_data;
			$smof_data=array('site_width'=>'1100','megamenu_max_width'=>'1100');
		
			$indent = str_repeat( "\t", $depth );
			$row_width = '';

			if( $depth === 0  && $this->menu_megamenu_status == "enabled" ) {

				$output .= "\n</ul>\n</div><div style='clear:both;'></div>\n</div>\n</div>\n";

				if( $this->total_num_of_columns < $this->max_num_of_columns ) {
					$col_span = " col-span-" . $this->total_num_of_columns * 2;
				} else {
					$col_span = " col-span-" . $this->max_num_of_columns * 2;
				}

				if ( $this->menu_megamenu_width == "fullwidth" ) {
					$col_span = " col-span-12 sc_studi-megamenu-fullwidth";
					// overall megamenu wrapper width in px is max width for fullwidth megamenu
					$wrapper_width = $this->menu_megamenu_maxwidth;
				} else {
					// calc overall megamenu wrapper width in px
					$wrapper_width = max( $this->menu_megamenu_rowwidth_matrix ) * $this->menu_megamenu_maxwidth;
				}
				
				if($this->menu_megamenu_thumbnail !=""){
					$output = str_replace( "{first_level}", "<div class='sc_studi-megamenu-wrapper {sc_studi_columns} columns-".$this->total_num_of_columns . $col_span . "' data-maxwidth='" . $this->menu_megamenu_maxwidth . "' style=background-image:url('". $this->menu_megamenu_thumbnail ."')><div class='row'>", $output );
				}else{
						$output = str_replace( "{first_level}", "<div class='sub-menu sc_studi-megamenu-wrapper {sc_studi_columns} columns-".$this->total_num_of_columns . $col_span . "' data-maxwidth='" . $this->menu_megamenu_maxwidth . "' ><div class='row'>", $output );
				}
				
				$output = str_replace( "{megamenu_final_width}", sprintf( 'style="width:%spx;" data-width="%s"', $wrapper_width, $wrapper_width ), $output );
				
				if ( $this->total_num_of_columns > $this->max_num_of_columns ) {
					$output = str_replace( "{megamenu_border}","sc_studi-megamenu-border", $output );
				} else {
					$output = str_replace( "{megamenu_border}","", $output );
				}

				foreach($this->submenu_matrix as $row => $columns) {
					$layout_columns = 12 / $columns;
					if( $columns == '5' ) {
						$layout_columns = 2;
					}

					if( $columns < $this->max_num_of_columns ) {
						$row_width = "style=\"width:" . $columns / $this->max_num_of_columns * 100 . "%!important;\"";
					}

					$output = str_replace( "{row_width_".$row."}", $row_width, $output);

					if( ( $row - 1 ) * $this->max_num_of_columns + $columns < $this->total_num_of_columns ) {
						$output = str_replace( "{row_number_".$row."}", "sc_studi-megamenu-row-columns-" . $columns . " sc_studi-megamenu-border", $output);
					} else {
						$output = str_replace( "{row_number_".$row."}", "sc_studi-megamenu-row-columns-" . $columns, $output);
					}
					$output = str_replace( "{current_row_".$row."}", "sc_studi-megamenu-columns-".$columns." col-lg-" . $layout_columns . " col-md-" . $layout_columns . " col-sm-" . $layout_columns, $output );
					
					$output = str_replace( "{sc_studi_columns}", sprintf( 'sc_studi-columns-%s columns-per-row-%s', $columns, $columns ), $output );
				}
			} else {
				$output .= "$indent</ul>\n";
			}
		}

		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $smof_data;
			$smof_data=array('site_width'=>'1100','megamenu_max_width'=>'1100');
			
			$item_output = $class_columns = '';
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			/* set some vars */
			if( $depth === 0 ) {

				$this->menu_megamenu_status = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_status', true );
				$this->menu_megamenu_width = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_width', true);
				$allowed_columns = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_columns', true );
				$this->menu_megamenu_thumbnail = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_thumbnail', true);
				if( $allowed_columns != "auto" ) {
					$this->max_num_of_columns = $allowed_columns;
				}
				$this->num_of_columns = $this->total_num_of_columns = 0;
				$this->num_of_rows = 1;
				$this->menu_megamenu_rowwidth_matrix = array();
				$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] = 0;
			}

			$this->menu_megamenu_title = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_title', true);
			$this->menu_megamenu_innertitle = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_innertitle', true);			
			$this->menu_megamenu_widgetarea = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_widgetarea', true);
			
			/* add by suncode */
			$this->menu_megamenu_posttype = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_posttype', true);
			$this->menu_megamenu_newlabel = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_newlabel', true);
			$this->menu_megamenu_hotlabel = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_hotlabel', true);
			$this->menu_megamenu_salelabel = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_salelabel', true);
			$this->menu_megamenu_icon = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_icon', true);
			$this->menu_megamenu_thumbnail = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_thumbnail', true);

			/* we are inside a mega menu */
			if( $depth === 1 && $this->menu_megamenu_status == "enabled" ) {
			
				if( get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_columnwidth', true) ) {
					$this->menu_megamenu_columnwidth = get_post_meta( $item->ID, '_menu_item_sc_studi_megamenu_columnwidth', true);
				} else {
					if ( $this->menu_megamenu_width == "fullwidth" ) {
						$this->menu_megamenu_columnwidth = 100 / $this->max_num_of_columns . '%';
					} else {
						$this->menu_megamenu_columnwidth = '20.6666%';
					}
				}

				$this->num_of_columns++;
				$this->total_num_of_columns++;

				/* check if we need to start a new row */
				if( $this->num_of_columns > $this->max_num_of_columns ) {
					$this->num_of_columns = 1;
					$this->num_of_rows++;
					
					// start new row width calculation
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] =  floatval( $this->menu_megamenu_columnwidth ) / 100;
					
					$output .= "\n</ul>\n<ul class=\"sc_studi-megamenu sc_studi-megamenu-row-".$this->num_of_rows." {row_number_".$this->num_of_rows."}\" {row_width_".$this->num_of_rows."}>\n";
				} else {
					$this->menu_megamenu_rowwidth_matrix[$this->num_of_rows] +=  floatval( $this->menu_megamenu_columnwidth ) / 100;
				}

				$this->submenu_matrix[$this->num_of_rows] = $this->num_of_columns;

				if( $this->max_num_of_columns < $this->num_of_columns ) {
					$this->max_num_of_columns = $this->num_of_columns;
				}

				$title = apply_filters( 'the_title', $item->title, $item->ID );

				if( !(
						( empty( $item->url ) || $item->url == "#" || $item->url == 'http://' )  &&
						$this->menu_megamenu_title == 'disabled'
					)
				) {
					$heading = do_shortcode($title);
					$link = '';
					$link_closing = '';

					if( ! empty( $item->url ) &&
						$item->url != "#" &&
						$item->url != 'http://'
					) {
						$link = '<a href="' . $item->url . '">';
						$link_closing = '</a>';
					}

					/* check if we need to set an image */
					$title_enhance = '';
					if ( ! empty( $this->menu_megamenu_thumbnail ) ) {
						$title_enhance = '<span class="sc_studi-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '" alt="thumbnail image"></span>';
					} elseif( ! empty( $this->menu_megamenu_icon ) ) {
						$title_enhance = '<span class="sc_studi-megamenu-icon"><i class="fal glyphicon ' . $this->menu_megamenu_icon .'"></i></span>';
					} else
					if($this->menu_megamenu_title == 'disabled') {
						$title_enhance = '<span class="caret-arrow"></span>';
					}

					$heading = sprintf( '%s%s%s%s', $link, $title_enhance, $title, $link_closing );

					if( $this->menu_megamenu_title != 'disabled' ) {
						$item_output .= "<div class='sc_studi-megamenu-title'>" . $heading . "</div>";
					} else {
						$item_output .= $heading;
					}
				}

				if( $this->menu_megamenu_widgetarea &&
					is_active_sidebar( $this->menu_megamenu_widgetarea )
				) {
					$item_output .= '<div class="sc_studi-megamenu-widgets-container second-level-widget">';
					ob_start();
						dynamic_sidebar( $this->menu_megamenu_widgetarea );

					$item_output .= ob_get_clean() . '</div>';
				}

			/* add by suncode */
			
				if( $this->menu_megamenu_posttype ) {
					$item_output .= '<div class="sc_studi-megamenu-posttype-container second-level-posttype">';
					$slug = get_post_field( 'post_name', get_post($this->menu_megamenu_posttype ) );
					//ob_start();
						
						 // echo show_post($slug);//echo $slug;
	//$item_output .= sc_get_post_in_menu($this->menu_megamenu_posttype);
	
	                            $contentElementor = "";

                            if (class_exists("\\Elementor\\Plugin")) {

                                $pluginElementor = \Elementor\Plugin::instance();
                                //$contentElementor = $pluginElementor->frontend->get_builder_content($this->menu_megamenu_posttype,false);
                                $contentElementor = $pluginElementor->frontend->get_builder_content_for_display($this->menu_megamenu_posttype,false);
                            }
                                 
                            $item_output .= $contentElementor . '</div>';

					//$item_output .= ob_get_clean();
				}
			/* add by suncode */
			

				$class_columns  = ' {current_row_'.$this->num_of_rows.'}';

			} else if( $depth === 2 && $this->menu_megamenu_widgetarea && $this->menu_megamenu_status == "enabled" ) {

				if( is_active_sidebar( $this->menu_megamenu_widgetarea ) ) {
					$item_output .= '<div class="sc_studi-megamenu-widgets-container third-level-widget">';
					ob_start();
						dynamic_sidebar( $this->menu_megamenu_widgetarea );

					$item_output .= ob_get_clean() . '</div>';
				}

			} 
			/* add by suncode */
			else if( $depth === 2 && $this->menu_megamenu_posttype && $this->menu_megamenu_status == "enabled" ) {

				
					$item_output .= '<div class="sc_studi-megamenu-widgets-container third-level-widget">';
					//ob_start();
						
						$slug = get_post_field( 'post_name', get_post($this->menu_megamenu_posttype ) );
						// show_post($slug);
						$myPrefooter = get_post($this->menu_megamenu_posttype);
						//echo do_shortcode($myPrefooter->post_content);
						
						$contentElementor = "";

                            if (class_exists("\\Elementor\\Plugin")) {

                                $pluginElementor = \Elementor\Plugin::instance();
                                //$contentElementor = $pluginElementor->frontend->get_builder_content($this->menu_megamenu_posttype,false);
                                $contentElementor = $pluginElementor->frontend->get_builder_content_for_display($this->menu_megamenu_posttype,false);
                            }
                            
                            $item_output .= $contentElementor . '</div>';
                            

					//$item_output .= ob_get_clean() . '</div>';
				

			}
			/* add by suncode */
			
			else {

				$atts = array();
				$atts['title']  = ! empty( $item->attr_title )	? 'title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$atts['target'] = ! empty( $item->target )		? 'target="' . esc_attr( $item->target	 ) .'"' : '';
				$atts['rel']	= ! empty( $item->xfn )			? 'rel="'	. esc_attr( $item->xfn		) .'"' : '';
				$atts['url']	= ! empty( $item->url )		 ? 'href="'   . esc_attr( $item->url		) .'"' : '';
				$attributes = implode( ' ', $atts );

				$item_output .= $args->before;
				/* check if ne need to set an image */
				if( $this->menu_megamenu_innertitle == 'enabled' && $this->menu_megamenu_status == "enabled") {
					$item_output .= "<div class='sc_studi-megamenu-title'>";
				}
				if ( ! empty( $this->menu_megamenu_thumbnail ) ) {
					$item_output .= '<a ' . $attributes . '><span class="sc_studi-megamenu-icon"><img src="' . $this->menu_megamenu_thumbnail . '" alt="thumbnail image"></span>';
				} elseif( ! empty( $this->menu_megamenu_icon ) ) {
					$item_output .= '<a ' . $attributes . '><span class="scMhold"><span class="sc_studi-megamenu-icon text-menu-icon"><i class="fal glyphicon ' . $this->menu_megamenu_icon .'"></i></span>';
				} else
				if ( $depth !== 0 && $this->menu_megamenu_status == "enabled") {
					$item_output .= '<a ' . $attributes . '><span class="caret-arrow"></span>';
				} else {
					$item_output .= '<a '. $attributes .'>';
				}

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '<span class="menu-text">';
				}

				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) ;

				if( ! empty( $this->menu_megamenu_icon ) && $this->menu_megamenu_status == "enabled" ) {
					$item_output .=  '</span>';
				}
				
				if($this->menu_megamenu_newlabel == "enabled" || $this->menu_megamenu_hotlabel == "enabled" || $this->menu_megamenu_salelabel == "enabled"){
					$item_output .=  '<span class="sc_studi-menu-label">';
					if( $this->menu_megamenu_newlabel == "enabled") {
						$item_output .=  '<span class="sc_studi-menu-newlabel">'.esc_attr__('New','studiare').'</span>';
					}
					if( $this->menu_megamenu_hotlabel == "enabled" ) {
						$item_output .=  '<span class="sc_studi-menu-hotlabel">'.esc_attr__('Hot','studiare').'</span>';
					}
					if( $this->menu_megamenu_salelabel == "enabled" ) {
						$item_output .=  '<span  class="sc_studi-menu-salelabel">'.esc_attr__('Sale','studiare').'</span>';
					}
					$item_output .=  '</span>';
				}

				if( $depth === 0 && $args->has_children ) {
					$item_output .= ' <span class="caret-arrow"></span></a>';
				} else {
					$item_output .= '</span></a>';
				}
				if( $this->menu_megamenu_innertitle == 'enabled' && $this->menu_megamenu_status == "enabled") {
					$item_output .= "</div>";
				}
				$item_output .= $args->after;

			}

			/* check if we need to apply a divider */
			if ( $this->menu_megamenu_status != "enabled" && ( ( strcasecmp( $item->attr_title, 'divider' ) == 0) ||
				 ( strcasecmp( $item->title, 'divider' ) == 0 ) )
			) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} else {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = '';
				$column_width = '';
				$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );


				if( $depth === 0 && $args->has_children ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						$class_names .= ' sc_studi-megamenu-menu';
					} else {
						$class_names .= ' sc_studi-dropdown-menu';
					}
				}

				if ( $depth === 1 ) {
					if( $this->menu_megamenu_status == "enabled" ) {
						$class_names .= ' sc_studi-megamenu-submenu';
						
						if ( $this->menu_megamenu_width != "fullwidth" ) {
							$width = $this->menu_megamenu_maxwidth * floatval( $this->menu_megamenu_columnwidth ) / 100;
							
							//since version 12.6 disable width on mobile 
							$detect_mobile = new Mobile_Detect;
							if ($detect_mobile->isMobile()) {
							    $column_width = '';
							}else{
							    $column_width = sprintf( 'style="width:%spx;max-width:%spx;" data-width="%s"', $width, $width, $width );
							}
							
						}
					} else {
						$class_names .= ' sc_studi-dropdown-submenu';
					}
				}

				$class_names = $class_names ? ' class="' . esc_attr( $class_names ). $class_columns . '"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= sprintf( '%s<li %s %s %s >', $indent, $id, $class_names, $column_width );

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}

		/**
		 * @see Walker::end_el()
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Page data object. Not used.
		 * @param int $depth Depth of page. Not Used.
		 */
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element )
				return;

			$id_field = $this->db_fields['id'];

			// Display this element.
			if ( is_object( $args[0] ) )
			   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a manu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 *
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'manage_options' ) ) {

				extract( $args );

				$fb_output = null;

				return $fb_output;
			}
		}
	}  // end sc_studiFrontendWalker() class
}

// Don't duplicate me!
if( ! class_exists( 'sc_studiCoreMegaMenus' ) ) {

	class sc_studiCoreMegaMenus extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @see Walker_Nav_Menu::end_lvl()
		 *
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {}

		/**
		 * Start the element output.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int	$depth  Depth of menu item. Used for padding.
		 * @param array  $args   Not used.
		 * @param int	$id	 Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth, $wp_registered_sidebars;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

			ob_start();
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( esc_html__( '%s (Invalid)', 'studiare'), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( esc_html__('%s (Pending)', 'studiare'), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';

			?>
			<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'Submenu Item' , 'studiare'); ?></span></span>
						<span class="item-controls">
							<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
							<span class="item-order hide-if-js">
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-up-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'studiare'); ?>">&#8593;</abbr></a>
								|
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-down-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'studiare'); ?>">&#8595;</abbr></a>
							</span>
							<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'studiare'); ?>" href="<?php
								echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
							?>"><?php esc_html_e( 'Edit Menu Item', 'studiare' ); ?></a>
						</span>
					</dt>
				</dl>

				<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
					<?php if( 'custom' == $item->type ) : ?>
						<p class="field-url description description-wide">
							<label for="edit-menu-item-url-<?php echo $item_id; ?>">
								<?php esc_html_e( 'URL Address', 'studiare' ); ?><br />
								<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
							</label>
						</p>
					<?php endif; ?>
					<p class="description description-thin">
						<label for="edit-menu-item-title-<?php echo $item_id; ?>">
							<?php esc_html_e( 'Menu Title', 'studiare' ); ?><br />
							<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
						</label>
					</p>
					<p class="description description-thin">
						<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
							<?php esc_html_e( 'Title attribute', 'studiare' ); ?><br />
							<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
						</label>
					</p>
					<p class="field-link-target description">
						<label for="edit-menu-item-target-<?php echo $item_id; ?>">
							<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
							<?php esc_html_e( 'Open in new tab', 'studiare' ); ?>
						</label>
					</p>
					<p class="field-css-classes description description-thin">
						<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
							<?php esc_html_e( 'CSS classes (optional)', 'studiare' ); ?><br />
							<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
						</label>
					</p>
					<p class="field-xfn description description-thin">
						<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
							<?php esc_html_e( 'link communication (XFN)', 'studiare' ); ?><br />
							<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
						</label>
					</p>
					<p class="field-description description description-wide">
						<label for="edit-menu-item-description-<?php echo $item_id; ?>">
							<?php esc_html_e( 'Description', 'studiare' ); ?><br />
							<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
							<span class="description"><?php esc_html_e('If your Theme is compatible, this description will be displayed in the menu.', 'studiare' ); ?></span>
						</label>
					</p>

					<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); ?>

					<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php esc_html_e( 'Move', 'studiare' ); ?></span>
							<a href="#" class="menus-move-up"><?php esc_html_e( 'One level up', 'studiare' ); ?></a>
							<a href="#" class="menus-move-down"><?php esc_html_e( 'One level Down', 'studiare' ); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php esc_html_e( 'The highest level', 'studiare' ); ?></a>
						</label>
					</p>

					<div class="menu-item-actions description-wide submitbox">
						<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
							<p class="link-to-original">
								<?php printf( esc_html__('Original: %s', 'studiare' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
							</p>
						<?php endif; ?>
						<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php esc_html_e( 'Remove', 'studiare' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo $item_id; ?>"><?php esc_html_e('Cancel', 'studiare' ); ?></a>
					</div>

					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
				</div><!-- .menu-item-settings-->
				<ul class="menu-item-transport"></ul>
			<?php
			$output .= ob_get_clean();
		}

	} // end sc_studiCoreMegaMenus() class

}


// Don't duplicate me!
if( ! class_exists( 'sc_studiMegaMenu' ) ) {

	/**
	 * Class to manipulate menus
	 *
	 * @since 3.4
	 */
	class sc_studiMegaMenu{

		function __construct() {

			add_action( 'wp_update_nav_menu_item', array( $this, 'save_custom_fields' ), 10, 3 );

			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'add_custom_fields' ) );
			add_filter( 'wp_setup_nav_menu_item', array( $this, 'add_data_to_menu' ) );

		} // end __construct();


		/**
		 * Function to replace normal edit nav walker for sc_studi core mega menus
		 *
		 * @return string Class name of new navwalker
		 */
		function add_custom_fields() {

			return 'sc_studiCoreMegaMenus';

		}

		/**
		 * Add the custom fields menu item data to fields in database
		 *
		 * @return void
		 */
		function save_custom_fields( $menu_id, $menu_item_db_id, $args ) {

			$field_name_suffix = array( 'status', 'width', 'columns', 'columnwidth', 'title', 'innertitle', 'newlabel', 'hotlabel', 'salelabel', 'widgetarea', 'icon', 'thumbnail','posttype' );

			foreach ( $field_name_suffix as $key ) {
				if( !isset( $_REQUEST['menu-item-sc_studi-megamenu-'.$key][$menu_item_db_id] ) ) {
					$_REQUEST['menu-item-sc_studi-megamenu-'.$key][$menu_item_db_id] = '';
				}

				$value = $_REQUEST['menu-item-sc_studi-megamenu-'.$key][$menu_item_db_id];
				update_post_meta( $menu_item_db_id, '_menu_item_sc_studi_megamenu_'.$key, $value );
			}
		}

		/**
		 * Add custom fields data to the menu
		 *
		 * @return object Add custom fields data to the menu object
		 */
		function add_data_to_menu( $menu_item ) {
			
			$menu_item->sc_studi_megamenu_status = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_status', true );

			$menu_item->sc_studi_megamenu_width = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_width', true );

			$menu_item->sc_studi_megamenu_columns = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_columns', true );
			
			$menu_item->sc_studi_megamenu_columnwidth = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_columnwidth', true );

			$menu_item->sc_studi_megamenu_title = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_title', true );
			
			$menu_item->sc_studi_megamenu_innertitle = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_innertitle', true );
			
			$menu_item->sc_studi_megamenu_newlabel = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_newlabel', true );
			
			$menu_item->sc_studi_megamenu_hotlabel = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_hotlabel', true );
			
			$menu_item->sc_studi_megamenu_salelabel = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_salelabel', true );

			$menu_item->sc_studi_megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_widgetarea', true );
			/* add by suncode */
			$menu_item->sc_studi_megamenu_posttype = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_posttype', true );

			$menu_item->sc_studi_megamenu_icon = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_icon', true );

			$menu_item->sc_studi_megamenu_thumbnail = get_post_meta( $menu_item->ID, '_menu_item_sc_studi_megamenu_thumbnail', true );

			return $menu_item;

		}

	} // end sc_studiMegaMenu() class

}


if(!function_exists('sc_studi_font_awesome_icon')){
	
    function sc_studi_font_awesome_icon(){
        return array("fa-abacus", "fa-acorn", "fa-ad", "fa-address-book", "fa-address-card", "fa-adjust", "fa-air-conditioner", "fa-air-freshener", "fa-alarm-clock", "fa-alarm-exclamation", "fa-alarm-plus", "fa-alarm-snooze", "fa-album", "fa-album-collection", "fa-alicorn", "fa-alien", "fa-alien-monster", "fa-align-center", "fa-align-justify", "fa-align-left", "fa-align-right", "fa-align-slash", "fa-allergies", "fa-ambulance", "fa-american-sign-language-interpreting", "fa-amp-guitar", "fa-analytics", "fa-anchor", "fa-angel", "fa-angle-double-down", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-angry", "fa-ankh", "fa-apple-alt", "fa-apple-crate", "fa-archive", "fa-archway", "fa-arrow-alt-circle-down", "fa-arrow-alt-circle-left", "fa-arrow-alt-circle-right", "fa-arrow-alt-circle-up", "fa-arrow-alt-down", "fa-arrow-alt-from-bottom", "fa-arrow-alt-from-left", "fa-arrow-alt-from-right", "fa-arrow-alt-from-top", "fa-arrow-alt-left", "fa-arrow-alt-right", "fa-arrow-alt-square-down", "fa-arrow-alt-square-left", "fa-arrow-alt-square-right", "fa-arrow-alt-square-up", "fa-arrow-alt-to-bottom", "fa-arrow-alt-to-left", "fa-arrow-alt-to-right", "fa-arrow-alt-to-top", "fa-arrow-alt-up", "fa-arrow-circle-down", "fa-arrow-circle-left", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-down", "fa-arrow-from-bottom", "fa-arrow-from-left", "fa-arrow-from-right", "fa-arrow-from-top", "fa-arrow-left", "fa-arrow-right", "fa-arrow-square-down", "fa-arrow-square-left", "fa-arrow-square-right", "fa-arrow-square-up", "fa-arrow-to-bottom", "fa-arrow-to-left", "fa-arrow-to-right", "fa-arrow-to-top", "fa-arrow-up", "fa-arrows", "fa-arrows-alt", "fa-arrows-alt-h", "fa-arrows-alt-v", "fa-arrows-h", "fa-arrows-v", "fa-assistive-listening-systems", "fa-asterisk", "fa-at", "fa-atlas", "fa-atom", "fa-atom-alt", "fa-audio-description", "fa-award", "fa-axe", "fa-axe-battle", "fa-baby", "fa-baby-carriage", "fa-backpack", "fa-backspace", "fa-backward", "fa-bacon", "fa-badge", "fa-badge-check", "fa-badge-dollar", "fa-badge-percent", "fa-badge-sheriff", "fa-badger-honey", "fa-bags-shopping", "fa-bahai", "fa-balance-scale", "fa-balance-scale-left", "fa-balance-scale-right", "fa-ball-pile", "fa-ballot", "fa-ballot-check", "fa-ban", "fa-band-aid", "fa-banjo", "fa-barcode", "fa-barcode-alt", "fa-barcode-read", "fa-barcode-scan", "fa-bars", "fa-baseball", "fa-baseball-ball", "fa-basketball-ball", "fa-basketball-hoop", "fa-bat", "fa-bath", "fa-battery-bolt", "fa-battery-empty", "fa-battery-full", "fa-battery-half", "fa-battery-quarter", "fa-battery-slash", "fa-battery-three-quarters", "fa-bed", "fa-bed-alt", "fa-bed-bunk", "fa-bed-empty", "fa-beer", "fa-bell", "fa-bell-exclamation", "fa-bell-on", "fa-bell-plus", "fa-bell-school", "fa-bell-school-slash", "fa-bell-slash", "fa-bells", "fa-betamax", "fa-bezier-curve", "fa-bible", "fa-bicycle", "fa-biking", "fa-biking-mountain", "fa-binoculars", "fa-biohazard", "fa-birthday-cake", "fa-blanket", "fa-blender", "fa-blender-phone", "fa-blind", "fa-blinds", "fa-blinds-open", "fa-blinds-raised", "fa-blog", "fa-bold", "fa-bolt", "fa-bomb", "fa-bone", "fa-bone-break", "fa-bong", "fa-book", "fa-book-alt", "fa-book-dead", "fa-book-heart", "fa-book-medical", "fa-book-open", "fa-book-reader", "fa-book-spells", "fa-book-user", "fa-bookmark", "fa-books", "fa-books-medical", "fa-boombox", "fa-boot", "fa-booth-curtain", "fa-border-all", "fa-border-bottom", "fa-border-center-h", "fa-border-center-v", "fa-border-inner", "fa-border-left", "fa-border-none", "fa-border-outer", "fa-border-right", "fa-border-style", "fa-border-style-alt", "fa-border-top", "fa-bow-arrow", "fa-bowling-ball", "fa-bowling-pins", "fa-box", "fa-box-alt", "fa-box-ballot", "fa-box-check", "fa-box-fragile", "fa-box-full", "fa-box-heart", "fa-box-open", "fa-box-up", "fa-box-usd", "fa-boxes", "fa-boxes-alt", "fa-boxing-glove", "fa-brackets", "fa-brackets-curly", "fa-braille", "fa-brain", "fa-bread-loaf", "fa-bread-slice", "fa-briefcase", "fa-briefcase-medical", "fa-bring-forward", "fa-bring-front", "fa-broadcast-tower", "fa-broom", "fa-browser", "fa-brush", "fa-bug", "fa-building", "fa-bullhorn", "fa-bullseye", "fa-bullseye-arrow", "fa-bullseye-pointer", "fa-burger-soda", "fa-burn", "fa-burrito", "fa-bus", "fa-bus-alt", "fa-bus-school", "fa-business-time", "fa-cabinet-filing", "fa-cactus", "fa-calculator", "fa-calculator-alt", "fa-calendar", "fa-calendar-alt", "fa-calendar-check", "fa-calendar-day", "fa-calendar-edit", "fa-calendar-exclamation", "fa-calendar-minus", "fa-calendar-plus", "fa-calendar-star", "fa-calendar-times", "fa-calendar-week", "fa-camcorder", "fa-camera", "fa-camera-alt", "fa-camera-home", "fa-camera-movie", "fa-camera-polaroid", "fa-camera-retro", "fa-campfire", "fa-campground", "fa-candle-holder", "fa-candy-cane", "fa-candy-corn", "fa-cannabis", "fa-capsules", "fa-car", "fa-car-alt", "fa-car-battery", "fa-car-building", "fa-car-bump", "fa-car-bus", "fa-car-crash", "fa-car-garage", "fa-car-mechanic", "fa-car-side", "fa-car-tilt", "fa-car-wash", "fa-caravan", "fa-caravan-alt", "fa-caret-circle-down", "fa-caret-circle-left", "fa-caret-circle-right", "fa-caret-circle-up", "fa-caret-down", "fa-caret-left", "fa-caret-right", "fa-caret-square-down", "fa-caret-square-left", "fa-caret-square-right", "fa-caret-square-up", "fa-caret-up", "fa-carrot", "fa-cars", "fa-cart-arrow-down", "fa-cart-plus", "fa-cash-register", "fa-cassette-tape", "fa-cat", "fa-cat-space", "fa-cauldron", "fa-cctv", "fa-certificate", "fa-chair", "fa-chair-office", "fa-chalkboard", "fa-chalkboard-teacher", "fa-charging-station", "fa-chart-area", "fa-chart-bar", "fa-chart-line", "fa-chart-line-down", "fa-chart-network", "fa-chart-pie", "fa-chart-pie-alt", "fa-chart-scatter", "fa-check", "fa-check-circle", "fa-check-double", "fa-check-square", "fa-cheese", "fa-cheese-swiss", "fa-cheeseburger", "fa-chess", "fa-chess-bishop", "fa-chess-bishop-alt", "fa-chess-board", "fa-chess-clock", "fa-chess-clock-alt", "fa-chess-king", "fa-chess-king-alt", "fa-chess-knight", "fa-chess-knight-alt", "fa-chess-pawn", "fa-chess-pawn-alt", "fa-chess-queen", "fa-chess-queen-alt", "fa-chess-rook", "fa-chess-rook-alt", "fa-chevron-circle-down", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-double-down", "fa-chevron-double-left", "fa-chevron-double-right", "fa-chevron-double-up", "fa-chevron-down", "fa-chevron-left", "fa-chevron-right", "fa-chevron-square-down", "fa-chevron-square-left", "fa-chevron-square-right", "fa-chevron-square-up", "fa-chevron-up", "fa-child", "fa-chimney", "fa-church", "fa-circle", "fa-circle-notch", "fa-city", "fa-clarinet", "fa-claw-marks", "fa-clinic-medical", "fa-clipboard", "fa-clipboard-check", "fa-clipboard-list", "fa-clipboard-list-check", "fa-clipboard-prescription", "fa-clipboard-user", "fa-clock", "fa-clone", "fa-closed-captioning", "fa-cloud", "fa-cloud-download", "fa-cloud-download-alt", "fa-cloud-drizzle", "fa-cloud-hail", "fa-cloud-hail-mixed", "fa-cloud-meatball", "fa-cloud-moon", "fa-cloud-moon-rain", "fa-cloud-music", "fa-cloud-rain", "fa-cloud-rainbow", "fa-cloud-showers", "fa-cloud-showers-heavy", "fa-cloud-sleet", "fa-cloud-snow", "fa-cloud-sun", "fa-cloud-sun-rain", "fa-cloud-upload", "fa-cloud-upload-alt", "fa-clouds", "fa-clouds-moon", "fa-clouds-sun", "fa-club", "fa-cocktail", "fa-code", "fa-code-branch", "fa-code-commit", "fa-code-merge", "fa-coffee", "fa-coffee-pot", "fa-coffee-togo", "fa-coffin", "fa-coffin-cross", "fa-cog", "fa-cogs", "fa-coin", "fa-coins", "fa-columns", "fa-comet", "fa-comment", "fa-comment-alt", "fa-comment-alt-check", "fa-comment-alt-dollar", "fa-comment-alt-dots", "fa-comment-alt-edit", "fa-comment-alt-exclamation", "fa-comment-alt-lines", "fa-comment-alt-medical", "fa-comment-alt-minus", "fa-comment-alt-music", "fa-comment-alt-plus", "fa-comment-alt-slash", "fa-comment-alt-smile", "fa-comment-alt-times", "fa-comment-check", "fa-comment-dollar", "fa-comment-dots", "fa-comment-edit", "fa-comment-exclamation", "fa-comment-lines", "fa-comment-medical", "fa-comment-minus", "fa-comment-music", "fa-comment-plus", "fa-comment-slash", "fa-comment-smile", "fa-comment-times", "fa-comments", "fa-comments-alt", "fa-comments-alt-dollar", "fa-comments-dollar", "fa-compact-disc", "fa-compass", "fa-compass-slash", "fa-compress", "fa-compress-alt", "fa-compress-arrows-alt", "fa-compress-wide", "fa-computer-classic", "fa-computer-speaker", "fa-concierge-bell", "fa-construction", "fa-container-storage", "fa-conveyor-belt", "fa-conveyor-belt-alt", "fa-cookie", "fa-cookie-bite", "fa-copy", "fa-copyright", "fa-corn", "fa-couch", "fa-cow", "fa-cowbell", "fa-cowbell-more", "fa-credit-card", "fa-credit-card-blank", "fa-credit-card-front", "fa-cricket", "fa-croissant", "fa-crop", "fa-crop-alt", "fa-cross", "fa-crosshairs", "fa-crow", "fa-crown", "fa-crutch", "fa-crutches", "fa-cube", "fa-cubes", "fa-curling", "fa-cut", "fa-dagger", "fa-database", "fa-deaf", "fa-debug", "fa-deer", "fa-deer-rudolph", "fa-democrat", "fa-desktop", "fa-desktop-alt", "fa-dewpoint", "fa-dharmachakra", "fa-diagnoses", "fa-diamond", "fa-dice", "fa-dice-d10", "fa-dice-d12", "fa-dice-d20", "fa-dice-d4", "fa-dice-d6", "fa-dice-d8", "fa-dice-five", "fa-dice-four", "fa-dice-one", "fa-dice-six", "fa-dice-three", "fa-dice-two", "fa-digging", "fa-digital-tachograph", "fa-diploma", "fa-directions", "fa-disc-drive", "fa-disease", "fa-divide", "fa-dizzy", "fa-dna", "fa-do-not-enter", "fa-dog", "fa-dog-leashed", "fa-dollar-sign", "fa-dolly", "fa-dolly-empty", "fa-dolly-flatbed", "fa-dolly-flatbed-alt", "fa-dolly-flatbed-empty", "fa-donate", "fa-door-closed", "fa-door-open", "fa-dot-circle", "fa-dove", "fa-download", "fa-drafting-compass", "fa-dragon", "fa-draw-circle", "fa-draw-polygon", "fa-draw-square", "fa-dreidel", "fa-drone", "fa-drone-alt", "fa-drum", "fa-drum-steelpan", "fa-drumstick", "fa-drumstick-bite", "fa-dryer", "fa-dryer-alt", "fa-duck", "fa-dumbbell", "fa-dumpster", "fa-dumpster-fire", "fa-dungeon", "fa-ear", "fa-ear-muffs", "fa-eclipse", "fa-eclipse-alt", "fa-edit", "fa-egg", "fa-egg-fried", "fa-eject", "fa-elephant", "fa-ellipsis-h", "fa-ellipsis-h-alt", "fa-ellipsis-v", "fa-ellipsis-v-alt", "fa-empty-set", "fa-engine-warning", "fa-envelope", "fa-envelope-open", "fa-envelope-open-dollar", "fa-envelope-open-text", "fa-envelope-square", "fa-equals", "fa-eraser", "fa-ethernet", "fa-euro-sign", "fa-exchange", "fa-exchange-alt", "fa-exclamation", "fa-exclamation-circle", "fa-exclamation-square", "fa-exclamation-triangle", "fa-expand", "fa-expand-alt", "fa-expand-arrows", "fa-expand-arrows-alt", "fa-expand-wide", "fa-external-link", "fa-external-link-alt", "fa-external-link-square", "fa-external-link-square-alt", "fa-eye", "fa-eye-dropper", "fa-eye-evil", "fa-eye-slash", "fa-fan", "fa-fan-table", "fa-farm", "fa-fast-backward", "fa-fast-forward", "fa-faucet", "fa-faucet-drip", "fa-fax", "fa-feather", "fa-feather-alt", "fa-female", "fa-field-hockey", "fa-fighter-jet", "fa-file", "fa-file-alt", "fa-file-archive", "fa-file-audio", "fa-file-certificate", "fa-file-chart-line", "fa-file-chart-pie", "fa-file-check", "fa-file-code", "fa-file-contract", "fa-file-csv", "fa-file-download", "fa-file-edit", "fa-file-excel", "fa-file-exclamation", "fa-file-export", "fa-file-image", "fa-file-import", "fa-file-invoice", "fa-file-invoice-dollar", "fa-file-medical", "fa-file-medical-alt", "fa-file-minus", "fa-file-music", "fa-file-pdf", "fa-file-plus", "fa-file-powerpoint", "fa-file-prescription", "fa-file-search", "fa-file-signature", "fa-file-spreadsheet", "fa-file-times", "fa-file-upload", "fa-file-user", "fa-file-video", "fa-file-word", "fa-files-medical", "fa-fill", "fa-fill-drip", "fa-film", "fa-film-alt", "fa-film-canister", "fa-filter", "fa-fingerprint", "fa-fire", "fa-fire-alt", "fa-fire-extinguisher", "fa-fire-smoke", "fa-fireplace", "fa-first-aid", "fa-fish", "fa-fish-cooked", "fa-fist-raised", "fa-flag", "fa-flag-alt", "fa-flag-checkered", "fa-flag-usa", "fa-flame", "fa-flashlight", "fa-flask", "fa-flask-poison", "fa-flask-potion", "fa-flower", "fa-flower-daffodil", "fa-flower-tulip", "fa-flushed", "fa-flute", "fa-flux-capacitor", "fa-fog", "fa-folder", "fa-folder-download", "fa-folder-minus", "fa-folder-open", "fa-folder-plus", "fa-folder-times", "fa-folder-tree", "fa-folder-upload", "fa-folders", "fa-font", "fa-font-case", "fa-football-ball", "fa-football-helmet", "fa-forklift", "fa-forward", "fa-fragile", "fa-french-fries", "fa-frog", "fa-frosty-head", "fa-frown", "fa-frown-open", "fa-function", "fa-funnel-dollar", "fa-futbol", "fa-galaxy", "fa-game-board", "fa-game-board-alt", "fa-game-console-handheld", "fa-gamepad", "fa-gamepad-alt", "fa-garage", "fa-garage-car", "fa-garage-open", "fa-gas-pump", "fa-gas-pump-slash", "fa-gavel", "fa-gem", "fa-genderless", "fa-ghost", "fa-gift", "fa-gift-card", "fa-gifts", "fa-gingerbread-man", "fa-glass", "fa-glass-champagne", "fa-glass-cheers", "fa-glass-citrus", "fa-glass-martini", "fa-glass-martini-alt", "fa-glass-whiskey", "fa-glass-whiskey-rocks", "fa-glasses", "fa-glasses-alt", "fa-globe", "fa-globe-africa", "fa-globe-americas", "fa-globe-asia", "fa-globe-europe", "fa-globe-snow", "fa-globe-stand", "fa-golf-ball", "fa-golf-club", "fa-gopuram", "fa-graduation-cap", "fa-gramophone", "fa-greater-than", "fa-greater-than-equal", "fa-grimace", "fa-grin", "fa-grin-alt", "fa-grin-beam", "fa-grin-beam-sweat", "fa-grin-hearts", "fa-grin-squint", "fa-grin-squint-tears", "fa-grin-stars", "fa-grin-tears", "fa-grin-tongue", "fa-grin-tongue-squint", "fa-grin-tongue-wink", "fa-grin-wink", "fa-grip-horizontal", "fa-grip-lines", "fa-grip-lines-vertical", "fa-grip-vertical", "fa-guitar", "fa-guitar-electric", "fa-guitars", "fa-h-square", "fa-h1", "fa-h2", "fa-h3", "fa-h4", "fa-hamburger", "fa-hammer", "fa-hammer-war", "fa-hamsa", "fa-hand-heart", "fa-hand-holding", "fa-hand-holding-box", "fa-hand-holding-heart", "fa-hand-holding-magic", "fa-hand-holding-seedling", "fa-hand-holding-usd", "fa-hand-holding-water", "fa-hand-lizard", "fa-hand-middle-finger", "fa-hand-paper", "fa-hand-peace", "fa-hand-point-down", "fa-hand-point-left", "fa-hand-point-right", "fa-hand-point-up", "fa-hand-pointer", "fa-hand-receiving", "fa-hand-rock", "fa-hand-scissors", "fa-hand-spock", "fa-hands", "fa-hands-heart", "fa-hands-helping", "fa-hands-usd", "fa-handshake", "fa-handshake-alt", "fa-hanukiah", "fa-hard-hat", "fa-hashtag", "fa-hat-chef", "fa-hat-cowboy", "fa-hat-cowboy-side", "fa-hat-santa", "fa-hat-winter", "fa-hat-witch", "fa-hat-wizard", "fa-hdd", "fa-head-side", "fa-head-side-brain", "fa-head-side-headphones", "fa-head-side-medical", "fa-head-vr", "fa-heading", "fa-headphones", "fa-headphones-alt", "fa-headset", "fa-heart", "fa-heart-broken", "fa-heart-circle", "fa-heart-rate", "fa-heart-square", "fa-heartbeat", "fa-heat", "fa-helicopter", "fa-helmet-battle", "fa-hexagon", "fa-highlighter", "fa-hiking", "fa-hippo", "fa-history", "fa-hockey-mask", "fa-hockey-puck", "fa-hockey-sticks", "fa-holly-berry", "fa-home", "fa-home-alt", "fa-home-heart", "fa-home-lg", "fa-home-lg-alt", "fa-hood-cloak", "fa-horizontal-rule", "fa-horse", "fa-horse-head", "fa-horse-saddle", "fa-hospital", "fa-hospital-alt", "fa-hospital-symbol", "fa-hospital-user", "fa-hospitals", "fa-hot-tub", "fa-hotdog", "fa-hotel", "fa-hourglass", "fa-hourglass-end", "fa-hourglass-half", "fa-hourglass-start", "fa-house", "fa-house-damage", "fa-house-day", "fa-house-flood", "fa-house-leave", "fa-house-night", "fa-house-return", "fa-house-signal", "fa-hryvnia", "fa-humidity", "fa-hurricane", "fa-i-cursor", "fa-ice-cream", "fa-ice-skate", "fa-icicles", "fa-icons", "fa-icons-alt", "fa-id-badge", "fa-id-card", "fa-id-card-alt", "fa-igloo", "fa-image", "fa-image-polaroid", "fa-images", "fa-inbox", "fa-inbox-in", "fa-inbox-out", "fa-indent", "fa-industry", "fa-industry-alt", "fa-infinity", "fa-info", "fa-info-circle", "fa-info-square", "fa-inhaler", "fa-integral", "fa-intersection", "fa-inventory", "fa-island-tropical", "fa-italic", "fa-jack-o-lantern", "fa-jedi", "fa-joint", "fa-journal-whills", "fa-joystick", "fa-jug", "fa-kaaba", "fa-kazoo", "fa-kerning", "fa-key", "fa-key-skeleton", "fa-keyboard", "fa-keynote", "fa-khanda", "fa-kidneys", "fa-kiss", "fa-kiss-beam", "fa-kiss-wink-heart", "fa-kite", "fa-kiwi-bird", "fa-knife-kitchen", "fa-lambda", "fa-lamp", "fa-lamp-desk", "fa-lamp-floor", "fa-landmark", "fa-landmark-alt", "fa-language", "fa-laptop", "fa-laptop-code", "fa-laptop-medical", "fa-lasso", "fa-laugh", "fa-laugh-beam", "fa-laugh-squint", "fa-laugh-wink", "fa-layer-group", "fa-layer-minus", "fa-layer-plus", "fa-leaf", "fa-leaf-heart", "fa-leaf-maple", "fa-leaf-oak", "fa-lemon", "fa-less-than", "fa-less-than-equal", "fa-level-down", "fa-level-down-alt", "fa-level-up", "fa-level-up-alt", "fa-life-ring", "fa-light-ceiling", "fa-light-switch", "fa-light-switch-off", "fa-light-switch-on", "fa-lightbulb", "fa-lightbulb-dollar", "fa-lightbulb-exclamation", "fa-lightbulb-on", "fa-lightbulb-slash", "fa-lights-holiday", "fa-line-columns", "fa-line-height", "fa-link", "fa-lips", "fa-lira-sign", "fa-list", "fa-list-alt", "fa-list-music", "fa-list-ol", "fa-list-ul", "fa-location", "fa-location-arrow", "fa-location-circle", "fa-location-slash", "fa-lock", "fa-lock-alt", "fa-lock-open", "fa-lock-open-alt", "fa-long-arrow-alt-down", "fa-long-arrow-alt-left", "fa-long-arrow-alt-right", "fa-long-arrow-alt-up", "fa-long-arrow-down", "fa-long-arrow-left", "fa-long-arrow-right", "fa-long-arrow-up", "fa-loveseat", "fa-low-vision", "fa-luchador", "fa-luggage-cart", "fa-lungs", "fa-mace", "fa-magic", "fa-magnet", "fa-mail-bulk", "fa-mailbox", "fa-male", "fa-mandolin", "fa-map", "fa-map-marked", "fa-map-marked-alt", "fa-map-marker", "fa-map-marker-alt", "fa-map-marker-alt-slash", "fa-map-marker-check", "fa-map-marker-edit", "fa-map-marker-exclamation", "fa-map-marker-minus", "fa-map-marker-plus", "fa-map-marker-question", "fa-map-marker-slash", "fa-map-marker-smile", "fa-map-marker-times", "fa-map-pin", "fa-map-signs", "fa-marker", "fa-mars", "fa-mars-double", "fa-mars-stroke", "fa-mars-stroke-h", "fa-mars-stroke-v", "fa-mask", "fa-meat", "fa-medal", "fa-medkit", "fa-megaphone", "fa-meh", "fa-meh-blank", "fa-meh-rolling-eyes", "fa-memory", "fa-menorah", "fa-mercury", "fa-meteor", "fa-microchip", "fa-microphone", "fa-microphone-alt", "fa-microphone-alt-slash", "fa-microphone-slash", "fa-microphone-stand", "fa-microscope", "fa-microwave", "fa-mind-share", "fa-minus", "fa-minus-circle", "fa-minus-hexagon", "fa-minus-octagon", "fa-minus-square", "fa-mistletoe", "fa-mitten", "fa-mobile", "fa-mobile-alt", "fa-mobile-android", "fa-mobile-android-alt", "fa-money-bill", "fa-money-bill-alt", "fa-money-bill-wave", "fa-money-bill-wave-alt", "fa-money-check", "fa-money-check-alt", "fa-money-check-edit", "fa-money-check-edit-alt", "fa-monitor-heart-rate", "fa-monkey", "fa-monument", "fa-moon", "fa-moon-cloud", "fa-moon-stars", "fa-mortar-pestle", "fa-mosque", "fa-motorcycle", "fa-mountain", "fa-mountains", "fa-mouse", "fa-mouse-alt", "fa-mouse-pointer", "fa-mp3-player", "fa-mug", "fa-mug-hot", "fa-mug-marshmallows", "fa-mug-tea", "fa-music", "fa-music-alt", "fa-music-alt-slash", "fa-music-slash", "fa-narwhal", "fa-network-wired", "fa-neuter", "fa-newspaper", "fa-not-equal", "fa-notes-medical", "fa-object-group", "fa-object-ungroup", "fa-octagon", "fa-oil-can", "fa-oil-temp", "fa-om", "fa-omega", "fa-ornament", "fa-otter", "fa-outdent", "fa-outlet", "fa-oven", "fa-overline", "fa-page-break", "fa-pager", "fa-paint-brush", "fa-paint-brush-alt", "fa-paint-roller", "fa-palette", "fa-pallet", "fa-pallet-alt", "fa-paper-plane", "fa-paperclip", "fa-parachute-box", "fa-paragraph", "fa-paragraph-rtl", "fa-parking", "fa-parking-circle", "fa-parking-circle-slash", "fa-parking-slash", "fa-passport", "fa-pastafarianism", "fa-paste", "fa-pause", "fa-pause-circle", "fa-paw", "fa-paw-alt", "fa-paw-claws", "fa-peace", "fa-pegasus", "fa-pen", "fa-pen-alt", "fa-pen-fancy", "fa-pen-nib", "fa-pen-square", "fa-pencil", "fa-pencil-alt", "fa-pencil-paintbrush", "fa-pencil-ruler", "fa-pennant", "fa-people-carry", "fa-pepper-hot", "fa-percent", "fa-percentage", "fa-person-booth", "fa-person-carry", "fa-person-dolly", "fa-person-dolly-empty", "fa-person-sign", "fa-phone", "fa-phone-alt", "fa-phone-laptop", "fa-phone-office", "fa-phone-plus", "fa-phone-rotary", "fa-phone-slash", "fa-phone-square", "fa-phone-square-alt", "fa-phone-volume", "fa-photo-video", "fa-pi", "fa-piano", "fa-piano-keyboard", "fa-pie", "fa-pig", "fa-piggy-bank", "fa-pills", "fa-pizza", "fa-pizza-slice", "fa-place-of-worship", "fa-plane", "fa-plane-alt", "fa-plane-arrival", "fa-plane-departure", "fa-planet-moon", "fa-planet-ringed", "fa-play", "fa-play-circle", "fa-plug", "fa-plus", "fa-plus-circle", "fa-plus-hexagon", "fa-plus-octagon", "fa-plus-square", "fa-podcast", "fa-podium", "fa-podium-star", "fa-police-box", "fa-poll", "fa-poll-h", "fa-poll-people", "fa-poo", "fa-poo-storm", "fa-poop", "fa-popcorn", "fa-portal-enter", "fa-portal-exit", "fa-portrait", "fa-pound-sign", "fa-power-off", "fa-pray", "fa-praying-hands", "fa-prescription", "fa-prescription-bottle", "fa-prescription-bottle-alt", "fa-presentation", "fa-print", "fa-print-search", "fa-print-slash", "fa-procedures", "fa-project-diagram", "fa-projector", "fa-pumpkin", "fa-puzzle-piece", "fa-qrcode", "fa-question", "fa-question-circle", "fa-question-square", "fa-quidditch", "fa-quote-left", "fa-quote-right", "fa-quran", "fa-rabbit", "fa-rabbit-fast", "fa-racquet", "fa-radar", "fa-radiation", "fa-radiation-alt", "fa-radio", "fa-radio-alt", "fa-rainbow", "fa-raindrops", "fa-ram", "fa-ramp-loading", "fa-random", "fa-raygun", "fa-receipt", "fa-record-vinyl", "fa-rectangle-landscape", "fa-rectangle-portrait", "fa-rectangle-wide", "fa-recycle", "fa-redo", "fa-redo-alt", "fa-refrigerator", "fa-registered", "fa-remove-format", "fa-repeat", "fa-repeat-1", "fa-repeat-1-alt", "fa-repeat-alt", "fa-reply", "fa-reply-all", "fa-republican", "fa-restroom", "fa-retweet", "fa-retweet-alt", "fa-ribbon", "fa-ring", "fa-rings-wedding", "fa-road", "fa-robot", "fa-rocket", "fa-rocket-launch", "fa-route", "fa-route-highway", "fa-route-interstate", "fa-router", "fa-rss", "fa-rss-square", "fa-ruble-sign", "fa-ruler", "fa-ruler-combined", "fa-ruler-horizontal", "fa-ruler-triangle", "fa-ruler-vertical", "fa-running", "fa-rupee-sign", "fa-rv", "fa-sack", "fa-sack-dollar", "fa-sad-cry", "fa-sad-tear", "fa-salad", "fa-sandwich", "fa-satellite", "fa-satellite-dish", "fa-sausage", "fa-save", "fa-sax-hot", "fa-saxophone", "fa-scalpel", "fa-scalpel-path", "fa-scanner", "fa-scanner-image", "fa-scanner-keyboard", "fa-scanner-touchscreen", "fa-scarecrow", "fa-scarf", "fa-school", "fa-screwdriver", "fa-scroll", "fa-scroll-old", "fa-scrubber", "fa-scythe", "fa-sd-card", "fa-search", "fa-search-dollar", "fa-search-location", "fa-search-minus", "fa-search-plus", "fa-seedling", "fa-send-back", "fa-send-backward", "fa-sensor", "fa-sensor-alert", "fa-sensor-fire", "fa-sensor-on", "fa-sensor-smoke", "fa-server", "fa-shapes", "fa-share", "fa-share-all", "fa-share-alt", "fa-share-alt-square", "fa-share-square", "fa-sheep", "fa-shekel-sign", "fa-shield", "fa-shield-alt", "fa-shield-check", "fa-shield-cross", "fa-ship", "fa-shipping-fast", "fa-shipping-timed", "fa-shish-kebab", "fa-shoe-prints", "fa-shopping-bag", "fa-shopping-basket", "fa-shopping-cart", "fa-shovel", "fa-shovel-snow", "fa-shower", "fa-shredder", "fa-shuttle-van", "fa-shuttlecock", "fa-sickle", "fa-sigma", "fa-sign", "fa-sign-in", "fa-sign-in-alt", "fa-sign-language", "fa-sign-out", "fa-sign-out-alt", "fa-signal", "fa-signal-1", "fa-signal-2", "fa-signal-3", "fa-signal-4", "fa-signal-alt", "fa-signal-alt-1", "fa-signal-alt-2", "fa-signal-alt-3", "fa-signal-alt-slash", "fa-signal-slash", "fa-signal-stream", "fa-signature", "fa-sim-card", "fa-siren", "fa-siren-on", "fa-sitemap", "fa-skating", "fa-skeleton", "fa-ski-jump", "fa-ski-lift", "fa-skiing", "fa-skiing-nordic", "fa-skull", "fa-skull-cow", "fa-skull-crossbones", "fa-slash", "fa-sledding", "fa-sleigh", "fa-sliders-h", "fa-sliders-h-square", "fa-sliders-v", "fa-sliders-v-square", "fa-smile", "fa-smile-beam", "fa-smile-plus", "fa-smile-wink", "fa-smog", "fa-smoke", "fa-smoking", "fa-smoking-ban", "fa-sms", "fa-snake", "fa-snooze", "fa-snow-blowing", "fa-snowboarding", "fa-snowflake", "fa-snowflakes", "fa-snowman", "fa-snowmobile", "fa-snowplow", "fa-socks", "fa-solar-panel", "fa-solar-system", "fa-sort", "fa-sort-alpha-down", "fa-sort-alpha-down-alt", "fa-sort-alpha-up", "fa-sort-alpha-up-alt", "fa-sort-alt", "fa-sort-amount-down", "fa-sort-amount-down-alt", "fa-sort-amount-up", "fa-sort-amount-up-alt", "fa-sort-circle", "fa-sort-circle-down", "fa-sort-circle-up", "fa-sort-down", "fa-sort-numeric-down", "fa-sort-numeric-down-alt", "fa-sort-numeric-up", "fa-sort-numeric-up-alt", "fa-sort-shapes-down", "fa-sort-shapes-down-alt", "fa-sort-shapes-up", "fa-sort-shapes-up-alt", "fa-sort-size-down", "fa-sort-size-down-alt", "fa-sort-size-up", "fa-sort-size-up-alt", "fa-sort-up", "fa-soup", "fa-spa", "fa-space-shuttle", "fa-space-station-moon", "fa-space-station-moon-alt", "fa-spade", "fa-sparkles", "fa-speaker", "fa-speakers", "fa-spell-check", "fa-spider", "fa-spider-black-widow", "fa-spider-web", "fa-spinner", "fa-spinner-third", "fa-splotch", "fa-spray-can", "fa-sprinkler", "fa-square", "fa-square-full", "fa-square-root", "fa-square-root-alt", "fa-squirrel", "fa-staff", "fa-stamp", "fa-star", "fa-star-and-crescent", "fa-star-christmas", "fa-star-exclamation", "fa-star-half", "fa-star-half-alt", "fa-star-of-david", "fa-star-of-life", "fa-star-shooting", "fa-starfighter", "fa-starfighter-alt", "fa-stars", "fa-starship", "fa-starship-freighter", "fa-steak", "fa-steering-wheel", "fa-step-backward", "fa-step-forward", "fa-stethoscope", "fa-sticky-note", "fa-stocking", "fa-stomach", "fa-stop", "fa-stop-circle", "fa-stopwatch", "fa-store", "fa-store-alt", "fa-stream", "fa-street-view", "fa-stretcher", "fa-strikethrough", "fa-stroopwafel", "fa-subscript", "fa-subway", "fa-suitcase", "fa-suitcase-rolling", "fa-sun", "fa-sun-cloud", "fa-sun-dust", "fa-sun-haze", "fa-sunglasses", "fa-sunrise", "fa-sunset", "fa-superscript", "fa-surprise", "fa-swatchbook", "fa-swimmer", "fa-swimming-pool", "fa-sword", "fa-sword-laser", "fa-sword-laser-alt", "fa-swords", "fa-swords-laser", "fa-synagogue", "fa-sync", "fa-sync-alt", "fa-syringe", "fa-table", "fa-table-tennis", "fa-tablet", "fa-tablet-alt", "fa-tablet-android", "fa-tablet-android-alt", "fa-tablet-rugged", "fa-tablets", "fa-tachometer", "fa-tachometer-alt", "fa-tachometer-alt-average", "fa-tachometer-alt-fast", "fa-tachometer-alt-fastest", "fa-tachometer-alt-slow", "fa-tachometer-alt-slowest", "fa-tachometer-average", "fa-tachometer-fast", "fa-tachometer-fastest", "fa-tachometer-slow", "fa-tachometer-slowest", "fa-taco", "fa-tag", "fa-tags", "fa-tally", "fa-tanakh", "fa-tape", "fa-tasks", "fa-tasks-alt", "fa-taxi", "fa-teeth", "fa-teeth-open", "fa-telescope", "fa-temperature-down", "fa-temperature-frigid", "fa-temperature-high", "fa-temperature-hot", "fa-temperature-low", "fa-temperature-up", "fa-tenge", "fa-tennis-ball", "fa-terminal", "fa-text", "fa-text-height", "fa-text-size", "fa-text-width", "fa-th", "fa-th-large", "fa-th-list", "fa-theater-masks", "fa-thermometer", "fa-thermometer-empty", "fa-thermometer-full", "fa-thermometer-half", "fa-thermometer-quarter", "fa-thermometer-three-quarters", "fa-theta", "fa-thumbs-down", "fa-thumbs-up", "fa-thumbtack", "fa-thunderstorm", "fa-thunderstorm-moon", "fa-thunderstorm-sun", "fa-ticket", "fa-ticket-alt", "fa-tilde", "fa-times", "fa-times-circle", "fa-times-hexagon", "fa-times-octagon", "fa-times-square", "fa-tint", "fa-tint-slash", "fa-tire", "fa-tire-flat", "fa-tire-pressure-warning", "fa-tire-rugged", "fa-tired", "fa-toggle-off", "fa-toggle-on", "fa-toilet", "fa-toilet-paper", "fa-toilet-paper-alt", "fa-tombstone", "fa-tombstone-alt", "fa-toolbox", "fa-tools", "fa-tooth", "fa-toothbrush", "fa-torah", "fa-torii-gate", "fa-tornado", "fa-tractor", "fa-trademark", "fa-traffic-cone", "fa-traffic-light", "fa-traffic-light-go", "fa-traffic-light-slow", "fa-traffic-light-stop", "fa-trailer", "fa-train", "fa-tram", "fa-transgender", "fa-transgender-alt", "fa-transporter", "fa-transporter-1", "fa-transporter-2", "fa-transporter-3", "fa-transporter-empty", "fa-trash", "fa-trash-alt", "fa-trash-restore", "fa-trash-restore-alt", "fa-trash-undo", "fa-trash-undo-alt", "fa-treasure-chest", "fa-tree", "fa-tree-alt", "fa-tree-christmas", "fa-tree-decorated", "fa-tree-large", "fa-tree-palm", "fa-trees", "fa-triangle", "fa-triangle-music", "fa-trophy", "fa-trophy-alt", "fa-truck", "fa-truck-container", "fa-truck-couch", "fa-truck-loading", "fa-truck-monster", "fa-truck-moving", "fa-truck-pickup", "fa-truck-plow", "fa-truck-ramp", "fa-trumpet", "fa-tshirt", "fa-tty", "fa-turkey", "fa-turntable", "fa-turtle", "fa-tv", "fa-tv-alt", "fa-tv-music", "fa-tv-retro", "fa-typewriter", "fa-ufo", "fa-ufo-beam", "fa-umbrella", "fa-umbrella-beach", "fa-underline", "fa-undo", "fa-undo-alt", "fa-unicorn", "fa-union", "fa-universal-access", "fa-university", "fa-unlink", "fa-unlock", "fa-unlock-alt", "fa-upload", "fa-usb-drive", "fa-usd-circle", "fa-usd-square", "fa-user", "fa-user-alien", "fa-user-alt", "fa-user-alt-slash", "fa-user-astronaut", "fa-user-chart", "fa-user-check", "fa-user-circle", "fa-user-clock", "fa-user-cog", "fa-user-cowboy", "fa-user-crown", "fa-user-edit", "fa-user-friends", "fa-user-graduate", "fa-user-hard-hat", "fa-user-headset", "fa-user-injured", "fa-user-lock", "fa-user-md", "fa-user-md-chat", "fa-user-minus", "fa-user-music", "fa-user-ninja", "fa-user-nurse", "fa-user-plus", "fa-user-robot", "fa-user-secret", "fa-user-shield", "fa-user-slash", "fa-user-tag", "fa-user-tie", "fa-user-times", "fa-user-unlock", "fa-user-visor", "fa-users", "fa-users-class", "fa-users-cog", "fa-users-crown", "fa-users-medical", "fa-utensil-fork", "fa-utensil-knife", "fa-utensil-spoon", "fa-utensils", "fa-utensils-alt", "fa-vacuum", "fa-vacuum-robot", "fa-value-absolute", "fa-vector-square", "fa-venus", "fa-venus-double", "fa-venus-mars", "fa-vhs", "fa-vial", "fa-vials", "fa-video", "fa-video-plus", "fa-video-slash", "fa-vihara", "fa-violin", "fa-voicemail", "fa-volcano", "fa-volleyball-ball", "fa-volume", "fa-volume-down", "fa-volume-mute", "fa-volume-off", "fa-volume-slash", "fa-volume-up", "fa-vote-nay", "fa-vote-yea", "fa-vr-cardboard", "fa-wagon-covered", "fa-walker", "fa-walkie-talkie", "fa-walking", "fa-wallet", "fa-wand", "fa-wand-magic", "fa-warehouse", "fa-warehouse-alt", "fa-washer", "fa-watch", "fa-watch-calculator", "fa-watch-fitness", "fa-water", "fa-water-lower", "fa-water-rise", "fa-wave-sine", "fa-wave-square", "fa-wave-triangle", "fa-waveform", "fa-waveform-path", "fa-webcam", "fa-webcam-slash", "fa-weight", "fa-weight-hanging", "fa-whale", "fa-wheat", "fa-wheelchair", "fa-whistle", "fa-wifi", "fa-wifi-1", "fa-wifi-2", "fa-wifi-slash", "fa-wind", "fa-wind-turbine", "fa-wind-warning", "fa-window", "fa-window-alt", "fa-window-close", "fa-window-frame", "fa-window-frame-open", "fa-window-maximize", "fa-window-minimize", "fa-window-restore", "fa-windsock", "fa-wine-bottle", "fa-wine-glass", "fa-wine-glass-alt", "fa-won-sign", "fa-wreath", "fa-wrench", "fa-x-ray", "fa-yen-sign", "fa-yin-yang");
        
    }
}
$sc_studimegamenu = new sc_studiMegaMenu();