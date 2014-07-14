$(document).ready(function(){
	bind_user_getpassword();	
});



function bind_user_getpassword()
{
	$("#user_getpassword_form").find("input[name='submit_form']").bind("click",function(){
		do_getpassword();
	});
	$("#user_getpassword_form").find("input[name='email']").bind("keydown",function(e){
		if(e.keyCode==13)
		{
			do_getpassword();

		}
	});
	$("#user_getpassword_form").find("input[name='email']").bind("focus",function(){
		if($.trim($(this).val())=="注册邮箱")
		{
			$(this).val("");
		}
	});
	$("#user_getpassword_form").find("input[name='email']").bind("blur",function(){
		if($.trim($(this).val())=="")
		{
			$(this).val("注册邮箱");
		}

	});
	$("#user_getpassword_form").bind("submit",function(){
		return false;
	});
}


function do_getpassword()
{
	if($.trim($("#user_getpassword_form").find("input[name='email']").val())==""||$("#user_getpassword_form").find("input[name='email']").val()=="注册邮箱")
	{
		$.showErr("请输入邮箱",function(){			
			$("user_getpassword_form").find("input[name='email']").val("");
			$("#user_getpassword_form").find("input[name='email']").focus();
			
		});
		return false;
	}
	if(!$.checkEmail($.trim($("#user_getpassword_form").find("input[name='email']").val())))
	{
		$.showErr("邮箱格式有误",function(){			
			$("user_getpassword_form").find("input[name='email']").val("");
			$("#user_getpassword_form").find("input[name='email']").focus();
			
		});
		return false;
	}
	

	var ajaxurl = $("form[name='user_getpassword_form']").attr("action");
	var query = $("form[name='user_getpassword_form']").serialize() ;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		data:query,
		type: "POST",
		success: function(ajaxobj){
			if(ajaxobj.status==1)
			{
				$.showSuccess(ajaxobj.info,function(){
					location.href = APP_ROOT+"/";
				});				
			}
			else
			{
				$.showErr(ajaxobj.info);							
			}
		},
		error:function(ajaxobj)
		{
//			if(ajaxobj.responseText!='')
//			alert(ajaxobj.responseText);
		}
	});
}