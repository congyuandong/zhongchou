$(document).ready(function(){
	switch_sms_type();
	switch_send_type();
	$("select[name='sms_type']").bind("change",function(){
		switch_sms_type();
	});
	$("select[name='send_type']").bind("change",function(){
		switch_send_type();
	});
	
});

//切换sms_type, 短信类型
function switch_sms_type()
{
	var sms_type = $("select[name='sms_type']").val();
	if(sms_type==0) //普通短信
	{
		$("#deal_id").hide();
		$("input[name='deal_id']").val('');
	}
	else
	{
		$("#deal_id").show();
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


function gen_deal_sms()
{
	var deal_id = $("input[name='deal_id']").val();
	$.ajax({ 
			url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=gen_deal_sms&id="+deal_id, 
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
					if($("textarea[name='content']").val()=='')
					{
						$("textarea[name='content']").val(obj.data);
					}					
				}
			}
	});
}