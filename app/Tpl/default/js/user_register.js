$(document).ready(function(){
	bind_user_register();	
});

function clear_tip_box(obj)
{
	$(obj).parent().find(".tip_box").html("");
}
function form_error(obj,str)
{
	$(obj).parent().find(".tip_box").html("<div class='form_error'>"+str+"</div>");
}
function form_success(obj,str)
{
	$(obj).parent().find(".tip_box").html("<div class='form_success'>"+str+"</div>");
}
function form_tip(obj,str)
{
	$(obj).parent().find(".tip_box").html("<div class='form_tip'>"+str+"</div>");
}
function form_loading(obj)
{
	$(obj).parent().find(".tip_box").html("<div class='form_loading'></div>");
}

function bind_user_register()
{
	$("#user_register_form").find("input[name='submit_form']").bind("click",function(){
		do_register();
	});
	$("#user_register_form").find("input[name='email']").bind("keydown",function(e){
		if(e.keyCode==13||e.keyCode==9)
		{
			check_register_email();
			if($.trim($(this).val())=="")
			$("#user_register_form").find("input[name='email']").val("电子邮箱");
			$("#user_register_form").find("input[name='user_pwd']").val("");
			$("#user_register_form").find("input[name='user_pwd']").focus();
			return false;
		}
	});
	$("#user_register_form").find("input[name='user_pwd']").bind("keydown",function(e){
		if(e.keyCode==13||e.keyCode==9)
		{
			check_register_user_pwd();
			$("#user_register_form").find("input[name='confirm_user_pwd']").val("");
			$("#user_register_form").find("input[name='confirm_user_pwd']").focus();
			return false;
		}
	});
	$("#user_register_form").find("input[name='confirm_user_pwd']").bind("keydown",function(e){
		if(e.keyCode==13||e.keyCode==9)
		{
			check_register_confirm_user_pwd();
			$("#user_register_form").find("input[name='user_name']").val("");
			$("#user_register_form").find("input[name='user_name']").focus();
			return false;
		}
	});
	$("#user_register_form").find("input[name='user_name']").bind("keydown",function(e){
		if(e.keyCode==13)
		{
			do_register();
			return false;
		}
	});
	
	
	$("#user_register_form").find("input[name='email']").bind("focus",function(){
		if($.trim($(this).val())=="电子邮箱")
		{
			clear_tip_box($(this));
			$(this).val("");
		}
	});
	$("#user_register_form").find("input[name='email']").bind("blur",function(){
		check_register_email();
		if($.trim($(this).val())=="")
		$("#user_register_form").find("input[name='email']").val("电子邮箱");
	});
	$("#user_register_form").find("input[name='user_name']").bind("blur",function(){
		check_register_user_name();
		
	});
	$("#user_register_form").find("input[name='user_pwd']").bind("blur",function(){
		check_register_user_pwd();
		
	});
	$("#user_register_form").find("input[name='confirm_user_pwd']").bind("blur",function(){
		check_register_confirm_user_pwd();
		
	});
	
	
	$("#user_register_form").bind("submit",function(){
		return false;
	});
}


function check_register_email()
{
	if($.trim($("#user_register_form").find("input[name='email']").val())=="")
	{
		form_tip($("#user_register_form").find("input[name='email']"),"请输入邮箱");		
	}
	else
	{
		check_field($("#user_register_form").find("input[name='email']"),"email",$("#user_register_form").find("input[name='email']").val());
	}
}

function check_register_user_name()
{
	if($.trim($("#user_register_form").find("input[name='user_name']").val())=="")
	{
		form_tip($("#user_register_form").find("input[name='user_name']"),"请输入会员帐号");
	}
	else
	{
		check_field($("#user_register_form").find("input[name='user_name']"),"user_name",$("#user_register_form").find("input[name='user_name']").val());
	}
}

function check_register_user_pwd()
{
	if($.trim($("#user_register_form").find("input[name='user_pwd']").val())=="")
	{
		form_tip($("#user_register_form").find("input[name='user_pwd']"),"请输入会员密码");
	}
	else if($.trim($("#user_register_form").find("input[name='user_pwd']").val()).length<4)
	{
		form_error($("#user_register_form").find("input[name='user_pwd']"),"密码不得小于四位");
	}
	else
	{
		form_success($("#user_register_form").find("input[name='user_pwd']"),"");
	}
}

function check_register_confirm_user_pwd()
{
	if($.trim($("#user_register_form").find("input[name='confirm_user_pwd']").val())!=$.trim($("#user_register_form").find("input[name='user_pwd']").val()))
	{
		form_error($("#user_register_form").find("input[name='confirm_user_pwd']"),"确认密码失败");
	}
	else
	{
		form_success($("#user_register_form").find("input[name='confirm_user_pwd']"),"");
	}
}

var is_submiting = false;
function do_register()
{
	if(!is_submiting)
	{
		is_submiting = true;
		var email = $.trim($("#user_register_form").find("input[name='email']").val());
		if(email=="电子邮箱")email="";
		var user_pwd = $.trim($("#user_register_form").find("input[name='user_pwd']").val());
		var confirm_user_pwd = $.trim($("#user_register_form").find("input[name='confirm_user_pwd']").val());
		var user_name = $.trim($("#user_register_form").find("input[name='user_name']").val());
		if(email!=""||user_name!="")
		{
			var ajaxurl = APP_ROOT+"/index.php?ctl=user&act=do_register";
			var query = new Object();
			query.email = email;
			query.user_name = user_name;
			query.user_pwd = user_pwd;
			query.confirm_user_pwd = confirm_user_pwd;
			if(email!="")
			{
				form_loading($("#user_register_form").find("input[name='email']"));
			}
			if(user_name!="")
			{
				form_loading($("#user_register_form").find("input[name='user_name']"));
			}
			$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				data:query,
				type: "POST",
				success: function(ajaxobj){
					if(ajaxobj.status==1)
					{
						form_success($("#user_register_form").find("input[name='email']"),"");
						form_success($("#user_register_form").find("input[name='user_name']"),"");
						form_success($("#user_register_form").find("input[name='user_pwd']"),"");
						form_success($("#user_register_form").find("input[name='confirm_user_pwd']"),"");
						location.href = ajaxobj.jump;
					}
					else
					{
						is_submiting = false;
						if(ajaxobj.info!="")
						{
							$.showErr(ajaxobj.info,function(){
								location.href = APP_ROOT+"/";
							});
						}
						for(var i=0;i<ajaxobj.data.length;i++)
						{
							 if(ajaxobj.data[i].type=="form_success")
							 {
								 form_success($("#user_register_form").find("input[name='"+ajaxobj.data[i].field+"']"),"");
							 }
							 if(ajaxobj.data[i].type=="form_error")
							 {
								 form_error($("#user_register_form").find("input[name='"+ajaxobj.data[i].field+"']"),ajaxobj.data[i].info);
							 }
							 if(ajaxobj.data[i].type=="form_tip")
							 {
								 form_tip($("#user_register_form").find("input[name='"+ajaxobj.data[i].field+"']"),ajaxobj.data[i].info);
							 }						
						}
					}
				},
				error:function(ajaxobj)
				{
					is_submiting = false;
					if(email!="")
					{
						clear_tip_box($("#user_register_form").find("input[name='email']"));
					}
					if(user_name!="")
					{
						clear_tip_box($("#user_register_form").find("input[name='user_name']"));
					}
				}
			});
		}
		else
		{
			is_submiting = false;
			form_tip($("#user_register_form").find("input[name='user_name']"),"请输入会员帐号");
			form_tip($("#user_register_form").find("input[name='email']"),"请输入邮箱");
			if(user_pwd=="")
			form_tip($("#user_register_form").find("input[name='user_pwd']"),"请输入会员密码");	
			else if(user_pwd.length<4)
			form_error($("#user_register_form").find("input[name='user_pwd']"),"密码不得小于四位");	
			else
			form_success($("#user_register_form").find("input[name='user_pwd']"),"");
			
			if(user_pwd==confirm_user_pwd)
			{
				form_success($("#user_register_form").find("input[name='confirm_user_pwd']"),"");
			}
			else
			{
				form_error($("#user_register_form").find("input[name='confirm_user_pwd']"),"确认密码失败");
			}
		}
	}
}


function check_field(o,field,value)
{
	var ajaxurl = APP_ROOT+"/index.php?ctl=user&act=register_check";
	var query = new Object();
	query.field = field;
	query.value = value;
	form_loading(o);
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		data:query,
		type: "POST",
		success: function(ajaxobj){
			if(ajaxobj.status==1)
			{
				form_success(o,"");			
			}
			else
			{
				form_error(o,ajaxobj.info);							
			}
		},
		error:function(ajaxobj)
		{
			clear_tip_box(o);
		}
	});
}