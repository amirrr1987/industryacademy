<?php

    $product_meta_info_top_stuts = codebean_option('product_meta_info_top_stuts');
    if($product_meta_info_top_stuts==1){
    ?>
                <div class="product-info-before-gallery">

                    <?php if ( !empty( $teacher_id ) && $teacher_id != 'no-teacher' ) : ?>
                        <div class="course-author before-gallery-unit">
                            <div class="icon">
                                <i class="fal fa-chalkboard-teacher"></i>
                            </div>
                            <div class="info">
                                <span class="label">
                                    <?php if ( !empty( $teacher_id_2 ) && $teacher_id_2 != 'no-teacher' ){
                                        esc_html_e( 'Teachers', 'studiare' );
                                    }
                                        else { esc_html_e( 'Teacher', 'studiare' );
                                        }
                                    ?>
                                </span>
                                <div class="value">
                                    <a href="<?php echo get_permalink( $teacher_id ); ?>"><?php echo esc_attr( get_the_title( $teacher_id ) ); ?></a>
                                    <?php if ( !empty( $teacher_id_2 ) && $teacher_id_2 != 'no-teacher' ) : esc_html_e( ',', 'studiare' ); ?> <a href="<?php echo get_permalink( $teacher_id_2 ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_2 ) ); ?></a><?php endif; ?>
                                    <?php if ( !empty( $teacher_id_3 ) && $teacher_id_3 != 'no-teacher' ) : esc_html_e( ',', 'studiare' ); ?><a href="<?php echo get_permalink( $teacher_id_3 ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_3 ) ); ?></a><?php endif; ?>
                                    <?php if ( !empty( $teacher_id_4 ) && $teacher_id_4 != 'no-teacher' ) : esc_html_e( 'and', 'studiare' );?><a href="<?php echo get_permalink( $teacher_id_4 ); ?>"><?php echo esc_attr( get_the_title( $teacher_id_4 ) ); ?></a><?php endif; ?>
                                    
                                    </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $product_cats = get_the_terms( get_the_id(), 'product_cat');  ?>

                    <?php if ( !empty( $product_cats ) ) : ?>
                        <div class="course-category before-gallery-unit">
                            <div class="icon">
                                <i class="fal fa-folder-open"></i>
                            </div>
                            <div class="info">
                                <span class="label"><?php esc_html_e( 'Category', 'studiare' ); ?></span>
                                <div class="value">
                                    <?php foreach($product_cats as $product_cat): ?>
                                        <a href="<?php echo get_term_link($product_cat); ?>"><?php echo($product_cat->name.'<span>/</span>'); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

	                <?php $comments_num = get_comments_number(get_the_id()); ?>
                    
                        <div class="course-rating before-gallery-unit ">
													<div class="icon">
													    <?php 
                        /**since v 12.7 **/
                        
                        $product_stars = true;
                        if ( class_exists('Redux')) {
                            $product_stars = codebean_option("product_stars");
                        }
                        if($product_stars==true){
                            $st_icon = '';
                        }else{
                            $st_icon = '<i class="fal fa-star"></i>';
                        }
                        ?>
															<?php echo $st_icon; ?>
													</div>
                            <?php woocommerce_template_loop_rating(); ?>
                        </div>


                </div>
<?php } ?>