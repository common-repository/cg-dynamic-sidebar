jQuery(document).ready( function(){
	var div_d = jQuery('.add_new_widget_area_section').html();
	jQuery('.widget-liquid-right').append(div_d);
	jQuery('.add_new_widget_area').on('click', function(){
		jQuery('.widget_area').slideToggle('500');
	});
	jQuery('.add_new_widget_area_section').remove();
	
	jQuery('.sidebar-custom_dynamic_widget .widgets-sortables').each( function(){
		var wid_id = jQuery(this).attr('id');
		dtext = '<pre>&lt;?php dynamic_sidebar("'+wid_id+'"); ?&gt; </pre>';
		jQuery(this).find('.sidebar-description').append(dtext);
		var data = '<p class="description remove_custom_widget">Remove Widget</p>';
		jQuery(this).find('.sidebar-description').append(data);
	});	
	jQuery('.widget_area input#widgettitle').on('blur', function(){
		var title = jQuery(this).val();
		title = title.toLowerCase().split(' ').join('');
		jQuery('#widgetid').val(title);
	});
	jQuery('#wpbody-content .remove_custom_widget').on('click', function(){
		var widget_id = jQuery(this).parent().parent().attr('id');
		var confirm_data = '<div class="confirm_delete"><div class="delete"><span id="delete">Delete</span><span id="cancel">Cancel</span></div></div>';
		jQuery(this).parent().parent().parent().addClass('delete_div_confirmation');
		jQuery(this).parent().parent().parent().find('.confirm_delete').remove();
		jQuery(this).parent().parent().parent().append(confirm_data);
		jQuery('#wpbody-content .confirm_delete').on('click', '#cancel',function(){
			jQuery(this).parent().parent().parent().removeClass('delete_div_confirmation');
			jQuery(this).parent().parent().parent().find('.confirm_delete').remove();
		});
		jQuery('#wpbody-content .confirm_delete').on('click', '#delete',function(){
			jQuery(this).parent().parent().parent().removeClass('delete_div_confirmation');
			jQuery.ajax({
				method: 'POST',
				url: ajax_object.ajax_url,
				data: 'action=ds_remove_custom_widget&id='+widget_id,
				success: function(data){
					var data_div = '<div class="notice notice-error is-dismissible"><p>Your custom widget is deleted successfully.</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
					jQuery('.wrap .widget-liquid-left').before(data_div);
					jQuery('.sidebar-custom_dynamic_widget #'+widget_id).parent().remove();
				}
			});
		});
	});
});
