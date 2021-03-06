=== SMEW Comic Easel &hearts; s2Member ===
Contributors: Christina "Smudge" Hanson
Author URI: http://www.smudgemarks-engelwerks.com
Tags: Comic Easel, s2member, drip feed, comic, webcomic
Requires at least: 3.0
Tested up to: 4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

s2member integration for Comic Easel for drip feeding of comic posts.

== Description ==

s2member integration for Comic Easel for drip feeding of comic posts. Will let subscribers 'preview' comics for specified times before opening up to the wide world based on user roles. Will also allow different size images to be displayed based on user roles. Only works on Single Posts.

Both [Comic Easel] (https://wordpress.org/plugins/comic-easel/) and [s2Member Framework] (https://wordpress.org/plugins/s2member/) plugins are required.

== Known Issues ==
* This plugin currently breaks Image Maps and Light Box use inside of Comic Easel. It is recommended you do not use this plugin until the next revision of both SMEW Comic Easel <3 s2member and Comic Easel if either of those two functions are nessassery for your site.

== Upcoming ==
* Adding a backend setting UI to change things such as the custom post type slug name.
* Fix for the Image Map and Light Box issue coming with next revision of both SMEW Comic Easel <3 s2member and Comic Easel (will require both).
* Add descriptions to Settings page.

== Changelog ==

= 0.1.4.1 =

Cleaning up the Readme text for display on the WordPress.org Plugins repository. No codeing changes made.

= 0.1.4 =

Fixed the comic display so that it would correctly display/interact when 'Comic Easel'->'Clicking the comic goes to next comic' is active
Removed add_action via Frumph's wonderful suggestion.
Changed timestamp creation to fall more inline with WordPress standards.


= 0.1.3 =

(internal release only)
Added the ability to set image size via membership level. Currently hard coded to the 4 basic membership levels that come standard with s2member. It can be wonky since it can be set in any random order, so use with caution.

= 0.1.2 =

Fixed bug were variable was feeding into the wrong filter.

= 0.1.1 =

Changed plugin/file name to 'SMEW Comic Easel <3 s2member' to avoid lookup confusion with Comic Easel on the WordPress Plugin Update Repository. Doh!

= 0.1 =

* Initial Release