$(document).ready(function(){
	switch_mail_type();
	switch_send_type();
	$("select[name='mail_type']").bind("change",function(){
		switch_mail_type();
	});
	$("select[name='send_type']").bind("change",function(){
		switch_send_type();
	});
	
	$("#edm").bind("click",function(){
		var mail_type = $("select[name='mail_type']").val();
		var is_html = $("select[name='is_html']").val();
		var send_time = $("input[name='send_time']").val();
		var deal_id = $("input[name='deal_id']").val();
		var title = $("input[name='title']").val();
		var content = KE.util.getData("mail_content_editor");
		var send_type = $("select[name='send_type']").val();
		var city_id = $("select[name='city_id']").val();
		var group_id = $("select[name='group_id']").val();
		var send_define_data = $("textarea[name='send_define_data']").val();
		var type = $("input[name='type']").val();
		var page = 1;
		var query = new Object();
		query.mail_type = mail_type;
		query.is_html = is_html;
		query.send_time = send_time;
		query.title = title;
		query.content = content;
		query.send_type = send_type;
		query.city_id = city_id;
		query.group_id = group_id;
		query.send_define_data = send_define_data;
		query.type = type;
		query.page = page;
		query.deal_id = deal_id;
		query.m = "PromoteMsg";
		query.a = "import_mail";

		import_mail(query);
		
	});
	
});

function import_mail(query)
{
	$.ajax({ 
		url: ROOT, 
		data: query,
		type:"POST",
		dataType: "json",
		success: function(obj){
			if(obj.status==0)
			{
				query.page = query.page + 1;
				import_mail(query);
			}
			else
			{
				alert(obj.info);
			}
		}
	});
}
//切换mail_type, 邮件类型
function switch_mail_type()
{
	var mail_type = $("select[name='mail_type']").val();
	if(mail_type==0) //普通邮件
	{
		$("#deal_id").hide();
		$("input[name='deal_id']").val('');
		$("#is_html").show();
		$("#mail_title").show();
	}
	else
	{
		$("#is_html").hide();
		$("select[name='is_html']").val(0);
		$("#deal_id").show();
		$("#mail_title").hide();
	}
}

//切换发送方式
function switch_send_type()
{
	var send_type = $("select[name='send_type']").val();
	if(send_type==0) //按会员组
	{
		$("#city_id").hide();
		$("#group_id").hide();
		$("#send_define_data").hide();
		$("#group_id").show();
		$("select[name='city_id']").val(0);
		$("textarea[name='send_define_data']").val('');
	}
	else if(send_type==1) //按地区
	{
		$("#city_id").hide();
		$("#group_id").hide();
		$("#send_define_data").hide();
		$("#city_id").show();
		$("select[name='group_id']").val(0);
		$("textarea[name='send_define_data']").val('');
	}
	else
	{
		//只发送自定义
		$("#city_id").hide();
		$("#group_id").hide();
		$("#send_define_data").hide();
		$("#send_define_data").show();
		$("select[name='city_id']").val(0);
		$("select[name='group_id']").val(0);
	}
}


function gen_deal_mail()
{
	var deal_id = $("input[name='deal_id']").val();
	$.ajax({ 
			url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=gen_deal_mail&id="+deal_id, 
			data: "ajax=1",
			dataType: "json",
			success: function(obj){
				if(obj.status==0)
				{
					alert(LANG['NO_EXIST_DEAL']);
					$("input[name='deal_id']").val('');
				}
				else
				{					
					if(KE.util.getData("mail_content_editor")=='')
					{
						KE.util.setFullHtml("mail_content_editor","&nbsp;"+obj.data);
					}					
				}
			}
	});
}