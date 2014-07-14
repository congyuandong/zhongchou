$(document).ready(function(){
	bind_item_form();
	bind_del_image();
	bind_add_item();
	bind_cancel_item();
	bind_del_item();
});
function bind_item_form()
{
	$("#item_form").find("input[name='price']").bind("keyup blur",function(){
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>8)
		{
			$(this).val($(this).val().substr(0,8));
			$("#support_price").html($(this).val().substr(0,8));
			$("#support_price_btn").html($(this).val().substr(0,8));
		}
		else
		$("#support_price").html($(this).val());
		$("#support_price_btn").html($(this).val().substr(0,8));
	});
	
	$("#item_form").find("textarea[name='description']").bind("keyup blur",function(){
		$("#repaid_content").html($(this).val());
	});
	
	$("#item_form").find("select[name='is_delivery']").bind("change",function(){
		if($(this).val()==0)
		{
			$("#item_form").find("input[name='delivery_fee']").parent().hide();
			$("#delivery_box").hide();
		}
		else
		{
			$("#item_form").find("input[name='delivery_fee']").parent().show();
			$("#delivery_box").show();
		}
	});
	
	if($("#item_form").find("select[name='is_delivery']").val()==0)
	{
		$("#item_form").find("input[name='delivery_fee']").parent().hide();
		$("#delivery_box").hide();
	}
	else
	{
		$("#item_form").find("input[name='delivery_fee']").parent().show();
		$("#delivery_box").show();
	}
	
	$("#item_form").find("input[name='delivery_fee']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>8)
		{
			$(this).val($(this).val().substr(0,8));
			$("#delivery_fee_box").html($(this).val().substr(0,8));
		}
		else
		$("#delivery_fee_box").html($(this).val());

	});
	
	
	$("#item_form").find("select[name='is_limit_user']").bind("change",function(){
		if($(this).val()==0)
		{
			$("#item_form").find("input[name='limit_user']").parent().hide();
			$("#limit_user_box").hide();
		}
		else
		{
			$("#item_form").find("input[name='limit_user']").parent().show();
			$("#limit_user_box").show();
		}
	});
	
	if($("#item_form").find("select[name='is_limit_user']").val()==0)
	{
		$("#item_form").find("input[name='limit_user']").parent().hide();
		$("#limit_user_box").hide();
	}
	else
	{
		$("#item_form").find("input[name='limit_user']").parent().show();
		$("#limit_user_box").show();
	}
	
	
	$("#item_form").find("input[name='limit_user']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>6)
		{
			$(this).val($(this).val().substr(0,6));
			$("#limit_user").html($(this).val().substr(0,6));
			$("#remain_user").html($(this).val().substr(0,6));
		}
		else
		{
			$("#limit_user").html($(this).val());
			$("#remain_user").html($(this).val());
		}

	});

	$("#item_form").find("input[name='repaid_day']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>6)
		{
			$(this).val($(this).val().substr(0,6));
			$("#repaid_day").html($(this).val().substr(0,6));

		}
		else
		{
			$("#repaid_day").html($(this).val());

		}
	
	});
}
function bind_del_image()
{
	$(".image_item").find("span").bind("click",function(){
		del_image($(this));
	});
}

function del_image(o)
{
	
	$(o).parent().remove();
	if($(".image_item").length==0)
	{
		$("#image_box_outer").hide();
	}
}

function bind_add_item()
{
	
	$("#add_item_btn").bind("click",function(){
		if($(".item_row").length>=10)
		{
			$.showErr("回报项目不能超过10个");
			return;
		}
		$("#add_item_form").slideDown(function(){
			$("#add_item_btn").hide();
		});
	});
}

function bind_cancel_item()
{
	$("#cancel_add").bind("click",function(){
		$("#add_item_form").slideUp(function(){
			$("#add_item_btn").show();
		});
	});
}

function bind_del_item()
{
	$(".del_item").bind("click",function(){
		var ajaxurl = $(this).attr("href");
		var query = new Object();
		query.ajax = 1;
		$.showConfirm("确定删除该项吗？",function(){
			close_pop();
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
		});
		
		return false;
	});
}