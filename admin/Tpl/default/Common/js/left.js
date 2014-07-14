$(document).ready(function(){
	$(".menu").find("a").bind("click",function(){
		$(".menu").find("a").removeClass("current");
		parent.main.location.href = $(this).attr("href");
		$(this).addClass("current");
		return false;
	});
	
	$(".menu").find("a").first().click();
});