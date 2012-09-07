=== Facebook Page Promoter Lightbox ===
Contributors: Arevico 
Tags: facebook,twitter,post,plugin,lightbox,fancybox,social media,seo
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 2.5.5

All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.

== Description ==

All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.

**Features:**

*   Facebook page is needed
*   Display the facebook lightbox onload with or without a delay
*   Limit the lightbox to once every x days per individual visitors 
*   Promote your own facebook fanpage
*   No api key needed (works with iframe, premium version uses xfbml and requires api key)

[youtube http://www.youtube.com/watch?v=0IE4dj8Qoko]

**Requirements:**

* PHP 5
* Facebook Fanpage
== Screenshots ==
1. The plugin in action.
2. The plugin in action.
3. General options
4. Premium options

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page. Configure the plugin under the menu 'Arevico Settings'.

Navigate to the "Arevico Settings" tab and set your preferences. You will need a facebook fanpage and retrieve it's ID. The plugin does not work with facebook groups.

== Frequently Asked Questions ==

**Q. Do I need to check don't load fancybox? **

A. Probably not! In most cases you only need to check this if instructed by support (e.g: when a conflict with another sort of lightbox exists).

**Q. I get an error: invalid profile href **

A. Make sure that you have configured the plugin, inserted your fanpage ID and cleared the cache of any caching plugin you use.

**Q. How do I avoid conflict with other facebook plugins? **

A. Make sure that each plugin uses the same api key. If possible and other social plugins don't need to use xfbml functionality, make sure to load the iframe version.

**Q. The lightbox shows, but it is white. It doesn't contain the likebox?**

A. While using facebook as a page, you can't use any social plugins. To do this, please go to facebook.com and use facebook as a personal account.

**Q. How to obtain my Facebook FanPage ID?:**

A. <a href=\"http://arevico.com/retrieving-the-facebook-fanpage-id/\">*http://arevico.com/retrieving-the-facebook-fanpage-id/*</a> has good instruction on how to get the fanpage id   

**Q. It conflict with other social plugins? how can I fix it?:**

A. Make sure that other social plugins use the iframe version. If you need the xfbml make sure, that you aways specify the application/api Key and use only one per page!

**Q. I'm getting error: Could not retrieve id for the specified page. Please verify correct href was passed in.**

A. This plugins only works with facebook Fan pages, make sure to put in the numeric id of your Facebook Fanpage.

**Q. The close button doesn't appear?.**

A. A lot of plugins and themes don't follow coding standards. For example your theme might have prototype or jquery hardcoded. This is a very serious problem. try to replace your theme's jquery.js or prototye.js file with the latest available version. This is most likely the problem!

**Q. Which browsers are supported?.**

A. All major browser except IE7/IE6. Tested in google chrome, internet explorer 8+ and firefox.

**Q. Lightbox is displayed to far to the right?.**

A. Make sure your theme's css hasn't set the 'position:relative;' attribute to the body element

**Q. The Overlay doesn't dispay or is pushed to the bottom of the page?.**

A. This issue can be caused in internet explorere when your theme doesn't have a valid doctype. Set the doctype in your theme and it should work.

**Q. Youtube videos show trough the lightbox?**
A. To fix this issue, set the wmode=transparent parameter to the youtube embed url!


**Q. How to get support? **
A. First, read this F.A.Q. Generally, emails are answered faster than forum threads.

**Q. Only the general settings appear, style and advanced don't? **
A. That's right, those are part of the premium version. Make sure you remove this version first before installing the premium version.

== Changelog ==

= Version 2.5.3 =
Added support for archive pages.

= Version 2.5 =
Code maintenance and optimizations. Fixed bug regarding to checkbox options. Fixed phantom options correctly this time. Added link to premium version.

= Version 2.4 =
Fixed z-index issue with twenty ten theme and this plugin. Added link to the premium version of the plugin. Included link to premium version on option page. Small optimizations. Added a few screenshots. 

= Version 2.3 =
Wordpress version compatibility update. Be aware, that your options will be reset!

= Version 2.2 =
Emergency fix

= Version 2.1 =
Fixed scrollbar issue in google chrome

= Version 2.0 =
Full rework of all code. Facebook code has been updated from the old depreciated code to a new iframe code. Has now the option to reliably display on homepage, and any other page in a better way than the old plugin. 

= Version 1.1 =
**Fixed option page bug, deselecting was not possible

= Version 1.0 =
**Initial release**
