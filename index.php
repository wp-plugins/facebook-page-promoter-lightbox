<?php 
/*
   Plugin Name: Facebook Page Promoter Lightbox
   Plugin URI:  http://http://wordpress.org/plugins/facebook-page-promoter-lightbox/faq/ 
   Description:  All your visitors should know about your facebook page and tell their friends. With this plugin you can display a preconfigured Facebook Page-Like Box inside a lightbox.
   Version: 3.2
   Author: Arevico
   Author URI: http://arevico.com/sp-facebook-lightbox-premium/
   Copyright: 2013, Arevico
*/

require(dirname(__FILE__) .'/includes/class-moscow.php');
require(dirname(__FILE__) .'/class-activate.php');


if (is_admin() ){
	require(dirname(__FILE__) .'/admin.php');
	$arvlbAdmin 		= new arvlbAdmin();
} else {
  $arvlbFPPL = new arvlbFPPL();
}


class arvlbFPPL 
{
    private $options = null;

    /**
     * Constructor, initializes options
     */
    function __construct(){
      $this->options = get_option('arv_fb24_opt',arvlbSHARED::getDefaults() );
      

      add_action('init'               , array($this,'init'));
      add_action('wp_enqueue_scripts' , array($this, 'addScript'));
    }

    /**
     * Initilize all front-end hooks
     */
    function init(){

    }

    public function add_footer(){
      $o = $this->options;
      
      ?>
<a id="inline" href="#arvlbdata" style="display: none;overflow:hidden;">Show</a>

<div style="display:none">
  <div id="arvlbdata" style="overflow:visible;width:400px;height:250px;">
  <?php if (!empty($o['mab'])) {
    echo $o['mab'];
  } ?>
    <div allowtransparency="true" style="overflow:hidden;width:400px;height:250px;" class="fb-page" 
      data-href="<?php 
      if (!empty($o['fb_id']) && is_numeric($o['fb_id'])){
        echo 'https://facebook.com/' . htmlentities($o['fb_id']);
      }else{
        if (!empty($o['fb_id']))
          echo htmlentities($o['fb_id']);
      } 
      ?>"
      data-width="400" 
      data-height="250" 

      data-small-header="false" 
      data-adapt-container-width="false" 
      data-hide-cover="true" 
      data-show-facepile="true" 
      data-show-posts="false">
    </div>

<?php if (!empty($o['eam']) && (!empty($o['connect']))){ ?>
<div style="padding-bottom:3px;padding-right:3px;text-align:right;display:block;">
  <a href="#" onclick="arvlbfbloginner();" style="text-decoration:none;"><?php if (isset($o['cmessage'])) echo $o['cmessage']; ?> </a>
</div>
<?php } ?>
</div>
</div>
      <?php
    }

    /**
     * Add all scripts required on the front-end
     */
    public function addScript(){
      $o  = $this->options;

    if (
       (is_front_page()  && !empty($o['display_on_homepage']) )
      || (is_archive()  && !empty($o['display_on_archive']))
      || (is_single()   && !empty($o['display_on_post']))
      || (is_page()     && !empty($o['display_on_page']))
      || (!empty($_GET['lightbox']))
        ){

       add_action('wp_footer'          , array($this, 'add_footer'));

    
 if (empty($o['performance']))
      add_action('wp_head', array($this,"scompat_head"),-999);//lower order corresponds with earlier execution

   
    wp_register_style('arevico_scsfbcss', plugins_url( 'includes/front/scs/scs.css',__FILE__));
    wp_enqueue_style( 'arevico_scsfbcss'); 

    wp_register_script('arevico_scsfb', plugins_url( 'includes/front/scs/scs.js',__FILE__),array('jquery'));
    wp_enqueue_script ('arevico_scsfb');


    wp_register_script('arevico_scsfb_launch',  plugins_url( 'includes/front/js/launch.js',__FILE__),array('jquery'));
    wp_enqueue_script ('arevico_scsfb_launch');
    wp_localize_script('arevico_scsfb_launch','lb_l_ret',arvlbSHARED::normalize($o));

    }
  }

  /* Compatibility mode */
  public function scompat_head(){
    $o = $this->options;
    
   
    echo("<script src='//connect.facebook.net/en_EN/all.js#xfbml=1'></script>");
   /* /FREE*/
  }

 }


    /**
     * Function called on activation of the plugin
     */
    function arvlb_arv_activate() {
      arvlbActivate::on_activate();
    }

    /**
     * Function called on de-activation of the plugin
     */    
    function arvlb_arv_deactivate() {
      arvlbActivate::on_deactivate();
    }

  register_activation_hook( __FILE__, 'arvlb_arv_activate' );
  register_uninstall_hook(__FILE__, 'arvlb_arv_deactivate' );
    
    

/**
 * This class contains shared common properties and/or methods
 */
class arvlbSHARED{
  //Defaults for the option table of this plugin
  public static $defaults = array (
  'fb_id'         => '',
  'delay'         => '2000',
  'show_once'       => '0',
  'display_on_homepage'   => '0',
  'coc'         => '0',
  'cooc'          => '1'  );


  /**
   *
   */
  public static function normalize($o){
    $checks = array(
      'width'		   => '400',
      'height'		  => '255',
      'delay'		   => '0',
      'coc'        => '0',
      'fb_id'		   => '' ,
      'cooc'       => '0'
    );

    		

    return array_merge($checks,$o);
  }

  public static function getDefaults(){
    $o = self::$defaults;
    if (empty($o['install_date']))
      $o['install_date'] = time();

    return $o;
  }
  
}

 ?>