<?php
/*
 * This class contains all optoins and option pages!
 */
class arevico_facebook_opt{
/*______ CHANGE_______*/
var $defaults;
var $option_group="arv_prm_opt";
var $option_name="arv_fb24_opt";

var $setting_slug="arv_fb";
var $setting_title="Facebook Lightbox";
var $menu_title="Facebook Lightbox";
var $page_title="Settings";

var $can_be_null;
var $global_slug="arevico_settings";
/*______________________*/

function __construct(){
	/*______ DEFAULT OPTIONS________*/
	$this->defaults = array('extracss'=>'','overlayop'=>'0.3','overlaycolor'=>'#666666','display_on_homepage'=>'1' , 'fancybox'=>'-1','fb_id' => '','display_on_page' => '1','display_on_post' => '1','show_once' => '0','delay' => '1000','width'=>'400','height' => '255','display_on_archive'=>'1');
	$this->can_be_null=array('display_on_post','display_on_page','fancybox','display_on_homepage','facebookheader','gaevent','eam','display_on_archive','hideonlike');

	/*__________________________________________________________________*/
	add_action('admin_init', array(&$this,'options_init'));
	add_action('admin_menu', array(&$this,'options_add_page'));
	/*__________________________________________________________________*/
	add_action('admin_enqueue_scripts', array(&$this,'add_scripts'));

}


	public function add_scripts(){
					if (isset($_GET['page']) && strtolower($_GET['page'])=='arv_fb'){

		wp_register_style('arevico-tabs-css', plugins_url("admin/style.css",__FILE__));
		wp_enqueue_style( 'arevico-tabs-css');

		wp_register_script( 'arevico-tabs', plugins_url("admin/tabs.js",__FILE__),array('jquery'));
		wp_enqueue_script(  'arevico-tabs' );
		}

	}


	


	function getOption(){
		/*
		 * Merge array options with default
		 */
		 
		$opt= get_option($this->option_name,$this->defaults);
		$ak= array_merge(array_keys($opt),array_keys($opt),$this->can_be_null) ;

		$ak_not_inc=array_keys($this->can_be_null);
		
		/* For Each aray key*/
		foreach ($ak as $lak){
				if( (!isset($opt[$lak])) && (!in_array($lak,$this->can_be_null))){
				$opt[$lak]=$this->defaults[$lak];
				
				/* for checkbox options */
				} else if( (!isset($opt[$lak])) && (in_array($lak,$this->can_be_null))){
					$opt[$lak]="";
				}

		}
		return $opt;
	}
	function options_init(){
		register_setting( $this->option_group, $this->option_name, array(&$this,'options_val'));
	}


	// Add menu page
	function options_add_page() {
		global $submenu;
		add_menu_page('Arevico Settings', 'Arevico Settings', 'manage_options', $this->global_slug, array(&$this,'tld_page'));
		add_submenu_page( $this->global_slug, $this->page_title, $this->menu_title, 'manage_options', $this->setting_slug, array(&$this,'options_do_page'));

			/* Remove sublevel menu*/
		if (isset($submenu[$this->global_slug][0]) && (array_search($this->global_slug,$submenu[$this->global_slug][0]))!=false) {
			unset($submenu[$this->global_slug][0]);
		}
}
	function tld_page(){

	}
	function options_do_page() {
?>
<div class="wrap">
		<div style="background: #F2F3F6;border: 1px solid #7E8AA2; margin:0;padding: 10px;">
		Take a look at the <a href="http://arevico.com/sp-facebook-lightbox-premium/" style="text-decoration:underline;">Premium Version</a> for more options! Read the <a href="http://arevico.com/facebook-lightbox-plugin-f-a-q/">F.A.Q.</a> for questions.
			</div>
		
	<?php if( isset($_GET['settings-updated']) ) { ?>
    <div style="background: #F2F3F6;border: 1px solid #7E8AA2; margin:0;padding: 10px;margin-top:10px;">
        <strong><?php _e('Settings saved.') ?></strong>
    </div>
	<?php } ?>


	<div id="icon-options-general" class="icon32"><br /></div><h2>Options</h2><br />

		<form method="post" action="options.php" id="fl">
		<?php settings_fields($this->option_group); ?>
		<?php $options=$this->getOption(); ?>

		<div class="tabbed">
			<div class="slheadcontainer"><a class="sltabhead slactive">1: General Options</a>
		</div>
		<!-- 1: General Options -->
		<div class="sltab">
		<span class="lblwide ilb"><b>Facebook fan page numeric ID: <sup><a href="http://arevico.com/retrieving-the-facebook-fanpage-id/">(?)</a></b> </span>
		<span class="lblmiddle ilb">
			<input type="text" name="<?php echo($this->option_name); ?>[fb_id]" value="<?php echo $options['fb_id']; ?>" />
		</span><br /><br />

		<span class="lblwide ilb"><b>Show on</b></span>
		<span class="lblmiddle ilb">
			<input name="<?php echo($this->option_name); ?>[display_on_page]" type="checkbox" value="1" <?php checked('1', $options['display_on_page']); ?> /><span class="chklbl"> On Page</span>
			<input name="<?php echo($this->option_name); ?>[display_on_post]" type="checkbox" value="1" <?php checked('1', $options['display_on_post']); ?> /> <span class="chklbl">On Post</span>
			<input name="<?php echo($this->option_name); ?>[display_on_homepage]" type="checkbox" value="1" <?php checked('1', $options['display_on_homepage']); ?> /><span class="chklbl"> On HomePage</span>
			<input name="<?php echo($this->option_name); ?>[display_on_archive]" type="checkbox" value="1" <?php checked('1', $options['display_on_archive']); ?> /> On Archives;
		</span><br /><br />

	
		<span class="lblwide ilb"><b>Show every x days:</b> </span>
		<span class="lblmiddle ilb">
		<input type="text" style="width:50px;" name="<?php echo($this->option_name); ?>[show_once]" value="<?php echo $options['show_once']; ?>" /> 0 is on each pageload
		</span><br /><br />

		<span class="lblwide ilb"><b>Delay in ms:</b> </span>
		<span class="lblmiddle ilb">
		<input type="text" style="width:50px;" name="<?php echo($this->option_name); ?>[delay]" value="<?php echo $options['delay']; ?>" />
		</span><br />



		<span class="lblwide ilb">Disable Fancybox Load (only in conflict)</span>
		<span class="lblmiddle ilb">
			<input name="<?php echo($this->option_name); ?>[fancybox]" type="checkbox" value="1" <?php checked('1', $options['fancybox']); ?> /> Not sure? Don't check!		
		</span>
	
		</div>

<div class="slheadcontainer"></div>
</div>
	
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>

		</form>

		
	</div>

	<?php
}

function options_val($input) {
	return $input;
}

}
?>