<?php
/**
 * created date 1400-09-11 | 2021-12-02
 * author: suncode
 * */

//https://codexcoach.com/nested-repeater-meta-box-in-wordpress/
// for sortable action https://codepen.io/martinmurciego/pen/Zmvrze

return;

// Add Meta Box to post
add_action('admin_init', 'nested_repeter_callback', 2);

function nested_repeter_callback() {
	add_meta_box( 'nested-repeter-data', 'Nested Repeter', 'nested_repeter_meta_box_callback', 'product', 'normal', 'default');
}

function nested_repeter_meta_box_callback($post) {
	$change_logs = get_post_meta($post->ID, 'nested_repeter_group', true);

	wp_nonce_field( 'nestedRepeaterLog', 'formType' );
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
	<style>
		#nested_repeter table, #nested_repeter table input{ width: 100%; }
		td.inner_tr > tr { display: table; width: 100%; }
		td.inner_td tr { display: table; width: 100%; }
	</style>
	<div id="nested_repeter">
		<table>
			<tbody>
				<tr class="wc-repeater">
					<td data-repeater-list="change-log" class="drag inner_td">
						<?php if(!empty($change_logs)) { ?>
							<?php foreach($change_logs as $change_log) { 

								?>
								<table data-repeater-item>
									<tr>
										<td class="inner-outer-repeater">
											<table>
												<tr>
													<td><input type="text" name="version" value="<?php echo $change_log['version']; ?>" placeholder="Title" /></td>
													<td><input type="date" name="date" value="<?php echo $change_log['date']; ?>"/></td>
													<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
												</tr>
											</table>
										</td>
									</tr>
									    <tr>	
										<!-- innner repeater -->
										<td class="inner-repeater">
											<table>
												<tr>
													<td data-repeater-list="notes" class="inner_tr">
														<?php if(!empty($change_log['inner-list'])) { ?>
															<?php foreach($change_log['inner-list'] as $note) { 
																?>
																<table data-repeater-item>
																	<tr>
																		<td><select class="form-select" aria-label="change-version" name="type">
																			<option selected>Open this select version</option>
																			<option value="New" <?php if($note['type'] == "New"){ echo "selected"; }; ?>>New</option>
																			<option value="Update" <?php if($note['type'] == "Update"){ echo "selected"; }; ?>>Update</option>
																			<option value="Fixed" <?php if($note['type'] == "Fixed"){ echo "selected"; }; ?>>Fixed</option>
																			<option value="Added" <?php if($note['type'] == "Added"){ echo "selected"; }; ?>>Added</option>
																			<option value="Removed" <?php if($note['type'] == "Removed"){ echo "selected"; }; ?>>Removed</option>
																		</select></td>

																		<td><input type="text" name="note" value="<?php echo $note['note']; ?>" placeholder="Note" /></td>
																		<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
																	</tr>
																</table>
															<?php } ?>
														<?php } else if(!empty($change_log['notes'])){
															foreach($change_log['notes'] as $note) { 
																?>
																<table data-repeater-item>
																	<tr>
																		<td><select class="form-select" aria-label="change-version" name="type">
																			<option selected>Open this select version</option>
																			<option value="New" <?php if($note['type'] == "New"){ echo "selected"; }; ?>>New</option>
																			<option value="Update" <?php if($note['type'] == "Update"){ echo "selected"; }; ?>>Update</option>
																			<option value="Fixed" <?php if($note['type'] == "Fixed"){ echo "selected"; }; ?>>Fixed</option>
																			<option value="Added" <?php if($note['type'] == "Added"){ echo "selected"; }; ?>>Added</option>
																			<option value="Removed" <?php if($note['type'] == "Removed"){ echo "selected"; }; ?>>Removed</option>
																		</select></td>

																		<td><input type="text" name="note" value="<?php echo $note['note']; ?>" placeholder="Note" /></td>
																		<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
																	</tr>
																</table>
															<?php }

														}else { ?>
															<table data-repeater-item>
																<tr>
																	<td>
																		<select class="form-select" aria-label="change-version" name="type">
																			<option >Open this select menu</option>
																			<option value="New">New</option>
																			<option value="Update">Update</option>
																			<option value="Fixed">Fixed</option>
																			<option value="Added">Added</option>
																			<option value="Removed">Removed</option>
																		</select>
																	</td>
																	<td><input type="text" name="note" value="" placeholder="Note" /></td>
																	<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
																</tr>
															</table>
														<?php } ?>
													</td>
													<td><input class="button" data-repeater-create type="button" value="+"/></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							<?php } ?>
						<?php } else { ?>
							<table data-repeater-item>
								<tr>
									<td class="inner-outer-repeater">
										<table>
											<tr>
												<td><input type="text" name="version" value="" placeholder="Version" /></td>
												<td><input type="date" name="date" value=""/></td>
												<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
											</tr>
										</table>
									</td>
									<!-- innner repeater -->
									<td class="inner-repeater">
										<table>
											<tr>
												<td data-repeater-list="inner-list" class="inner_tr">
													<table data-repeater-item>
														<tr>
															<td>
																<select class="form-select" aria-label="change-version" name="type">
																	<option >Open this select menu</option>
																	<option value="New">New</option>
																	<option value="Update">Update</option>
																	<option value="Fixed">Fixed</option>
																	<option value="Added">Added</option>
																	<option value="Removed">Removed</option>
																</select>
															</td>
															<td><input type="text" name="note" value="" placeholder="Note" /></td>
															<td><input data-repeater-delete class="button"  type="button" value="-" /></td>
														</tr>
													</table>
												</td>
												<td><input class="button" data-repeater-create type="button" value="+"/></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						<?php } ?>
					</td>
					<td><input data-repeater-create class="button"  type="button" value="+"/></td>
				</tr>
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('.wc-repeater').repeater(
			{
				repeaters: [{
					selector: '.inner-repeater'
				}]
			});
			
			
			jQuery(".drag").sortable({
    axis: "y",
    cursor: 'pointer',
    opacity: 0.5,
    placeholder: "row-dragging",
    delay: 150,
    update: function(event, ui) {
      console.log('repeaterVal');
      console.log(repeater.repeaterVal());
      console.log('serializeArray');
      console.log($('form').serializeArray());
    }
    // update: function(event, ui) {
    //     $('.repeater-default').repeater( 'setIndexes' );
    // }

}).disableSelection();
			
		});
	</script>
	<?php
}

// Save Meta Box values.
add_action('save_post', 'nested_repeter_meta_box_save');

function nested_repeter_meta_box_save($post_id) {

	if (!isset($_POST['formType']) && !wp_verify_nonce($_POST['formType'], 'nestedRepeaterLog'))
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	update_post_meta( $post_id, 'nested_repeter_group', $_POST['change-log'] );

}