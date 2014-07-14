<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class CacheService 
{//类定义开始

    /**
     +----------------------------------------------------------
     * 是否连接
     +----------------------------------------------------------
     * @var string
     * @access protected
     +----------------------------------------------------------
     */
    protected $connected  ;

    /**
     +----------------------------------------------------------
     * 操作句柄
     +----------------------------------------------------------
     * @var string
     * @access protected
     +----------------------------------------------------------
     */
    protected $handler    ;

    /**
     +----------------------------------------------------------
     * 缓存存储前缀
     +----------------------------------------------------------
     * @var string
     * @access protected
     +----------------------------------------------------------
     */
    protected $prefix='~@';

    /**
     +----------------------------------------------------------
     * 缓存连接参数
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
    protected $options = array();

    /**
     +----------------------------------------------------------
     * 缓存类型
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
    protected $type       ;

    /**
     +----------------------------------------------------------
     * 缓存过期时间
     +----------------------------------------------------------
     * @var integer
     * @access protected
     +----------------------------------------------------------
     */
    protected $expire     ;



    /**
     +----------------------------------------------------------
     * 取得缓存类实例
     +----------------------------------------------------------
     * @static
     * @access public
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    static function getInstance()
    {
       	$type = app_conf("CACHE_TYPE");       
        $cacheClass = 'Cache'.ucwords(strtolower(trim($type)))."Service";
        
        if(file_exists(APP_ROOT_PATH."system/cache/".$cacheClass.".php"))
        {
	        require_once $cacheClass.'.php';
	        if(class_exists($cacheClass))
	        {
	            $cache = new $cacheClass();
	        }
	        else
	            throw_exception('缓存初始化失败:'.$type);
	        return $cache;
        }
        else
        {
        	require_once 'CacheFileService.php';
	        if(class_exists("CacheFileService"))
	            $cache = new CacheFileService();
	        else
	            throw_exception('缓存初始化失败:'.$type);
	        return $cache;
        }
    }

   
    
    protected function log_names($name)
    {
    	$name_logs_files = APP_ROOT_PATH."public/runtime/app/~cache_name.log";  //记录被缓存的名称
    	if(!file_exists($name_logs_files))
    	{
    		@file_put_contents($name_logs_files,'');
    	}
    	else
    	{
    		if($name!='')
    		{
    			$names = @file_get_contents($name_logs_files);
    			$names = unserialize($names);
    			if(is_array($names)&&!in_array($name,$names))
    			{
    				array_push($names,$name);
    			}
    			elseif(!is_array($names))
    			{
    				$names = array();
    				array_push($names,$name);
    			}
    			
    			$names = serialize($names);
    			@file_put_contents($name_logs_files,$names);
    		}
    	}
    }
    
    protected function get_names()
    {
    	$name_logs_files = APP_ROOT_PATH."public/runtime/app/~cache_name.log";  //记录被缓存的名称
  		if(file_exists($name_logs_files))
    	{
    		$names = @file_get_contents($name_logs_files);
    		$names = unserialize($names);
    		if(is_array($names))
    		{
    			return $names;
    		}
    		else
    		{
    			return array();
    		}
    	}
    	else
    	{
    			return array();
    	}
    }
    
    protected function del_name_logs()
    {
    	$name_logs_files = APP_ROOT_PATH."public/runtime/app/~cache_name.log";  //记录被缓存的名称
    	@unlink($name_logs_files);
    	$GLOBALS['db']->query("update ".DB_PREFIX."conf set `value` = 0 where name = 'PROMOTE_MSG_LOCK' or name ='DEAL_MSG_LOCK'");	
    }

}//类定义结束
?>