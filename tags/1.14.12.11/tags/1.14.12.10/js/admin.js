function isChecked() {
	if (jQuery('#aj_enabled').prop('checked')) {
		jQuery('.aj_method').show();
	} else {
		jQuery('.aj_method').hide();
	}
}

jQuery(document).ready(function() {
	isChecked();

	jQuery(document).on('click','#aj_enabled',function() {
		isChecked();
	});
});
