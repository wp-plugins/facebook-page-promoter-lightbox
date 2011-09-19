<?php
add_action('admin_init', 'arv_fbx_options_init' );
add_action('admin_menu', 'arv_fbx_options_add_page');

// Init plugin options to white list our options
function arv_fbx_options_init(){
	register_setting( 'arv_fbx_opt_group', 'arv_fbx', 'arv_fbx_options_val' );
//delete_option('arv_fbx');
}


// Add menu page
function arv_fbx_options_add_page() {
	add_menu_page('Arevico Settings', 'Facebox Settings', 'manage_options', 'arv_fb', 'arv_fbx_options_do_page');
}
// This function sets default options for an array
function defaulter($arr_opt,$reset=false){
	$defs = array('fancybox'=>'-1','fb_id' => '287663154583826','display_on_page' => '1','display_on_post' => '1','show_once' => '0','delay' => '1000','exc' => '[exclude]');
	$checkboxes = array("display_on_post","display_on_page","fancybox");

	$k_defs=array_keys($defs);


	foreach ($k_defs as $opt){
		/*_____________________________________*/
		if (in_array($opt,$checkboxes) && (!isset($arr_opt[$opt]) || $arr_opt[$opt]=="" )){
			$arr_opt[$opt]=-1;
		}
		if ( (!isset($arr_opt[$opt])) || ($arr_opt[$opt]=="") ){
			$arr_opt[$opt]=$defs[$opt];
		}
		/*_____ _____ ______ ______ ______ ______ _____*/

	} return $arr_opt;
}
// Draw the menu page itself 
function arv_fbx_options_do_page() {
	?>
	<div class="wrap">
	<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
	<?php } ?>


	<div class="updated settings-error">
		<p><strong><a href="http://www.traffictravis.com/trial?aff=Arevico">Check out: Traffic Travis Seo / Traffic software</a></strong></p>
		<a href="http://www.traffictravis.com/trial?aff=Arevico"><img src="http://www.traffictravis.com/img/affiliates/v4/non-animated/728x90.jpg"></a>		
</strong>
	</div>

	<h2>Options</h2>
		<form method="post" action="options.php" id="fl">
			<?php settings_fields('arv_fbx_opt_group'); ?>
			<?php $options = defaulter(get_option('arv_fbx'));?>

			<table class="form-table">
				<tr valign="top"><th scope="row">Facebook Fan Page Numeric ID:</th>
					<td><input type="text" name="arv_fbx[fb_id]" value="<?php echo $options['fb_id']; ?>" /></td>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Show on:</th>
					<td>
					<input name="arv_fbx[display_on_page]" type="checkbox" value="1" <?php checked('1', $options['display_on_page']); ?> /> On Page &nbsp;&nbsp;&nbsp;&nbsp;
					<input name="arv_fbx[display_on_post]" type="checkbox" value="1" <?php checked('1', $options['display_on_post']); ?> /> On Post
					</td>
				</tr>
				<tr valign="top"><th scope="row">Show Once Every x days (0 = on each pageload):</th>
					<td><input type="text" name="arv_fbx[show_once]" value="<?php echo $options['show_once']; ?>" /></td>
				</tr>

				<tr valign="top"><th scope="row">Delay (miliseconds):</th>
					<td><input type="text" name="arv_fbx[delay]" value="<?php echo $options['delay']; ?>" /></td>
				</tr>

				<tr valign="top"><th scope="row">Exclude Shortcode:</th>
					<td><input type="text" name="arv_fbx[exc]" value="<?php echo $options['exc']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Disable Fancybox Load (when already being loaded)</th>
					<td>
					<input name="arv_fbx[fancybox]" type="checkbox" value="1" <?php checked('1', $options['fancybox']); ?> />
					</td>
				</tr>

			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

			</p>

		</form>
	</div>
	<?php
}

// 	tize and validate input. Accepts an array, return a sanitized array.
function arv_fbx_options_val($input) {
	// Our first value is either 0 or 1
	return $input;
}

?>