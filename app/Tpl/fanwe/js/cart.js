$(document).ready(function(){
	$("textarea[name='memo']").bind("focus click",function(){
		if($.trim($(this).val())=="在此填写关于回报内容的具体选择或者任何你想告诉项目发起人的话")
		{
			$(this).val("");			
		}		
	});
	
	$("textarea[name='memo']").bind("blur",function(){
		if($.trim($(this).val())=="")
		{
			$(this).val("在此填写关于回报内容的具体选择或者任何你想告诉项目发起人的话");			
		}		
	});
	
	bind_cart_form();
});




function bind_cart_form()
{
	$("#cart_form").find(".ui-button").bind("click",function(){
		$("#cart_form").submit();
	});
	$("#cart_form").bind("submit",function(){
		var ajaxurl = $(this).attr("action");
		var query = $(this).serialize() ;
		$.ajax({ 
			url: ajaxurl,
			dataType: "json",
			data:query,
			type: "POST",
			success: function(ajaxobj){
				if(ajaxobj.status==1)
				{
					if(ajaxobj.info!="")
					{
						$.showSuccess(ajaxobj.info,function(){
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
	});
}