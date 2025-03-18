<?php
namespace Elementor;

class Cdb_Blog_Categories extends Widget_Base {
	
	public function get_name() {
		return 'blog-categories';
	}
	
	public function get_title() {
		return  __( 'Blog Categories', 'studiare' );
	}
	
	public function get_icon() {
		return 'sc eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'studiare' ];
	}
	
	public function get_blog_categories(){
	    
	  
        $cats =  get_categories();;


	    $all_cats = array();
	    foreach($cats as $cat ){
	       $all_cats[$cat->term_id] = $cat->name;
	        
	    }
	    return $all_cats;
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		
		$this->add_control(
			'parent',
			[
				'label' => __( 'Category type', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0'  => __( 'Only parent categories', 'studiare' ),
					'999' => __( 'All categories', 'studiare' ),
				],
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Number of category to show', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'description' =>  __( 'Leave it blank if you want to show all', 'studiare' ),
			]
		);
		$this->add_control(
			'exclude_cats',
			[
				'label' => __( 'Exclude categories', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_blog_categories(),
				'default' => '',
			]
		);
		
		$this->add_control(
			'include_cats',
			[
				'label' => __( 'Include categories', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_blog_categories(),
				'default' => '',
				'description' =>  __( 'If you want to show just specific categories select theme from here', 'studiare' ),
			]
		);
		
		/** since version 12.7 
		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'title'  => __( 'Title', 'studiare' ),
					'menu_order' => __( 'Menu order', 'studiare' ),
				],
			]
		);
		**/
		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc'  => __( 'Asceding', 'studiare' ),
					'desc' => __( 'Descending', 'studiare' ),
				],
			]
		);
		$this->add_control(
			'sc_studi_cats_layout',
			[
				'label' => __( 'Layout', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'morphing',
				'options' => [
					/*'default'  => __( 'Default', 'studiare' ),*/
					'material' => __( 'Material', 'studiare' ),
					'grid' => __( 'Grid', 'studiare' ),
					'morphing' => __( 'Morphing', 'studiare' ),
					'remit' => __( 'Remit', 'studiare' ),
				],
			]
		);
        $this->add_control(
			'sc_studi_cat_default_image',
			[
				'label' => __( 'Choose Default Image', 'studiare' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'carousel_options',
			[
				'label' => __( 'Carousel Options', 'studiare' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sc_studi_cat_carousel',
			[
				'label' => __( 'Carousel', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'studiare' ),
				'label_off' => __( 'Disable', 'studiare' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'sc_studi_cat_carouseitems_in_desktop',
			[
				'label' => __( 'Columns in desktop', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '4',
                'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		$this->add_control(
			'sc_studi_cat_carouseitems_in_tablet',
			[
				'label' => __( 'Columns in tablet', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '2',
                'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		$this->add_control(
			'sc_studi_cat_carouseitems_in_mobile',
			[
				'label' => __( 'Columns in mobile', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => '',
                'default' => '1',
                'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		
		$this->add_control(
			'sc_studi_cats_car_nav',
			[
				'label' => __( 'Carousel Navigation', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'studiare' ),
				'label_off' => __( 'Disable', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
				'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
        
        $this->add_control(
			'sc_studi_cats_car_dots',
			[
				'label' => __( 'Carousel Dots', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'studiare' ),
				'label_off' => __( 'Disable', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
				'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		
        $this->add_control(
			'hide_empty',
			[
				'label' => __( 'Hide empty categories', 'studiare' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'studiare' ),
				'label_off' => __( 'Disable', 'studiare' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control(
			'sc_dots_active_color',
			[
				'label' => __( 'Dots active color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-dot.active span' => 'background-color: {{VALUE}}',
				],
				'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		$this->add_control(
			'sc_dots_normal_color',
			[
				'label' => __( 'Dots normal color', 'studiare' ),
				'label_block' => true,
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-dot span' => 'background-color: {{VALUE}}',
				],
				'condition' => [
                    'sc_studi_cat_carousel' => 'yes'
                ],
			]
		);
		

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();

        $sc_studi_cats_layout = $settings['sc_studi_cats_layout'];
        $sc_studi_cat_carousel = $settings['sc_studi_cat_carousel'];
        $hide_empty = $settings['hide_empty'];
       // $orderby = $settings['orderby'];
        $number = $settings['number'];
        $order = $settings['order'];
        $exclude_cats = $settings['exclude_cats'];
        $include_cats = $settings['include_cats'];
        
        $sc_studi_cats_car_nav = $settings['sc_studi_cats_car_nav'];
        if(empty($sc_studi_cats_car_nav) ||$sc_studi_cats_car_nav==''){$sc_studi_cats_car_nav='false';}

        $sc_studi_cats_car_dots = $settings['sc_studi_cats_car_dots'];
        $sc_studi_cat_default_image = $settings['sc_studi_cat_default_image']['id'];
        $sc_studi_cat_carouseitems_in_desktop = $settings['sc_studi_cat_carouseitems_in_desktop'];
        $sc_studi_cat_carouseitems_in_tablet = $settings['sc_studi_cat_carouseitems_in_tablet'];
        $sc_studi_cat_carouseitems_in_mobile = $settings['sc_studi_cat_carouseitems_in_mobile'];
       $sc_dots_normal_color = isset($settings['sc_dots_normal_color']) ? $settings['sc_dots_normal_color'] : '#6c757d40';
        $sc_dots_active_color = isset($settings['sc_dots_active_color']) ? $settings['sc_dots_active_color'] : 'var(--primary_color)';
        $parent = $settings['parent'];
        

		
$jp_id = rand(1,1000);
$jp_id = "jpcarousel".$jp_id;
$hide_empty = ( $hide_empty == true || $hide_empty == 1 ) ? 1 : 0;


$args = array(
    //'orderby'    => 'title',
    //'meta_key'   => 'order',
    //'orderby'    => 'meta_value_num',
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'pad_counts' => true,
    'exclude' => $exclude_cats,
    'include' => $include_cats,
);

$args['orderby'] ='name';

//$product_categories = get_terms( 'product_cat', $args );
//$product_categories = get_terms( 'category', $args );
$product_categories =  get_categories($args); //since version 12.7

//print_r($hide_empty);

if ( $parent == "0" ) {
	$product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );
}

if ( $hide_empty ) {
	foreach ( $product_categories as $key => $category ) {
		if ( $category->count == 0 ) {
			unset( $product_categories[ $key ] );
		}
	}
}

if ( $number ) {
	$product_categories = array_slice( $product_categories, 0, $number );
}

$cat_counter = 0;

$cat_number = count($product_categories);

if ( $product_categories ) : 


if($sc_studi_cats_layout == 'morphing'){
?>
<style>
div#<?php echo $jp_id;?> .owl-dot span{
		background-color:<?php echo $sc_dots_normal_color;?> !important;
	}
	div#<?php echo $jp_id;?> .owl-dot.active span{
		background-color:<?php echo $sc_dots_active_color;?> !important;
	}

</style>
<style>
.edu_cat_3 {
    width: 100%;
    margin-bottom: 25px;
    border-radius: 0.4rem;
    background: #fff;
    padding: 1.5rem 1rem;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all ease 0.4s;
    position: relative;
    z-index: 1;
    overflow: hidden;
    transition: .4s;transform:scale(1.05);
    box-shadow:  0px 0px 20px rgb(0 0 0 / 15%);
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 15%);;
  
}
.edu_cat_icons {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.edu_cat_data {
    padding-right: 15px;
}
.edu_cat_data h4 a{ color:#000 !important ;font-weight:200;}
.edu_cat_data h4 {
    font-size: 17px;
    margin-bottom: 4px;
   
}
ul.edu_cat_meta li {color:#656565 !important;}
ul.edu_cat_meta {
    list-style: none;
    padding: 0;
    margin: 0;
}


.edu_cat_3:hover:before {
    transform: rotate(45deg);
    transform: scale(1.5);
    transition: .4s;
}
.edu_cat_3:hover {
     transition: .4s;transform:scale(1.05);
    box-shadow: 0px 0px 20px rgb(0 0 0 / 20%);
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 20%);
}

.grid_padder{padding:10px;}

button.coursecolor {color:#fff; position: absolute; left: 14px; bottom: 14px; width: 30px; height: 30px; background-color: #DA4D1D; border: none; border-radius: 30px; cursor: pointer; outline: none; transition: all 0.3s ease; }
.edu_cat_3:hover button.coursecolor { transform: translate(20px,-15px) scale(9); }
@media screen and (min-wdth:768px){
.cats_grid_view:not(.owl-carousel) .edu_cat_3:hover { transform: scale(1.2); z-index: 20000; }
}
</style>
<div id="<?php echo $jp_id;?>" class=" cats_grid_view <?php if($sc_studi_cat_carousel){ echo " owl-carousel ";}?>">
     <?php 
     $catNum=1;
     foreach ( $product_categories as $category ) {
         
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_blog_cat_icon', true) ?: $sc_studi_cat_default_image;
        $image = wp_get_attachment_url( $thumbnail_id );
        $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_blog_cat_color', true)?:"var(--primary_color)";
        $studi_cat_type = get_term_meta($category->term_id, 'studi_cat_type', true)?:"st_course";
        if($sc_studi_cat_carousel){ 
            $grid_class = "grid_padder";
        }else{
            $grid_class = "col-md-3 col-xs-12";
        }
        ?>
        <div class="<?php echo $grid_class;?> cat_grid_item">
            <div class="edu_cat_3 cat-<?php echo $catNum;?>" >
                <div class="edu_cat_icons">
					<a class="pic-main" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>">
					    <?php echo wp_get_attachment_image($sc_studi_cat_icon,array('40', '40')); ?>
					    </a>
				</div>
				<div class="edu_cat_data">
									<h4 class="title"><a style="color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,0);?>;" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
									<ul class="edu_cat_meta">
										<li ><?php  //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
										if($studi_cat_type=='st_course'){ echo sprintf( _n( '%s Post', '%s Posts', $category->count, 'studiare' ), $category->count ); }else { echo $category->count." محصول";}
										?>
										</li>
									</ul>
				</div>
           <a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><button class="coursecolor" style="background:<?php echo $sc_studi_cat_color;?>"><?php echo $category->count;?></button></a>
            </div>
        </div>
        <?php
        $catNum++;
     }
        ?>
</div>

<?php if($sc_studi_cat_carousel){ 
$nav = $sc_studi_cats_car_nav ? $sc_studi_cats_car_nav : false;
$dots = $sc_studi_cats_car_dots ? $sc_studi_cats_car_dots : false;

if(empty($nav)){$nav='false';}
if(empty($dots)){$dots='false';}

$dektop_items = $sc_studi_cat_carouseitems_in_desktop ?: 5;
$tablet_items = $sc_studi_cat_carouseitems_in_tablet ?: 3;
$mobile_items = $sc_studi_cat_carouseitems_in_mobile ?: 1;
?>	
<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $jp_id;?>').addClass('owl-carousel owl-rtl owl-theme');
		jQuery('#<?php echo $jp_id;?>').owlCarousel({
                            loop:false,
                            margin:0,
							stagePadding:0,
                            nav:<?php echo $nav;?>,
                            dots:<?php echo $dots;?>,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:<?php echo $mobile_items;?>,
									nav:false,
                                },
                                768:{
                                    items:<?php echo $tablet_items;?>
                                },
                                1000:{
                                    items:<?php echo $dektop_items;?>
                                }
                            }
                        });
	});
</script>
<?php } ?>
<?php }

if($sc_studi_cats_layout == 'remit'){
?>
<style>
div#<?php echo $jp_id;?> .owl-dot span{
		background-color:<?php echo $sc_dots_normal_color;?> !important;
	}
	div#<?php echo $jp_id;?> .owl-dot.active span{
		background-color:<?php echo $sc_dots_active_color;?> !important;
	}

</style>
<style>
.edu_cat_remit {
    width: 100%;
    margin-bottom: 25px;
    border-radius: 0.4rem;
    background: #fff;
    padding: 1.5rem 1rem;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all ease 0.4s;
    position: relative;
    z-index: 1;
    overflow: hidden;
    transition: .4s;transform:scale(1.05);
    box-shadow:  0px 0px 20px rgb(0 0 0 / 15%);
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 15%);;
  
}
.edu_cat_icons {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.edu_cat_data {
    padding-right: 15px;
}
.edu_cat_data h4 a{ color:#000 !important ;font-weight:200;}
.edu_cat_data h4 {
    font-size: 17px;
    margin-bottom: 4px;
   
}
ul.edu_cat_meta li {color:#656565 !important;}
ul.edu_cat_meta {
    list-style: none;
    padding: 0;
    margin: 0;
}



.edu_cat_remit:hover {
     transition: .4s;transform:scale(1.05);
    box-shadow: 0px 0px 20px rgb(0 0 0 / 20%);
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 20%);
}





.edu_cat_remit .edu_cat_icons {
    border-radius: 10px;
    position:relative;
    box-shadow: 5px 5px 0px #efefef;
}
.edu_cat_remit .edu_cat_icons:before {
    position: absolute;
    content: "";
    width: 80px;
    height: 80px;
    right: 0;
    bottom: 0;
    background: #f9f9f9;
    border-radius: 5px;
    transform: rotate(75deg);
    z-index: -1;
}
.grid_padder{padding:10px;}
span.remit_top_icon svg { width: 25px;height: 25px; position: absolute; left: 7px; top: 7px;  }
button.coursecolor {color:#fff; position: absolute; left: 14px; bottom: 14px; width: 30px; height: 30px; background-color: #DA4D1D; border: none; border-radius: 30px; cursor: pointer; outline: none; transition: all 0.3s ease; }
.edu_cat_remit:hover button.coursecolor { transform: translate(20px,-15px) scale(9); }
@media screen and (min-wdth:768px){
.cats_grid_view:not(.owl-carousel) .edu_cat_remit:hover { transform: scale(1.2); z-index: 20000; }
}
</style>
<div id="<?php echo $jp_id;?>" class=" cats_grid_view">
     <?php 
     $catNum=1;
     foreach ( $product_categories as $category ) {
         
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_blog_cat_icon', true) ?: $sc_studi_cat_default_image;
        $image = wp_get_attachment_url( $thumbnail_id );
        $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_blog_cat_color', true)?:"var(--primary_color)";
        $studi_cat_type = get_term_meta($category->term_id, 'studi_cat_type', true)?:"st_course";
        if($sc_studi_cat_carousel){ 
            $grid_class = "grid_padder";
        }else{
            $grid_class = "col-md-3 col-xs-12";
        }
        ?>
        <div class="<?php echo $grid_class;?> cat_grid_item">
            <div class="edu_cat_remit cat-<?php echo $catNum;?>"  >
                <span class='remit_top_icon'>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100" height="100" viewBox="0 0 500 500" xml:space="preserve"> <g transform="matrix(0.78 0 0 0.78 89.5 95.93)" id="K31rKCpp5zmnWh46PV4Yi"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 173.86 96.16)" id="fe06GUS7sSoUN0ePBaoVG"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 258.22 95.71)" id="Ssx7uHCOXs6ND3u0n1rpz"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 341.72 96.16)" id="9nwYGLB0DGipm0O5o538g"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 426.08 95.71)" id="2u3JbBtrtdweDk-iHeg0-"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 89.68 179.9)" id="tFwE4uS2iKNc1bYdczQ_d"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 173.86 179.9)" id="r-OdeojVlYB51y71zbq2y"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 258.22 179.9)" id="2hN3S-t-TtI7vP2LcFMau"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 341.72 179.9)" id="KlFhqmLd1g-1cY7dcZfJl"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 89.68 268.79)" id="ZG00F349E0bMLvw3O532r"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 173.86 268.79)" id="jDAV_46AH84InmP7alU3s"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 258.22 268.79)" id="9m-x16grt0VP0pZRObXna"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 89.68 356.91)" id="As9GAmuJlSzAYeGIsotCa"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 173.86 356.91)" id="i8EwXFhTcmHn_GtGMVuFf"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> <g transform="matrix(0.78 0 0 0.78 89.68 446.23)" id="yqjjj2tHt_zVwKmGl-9h9"  > <path style="stroke: rgb(16,208,91); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(209,209,209); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(0, 0)" d="M 0 -50 C 27.6 -50 50 -27.6 50 0 C 50 27.6 27.6 50 0 50 C -27.6 50 -50 27.6 -50 0 C -50 -27.6 -27.6 -50 0 -50 z" stroke-linecap="round" /> </g> </svg>
                </span>
                <div class="edu_cat_icons" style="background:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,50);?>;">
					<a class="pic-main" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>">
					    <?php echo wp_get_attachment_image($sc_studi_cat_icon,array('40', '40')); ?>
					    </a>
				</div>
				<div class="edu_cat_data">
									<h4 class="title"><a style="color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,0);?>;" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
									<ul class="edu_cat_meta">
										<li ><?php  //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
										if($studi_cat_type=='st_course'){ echo sprintf( _n( '%s Post', '%s Posts', $category->count, 'studiare' ), $category->count ); }else { echo $category->count." محصول";}
										?>
										</li>
									</ul>
				</div>
           
            </div>
        </div>
        <?php
        $catNum++;
     }
        ?>
</div>

<?php if($sc_studi_cat_carousel){ 
$nav = $sc_studi_cats_car_nav ? $sc_studi_cats_car_nav : false;
$dots = $sc_studi_cats_car_dots ? $sc_studi_cats_car_dots : false;

if(empty($nav)){$nav='false';}
if(empty($dots)){$dots='false';}

$dektop_items = $sc_studi_cat_carouseitems_in_desktop ?: 5;
$tablet_items = $sc_studi_cat_carouseitems_in_tablet ?: 3;
$mobile_items = $sc_studi_cat_carouseitems_in_mobile ?: 1;
?>	
<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $jp_id;?>').addClass('owl-carousel owl-rtl owl-theme');
		jQuery('#<?php echo $jp_id;?>').owlCarousel({
                            loop:false,
                            margin:0,
							stagePadding:0,
                            nav:<?php echo $nav;?>,
                            dots:<?php echo $dots;?>,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:<?php echo $mobile_items;?>,
									nav:false,
                                },
                                768:{
                                    items:<?php echo $tablet_items;?>
                                },
                                1000:{
                                    items:<?php echo $dektop_items;?>
                                }
                            }
                        });
	});
</script>
<?php } ?>
<?php }

if($sc_studi_cats_layout == 'default'){
    
 
		?>

    <div class="course-categories">

        <?php foreach ( $product_categories as $category ) {

	        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	        $image = wp_get_attachment_url( $thumbnail_id );
            $cat_class = "";
            $cat_counter++;
$studi_cat_type = get_term_meta($category->term_id, 'studi_cat_type', true)?:"st_course";
            switch ($cat_number) {
                default:
                    if ($cat_counter < 6) {
                        $cat_class = $cat_counter;
                    } else {
                        $cat_class = "default";
                    }
            }

        ?>
        <div class="course-grid-box course_cat_<?php echo esc_attr( $cat_class ); ?>">
            <div class="category-holder">
                <div class="category-holder-inner">
                    <a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>" class="category_link"></a>
                    <span class="category-bg" style="background-image:url(<?php echo esc_url($image); ?>)"></span>
                    <div class="info-on-hover">
                        <h4 class="category-title"><a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
                        <span class="category-count"><?php 
                        //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count ); 
                        if($studi_cat_type=='st_course'){ echo sprintf( _n( '%s Post', '%s Posts', $category->count, 'studiare' ), $category->count ); }else { echo $category->count." محصول";}
                        ?></span>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
<?php }

if($sc_studi_cats_layout == 'material'){
//wp_register_style( 'dummy-handle'.$jp_id, false );
//wp_enqueue_style( 'dummy-handle'.$jp_id );
//wp_add_inline_style( 'dummy-handle'.$jp_id, "* { color: $sc_dots_normal_color; }" );
?>
<style>
div#<?php echo $jp_id;?> .owl-dot span{
		background-color:<?php echo $sc_dots_normal_color;?> !important;
	}
	div#<?php echo $jp_id;?> .owl-dot.active span{
		background-color:<?php echo $sc_dots_active_color;?> !important;
	}

</style>

    <div id="<?php echo $jp_id;?>" class="srow sc_cat_material_layout container ">

        <?php foreach ( $product_categories as $category ) {

	        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
			
			$sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_blog_cat_color', true)?:"var(--primary_color)";
			$sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_blog_cat_icon', true) ?: $sc_studi_cat_default_image;
			
			$studi_cat_type = get_term_meta($category->term_id, 'studi_cat_type', true)?:"st_course";
			
	        $image = wp_get_attachment_url( $thumbnail_id );
            $cat_class = "";
            $cat_counter++;

            switch ($cat_number) {
                default:
                    if ($cat_counter < 6) {
                        $cat_class = $cat_counter;
                    } else {
                        $cat_class = "default";
                    }
            }
        ?>
		<div class="sc_studi_cat_holder col-md-3 ">
        <a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>" class="sc_studi_card sc_studi_main_card"  style="--bg-color:<?php echo $sc_studi_cat_color;?>;--bg-color-light:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,30);?>;--text-color-hover: #4C5656;--box-shadow-color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,-30);?>;">
		<div class="sc_studi_overlay"></div>
		<div class="sc_studi_circle">

<!-- <img style="width:71px;width:76px;" src="<?php echo esc_url(wp_get_attachment_url( $sc_studi_cat_icon )); ?>"> -->
<?php echo wp_get_attachment_image($sc_studi_cat_icon,array('71', '76')); ?>
  </div>
  <div class="sc_studi_cats_info">
	<p><?php echo esc_html($category->name); ?></p>
	<p style="font-size:14px;">[<?php //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
	if($studi_cat_type=='st_course'){ echo sprintf( _n( '%s Post', '%s Posts', $category->count, 'studiare' ), $category->count ); }else { echo $category->count." محصول";}
	?>]</p>
  </div>
</a>
</div>
        <?php } ?>

    </div>
<?php if($sc_studi_cat_carousel){ 
$nav = $sc_studi_cats_car_nav ?: false;
$dots = $sc_studi_cats_car_dots ?: false;

$dektop_items = $sc_studi_cat_carouseitems_in_desktop ?: 5;
$tablet_items = $sc_studi_cat_carouseitems_in_tablet ?: 3;
$mobile_items = $sc_studi_cat_carouseitems_in_mobile ?: 1;
?>

<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $jp_id;?>').addClass('owl-carousel owl-rtl owl-theme');
		jQuery('#<?php echo $jp_id;?>').owlCarousel({
                            loop:false,
                            margin:0,
							stagePadding:0,
                            nav:<?php echo $nav;?>,
                            dots:<?php echo $dots;?>,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:<?php echo $mobile_items;?>,
									nav:false,
                                },
                                768:{
                                    items:<?php echo $tablet_items;?>
                                },
                                1000:{
                                    items:<?php echo $dektop_items;?>
                                }
                            }
                        });
	});
</script>

<?php } ?>		
<?php 

} ?>
<?php 
if($sc_studi_cats_layout == 'grid'){ ?>
<style>
div#<?php echo $jp_id;?> .owl-dot span{
		background-color:<?php echo $sc_dots_normal_color;?> !important;
	}
	div#<?php echo $jp_id;?> .owl-dot.active span{
		background-color:<?php echo $sc_dots_active_color;?> !important;
	}

</style>
<style>
.edu_cat_2 {
    width: 100%;
    margin-bottom: 25px;
    border-radius: 0.4rem;
    background: #f4f5f7;
    padding: 1.5rem 1rem;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all ease 0.4s;
    position: relative;
    z-index: 1;
    overflow: hidden;
}
.edu_cat_icons {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.edu_cat_data {
    padding-right: 15px;
}
.edu_cat_data h4 a{ color:#000 !important ;font-weight:200;}
.edu_cat_data h4 {
    font-size: 17px;
    margin-bottom: 4px;
   
}
ul.edu_cat_meta li {color:#656565 !important;}
ul.edu_cat_meta {
    list-style: none;
    padding: 0;
    margin: 0;
}
.edu_cat_2:before {
    content: "";
    position: absolute;
    right: 0;
    top: 0;
    width: 200%;
    height: 100%;
    background: linear-gradient(45deg, white, transparent);
    background: linear-gradient(45deg, var(--before-color), transparent);
    z-index: -1;
    transform: rotate(4deg);transition: .4s;
}
.edu_cat_2:before {
    content: "";
    position: absolute;
    right: 0;
    top: 0;
    width: 123%;
    height: 79%;
    background: linear-gradient(45deg, white, transparent);
    background: linear-gradient(45deg, var(--before-color), transparent);
    z-index: -1;
    transform: skew(-17deg, 10deg);
    transition: .4s;
    border-radius: 120px;
}
.edu_cat_2:hover:before {
    transform: rotate(45deg);
    transform: scale(1.5);
    transition: .4s;
}
.edu_cat_2:hover, .edu_cat_2:focus {
     transition: .4s;transform:scale(1.05);
    box-shadow: 0px 0px 20px rgba(0,0,0,.075);
    -webkit-box-shadow: 0px 0px 20px rgba(0,0,0,.075);
}
.edu_cat_icons:before {
    width: 64px;
    height: 64px;
    box-sizing: border-box;
    content: '';
    display: block;
    position: absolute;
    top: 33px;
    right: 25px;
    pointer-events: none;
    border: 0px solid var(--button-circle);
    border-radius: 50%;
    -webkit-animation-duration: 1.2s;
    animation-duration: 1.2s;
    -webkit-animation-name: intervalsc_studi_hamburgerBorder;
    animation-name: intervalsc_studi_hamburgerBorder;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    box-shadow: 0 0 5px #fff, 0 0 8px inset #fff;
}
.grid_padder{padding:10px;}
</style>
<div id="<?php echo $jp_id;?>" class="row cats_grid_view">
     <?php 
     $catNum=1;
     foreach ( $product_categories as $category ) {
         
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_blog_cat_icon', true) ?: $sc_studi_cat_default_image;
        $image = wp_get_attachment_url( $thumbnail_id );
        $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_blog_cat_color', true)?:"var(--primary_color)";
        $studi_cat_type = get_term_meta($category->term_id, 'studi_cat_type', true)?:"st_course";
        if($sc_studi_cat_carousel){ 
            $grid_class = "grid_padder";
        }else{
            $grid_class = "col-md-3 col-xs-12";
        }
        ?>
        <div class="<?php echo $grid_class;?> cat_grid_item">
            <div class="edu_cat_2 cat-<?php echo $catNum;?>" style="--before-color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,20);?>;background:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,40);?>">
                <div class="edu_cat_icons">
					<a class="pic-main" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>">
					    <?php echo wp_get_attachment_image($sc_studi_cat_icon,array('40', '40')); ?>
					    </a>
				</div>
				<div class="edu_cat_data">
									<h4 class="title"><a style="color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,0);?>;" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
									<ul class="edu_cat_meta">
										<li ><?php  //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
										if($studi_cat_type=='st_course'){ echo sprintf( _n( '%s Post', '%s Posts', $category->count, 'studiare' ), $category->count ); }else { echo $category->count." محصول";}
										?>
										</li>
									</ul>
				</div>
           
            </div>
        </div>
        <?php
        $catNum++;
     }
        ?>
</div>

<?php if($sc_studi_cat_carousel){ 
$nav = $sc_studi_cats_car_nav ?: false;
$dots = $sc_studi_cats_car_dots ?: false;

$dektop_items = $sc_studi_cat_carouseitems_in_desktop ?: 5;
$tablet_items = $sc_studi_cat_carouseitems_in_tablet ?: 3;
$mobile_items = $sc_studi_cat_carouseitems_in_mobile ?: 1;
?>	
<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $jp_id;?>').addClass('owl-carousel owl-rtl owl-theme');
		jQuery('#<?php echo $jp_id;?>').owlCarousel({
                            loop:false,
                            margin:0,
							stagePadding:0,
                            nav:<?php echo $nav;?>,
                            dots:<?php echo $dots;?>,
							navText: ["<i class='fal fa-arrow-right'></i>","<i class='fal fa-arrow-left'></i>"],
                            responsive:{
                                0:{
                                    items:<?php echo $mobile_items;?>,
									nav:false,
                                },
                                768:{
                                    items:<?php echo $tablet_items;?>
                                },
                                1000:{
                                    items:<?php echo $dektop_items;?>
                                }
                            }
                        });
	});
</script>
<?php } ?>

<?php } ?>
<?php endif;
		 

	}
	
	protected function content_template() {
	    
	    

    }
	
	
}