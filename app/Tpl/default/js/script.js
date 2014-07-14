var ajax_callback = 0;
$(document).ready(function(){
	/*
	$("img").one("error",function(){
		$(this).attr("src",ERROR_IMG);
	});
	$.each($("img"),function(i,n){
		if($(n).attr("src")=='')
			$(n).attr("src",ERROR_IMG);
	});
	$(".lazy,.lazy img").lazyload({ 
		placeholder : LOADER_IMG,
		threshold : 0,
		event:"scroll",
		effect: "fadeIn",
		failurelimit : 10
	});

	*/
	
	$("#close_user_notify").bind("click",function(){
		$.ajax({ 
			url: APP_ROOT+"/index.php?ctl=ajax&act=close_notify",
			type: "POST",
			success: function(ajaxobj){
				$("#close_user_notify").remove();
			},
			error:function(ajaxobj)
			{
//				if(ajaxobj.responseText!='')
//				alert(ajaxobj.responseText);
			}
		});
	});
	
	if($("#mycenter").length>0)
	{
		$("#user_notify_tip").css("position","absolute");	
		$("#user_notify_tip").css("top",$("#mycenter").position().top+$("#mycenter").height()+5);
		var px = ($("#user_notify_tip").width()-$("#mycenter").width())/2;
		$("#user_notify_tip").css("left",$("#mycenter").position().left-px);
		$("#user_notify_tip").show();
		
	
		var toppx = 0;
		try{
			toppx = parseInt($("#user_notify_tip").css("top").replace("px",""));
		}catch(ex)
		{
			
		}
		$(window).scroll(function(){
			$("#user_notify_tip").css("top",$(document).scrollTop());
			try{
				toppx = parseInt($("#user_notify_tip").css("top").replace("px",""));
			}catch(ex)
			{
				
			}
			if(toppx<=27)
			{
				$("#user_notify_tip").css("top",27);
			}		
		});	
		$("#user_notify_tip").css("top",$(document).scrollTop());	
		if(toppx<=27)
		{
			$("#user_notify_tip").css("top",27);
		}	
	}
	
	//加载主导航的焦点取消
	$("a").bind("focus",function(){
		$(this).blur();
	});
	bind_user_loginout();
	init_form_button_style();
	init_common_form_button_style();
	bind_ajax_form();
	
	try{
	bind_drop_panel($("#mymessage"),$("#mymessage_drop").html());
	$("#mymessage_drop").remove();
	bind_drop_panel($("#mycenter"),$("#mycenter_drop").html());
	$("#mycenter_drop").remove();
	}catch(ex){
		
	}
	
	try{
	bind_drop_panel($("#api_login_tip"),$("#api_login_tip_drop").html());
	$("#api_login_tip_drop").remove();
	}catch(ex){
		
	}
	
	
	init_gotop();
	bind_header_search();
	
});



function init_form_button_style()
{
	$("input[name='submit_form']").bind("mouseover",function(){
		$(this).attr("class",$(this).attr("id")+"_hover");
	});
	$("input[name='submit_form']").bind("mouseout",function(){
		$(this).attr("class",$(this).attr("id")+"");
	});
	$("input[name='submit_form']").bind("mousedown",function(){
		$(this).attr("class",$(this).attr("id")+"_active");
	});
	$("input[name='submit_form']").bind("mouseup",function(){
		$(this).attr("class",$(this).attr("id")+"_hover");
	});
	$("input[name='submit_form']").bind("focus",function(){
		$(this).blur();
	});
}


//用于未来扩展的提示正确错误的JS
$.showErr = function(str,func)
{
	$.weeboxs.open(str, {boxid:'fanwe_error_box',contentType:'text',showButton:true, showCancel:false, showOk:true,title:'错误',width:250,type:'wee',onclose:func});
};

$.showSuccess = function(str,func)
{
	$.weeboxs.open(str, {boxid:'fanwe_success_box',contentType:'text',showButton:true, showCancel:false, showOk:true,title:'提示',width:250,type:'wee',onclose:func});
};
$.showConfirm = function(str,func)
{
	$.weeboxs.open(str, {boxid:'fanwe_confirm_box',contentType:'text',showButton:true, showCancel:true, showOk:true,title:'警告',width:250,type:'wee',onok:func});

};

/*验证*/
$.minLength = function(value, length , isByte) {
	var strLength = $.trim(value).length;
	if(isByte)
		strLength = $.getStringLength(value);
		
	return strLength >= length;
};

$.maxLength = function(value, length , isByte) {
	var strLength = $.trim(value).length;
	if(isByte)
		strLength = $.getStringLength(value);
		
	return strLength <= length;
};
$.getStringLength=function(str)
{
	str = $.trim(str);
	
	if(str=="")
		return 0; 
		
	var length=0; 
	for(var i=0;i <str.length;i++) 
	{ 
		if(str.charCodeAt(i)>255)
			length+=2; 
		else
			length++; 
	}
	
	return length;
};

$.checkMobilePhone = function(value){
	if($.trim(value)!='')
		return /^\d{6,}$/i.test($.trim(value));
	else
		return true;
};
$.checkEmail = function(val){
	var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
	return reg.test(val);
};


function close_pop()
{
	$(".dialog-close").click();
}

function bind_user_login()
{
	$("#user_login_form").find("input[name='submit_form']").bind("click",function(){

		do_login_user();
	});
	$("#user_login_form").find("input[name='user_pwd']").bind("keydown",function(e){
		if(e.keyCode==13)
		{
			do_login_user();
		}
	});
	$("#user_login_form").find("input[name='email']").bind("keydown",function(e){
		if(e.keyCode==9||e.keyCode==13)
		{
			$("#user_login_form").find("input[name='user_pwd']").val("");
			$("#user_login_form").find("input[name='user_pwd']").focus();
			return false;
		}
	});
	$("#user_login_form").find("input[name='email']").bind("focus",function(){
		if($.trim($(this).val())=="邮箱或者用户名")
		{
			$(this).val("");
		}
	});
	$("#user_login_form").find("input[name='email']").bind("blur",function(){
		if($.trim($(this).val())=="")
		{
			$(this).val("邮箱或者用户名");
		}

	});
	$("#user_login_form").bind("submit",function(){
		return false;
	});
}

function bind_user_loginout()
{
	$("#user_login_out").bind("click",function(){
		do_loginout($(this).attr("href"));
		return false;
	});
}

function do_login_user()
{
	
	if($.trim($("#user_login_form").find("input[name='email']").val())==""||$("#user_login_form").find("input[name='email']").val()=="邮箱或者用户名")
	{
		$.showErr("请输入邮箱或者用户名",function(){			
			$("#user_login_form").find("input[name='email']").val("");
			$("#user_login_form").find("input[name='email']").focus();
			
		});
		return false;
	}
	if($.trim($("#user_login_form").find("input[name='user_pwd']").val())=="")
	{
		$.showErr("请输入密码",function(){
			
			$("#user_login_form").find("input[name='user_pwd']").val("");
			$("#user_login_form").find("input[name='user_pwd']").focus();
			
		});
		return false;
	}
	var ajaxurl = $("form[name='user_login_form']").attr("action");
	var query = $("form[name='user_login_form']").serialize() ;

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
				close_pop();
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

function do_loginout(ajaxurl)
{	
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
				//alert(ajaxobj.data);
				var integrate = $("<span id='integrate'>"+ajaxobj.data+"</span>");
				$("body").append(integrate);				
				$("#integrate").remove();
				location.href = ajaxobj.jump;
				
			}
			else
			{
				location.href = ajaxobj.jump;							
			}
		},
		error:function(ajaxobj)
		{
//			if(ajaxobj.responseText!='')
//			alert(ajaxobj.responseText);
		}
	});
}

function bind_drop_panel(o,html)
{
	var timer;
	var drop_o = $(html);
	$(drop_o).hide();
	$(drop_o).css("position","absolute");	
	$(drop_o).css("z-index",10);	
	$(drop_o).css("top",$(o).position().top+$(o).height());
	$("body").append(drop_o);
	
	$(o).hover(function(){
		var x = ($(drop_o).width()-$(o).width())/2;
		$(drop_o).css("left",$(o).position().left-x);
		$(".drop_box").hide();
		clearTimeout(timer);
		$(drop_o).show();
	},function(){		
		 timer = setTimeout(function(){
			 $(drop_o).hide();
	      },500);		
	});
	$(drop_o).hover(function(){		
		$(".drop_box").hide();
		clearTimeout(timer);
		$(drop_o).show();
	},function(){		
		 timer = setTimeout(function(){
			 $(drop_o).hide();
	      },500);		
	});
}

function del_weibo(o)
{
	$(o).parent().remove();
}

function add_weibo()
{
	var ajaxurl = APP_ROOT+"/index.php?ctl=user&act=add_weibo";
	$.ajax({ 
		url: ajaxurl,
		type: "POST",
		success: function(html){
			$("#weibo_list").append(html);
		},
		error:function(ajaxobj)
		{
//			if(ajaxobj.responseText!='')
//			alert(ajaxobj.responseText);
		}
	});
}


function init_common_form_button_style()
{

	$(".ui-button").bind("mouseover",function(){
		$(this).removeClass($(this).attr("rel")+"_hover");
		$(this).removeClass($(this).attr("rel")+"_active");
		$(this).removeClass($(this).attr("rel"));
		$(this).addClass($(this).attr("rel")+"_hover");
	});
	
	$(".ui-button").bind("mouseout",function(){
		$(this).removeClass($(this).attr("rel")+"_hover");
		$(this).removeClass($(this).attr("rel")+"_active");
		$(this).removeClass($(this).attr("rel"));
		$(this).addClass($(this).attr("rel"));
	});
	
	$(".ui-button").bind("mousedown",function(){
		$(this).removeClass($(this).attr("rel")+"_hover");
		$(this).removeClass($(this).attr("rel")+"_active");
		$(this).removeClass($(this).attr("rel"));
		$(this).addClass($(this).attr("rel")+"_active");
	});
	
	$(".ui-button").bind("mouseup",function(){
		$(this).removeClass($(this).attr("rel")+"_hover");
		$(this).removeClass($(this).attr("rel")+"_active");
		$(this).removeClass($(this).attr("rel"));
		$(this).addClass($(this).attr("rel")+"_hover");
	});
	
	
	
}

function bind_ajax_form()
{
	$(".ajax_form").find(".ui-button").bind("click",function(){
		$(".ajax_form").submit();
	});
	$(".ajax_form").bind("submit",function(){
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


function init_gotop()
{
	
	$(window).scroll(function(){
		
		var s_top = $(document).scrollTop()+$(window).height()-70;
		if($.browser.msie && $.browser.version =="6.0")
		{
			$("#gotop").css("top",s_top);
			if($(document).scrollTop()>0)
			{				
				$("#gotop").css("visibility","visible");	
			}
			else
			{
				$("#gotop").css("visibility","hidden");	
			}
		}	
		else
		{
			if($(document).scrollTop()>0)
			{
				if($("#gotop").css("display")=="none")
				$("#gotop").fadeIn();	
			}
			else
			{
				if($("#gotop").css("display")!="none")
				$("#gotop").fadeOut();
			}
		}
		
		
	});		
	
	$("#gotop").bind("click",function(){		
		$("html,body").animate({scrollTop:0},"fast","swing",function(){});		
	});
	var top = $(document).scrollTop()+$(window).height()-70;
	if($.browser.msie && $.browser.version =="6.0")
	{
		$("#gotop").css("top",top);
		if($(document).scrollTop()>0)
		{	
			$("#gotop").css("visibility","visible");
		}
		else
		{
			$("#gotop").css("visibility","hidden");
		}
	}
	else
	{
		if($(document).scrollTop()>0)
		{	
			if($("#gotop").css("display")=="none")
			$("#gotop").show();	
		}
		else
		{
			if($("#gotop").css("display")!="none")
			$("#gotop").hide();
		}
	}
	

}


function bind_header_search()
{
	$("#header_submit").bind("click",function(){
		var kw = $("#header_keyword").val();
		if($.trim(kw)==""||$.trim(kw)=="搜索你想要的...")
		{
			$("#header_keyword").val("");
			$("#header_keyword").focus();
		}
		else
		{
			$("#header_search_form").submit();
		}
	});
	$("#header_search_form").bind("submit",function(){
		var kw = $("#header_keyword").val();
		if($.trim(kw)==""||$.trim(kw)=="搜索你想要的...")
		{
			$("#header_keyword").val("");
			$("#header_keyword").focus();
			return false;
		}
		else
		{
			return true;
		}
	});
	$("#header_keyword").bind("blur",function(){
		var kw = $("#header_keyword").val();
		if($.trim(kw)=="")
		{
			$("#header_keyword").val("搜索你想要的...");
		}
	});
	$("#header_keyword").bind("focus",function(){
		var kw = $("#header_keyword").val();
		if($.trim(kw)=="搜索你想要的...")
		{
			$("#header_keyword").val("");
		}
	});
}

function show_pop_login()
{
	$.weeboxs.open(APP_ROOT+"/index.php?ctl=ajax&act=login", {boxid:'pop_user_login',contentType:'ajax',showButton:false, showCancel:false, showOk:false,title:'会员登录',width:950,type:'wee'});

}

function send_message(user_id)
{
	var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=usermessage&id="+user_id;

	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		type: "POST",
		success: function(ajaxobj){
			if(ajaxobj.status==1)
			{
				$.weeboxs.open(ajaxobj.html, {boxid:'send_message',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'发送私信',width:500,type:'wee'});				
				$("#user_message_form").find("textarea[name='message']").focus();
				bind_usermessage_form();
			}
			else if(ajaxobj.status==2)
			{
				show_pop_login();
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

function bind_usermessage_form()
{
	

		$("#user_message_form").find(".ui-button").bind("click",function(){
			$("#user_message_form").submit();
		});
		$("#user_message_form").bind("submit",function(){
			if($.trim($("#user_message_form").find("textarea[name='message']").val())=="")
			{
				$("#user_message_form").find("textarea[name='message']").focus();
				return false;
			}
			var ajaxurl = $(this).attr("action");
			var query = $(this).serialize() ;
			$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				data:query,
				type: "POST",
				success: function(ajaxobj){
					close_pop();
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