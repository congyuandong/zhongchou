$(document).ready(function(){
	bind_add_consignee();
	bind_edit();
	bind_del();
});

function bind_add_consignee()
{	
	$("#add_consignee").bind("click",function(){		
		var ajaxurl = $(this).attr("url");
		$.ajax({ 
			url: ajaxurl,
			type: "POST",
			dataType: "json",
			success: function(ajaxobj){
				if(ajaxobj.status==1)
				{
					$.weeboxs.open(ajaxobj.html, {boxid:'add_consignee',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'添加配送地址',width:480,type:'wee'});

				}
				else
				{
					$.weeboxs.open(ajaxobj.html, {boxid:'user_login',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'用户登录',width:940,type:'wee'});

				}
			},
			error:function(ajaxobj)
			{
//				if(ajaxobj.responseText!='')
//				alert(ajaxobj.responseText);
			}
		});		
		
	});
}

function bind_edit()
{
	$(".edit_consignee").bind("click",function(){
		var ajaxurl = APP_ROOT+"/index.php?ctl=settings&act=edit_consignee";
		var query = new Object();
		query.id = $(this).attr("rel");
		$.ajax({ 
			url: ajaxurl,
			type: "POST",
			dataType: "json",
			data:query,
			success: function(ajaxobj){
				if(ajaxobj.status==1)
				{
					$.weeboxs.open(ajaxobj.html, {boxid:'edit_consignee',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'修改配送地址',width:480,type:'wee'});
				}
				else
				{
					$.weeboxs.open(ajaxobj.html, {boxid:'user_login',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'用户登录',width:940,type:'wee'});
				}
			},
			error:function(ajaxobj)
			{
//				if(ajaxobj.responseText!='')
//				alert(ajaxobj.responseText);
			}
		});		
	});
}

function bind_del()
{
	$(".del_consignee").bind("click",function(){
		var ajaxurl = APP_ROOT+"/index.php?ctl=settings&act=del_consignee";
		var query = new Object();
		query.id = $(this).attr("rel");
		$.showConfirm("确定要删除该记录吗？",function(){			
			$.ajax({ 
				url: ajaxurl,
				type: "POST",
				dataType: "json",
				data:query,
				success: function(ajaxobj){
					if(ajaxobj.status==1)
					{
						location.href = ajaxobj.jump;
					}
					else if(ajaxobj.status ==2)
					{
						$.weeboxs.open(ajaxobj.html, {boxid:'user_login',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'用户登录',width:940,type:'wee'});					
					}
					else
					{
						$.showErr(ajaxobj.info);
					}
				},
				error:function(ajaxobj)
				{
//					if(ajaxobj.responseText!='')
//					alert(ajaxobj.responseText);
				}
			});	
		});
			
	});
}