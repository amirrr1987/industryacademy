<?php
/**
 * studiare single product content
 * created date 1399-06-06
 * author: Javad Pourshahabadi
 * @suncode
 **/
?>

						<?php
				    $product_single_sc_message = codebean_option('product_single_sc_message');
				    $sale_price = $product->get_sale_price();
                    $regular_price = $product->get_regular_price();
				    if($product_single_sc_message==1 && !empty( $regular_price ) || $product_single_sc_message==1  && $sale_price === '0' ){
				        
				        //since version 12.6
				        $sc_sections_off = array();
				        $prefix = '_studiare_'	;
    	                $sc_sections_off = get_post_meta( get_the_ID(), $prefix . 'sc_sections_off', false );
    	                if(!in_array('discount_message',$sc_sections_off)){
    	        
    	    
				        
				    ?>
						<div class="sc-single-product-message">
						<span class="sc-amazing-offer-final-price-icon"> <i class="fal fa-gift"></i> </span>
						<?php $product_single_sc_message_0 = codebean_option('product_single_sc_message_0'); ?>
						<?php echo do_shortcode($product_single_sc_message_0); ?>

						</div>
					<?php 
					}
					} ?>
 
						<?php $product_single_sc_single_navbar = codebean_option('product_single_sc_single_navbar'); if($product_single_sc_single_navbar==1){ ?>
						<nav class="sc_single_navbar">
							<ul>
								<li>
									<a href="javascript:void(0);" onclick="jQuery('html, body').animate({scrollTop: jQuery('#sc-product-single-content').offset().top - 70}, 2000);"><?php _e('Description', 'studiare'); ?></a>
								</li>
								<li>
									<a href="javascript:void(0);" onclick="jQuery('html, body').animate({scrollTop: jQuery('#sc-product-reviews').offset().top - 70}, 2000);"><?php _e('User Reviews', 'studiare'); ?></a>
								</li><li>
									<a href="javascript:void(0);" onclick="jQuery('html, body').animate({scrollTop: jQuery('#reviews').offset().top - 70}, 2000);"><?php _e('Comments', 'studiare'); ?></a>
								</li>
							</ul>
						</nav>
						<?php } ?>
			
			
			<?php 
			$studi_readmore_in_pro = codebean_option("studi_readmore_in_pro");
			if($studi_readmore_in_pro==1){$has_readmore="pro_has_readmore";}else{$has_readmore="";}
			?>
            <div class="product-single-content <?php echo $has_readmore;?>" id="sc-product-single-content">
                <div class="studi_pro_content_holder">
                    <?php the_content(); ?>
                </div>
                <?php 
                $readmoreTxt   = codebean_option("readmore_open_txt");
                $readmoreClose = codebean_option("readmore_close_txt");
                if($studi_readmore_in_pro==1){
                    echo "<div data-opentag='$readmoreTxt'  data-closetag='$readmoreClose' class='studi_pro_readmore_holder'>$readmoreTxt</div>";
                    ?>
                <script>
                jQuery(document).ready(function(){
                    jQuery('.studi_pro_readmore_holder').click(function($){
                        jQuery("#sc-product-single-content").toggleClass("pro_has_readmore");
                        var readOpen  = jQuery('.studi_pro_readmore_holder').data("opentag");
                        var readClose = jQuery('.studi_pro_readmore_holder').data("closetag");
                        if(jQuery("#sc-product-single-content").hasClass("pro_has_readmore")){
                            jQuery('.studi_pro_readmore_holder').html(readOpen);
                        }else{
                            jQuery('.studi_pro_readmore_holder').html(readClose);
                        }
                    });
                });    
                </script>    
                    
                
                <?php } ?>
            </div>
		
           
            
 

