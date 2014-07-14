$(document).ready(function(){
	bind_group();
});
function bind_group()
{
	$("select[name='group']").bind("change",function(){
		init_group();
	});
	init_group();
}
function init_group()
{
	var group = $("select[name='group']").val();
	if(group=="")
	{
		$("input[name='define_group']").show();
		$("input[name='define_group']").addClass("require");
	}
	else
	{
		$("input[name='define_group']").hide();
		$("input[name='define_group']").removeClass("require");
	}
}