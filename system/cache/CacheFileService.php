<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class CacheFileService extends CacheService
{//类定义开始

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
	private $dir;
    public function __construct()
    {
        $this->dir = APP_ROOT_PATH."public/runtime/app/data_caches/";
        $this->init();
    }

    public function set_dir($dir='')
    {
    	if($dir!='')
    	{
    		$this->dir = $dir;
    		$this->init();
    	}
    }
    /**
     +----------------------------------------------------------
     * 初始化检查
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    private function init()
    {
        $stat = @stat($this->dir);

        // 创建项目缓存目录
        if (!is_dir($this->dir)) {
            if (!  mkdir($this->dir))
                return false;
             @chmod($this->dir, 0777);
        }
    }

    private function filename($name,$mdir=false)
    {
        $name	=	md5($name);
        $filename	=  $name.'.php';
       
   		 $hash_dir = $this->dir . '/c' . substr(md5($name), 0, 1)."/";
     	if ($mdir&&!is_dir($hash_dir))
        {
             @mkdir($hash_dir);
             @chmod($hash_dir, 0777);
        }        
   		$hash_dir = $hash_dir . 'c' . substr(md5($name), 1, 1)."/";
     	if ($mdir&&!is_dir($hash_dir))
        {
             @mkdir($hash_dir);
             @chmod($hash_dir, 0777);
        }
        return $hash_dir.$this->prefix.$filename;
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
    	
        $filename   =   $this->filename($name);    
        $content = @file_get_contents($filename);
        if( false !== $content) { 
        	$expire  =  (int)substr($content,8, 12);
            if($expire != -1 && time() > filemtime($filename) + $expire) {
                //缓存过期删除缓存文件
                @unlink($filename);
                return false;
            }
            $content   =  substr($content,20, -3);
        	$content    =   unserialize($content);
        	$$var_name  = $content;
            return $content;
        }
        else {
            return false;
        }
    }

    /**
     +----------------------------------------------------------
     * 写入缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     * @param mixed $value  存储数据
     * @param int $expire  有效时间 -1 为永久
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function set($name,$value,$expire ="-1")
    {
    	if(app_conf("CACHE_ON")==0)return false;
        $filename   =   $this->filename($name,true);
        $data   =   serialize($value);   
        $data    = "<?php\n//".sprintf('%012d',$expire).$data."\n?>";        
	    $rs = @file_put_contents($filename,$data);
	    if($rs)
        return true;
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
    	if(app_conf("CACHE_ON")==0)return false;
        return unlink($this->filename($name));
    }

    /**
     +----------------------------------------------------------
     * 清除缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function clear()
    {
    	$this->del_name_logs();
        $path   =  $this->dir;
        clear_dir_file($path);
        
    }
    


}//类定义结束
?>