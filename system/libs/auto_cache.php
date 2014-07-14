<?php
class auto_cache{
	
	//自动组装缓存的key
	protected function build_key($name,$param=array())
	{
		$name = strtoupper($name);
		foreach($param as $sub_key)
		{
			$name.="_".strtoupper($sub_key);
		}
		return $name;
	}	
}

?>