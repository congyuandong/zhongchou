var notify_sender;
function notify_sender_fun()
{
	window.clearInterval(notify_sender);
	$.ajax({
		url: APP_ROOT+"/msg_send.php?act=notify_msg_list",
		complete:function(data)
		{
		if(!isNaN(data.responseText)&&parseInt(data.responseText)>=1)
		{
			notify_sender = window.setInterval("notify_sender_fun()",10000);
		}
		else
			window.clearInterval(notify_sender);
		}
	});
}
notify_sender_fun();
