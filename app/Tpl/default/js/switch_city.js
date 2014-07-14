//切换地区
$(document).ready(function(){	
		$("select[name='province']").bind("change",function(){
			load_city();
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