$(document).ready(function(){
	bind_pay_form();
});



function bind_pay_form()
{
	$(".pay_form").find(".ui-button").bind("click",function(){
		$(".pay_form").submit();
	});
	$(".pay_form").bind("submit",function(){		
		
		if($(this).find("input[name='payment']:checked").length==0)
		{
			$.showErr("请选择支付方式");
			return false;
		}		
		else
		{
			show_pay_tip();
			return true;
		}
		
	});
}

function show_pay_tip()
{
	var html =  '<div class="pay_tip_box"><div class="empty_tip" style="font-size:14px;">请您在新打开的网银或第三方支付页面上完成付款</div><div class="blank"></div>'+
				'<div class="choose">付款后请选择</div><div class="blank"></div><div class="blank"></div>'+
				'<div class="ui-button green" id="check_payment" rel="green">'+
				'<div>'+
				'	<span>支付成功</span>'+
				'</div>'+
				'</div>	'+
				'<div class="ui-button blue" id="choose_payment" rel="blue" style="margin-left:5px;">'+
				'<div>'+
				'	<span>返回重新选择支付方式</span>'+
				'</div>'+
				'</div> </div><div class="blank"></div>	';
	$.weeboxs.open(html, {boxid:'pay_tip',contentType:'text',showButton:false, showCancel:false, showOk:false,title:'提示',width:450,type:'wee'});

	$("#choose_payment").bind("click",function(){
		close_pop();
	});
	$("#check_payment").bind("click",function(){
		location.href = $("#back_url").val();
	});
}