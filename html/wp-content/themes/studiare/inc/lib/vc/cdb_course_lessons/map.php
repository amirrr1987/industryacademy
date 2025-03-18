<?php

vc_map( array(
	'base'             => 'cdb_course_lessons',
	'name'             => esc_html__( 'دروس دوره', 'studiare' ),
	'as_parent'        => array('only' => 'cdb_course_lesson'),
	'description'      => esc_html__( 'نمایش برنامه درسی برای دوره', 'studiare' ),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'icon'             => 'admin_vc_addon',
	'params'           => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'عنوان بخش', 'studiare' ),
			'param_name' => 'title',
			'holder'	=> 'div'
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'نام کلاس اضافی', 'studiare' ),
			'param_name'    => 'el_class',
			'description'   => esc_html__( 'اگر می خواهید المان محتوا خاصی را به صورت متفاوتی وارد کنید، سپس از این فیلد برای اضافه کردن یک نام کلاس استفاده کنید و سپس آن را در فایل CSS خود ببینید.', 'studiare' )
		),
		array(
			'type'	 => 'checkbox',
			'heading' => esc_html__('لیست باز باشد', 'studiare'),
			'param_name' => 'list_open_situ',
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'studiare' ),
			'param_name' => 'css',
			'group'      => esc_html__( 'تنظیمات طراحی', 'studiare' )
		)
	),
	'js_view' => 'VcColumnView'
) );

vc_map( array(
	'base'             => 'cdb_course_lesson',
	'name'             => esc_html__( 'سرفصل', 'studiare' ),
	'description'      => esc_html__( 'سرفصل دوره', 'studiare' ),
	'as_child'         => array('only' => 'cdb_course_lessons'),
	'category'         => esc_html__( 'اختصاصی قالب', 'studiare' ),
	'params'           => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'عنوان دوره', 'studiare' ),
			'param_name' => 'title',
			'holder'	=> 'div'
		),
		array(
			'description' => esc_html__('اگر این ویدیو است، می توانید مدت زمان ویدئو یا هر جزئیات دیگر را به عنوان شرح کوتاه قرار دهید', 'studiare'),
			'type' => 'textfield',
			'heading' => esc_html__( 'زیرنویس سرفصل', 'studiare' ),
			'param_name' => 'subtitle',
			'holder'	=> 'div',
		),
		
		array(
			'type'	 => 'checkbox',
			'heading' => esc_html__('خصوصی', 'studiare'),
			'param_name' => 'private_lesson',
		),
		array(
			'type' 				=> 'iconpicker',
			'heading' 			=> esc_html__( 'آیکن', 'studiare' ),
			'param_name' 		=> 'icon',
			'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fapro',
					'iconsPerPage' => 100,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fapro',
				),
			'value'				=> ''
		),
		array(
			'type'	=> 'textarea_html',
			'param_name' => 'content',
			'holder'	=> 'div',
			'group'	=> esc_html__('متن تب', 'studiare' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'نشانه سرفصل', 'studiare' ),
			'param_name' => 'badge',
			'value' => array(
				esc_html__( 'انتخاب نشانه', 'studiare' )	=> 'no_badge',
				esc_html__( 'ویدئو', 'studiare' )	=> 'video',
				esc_html__( 'آزمون', 'studiare' )		=> 'exam',
				esc_html__( 'کوئیز', 'studiare' )		=> 'quiz',
				esc_html__( 'سخنرانی', 'studiare' )   => 'lecture',
				esc_html__( 'رایگان', 'studiare' )		=>'free',
				esc_html__( 'تمرین', 'studiare' )  => 'practice',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ویدئوی پیش نمایش', 'studiare' ),
			'description' => esc_html__('این ویدیو با کلیک روی دکمه «پیش نمایش» در پنجره ظاهر می شود (فقط لینک را به ویدیو اضافه کنید)،  لینک مستقیم ویدئو یا لینک یوتیوب یا vimeo .', 'studiare'),
			'param_name' => 'preview_video',
		),
		
		array(
			'type'	=> 'autocomplete',
			'heading' => esc_html__( 'لینک دانلود', 'studiare' ),
			'description' => __( 'نام فایل ایجاد شده در قسمت دانلود های محافظت شده را در این قسمت جستجو نمایید.برای ایجاد فایل دانلودی جدید <a href="/wp-admin/edit.php?post_type=cdownload" target="_blank">اینجا</a> کلیک کنید', 'studiare' ),
			'param_name' => 'sc_download_file',
			'holder'	=> 'div',
			'settings'   => array(
            'values'         => sc_studi_get_type_posts_data(),
			'multiple'       => false,
		  ),
			'group'	=> 'بخش دانلود',
			
			
		), 
		array(
			'type'	=> 'dropdown',
			'heading' => esc_html__( 'دسترسی به فایل', 'studiare' ),
			'param_name' => 'sc_download_access',
			'holder'	=> 'div',
			'group'	=> 'بخش دانلود',
			'default'=> 'protected_dl',
			'value' => array(
				esc_html__( 'دسترسی آزاد برای عموم', 'studiare' )	=> 'free_dl_all',
				esc_html__( 'دسترسی آزاد فقط برای کاربران وارد شده به سایت', 'studiare' )	=> 'free_dl_users',
				esc_html__( 'دسترسی فقط برای خریداران', 'studiare' )	=> 'protected_dl',
			),
			
		), 
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'محافظت از لینک دانلود', 'studiare' ),
			'description' => esc_html__('در صورتی که این گزینه را فعال نمایید حتی پس از خرید محصول، لینک دانلود مستقیم فایل در اختیار کاربر قرار نمی گیرد و سیستم به نوعی تعریف شده است که ابتدا وضعیت ورود کاربر و خرید محصول بررسی و سپس اجازه دانلود داده می شود.', 'studiare'),
			'param_name' => 'sc_pls', //protect link status
			'group'	=> 'بخش دانلود',
		),
	)
) );

if ( class_exists('WPBakeryShortCodesContainer') ) {
	class WPBakeryShortCode_Cdb_Course_Lessons extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Cdb_Course_Lesson extends WPBakeryShortCode {}
}