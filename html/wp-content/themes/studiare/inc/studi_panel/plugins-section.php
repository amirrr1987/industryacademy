<?php
//hi

if (!class_exists('TGMPA_List_Table')) {
    return;
}

$plugin_table = new TGMPA_List_Table();

wp_clean_plugins_cache(false);

?>
<h2 class="studiare-headline"><?php _e( 'Plugins', 'studiare' ); ?></h2>
<div class="o-notice gray">
	<div class="holder">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path></svg>
		<?php _e( 'List of Useful Plugins for Studiare Theme', 'studiare' ); ?>
		</div>
	<a href="https://docs.studiaretheme.ir/tuts/setting-up/required-plugins/" target="_blank" class="btn"><?php _e( 'More Information', 'studiare' ); ?></a>
</div>
<div class="stdr-tgmpa_dashboard tgmpa studipnl_content">

    <?php $plugin_table->prepare_items(); ?>

    <?php $plugin_table->views(); ?>

    <form id="tgmpa-plugins" action="<?php echo esc_url(admin_url( 'themes.php?page=tgmpa-install-plugins' )); ?>" method="post">
        <input type="hidden" name="tgmpa-page" value="tgmpa-install-plugins" />
        <input type="hidden" name="plugin_status" value="<?php echo esc_attr( $plugin_table->view_context ); ?>" />
        <?php $plugin_table->display(); ?>
    </form>
</div>
