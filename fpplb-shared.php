<?php 

/* This class facilitates access to shared member like normalization  */
class FPPLB_SHARED{

		public static $default_settings = array(
					'fb_id'			=> '',
					'delay'			=> '2000',
					'show_once'		=> '0',
					'coc'			=> '0',
					'cooc'			=> '1'
				);
	/*
	 * Normalize setting array to output
	 * @require $arr !=null
	 * @ensure foreach ($a;$a) :
	 */
	public static function normalize_settings($arr_settings){
		/* checkboxes which aren't set, default to '0' to remove javascript conditional checks */
		$arr_settings = array_merge(array(	
					'fb_id'			=> '',
					'delay'			=> '2000',
					'show_once'		=> '0',
					'coc'			=> '0'
				
					),$arr_settings);

		

		return $arr_settings;
	}

}
 ?>