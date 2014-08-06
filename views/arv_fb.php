<?php
if (!defined('ArevicoFPPLBCONST'))
	die("No access!");


class ArvFBAdmin{ 
	protected $options;
	protected $id = null;

	protected $default_dp_rule;


	/**
	* Generates the actual page
	*/
	public function do_page(){
		$o = $this->options;
?>
<div class="wrap" id="arevico-opt-page">
<div class="block">Take a look at the <a href="http://arevico.com/sp-facebook-lightbox-premium/" target="_blank" style="text-decoration:underline;">Premium Version</a> for more options! Read the <a href="http://arevico.com/facebook-lightbox-plugin-f-a-q/" target="_blank">F.A.Q.</a> for questions.</div>
<?php 

if (isset($_GET['settings-updated']) ){
	echo '<div class="updatesuccess">Settings saved successfully!</div>';
} 
?>
<form method="POST" action="options.php">
<?php settings_fields('arv_prm_opt'); 
	$o =FPPLB_SHARED::normalize_settings(get_option('arv_fb24_opt', FPPLB_SHARED::$default_settings));

?>

<div class="tabbed">
			<div class="slheadcontainer">
		<ul>
			<li><a class="sltabhead aactive">General</a></li>
			

		</ul>
		<div class="arv-cb"></div>
		</div>

	<div class="sltab slactive">
		<span class="formlabel">
			Numeric Page ID <sup><a href="http://arevico.com/retrieving-the-facebook-fanpage-id/" target="_blank">(?)</a></sup>
		</span>
		<span class="form-elem">
			<input type="text" name="arv_fb24_opt[fb_id]" value="<?php SQA::val('fb_id',$o,true,true); ?>" />
		</span><br />


		<span class="formlabel formtext">Show on</span>
		<span class="form-elem">
			<input name="arv_fb24_opt[display_on_page]" type="checkbox" value="1" <?php 	checked(SQA::val('display_on_page',$o),'1'); ?>/> On pages <br />	
			<input name="arv_fb24_opt[display_on_post]" type="checkbox" value="1" <?php 	checked(SQA::val('display_on_post',$o),'1'); ?>/> On posts <br />
			<input name="arv_fb24_opt[display_on_homepage]" type="checkbox" value="1" <?php checked(SQA::val('display_on_homepage',$o),'1'); ?> /> On homepage <br />
			<input name="arv_fb24_opt[display_on_archive]" type="checkbox" value="1" <?php 	checked(SQA::val('display_on_archive',$o),'1');  ?> /> On archives 
		</span><br />&nbsp;<br />
	<span class="formlabel formtext">Delay</span>
	<span class="form-elem">
		<div class="extra-info">Specify a delay for the lightbox to appear (recommended &gt; 4000)</div><input type="text" style="width:200px;" name="arv_fb24_opt[delay]" value="<?php SQA::val('delay',$o,true,true);?>" /> Miliseconds
	</span> <br /><br />

	<span class="formlabel formtext">
		Show once every
	</span>
	<span class="form-elem">
	<div class="extra-info">Show once in the defined amount of days per individual visitor. <br />Enter zero to load on each payload</div>
		<input type="text" style="width:200px;" name="arv_fb24_opt[show_once]" value="<?php SQA::val('show_once',$o,true,true); ?>" /> Days
	</span><br />

	<span class="formlabel formtext">Lightbox behaviour</span>
	<span class="form-elem">
		<input name="arv_fb24_opt[coc]" type="checkbox" value="1" <?php 	checked(SQA::val('coc',$o),'1'); ?>/> Close on overlay click<br />	
	</span><br />&nbsp;<br />

</div>

</div><!-- //tabbed -->

	<input type="submit" value="Save Settings"/>
</form>

</div> <!-- #arevico-opt-page -->
<?php

} //end do_page

 

}
 ?>