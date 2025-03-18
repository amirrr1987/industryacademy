<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$average      = $product->get_average_rating();
$average_number = $average;
$class = null;

$vote_title = sprintf( esc_html__( '%s Votes', 'studiare' ), $rating_count );

if ( $rating_count > 0 ) {
	$title = sprintf( esc_html__( 'Rated %s out of 5', 'studiare' ), $average );
	$class = 'has-ratings';
} else {
	$title = esc_html__( 'Not yet rated', 'studiare' );
	$average = esc_html__( 'No Votes', 'studiare' );
	$class = 'no-ratings';
} 


/**since v 12.5 **/
                        
                        $product_stars = true;
                        if ( class_exists('Redux')) {
                            $product_stars = codebean_option("product_stars");
                        }
                        
?>

<?php if($product_stars!=true){ ?>
<div class=" star-rating <?php echo esc_attr( $class ); ?> hint--top-left" aria-label="<?php echo esc_attr( $title ); ?>">
	<span style="width:<?php echo ( ( $average_number / 5 ) * 100 ); ?>%">
		<span class="rating"><?php echo esc_html( $average ); ?></span>
		<span class="votes-number"><?php echo esc_html( $vote_title ); ?></span>
	</span>
</div>
<?php }else{ ?>
<?php //echo wc_get_rating_html( $product->get_average_rating() ); ?>
<!-- new model -->
<div  class="hint--top-left" aria-label="<?php echo esc_attr( $title ); ?>">
    <div class="studistarrating">
        <span class="stratingamount" style="width: <?php echo ( ( $average_number / 5 ) * 100 ); ?>%;">
            <span class="rating"><?php echo esc_html( $average ); ?></span>
    		<span class="votes-number"><?php echo esc_html( $vote_title ); ?></span>
        </span>
    </div>
</div>
<?php } ?>