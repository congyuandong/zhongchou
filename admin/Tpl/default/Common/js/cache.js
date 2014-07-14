$(document).ready(function(){
	$(".ajaxclear").bind("click",function(){
		var url = $(this).attr("rel");		
		$.weeboxs.open(url, {contentType:'ajax',showButton:false,title:"请勿刷新本页，请稍候...",width:300,height:80});
	});
	$("#syn_data").bind("click",function(){
		var ajaxurl = $(this).attr("rel");	
		$.weeboxs.open("<div style='height:30px; color:#f30; line-height:30px; text-align:center;' id='syn_data_info'>正在准备同步数据</div><div class='dialog-loading' style='height:50px;'></div>", {contentType:'text',showButton:false,title:"请勿刷新本页，请稍候...",width:300,height:80});
		syn_data(ajaxurl);

	});

});

function syn_data(ajaxurl)
{
	$.ajax({ 
		url: ajaxurl, 
		data: "ajax=1",
		dataType: "json",
		success: function(obj){
			if(obj.status)
			{
				//同步成功
				$(".dialog-content").html(obj.info);
			}
			else
			{
				$("#syn_data_info").html(obj.info);
				syn_data(obj.url);
			}
		}
	});
}