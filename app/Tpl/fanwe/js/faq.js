$(document).ready(function(){
	bind_faq_event();
});
function bind_faq_event()
{
	$(".faq_question").bind("click",function(){
		if($(".faq_answer[rel='"+$(this).attr("rel")+"']").css("display")=="none")
			$(".faq_answer[rel='"+$(this).attr("rel")+"']").slideDown();
		else
			$(".faq_answer[rel='"+$(this).attr("rel")+"']").slideUp();
	});
}