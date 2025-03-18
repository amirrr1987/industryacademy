<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}

add_filter( 'excerpt_length', 'studiare_product_custom_excerpt_length', 999 );

// Custom Meta
$sale_price = $product->get_sale_price();
$regular_price = $product->get_regular_price();
$prefix = '_studiare_';
$teacher_id = get_post_meta( get_the_ID(), $prefix . 'course_teacher', true );
$teacher_id_2 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_2', true );
$teacher_id_3 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_3', true );
$teacher_id_4 = get_post_meta( get_the_ID(), $prefix . 'course_teacher_4', true );
$stock = get_post_meta( get_the_ID(), '_stock', true );
$duration = get_post_meta(get_the_ID(), $prefix . 'course_duration', true);
$duration_hint = get_post_meta(get_the_ID(), $prefix . 'course_duration_hint', true)?:"مدت زمان آموزش";
$sc_course_type_selector = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_selector', true);
$sc_course_type_title_1 = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_title_1', true);
$sc_course_type_title_2 = get_post_meta(get_the_ID(), $prefix . 'sc_course_type_title_2', true);
?>
<div <?php wc_product_class( 'course-item' ); ?>>

<!--    --><?php //do_action( 'woocommerce_before_shop_loop_item' );

?>
<?php 
/* get product category color */
$product_category_border = codebean_option('product_category_border');
if($product_category_border==1){
    $term_list = wp_get_post_terms(get_the_ID(),'product_cat',array('fields'=>'ids'));
    if($term_list){
    $cat_id = (int)$term_list[0];
    $sc_studi_cat_color = !empty(get_term_meta($cat_id , 'sc_studi_cat_color', true))?get_term_meta($cat_id , 'sc_studi_cat_color', true):"#26a69a";
    
    $borderStyle ="style='border-bottom:4px solid $sc_studi_cat_color !important;'";
    }else{$borderStyle ="";}

}else{$borderStyle ="";}

				
				?>
    <div class="course-item-inner " <?php echo $borderStyle; ?>	>

	    <?php if ( has_post_thumbnail( ) ) : ?>
            <div class="course-thumbnail-holder">
			<?php sc_studi_add_discount();// show discount by suncode ?>
			<?php sc_studi_add_comingsoon_badge();// show comingsoon by suncode ?>
			<?php sc_studi_add_full_capacity_badge();// show full capacity by suncode ?>
                <?php woocommerce_template_loop_product_link_open(); ?>
                    <span class="image-item">
                        <?php 
                        $image_size = codebean_option("shop_pro_image_size"); //studiare-course-thumb
                        the_post_thumbnail($image_size, array('class'=>'img-fluid')); ?>
                    </span>
                    
                    <?php 
                    //global $product;
                    $sc_shop_page_addtocart = codebean_option('sc_shop_page_addtocart');
                    $current_user = wp_get_current_user();
                    if($current_user){
                        if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product->get_id() )) {
                            $addtocartinshopOK = "false";
                        }else{
                            $addtocartinshopOK = "true"; 
                        }
                    }else{$addtocartinshopOK = "true";}
                    
                    /** since v 12.5 **/
                    if( $sc_shop_page_addtocart==1){  //$addtocartinshopOK=="true" &&
                        if($product->is_purchasable()  && $addtocartinshopOK=="true" && $product->is_in_stock()){
                            
                            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="studi_add_in_shop %s product_type_%s ajax_add_to_cart">%s</a>',
                                    esc_url( $product->add_to_cart_url() ),
                                    esc_attr( $product->get_id() ),
                                    esc_attr( $product->get_sku() ),
                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                    esc_attr( $product->get_type() ),
                                    //esc_html( $product->add_to_cart_text() )
                                    "<i class='fal fa-shopping-basket'></i>" 
                                ),
                            $product );
                            
                        }else{
                            
                            echo '<a href="'.get_permalink().'" rel="nofollow"  class="studi_add_in_shop "><i class="fal fa-shopping-basket"></i></a>';
                            
                              
                        }
                    }
?>    
                    
										<?php $sc_shop_page_qv = codebean_option('sc_shop_page_qv');$sc_shop_page_aw = codebean_option('sc_shop_page_aw'); if( ($sc_shop_page_qv==1) || ($sc_shop_page_aw==1)){ ?>
										<div class="sc-buttons-sq-sw">
					<?php $sc_shop_page_qv = codebean_option('sc_shop_page_qv'); if($sc_shop_page_qv==1){ ?>
                    <?php 
                    if ( shortcode_exists( 'woosq' ) ) {
                    echo do_shortcode( '[woosq]' ); 
                    }
                    ?>
										<?php } ?>
										<?php $sc_shop_page_aw = codebean_option('sc_shop_page_aw'); if($sc_shop_page_aw==1){ ?>
                    <?php 
                    if ( shortcode_exists( 'woosw' ) ) {
                    echo do_shortcode( '[woosw]' ); 
                    }
                    ?>
										<?php } ?>
									</div>
									<?php } ?>
                <?php woocommerce_template_loop_product_link_close(); ?>
            </div>
	    <?php endif; ?>

        <div class="course-content-holder sc_equal_height_item">

            <div class="course-content-main">
            
                <h4 class="course-title">
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h4>
                	<?php if ( $sc_course_type_selector==2 ) : ?>
				<div class="course-loop-element__course-type course-loop-element__course-type--onsite"><?php echo esc_html($sc_course_type_title_2); ?></div>
				<?php endif; ?>
				<?php if ( $sc_course_type_selector==1 ) : ?>
				<div class="course-loop-element__course-type course-loop-element__course-type--online"><?php echo esc_html($sc_course_type_title_1); ?></div>
				<?php endif; ?>
	            <?php $comments_num = get_comments_number(get_the_id()); ?>

                    <div class="course-rating-teacher">
                        <?php 
                        $product_stars = true;
                        $show_stars = true;
                        $archive_teacher_view = 'list';
                        if ( class_exists('Redux')) {
                            $product_stars = codebean_option("product_stars");
                            $show_stars = codebean_option("product_rating_view");
                            $archive_teacher_view = codebean_option("archive_teacher_view");
                        }
                        if($product_stars==true){
                            $st_icon = '';
                        }else{
                            $st_icon = '<i class="fal fa-star"></i>';
                        }
                        ?>
                        <?php if($show_stars==true){ ?>
                        <div class="sc-rating"><?php echo $st_icon;?><?php woocommerce_template_loop_rating(); ?></div>
                        <?php } ?>
                        <?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' && $archive_teacher_view == 'list' ) : ?>
                        <div class="sc-teacher">  <i class="fal fa-chalkboard-teacher"></i>
                        <a href="<?php echo esc_url( get_the_permalink( $teacher_id ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_html_e('View Profile', 'studiare' ); ?>"><?php echo esc_attr( get_the_title( $teacher_id ) ); ?></a>
                        <?php if ( !empty( $teacher_id_2 ) && $teacher_id_2 != 'no-teacher' ) : esc_html_e( ',', 'studiare' ); ?>
                        <a href="<?php echo esc_url( get_the_permalink( $teacher_id_2 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_html_e('View Profile', 'studiare' ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_2 ) ); ?></a>
                        <?php endif; ?>
                        <?php if ( !empty( $teacher_id_3 ) && $teacher_id_3 != 'no-teacher' ) : esc_html_e( ',', 'studiare' ); ?>
                        <a href="<?php echo esc_url( get_the_permalink( $teacher_id_3 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_html_e('View Profile', 'studiare' ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_3 ) ); ?></a>
                        <?php endif; ?>
                        <?php if ( !empty( $teacher_id_4 ) && $teacher_id_4 != 'no-teacher' ) : esc_html_e( 'and', 'studiare' ); ?>
                        <a href="<?php echo esc_url( get_the_permalink( $teacher_id_4 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_html_e('View Profile', 'studiare' ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_4 ) ); ?></a>
                        <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                         <?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' && $archive_teacher_view == 'avatar') : ?> 
                        <div class="sc-teacher teacher-avatar" >
                         <?php $teacher_image = get_the_post_thumbnail_url($teacher_id,'thumbnail'); ?>
                         <a target="_blank" href="<?php echo esc_url( get_the_permalink( $teacher_id ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo  esc_attr( get_the_title( $teacher_id ) ); ?>" ><img src="<?php echo $teacher_image;?>">  </a>
                         <?php if ( !empty( $teacher_id_2 ) && $teacher_id_2 != 'no-teacher' ) : ?>
                        <?php $teacher_image_2 = get_the_post_thumbnail_url($teacher_id_2,'thumbnail'); ?>
                         <a target="_blank" href="<?php echo esc_url( get_the_permalink( $teacher_id_2 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_attr( get_the_title( $teacher_id_2 ) ); ?>" ><img src="<?php echo $teacher_image_2;?>">  </a>
                         <?php endif; ?>
                         <?php if ( !empty( $teacher_id_3 ) && $teacher_id_3 != 'no-teacher' ) : ?>
                         <?php $teacher_image_3 = get_the_post_thumbnail_url($teacher_id_3,'thumbnail'); ?>
                         <a target="_blank" href="<?php echo esc_url( get_the_permalink( $teacher_id_3 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_attr( get_the_title( $teacher_id_3 ) ); ?>" ><img src="<?php echo $teacher_image_3;?>">  </a>
                         <?php endif; ?>
                         <?php if ( !empty( $teacher_id_4 ) && $teacher_id_4 != 'no-teacher' ) : ?>
                         <?php $teacher_image_4 = get_the_post_thumbnail_url($teacher_id_4,'thumbnail'); ?>
                         <a target="_blank" href="<?php echo esc_url( get_the_permalink( $teacher_id_4 ) ); ?>" class="course-loop-teacher hint--top-right" aria-label="<?php echo esc_attr( get_the_title( $teacher_id_4 ) ); ?>" ><img src="<?php echo $teacher_image_4;?>">  </a>
                         <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php //endif; ?>
                <?php
                 $product_descr_shop_page = codebean_option('product_descr_shop_page');
    if($product_descr_shop_page==1){
    ?>
    <?php if ( has_excerpt() ) { ?>
                <div class="course-description">
	                <?php 
	                if (!function_exists('vc_is_inline') || !vc_is_inline()) {
	                //the_excerpt(); 
	                echo get_the_excerpt();
	                }
	                ?>
	                <?php //echo substr(apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ),0,1); ?>
									<?php //echo substr( strip_tags( the_excerpt() ), 0, 200 ); ?>
                </div>
                 <?php } ?>
                  <?php } ?>
            </div>
                        <?php 
						$show_main_feature = codebean_option('product_sc_loop_main_feature');
						if ($show_main_feature ){ 
							
						$prefix = '_studiare_';
						$sc_loop_main_feature      = get_post_meta( get_the_ID(), $prefix . 'sc_loop_main_feature', true );
						$sc_loop_main_feature_hint = get_post_meta( get_the_ID(), $prefix . 'sc_loop_main_feature_hint', true );
						$sc_loop_main_feature_icon = get_post_meta( get_the_ID(), $prefix . 'sc_loop_main_feature_icon', true );
						if(!empty($sc_loop_main_feature) && !empty($sc_loop_main_feature_hint) && !empty($sc_loop_main_feature_icon)){
							?>
						<div class="course-content-mid">
						<div class="course-info-unit-time hint--top" aria-label="<?php echo esc_html($sc_loop_main_feature_hint); ?>">
								<div class="value"><i class="<?php echo substr($sc_loop_main_feature_icon, 0, 3)." ".substr($sc_loop_main_feature_icon, 3);?>"></i> <?php echo esc_html($sc_loop_main_feature); ?></div>
						</div>
					    </div>
						<?php
						}elseif(!empty($duration)){
							?>
						<div class="course-content-mid">
						<div class="course-info-unit-time hint--top" aria-label="<?php echo esc_html($duration_hint); ?>">
								<div class="value"><i class="fal fa-clock"></i> <?php echo esc_html($duration); ?></div>
						</div>
					    </div>
						<?php
						}
						
					     } ?>
				 
            <div class="course-content-bottom" >
						  		<?php	$product_danshjou_icon_view = codebean_option('product_danshjou_icon_view');
 									if($product_danshjou_icon_view==1){
		$danshjou_icon = codebean_option('danshjou_icon');
		//$course_buyers_text      = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text', true)?:"دانشجو";
		$course_buyers_text_hint = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text_hint', true)?:"تعداد دانشجویان";
		$course_buyers_text_icon = get_post_meta(get_the_ID(), $prefix . 'course_buyers_text_icon', true)?:"fal fa-users";
		if(!empty($course_buyers_text_icon)){$danshjou_icon = substr($course_buyers_text_icon, 0, 3)." ".substr($course_buyers_text_icon, 3);}else{$danshjou_icon = codebean_option('danshjou_icon');}
 									?>
	              <div class="course-students hint--top-left" aria-label="<?php echo $course_buyers_text_hint;?>">
						<?php	
		
						?>
                                    <i class=" <?php echo $danshjou_icon ?>"></i><span><?php $count = get_post_meta(get_the_ID(),'total_sales', true); $text = sprintf( _n( '%s', '%s', $count, 'wpdocs_textdomain' ), number_format_i18n($count));echo $text;  ?>
                                </div>
								<?php } ?>
                <div class="course-price">
									<?php
									/** add by javad
									if( $product->is_type( 'simple' ) ) {
										$sc_reg_price  = $product->get_regular_price();
										$sc_sale_price = $product->get_sale_price();
										//echo "reg price is: $sc_reg_price and sale price is: $sc_sale_price";
									}elseif( $product->is_type( 'variable' )){
										$sc_reg_price_0 = $product->get_variation_price('min');
										$sc_reg_price = number_format($sc_reg_price_0);
										echo esc_attr( 	$sc_reg_price.get_woocommerce_currency_symbol() );
									}else{

									}
										**/
									?>
<?php $sc_spce_rpt = str_repeat('&nbsp;', 1) ;

if ( !empty( $sale_price ) && $sale_price != '0' ) : 
$regular_price=number_format($regular_price); 
$sale_price=number_format($sale_price); 
?>
<span class="sc_reg_onsale_price"><?php echo esc_attr( $regular_price ); ?></span>  <span class="price-sale Mhint--top-right" aria-label="<?php //echo esc_attr( $regular_price.$sc_spce_rpt.get_woocommerce_currency_symbol() ); ?>"><?php echo  $sale_price.$sc_spce_rpt.get_woocommerce_currency_symbol() ; ?></span>
<?php 
	elseif(!empty( $regular_price )   && $sale_price === '0'):
?>
                        <span class="sc_reg_onsale_price"><?php echo  $regular_price=number_format($regular_price).$sc_spce_rpt.get_woocommerce_currency_symbol()  ; ?></span>  <span class="price-sale Mhint--top-right" aria-label="<?php //echo esc_attr( $regular_price.$sc_spce_rpt.get_woocommerce_currency_symbol() ); ?>"><?php echo esc_html_e('Free Course!', 'studiare' ); ?></span>
                        <?php 
	elseif( !isset($regular_price)):
?>
<span class="amount"> <?php echo esc_html__( 'Call for price', 'studiare' ) ?></span>
                    <?php 	
					
					elseif( !empty( $regular_price ) && $regular_price != '0' ) : $regular_price=number_format($regular_price); ?>
                        <span><?php echo  $regular_price.$sc_spce_rpt.get_woocommerce_currency_symbol() ; ?></span>
										<?php	elseif( $product->is_type( 'variable' )):
													$sc_reg_price = $product->get_variation_price('min');
													$sc_reg_price_max = $product->get_variation_price('max');
													$sc_reg_price_max = number_format($sc_reg_price_max);
													$sc_reg_price = number_format($sc_reg_price); ?>
												<span class="hint--top-right" aria-label="<?php echo esc_html_e('Select Options', 'studiare' ); ?>"><?php	echo  	$sc_reg_price.$sc_spce_rpt."-".$sc_spce_rpt.$sc_reg_price_max.$sc_spce_rpt.get_woocommerce_currency_symbol(); ?></span>
                    <?php 
                    elseif($regular_price == '0'):
                        ?>
                        <span class="price-free"><?php esc_html_e('Free Course!', 'studiare' ); ?></span>
                        <?php
                    else : 
                     if(codebean_option('free_or_call_for_price')){
                    ?>
                        <span class="price-free"><?php esc_html_e('Free Course!', 'studiare' ); ?></span>
                    <?php 
                     }else{
		               echo '<span class="amount">' . esc_html__( 'Call for price', 'studiare' ) . '</span>';
		        }
                    endif; ?>
                </div>


            </div>

        </div>

    </div>
</div>