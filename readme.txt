=== Product Version Info ===
Contributors: kmteoh
Donate link: http://www.ymyitconsulting.com/products
Tags: Version, API, JSON, Javascript
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin that helps you to manage and publish your product version, when you are using wordpress as product website CMS.

== Description ==

A simple plugin that helps you to manage and publish your product version, when you are using wordpress as product website CMS. This is particularly useful if your product is still in active development phase. To retrieve the version simply visit to <a>http://<your.wordpress.site>/?versioninfo</a> and result will be returned as JSON

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Version Info to change the version number
4. Hit http://<your.wordpress.site>/?versioninfo to see the result returned as JSON format. This step can be easily done via Javascript, PHP file_get_contetns(), cURL or any other known preference to hit a web service

== Frequently asked questions ==

= I am not getting JSON response =

Most likely the response is there but need to be formatted manually as JSON object. For front end use jQuery.parseJSON(), server side PHP use json_decode()

== Screenshots ==

1. Configuration Page

== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
* Initial release