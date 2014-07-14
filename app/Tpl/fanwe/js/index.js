$(document).ready(function(){
	init_index_image();
});

var play_timer;
function init_index_image()
{
	var time_span = 2000;
	var img_item = $("#index_images").find("a");	
	var total = img_item.length;
	var width = 960;
	$(".roll_box").append($(".roll_box").html());
	$(".roll_box").width(width*total*2+100);
	
	if(total>1)
	{
		var counter_html = "<div class='slider_page'><ul>";
		for(i=1;i<=img_item.length;i++)
		{
			if(i==1)
			counter_html+="<li class='current' rel='"+i+"'></li>";
			else
			counter_html+="<li rel='"+i+"'></li>";
		}
		counter_html+="</ul></div>";
		$("#index_images").append(counter_html);
		$(".slider_page ul").width(total*25);
		

		$(".slider_page").find("li").bind("click",function(){
			show_img($(this).attr("rel"));
		});
		
		
		$(".slider_page").find("li").hover(function(){
			clearInterval(play_timer);
		},function(){
			play_timer = setInterval("auto_play_index_img()",time_span);
		});
		$("#index_images").find("a").hover(function(){
			clearInterval(play_timer);
		},function(){
			play_timer = setInterval("auto_play_index_img()",time_span);
		});
		
		//play_timer = setInterval("auto_play_index_img()",time_span);
		
	}
	
}

function show_img(idx)
{
	
	var oidx = $(".slider_page").find(".current").attr("rel");
	var width = 960;
	if(idx!=oidx)
	{
		$(".roll_box").animate({left:($(".roll_box").position().left-((idx - oidx)*width))+"px"},300,function(){
			$(".slider_page").find("li").removeClass("current");
			$(".slider_page").find("li[rel='"+idx+"']").addClass("current");
		});		
	}
}

function auto_play_index_img()
{
	var width = 960;
	var oidx = parseInt($(".slider_page").find(".current").attr("rel"));
	var img_item = $("#index_images").find("a");	
	var total = img_item.length/2;
	var nidx;
	if(oidx+1>total)
	{
		nidx = 1;
	}
	else
	{
		nidx = oidx+1;
	}	

	$(".roll_box").animate({left:($(".roll_box").position().left-width)+"px"},300,function(){
			$(".slider_page").find("li").removeClass("current");
			$(".slider_page").find("li[rel='"+nidx+"']").addClass("current");
			
			if(nidx==1)
			{
				$(".roll_box").css("left","0");
			}
	});		


}