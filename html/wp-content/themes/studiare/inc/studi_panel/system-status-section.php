<div class="studiare_panel_holder">
    <style>
        .o-notice { -webkit-box-shadow: none; box-shadow: none; border: none; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 14px 1rem; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; -webkit-box-pack: justify; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; color: rgba(17, 16, 19, 0.75); border-left: 5px solid #3D84FC; background-color: #d9e7fe; min-height: 50px; font-size: 15px; line-height: 1.5; border-radius: 0.35rem; }
        .studipnl_content table { width: 100%; }
        .studiare_panel_holder .table-col-2 td:nth-child(1), .studiare_panel_holder .table-col-3 td:nth-child(1) { width: 40%; }
        .studiare_panel_holder .table-col-3 td:nth-child(2), .studiare_panel_holder .table-col-3 td:nth-child(3) { width: 25%; }
        .studiare_panel_holder .table-col-2 td:nth-child(2) { width: 50%; }
        .studiare_panel_holder .table-col-2 mark.yes:before, .studiare_panel_holder .table-col-2 mark.active:before, .studiare_panel_holder .table-col-2 mark.no:before, .studiare_panel_holder .table-col-3 mark.yes:before, .studiare_panel_holder .table-col-3 mark.active:before, .studiare_panel_holder .table-col-3 mark.no:before { content: ""; background-color: rgba(22, 21, 25, 0.75); height: 8px; width: 8px; margin-right: 10px; -webkit-box-shadow: 0 0 0 4px rgba(22, 21, 25, 0.25); box-shadow: 0 0 0 4px rgba(22, 21, 25, 0.25); border-radius: 50%; }
        .studiare_panel_holder .table-col-2 mark, .studiare_panel_holder .table-col-3 mark { display: -webkit-inline-box; display: -webkit-inline-flex; display: -ms-inline-flexbox; display: inline-flex; -webkit-box-pack: center; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; vertical-align: middle; margin-left: 3px; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .rtl .studiare_panel_holder .table-col-2 mark.yes:before, .rtl .studiare_panel_holder .table-col-2 mark.active:before, .rtl .studiare_panel_holder .table-col-2 mark.no:before, .rtl .studiare_panel_holder .table-col-3 mark.yes:before, .rtl .studiare_panel_holder .table-col-3 mark.active:before, .rtl .studiare_panel_holder .table-col-3 mark.no:before { margin-left: 10px; margin-right: 0; }
        .studiare_panel_holder .table-col-2 td span, .studiare_panel_holder .table-col-3 td span { color: #9690a2; }
        .studiare_panel_holder .table-col-2 mark.no, .studiare_panel_holder .table-col-2 mark.no + span, .studiare_panel_holder .table-col-3 mark.no, .studiare_panel_holder .table-col-3 mark.no + span { color: #dc2828; }
        .studiare_panel_holder .table-col-2 mark.no:before, .studiare_panel_holder .table-col-3 mark.no:before { background-color: #dc2828; -webkit-box-shadow: 0 0 0 4px rgba(220, 40, 40, 0.3); box-shadow: 0 0 0 4px rgba(220, 40, 40, 0.3); }
        .rtl .studiare_panel_holder .table-col-2 mark.yes:before, .rtl .studiare_panel_holder .table-col-2 mark.active:before, .rtl .studiare_panel_holder .table-col-2 mark.no:before, .rtl .studiare_panel_holder .table-col-3 mark.yes:before, .rtl .studiare_panel_holder .table-col-3 mark.active:before, .rtl .studiare_panel_holder .table-col-3 mark.no:before { margin-left: 10px; margin-right: 0; }
        .ui-button.btn.btn-flat, a.btn.btn-flat, .btn.btn-flat { background-color: rgba(150, 144, 162, 0.15); border-color: transparent; color: #111013; }
        .ui-button.btn.btn-flat:hover, a.btn.btn-flat:hover, .btn.btn-flat:hover { background-color: #3D84FC; border-color: #3D84FC; color: #fff; }
        .studiare_panel_holder mark { padding: 3px 8px 3px 5px; text-transform: uppercase; font-size: 11px; font-weight: 600; display: -webkit-inline-box; display: -webkit-inline-flex; display: -ms-inline-flexbox; display: inline-flex; background-color: rgba(150, 144, 162, 0.15); margin-top: -2px; border-radius: 0.35rem; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .studiare_panel_holder mark.no { background-color: rgba(220, 40, 40, 0.18); }
        .ui-button.btn, a.btn, .btn { padding: 0px 0.55rem; font-size: 14px; background-color: #3D84FC; border: 1px solid #3D84FC; color: #fff; min-height: 30px; line-height: 1; display: -webkit-inline-box; display: -webkit-inline-flex; display: -ms-inline-flexbox; display: inline-flex; -webkit-transition-duration: .2s; -o-transition-duration: .2s; transition-duration: .2s; -webkit-box-shadow: none; box-shadow: none; cursor: pointer; text-decoration: none; font-weight: 500; -webkit-box-sizing: border-box; box-sizing: border-box; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; border-radius: 0.25rem; -webkit-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; -o-transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; transition: all cubic-bezier(0.645, 0.045, 0.355, 1) 0.35s; }
        .studiare_panel_holder-headline { -webkit-box-pack: justify; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; border-bottom: 1px solid rgba(142, 135, 155, 0.15); min-height: 60px; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
        .o-notice.o-notice-system-status .system-report { margin-top: 1rem; width: 100%; border: 2px solid transparent; min-height: 30vh; background-color: rgba(255, 255, 255, 0.5); color: rgba(17, 16, 19, 0.7); padding: 1rem; border-radius: 0.35rem; }
        .o-notice.o-notice-system-status { -webkit-flex-wrap: wrap; -ms-flex-wrap: wrap; flex-wrap: wrap; }
        .o-notice.o-notice-system-status textarea#system-report { direction: ltr; }
    </style>
    <script>
    jQuery(document).ready('#get-system-report').on('click', '.o-notice.o-notice-system-status', function(e) {
            e.preventDefault();

            const systemReportContent = document.getElementById('system-report');
            systemReportContent.setAttribute('style', '');
            systemReportContent.focus();
            systemReportContent.select();
        });
    </script>
    
<h2 class="studiare-headline"><?php _e( 'System Status', 'studiare' ); ?></h2>

<div class="o-notice o-notice-system-status">
	<div class="holder">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path></svg> <?php _e( 'Please copy and paste this information in your ticket when contacting support:', 'studiare' ); ?>
	</div>
	<a id="get-system-report" href="#" class="btn"><?php _e( 'Get System Report', 'studiare' ); ?></a>
	<textarea id="system-report" style="display: none;" class="system-report" readonly><?php 
			// WordPress information
			$wp_version = get_bloginfo('version');
			$wp_language = get_bloginfo('language');
			$wp_charset = get_bloginfo('charset');
			$wp_debug_mode = WP_DEBUG ? 'Enabled' : 'Disabled';
			$home_url = home_url();
			$site_url = site_url();
			$wp_path = ABSPATH;
			$wp_content_path = WP_CONTENT_DIR;

			// Theme information
			$theme = wp_get_theme();
			$child_theme = is_child_theme() ? 'Yes' : 'No';
			$theme_directory = get_stylesheet_directory();
			$theme_name = $theme->get('Name');
			$theme_version = $theme->get('Version');
			$theme_author = $theme->get('Author');
			//$has_license_code = !!get_option( 'studiare_license_code' ) ? 'Yes' : 'No';

			// Plugins information
			$plugins = get_plugins();
			$active_plugins = get_option('active_plugins');
			$plugin_info = array();
			foreach ($plugins as $plugin_path => $plugin_data) {
				$status = in_array($plugin_path, $active_plugins) ? 'Active' : 'Inactive';
				$plugin_info[] = "{$plugin_data['Name']} (v{$plugin_data['Version']}) by {$plugin_data['Author']} - {$status}";
			}
			$plugin_list = implode("\n", $plugin_info);
			
			// Server environment
			$php_version = phpversion();
			$server_software = $_SERVER['SERVER_SOFTWARE'];
			$mysql_version = $GLOBALS['wpdb']->get_var('SELECT VERSION() AS version');
			$php_time_limit = ini_get('max_execution_time');
			$php_input_vars = ini_get('max_input_vars');
			$php_memory_limit = ini_get('memory_limit');
			$php_max_upload_size = ini_get('upload_max_filesize');
			$file_upload_permission = is_writable(WP_CONTENT_DIR . '/uploads') ? 'Writable' : 'Not writable';
			$https = is_ssl() ? 'Yes' : 'No';

			$data = array(
				"WordPress Information:",
				"Version: $wp_version",
				"Language: $wp_language",
				"Charset: $wp_charset",
				"Debug mode: $wp_debug_mode",
				"Home URL: $home_url",
				"Site URL: $site_url",
				"WordPress Path: $wp_path",
				"WordPress Content Path: $wp_content_path",
				"",
				"Theme Information:",
				"Name: $theme_name",
				"Version: $theme_version",
				"Author: $theme_author",
				"Child Theme: $child_theme",
				"Theme Directory: $theme_directory",
				//"Is theme activated: $has_license_code",
				"",
				"Plugins Information:",
				$plugin_list,
				"",
				"Server Environment:",
				"PHP Version: $php_version",
				"Server Software: $server_software",
				"MySQL Version: $mysql_version",
				"PHP Time Limit: $php_time_limit",
				"PHP Input Vars: $php_input_vars",
				"PHP Memory Limit: $php_memory_limit",
				"PHP Max Upload Size: $php_max_upload_size",
				"File Upload Permission: $file_upload_permission",
				"HTTPS: $https"
			);

			$output = implode("\n", $data);
			echo $output;
		?>
	</textarea>
</div>

<!-- Group 2cl -->
<div class="studipnl_content">
	<div class="studiare_panel_holder-headline">
		<h3><?php _e( 'Theme Info', 'studiare' ); ?></h3>
	</div>
	<table class="studiare-group-details studiare-group-table table-col-3">
		<tbody>
			<tr>
				<td><?php _e( 'Directive', 'studiare' ); ?></td>
				<td><?php _e( 'Actual Value', 'studiare' ); ?></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="studiare-group-content studiare-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Theme Version:', 'studiare' ); ?></td>
				<td id="studiare-version-table-value">
					<?php
						$studiare_theme = wp_get_theme( get_template() );
						$studiare_version = $studiare_theme->get( 'Version' ) ? $studiare_theme->get( 'Version' ) : '12.9';
						$last_stable = get_option('studiare_last_available_version', '12.9');

						if ( version_compare( $studiare_version, $last_stable ) >= 0 ) {
							echo $studiare_version;
						} else {
							echo '<mark class="no">' . $studiare_version . '</mark>';
						}
					?>
						<span class="studiare-new-version-available" style="<?php if ( version_compare( $studiare_version, $last_stable ) >= 0 ) { echo 'display:none'; } ?>">
							- <a href="#"><?php _e( 'New version available', 'studiare' ) ?></a>&nbsp;
							<b id="studiare-version-table-placeholder"><?php echo $last_stable; ?></b>
							<a class="tips" target="_blank" href="https://docs.studiaretheme.ir/tuts/update/update-theme/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
						</span>
				</td>
			</tr>
			<tr>
				<td><?php // _e( 'Theme License:', 'studiare' ); ?></td>
				<td>
					<?php
					//	if ( get_option( 'studiare_license_code', false ) ):
					//		echo '<label class="active"><mark class="yes">Activated</mark></label>';
					//	else:
					//		echo '<label class="inactive"><mark class="no">Not activated</mark></label> <a class="tips" href="https://docs.studiaretheme.ir/tuts/setting-up/license/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>';
					//	endif;
					?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Theme Directory:', 'studiare' ); ?></td>
				<td><?php echo '..' . get_raw_theme_root( get_stylesheet() ) . '/' . get_stylesheet(); ?></td>
			</tr>
			<tr>
				<td><?php _e( 'Child Theme:', 'studiare' ); ?></td>
				<td>
					<label><mark class="yes"><?php echo ( get_template_directory() === get_stylesheet_directory() ) ? __('Disabled', 'studiare') : __('Enabled', 'studiare'); ?></mark></label>
					<a class="tips" target="_blank" href="https://docs.studiaretheme.ir/tuts/setting-up/child-theme/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 3cl -->
<div class="studipnl_content">
	<div class="studiare_panel_holder-headline">
		<h3><?php _e( 'Server Environment', 'studiare' ); ?></h3>
		<a href="https://docs.studiaretheme.ir/tuts/setting-up/requirements/" target="_blank" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg><?php _e( 'Requirements', 'studiare' ); ?></a>
	</div>
	<table class="studiare-group-details studiare-group-table table-col-3">
		<tbody>
			<tr>
				
				<td><?php _e( 'Here is an overview of your current server configuration', 'studiare' ); ?></td>
				<td><?php _e( 'Actual Value', 'studiare' ); ?></td>
				<td><?php _e( 'Required Value', 'studiare' ); ?></td>
			</tr>
		</tbody>
	</table>
	<table class="studiare-group-content studiare-group-table table-col-3">
		<tbody>
			<tr>
				<td><?php _e( 'PHP Version:', 'studiare' ); ?></td>
				<td>
					<?php
						if ( explode( ',', phpversion() )[0] >= 7 ) {
							echo phpversion();
						} else {
							echo '<mark class="no">' . phpversion() . '</mark>';
						}
					?>
				</td>
				<td>7.4.0</td>
			</tr>
			<tr>
                <td>
                    <?php _e( 'PHP Memory Limit', 'studiare' ); ?> 
                    <span><?php _e( '(memory_limit):', 'studiare' ); ?></span>
                </td>
                <td>
                    <?php
                    function convert_memory_limit_to_mb( $value ) {
                        $unit = strtoupper( substr( $value, -1 ) );
                        $num  = (int) $value;
                        switch ( $unit ) {
                            case 'G':
                                return $num * 1024;
                            case 'M':
                                return $num;
                            case 'K':
                                return $num / 1024;
                            default:
                                return $num;
                        }
                    }

                    $memory_limit = ini_get( 'memory_limit' );
                    $memory_limit_mb = convert_memory_limit_to_mb( $memory_limit );
            
                    if ( $memory_limit_mb >= 256 || $memory_limit === '-1' ) {
                        echo $memory_limit;
                    } else {
                        echo '<mark class="no">' . $memory_limit . '</mark>';
                    }
                    ?>
                </td>
                <td>256M</td>
            </tr>
			<tr>
				<td><?php _e( 'PHP Time Limit', 'studiare' ); ?> <span><?php _e( '(max_execution_time):', 'studiare' ); ?></span></td>
				<td>
					<?php
						if ( ini_get( 'max_execution_time' ) >= 120 ) {
							echo ini_get( 'max_execution_time' );
						} else {
							echo '<mark class="no">' . ini_get( 'max_execution_time' ) . '</mark>';
							echo '<span class="error">&nbsp;';
							echo _e( '- Please adjust this value in order to meet the theme requirements.', 'studiare' );
							echo '</span';
						}
					?>
				</td>
				<td>120</td>
			</tr>
			<tr>
				<td><?php _e( 'PHP Max Input Variables Limit', 'studiare' ); ?> <span><?php _e( '(max_input_vars):', 'studiare' ); ?></span></td>
				<td>
					<?php
						if ( intval( ini_get( 'max_input_vars' ) ) >= 10000 ) {
							echo ini_get( 'max_input_vars' );
						} else {
							echo '<mark class="no">' . ini_get( 'max_input_vars' ) . '</mark>';
						}
					?>
				</td>
				<td>10000</td>
			</tr>
			<tr>
				<td><?php _e( 'WP Max Upload Size', 'studiare' ); ?> <span><?php _e( '(upload_max_filesize):', 'studiare' ); ?></span></td>
				<td>
					<?php
						if ( intval( ini_get( 'upload_max_filesize' ) ) >= 16 ) {
							echo ini_get( 'upload_max_filesize' );
						} else {
							echo '<mark class="no">' . ini_get( 'upload_max_filesize' ) . '</mark>';
						}
					?>
				</td>
				<td>16M</td>
			</tr>
			<tr>
				<td><?php _e( 'File Upload Permission', 'studiare' ); ?> <span><?php _e( '(file_uploads):', 'studiare' ); ?></span></td>
				<td>
					<?php
						$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );
						if ( $file_uploads == 'On' ) {
							echo _e( 'Available', 'studiare' );
						} else {
							echo '<mark class="no">';
							echo _e( 'Disabled', 'studiare' );
							echo '</mark';
						}
					?>
				</td>
				<td><?php _e( 'Available', 'studiare' ); ?></td>
			</tr>
		</tbody>
	</table>
	<div class="studiare-group-footer">
		<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'studiare' ); ?>
	</div>
</div>

<!-- Group 2cl -->
<div class="studipnl_content">
	<div class="studiare_panel_holder-headline">
		<h3><?php _e( 'WordPress Environment', 'studiare' ); ?></h3>
	</div>
	<table class="studiare-group-details studiare-group-table table-col-3">
		<tbody>
			<tr>
				<td><?php _e( 'Directive', 'studiare' ); ?></td>
				<td><?php _e( 'Actual Value', 'studiare' ); ?></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="studiare-group-content studiare-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Home URL:', 'studiare' ); ?></td>
				<td>
					<?php echo get_home_url(); ?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Site URL:', 'studiare' ); ?></td>
				<td>
					<?php echo get_site_url(); ?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'WP Version:', 'studiare' ); ?></td>
				<td>
					<?php
						if ( !isset( $wp_verion ) && defined( 'ABSPATH' ) && defined( 'WPINC' ) ) {
							include ABSPATH . WPINC . '/version.php';
						}

						$wp_version_exploded = isset( $wp_version ) ? explode( '.', $wp_version ) : [ '1' ];

						if ( !isset( $wp_version ) ) {
							$wp_version = 'Undefined';
						}

						if ( $wp_version_exploded[0] >= 5 ) {
							echo $wp_version;
						} else {
							echo '<mark class="no">' . $wp_version . '</mark>';
						}
					?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'WP Language:', 'studiare' ); ?></td>
				<td>
					<?php echo get_locale(); ?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'WP Multisite:', 'studiare' ); ?></td>
				<td>
					<?php
						if ( is_multisite() ) { 
							echo '<label><mark class="yes">';
							echo _e( 'Enabled', 'studiare' );
							echo '</mark></label>';
						} else {
							echo '<label><mark class="yes">';
							echo _e( 'Disabled', 'studiare' );
							echo '</mark></label>';
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Group 2cl -->
<div class="studipnl_content">
	<div class="studiare_panel_holder-headline">
		<h3><?php _e( 'Security', 'studiare' ); ?></h3>
	</div>
	<table class="studiare-group-details studiare-group-table table-col-3">
		<tbody>
			<tr>
				<td><?php _e( 'Directive', 'studiare' ); ?></td>
				<td><?php _e( 'Actual Value', 'studiare' ); ?></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="studiare-group-content studiare-group-table table-col-2">
		<tbody>
			<tr>
				<td><?php _e( 'Secure Connection', 'studiare' ); ?> <span><?php _e( '(SSL Certificate):', 'studiare' ); ?></span></td>
				<td>
					<?php
						if ( is_ssl() ) {
							echo _e( 'Secured', 'studiare' );
						} else {
							echo '<mark class="no">';
							echo _e( 'Not secured', 'studiare' );
							echo '</mark';
						}
					?>
				</td>
			</tr>
			<tr>
				<td><?php _e( 'Hide Errors', 'studiare' ); ?> <span><?php _e( '(WP_DEBUG):', 'studiare' ); ?></span></td>
				<td>
					<?php
						if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
							echo '<mark class="no">';
							echo _e( 'Errors are displayed', 'studiare' );
							echo '</mark';
						} else {
							echo '<mark class="yes">';
							echo _e( 'Hidden', 'studiare' );
							echo '</mark';
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</div>
