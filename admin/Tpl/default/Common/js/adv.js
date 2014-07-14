$(document).ready(function(){
	load_file();
	$("select[name='tmpl']").bind("change",function(){
		load_file();
	});
	$("select[name='file']").bind("change",function(){
		load_adv_id();
	});
});
function load_file()
{
	var tmpl = $("select[name='tmpl']").val();
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_file&tmpl="+tmpl, 
		data: "ajax=1",
		dataType: "json",
		success: function(obj){
			var files = obj.data;
			var html = "<option value=''>=="+LANG['EMPTY_SELECT']+"==</option>";
			for(i=0;i<files.length;i++)
			{
				html += "<option value='"+files[i]+"'>"+files[i]+"</option>";
			}
			$("select[name='file']").html(html);	
			load_adv_id();
		}
	});
}
function load_adv_id()
{
	var tmpl = $("select[name='tmpl']").val();
	var file = $("select[name='file']").val();
	
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_adv_id&tmpl="+tmpl+"&file="+file, 
		data: "ajax=1",
		dataType: "json",
		success: function(obj){
			var adv_ids = obj.data;
			var html = "<option value=''>=="+LANG['EMPTY_SELECT']+"==</option>";
			for(i=0;i<adv_ids.length;i++)
			{
				html += "<option value='"+adv_ids[i]+"'>"+adv_ids[i]+"</option>";
			}
			
			$("select[name='adv_id']").html(html);
		}
	});
}