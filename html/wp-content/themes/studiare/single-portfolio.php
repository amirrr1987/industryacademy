<?php
/**
 * Default Single Portfolio Post Template
 */

$post_nav = true;

if ( class_exists('Redux' ) ) {
    $post_nav = codebean_option('portfolio_nav');
}

get_header(); ?>

<div class="main-page-content default-margin" id="content">
	<div class="site-content-inner container" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
<?php $f_image = codebean_option('portfolio_featured_image'); 
if($f_image){
?>	
<div class="sc_studi_portfolio_f_image"><?php the_post_thumbnail('full'); ?></div>
<?php } ?>
			<div class="portfolio-single-wrapper">
				<div class="portfolio-single-inner">
					<?php the_content(); ?>
				</div>

				<?php if ( $post_nav ) {
					do_action( 'studiare_post_nav' );
				} ?>
			</div>

		<?php endwhile; ?>

	</div>
</div>

<?php get_footer(); ?>