<?php
namespace Elementor;


class Sc_Teacher_Lessons extends Widget_Base {
	
	public function get_name() {
		return 'studi-teacher-lesson';
	}
	
	public function get_title() {
		return  __( 'Teacher Lessons', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-table-of-contents';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	public  function sc_get_techers(){
       
    $teachers = new \WP_Query( array( 'post_type' => 'teacher','post_status' => 'publish' ,'posts_per_page' => -1) );
    if($teachers){
    $teachers_array =array();
    foreach($teachers->posts as $teacher){
    $teacher_id = $teacher->ID;
    $teacher_name = $teacher->post_title;
    //$teachers_array += [ $teacher_name => $teacher_id];
    $teachers_array += [ $teacher_id => $teacher_name];
    }
    }else{
        $teachers_array='';
    }
     return $teachers_array;
    }
	
	protected function register_controls() {

		
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'studiare' ),
			]
		);
		
	
		
		$this->add_control(
			'desktop_clmn',
			[
				'label' => __( 'Columns in desktop', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '4',
				
			]
		);
		$this->add_control(
			'tablet_clmn',
			[
				'label' => __( 'Columns in tablet', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '2',
				
			]
		);
		$this->add_control(
			'mobile_clmn',
			[
				'label' => __( 'Columns in mobile', 'studiare' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1',
				
			]
		);
		
		
		
		
		$this->add_control(
			'teacher_name',
			[
				'label' => __( 'Teacher', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->sc_get_techers(),
			]
		);
		
		
		
		
		
		
		
		
		$this->end_controls_section();
	}
	
	protected function render() {
  
        $settings = $this->get_settings_for_display();
        $teacher_name   = $settings['teacher_name'];
        $desktop_clmn   = $settings['desktop_clmn'];
        $tablet_clmn   = $settings['tablet_clmn'];
        $mobile_clmn   = $settings['mobile_clmn'];
        
        $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'fields' => 'ids',  //just return ids of products
        'posts_per_page' => -1,
        //'meta_key'=>'_studiare_course_teacher',
        'meta_key'=>array('_studiare_course_teacher','_studiare_course_teacher_2','_studiare_course_teacher_3','_studiare_course_teacher_4'),
        'meta_value'=>$teacher_name,
        );
        
        
//ob_start();
$teachers = new \WP_Query($args);
?>

<?php if($teachers->have_posts()): ?>
    <div class="teacher_lessons_list products owl-carousel owl-rtl <?php //echo esc_attr( $css_class ) . vc_shortcode_custom_css_class($css, ' '); ?>">

	    <?php while($teachers->have_posts()){ $teachers->the_post(); ?>

		    <?php get_template_part( 'woocommerce/content-product' ); ?>

	    <?php \wp_reset_postdata(); }//endwhile; 
	    
	    ?>
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
	navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
    responsive:{
                                0:{
                                    items:<?php echo $mobile_clmn;?>,
									nav:true,
                                },
                                768:{
                                    items:<?php echo $tablet_clmn;?>
                                },
                                1000:{
                                    items:<?php echo $desktop_clmn;?>
                                }
                            } 
                            
 
  });
 
});
</script>

        <?php
  //ob_get_clean();    
	}
	
	protected function content_template() {
	 
    }
	
	
}

