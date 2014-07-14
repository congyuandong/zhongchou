$(document).ready(function(){
	bind_del_refund();
});
function bind_del_refund()
{
	$(".delrefund").bind("click",function(){
		var ajaxurl = $(this).attr("href");
		var query = new Object();
		query.ajax = 1;
		$.showConfirm("确定删除该记录吗？",function(){
			$.ajax({ 
					url: ajaxurl,
					dataType: "json",
					data:query,
					type: "POST",
					success: function(ajaxobj){
						if(ajaxobj.status==1)
						{						
							close_pop();
							location.reload();
						}
						else
						{
							if(ajaxobj.info!="")
							{
								$.showErr(ajaxobj.info,function(){
									if(ajaxobj.jump!="")
									{
										location.href = ajaxobj.jump;
									}
								});	
							}
							else
							{
								if(ajaxobj.jump!="")
								{
									location.href = ajaxobj.jump;
								}
							}							
						}
					},
					error:function(ajaxobj)
					{
						if(ajaxobj.responseText!='')
						alert(ajaxobj.responseText);
					}
				});
		
		});
		return false;
	});
}