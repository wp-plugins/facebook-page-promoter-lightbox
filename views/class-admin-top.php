<?php
/*
 * This class enables configuration of all front-end options of
 * google analytics and specific back-end options.
 * @author Arevico
 */
class arvlbAdminTop extends arvlbAdminViewSimple{ 

	/*
 	* Initilizes a simple option view, with option arvlb-global
 	*/
	function __construct(){
		parent::__construct('arv_fb24_opt',arvlbSHARED::getDefaults() );
		
	}

	
	/*
	 * Renders a page
	 */
	public function render_page(){
		$o = $this->options;
			
?>	
<div class="wrap arv-opt">

	
	<div class="updated">
	<div style="float:left;">
	<?php 
	if (  (!empty($o['o'])) && (!empty($o['o']['install_date'])) && (time()-$o['o']['install_date'] > 60 * 60 * 24 * 7)){?>
		Take a look at the <a href="http://arevico.com/sp-facebook-lightbox-premium/" target="_blank" style="text-decoration:underline;">Premium Version</a> for more options!&nbsp;&nbsp; <a href="https://wordpress.org/support/view/plugin-reviews/facebook-page-promoter-lightbox" target="_blank">Love it? Rate us 5 stars.</a>.
		
		<?php }else{ ?>
		Take a look at the <a href="http://arevico.com/sp-facebook-lightbox-premium/" target="_blank" style="text-decoration:underline;">Premium Version</a> for more options!&nbsp;&nbsp; Read the <a href="http://arevico.com/facebook-lightbox-plugin-f-a-q/" target="_blank">F.A.Q.</a> for questions.

		<?php } ?>
	</div>

	<div style="clear:both;"></div>
	</div>
	

<?php
 if ($this->getState()) { ?>
	<div class="updated"> Saved Successfully !</div>
<?php } ?>
<form method="POST">
<?php  wp_nonce_field(-1,'arvlb-update-forms');
	$this->getHidden('o[install_date]');
 ?>
 
<div id="tabs">
  <nav class="navbar nav-fullwidth">
   <ul>
     <li><a href="#tab-general">General</a> </li>
     
   </ul>
  </nav>
  <!-- General -->
   <div class="arv-tab" id="tab-general">
    <div class="onepcssgrid-1000">

    	<div class="col3 formlabel">
    	URL To Facebook Page
		</div>
		<div class="col6 formselect">
			<?php $this->getText('o[fb_id]',array('placeholder' => 'http://facebook.com/example') ); ?>
		</div>
		<div class="col3 last">&nbsp;</div>
		<div class="col12 last">&nbsp;</div>
		

		<div class="col3 formlabel">Show On</div>
		<div class="col3 formselect">
		<?php $this->getCheckbox('o[display_on_page]');  ?> Pages <br />
		<?php	$this->getCheckbox('o[display_on_post]'); ?> Posts <br />
		</div>
		<div class="col3 formselect">
		<?php	$this->getCheckbox('o[display_on_homepage]');  ?> Homepage <br />
		<?php	$this->getCheckbox('o[display_on_archive]'); ?> Archives <br />
		</div>

		<div class="col3 last">&nbsp;</div>

    	<div class="col3 formlabel">
    	Delay
		</div>
		<div class="col6 explain formselect">
			Delay in ms for the lightbox to appear (e.g &gt; 4000)	<br />
			<?php $this->getText('o[delay]'); ?>
		</div>

		<div class="col3 last">&nbsp;</div>

		<div class="col12 last">&nbsp;</div>
		<div class="col12 last">&nbsp;</div>


    	<div class="col3 formlabel">
    	Show Once Every
		</div>
		<div class="col6 explain formselect">
		Show once in the defined amount of days per individual visitor. Enter zero to load on each pageload<br />

		<?php $this->getText('o[show_once]'); ?>
			</div>

		<div class="col3 last">&nbsp;</div>

		<div class="col3 formlabel">Overlay Click</div>
		<div class="col9 last formselect"><?php $this->getCheckbox('o[coc]') ?> Close on overlay click</div>

		<div class="col12 last">&nbsp;</div>

		<div class="col3 formlabel">Submenu</div>
		<div class="col9 formselect last"><?php $this->getCheckbox('o[submenu]'); ?> Show this menu under 'Settings'</div>

		<div class="col12 last">&nbsp;</div>
    
	</div>
	</div>
	<!-- /general-->

	

</div>

<div class="onepcssgrid-1000">
	<div class="col3 formlabel">&nbsp;</div>
	<div class="col4"><input class="add-new-h2" style="width:100%;height:35px;" type="submit" value="  Save  "/>
	<div class="col5 last">&nbsp;</div>
</div>
 
 </div>

</form>



</div>
<?php

} //end do_page


}
 ?>