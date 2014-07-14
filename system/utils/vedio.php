<?php

function fetch_vedio_url($url)
{	
	$files=file_get_url($url);
	$source_url = "";
	if(strpos($url,'www.tudou.com')!==false)
	{
		if(strpos($url,'.html'))
		{
			preg_match("/iid:(\w+)/i",$files,$items);
			$iid=$items[1];
			if(!empty($iid))
			{
				$source_url="http://www.tudou.com/v/".$iid."/v.swf";
			}
			
		}
		else
		{			
			preg_match("/iid\s*|\s*=\s*|\s*(\w+)/i",$files,$items);
			$iid=$items[1];		
			if(empty($iid))
			{
				$source_url=tudou_get($url);
			}
		}
	
	
	}
	elseif(strpos($url,'v.ku6.com')!==false)
	{
	
		preg_match("/A.VideoInfo(.*)/i",$files,$context);
		$context=$context[1];
		//匹配网页中的内容\"bigpicpath\" 获取图片
		//id:\s*\"([^,]+) 获取 视频ID ，"http://player.ku6.com/refer/$id/v.swf"
		preg_match("/\"bigpicpath\":\"([^,]+)\"/i",$context,$items);
		//json的UTF8 js编码
		$pattner=array('\u003a'=>':','\u002e'=>'.');
		$pic=$items[1];
		if(!empty($pic))
		{
			preg_match("/id:\s*\"([^,]+)\"/i",$context,$items);
			$id=$items[1];
			$source_url="http://player.ku6.com/refer/$id/v.swf";			
		}	
	}
	elseif(strpos($url,'v.youku.com')!==false)
	{
	
		preg_match("/videoId2=(.*)';/i",$files,$items);		
		$videoId2=trim(str_replace('\'','',$items[1]));
		if(!empty($videoId2))
		$source_url="http://player.youku.com/player.php/sid/$videoId2/v.swf";
	}

	return $source_url;
}


function file_get_url($url=''){
	if(!empty($url)){
		$ctx = stream_context_create(array(
			'method'=>'GET',
			'http' => array(  
				'timeout' => 1 //设置一个超时时间，单位为秒  
			)  
		)  
		); 
		$files=file_get_contents($url,false,$ctx);
		return $files;
	}else{
		return false;
	}
}

function tudou_get($url){
	preg_match('#https?://(?:www\.)?tudou\.com/(?:programs/view|listplay/(?<list_id>[a-z0-9_=\-]+))/(?<video_id>[a-z0-9_=\-]+)#i', $url, $matches );
	return  handler_tudou( $matches);
}

function handler_tudou( $matches ) {
	
  $embed = sprintf(
    'http://www.tudou.com/v/%1$s/&resourceId=0_05_05_99&bid=05/v.swf',
    $matches['video_id'] );

  return $embed;
}

?>