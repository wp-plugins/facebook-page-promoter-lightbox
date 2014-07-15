<?php 
require('includes/error.php');
class FFPLBAdmin
{
	//an array of all slug which are being used and need javascript
	protected $slugs = 
	array(
		"top"				=> "arv_fb"
		);
	
	protected $loaded_pages =array();


	function __construct()
	{
		add_action( 'admin_menu'			, array($this,'add_menus' ) );
		add_action( 'admin_enqueue_scripts'	, array($this,'add_admin_assets') );
		add_action( 'admin_init'			, array($this,'register_settings'));
	}

	/*
	 * Add all menus
	 */
	public function add_menus(){
    	add_menu_page('Facebook Page Promoter Lightbox', 'Arevico Settings', 'manage_options', $this->slugs['top'], array($this,'do_page'));
	}

	/*
	 * Add all javascript and css on those pages which need them
	 */
	public function add_admin_assets(){
		if (!empty($_GET['page']) && in_array($_GET['page'], array_values($this->slugs) ) ){
			wp_enqueue_style( 'arevico-tab-css-admin'	,plugins_url('/admin-assets/style.css',__FILE__ ));
			wp_enqueue_script('arevico-tab-js-admin'	,plugins_url('/admin-assets/tabs.js',__FILE__), array( 'jquery' ) );
			
			SQA::remove_quotes();
		}
	}
	/*
	 * Whitelist our settigns so we may store them
	 */
	public function register_settings(){
		register_setting('arv_prm_opt','arv_fb24_opt', array($this, 'sanitize') ); 
	}

	/* All output is already escaped accordingly*/
	public function sanitize($set=""){ 

		return $set;
	}

	/* = = = = = = = = = = = = = = = = = = THE VIEW PROCEEDS FROM HERE = = = = = = = = = = = = = = = = = = = = = = = = */
	

	public function do_page(){
		define('ArevicoFPPLBCONST', '1');
		$page=$_GET['page'];
		if (!isset($loaded_pages[$page])){
			require ("views/{$page}.php");	
			if (strcasecmp($page, 'arv_fb')==0)
				$this->loaded_pages[$page] = new ArvFBAdmin();
		}
		$this->loaded_pages[$page]->do_page();
	}

}/* END CLASS */
?>