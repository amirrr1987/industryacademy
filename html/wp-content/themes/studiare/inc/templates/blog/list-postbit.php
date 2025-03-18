<?php



$vars = $wp_query->query_vars;

$categories = get_the_category();
if ( class_exists('Redux') ) {
    $blog_show_date = codebean_option('blog_show_date');
    $blog_show_author = codebean_option('blog_show_author');
    $blog_show_excerpt = codebean_option('blog_show_excerpt');
    $blog_show_categories = codebean_option('blog_show_categories');
    $blog_list_image_size = codebean_option('blog_list_image_size')?:"full";
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php // echo get_the_post_thumbnail( get_the_ID(), '$blog_list_image_size', array('class' => 'img-fluid') ); ?>
                    <?php
					the_post_thumbnail($blog_list_image_size, array('class'=>'img-fluid'));
					?>
                </a>
            </div>
        <?php endif; ?>

        <div class="post-content">
            <?php if ( $blog_show_categories ) : ?>
            <div class="post-meta post-category">
	            <?php if ( ! empty( $categories ) ) {
		            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
	            } ?>
            </div>
            <?php endif; ?>
            <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php if ( $blog_show_excerpt ) : ?>
	        <div class="the-excerpt">
		        <?php the_excerpt(); ?>
            </div>
            <?php endif; ?>
            <?php if ( $blog_show_date ) : ?>
            <div class="post-meta date">
                <span>
                    <i class="fal fa-calendar-alt"></i>
                    <?php echo get_the_date(); ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if ( $blog_show_author ) : ?>
            <div class="post-meta author">
                  <i class="fal fa-user"></i>
	            <?php esc_html_e('Posted by', 'studiare'); ?>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
