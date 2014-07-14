$(document).ready(function(){
	$("#jump_api_register").bind("click",function(){
		location.href = $(this).attr("rel");
	});
	$("#jump_api_login").bind("click",function(){
		location.href = $(this).attr("rel");
	});
	
	bind_user_api_register();
	bind_user_api_login();
});



function bind_user_api_register()
{
	$("#user_api_register_form").find("input[name='submit_form']").bind("click",function(){
		do_api_register();
	});
	$("#user_api_register_form").find("input[name='user_name']").bind("keydown",function(e){
		if(e.keyCode==13)
		{
			do_api_register();

		}
	});
	$("#user_api_register_form").find("input[name='email']").bind("keydown",function(e){
		if(e.keyCode==9||e.keyCode==13)
		{
			$("#user_api_register_form").find("input[name='user_name']").focus();
			return false;
		}
	});
	$("#user_api_register_form").find("input[name='email']").bind("focus",function(){
		if($.trim($(this).val())=="电子邮箱")
		{
			$(this).val("");
		}
	});
	$("#user_api_register_form").find("input[name='email']").bind("blur",function(){
		if($.trim($(this).val())=="")
		{
			$(this).val("电子邮箱");
		}

	});
	$("#user_api_register_form").bind("submit",function(){
		return false;
	});
}


function do_api_register()
{
	if($.trim($("#user_api_register_form").find("input[name='email']").val())==""||$("#user_api_register_form").find("input[name='email']").val()=="电子邮箱")
	{
		$.showErr("请输入邮箱",function(){			
			$("#user_api_register_form").find("input[name='email']").val("");
			$("#user_api_register_form").find("input[name='email']").focus();
			
		});
		return false;
	}
	if($.trim($("#user_api_register_form").find("input[name='user_name']").val())=="")
	{
		$.showErr("请输入用户名",function(){			
			$("#user_api_register_form").find("input[name='user_name']").focus();
			
		});
		return false;
	}
	
	
	
	var ajaxurl = $("form[name='user_api_register_form']").attr("action");
	var query = $("form[name='user_api_register_form']").serialize() ;

	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		data:query,
		type: "POST",
		success: function(ajaxobj){
			if(ajaxobj.status==1)
			{
				location.href = ajaxobj.jump;				
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




function bind_user_api_login()
{
	$("#user_api_login_form").find("input[name='submit_form']").bind("click",function(){
		do_api_login();
	});
	$("#user_api_login_form").find("input[name='user_pwd']").bind("keydown",function(e){
		if(e.keyCode==13)
		{
			do_api_login();

		}
	});
	$("#user_api_login_form").find("input[name='email']").bind("keydown",function(e){
		if(e.keyCode==9||e.keyCode==13)
		{
			$("#user_api_login_form").find("input[name='user_pwd']").focus();
			return false;
		}
	});
	$("#user_api_login_form").find("input[name='email']").bind("focus",function(){
		if($.trim($(this).val())=="邮箱或者用户名")
		{
			$(this).val("");
		}
	});
	$("#user_api_login_form").find("input[name='email']").bind("blur",function(){
		if($.trim($(this).val())=="")
		{
			$(this).val("邮箱或者用户名");
		}

	});
	$("#user_api_login_form").bind("submit",function(){
		return false;
	});
}


function do_api_login()
{
	if($.trim($("#user_api_login_form").find("input[name='email']").val())==""||$("#user_api_login_form").find("input[name='email']").val()=="邮箱或者用户名")
	{
		$.showErr("请输入邮箱",function(){			
			$("#user_api_login_form").find("input[name='email']").val("");
			$("#user_api_login_form").find("input[name='email']").focus();
			
		});
		return false;
	}
	if($.trim($("#user_api_login_form").find("input[name='user_pwd']").val())=="")
	{
		$.showErr("请输入密码",function(){			
			$("#user_api_login_form").find("input[name='user_pwd']").focus();
			
		});
		return false;
	}
	
	
	
	var ajaxurl = $("form[name='user_api_login_form']").attr("action");
	var query = $("form[name='user_api_login_form']").serialize() ;

	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		data:query,
		type: "POST",
		success: function(ajaxobj){
			if(ajaxobj.status==1)
			{
				//alert(ajaxobj.data);
				var integrate = $("<span id='integrate'>"+ajaxobj.data+"</span>");
				$("body").append(integrate);				
				$("#integrate").remove();
				location.href = ajaxobj.jump;
				
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



