<?php
namespace Elementor;


class Sc_Lessons extends Widget_Base {
	
	public function get_name() {
		return 'studi-lesson-builder';
	}
	
	public function get_title() {
		return  __( 'Lesson Builder', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-kit-details';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	protected function register_controls() {

		
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Section Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title', 'studiare' ),
				'placeholder' => '',
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'list_has_section_num',
			[
				'label' => __( 'Section Number ', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'section_num_title',
			[
				'label' => __( 'Chapter Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Section', 'studiare' ),
				'placeholder' => '',
				'condition' => [
                    'list_has_section_num' => 'true'
                ],
			]
		);
		$this->add_control(
			'section_number',
			[
				'label' => __( 'Section Number', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'First', 'studiare' ),
				'placeholder' => '',
				'condition' => [
                    'list_has_section_num' => 'true'
                ],
			]
		);
		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'list_open_situ',
			[
				'label' => __( 'Section Open/Close ', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Open', 'studiare' ),
				'label_off' => __( 'Close', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'showicon',
			[
				'label' => __( 'Show Icon before title ', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		/* start course */
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'lesson_title', [
				'label' => __( 'Lesson Title', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Lesson Title' , 'studiare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'lesson_subtitle', [
				'label' => __( 'Lesson Subtitle', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Subtitle' , 'studiare' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'private_lesson',
			[
				'label' => __( 'Private Lesson', 'studiare' ),
				'description' => __( 'By activating this option, the course content will be locked and hidden and will be displayed to the user after purchasing the course.' , 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$repeater->add_control(
    'private_access_type',
    [
        'label' => __( 'Private Access Type', 'studiare' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'private_for_members' => __( 'Private for Members', 'studiare' ),
            'private_for_buyers' => __( 'Private for Buyers', 'studiare' ),
        ],
        'default' => 'private_for_buyers',
        'condition' => [
            'private_lesson' => 'true',
        ],
    ]
);

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'studiare' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fal fa-folder',
					'library' => 'light',
				],
			]
		);

		$repeater->add_control(
			'lesson_content', [
				'label' => __( 'Content', 'studiare' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Content' , 'studiare' ),
				'show_label' => false,
			]
		);
		
		$repeater->add_control(
			'badge',
			[
				'label' => __( 'Section Badge', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'no_badge',
				'options' => [
					'no_badge'  => __( 'Select', 'studiare' ),
					'video' => __( 'Video', 'studiare' ),
					'exam' => __( 'Exam', 'studiare' ),
					'quiz' => __( 'Quiz', 'studiare' ),
					'lecture' => __( 'Lecture', 'studiare' ),
					'free' => __( 'Free', 'studiare' ),
					'practice' => __( 'Practice', 'studiare' ),
				],
			]
		);
		$repeater->add_control(
			'preview_video', [
				'label' => __( 'Preview Video', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'description' => __( 'You can use Youtube,Vimeo for preview video' , 'studiare' ),
				'label_block' => true,
			]
		);
		//https://developers.elementor.com/query-control-autocomplete-refactoring/
		if (class_exists("\ElementorPro\Modules\QueryControl\Module")) {
		$repeater->add_control(
        	'sc_download_file',
        	[
        		'label' => __( 'Download Link', 'studiare' ),
        		'description' => esc_html__( 'Please search the download title which you create in studiare panel->downloads', 'studiare' ),
        		'type' => \ElementorPro\Modules\QueryControl\Module::QUERY_CONTROL_ID,
        		'default'=>'',
        		'autocomplete' => [
        			'object' => \ElementorPro\Modules\QueryControl\Module::QUERY_OBJECT_POST,
        			'display' => 'detailed',
        			//'by_field' => 'post_id',
        			'query' => ["post_type"=>"cdownload"],
        		],
        	]
        );
		}
		
		$repeater->add_control(
			'sc_download_access',
			[
				'label' => __( 'Download Access', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'protected_dl',
				'options' => [
					'free_dl_all'  => __( 'Free', 'studiare' ),
					'free_dl_users' => __( 'Free just for users', 'studiare' ),
					'protected_dl' => __( 'Protected Download', 'studiare' ),
				],
			]
		);
		$repeater->add_control(
			'sc_pls',  //protect link status
			[
				'label' => __( 'Protect download link', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'studiare' ),
				'label_off' => __( 'No', 'studiare' ),
				'description' => esc_html__('در صورتی که این گزینه را فعال نمایید حتی پس از خرید محصول، لینک دانلود مستقیم فایل در اختیار کاربر قرار نمی گیرد و سیستم به نوعی تعریف شده است که ابتدا وضعیت ورود کاربر و خرید محصول بررسی و سپس اجازه دانلود داده می شود.', 'studiare'),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Lessons List', 'studiare' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				//'default' => '',
				'title_field' => '{{{ lesson_title }}}',
			]
		);
		
		/* end course */
		
		
		
		
		
		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        $title   = $settings['title'];
        $list_open_situ  = $settings['list_open_situ'];
        $section_number  = $settings['section_number'];
        $section_num_title  = $settings['section_num_title'];
        $list_has_section_num  = $settings['list_has_section_num'];
        $showicon  = $settings['showicon'];

        $css_class = "course-section";
        $rand_id = rand();
        /* open close by default */
        if($list_open_situ=='true'){$openclass = " active_tab_by_suncode";}else{$openclass = " ";}
        ?>
        <div class="<?php echo esc_attr( $css_class ) ;  ?>">
        	<?php if(!empty($title)): ?>
              <div data-id="<?php echo $rand_id;?>" class="sc-course-lesson-toggle-wrapper">
                   <h5 class="course-section-title">
                       <?php if($list_has_section_num=='true') { ?>
                       <span class="chapterholder">
                       <?php if(!empty($section_num_title)): ?><span class="scchapturetitle"><?php echo $section_num_title ?></span><?php endif; ?>
                       <?php if(!empty($section_number)): ?><span class="scchapturenumber"><?php echo $section_number ?></span><?php endif; ?>
                       </span>
                       <?php } ?>
                       <?php if($showicon=='true'): ?><i class="fal fa-ellipsis-h-alt"><?php endif; ?></i> <?php echo esc_attr($title); ?></h5>
        			<div class="sc-course-lesson-toggle"><i class="fad fa-chevron-down"></i></div></div>
        	<?php endif; ?>
            <div class="panel-group" style="display:none;">
                
        	    <?php //start section content  
        	    
        	    
                if ( $settings['list'] ) { //start lessons holder
                			foreach (  $settings['list'] as $item ) {  //start lessons list
                			
                			$icon           = $item['icon'];
                			$title          = $item['lesson_title'];
                			$subtitle       = $item['lesson_subtitle'];
                			$badge          = $item['badge'];
                			$preview_video  = $item['preview_video'];
                			$private_lesson = $item['private_lesson'];
                			$sc_pls         = $item['sc_pls'];
                			$content        = $item['lesson_content'];
                			
                			$atts['sc_download_file']   = $item['sc_download_file'];
                            $atts['sc_download_access'] = $item['sc_download_access'];
                            $private_access = isset($item['private_access_type']) ? $item['private_access_type'] : 'private_for_buyers';


                				
                		

        	    
        	    
        	    /* get toast title and message */
                $login_toast_title = codebean_option('login_toast_title');
                $login_toast_message = codebean_option('login_toast_message');
                $bought_toast_title = codebean_option('bought_toast_title');
                $bought_toast_message = codebean_option('bought_toast_message');
                $private_placeholder = codebean_option('private_lesson_message');
                
                // Get current user and check if he bought current course
                $bought_course = false;
                $current_user = wp_get_current_user();
                if( !empty($current_user->user_email) and !empty($current_user->ID) ) {
                	if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, get_the_id() ) ) {
                		$bought_course = true;
                	}
                }
                
                $isbought = studi_has_bought_items($current_user->ID,get_the_id() );
        		if($isbought =="true"){
        		    $bought_course = true;
        		}
        	    
        	    ?>
        	    
                <div class="course-panel-heading">
                    <div class="panel-heading-left">
                	    <?php if(!empty($icon)): ?>
                            <div class="course-lesson-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                	    <?php endif; ?>
                	    <?php if(!empty($title)): ?>
                            <div class="title">
                                <h4><?php echo esc_attr($title); ?>
                                    <?php if(!empty($badge) and $badge != 'no_badge'): ?>
                                        <span class="badge-item <?php echo esc_attr($badge); ?>"><?php  echo add_class_value_in_any_lang($badge); ?></span>
                	                <?php endif; ?>
                                </h4>
                                <?php if(!empty($subtitle)) : ?><p class="subtitle"><?php echo esc_attr($subtitle); ?></p><?php endif; ?>
                            </div>
                
                        <?php endif; ?>
                    </div>
                
                    <?php if (!empty($preview_video) || !empty($private_lesson) || !empty($sc_pls)) : ?>
                    
                    <?php 
                    //check if video from aparat
                    if( str_contains($preview_video, ".aparat.com/v") ){
                        
                        $course_video_aparat = substr($preview_video, strrpos($preview_video, '/') + 1);
                        $preview_video = studi_get_aparat_file_link($course_video_aparat);
                    }
                    ?>
                        <div class="panel-heading-right">
                            <?php if(!empty($preview_video)): ?>
                                <a class="video-lesson-preview preview-button" href="<?php echo esc_url( $preview_video ); ?>"><i class="fa fa-play-circle"></i><?php esc_html_e( 'Preview', 'studiare' ); ?></a>
                            <?php endif; ?>
                	<?php if ($private_lesson == 'true'): ?>
        <?php if ($private_access == 'private_for_buyers'): ?>
            <div class="private-lesson">
                <i class="fa fa-lock"></i><span><?php esc_html_e('Private', 'studiare'); ?></span>
            </div>
        <?php elseif ($private_access == 'private_for_members'): ?>
            <div class="private-lesson">
                <i class="fa fa-user-lock"></i><span><?php esc_html_e('for Users', 'studiare'); ?></span>
            </div>
        <?php endif; ?>
    <?php endif; ?>
                			<?php
                	if($sc_pls==="true"){$sc_protect_link_status = $sc_pls;}else{$sc_protect_link_status = "false";}
                	echo generate_dl_section($atts,get_the_ID(),$private_lesson,$bought_course,$login_toast_title,$login_toast_message,$bought_toast_title,$bought_toast_message,$sc_protect_link_status); ?>
                        </div>
                    <?php endif; ?>
                	
                </div>
                
    <div class="panel-content">
        <div class="panel-content-inner">
            <?php
            // بررسی نوع دسترسی به درس
            if ($private_lesson == 'true') {
                if ($private_access == 'private_for_members') {
                    // محتوای خصوصی برای کاربران واردشده
                    if (is_user_logged_in()) {
                        echo do_shortcode($content);
                    } else {
                        ?>
                        <div class="lessonaccessdenied">
                            <span class="icon"><i class="fas fa-user-lock"></i></span>
                            <?php
                                esc_html_e('This lesson is private. Please log in to access.', 'studiare');
                            ?>
                        </div>
                        <?php
                    }
                } else {
                    // محتوای خصوصی برای خریداران
                    if ($bought_course) {
                        echo do_shortcode($content);
                    } else {
                        ?>
                        <div class="lessonaccessdenied">
                            <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                            <?php
                            // پیام جایگزین برای خریداران
                            if (!empty($private_placeholder)) {
                                echo balancetags($private_placeholder);
                            } else {
                                esc_html_e('This lesson is private, for full access to all lessons you need to buy this course.', 'studiare');
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
            } else {
                // محتوای عمومی بدون محدودیت
                echo do_shortcode($content);
            }
            ?>
        </div>
    </div>

        	    
        	    <?php 
                } //end lessons list
                } //end lessons list holder
        	    //end section content  ?>
        	    
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
        	<?php if($list_open_situ=='true'){?>
        	jQuery(document).ready(function(){
        		var query = "[data-id='"+<?php echo $rand_id;?>+"']";
                var item = jQuery(query);
                //alert(id);
                item.toggleClass("active_tab_by_suncode");
                item.next('.panel-group').slideToggle();
        	});
        	<?php } ?>
        </script>

        <?php
	}
	
	protected function content_template() {
	 
    }
	
	
}

