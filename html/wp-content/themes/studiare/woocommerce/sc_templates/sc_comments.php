<?php 
?>
<div class="product-reviews" id="sc-product-reviews">

                <div class="product-review-title">
                    <h3 class="inner"><i class="fal fa-comments-alt"></i><?php esc_html_e( 'Reviews', 'studiare' ); ?></h3>
                </div>

                <div class="product-reviews-inner">
                <?php
                    if($rating_enabled == 'yes'):
                        $product = wc_get_product(get_the_id());
                        $rating_count = $product->get_rating_count();
                        $average      = $product->get_average_rating();
                        $average = round($average, 1); ?>
                        <div class="product-reviews-stats">
                            <!-- Averate Rating -->
                            <div class="average-rating">
                                <p class="rating-subtitle"><?php esc_html_e('Average Rating', 'studiare');?></p>
                                <div class="avareage-rating-inner">
                                    <div class="average-rating-number"><?php echo esc_attr($average); ?></div>
                                    <div class="average-rating-stars">
                                        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                                    </div>
                                    <div class="average-rating-label">
                                        <?php echo esc_attr($rating_count.' '.esc_html__('Ratings', 'studiare')); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Ratings-->
                            <?php
                            // WP_Comment_Query arguments
                            $args = array (
                                'status'         => 'approve',
                                'type'           => 'review',
                                'post_id'        => get_the_id(),
                            );

                            // The Comment Query
                            $woo_reviews = new WP_Comment_Query;
                            $comments = $woo_reviews->query( $args );

                            $rate1 = $rate2 = $rate3 = $rate4 = $rate5 = 0;
                            // The Comment Loop
                            if ( $comments ) {
                                foreach ( $comments as $comment ) {
                                    $rate = get_comment_meta($comment->comment_ID, 'rating', true);
                                    switch($rate) {
                                        case 1:
                                            $rate1++;
                                            break;
                                        case 2:
                                            $rate2++;
                                            break;
                                        case 3:
                                            $rate3++;
                                            break;
                                        case 4:
                                            $rate4++;
                                            break;
                                        case 5:
                                            $rate5++;
                                            break;
                                    } // switch
                                }
                            }
                            $rates = array('5'=>$rate5,'4'=>$rate4,'3'=>$rate3,'2'=>$rate2,'1'=>$rate1);
                            ?>
                            <div class="detailed-ratings">
                                <p class="rating-subtitle"><?php esc_html_e('Detailed Rating', 'studiare');?></p>
                                <div class="detailed-ratings-inner">
	                                <?php foreach($rates as $key => $rate): ?>
		                                <?php
		                                if($rate !=0 or $rating_count != 0) {
			                                $fill_value = round($rate*100/$rating_count, 2);
		                                } else {
			                                $fill_value = 0;
		                                }
		                                ?>
                                        <div class="course-rating">
                                            <span class="number"><?php echo esc_attr($key.' '.__('Stars', 'studiare')); ?></span>
                                            <div class="bar">
                                                <div class="bar-fill" style="width:<?php echo esc_attr($fill_value); ?>%"></div>
                                            </div>
                                            <span class="counter"><?php echo esc_attr($rate); ?></span>
                                        </div>
	                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( comments_open() || get_comments_number() ): ?>
                        <?php comments_template(); ?>
                    <?php endif; ?>

                </div>
               
            </div>