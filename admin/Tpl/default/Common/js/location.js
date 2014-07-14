function init_sub_cate()
{
	var cate_id = $("select[name='deal_cate_id']").val();
	var location_id = $("input[name='id']").val();
	
	if(cate_id>0)
	{
		
		$.ajax({ 
			url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_sub_cate&cate_id="+cate_id+"&location_id="+location_id, 
			data: "ajax=1",
			dataType: "json",
			success: function(obj){
				if(obj.status)
				{
					$("#sub_cate_box").show();
					$("#sub_cate_box").find(".item_input").html(obj.data);
				}
				else
				{
					$("#sub_cate_box").hide();
				}
				
			},
			error:function(ajaxobj)
			{
				if(ajaxobj.responseText!='')
				alert(ajaxobj.responseText);
			}
		
		});
	}
	else
	{
		$("#sub_cate_box").hide();
		$("#sub_cate_box").find(".item_input").html("");
	}
}


function init_tag_list(){
	var cate_id = $("select[name='deal_cate_id']").val();
	var id = $("input[name='id']").val();
	if(cate_id>0)
	{
		$.ajax({ 
	            url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_tag_list&cate_id="+cate_id+"&id="+id, 
	            data: "ajax=1",
	            success: function(obj){
					$("#tag_group_preset").find(".item_input").html(obj);
					if(obj!='')
	                	$("#tag_group_preset").show();
					else
						$("#tag_group_preset").hide();	
	            }
	        });
	}
	else
	{
		$("#tag_group_preset").hide();
		$("#tag_group_preset").find(".item_input").html("");
	}
}

$(document).ready(function(){
	$("select[name='deal_cate_id']").bind("change",function(){
		init_sub_cate();
		init_tag_list();
	});
	init_sub_cate();
	init_tag_list();
});