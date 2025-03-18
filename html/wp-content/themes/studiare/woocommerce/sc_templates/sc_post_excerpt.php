<?php
		$mycontent_post = get_post(get_the_ID());
		$my_excerpt = $mycontent_post->post_excerpt;
		if( $my_excerpt != null){ ?>
            <div class="product-single-content" id="sc-product-single-excerpt">
               <?php echo $my_excerpt; ?>
            </div>
<?php } ?>