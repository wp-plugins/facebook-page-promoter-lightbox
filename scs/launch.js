$j=jQuery.noConflict();

$j(document).ready(function(){
/** lb_l_ret */
	if (lb_l_ret.show_once>0 && readCookie("arevico_lb")==1)
	{

	} else {
		window.setTimeout(show_facebox, lb_l_ret.delay)
	}

});

function show_facebox(){
	if (lb_l_ret.show_once>0){
		createCookie("arevico_lb", "1", lb_l_ret.show_once);
	}
$j('a#inline').fancybox({
	'modal': false,
	'padding' : 0,
	'autoDimensions':false,
	'width' : 400,
	'height': 230,
	'centerOnScroll':true,
	'hideOnOverlayClick' : false
	}).trigger('click');
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}