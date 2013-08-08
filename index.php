<?php
/*
   Plugin Name: Facebook Page Promoter Lightbox
   Plugin URI: http://http://wordpress.org/plugins/facebook-page-promoter-lightbox/faq/
   Description:  All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.
   Version: 2.6.5
   Author: Arevico
   Author URI: http://arevico.com/sp-facebook-lightbox-premium/
   Copyright: 2013, Arevico
*/

$current_loc = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

require('arevico_options.php');
require('arevico_plugin.php');

$arevico_facebook_opt=new arevico_facebook_opt();
$arevico_facebook=new arevico_facebook(); //TODO: Check if options need to be in the constructor.

?>