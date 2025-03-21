<?php
/**
 * Template for top bar header
 */

$prefix = '_studiare_';

$topbar_display = get_post_meta( get_the_ID(), $prefix . 'top_bar_off', true );
$topbar_left_text = '';
$topbar_display_opt = true;
$topbar_color = 'light';
$top_bar_phone = '';
$top_bar_email = '';

if ( class_exists('Redux') ) {
	$topbar_left_text = codebean_option( 'topbar_text' );
	$topbar_display_opt = codebean_option( 'topbar_display_opt' );
	$topbar_color = codebean_option( 'topbar_color' );
	$top_bar_phone = codebean_option( 'top_bar_phone' );
	$top_bar_phone_link = codebean_option( 'top_bar_phone_link' );
	$top_bar_email = codebean_option( 'top_bar_email' );
	$top_bar_email_link = codebean_option( 'top_bar_email_link' );
}
?>
<?php if ( $topbar_display_opt && !$topbar_display ) : ?>
<div class="top-bar top-bar-color-<?php echo esc_attr( $topbar_color ); ?>">
    <div class="container">
        <div class="row">
            <div class="top-bar-col">

                <?php if ( $top_bar_phone || $top_bar_email ) : ?>
                    <ul class="top-bar-contact-info">
	                    <?php if( $top_bar_phone ){ ?>
                            <li> <?php if( $top_bar_phone_link ){ ?><a href="tel:<?php echo esc_html( $top_bar_phone ); ?>"> <?php } ?><i class="fal fa-phone"></i> <?php echo esc_html( $top_bar_phone ); ?></a></li>
	                    <?php } ?>
	                    <?php if( $top_bar_email ){ ?>
                            <li><?php if( $top_bar_email_link ){ ?><a href="mailto:<?php echo esc_html( $top_bar_email ); ?>"><?php } ?><i class="fal fa-envelope"></i> <?php echo esc_html( $top_bar_email ); ?></a></li>
	                    <?php } ?>
                    </ul>
                <?php endif; ?>

            </div>
            <div class="top-bar-col top-bar-right">
                <?php get_template_part( 'inc/templates/header/top-bar-links' ); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
