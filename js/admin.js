/*
Plugin Name: Async Javascript
Plugin URI: http://www.cloughit.com.au/wordpress/plugins/async-javascript-wordpress-plugin/
Description: Async Javascript adds a 'async' or 'defer' attribute to scripts loaded via wp_enqueue_script
Version: 1.14.12.11
Author: David Clough (cloughit)
Author URI: http://www.cloughit.com.au/
Text Domain: async-javascript
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 *	isChecked()
 *
 *	checks to see if the 'aj_enabled' checkbox is checked.  If yes, show extended options, if no, hide extended options
 *
 *  @param		n/a
 *	@return		n/a
 */
function isChecked() {
	if (jQuery('#aj_enabled').prop('checked')) {
		jQuery('.aj_method').show();
	} else {
		jQuery('.aj_method').hide();
	}
}

/**
 *	functions and actions to load after document ready
 */
jQuery(document).ready(function() {
	isChecked();

	jQuery(document).on('click','#aj_enabled',function() {
		isChecked();
	});
});
