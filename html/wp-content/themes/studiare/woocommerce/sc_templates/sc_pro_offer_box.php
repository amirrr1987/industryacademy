<?php
/**
 * amazing offer template
 * */
?>
<!-- start sc-amazing-offer -->
<?php
	global $product;
	if( $product->is_on_sale() ) {



		if(!$product->is_type('variable')){$meta_date = get_post_meta( $id, '_sale_price_dates_to', true );}
		else{
			$variation_ids = $product->get_children();

				foreach ( $variation_ids as $key => $variation_id ) {
					$variation = wc_get_product( $variation_id );
					$variation_sale_price = $variation->get_sale_price();
					$variation_sale_date_to = $variation->get_date_on_sale_to();

					if ( ! empty( $variation_sale_price ) && ! empty( $variation_sale_date_to ) ) {
						$meta_date = get_post_meta( $variation_id, '_sale_price_dates_to', true );
					}
				}
			}	
						
			if( empty( $meta_date ) ){		
			}
			else{
						
				$date  = date( 'm/d/Y 23:59', $meta_date );
					
				if( $product->is_on_sale() && ! is_admin() && ! $product->is_type('variable')){
								
					// Get product prices
					$regular_price = (float) $product->get_regular_price(); // Regular price
					$sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

					// "Saving Percentage" calculation and formatting
					$precision = 1; // Max number of decimals
					$sc_saving_pric = $regular_price - $sale_price;
					$sc_english_format_number = number_format($sc_saving_pric);
					$sc_currency_symbol_single = get_woocommerce_currency_symbol();$sc_spce_rpt = str_repeat('&nbsp;', 1) ?>
					
					<div class="product-info-box sc-amazing-offer">
						<div class="sc-amazing-offer-discount"><?php echo $sc_english_format_number;echo $sc_spce_rpt ; echo $sc_currency_symbol_single;?> <?php echo esc_html_e('Discount', 'studiare' ); ?>
						</div>
						<div class="countdown-timer-holder center standard light cdstdire">
						 	<div class="icon sc-amazing-offer-in"><i class="fal fa-clock"></i><?php echo esc_html_e('Time remaining until the end of this special offer', 'studiare' ); ?></div>
						<div class="countdown-item" data-date="<?php echo esc_attr( $date ) ?>"></div>
						</div>
					</div>
					
<?php
				}
				elseif($product->is_type('variable')){
					
					$date="";
					$sc_saving_pric = "";
					$sc_english_format_number = "";
					
				
					foreach ( $variation_ids as $key => $variation_id ) {
						$variation = wc_get_product( $variation_id );
						$variation_reg_price = $variation->get_regular_price();
						$variation_sale_price = $variation->get_sale_price();
						$variation_sale_date_to = $variation->get_date_on_sale_to();

						if ( ! empty( $variation_sale_price ) && ! empty( $variation_sale_date_to ) ) {
														
							$meta_date = get_post_meta( $variation_id, '_sale_price_dates_to', true );
							$date  = date( 'm/d/Y', $meta_date );

							$sc_saving_pric = $variation_reg_price - $variation_sale_price;
							$sc_english_format_number = number_format($sc_saving_pric);
							$sc_currency_symbol_single = get_woocommerce_currency_symbol();$sc_spce_rpt = str_repeat('&nbsp;', 1) ?>
							
							<div class="product-info-box sc-amazing-offer">
								<div class="sc-amazing-offer-discount"><?php echo $sc_english_format_number;echo $sc_spce_rpt ; echo $sc_currency_symbol_single;?> <?php echo esc_html_e('Discount', 'studiare' ); ?>
								</div>
								<?php echo get_the_title($variation_id); ?>
								<div class="countdown-timer-holder center standard light cdstdire">
									<div class="icon sc-amazing-offer-in"><i class="fal fa-clock"></i><?php echo esc_html_e('Time remaining until the end of this special offer', 'studiare' ); ?></div>
								<div class="countdown-item" data-date="<?php echo esc_attr( $date ) ?>"></div>
								</div>
							</div>
							<?php
						}
					}
				}
			}
	}
?>
<!-- end sc-amazing-offer -->