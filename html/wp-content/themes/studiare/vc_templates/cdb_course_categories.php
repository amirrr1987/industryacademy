<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );
$jp_id = rand(1,1000);
$jp_id = "jpcarousel".$jp_id;
$hide_empty = ( $hide_empty == true && $hide_empty == 1 ) ? 1 : 0;


$args = array(
    //'orderby'    => 'title',
    //'meta_key'   => 'order',
    //'orderby'    => 'meta_value_num',
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'pad_counts' => true,
    'exclude' => $exclude_cats,
);
if($orderby=='menu_order'){
    $args['meta_key'] ='order';
    $args['orderby'] ='meta_value_num';
}else{
     $args['orderby'] ='title';
}

$product_categories = get_terms( 'product_cat', $args );

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
<div id="<?php echo $jp_id;?>" class="row cats_grid_view">
     <?php 
     $catNum=1;
     foreach ( $product_categories as $category ) {
         
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_cat_icon', true) ?: $sc_studi_cat_default_image;
        $image = wp_get_attachment_url( $thumbnail_id );
        $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_cat_color', true)?:"#26a69a";
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
					<a class="pic-main" href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>">
					    <?php echo wp_get_attachment_image($sc_studi_cat_icon,array('40', '40')); ?>
					    </a>
				</div>
				<div class="edu_cat_data">
									<h4 class="title"><a style="color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,0);?>;" href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
									<ul class="edu_cat_meta">
										<li ><?php  //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
										if($studi_cat_type=='st_course'){ echo $category->count." دوره"; }else { echo $category->count." محصول";}
										?>
										</li>
									</ul>
				</div>
           <a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>"><button class="coursecolor" style="background:<?php echo $sc_studi_cat_color;?>"><?php echo $category->count;?></button></a>
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
							navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
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
                    <a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" class="category_link"></a>
                    <span class="category-bg" style="background-image:url(<?php echo esc_url($image); ?>)"></span>
                    <div class="info-on-hover">
                        <h4 class="category-title"><a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
                        <span class="category-count"><?php 
                        //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count ); 
                        if($studi_cat_type=='st_course'){ echo $category->count." دوره"; }else { echo $category->count." محصول";}
                        ?></span>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
<?php }

if($sc_studi_cats_layout == 'material'){
?>
<style>
div#<?php echo $jp_id;?> .owl-dot span{
		background-color:<?php echo $sc_dots_normal_color;?> !important;
	}
	div#<?php echo $jp_id;?> .owl-dot.active span{
		background-color:<?php echo $sc_dots_active_color;?> !important;
	}

</style>
    <div id="<?php echo $jp_id;?>" class="srow sc_cat_material_layout ">

        <?php foreach ( $product_categories as $category ) {

	        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
			
			$sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_cat_color', true)?:"#26a69a";
			$sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_cat_icon', true) ?: $sc_studi_cat_default_image;
			
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
		<div class="sc_studi_cat_holder wpb_column vc_column_container vc_col-sm-3">
        <a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" class="sc_studi_card sc_studi_main_card"  style="--bg-color:<?php echo $sc_studi_cat_color;?>;--bg-color-light:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,30);?>;--text-color-hover: #4C5656;--box-shadow-color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,-30);?>;">
		<div class="sc_studi_overlay"></div>
		<div class="sc_studi_circle">

<!-- <img style="width:71px;width:76px;" src="<?php echo esc_url(wp_get_attachment_url( $sc_studi_cat_icon )); ?>"> -->
<?php echo wp_get_attachment_image($sc_studi_cat_icon,array('71', '76')); ?>
  </div>
  <div class="sc_studi_cats_info">
	<p><?php echo esc_html($category->name); ?></p>
	<p style="font-size:14px;">[<?php //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
	if($studi_cat_type=='st_course'){ echo $category->count." دوره"; }else { echo $category->count." محصول";}
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
							navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
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
        $sc_studi_cat_icon = get_term_meta($category->term_id, 'sc_studi_cat_icon', true) ?: $sc_studi_cat_default_image;
        $image = wp_get_attachment_url( $thumbnail_id );
        $sc_studi_cat_color = get_term_meta($category->term_id, 'sc_studi_cat_color', true)?:"#26a69a";
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
					<a class="pic-main" href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>">
					    <?php echo wp_get_attachment_image($sc_studi_cat_icon,array('40', '40')); ?>
					    </a>
				</div>
				<div class="edu_cat_data">
									<h4 class="title"><a style="color:<?php echo sc_studi_darken_lighten_color($sc_studi_cat_color,0);?>;" href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>"><?php echo esc_html($category->name); ?></a></h4>
									<ul class="edu_cat_meta">
										<li ><?php  //echo sprintf( _n( '%s Course', '%s Courses', $category->count, 'studiare' ), $category->count );
										if($studi_cat_type=='st_course'){ echo $category->count." دوره"; }else { echo $category->count." محصول";}
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
							navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
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
<?php endif; ?>