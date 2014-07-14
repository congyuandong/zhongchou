$(document).ready(function(){
	$(".ui-button").bind("click",function(){
		location.href = $(this).attr("url");
	});
});