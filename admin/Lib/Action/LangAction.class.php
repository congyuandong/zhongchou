<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

//将语言包载入JS
class LangAction extends BaseAction{
	public function js(){
		$str = "var LANG = {";
		foreach($this->lang_pack as $k=>$lang)
		{
			$str .= "\"".$k."\":\"".$lang."\",";
		}
		$str = substr($str,0,-1);
		$str .="};";
		header("Content-Type: text/javascript");
		echo $str;
	}
}
?>