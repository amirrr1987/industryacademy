
/*
*   Sidebar position
*/
jQuery(document).ready(function($){
    "use strict";
	
	process_post_format();
	required_field();
	
	/* 
	*  admin mega menu
	*/
	$( document ).ready( function() {

		// show or hide megamenu fields on parent and child list items
		sc_studi_megamenu.menu_item_mouseup();
		sc_studi_megamenu.megamenu_status_update();
		sc_studi_megamenu.megamenu_fullwidth_update();
		sc_studi_megamenu.update_megamenu_fields();

		// setup automatic thumbnail handling
		$( '.remove-sc_studi-megamenu-thumbnail' ).manage_thumbnail_display();
		$( '.sc_studi-megamenu-thumbnail-image' ).css( 'display', 'block' );
		$( ".sc_studi-megamenu-thumbnail-image[src='']" ).css( 'display', 'none' );

		// setup new media uploader frame
		sc_studi_media_frame_setup();
	});
	
	/*
	* Field Icon
	*/
	$( 'body' ).on( 'click', '.pick-icon', function ( e ) {
		e.preventDefault();

		$( this ).next( '.icons-block' ).slideToggle();
	} );

	$( '.icon-selector' ).on( 'click', 'i', function(e) {
		e.preventDefault();
		var $el = $( this ),
			icon = $el.data( 'icon' );

		$el.closest( '.icons-block' ).next( 'input' ).val( icon ).siblings( '.pick-icon' ).children( 'i' ).attr( 'class', 'fa '+icon );
		$el.addClass( 'selected' ).siblings( '.selected' ).removeClass( 'selected' );
	} );

	$( '.search-icon' ).on( 'keyup', function() {
		var search = $( this ).val(),
			$icons = $( this ).siblings( '.icon-selector' ).children();

			if ( !search ) {
				$icons.show();
				return;
			}

			$icons.hide().filter( function() {
				return $( this ).data( 'icon' ).indexOf( search ) >= 0;
			} ).show();
	} );

	// "extending" wpNavMenu
	var sc_studi_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( sc_studi_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-status', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'sc_studi-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'sc_studi-megamenu' );
				}

				sc_studi_megamenu.update_megamenu_fields();
			});
		},

		megamenu_fullwidth_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-width', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'sc_studi-megamenu-fullwidth' );
				} else 	{
					parent_li_item.removeClass( 'sc_studi-megamenu-fullwidth' );
				}

				sc_studi_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-megamenu-status', this );
				var megamenu_fullwidth = $( '.edit-menu-item-megamenu-width', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );

					if( check_against.is( '.sc_studi-megamenu' ) ) {
						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'sc_studi-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'sc_studi-megamenu' );
					}

					if( check_against.is( '.sc_studi-megamenu-fullwidth' ) ) {
						megamenu_fullwidth.attr( 'checked', 'checked' );
						$( this ).addClass( 'sc_studi-megamenu-fullwidth' );
					} else {
						megamenu_fullwidth.attr( 'checked', '' );
						$( this ).removeClass( 'sc_studi-megamenu-fullwidth' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'sc_studi-megamenu' );
					}

					if( megamenu_fullwidth.attr( 'checked' ) ) {
						$( this ).addClass( 'sc_studi-megamenu-fullwidth' );
					}
				}
			});
		}

	};

	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'sc_studi-media-remove-', '' );
			$( '#edit-menu-item-megamenu-thumbnail-'+button_id ).val( '' );
			$( '#sc_studi-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function sc_studi_media_frame_setup() {
		var sc_studi_media_frame;
		var item_id;

		$( document.body ).on( 'click.sc_studiOpenMediaManager', '.sc_studi-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('sc_studi-media-upload-', '');

			if ( sc_studi_media_frame ) {
				sc_studi_media_frame.open();
				return;
			}

			sc_studi_media_frame = wp.media.frames.sc_studi_media_frame = wp.media({

				className: 'media-frame sc_studi-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			sc_studi_media_frame.on('select', function(){

				var media_attachment = sc_studi_media_frame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-thumbnail-'+item_id ).val( media_attachment.url );
				$( '#sc_studi-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			sc_studi_media_frame.open();
		});

	}
	
	/*
	* Show or hide post formate metabox
	*/
	function process_post_format() {
		var prefix  = 'es_';
		var $cbxPostFormats = $( 'input[name=post_format]', '#post-formats-select' );
		var $meta_boxes = $('[id^="'+ prefix +'meta_box_post_format_"]').slideUp();
		$cbxPostFormats.change(function(){
			$meta_boxes.slideUp();
			$('#' + prefix +  'meta_box_post_format_' + $( this ).val()).slideDown();
		});

		$cbxPostFormats.filter( ':checked' ).trigger( 'change' );

		$( 'body' ).on( 'change', '.checkbox-toggle input', function()
		{
			var $this = $( this ),
				$toggle = $this.closest( '.checkbox-toggle' ),
				action;
			if ( !$toggle.hasClass( 'reverse' ) )
				action = $this.is( ':checked' ) ? 'slideDown' : 'slideUp';
			else
				action = $this.is( ':checked' ) ? 'slideUp' : 'slideDown';

			$toggle.next()[action]();
		} );
		$( '.checkbox-toggle input' ).trigger( 'change' );
	}
	
	/*
	* Show or hide post formate metabox
	*/
	function required_field() {
		var ref_arr = [];
		$('[data-required-ref]').each(function () {
			var $this = $(this);
			var data_ref = $this.attr('data-required-ref');
			var data_op = $this.attr('data-required-operator');
			var data_val = $this.attr('data-required-value');
			var data_val_arr = data_val.split(',');
			if ($('#' + data_ref).is(':checkbox')) {
				if ($('#' + data_ref).prop('checked')) {
					ref_arr[data_ref] = $('#' + data_ref).val();
				}
				else {
					ref_arr[data_ref] = '0';
				}
			}
			else {
				ref_arr[data_ref] = $('#' + data_ref).val();
			}



			if (((data_val_arr.indexOf(ref_arr[data_ref]) != -1) && (data_op == '='))
				|| ((data_val_arr.indexOf(ref_arr[data_ref]) == -1) && (data_op == '<>'))) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
		for (var field_ref in ref_arr) {
			$('#' + field_ref).change(function() {
				var $this_ref = $(this);
				var this_field_ref = $(this).attr('id');
				var ref_val = '';
				if ($this_ref.is(':checkbox')) {
					if ($this_ref.prop('checked')) {
						ref_val = $this_ref.val();
					}
					else {
						ref_val = '0';
					}
				}
				else {
					ref_val = $this_ref.val();
				}

				$('[data-required-ref="' + this_field_ref + '"]').each(function(){
					var $this = $(this);
					var data_op = $this.attr('data-required-operator');
					var data_val = $this.attr('data-required-value');
					var data_val_arr = data_val.split(',');

					if (((data_val_arr.indexOf(ref_val) != -1) && (data_op == '='))
						|| ((data_val_arr.indexOf(ref_val) == -1) && (data_op == '<>'))) {
						$(this).slideDown();
					}
					else {
						$(this).slideUp();
					}
				});
			});
		}
	}
	
	 $('body').on('click', '#sc_studi_options-import-presets .redux-image-select label img', function(e) {
        var response = confirm(sc_studi_admin_vars.import_options_msg);
        if (response){
            e.preventDefault();
            var preset = $(this).prev().val();
            window.onbeforeunload = null;
           window.location.href = sc_studi_admin_vars.theme_option_url + '&preset_type=' + preset +'&import_data_content=true';
            return false;
        }
    });
});

/*
* Select service icon
*/
jQuery(function($){
		
	$('.fa-service-icons > span').click( function(e){
		var me = $(this);
		$(this).parent().find('span').removeClass('selected');
		me.addClass('selected');
		var icon = me.find('i').attr('id');
		
		me.parents('.fa-select-icon').find('.hidden_icon').val(icon);
		
	//	$(this).parent().find('span').each(function(e){
			
		//});
	
	});
})
