<?php 
class arvlbActivate
{
	

	public static function on_activate(){
	    $o 		= get_option('arv_fb24_opt',array());

	    $def 	= arvlbSHARED::getDefaults();
	    if (empty($o)){
	    	update_option('arv_fb24_opt', $def);

	    }elseif (empty($o['install_date'])){
			$o['install_date'] = time();
	    	update_option('arv_fb24_opt',$o);

	    }


		return;
	}

	public static function on_deactivate(){

		return;
	}
} 


?>