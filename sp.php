<?php
/*
   Plugin Name: Facebook Page Promoter Lightbox
   Plugin URI: http://arevico.com/kb-facebook-page-lightbox/
   Description:  All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.
   Version: 1.1
   Author: Arevico
   Author URI: http://arevico.com/
   Copyright: 2011, Arevico
*/
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR . 'options.php');

function lb_appender($content){
	$options=defaulter(get_option('arv_fbx'));
	if (!stristr($content,$options['exc']) && ((is_single() && $options['display_on_post'] ) || (is_page() && $options['display_on_page'] ))){

	$lr .= '<!-- An Arevico Plugin: Facebook Page Promoter Lightbox. --><div id="fb-root"></div><script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript">
			</script><script>FB.init();</script><a id="inline" href="#data" style="display: none;">Show</a><div style="display:none">
			<div id="data" style=""><fb:fan profile_id="' . $options['fb_id'] .  '" connections="6" width="400" height="180" frameborder="none"></fb:fan></div></div>';
	$lr .= js_localize("lb_l_ret",$options);
	$lr .= genScript(array('scs/launch.js'));

	if (!$options['fancybox']) {
		$content .= genScript(array('scs/scs.js'));
	}
		$content .= genStyle(array('scs/scs.css')) . $lr;

	}
	/* Remove shorttags*/
	$content = str_ireplace($option['exc'],"",$content);
	return $content;
}


/**
* Hooks and enques jquery on posts and page
*  */
function my_jq_apper() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
	wp_enqueue_script( 'jquery' );
}

add_filter('the_content', 'lb_appender');
add_action('wp_enqueue_scripts', 'my_jq_apper');

/**
*	Generate Script code ()
* 	@param $arr_rel_src array, with relative script source to the plugin directory, no leading slash
* */
function genScript($arr_rel_src){
	$lret="";
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

	foreach ($arr_rel_src as $src){
		$lret .= '<script src="'.$x . $src .'" type="text/javascript"></script>';
	}
	return $lret;
}
/**
 *	Generate style code ()
 * 	@param $arr_rel_src array, with relative script source to the plugin directory, no leading slash
 * */

function genStyle($arr_rel_src){
	$lret="";
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

	foreach ($arr_rel_src as $src){
		$lret .= '<link rel="stylesheet" type="text/css" href="'. $x . $src .'"></link>';
	}
	return $lret;
}

/**
*Custom function to localize js inline
*/
function js_localize($name, $vars) {
	$lret="";
	$data = "var $name = {";
	$arr = array();
	foreach ($vars as $key => $value) {
		$arr[count($arr)] = $key . " : '" . esc_js($value) . "'";
	}
	$data .= implode(",",$arr);
	$data .= "};";
	$lret .= "<script type='text/javascript'>\n";
//	$lret .= "/* <![CDATA[ */\n";
	$lret .= $data;
//	$lret .= "\n/* ]]> */\n";
	$lret .= "</script>\n";
	return 	print_r($lret,true);
}
?>