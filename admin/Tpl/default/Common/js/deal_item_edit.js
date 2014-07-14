function load_delivery()
{
	var is_delivery = $("select[name='is_delivery']").val();
	if(is_delivery==0)
	{
		$("input[name='delivery_fee']").val('');
		$("#delivery_fee").hide();
	}
	else
	{
		$("#delivery_fee").show();
	}
}

function load_limit_user()
{
	var is_limit_user = $("select[name='is_limit_user']").val();
	if(is_limit_user==0)
	{
		$("input[name='limit_user']").val('');
		$("#limit_user").hide();
	}
	else
	{
		$("#limit_user").show();
	}
}

$(document).ready(function(){
	load_delivery();
	load_limit_user();
	$("select[name='is_delivery']").bind("change",function(){load_delivery();});
	$("select[name='is_limit_user']").bind("change",function(){load_limit_user();});
});
