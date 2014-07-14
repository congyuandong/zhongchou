$(document).ready(function(){
	bind_comment_box_event();
	$(".comment_item").hover(function(){
		$(this).find(".delcomment").show();
	},function(){
		$(this).find(".delcomment").hide();
	});
});


function bind_comment_box_event()
{
	$(".deal_update").find("textarea[name='content']").unbind("focus click blur");
	$(".send_btn").unbind("click");
	$(".comment_form").unbind("submit");
	$(".delcomment").unbind("click");
	$(".replycomment").unbind("click");	

	
	
	$(".replycomment").bind("click",function(){
		if($(this).parent().parent().find(".reply_box").css("display")=="none")
			$(this).parent().parent().find(".reply_box").show();
		else
			$(this).parent().parent().find(".reply_box").hide();	
	});
	
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
						$(comment_box).remove();
						$("#comment_"+ajaxobj.logid+"_tip").html(ajaxobj.counthtml);
						close_pop();
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
	
	$(".deal_update").find("textarea[name='content']").bind("focus click",function(){
		if($.trim($(this).val())=="发表评论")
		{
			$(this).val("");
		}
		$(this).addClass("inputing");
		$(this).parent().parent().find(".comment-btn").show();
	});
	
	$(".deal_update").find("textarea[name='content']").bind("blur",function(){
		if($.trim($(this).val())=="发表评论"||$.trim($(this).val())=="")
		{
			$(this).val("发表评论");
			$(this).removeClass("inputing");
			$(this).parent().parent().find(".comment-btn").hide();
		}
		
	});
	
	
	
	$(".send_btn").bind("click",function(){	
		if($(this).find("div span").html()!="发送中")
		$(this).parent().parent().submit();		
	});
	
	$(".comment_form").bind("submit",function(){
		var btn = $(this).find(".send_btn");
		var form = $(this);
		if($.trim($(this).find("textarea[name='content']").val())==""||$.trim($(this).find("textarea[name='content']").val())=="发表评论")
		{
			$(this).find("textarea[name='content']").focus();
			return false;
		}
		var ajaxurl = $(this).attr("action");
		var query = $(this).serialize();
		var log_id = $(this).attr("rel");
		//var comment_list_box = $("#deal_comment_list_"+log_id);
		var comment_pid = $(this).find("input[name='comment_pid']").val();			
		$(btn).find("div span").html("发送中");
		
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success: function(ajaxobj){
				if(ajaxobj.status==1)
				{
					$("#reply_box_"+comment_pid).fadeOut(function(){
						location.reload();
					});
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
		return false;
	}); //end comment_form_onsubmit
}
