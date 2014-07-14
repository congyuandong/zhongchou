function account(user_id)
{
	$.weeboxs.open(ROOT+'?m=User&a=account&id='+user_id, {contentType:'ajax',showButton:false,title:LANG['USER_ACCOUNT'],width:600,height:180});
}
function account_detail(user_id)
{
	location.href = ROOT + '?m=User&a=account_detail&id='+user_id;
}

function consignee(user_id)
{
	location.href = ROOT + '?m=User&a=consignee&id='+user_id;
}

function weibo(user_id)
{
	location.href = ROOT + '?m=User&a=weibo&id='+user_id;
}
