<?php
add_action( 'cmb2_admin_init', 'cmb2_group_to_tabs' );
function cmb2_group_to_tabs() {

	$prefix = '_yourprefix_demo_';

	$cmb_demo = new_cmb2_box( array(
		'id'           => 'metabox_tabs',
		'title'        => 'ویژگی های اختصاصی دوره',
		'object_types' => array('product'), // post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true // Show field names on the left
	) );

	$cmb2_group_id = $cmb_demo->add_field( array(
		'id'           => $prefix . 'tab1_group',
		'type'         => 'group',
		'repeatable'   => false,
		'before_group' => '<div class="tab-content" id="tab-1">',
		'after_group'  => '</div>',
		'options'      => array(
			'group_title'   => 'Tab 1',
			'sortable'      => false, // beta
			'show_as_tab'   => true
		)
	) );
	
	$cmb_demo->add_group_field( $cmb2_group_id, array(
		'name'         => __( 'Multiple Files', 'studiare' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'studiare' ),
		'id'           => 'file_list_test',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$cmb2_group_id2 = $cmb_demo->add_field( array(
		'id'           => $prefix . 'tab2_group',
		'type'         => 'group',
		'repeatable'   => false,
		'before_group' => '<div class="tab-content" id="tab-2">',
		'after_group'  => '</div>',
		'options'      => array(
			'group_title'   => 'Tab 2',
			'sortable'      => false, // beta
			'show_as_tab'   => true
		),
	) );
	
	$cmb_demo->add_group_field( $cmb2_group_id2, array(
		'name'        => __( 'Test Multi Checkbox', 'studiare' ),
		'desc'        => __( 'field description (optional)', 'studiare' ),
		'id'          => $prefix . 'multicheckbox',
		'type'        => 'multicheck',
		'options'     => array(
			'check1' => __( 'Check One', 'studiare' ),
			'check2' => __( 'Check Two', 'studiare' ),
			'check3' => __( 'Check Three', 'studiare' ),
		),
	) );

	$cmb2_group_id3 = $cmb_demo->add_field( array(
		'id'           => $prefix . 'tab3_group',
		'type'         => 'group',
		'repeatable'   => false,
		'before_group' => '<div class="tab-content" id="tab-3">',
		'after_group'  => '</div>',
		'options'      => array(
			'group_title'   => 'Tab 3',
			'sortable'      => false, // beta
			'show_as_tab'   => true
		)
	) );
	
	$cmb_demo->add_group_field( $cmb2_group_id3, array(
		'name'        => __( 'Twitter Username', 'studiare' ),
		'id'          => 'twitter_username',
		'type'        => 'text',
	) );

}

add_action( 'cmb2_before_post_form_metabox_tabs', 'tabs_cmb2', 10, 2 );
function tabs_cmb2( $object_id, $cmb2 ) {
	echo '<ul class="tabs-menu">';
	$i = 0;
	foreach( $cmb2->meta_box['fields'] as $field_name => $field ) {
		if( $field['type'] == 'group' && ( isset( $field['options']['show_as_tab'] ) && ( $field['options']['show_as_tab'] == true ) ) ){
			$class = ( $i == 0 ) ? ' class="current"' : '';
			$tab_num = $i+1;
			echo '<li'. $class .'><a href="#tab-' . $tab_num . '">' . $field['options']['group_title'] . '</a></li>';
		}
		$i++;
	}
	echo '</ul>';
}

add_action( 'admin_head', 'cmb2_tabs_style' );
function cmb2_tabs_style() {
?>
<style>
.tab-content .cmb-group-title,
.tab-content .cmbhandle {
	display: none;
}
.tabs-menu {
height: 30px;
float: left;
clear: both;
margin: 0;
}
.tabs-menu li {
height: 30px;
line-height: 30px;
float: left;
margin-right: 10px;
background-color: #ccc;
border-top: 1px solid #d4d4d1;
border-right: 1px solid #d4d4d1;
border-left: 1px solid #d4d4d1;
}
.tabs-menu li.current {
position: relative;
background-color: #fff;
border-bottom: 1px solid #fff;
z-index: 5;
}
.tabs-menu li a {
padding: 10px;
text-transform: uppercase;
color: #fff;
text-decoration: none;
outline: none;
box-shadow: none;
}
.tabs-menu .current a {
color: #2e7da3;
}
.tab-content {
	display: none;
}
#tab-1 {
	display: block;
}
</style>
<script>
jQuery(document).ready(function() {
	jQuery(".tabs-menu a").click(function(event) {
		event.preventDefault();
		jQuery(this).parent().addClass("current");
		jQuery(this).parent().siblings().removeClass("current");
		var tab = jQuery(this).attr("href");
		jQuery(".tab-content").not(tab).css("display", "none");
		jQuery(tab).fadeIn();
	});
});
</script>
<?php
}