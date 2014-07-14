
function upd_file(obj,file_id)
{	

	$("input[name='"+file_id+"']").bind("change",function(){	
		if($("#image_box").find(".image_item").length>=4)
		{
			$.showErr("图片不能超过四张");
			return false;
		}
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/upload_item.php',
				    secureuri:false,
				    fileElementId:file_id,
				    dataType: 'json',
				    success: function (data, status)
				    {
				   		$(obj).show();
				   		$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				   		if(data.status==1)
				   		{
				   			$("#image_box_outer").show();
				   			$("#image_box").append('<div class="image_item">'+
									'<span></span>'+
									'<img src="'+data.thumb_url+'" width=50 height=50 />'+	
									'<input type="hidden" name="image[]" value="'+data.url+'"  />'+	
								'</div>');
				   			bind_del_image();
				 
				   		}
				   		else
				   		{
				   			$.showErr(data.msg);
				   		}
				   		
				    },
				    error: function (data, status, e)
				    {
						$.showErr(data.responseText);;
				    	$(obj).show();
				    	$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				    }
			   }
		   );
		  $("input[name='"+file_id+"']").unbind("change");
	});	
}