<?php

// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );
if ( class_exists( 'WooCommerce' ) ) {
ob_start();
$jp_id = rand(1,1000);
$jp_id = "studi_soc_".$jp_id;
?>
<style>
    
    
    <?php
    if($buy_btn_color){
        echo "#".$jp_id." .soc_buy_btn{background:$buy_btn_color;}";
    }
    if($sc_dots_normal_color){
         echo "#".$jp_id.".studi_special_offer_holder .owl-dot span{background-color:$sc_dots_normal_color;}";
    }
    if($sc_dots_active_color){
         echo "#".$jp_id.".studi_special_offer_holder .owl-dot.active span{background-color:$sc_dots_active_color;}";
    }
    ?>
</style>
<?php
if($icon){$btn_icon = $icon;}else{$btn_icon = "fal fa-shopping-basket";}
if($buy_btn_color){$btnTitle = $buy_btn_title;}else{$btnTitle = "خرید";}
// Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

$sales_ids = wc_get_product_ids_on_sale();

$onsale_with_date_array = array();
foreach($sales_ids as $pro_id){
    //$sales_price_from = get_post_meta( $pro_id, '_sale_price_dates_from', true );
    $sales_price_to   = get_post_meta( $pro_id, '_sale_price_dates_to', true );
    if($sales_price_to){
        $onsale_with_date_array[] = $pro_id;
    }
}
if($onsale_with_date_array){
    $html = "<div id='$jp_id' class='studi_special_offer_holder owl-carousel'>";
    foreach($onsale_with_date_array as $id){
        $sales_price_to   = get_post_meta( $id, '_sale_price_dates_to', true );
        $sales_price_to =  date('Y-m-d H:i:s',$sales_price_to);
        
        $regul_price   = get_post_meta( $id, '_regular_price', true );
        $sales_price   = get_post_meta( $id, '_sale_price', true );
        $price_sym = get_woocommerce_currency_symbol();
        $price_html="<div class='scoPriceHtml'><span class='sco_regp'>$regul_price</span><span class='sco_salep'>$sales_price</span><span class='sco_currency'>$price_sym</span></div>";
        $offPercent = round(100-(($sales_price/$regul_price)*100))."%";
        $title = get_the_title($id);
        $link = get_permalink($id);
        
        $post = get_post( $id );
        $excerpt = $post->post_excerpt;
        
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
        $html .= "<div data-offpercent='$offPercent' class='prosale_holder '><div class='prosale_image col-md-4 col-xs-12'><img src='$image[0]' style='width:100%;height:200px;'></div><div class='prosale_data col-md-8 col-xs-12'><h2><a href='$link'>$title</a></h2><div class='col-md-8'>$price_html<div class='sco_excerpt'>$excerpt</div></div><div class='col-md-4'><div id='pro_$id' data-proid='pro_$id'  data-enddate='$sales_price_to'  class='proTimer'></div><a class='soc_buy_btn' href='$link'><i class='$icon'></i> $btnTitle</a></div></div></div>";
    }
    $html .="</div>";
}else{
    $html = "<div class='studi_special_offer_holder'>";
    $html .= "<div>محصولی یافت نشد</div>";
    $html .="</div>";
}

echo $html;
?>
<script>
    jQuery(document).ready(function(){
                 jQuery('.studi_special_offer_holder.owl-carousel').each(
                    function(){
                        
                        jQuery(this).owlCarousel({
                            loop:false,
                            margin:0,
                            nav:false,
                            dots:true,
							loop:false,
							autoplay:true,
							items:1,
							autoplayHoverPause:true,
							navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
                        });
                    }
                );
                
                 
    });
    jQuery('.proTimer').each(
                    function(){
                      
                        var enddate = jQuery(this).data("enddate");
                        var proid = jQuery(this).data("proid");
                        
                       setInterval(function() { studi_soc_pro_timer(proid,enddate); }, 1000);	 
                         
                     
                        
                    }
                );
    function studi_soc_pro_timer(proid,enddate){
        var endTime = new Date(enddate);			
            			endTime = (Date.parse(endTime) / 1000);
            
            			var now = new Date();
            			now = (Date.parse(now) / 1000);
            
            			var timeLeft = endTime - now;
            
            			var days = Math.floor(timeLeft / 86400); 
            			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
              
            			if (hours < "10") { hours = "0" + hours; }
            			if (minutes < "10") { minutes = "0" + minutes; }
            			if (seconds < "10") { seconds = "0" + seconds; }
            			var output = "<div class='offdays'>"+days + "<span>روز</span></div>"+"<div class='offhours'>"+hours + "<span>ساعت</span></div>"+"<div class='offminutes'>"+minutes + "<span>دقیقه</span></div>"+"<div class='offseconds'>"+seconds + "<span>ثانیه</span></div>";
            			 jQuery("#"+proid).html(output); 
    }
</script>




<?php
return ob_get_clean();
}
?>