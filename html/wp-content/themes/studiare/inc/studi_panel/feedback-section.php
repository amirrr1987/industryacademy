<?php
// Check if the form is submitted
if (isset($_POST['submit_feedback'])) {
    // Sanitize the website address and feedback
    $website_address = esc_url(home_url());
    $feedback = sanitize_textarea_field($_POST['feedback']);
    $to = 'info@studiaretheme.ir'; // Replace with your email address
    $subject = 'Feedback from ' . $website_address;
  
    // Email body
    $message = "Website Address: $website_address\n\nFeedback:\n$feedback\n\nWebsite Email: ". get_option('admin_email') ."";
  
    // Set headers
    $headers = 'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>' . "\r\n";
    
    // Send email
    if (wp_mail($to, $subject, $message, $headers)) {
        echo '<div class="updated"><p>'.__("Feedback submitted successfully!","studiare").'</p></div>';
    } else {
        echo '<div class="error"><p>'.__("Failed to send feedback. Please try again later.","studiare").'</p></div>';
    }
}
?>
<style>
    form#studi_feedback input, form#studi_feedback textarea {
    width: 100%;
}
</style>
<form method="post" action="" id="studi_feedback" class="studipnl_content">
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php echo __('Website Address','studiare');?></th>
            <td>
                <input type="text" name="website_address" style="direction: ltr;" value="<?php echo esc_url(home_url()); ?>" readonly />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php echo __('Your Feedback','studiare');?></th>
            <td>
                <textarea name="feedback" rows="10" cols="50" required></textarea><br />
                <span class="description"><?php echo __('Please enter your feedback.','studiare');?></span>
                <p class="submit">
                 <input type="submit" name="submit_feedback" class="button button-primary" value="<?php echo __('Submit','studiare');?>" />
                 </p>
            </td>
            
        </tr>
    </table>
    
</form>