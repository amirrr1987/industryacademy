<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 9.0.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;

$prefix = '_studiare_';

$course_video = get_post_meta(get_the_ID(), $prefix . 'course_video', true);

// begin aparat video
$aparat_video_file= null;
$course_video_aparat = get_post_meta(get_the_ID(), $prefix . 'course_video_aparat', true);
if($course_video_aparat){
    $aparat_video_file = studi_get_aparat_file_link($course_video_aparat);
}
//end aparat video;

$thumb_image_size = 'shop_single';

$post_thumbnail_id = $product->get_image_id();//get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
/**$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
) );**/
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="product-image-wrapper">
		<?php

		

		if ( has_post_thumbnail() ) {
		    $attributes = array(
			'title'                   => $image_title,
			'data-src'                => $full_size_image[0]
		);
			$html = get_the_post_thumbnail( $post->ID, 'full', $attributes );
		} else {
			$html  = sprintf( '<img src="%s" alt="%s" data-src="%s" data-large_image="%s" data-large_image_width="800" data-large_image_height="600" class="attachment-shop_single size-shop_single wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'studiare' ), esc_url( wc_placeholder_img_src() ), esc_url( wc_placeholder_img_src() ) );
        }

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); ?>

		<?php if ( $course_video || $aparat_video_file ) : ?>
		<?php if($aparat_video_file){$course_video = $aparat_video_file;}
		
		?>
		<video id="studi_course_video_holder" width="100%" controls style="display:none;" >
		       
            <source id="studi_course_video" src="<?php echo esc_url( $course_video ); ?>" type="video/mp4">
                 <?php echo __('مرورگر شما از HTML5 پشتیبانی نمی کند.','studiare'); ?>
            </video>
        <div class="video-button hint--top" aria-label="<?php esc_html_e( 'Intro Video', 'studiare' ); ?>">
            <div class="studi_play_video"><svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#fff" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path> </svg></div>
        </div>
		<?php endif; ?>

        <?php do_action( 'woocommerce_product_thumbnails' ); ?>
	</div>
</div>
<script>
jQuery(".studi_play_video").click(function(){
	jQuery(".product-image-wrapper .wp-post-image").hide();
	jQuery(this).hide();
	jQuery("#studi_course_video_holder").show();
	 video = document.getElementById('studi_course_video_holder');
	 video.play();
});
</script>