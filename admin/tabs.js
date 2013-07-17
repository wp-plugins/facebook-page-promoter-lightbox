//S.L.A.M 	Tab
/*
<div cass="tabbed">
	<span class="sltabhead">Header 1</span>	<span class="sltabhead">Header 2</span>

	<div class="sltabhead">
		Content 1
	</div>

	<div class="sltabhead">
		Content 2
	</div>

</div>

*/
(function (jQuery) {
	// Here "jQuery" is a jQuery reference
jQuery(document).ready(function() {
	jQuery('.tabbed').on('click','.sltabhead',function(e){dothetab(e);});
	jQuery('.tabbed').each(function(index,elem){elem=jQuery(elem).find('.sltabhead').get(0);dothetab(jQuery(elem));});
});

function dothetab(e){
	if (e.target==undefined) {
		ad=e;
	} else { ad=e.target; }
	jQuery(ad).addClass('slactive').removeClass('slinactive');
	var index=jQuery(ad).prevAll('.sltabhead').removeClass('slactive').addClass('slinactive').length;
	jQuery(ad).closest('.tabbed').find('.sltab').each(function(i,elem){if (i!=index) {jQuery(elem).hide();} else{jQuery(elem).show();}});
	jQuery(ad).nextAll('.sltabhead').removeClass('slactive').addClass('slinactive');

    }

})(jQuery)