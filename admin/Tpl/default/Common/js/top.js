$(document).ready(function(){
	//绑定头部清除缓存
//	$("#clearcache").bind("click",function(){
//		$("#info").html(LANG['AJAX_RUNNING']);
//		$("#info").show();
//		$.ajax({ 
//			url: $(this).attr("href"), 
//			data: "ajax=1",
//			dataType: "json",
//			success: function(obj){
//				$("#info").html(obj.info);				
//				$("#info").oneTime(2000, function() {				    
//			    $(this).fadeOut(2,function(){$("#info").html("");});
//			   
//			 });
//			}
//		});
//		return false;
//	});
	
	//绑定菜单按钮
	$("#navs").find("li a").bind("click",function(){
		$("#navs").find("li a").removeClass("current");
		parent.menu.location.href = $(this).attr("href");
		$(this).addClass("current");
		return false;		
	});
	$("#navs").find("li a").bind("focus",function(){$(this).blur();});
	$("#navs").find("li a").first().click();
	
});	