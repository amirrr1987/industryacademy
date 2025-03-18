function load_share_box(postId) {
    var $overlay = jQuery('.ajaxoverlay');
    if ($overlay.length === 0) {
        $overlay = jQuery('<div class="ajaxoverlay"></div>').appendTo('body');
    }
    
    var $shareBox = jQuery('.share_box_holder');
    if ($shareBox.length === 0) {
        $shareBox = jQuery('<div class="share_box_holder"></div>').appendTo('body');
    }

    if ($shareBox.hasClass("share_open")) {
        jQuery(".share_box_holder").fadeOut(300, function() {
            jQuery(this).remove();
        });
        return;
    }

    var $spinner = jQuery('.ajaxspinner');
    if ($spinner.length === 0) {
        $spinner = jQuery('<div class="ajaxspinner" style="display: none;"><i class="fal fa-spinner-third fa-spin"></i></div>').appendTo('body');
    }

    $spinner.show();
    $overlay.show();

    jQuery.post(ajax_object.ajaxurl, { action: 'load_share_box', post_id: postId }, function(response) {
        $shareBox.html(response).addClass("share_open");
        $spinner.hide();
        $overlay.hide();
    }).fail(function() {
        $spinner.hide();
        $overlay.hide();
        alert("An error occurred while loading the share box.");
    });
}

function send_pro_url_to_email() {
    var email = jQuery('#useremailtosharepro').val();
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    
    if (email.length === 0) {
        alert(ajax_object.enter_email);
    } else if (!emailPattern.test(email)) {
        alert(ajax_object.valid_email);
    } else {
        jQuery('#ajaxresponseholder').html('<i class="fal fa-spinner-third fa-spin"></i>');
        var data = { 'action': 'siteWideMessage', 'email': email, 'pro_url': window.location.href };
        jQuery.post(ajax_object.ajaxurl, data, function(response) {
            jQuery('#ajaxresponseholder').html(response);
        });
    }
}