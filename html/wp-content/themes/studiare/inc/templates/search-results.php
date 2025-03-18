<?php
/**
 * Page template for search results
 */
?>
<?php if(1==2){?>
<div class="main-page-content default-margin" id="content">
    <div class="site-content-inner container" role="main">
        <div class="search-results-wrapper">

            <div class="search-results-main">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="search-result-box">
                        
                        <div class="result-thumbnail">
                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('studiare-search-thumbnail'); ?>
                                <?php else : ?>
                                    <?php $no_img_src = get_template_directory_uri() . "/assets/images/no-image.jpg"; ?>
                                    <img width="220" height="220" src="<?php echo esc_url( $no_img_src ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        
                        <div class="search-content">
                            <h3 class="result-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo strip_shortcodes( get_the_excerpt() ); ?></p>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php esc_html_e( 'Read More', 'studiare' ); ?></a>
                        </div>
                    </div>
                <?php endwhile;

                    echo paginate_links( array(
                        'type'      => 'list',
                        'prev_text' => '<i class="fa fa-angle-left"></i>',
                        'next_text' => '<i class="fa fa-angle-right"></i>',
                    ) );

                else :

                    get_template_part( '/inc/templates/not-found' );

                endif; ?>
            </div>

            <aside class="main-sidebar-holder">
                <?php //get_sidebar(); ?>
            </aside>

        </div>
    </div>
</div>
<?php } ?>



<style>
        .studiare_advanced_search { padding: 20px; box-shadow: 0 0 10px gainsboro; border-radius: 10px; margin: 20px 0; }
        .sas_form input[type="submit"] { margin-right: 10px; }
        .sas_ptypes { display: flex ;  margin-top: 25px; }
        .sas_ptypes label { display: flex ; align-items: center; }
        .sas_ptypes label input { margin: 0 10px !important; }
        .sas_form { display: flex ; justify-content: space-between; }
        ul.sas_rholder { margin: 0; }
        ul.sas_rholder li { margin: 10px ; padding: 10px; border-radius: 5px; border: 1px solid var(--primary_color); position: relative; overflow: hidden;display: inline-flex ; justify-content: space-between; width: calc(33% - 20px);}
        img.sas_img { max-width: 80px; border-radius: 5px; box-shadow: -4px 4px #3f3d4112; }
        ul.sas_rholder li a { display: flex ; align-items: center; z-index: 1; position: relative;width: 100%;}
        .sas_pagination { text-align: center; }
        .sas_pagination .page-numbers { border: 1px solid gainsboro; padding: 3px; margin: 0 2px; min-width: 36px; display: inline-block; border-radius: 3px; }
        .sas_pagination .page-numbers.current, .sas_pagination .page-numbers:hover { background: var(--primary_color); color: #fff; border-color: var(--primary_color); }
        ul.sas_rholder li:hover .sas_image-container { transform: skewX(-10deg); }
        .sasr_title{transition:.4s;}
        i.sas_read { position: absolute; bottom: 20px; left: 45px; transition: .4s; background: var(--primary_color); padding: 10px 14px; border-radius: 138px; color: #fff; transform: skewX(10deg); }
        ul.sas_rholder li:hover i.sas_read { left: -100%;  }
        ul.sas_rholder li:hover .sasr_title{transform: translate(8px, -10px);}
        .sasr_bg { position: absolute; left: 0; top: 0; bottom: 0; right: 0; background-repeat: no-repeat !important; background-size: cover !important; filter: blur(15px); opacity: .05;z-index:0; background-position: center !important;}
        @media screen and (max-width:1000px){ul.sas_rholder li { width: 100%; }}
        .sas_image-container { position: relative; display: inline-block;    padding: 10px;transition:.4s; }
        .sas_border-image { display: block; max-width: 100px; position: relative; z-index: 1; border-radius: 5px; }
        .sas_border-overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-size: cover; background-blur: 5px; filter: blur(10px); pointer-events: none; z-index: 0; opacity: 0.3; }
        
        .stas_filters { text-align: center; }
        .sas_filterby.sasf_active { background: var(--primary_color); color: #fff; }
        .sas_filterby { border: 1px solid var(--primary_color); border-radius: 3px; min-width: 50px; margin: 0 5px; text-align: center; padding: 0 5px; display: inline-block; color: var(--primary_color); }
        .search ul.page-numbers { margin: 20px 0; } 
    </style>
<div class="main-page-content default-margin" id="content">
    <div class="site-content-inner container" role="main">
        <div class="studiare-search-results-wrapper">

            <div class="search-results-main">    
<?php
    get_template_part( 'searchform' );
    $sp_result_perpage = "9";
    
    // Define the post types you want to allow searching
    $post_types = ['post'=>__("Post","studiare"), 'product'=>__("Product","studiare"), 'page'=>__("Page","studiare"), 'tp_event'=>__("Event","studiare")];
    if ( class_exists('Redux')) {
        $post_types_arr = codebean_option("sp_post_types");
        if($post_types_arr['enabled']){$post_types = $post_types_arr['enabled'];unset($post_types['placebo']);}
        $sp_result_perpage = codebean_option("sp_result_perpage");
    }
    // Get current page number
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // Check if there is a search query
    if (isset($_GET['s']) && !empty($_GET['s'])) {
        $search_query = sanitize_text_field($_GET['s']);
        $selected_post_types = isset($_GET['post_types']) ? (array) $_GET['post_types'] : array_keys($post_types); // Default to all post types if none selected
        
        // Ensure we only search selected post types
        $args = [
            'post_type' => $selected_post_types,
            's' => $search_query,
            'posts_per_page' => $sp_result_perpage, // Adjust according to your needs
            'paged' => $paged,
        ];
        $query = new WP_Query($args);

        // Display results
        if ($query->have_posts()) {
            echo "<div class='studiare_advanced_search'>";
            $nfr = $query->found_posts;
            $nfr = sprintf(__("%s Results Found.","studiare"),$nfr);
            echo '<h2>' . esc_html__('Search Results:', 'studiare') . '</h2>'.$nfr;
            
            echo "<div class='stas_filters'>";
                echo "<a href='#' class='sas_filterby sasf_active' data-sas_filter='all'> ".__('All','studiare')." </a>";
            foreach($post_types as $p=>$v){
                echo "<a href='#' class='sas_filterby' data-sas_filter='$p'> $v </a>";
            }
            
            echo "</div>";
            echo '<hr><ul class="sas_rholder">';
            while ($query->have_posts()) {
                $query->the_post();
                if (has_post_thumbnail()) {
                    $image = get_the_post_thumbnail_url( null, 'thumbnail' );
                }else{
                    $image = get_template_directory_uri()."/assets/images/no-image.jpg";
                }
                echo '<li class="sas_result" data-sasptype="'.esc_html(get_post_type()).'">';
                echo '<div class="sasr_bg" style="background:url('.$image.')"></div>';
                //echo '<a href="' . esc_url(get_permalink()) . '"><img class="sas_img" src="'.$image.'">  ' . esc_html(get_the_title()) . '</a>';
                echo '<a href="' . esc_url(get_permalink()) . '"><div class="sas_image-container"> <i class="sas_read fal fa-chevron-left"></i> <img src="'.$image.'" alt="" class="sas_border-image"> <div style="background-image:url('.$image.')" class="sas_border-overlay"></div> </div> <span class="sasr_title"> ' . esc_html(get_the_title()) . '</span></a>';
                echo '</li>';
            }
            echo '</ul>';
            
            // Pagination
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1) {
                echo '<div class="">';
                echo paginate_links(array(
                    'total' => $total_pages,
                    'current' => $paged,
                    'format' => '?s=' . urlencode($search_query) . '&paged=%#%', // Preserve the search query and add paged parameter
                    //'add_args' => array('s'=>urlencode($search_query),'post_types' => $selected_post_types), // Add selected post types to pagination links
                    'add_args' => array('s'=>urlencode($search_query)), // Add selected post types to pagination links
                    'type'      => 'list',
                        'prev_text' => '<i class="fa fa-angle-left"></i>',
                        'next_text' => '<i class="fa fa-angle-right"></i>',
                ));
                echo '</div>';
            }
            
            echo '</div>';
        } else{
            get_template_part( '/inc/templates/not-found' );
        }

        // Reset post data
       // wp_reset_postdata();
    }    
?>
</div>

</div>
</div>
</div>

<?php
add_action("wp_footer","studi_search_filter");
function studi_search_filter(){
    ?>
    <script>
        jQuery(document).ready(function($){
            $(".sas_filterby").click(function(a){
                a.preventDefault();
                var filter = $(this).data('sas_filter');
                $(".sas_filterby").removeClass("sasf_active");
                $(this).addClass("sasf_active");
                
                $(".sas_result").each(function() {
                    if ($(this).data("sasptype") == filter || filter == "all") { 
                        $(this).show(); // Show the element if it matches the filter
                    } else {
                        $(this).hide(); // Hide the element if it doesn't match
                    }
                });
            });
        });
    </script>
    <?php
}

