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
(function ($) {
	// Here "$" is a jQuery reference
$(document).ready(function() {
	$('.tabbed').on('click','.sltabhead',function(e){dothetab(e);});
	$('.tabbed').each(function(index,elem){elem=$(elem).find('.sltabhead').get(0);dothetab($(elem));});
});

function dothetab(e){
	if (e.target==undefined) {
		ad=e;
	} else { ad=e.target; }
	$(ad).addClass('slactive').removeClass('slinactive');
	var index=$(ad).prevAll('.sltabhead').removeClass('slactive').addClass('slinactive').length;
	$(ad).closest('.tabbed').find('.sltab').each(function(i,elem){if (i!=index) {$(elem).hide();} else{$(elem).show();}});
	$(ad).nextAll('.sltabhead').removeClass('slactive').addClass('slinactive');

    }

})(jQuery)