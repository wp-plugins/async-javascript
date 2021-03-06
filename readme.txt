=== Async Javascript ===
Contributors: (cloughit)
Donate link: http://www.cloughit.com.au/donate/ (coming soon)
Tags: async,javascript,google,pagespeed,js,speed,performance,boost,render,blocking,above-the-fold
Requires at least: 2.8
Tested up to: 4.1.1
Stable tag: 1.15.02.23.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Async Javascript adds a 'async' attribute to scripts loaded via wp_enqueue_script

== Description ==

Eliminate Render-blocking Javascript in above-the-fold content with Async Javascript.

Render-blocking Javascript prevents above-the-fold content on your page from being rendered until the javascript has finished loading.  This can impact on your page speed and ultimately your ranking within search engines.  It can also impact your users experience.

Async Javascript adds a 'async' or 'defer' attribute to all scripts loaded by the WordPress wp_enqueue_script function.  This 'async' or 'defer' attribute forces the javascript to be loaded asynchronously or deferred, therefore speeding up page delivery.

== Installation ==

Just install from your WordPress "Plugins | Add New" screen and all will be well. Manual installation is very straightforward as well:

1. Upload the zip-file and unzip it in the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to `Async Javascript` menu to load setings page

== Frequently Asked Questions ==

= Which browsers support the 'async' attribute =

The 'async' attribute is new in HTML5. It is supported by the following browsers:

> Chrome
> IE 10 and higher
> Firefox 3.6 and higher
> Safari
> Opera

= Where can I report an error? =

Contact David Clough @ Clough I.T. Solutions - support@cloughit.com.au

= What information should I include when requesting support =

* A description of the problem, including screenshots and information from your browser's Error/ debug console
* URL of your blog (you can turn Async Javascript off, but should be willing to turn it briefly on to have the error visible)
* your Async Javascript settings (including a description of changes you made to the configuration to try to troubleshoot yourself)
* the Theme used (including the Theme's download link)
* optionally plugins used (if you suspect one or more plugins are raising havoc)

= I want out, how should I remove Async Javascript? =
* Disable the plugin
* Delete the plugin

== Screenshots ==

1. this screen shot description corresponds to async-javascript-screenshot1.jpg and shows the admin page for Async Javascript

== Changelog ==

= 1.15.02.23.1
* Code error fix

= 1.15.02.23
* Tested for WordPress v4.1.1
* Added ability to provide a comma seperated list of scripts to be excluded from async/defer (thanks to Nico Ryba for this suggestion)

= 1.14.12.19
* Tested for Wordpress v4.1

= 1.14.12.11.2
* Repaired broken SVN issue preventing plugin install

= 1.14.12.11.1
* Repaired broken SVN issue preventing plugin install

= 1.14.12.11 =
* Updated minor versioning issue

= 1.14.12.10 =
* Genesis
