$(document).ready(function(){
	var btns = $(".conf_btn");
	var tabs = $(".conf_tab");
	$.each(btns, function(i, btn){
		$(btn).bind("click",function(){
			$(tabs).hide();
			$(tabs[i]).show();
			$(btns).removeClass("currentbtn");
			$(this).addClass("currentbtn");
		});
		$(btn).bind("focus",function(){$(this).blur();});
	});
	$(btns[0]).click();

});