var arvlblarvaunched=false;
var arvlbuserstatus = 0;

window.fbAsyncInit = function(){arvlbarevicotest();};

function arvlbarevicotest(){

if (arvlblarvaunched==true)
	return;
	
	arvlblarvaunched=true;
			arvlbarinitcode();
    
	}


function arvlbpreprep(){
  	window.setTimeout(arvlbshow_facebox, lb_l_ret.delay);
}


function arvlbinitFB(){
	if ((typeof(FB)!= 'undefined')) {

    FB.init({
      xfbml: true,    
	  status : true, // check login status
      cookie : true // enable cookies to allow the server to access the session
    });
	
	}
}

function arvlbarinitcode() {
//	if (arvlblarvaunched==true)
//		return;

	arvlbinitFB();

	if (!arvlbcheck_for_launch())
		return false;

	arvlbpreprep();
}


function arvlbcheck_for_launch(){
	if (
		( (lb_l_ret.show_once>0) && arvlbreadCookie('arevico_lb')==1) 
		){
		// Cookies set, don't show
		larvaunched = true;

		return false;
	} else {


	}

	return true;
}


jQuery(document).ready(function() {
    jQuery('body').append('<div id="fb-root"></div>');

    var fb_locale = '';
    if (lb_l_ret.fblocale == '') {
        fb_locale = 'en_US';
    } else {
        fb_locale = lb_l_ret.fblocale
    }

    jQuery.getScript('//connect.facebook.net/' + fb_locale + '/all.js#xfbml=1&appId=' +
        lb_l_ret.appid + "&status=1&cookie=1",
        function(script, textStatus, jqXHR) {
            window.setTimeout(arvlbarevicotest, 200);
        });

});


function arvlbshow_facebox(){
	larvaunched =true;
  	if (lb_l_ret.show_once>0){
		arvlbcreateCookie("arevico_lb", "1", lb_l_ret.show_once);
	}

//jQuery('iframe').css('overflow:hidden;');
$jarevico('a#inline').arevicofancy({
	'modal'            : false,
	'padding'            : 0,
	'scrolling'          : 'no',
	'showCloseButton'    : true,
	'autoDimensions'     : false,
	'width' : '400',
	'height'             : 'auto',
	'centerOnScroll'     : true,
	'hideOnOverlayClick' : (lb_l_ret.coc == 1)
	}).trigger('click');
}

function arvlbcreateCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function arvlbreadCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}


function arvlbisEmpty(obj) {
    for(var prop in obj) {
        if(obj.hasOwnProperty(prop))
            return false;
    }
 
    return true;
}

