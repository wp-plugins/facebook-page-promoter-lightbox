(function ($) {
	// Here "$" is a jQuery reference
$(document).ready(function() {
	$('.tabbed .sltabhead').click(function(e){tabit(e);});
});

function tabit(e){

	var t_root 	= $(e.target).closest('.tabbed');
	var t_li 	= $(e.target).closest('li');
	var a_ul	= $(".slheadcontainer ul li",t_root);
	var a_links	= $('a',a_ul)	
	var c_index = a_ul.index(t_li);
	var tab_el 	= $('.sltab',t_root);

	/* hide all tabs not need at this time, show clicked tab*/
	tab_el.each(
		function(index,elem){
			if (index==c_index){
				$(elem).show();
				$(elem).addClass('slactive');
				a_links.eq(index).addClass('aactive');
			}else {
				$(elem).hide();
				$(elem).removeClass('slactive');
				a_links.eq(index).removeClass('aactive');
			}
		}
	);
}



/* ----------- extra scripts --------------------- */

/* // Add Popup Blocks */
$(document).ready(function() {
	$('#arevico-opt-page .selblock').click(function(e){selblock(e);});
});

function selblock(e){
	$('input[type="radio"]',$(e.target).closest('#arevico-opt-page .selblock')).prop("checked", true);
}
/* ----------- /extra scripts --------------------- */


$(document).ready(function() {
	//showonly_on();
	$('#arevico-opt-page input[name="popup_data[style_inherit]"],#arevico-opt-page input[name="popup_data[script_inherit]"]').click(function(){showonly_on()});
});


function showonly_on(){
	$('div[data-showonly]').each(function(i,e){
	var depend = $(($(e).attr('data-showonly')));
	var checked = arv_is_checked(depend);

		 if(checked){
		 	$(e).show();
		 } else {
		 	$(e).hide();
		 }
	});
}

	function arv_is_checked(e){
		var lret= false;
		if (e.length>1){ /* radio */
			$(e).each(function(i,inp){
				if ($(inp).is('[data-showon]:checked')){
					lret=true
					
				}
				});

		} else { /* checkbox*/
			lret= $(e).is(':checked');
		}
		return lret;
	}

})(jQuery);


