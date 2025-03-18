<?php
/**
 * The Sidebar containing the main widget areas.
 *
 */
if ( ! is_active_sidebar( 'singleshop' ) ) {
	return;
}
?>

<div class="product-info-box singleshop">
	<div class="sidebar-widgets-wrapper">
		<?php if ( ! dynamic_sidebar( 'singleshop' ) ) :
			dynamic_sidebar( 'singleshop' );
		endif; ?>
	</div>
</div>
