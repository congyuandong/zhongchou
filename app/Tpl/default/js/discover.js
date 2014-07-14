$(document).ready(function(){
	bind_event();
	ajax_load();
});

function bind_event()
{
	$("#pin_loading").css("visibility","hidden");
	$(".pages").hide();
	$(window).bind("scroll", function(e){
		ajax_load();
	});
}


var step = 2;
var is_loading = false;

function ajax_load()
{
	var scrolltop = $(window).scrollTop();
	var loadheight = $("#pin_loading").offset().top;
	var windheight = $(window).height();	
	var ajaxurl = $("#pin_loading").attr("rel");
	
	//滚动到位置+分段加载未结束+ajax未在运行
    if(windheight+scrolltop>=loadheight+35&&parseInt(step)>0&&!is_loading)
    {
    	var query = new Object();
    	query.step = step;
    	is_loading = true;
    	$("#pin_loading").css("visibility","visible");    	
    	$.ajax({ 
    		url: ajaxurl,
    		data:query,
    		type: "POST",
    		dataType: "json",
    		success: function(data){
    			$("#pin_loading").css("visibility","hidden");
    			$("#pin_box").append(data.html);
    			step = data.step;
    			is_loading = false;     
    			if(step==0)
    			{
    				$(".pages").show();
    			}
    			if(ajax_callback==1)
    			{
    				ajax_load_callback();
    			}
    		},
    		error:function(ajaxobj)
    		{

    		}
    	});	

    	
    }	
}