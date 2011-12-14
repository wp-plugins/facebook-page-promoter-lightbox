<?php

class arevico_facebook_func{
	/**
	 *	Generate Script code ()
	 * 	@param $arr_rel_src array, with relative script source to the plugin directory, no leading slash
	 * */
	function genScript($arr_rel_src){
		$lret="";
		$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

		if (!is_array($arr_rel_src)) { //not array? then push the element into a one-based array
			$arr_rel_src=array($arr_rel_src);
		}

		foreach ($arr_rel_src as $src){
			if (substr($src,0,2)=="//") {
				$lret .= '<script src="'. $src .'" type="text/javascript"></script>';
			} else {
				$lret .= '<script src="'.$x . $src .'" type="text/javascript"></script>';
			}
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
	if (!is_array($arr_rel_src)) { //not array? then push the element into a one-based array
		$arr_rel_src=array($arr_rel_src);
	}
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

}
?>