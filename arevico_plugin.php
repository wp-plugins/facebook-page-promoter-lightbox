<?php
class arevico_facebook{
	/**
	 * Constructor
	 */
	function __construct(){
		add_action('wp_enqueue_scripts', array(&$this,'append_javascript'));
	}

	function append_javascript(){
		global $current_loc,$arevico_facebook_opt;
		/*======================================================================*/
		$options=$arevico_facebook_opt->getOption();

		if (((is_single() && ($options['display_on_post']==1) ) || (is_page() && ($options['display_on_page'] ==1)))
		 || ((is_home() || is_front_page()) && $options['display_on_homepage']==1))  {
		wp_enqueue_script("jquery");
					/*======================================================================*/
		wp_register_style('arevico_scsfbcss', $current_loc . 'scs/scs.css');
		wp_enqueue_style( 'arevico_scsfbcss');

		wp_register_script('arevico_scsfb',$current_loc . 'scs/scs.js');
		wp_enqueue_script ('arevico_scsfb');

		/*=======================================================================*/

		wp_register_script('arevico_scsfb_launch', $current_loc . 'js/launch.js');
		wp_enqueue_script ('arevico_scsfb_launch');
			$lr  = '';
			$lr .= '<a id="inline" href="#data" style="display: none;">Show</a><div style="display:none"><div id="data" style="background-color:white">';
			$lr .= '<iframe src="//www.facebook.com/plugins/likebox.php?id='.$options['fb_id'].'&amp;width=400&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:258px;" allowTransparency="true"></iframe>';
		$lr .='</div></div>';

		$lr=array('lbcode' => $lr,'delay'=>$options['delay'],'show_once' => $options['show_once']);

		wp_localize_script('arevico_scsfb_launch','lb_l_ret',$lr);
	}
		/*======================================================================*/

	}
}
?>