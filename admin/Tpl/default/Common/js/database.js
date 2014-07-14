
//数据库备份
function backup()
{
	$("#info").remove();
	if(confirm(LANG['CONFIRM_BACKUP_DB']))
	{
		$.weeboxs.open("<div id='dump_result' style='line-height:80px; text-align:center; color:#f30;'>正在备份数据库</div>", {contentType:'text',showButton:false,title:"请勿刷新本页，请稍候...",width:500,height:80});
		dump_sql("",1,0,0);
	}
		
		
}



function dump_sql(filebase_name,vol,table_key,last_row)
{
	var query = new Object();
	query.vol = vol;
	query.table_key = table_key;
	query.last_row = last_row;
	query.filebase_name = filebase_name;
	query.ajax= 1;
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=dump", 
		data: query,
		dataType: "json",
		success: function(obj){
			if(obj.status)
			{
				if(obj.done==0)
				{
					$("#dump_result").html("数据备份中，共有"+obj.table_total+"张表，已备份"+obj.table_key+"张表，共"+(parseInt(obj.vol)-1)+"卷");
					dump_sql(obj.filebase_name,obj.vol,obj.table_key,obj.last_row);
				}	
				else
				{
					$("#dump_result").html("数据备份成功,共"+obj.vol+"卷");
					location.reload();
				}
			}
			else
			{
				$("#dump_result").html(obj.info);
			}
		}
		,
		error:function(ajaxobj)
		{
//			if(ajaxobj.responseText!='')
//			alert(ajaxobj.responseText);
			$("#dump_result").append("数据备份失败");
		}
	});	
}


function restore_db_fun(filename,vol)
{
	$.ajax({ 
		url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=restore&file="+filename, 
		data: "vol="+vol+"&ajax=1",
		dataType: "json",
		success: function(obj){
			if(obj.status)
			{
				if(obj.done)
				{
					$("#restore_result").html("您已成功恢复数据库");
					location.reload();
				}
				else
				{
					$("#restore_result").html("正在恢复数据库备份"+obj.filename+"_"+obj.vol+".sql");
					restore_db_fun(obj.filename,obj.vol)
				}
			}
			else
			{
				$("#restore_result").html(obj.info);
			}
		}
	,
		error:function(ajaxobj)
		{
	//		if(ajaxobj.responseText!='')
	//		alert(ajaxobj.responseText);
			$("#dump_result").append("数据恢复失败");
		}
	});	
}

function restore_db(filename)
{
	$("#info").remove();
	if(confirm(LANG['CONFIRM_RESTORE_DB']))
	{
		$.weeboxs.open("<div id='restore_result' style='line-height:80px; text-align:center; color:#f30;'>正在恢复数据库备份"+filename+"_1.sql</div>", {contentType:'text',showButton:false,title:"请勿刷新本页，请稍候...",width:500,height:80});
		restore_db_fun(filename,1);
	}
		
}
function delsql(filename)
{
	if(confirm(LANG['CONFIRM_DELETE_DB']))
		$.ajax({ 
				url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=delete&file="+filename, 
				data: "ajax=1",
				dataType: "json",
				success: function(obj){
					$("#info").html(obj.info);
					if(obj.status==1)
					location.href=location.href;
				}
		});	
}
