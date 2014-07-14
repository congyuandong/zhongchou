//切换地区
$(document).ready(function(){	
		$("select[name='province']").bind("change",function(){
			load_city();
		});
		$("input[name='user_id']").bind("blur",function(){
			check_user();
		});
});
	
function load_city()
{
		var id = $("select[name='province']").find("option:selected").attr("rel");
		
		var evalStr="regionConf.r"+id+".c";

		if(id==0)
		{
			var html = "<option value=''>请选择城市</option>";
		}
		else
		{
			var regionConfs=eval(evalStr);
			evalStr+=".";
			var html = "<option value=''>请选择城市</option>";
			for(var key in regionConfs)
			{
				html+="<option value='"+eval(evalStr+key+".n")+"' rel='"+eval(evalStr+key+".i")+"'>"+eval(evalStr+key+".n")+"</option>";
			}
		}
		$("select[name='city']").html(html);		
}

function check_user()
{
	var user_id = $("input[name='user_id']").val();
	if(!isNaN(user_id)&&parseInt(user_id)>0)
	{
		$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"=User&"+VAR_ACTION+"=check_user&id="+user_id, 
		data: "ajax=1",
		dataType: "json",
		success: function(obj){

				if(!obj.status)
				{
					alert("会员ID不存在");
					$("input[name='user_id']").val('');
				}
				
			}
		});
	}
	else
	{
		$("input[name='user_id']").val('');
	}
}

function add_faq()
{
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"=Deal&"+VAR_ACTION+"=add_faq", 
		data: "ajax=1",
		success: function(obj){

			$("#faq").append(obj);
				
		}
		});
}
function del_faq(o)
{
	$(o).parent().remove();
}
