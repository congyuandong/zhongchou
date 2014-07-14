<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class CacheXcacheService extends CacheService
{

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function __construct()
    {
        if ( !function_exists('xcache_info') ) {
           return false;
        }
        $this->type = strtoupper(substr(__CLASS__,6));
		$this->expire = 36000;
    }

    /**
     +----------------------------------------------------------
     * 读取缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    public function get($name)
    {
    	if(app_conf("CACHE_ON")==0)return false;
    	$var_name = md5($name);    	
    	global $$var_name;
    	if($$var_name)
    	{
    		return $$var_name;
    	}
    	if(function_exists("xcache_isset"))
    	{
	   		if (xcache_isset($name)) {
	   			if(function_exists("xcache_get"))
	   			$data = xcache_get($name);
	    		$$var_name = $data;    	
				return $data;
			}
    	}
        return false;
    }

    /**
     +----------------------------------------------------------
     * 写入缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     * @param mixed $value  存储数据
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function set($name, $value,$expire ="-1")
    {
    	if(app_conf("CACHE_ON")==0)return false;
		if($expire=='-1') $expire = 365*3600*24;
		
			$this->log_names($name);
			if(function_exists("xcache_set"))
			return xcache_set($name, $value, $expire);
			else
			return false;			
		
    }

    /**
     +----------------------------------------------------------
     * 删除缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function rm($name)
    {
    	if(function_exists("xcache_unset"))
		return xcache_unset($name);
    }
    
    
    public function clear()
    {
		$names = $this->get_names();
		foreach($names as $name)
		{
			$this->rm($name);
		}
		$this->del_name_logs();
    }

}//类定义结束
?>