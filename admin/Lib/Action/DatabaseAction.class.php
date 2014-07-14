<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------


// 数据库管理
class DatabaseAction extends CommonAction{

	private $db;
	private $max_size;  //分卷的最大文件大小
	public function __construct()
	{
		parent::__construct();
		$this->db = Db::getInstance();
		$this->max_size = 800000;  //每卷800左右
		

	}
    /**
     *  生成备份文件头部
     *
     * @access  public
     * @param   int     文件卷数
     *
     * @return  string  $str    备份文件头部
     */
    private function make_head($vol)
    {
        /* 系统信息 */
        $sys_info['os']         = PHP_OS;
        $sys_info['web_server'] = $_SERVER["SERVER_SOFTWARE"];
        $sys_info['php_ver']    = php_sapi_name();
        $sys_info['mysql_ver']  = mysql_get_server_info();
        $sys_info['date']       = date('Y-m-d H:i:s');

        $head = "-- fanwe SQL Dump Program\r\n".
                 "-- " . $sys_info['web_server'] . "\r\n".
                 "-- \r\n".
                 "-- DATE : ".$sys_info["date"]."\r\n".
                 "-- MYSQL SERVER VERSION : ".$sys_info['mysql_ver']."\r\n".
                 "-- PHP VERSION : ".$sys_info['php_ver']."\r\n".
                 "-- Vol : ".$vol."\r\n\r\n\r\n";
        
        return $head;
    }
    
	public function index()
	{
		$db_back_dir = get_real_path()."public/db_backup/";
		if($dir = opendir($db_back_dir))
		{
			 while(($file   =   readdir($dir)))
			 {  	
			 	 if (($file!=".")&&($file!=".."))   
			 	 { 
			 	 	if(is_dir($db_back_dir.$file))
			 	 	{
			 	 		$sql_list[$file] = array();
			 	 		if($bk_dir = opendir($db_back_dir.$file."/"))
			 	 		{
			 	 			while($bk_file=readdir($bk_dir))
			 	 			{
			 	 				 if (($bk_file!=".")&&($bk_file!=".."))   
			 	 				$sql_list[$file][] = $bk_file;
			 	 			}
			 	 		}
			 	 	}
			 	 }
			}
		}		
		$this->assign("sql_list",$sql_list);
		$this->display();
	}
    public function sql()
    {
        // 获取数据库列表
        $this->getDbList();
        // 获取当前数据库
        $dbName   =  $this->getUseDb();
        // 获取当前库的数据表
        $tables   = $this->db->getTables($dbName);
        $this->assign('tables',$tables);
        $this->display();
        return ;
    }	
	public function dump()
	{
		set_time_limit(0);
		es_session::close();
		$filebase_name = addslashes(htmlspecialchars(trim($_REQUEST['filebase_name'])));
		if($filebase_name=='')
		$filebase_name = get_gmtime();
		
		$vol = intval($_REQUEST['vol']);
		$table_key = intval($_REQUEST['table_key']);
		$last_row = intval($_REQUEST['last_row']);
		$this->vol_dump($filebase_name,$vol,$table_key,$last_row);
	}
	
	//按vol进行循环调用本函数
	private function vol_dump($filebase_name,$vol=1,$table_key=0,$last_row=0,$dumpsql_vol='',$loop_limit=0)
	{
		 $loop_limit++;
		 $tables_all = $this->db->getTables(); 
		 $tables = array();
		 foreach($tables_all as $table)
		 {
		 	if(preg_match("/".conf('DB_PREFIX')."/",$table))
		 	{
		 		array_push($tables,$table);
		 	}
		 }
		 
		 if($loop_limit>50) //主要用于xdebug或其他对递归做上限限制的服务器
		 {					
		 	//超出了递归限制
		 	if($this->write_sql($filebase_name,$vol,$dumpsql_vol))
			{
					$vol++;
					$result['vol'] = $vol;  //下一卷的卷数
					$result['filebase_name'] = $filebase_name;
					$result['table_key'] = $table_key;
					$result['last_row'] = $last_row;
					$result['done'] = 0;    //全部结束
					$result['status'] = 1; //导出成功
					$result['table_total'] = count($tables);
					$result['table_name'] = $tables[$table_key];
					ajax_return($result);
			}
			else
			{

					$result['status'] = 0; //导出失败
					$result['table_name'] = $tables[$table_key];
					$result['info'] = "数据库备份失败";
					ajax_return($result);
			}
		 }
		 
		 if($table_key>=count($tables))
		 {
		 	//超出了表的最大限制
		 	if($this->write_sql($filebase_name,$vol,$dumpsql_vol))
			{
					$result['vol'] = $vol;  //下一卷的卷数
					$result['filebase_name'] = $filebase_name;
					$result['table_key'] = $table_key;
					$result['last_row'] = $last_row;
					$result['done'] = 1;    //全部结束
					$result['status'] = 1; //导出成功
					$result['table_total'] = count($tables);
					$result['table_name'] = $tables[$table_key];
					ajax_return($result);
			}
			else
			{

					$result['status'] = 0; //导出失败
					$result['table_name'] = $tables[$table_key];
					$result['info'] = "数据库备份失败";
					ajax_return($result);
			}
		 }
		 
		 if($dumpsql_vol=='') //非递归调用，则卷数增加,创建卷头
		 $dumpsql_vol = $this->make_head($vol);  //每一卷的SQL语句

		 //开始表的循环
		 $tbname = $tables[$table_key];
		 $modelname=str_replace(conf('DB_PREFIX'),'',$tbname); 	 
		 $tbname_o = $tbname;
		 $tbname = 	str_replace(conf('DB_PREFIX'),'%DB_PREFIX%',$tbname); 
		 
		 if($last_row==0)
		 {
		 	//开始创建表的语句
		 	$dumpsql_vol .= "DROP TABLE IF EXISTS `$tbname`;\r\n";  //用于表结构导出处理的Sql语句
		 	$tmp_arr = $this->db->query("SHOW CREATE TABLE `$tbname_o`");
			$tmp_sql = $tmp_arr[0]['Create Table'].";\r\n";
			$tmp_sql  = str_replace(conf('DB_PREFIX'),'%DB_PREFIX%',$tmp_sql); 
			$dumpsql_vol .= $tmp_sql;   //表结构语句处理结束
		 }
		 
		 $modelname = parse_name($modelname,1); 
		 $model=D($modelname);  

		 if($modelname!='AutoCache')
		 {
			 $limit_str = $last_row.",500";
			 $rows = $model->limit($limit_str)->findAll();		
		 }
		 if(count($rows)>0)
		 {
			 foreach($rows as $row)
			 {
				 $dumpsql_row = "INSERT INTO `{$tbname}` VALUES (";   //用于每行数据插入的SQL脚本语句 
				 foreach($row as $col_value) 
				 {  
					$dumpsql_row .="'".mysql_real_escape_string($col_value)."',";  
				 }  
				 $dumpsql_row=substr($dumpsql_row,0,-1);  //删除最后一个逗号
				 $dumpsql_row .= ");\r\n";  
				 $dumpsql_vol.= $dumpsql_row; 
				 $last_row++;
			} 
			
			//开始判断分卷长度
			if(strlen($dumpsql_vol)>$this->max_size)
			{
				 //开始写入sql脚本
				if($this->write_sql($filebase_name,$vol,$dumpsql_vol))
				{
					$vol++;  //增加卷数
					$result['status'] = 1; //导出一卷成功
					$result['vol'] = $vol;  //下一卷的卷数
					$result['done'] = 0;    //未结束。还需继续导出
					$result['filebase_name'] = $filebase_name;
					$result['table_key'] = $table_key;
					$result['table_total'] = count($tables);
					$result['table_name'] = $tables[$table_key];
					$result['last_row'] = $last_row;
					ajax_return($result);
				}
				else
				{

					$result['status'] = 0; //导出失败
					$result['info'] = "数据库备份失败";
					ajax_return($result);
				}
			 }
			 else
			 {
			 	//未超出分卷长度，递归调用
			 	$this->vol_dump($filebase_name,$vol,$table_key,$last_row,$dumpsql_vol,$loop_limit);  //进行递归
			 } 	
		 }
		 else
		 {
		 	
			//进入下一张表的查询
			$last_row = 0;
			$table_key++;
			$this->vol_dump($filebase_name,$vol,$table_key,$last_row,$dumpsql_vol,$loop_limit);  //进行递归
		 	
		 }

	}
	
	private function write_sql($filebase_name,$vol,$dumpsql_vol)
	{
	 			//开始写入sql脚本
				$filepath = get_real_path()."public/db_backup/".$filebase_name."/";   //导出的目录	 
	        
		        if (!is_dir($filepath)) {
		            if (!  mkdir($filepath))
		                return false;
		             @chmod($filepath, 0777);
		        }
				$filename = $filebase_name."_".$vol.".sql";  //导出的sql名
				$rs = @file_put_contents($filepath.$filename,$dumpsql_vol);
				if($rs==0)
				{
					//导出失败
					for($ii=1;$ii<=$vol;$ii++)
					{
						@unlink($filepath.$filebase_name."_".$ii.".sql");
					}
					return false;				
				}
				return true;
	}
	
	public function delete()
	{
		$groupname = $_REQUEST['file'];
		$db_back_dir = get_real_path()."public/db_backup/".$groupname."/";
		$sql_list = $this->dirFileInfo($db_back_dir,".sql");
		$deleteGroup = $sql_list[$groupname];
		foreach($deleteGroup as $fileItem)
		{
			@unlink($db_back_dir.$fileItem['filename']);
		}

		$dir = opendir( $db_back_dir );
		closedir($dir);
		rmdir($db_back_dir);
		save_log($groupname.L('DELETE_SUCCESS'),1);
		$this->success(L('DELETE_SUCCESS'),true);		
	}
	
	public function restore()
	{
		set_time_limit(0);
		es_session::close();
		$groupname = $_REQUEST['file'];
		$vol = intval($_REQUEST['vol']);
		$db_back_dir = get_real_path()."public/db_backup/".$groupname."/";
		$sql_list = $this->dirFileInfo($db_back_dir,".sql");
		$sql_list = $sql_list[$groupname];

    	$fileItem = $sql_list[$vol];
		$sql = file_get_contents($db_back_dir.$fileItem['filename']);
    	$sql = $this->remove_comment($sql);
    	$sql = trim($sql);
    	$sql = str_replace("\r", '', $sql);
       	$segmentSql = explode(";\n", $sql);
       	foreach($segmentSql as $itemSql)
       	{
       			if($itemSql!='')
       			{
	       			$itemSql = str_replace("%DB_PREFIX%",conf('DB_PREFIX'),$itemSql);
	       			$this->db->query($itemSql);
       			}
       	}
       	
       	if($vol==count($sql_list))
       	{
       		$result['done'] = 1;
       		$result['status'] = 1;
       	}       		
       	else
       	{       	
	       	$vol++;
	       	$result['filename'] = $groupname;
	    	$result['vol'] = $vol;
	    	$result['status'] = 1;
       	}
    	ajax_return($result);

		
	}
	
    private function remove_comment($sql)
    {
        /* 删除SQL行注释，行注释不匹配换行符 */
        $sql = preg_replace('/^\s*(?:--|#).*/m', '', $sql);

        /* 删除SQL块注释，匹配换行符，且为非贪婪匹配 */
        //$sql = preg_replace('/^\s*\/\*(?:.|\n)*\*\//m', '', $sql);
        $sql = preg_replace('/^\s*\/\*.*?\*\//ms', '', $sql);

        return $sql;
    }
	//用于获取指定路径下的文件组
	private function dirFileInfo($dir,$type)   
	{  
		  if(!is_dir($dir))
		  		return   false;  
		  $dirhandle=opendir($dir);  
		  $arrayFileName=array();  
		  while(($file   =   readdir($dirhandle))   !==   false)
		  {  	
		 	 if (($file!=".")&&($file!=".."))   
		 	 {  
		  		$typelen=0-strlen($type);  		   
		  		if	(substr($file,$typelen)==$type)  
		  		{
		  			$file_only_name = substr($file,0,strlen($file)+$typelen);
		  			$file_name_arr = explode("_",$file_only_name);
		  			$file_only_name = $file_name_arr[0];
		  			$fileIdx = $file_name_arr[1];
		  			if($fileIdx)
		  			{
			 	 		$arrayFileName[$file_only_name][$fileIdx]=array
			 	 		(
			 	 			'filename'=>$file,
			 	 			'filedate'=>to_date($file_only_name)
			 	 		);
		  			}
		  			else 
		  			{
		  				$arrayFileName[$file_only_name][]=array
			 	 		(
			 	 			'filename'=>$file,
			 	 			'filedate'=>to_date($file_only_name)
			 	 		);
		  			}
		  		}
		  	}  
		   
		  }  
		  //通过ArrayList类对数组排序
		  foreach($arrayFileName as $k=>$group)
		  {
		  		$arr = new ArrayList($group);
		  		$arr->ksort();
		  		$arrayFileName[$k] = $arr->toArray();
		  }

	  	return   $arrayFileName;  
   }
   
	/**
     +----------------------------------------------------------
     * 获取数据库列表
     +----------------------------------------------------------
     * @access protected
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    protected function getDbList() {
        if(!$dbs   =  es_session::get('_databaseList_')) {
            $dbs =$this->db->query('show databases');
            es_session::set('_databaseList_',$dbs);
        }
        $this->assign('dbs',$dbs);
    }

    /**
     +----------------------------------------------------------
     * 获取当前操作的数据库
     +----------------------------------------------------------
     * @access protected
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    protected function getUseDb() {
        $dbName   =  conf('DB_NAME');
        $this->assign('useDb',$dbName);
        return $dbName;
    }
    
	/**
     +----------------------------------------------------------
     * 执行SQL语句
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    public function execute()
    {
        $sql  = trim($_REQUEST['sql']);
        if(MAGIC_QUOTES_GPC) {
            $sql   = stripslashes($sql);
        }
        if(empty($sql)) {
            $this->error('SQL不能为空！');
        }
       $this->db->execute('USE '.es_session::get('useDb'));
        if(!empty($_POST['bench'])) {
           $this->db->execute('SET PROFILING=1;');
        }
        $startTime	=	microtime(TRUE);
        $queryIps = 'INSERT|UPDATE|DELETE|REPLACE|'
                . 'CREATE|DROP|'
                . 'LOAD DATA|SELECT .* INTO|COPY|'
                . 'ALTER|GRANT|TRUNCATE|REVOKE|'
                . 'LOCK|UNLOCK';
        if (preg_match('/^\s*"?(' . $queryIps . ')\s+/i', $sql)) {
            $result=   $this->db->execute($sql);
            $type = 'execute';
        }else {
            $result=   $this->db->query($sql);
            $type = 'query';
        }
        $runtime	 =	 number_format((microtime(TRUE) - $startTime), 6);
        if(!empty($_POST['record'])) {
            // 记录执行SQL语句
            Log::write('RunTime:'.$runtime.'s SQL = '.$sql,Log::SQL);
        }
        if(false !== $result) {
            $array[] =  $runtime.'s';
            if(!empty($_POST['bench'])) {
                $data   = $this->db->query('SHOW PROFILE');
                $fields = array_keys($data[0]);
                $a[] = $fields;
                foreach($data as $key=>$val) {
                    $val  = array_values($val);
                    $a[] = $val;
                }
                $array[] =  $a;
            }else{
                $array[]  = '';
            }
            if($type == 'query') {
                if(empty($result)) {
                    $this->ajaxReturn($array,'SQL执行成功！',1);
                }
                $fields = array_keys($result[0]);
                $array[] = $fields;
                foreach($result as $key=>$val) {
                    $val  = array_values($val);
                    $array[] = $val;
                }
                $this->ajaxReturn($array,'SQL执行成功！',1);
            }else {
                $this->ajaxReturn($array,'SQL执行成功！',1);
            }
        }else {
            $this->error('SQL错误！');
        }
    }
    
    public function getTables() {
        $dbName   =  $_REQUEST['db'];
        es_session::set('useDb',$dbName);
        // 获取数据库的表列表
        $tables   = $this->db->getTables($dbName);
        $this->ajaxReturn($tables,'数据表获取完成',1);
    }
}
?>