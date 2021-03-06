<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Async Javascript
Plugin URI: http://www.cloughit.com.au/wordpress/plugins/async-javascript-wordpress-plugin/
Description: Async Javascript adds a 'async' or 'defer' attribute to scripts loaded via wp_enqueue_script
Version: 1.15.02.23.1
Author: David Clough (cloughit)
Author URI: http://www.cloughit.com.au/
Text Domain: async-javascript
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 *	aj_admin_init()
 *
 *	register admin stylesheets and javascripts
 *
 *  @param		n/a
 *	@return		n/a
 */
add_action('admin_init','aj_admin_init');
function aj_admin_init() {
	wp_register_style(
		'aj_admin_styles',
		plugins_url('/css/admin.css',__FILE__)
	);
	wp_enqueue_style('aj_admin_styles');
	/*wp_register_script(
		'aj_admin_scripts',
		plugins_url('/js/admin.js',__FILE__),
		array('jquery')
	);*/
	wp_enqueue_script(
		'aj_admin_scripts',
		plugins_url('/js/admin.js',__FILE__),
		array('jquery'),
		time()
	);
}

/**
 *	async_javascript_menu()
 *
 *	register admin menu
 *
 *  @param		n/a
 *	@return		n/a
 */
add_action('admin_menu','async_javascript_menu');
function async_javascript_menu() {
	add_menu_page('Async Javascript Admin','Async Javascript','manage_options','async-javascript','async_javascript_admin');
}

/**
 *	async_javascript_admin()
 *
 *	admin page
 *
 *  @param		n/a
 *	@return		n/a
 */
function async_javascript_admin() {
	// Display settings saved message if optioned updated
	if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
		echo '<div class="updated"><p><strong>Settings saved.</strong></p></div>';
	}
	// load settings from database
	$aj_enabled = (get_option('aj_enabled') == 1) ? array(true,'checked','') : array(false,'','style="display:none;"');
	$aj_method = (get_option('aj_method') != 'async') ? 'defer' : 'async';
	$aj_exclusions = get_option('aj_exclusions');
	$autoptimize_enabled = (get_option('autoptimize_enabled') == 1) ? 'checked' : '';
	?>
	<div class="wrap">
		<h2>Async Javascript Settings</h2>
		<form action="options.php" method="post" name="options">
			<?php echo wp_nonce_field('update-options'); ?>
			<table class="form-table" width="100%" cellpadding="10">
				<tbody>
					<tr><td scope="row" align="left" colspan="2"><h3>Enable Async Javascript</h3></td></tr>
					<tr><td scope="row" align="left" colspan="2">When you enable Async Javascript, when a script is loaded via the 'wp_enqueue_script' method, this plugin will add a 'async' or 'defer' attribute.</td></tr>
					<tr><td scope="row" align="left" colspan="2">This action helps to eliminate render-blocking JavaScript in above-the-fold content.  This can also help to increase your pagespeed which in turn will assist in improving your page ranking.</td></tr>
					<tr>
						<td scope="row" align="left" colspan="2">
							There are several ways an external script can be executed:
							<ul style="list-style:disc inside;">
								<li>If async is present: The script is executed asynchronously with the rest of the page (the script will be executed while the page continues the parsing)</li>
								<li>If async is not present and defer is present: The script is executed when the page has finished parsing</li>
								<li>If neither async or defer is present: The script is fetched and executed immediately, before the browser continues parsing the page</li>
							</ul>
						</td>
					</tr>
					<tr><td scope="row" align="left" colspan="2"><strong>Note: </strong>There have been instances where enabling Async Javascript has 'broken' the javascript delivery.  Should this happen to you, I highly recommend installing the <a href="https://wordpress.org/plugins/autoptimize/" target="_blank">Autoptimize</a> plugin which will combine your javascript, further enhancing pagespeed and eliminating this issue.</td></tr>
					<tr>
						<td scope="row" align="left" style="width:20%;"><label>Enable Async Javascript</label></td>
						<td scope="row" align="left"><input type="checkbox" name="aj_enabled" id="aj_enabled" value="1" <?php echo $aj_enabled[1]; ?> /></td>
					</tr>
				</tbody>
			</table>
			<table class="form-table aj_method" width="100%" cellpadding="10">
				<tbody>
					<tr><td scope="row" align="left" colspan="2"><h3>Async Javascript Method</h3></td></tr>
					<tr><td scope="row" align="left" colspan="2">Please select the method (async or defer) that you wish to enable:</td></tr>
					<tr>
						<td scope="row" align="left" style="width:20%;">Method</td>
						<td scope="row" align="left"><input type="radio" name="aj_method" value="async" <?php if ($aj_method == 'async') { echo 'checked'; } ?> /> Async <input type="radio" name="aj_method" value="defer" <?php if ($aj_method == 'defer') { echo 'checked'; } ?> /> Defer </td>
					</tr>
				</tbody>
			</table>
			<table class="form-table" width="100%" cellpadding="10">
				<tbody>
					<tr><td scope="row" align="left" colspan="2"><hr/><h3>Script Exclusion</h3></td></tr>
					<tr><td scope="row" align="left" colspan="2"><hr/>Please list any scripts which you would like excluded from being Async/Defered during page load. (comma seperated list eg: jquery.js,jquery-ui.js)</td></tr>
					<tr>
						<td scope="row" align="left" style="width:20%;">Exclusions</td>
						<td scope="row" align="left"><textarea name="aj_exclusions" style="width:95%;"><?php echo $aj_exclusions; ?></textarea></td>
					</tr>
				</tbody>
			</table>
			<table class="form-table aj_method" width="100%" cellpadding="10">
				<tbody>
					<tr><td scope="row" align="left" colspan="2"><hr/><h3>Async Javascript For Plugins</h3></td></tr>
					<tr><td scope="row" align="left" colspan="2"><hr/><strong>Note: </strong>This will attempt to add the 'async' or 'defer' attribute to scripts loaded via a plugin (ie, not via 'wp_enqueue_script').  If you have a plugin that you would like added to this list please email <a href="mailto:support@cloughit.com.au">support@cloughit.com.au</a></td></tr>
					<?php
					if (is_plugin_active('autoptimize/autoptimize.php')) {
						?>
						<tr><td scope="row" align="left" colspan="2"><hr/><h4>Autoptimize - <a href="https://wordpress.org/plugins/autoptimize/" target="_blank"><?php echo 'https://wordpress.org/plugins/autoptimize/'; ?></a></h4></td></tr>
						<tr>
							<td scope="row" align="left" style="width:20%;"><label>Enable Autoptimize Support</label></td>
							<td scope="row" align="left"><input type="checkbox" name="autoptimize_enabled" value="1" <?php echo $autoptimize_enabled; ?> /></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="aj_enabled,aj_method,autoptimize_enabled,aj_exclusions" />
			<input type="submit" name="Submit" value="Update" />
		</form>
	</div>
	<?php
}


/**
 *	async_js()
 *
 *	add 'async' attribute to '<script>' tasks called via wp_enqueue_script using the 'clean_url' filter
 *
 *  @param		string		$url		url being processed
 *	@return		string		$url		modified url string
 */
add_filter('clean_url','async_js',11);
function async_js($url) {
	$aj_enabled = (get_option('aj_enabled') == 1) ? true : false;
	$aj_method = (get_option('aj_method') != 'async') ? 'defer' : 'async';
	$aj_exclusions = get_option('aj_exclusions');
	$array_exclusions = !empty($aj_exclusions) ? explode(',',$aj_exclusions) : $aj_exclusions;
	if (false !== $aj_enabled && false === is_admin()) {
		if (false === strpos($url,'.js')) {
			return $url;
		}
		if (is_array($array_exclusions) && !empty($array_exclusions)) {
			foreach ($array_exclusions as $exclusion) {
				if (false !== strpos(strtolower($url),strtolower($exclusion))) {
					return $url;
				}
			}
		}
		return $url . "' " . $aj_method . "='" . $aj_method;
	}
	return $url;
} // end async_js()

/**
 *	my_autoptimize_defer()
 *
 *	Adds support for Autoptimize plugin.  Adds 'async' attribute to '<script>' tasks called via autoptimize_filter_js_defer filter
 *  Autoptimize: https://wordpress.org/plugins/autoptimize/
 *
 *  @param		string		$defer		current value of $defer as passed to function
 *	@return		string					'async' attribute
 */
add_filter('autoptimize_filter_js_defer','my_autoptimize_defer',11);
function my_autoptimize_defer($defer) {
	$aj_enabled = (get_option('aj_enabled') == 1) ? true : false;
	$aj_method = (get_option('aj_method') != 'async') ? 'defer' : 'async';
	$autoptimize_enabled = (get_option('autoptimize_enabled') == 1) ? true : false;
	if (false !== $aj_enabled && false === is_admin()) {
		if (false !== $autoptimize_enabled) {
			return " " . $aj_method . "='" . $aj_method . "' ";
		}
	}
}
?>