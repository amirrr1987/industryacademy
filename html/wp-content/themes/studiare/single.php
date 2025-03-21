<?php
/**
 * The template for displaying all single posts
 */

get_header();

$blog_sidebar = 'right';
$post_nav = true;

if ( class_exists('Redux') ) {
	$blog_sidebar = codebean_option('single_sidebar_position');
	$post_nav = codebean_option('blog_navigation');
	
	$sticky_blog_sidebar = codebean_option('sticky_blog_sidebar');
}

$sidebar_position = isset($_GET['sidebar']) ? $_GET['sidebar'] : $blog_sidebar;

$blog_container_classes = array('blog-archive');

if ( $sidebar_position == 'left' || $sidebar_position == 'right' ) {
	$blog_container_classes[] = 'has-sidebar';
}

if ( $sidebar_position == 'left' ) {
	$blog_container_classes[] = 'sidebar-left';
} elseif ( $sidebar_position == 'right' ) {
	$blog_container_classes[] = 'sidebar-right';
}

?>

<div class="main-page-content default-margin" id="content">

	<div class="site-content-inner container" role="main">

		<div class="<?php echo esc_attr( implode( ' ', $blog_container_classes ) ); ?>">

			<div class="blog-main-loop">

                <div class="blog-loop-inner post-single">

				    <?php get_template_part( '/inc/templates/blog/single' ); ?>

                </div>

				<?php if ( $post_nav ) {
					do_action( 'studiare_post_nav' );
				} ?>

				<?php if ( comments_open() || get_comments_number() ) : ?>
                    <!-- start #comments -->
					<?php comments_template('', true); ?>
                    <!-- end #comments -->
				<?php endif; ?>

			</div> <!-- end .blog-main-loop -->

			<?php if ( $sidebar_position !== 'none' ) : 
			
		
			if($sticky_blog_sidebar=='1'){$sticky='sticky-sidebar';}else{$sticky='';}
			?>
				<aside class="main-sidebar-holder <?php echo $sticky;?>">
				    <?php
					if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	 get_sidebar();
}
?>
<div class="sidebar-widgets-wrapper">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
				</aside>
			<?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>
