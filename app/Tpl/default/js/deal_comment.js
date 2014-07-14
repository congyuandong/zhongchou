$(document).ready(function(){
	bind_comment_form();
	$(".comment_item").hover(function(){
		$(this).find(".delcomment").show();
	},function(){
		$(this).find(".delcomment").hide();
	});
});

function bind_comment_form()
{
	
	$(".delcomment").bind("click",function(){
		var ajaxurl = $(this).attr("href");
		var comment_box = $(this).parent().parent().parent();
		$.showConfirm("确认要删除该记录吗？",function(){
			
			var query = new Object();
			
			query.ajax = 1;
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
	
	$(".replycomment").bind("click",function(){
		if($(this).parent().parent().find(".reply_box").css("display")=="none")
			$(this).parent().parent().find(".reply_box").show();
		else
			$(this).parent().parent().find(".reply_box").hide();	
	});
	
	$("form[name='comment_form']").find(".comment_form_content").val("发表评论");
	$("form[name='comment_form']").find("input[name='syn_weibo']").attr("checked",false);
	$("form[name='comment_form']").find("textarea[name='content']").bind("focus click",function(){
		if($.trim($(this).val())==""||$.trim($(this).val())=="发表评论")
		{
			$(this).val("");
		}
	});
	
	$("form[name='comment_form']").find("textarea[name='content']").bind("blur",function(){
		if($.trim($(this).val())==""||$.trim($(this).val())=="发表评论")
		{
			$(this).val("发表评论");
		}
	});
	
	$(".send_btn").bind("click",function(){
		var form = $(this).parent().parent();	
		var content = $.trim($(form).find("textarea[name='content']").val());
		
		if(content==""||content=="发表评论")
		{
			$(form).find("textarea[name='content']").val("");
			$(form).find("textarea[name='content']").focus();
			return false;
		}
		if($(form).find(".send_btn div span").html()=="发送中")
		{
			return false;
		}
		var ajaxurl = $(form).attr("action");
		var query = $(form).serialize() ;
		$(form).find(".send_btn div span").html("发送中");
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success: function(ajaxobj){
				//$(form).find(".send_btn div span").html("发送");
				if(ajaxobj.status==1)
				{
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
				//$(form).find(".send_btn div span").html("发送");
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		});
	});
	
}