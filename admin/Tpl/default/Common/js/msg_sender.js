
function deal_sender_fun()
{
	window.clearInterval(deal_sender);
	$.ajax({
		url: "msg_send.php?act=deal_msg_list",
		success:function(data)
		{
			if(!isNaN(data)&&parseInt(data)>=1)
			{						
				$("#deal_msg").show();			
			}
			else
			{
				$("#deal_msg").hide();
			}
			deal_sender = window.setInterval("deal_sender_fun()",send_span);
		}
	});
}

var deal_sender = window.setInterval("deal_sender_fun()",send_span);	