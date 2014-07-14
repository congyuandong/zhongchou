var notify_sender;
function notify_sender_fun()
{
	window.clearInterval(notify_sender);
	$.ajax({
		url: "msg_send.php?act=notify_msg_list",
		success:function(data)
		{
			notify_sender = window.setInterval("notify_sender_fun()",10000);	
		}
	});
}
notify_sender_fun();