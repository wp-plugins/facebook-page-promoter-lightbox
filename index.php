<?php 
/*
   Plugin Name: Facebook Page Promoter Lightbox
   Plugin URI:  http://http://wordpress.org/plugins/facebook-page-promoter-lightbox/faq/ 
   Description:  All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.
   Version: 2.6.7
   Author: Arevico
   Author URI: http://arevico.com/sp-facebook-lightbox-premium/
   Copyright: 2013, Arevico
*/
if (!class_exists('SQA'))
		require('includes/moscow.php');

if (!class_exists('FPPLB_SHARED'))
		require('fpplb-shared.php');

if (is_admin() ){
	require('opt-admin.php');
	$FFPLBAdmin = new FFPLBAdmin();
	
	

} else{
	$FPPLB = new FPPLB();
}


/*
 * The frontend class, processes all output
 * @Author H.F. Kluitenberg (Arevico.com)
 */
class FPPLB{

	/* Options retrieved from the database
	 * @invariant options != null*/
	protected $options = array();

	/*
	 * The constructor: Add all hooks and filters required
	 */
	function __construct(){
		$this->get_settings();
		add_action('wp_enqueue_scripts',array($this,'add_assets'));
	}

	/*
	 * Retrieves the required options from the database and sets them
	 * @ensures $options != null
 	 * @ensures $options.length >= 0
	 */
	public function get_settings(){
		if (empty($this->options))
			$this->options = FPPLB_SHARED::normalize_settings(get_option('arv_fb24_opt', FPPLB_SHARED::$default_settings));
	}
	


	/*
	 * Add all front-end assets if needed
	 */
	public function add_assets(){
		$o = $this->options;
		if ((is_front_page() 	&& !empty($o['display_on_homepage']) )
			|| (is_archive() 	&& !empty($o['display_on_archive']))
			|| (is_single() 	&& !empty($o['display_on_post']))
			|| (is_page() 		&& !empty($o['display_on_page']))
				){

		

		wp_register_style('arevico_scsfbcss', plugins_url( 'front-assets/scs/scs.css',__FILE__));
		wp_enqueue_style( 'arevico_scsfbcss'); 

		wp_register_script('arevico_scsfb', plugins_url( 'front-assets/scs/scs.js',__FILE__),array('jquery'));
		wp_enqueue_script ('arevico_scsfb');


		wp_register_script('arevico_scsfb_launch',  plugins_url( 'front-assets/js/launch.js',__FILE__),array('jquery'));
		wp_enqueue_script ('arevico_scsfb_launch');
		wp_localize_script('arevico_scsfb_launch','lb_l_ret',$this->options);

		}
	}

	/* Compatibility mode */
	public function scompat_head(){
		$o=$this->options;
			$locale=(empty($o["fblocale"])  ? "en_US": $o["fblocale"] );
		echo("<meta property=\"fb:app_id\" content=\"{$o["appid"]}\"><script src='//connect.facebook.net/{$locale}/all.js#xfbml=1&amp;appId={$o["appid"]}&amp;version=2.0'></script>
			<script type=\"javascript\">jQuery(document).ready(function(){window.setTimeout(function(){arevicotest();}, 250);});</script>");
	}


 }
 ?>