<?php
/**
 * Page template for list style on blog
 */
?>
<div class="blog-loop-inner blog-masonry blog-loop-view-list">
<?php 
if ( class_exists( 'Redux' ) ) {
        $cat_description_position = codebean_option('place_of_discriptions_of_cats_blog', 'bottom');
}
 $cat_description = category_description();
    if ( $cat_description ) {
        if ( $cat_description_position === 'top' ) {
        the_archive_description( '<div class="post studi-taxonomy-description"><div class="post-inner">', '</div></div>' ); 
        }
    }
?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( '/inc/templates/blog/list-postbit' );

	endwhile; else :

		get_template_part( '/inc/templates/not-found' );

	endif; 
	
    if ( $cat_description_position === 'bottom' && $cat_description ) {
    the_archive_description( '<div class="post studi-taxonomy-description"><div class="post-inner">', '</div></div>' ); 
    }

	
	?>

</div>

<?php echo paginate_links( array(
	'type'      => 'list',
	'prev_text' => '<i class="fa fa-angle-left"></i>',
	'next_text' => '<i class="fa fa-angle-right"></i>',
) ); ?>