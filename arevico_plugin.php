<?php
class arevico_facebook{
	/**
	 * Constructor
	 */
	function __construct(){
		add_action('wp_enqueue_scripts', array(&$this,'append_javascript'));
	}

	function append_javascript(){
		global $arevico_facebook_opt;
		/*======================================================================*/
		$options=$arevico_facebook_opt->getOption();

		if (((is_single() && ($options['display_on_post']==1) ) || (is_page() && ($options['display_on_page'] ==1)) || (is_archive() && ($options['display_on_archive'] ==1)))
		 || ((is_home() || is_front_page()) && $options['display_on_homepage']==1))  {
		wp_enqueue_script("jquery");
				if ((isset($options['fancybox'])&& $options['fancybox']=='1')){
		
		} else {
		wp_register_style('arevico_scsfbcss',    plugins_url( 'scs/scs.css',__FILE__));
		wp_enqueue_style( 'arevico_scsfbcss'); 

		wp_register_script('arevico_scsfb', plugins_url( 'scs/scs.js',__FILE__));
		wp_enqueue_script ('arevico_scsfb');
	}

		/*=======================================================================*/

		wp_register_script('arevico_scsfb_launch',  plugins_url( 'js/launch.js',__FILE__));
		wp_enqueue_script ('arevico_scsfb_launch');

		wp_localize_script('arevico_scsfb_launch','lb_l_ret',$options);
	}
		/*======================================================================*/

	}
}

?>