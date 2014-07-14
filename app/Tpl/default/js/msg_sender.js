var deal_sender;
function deal_sender_fun()
{
	window.clearInterval(deal_sender);
	$.ajax({
		url: APP_ROOT+"/msg_send.php?act=deal_msg_list",
		complete:function(data)
		{
			deal_sender = window.setInterval("deal_sender_fun()",send_span);
		}
	});
}

$(document).ready(function(){
	
	//关于队列群发检测
	deal_sender = window.setInterval("deal_sender_fun()",send_span);
});