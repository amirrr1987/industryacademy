<?php
/**
 * Template for displaying search forms in Studiare
 */
?>
<?php if(1==2){?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'studiare' ) ?></span>
	<input type="search" class="search-field"
	       placeholder="<?php echo esc_attr__( 'Enter keyword...', 'studiare' ) ?>"
	       value="<?php echo get_search_query() ?>" name="s"
	       title="<?php echo esc_attr__( 'Search for:', 'studiare' ) ?>" />
	<button type="submit" class="search-submit"><?php get_template_part('/assets/images/search-icon.svg'); ?></button>
</form>
<?php } ?>

<?php
// Define the post types you want to allow searching
    $post_types = ['post'=>__("Post","studiare"), 'product'=>__("Product","studiare"), 'page'=>__("Page","studiare"), 'tp_event'=>__("Event","studiare")];
    if ( class_exists('Redux')) {
        $post_types_arr = codebean_option("sp_post_types");
        if($post_types_arr['enabled']){$post_types = $post_types_arr['enabled'];unset($post_types['placebo']);}
    }
    
    $selected_post_types =  array(); // Default to all post types if none selected
    if (isset($_GET['s']) ) {
    $selected_post_types = isset($_GET['post_types']) ? (array) $_GET['post_types'] : array_keys($post_types); // Default to all post types if none selected
    }
    
    ?>
<form class="search-form" method="GET"  action="<?php echo home_url( '/' ); ?>"> 
        <div class="sas_form">
            <span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'studiare' ) ?></span>
            <input type="search" class="search-field" id="s" name="s" placeholder="<?php echo esc_html__('Enter keyword...', 'studiare');?>" value="<?php echo get_search_query() ?>"  title="<?php echo esc_attr__( 'Search for:', 'studiare' ) ?>"/>
            <button type="submit" class="search-submit"><?php get_template_part('/assets/images/search-icon.svg'); ?></button>
        </div>
        
        <?php if(1==2){?>
        <div class="sas_ptypes">
        <label><?php echo esc_html__('Search in:', 'studiare'); ?></label>
        <?php foreach ($post_types as $type=>$val): ?>
            <label>
            <input type="checkbox" name="post_types[]" value="<?php echo esc_attr($type); ?>" 
                <?php checked(in_array($type, (array) (isset($_GET['post_types']) ? $_GET['post_types'] : $selected_post_types))); ?>
            /> <?php echo esc_html(ucfirst($val)); ?></label>
        <?php endforeach; ?>
        </div>
        <?php }?>
        
    </form>