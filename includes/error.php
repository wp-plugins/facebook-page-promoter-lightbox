<?php 
/**
 * @author H.F. Kluitenberg
 * class to easily faciliate error messaging and alerting
 */
if (!class_exists('ArvErrorClass')){
class ArvErrorClass{
	protected $messages;

	function __construct(){
		$this->messages=array();
	}

	public function add($key,$value){
		$this->messages[$key]=$value;
	}


	public function ifempty($key,$message,$arr=null){
		if (is_null($arr))
			$arr=$_POST;
//		if (!isset($_POST[$key]) || $_POST[$key] === ""  || (is_array($_POST[$key]) && count($_POST[$key])==0)  ){
		if (SQA::val($key,$arr,false,false)==""){
			$this->add($key,$message);
			return true;
		}
		return false;
	}




	public function has_error(){
		return !empty($this->messages);
	}

	public function gen_message($sucess=null,$failure=null){

		if (SQA::is_post() || isset($_GET['settings-updated'] )){

			if (is_null($sucess))
				$sucess="Successfully saved!";
			if (is_null($failure))
				$failure="Not saved, correct the errors!";

			$class 	= ($this->has_error() ) ? "updateerror" : "updatesuccess";
			$msg 	= ($this->has_error() ) ?   $failure : $sucess;
			echo("<div class=\"{$class}\"><strong>{$msg}</strong></div>");
		}
	}

	public function gen_js_feedback($include_script=false){
		if (!$this->has_error())
			return;
		$i=0;
		$lret = "";
		foreach ($this->messages as $key => $value) {
			$i++;
			$value=htmlentities($value);
			$lret .= "\$(\"*[name='$key']\").after(\"<span id='ar-error-$i' class='errorlabel'>$value</span>\");\r\n";
			$lret .= "\$(\"*[name='$key']\").addClass('error').blur(function(){\$(this).removeClass(\"error\");$('#ar-error-$i').remove();});\r\n";
		}
		if ($include_script){
			echo "<script>(function (\$) {\$(document).ready(function() {{$lret}});})(jQuery);</script>";
		} else {
			echo "(function (\$) {\$(document).ready(function() {{$lret}});})(jQuery);";	
		}
	}


	}

}// end class exists check
 ?>