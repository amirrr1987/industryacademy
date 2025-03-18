<?php
# Blog Settings
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Blog', 'studiare' ),
	'id' => 'blog',
	'icon' => 'fal fa-newspaper',

) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Blog Options', 'studiare' ),
	'id'               => 'blog_settings',
	'subsection'       => true,
	'icon' => 'fal fa-newspaper',
	'fields'           => array(
		array(
			'id'        => 'blog_post_style',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Blog Layout', 'studiare' ),
			'default'   => 'list',
			'options'   => array(
				'list' => esc_html__( 'List View', 'studiare' ),
				'grid' => esc_html__( 'Grid View', 'studiare' ),
			)
		),
		array( 
			'id' => 'blog_grid_columns',
			'type' => 'select',
			'title' => esc_html__( 'Blog Columns', 'studiare' ),
			'subtitle' => esc_html__( 'Number of Posts in a Row', 'studiare' ),
			'default' => 'three',
			'options' => array(
				'one' => esc_html__( '1-Column', 'studiare' ),
				'two' => esc_html__( '2-Column', 'studiare' ),
				'three' => esc_html__( '3-Column', 'studiare' ),
				'four' => esc_html__( '4-Column', 'studiare' )
			),
			'select2'   => array('allowClear' => false),
			'required'  => array('blog_post_style', '=', 'grid')
		),
		array(
			'id'        => 'place_of_discriptions_of_cats_blog',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Category Description Position', 'studiare' ),
			'subtitle'  => esc_html__( 'Show Category Description Before or After Category Posts.', 'studiare' ),
			'options'   => array(
				'top' => esc_html__( 'Top', 'studiare' ),
				'bottom' => esc_html__( 'Bottom', 'studiare' ),
			),
			'default'   => 'bottom',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'sidebar_position',
			'type'      => 'image_select',
			'title'     => esc_html__( 'Sidebar Position', 'studiare' ),
			'default'   => 'right',
			'description'  => "<span class='notice-badge'>".esc_html__( 'Notice:', 'studiare' )."</span>".esc_html__( 'If the right or left sidebar is enabled, the widgets in Dashboard > Appearance > Widgets > Blog Sidebar will be displayed in the blog archive sidebar.', 'studiare' ),
			'options'   => array(
				'none'      => array(
					'alt'   => esc_html__( 'No Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/1col.png'
				),
				'left'      => array(
					'alt'   => esc_html__( 'Left Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
				),
				'right'      => array(
					'alt'   => esc_html__( 'Right Sidebar', 'studiare' ),
					'img'  => ReduxFramework::$_url.'assets/img/2cl.png'
				),
			)
		),
		array(
			'id'        => 'sticky_blog_archive_sidebar',
			'type'      => 'switch',
			'title'     => esc_html__( 'Sticky Sidebar', 'studiare' ),
			'default'   => true,
			'required' => array('sidebar_position', '!=', 'none'),
		),
		array(
			'id'        => 'blog_list_image_size',
			'type'      => 'select',
			'title'     => esc_html__( 'Post Image Size', 'studiare' ),
			'subtitle'  => esc_html__( 'For List Styles', 'studiare' ),
			'options'   => array(
				'studiare-image-420x294-croped' => esc_html__( '420x294', 'studiare' ),
				'studiare-image-500x350-croped' => esc_html__( '500x350', 'studiare' ),
				'studiare-image-250x400-croped'    => esc_html__( '250x400', 'studiare' ),
				'studiare-course-thumb'     => esc_html__( '370x270', 'studiare' ),
				'studiare-teacher-single-thumb'      => esc_html__( '400x400', 'studiare' ),
				'studiare-search-thumbnail'      => esc_html__( '220x220', 'studiare' ),
				'studiare-portfolio-grid'      => esc_html__( '470x400', 'studiare' ),
				'thumbnail' => esc_html__( 'Wordpress Thumbnail', 'studiare' ),
				'medium'    => esc_html__( 'Wordpress Medium', 'studiare' ),
				'large'     => esc_html__( 'Wordpress Large', 'studiare' ),
				'full'      => esc_html__( 'Wordpress Full', 'studiare' ),
			),
			'default'   => 'full',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'blog_pro_image_size',
			'type'      => 'select',
			'title'     => esc_html__( 'Post Image Size', 'studiare' ),
			'subtitle'  => esc_html__( 'For Grid Styles', 'studiare' ),
			'options'   => array(
				'studiare-image-420x294-croped' => esc_html__( '420x294', 'studiare' ),
				'studiare-image-500x350-croped' => esc_html__( '500x350', 'studiare' ),
				'studiare-image-250x400-croped'    => esc_html__( '250x400', 'studiare' ),
				'studiare-course-thumb'     => esc_html__( '370x270', 'studiare' ),
				'studiare-teacher-single-thumb'      => esc_html__( '400x400', 'studiare' ),
				'studiare-search-thumbnail'      => esc_html__( '220x220', 'studiare' ),
				'studiare-portfolio-grid'      => esc_html__( '470x400', 'studiare' ),
				'thumbnail' => esc_html__( 'Wordpress Thumbnail', 'studiare' ),
				'medium'    => esc_html__( 'Wordpress Medium', 'studiare' ),
				'large'     => esc_html__( 'Wordpress Large', 'studiare' ),
				'full'      => esc_html__( 'Wordpress Full', 'studiare' ),
			),
			'default'   => 'studiare-image-420x294-croped',
			'select2'   => array('allowClear' => false)
		),
		array(
			'id'        => 'blog_show_date',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Date', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'blog_show_author',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Author', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'blog_show_excerpt',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Excerpt', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'blog_show_excerpt_length',
			'type'      => 'spinner',
			'title'     => esc_html__( 'Excerpt Length', 'studiare' ),
			'description'  => esc_html__( 'input the number of characters', 'studiare' ),
			 'default'  => '200',
             'min'      => '50',
             'step'     => '1',
             'max'      => '1000',
			'required' => array('blog_show_excerpt', '=', '1'),
		),
		array(
			'id'        => 'blog_show_categories',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Categories', 'studiare' ),
			'default'   => true,
		),
	)
) );

$share_story_networks = array(
	'enabled' => array(
		'whatsapp'	=> 'whatsapp',
		'fb'   	 	=> 'Facebook',
		'tw'   	 	=> 'Twitter',
		'email'       => 'email',
		'telegram'       => 'telegram',
	),
);
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Post Options', 'studiare' ),
	'id'               => 'sc_single_post_settings',
	'subsection'       => true,
	'icon' => 'fal fa-file-word',
	'fields'           => array(
	    array(
			'id'        => 'single_sidebar_position',
			'type'      => 'image_select',
			'title'     => esc_html__( 'Sidebar Position', 'studiare' ),
			'default'   => 'right',
			'description'  => "<span class='notice-badge'>".esc_html__( 'Notice:', 'studiare' )."</span>".esc_html__( 'If the right or left sidebar is enabled, by default the widgets in Dashboard > Appearance > Widgets > Blog Sidebar will be displayed in the blog archive sidebar. if you want different widgets from blog archive, put your widgets in Single Blog Sidebar', 'studiare' ),
			'options'   => array(
				'none'      => array(
					'alt'   => esc_html__( 'No Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/1col.png'
				),
				'left'      => array(
					'alt'   => esc_html__( 'Left Sidebar', 'studiare' ),
					'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
				),
				'right'      => array(
					'alt'   => esc_html__( 'Right Sidebar', 'studiare' ),
					'img'  => ReduxFramework::$_url.'assets/img/2cl.png'
				),
			)
		),
	    array(
			'id'        => 'sticky_blog_sidebar',
			'type'      => 'switch',
			'title'     => esc_html__( 'Sticky Sidebar', 'studiare' ),
			'default'   => true,
			'required' => array('single_sidebar_position', '!=', 'none'),
		),
	    array(
			'id'        => 'article_feautred_image_single_post',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Feautred Image', 'studiare' ),
			'default'   => true,
		),
	    array(
			'id'        => 'article_date_top_single_post',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Date', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'article_author_top_single_post',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Author', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'article_cats_top_single_post',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Categories', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'article_tags_bottom_single_post',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Tags', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'article_author',
			'type'      => 'switch',
			'title'     => esc_html__( 'Show Author Info', 'studiare' ),
			'subtitle'  => esc_html__( 'Displays author information at the bottom. It will only be displayed if the author description is filled.', 'studiare' ),
			'default'   => true,
		),
		array(
			'id'        => 'blog_navigation',
			'type'      => 'switch',
			'title'     => esc_html__( 'Posts Navigation', 'studiare' ),
			'subtitle'  => esc_html__( 'Show Next and Previos Post Navigation at the Bottom.', 'studiare' ),
			'default'   => true,
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Share Options', 'studiare' ),
	'id'               => 'sharing_settings',
	'subsection'       => true,
	'icon' => 'fal fa-share-alt-square',
	'fields'           => array(
		array(
			'id'       => 'blog_share_story',
			'title'    => esc_html__( 'Share Post', 'studiare' ),
			'type'     => 'switch',
			'default'  => true,
			'on'       => esc_html__( 'Enable', 'studiare' ),
			'off'      => esc_html__( 'Disable', 'studiare' ),
		),
		//array(
		//	'id'       => 'blog_share_story_networks',
		//	'title'    => esc_html__( 'اشتراک گذاری در:', 'studiare' ),
		//	'subtitle' => esc_html__( 'برای فعال کردن یا غیرفعال کردن به داخل باکس مورد نظر بکشید و رها کنید.', 'studiare' ),
		//	'type'     => 'sorter',
		//	'options'  => $share_story_networks,
		//	'required' => array('blog_share_story', '=', '1'),
		//),
	)
) );