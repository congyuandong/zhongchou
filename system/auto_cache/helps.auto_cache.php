<?php
//底部文章
class helps_auto_cache extends auto_cache{
	public function load($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$helps = $GLOBALS['fcache']->get($key);
		if($helps === false)
		{
			
			$helps = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."help order by sort asc");
			foreach($helps as $k=>$v)
			{
				if($v['url']=="")
				{
					if($v['type']!='')
					$helps[$k]['url'] = url("help#".$v['type']);
					else
					{
						$helps[$k]['url'] = url("help#".$v['id']);
					}
				}
			}
			
			$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
			$GLOBALS['fcache']->set($key,$helps);
		}
		return $helps;
	}
	public function rm($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->rm($key);
	}
	public function clear_all()
	{
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->clear();
	}
}
?>