<?php
/**
 * Page template for grid style on blog
 */

$blog_grid_columns = 'two';

if ( class_exists('Redux') ) {
    $blog_grid_columns = codebean_option('blog_grid_columns');
    $cat_description_position = codebean_option('place_of_discriptions_of_cats_blog', 'bottom');
}

$blog_cols = isset($_GET['blog_columns']) ? $_GET['blog_columns'] : $blog_grid_columns;

$cat_description = category_description();
    if ( $cat_description ) {
        if ( $cat_description_position === 'top' ) {
        the_archive_description( '<div class="post studi-taxonomy-description term-description"><div class="post-inner">', '</div></div>' ); 
        }
    }

?>
<div class="blog-loop-inner blog-masonry blog-loop-view-grid <?php echo esc_attr( $blog_cols ); ?>-columns">

	<?php 
	
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( '/inc/templates/blog/grid-postbit' );

	endwhile; else :

		get_template_part( '/inc/templates/not-found' );

	endif; 

	?>
</div>

<?php echo paginate_links( array(
	'type'      => 'list',
	'prev_text' => '<i class="fa fa-angle-left"></i>',
	'next_text' => '<i class="fa fa-angle-right"></i>',
) ); ?>

<?php if ( $cat_description_position === 'bottom' && $cat_description ) {
    the_archive_description( '<div class="post studi-taxonomy-description term-description"><div class="post-inner">', '</div></div>' ); 
    }
?>