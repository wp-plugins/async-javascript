=== Async Javascript ===
Contributors: (cloughit)
Donate link: http://www.cloughit.com.au/donate/
Tags: async,javascript,google,pagespeed,js,speed,performance,boost
Requires at least: 2.8
Tested up to: 4.0.1
Stable tag: 1.14.12.10
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Async Javascript adds a 'async' attribute to scripts loaded via wp_enqueue_script

== Description ==

Eliminate Render-blocking Javascript in above-the-fold content with Async Javascript.

Render-blocking Javascript prevents above-the-fold content on your page from being rendered until the javascript has finished loading.  This can impact on your page speed and ultimately your ranking within search engines.  It can also impact your users experience.

Async Javascript adds a 'async' attribute to all scripts loaded by the WordPress wp_enqueue_script function.  This 'async' attribute forces the javascript to be loaded asynchronously, therefore speeding up page delivery. 

== Installation ==

Just install from your WordPress "Plugins | Add New" screen and all will be well. Manual installation is very straightforward as well:

1. Upload the zip-file and unzip it in the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to `Settings -> Async Javascript`

== Frequently Asked Questions ==

= Which browsers support the 'async' attribute =

The 'async' attribute is new in HTML5. It is supported by the following browsers:

> Chrome
> IE 10 and higher
> Firefox 3.6 and higher
> Safari
> Opera

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets 
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png` 
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Genesis
