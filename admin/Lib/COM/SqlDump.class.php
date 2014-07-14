<?php 
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

//数据库全库导出，导入的操作类
import("Think.Db.Db");
class SqlDump extends Think 
{
	private $db;
	private $max_size;  //分卷的最大文件大小
	public function __construct()
	{
		$this->db = Db::getInstance();
		$this->max_size = conf("DB_VOL_MAXSIZE");
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
    
    /**
     * 分卷导出
     *
     * @return boolean
     */
	public function dump()
	{
		 $dumptime = get_gmtime();  //当前导出的时间
		 $tables_all = $this->db->getTables(); 
		 $tables = array();
		 foreach($tables_all as $table)
		 {
		 	if(preg_match("/".conf('DB_PREFIX')."/",$table))
		 	{
		 		array_push($tables,$table);
		 	}
		 }
		 $vol = 1;
		 $dumpsql_vol = $this->make_head($vol);  //每一卷的SQL语句
		 $dumpfile = array();
		 foreach ($tables as $key=>$tbname)
		 {  
		 	 $modelname=str_replace(conf('DB_PREFIX'),'',$tbname); 	 
		 	 $tbname_o = $tbname;
		 	 $tbname = 	str_replace(conf('DB_PREFIX'),'%DB_PREFIX%',$tbname); 
			 $dumpsql_vol .= "DROP TABLE IF EXISTS `$tbname`;\r\n";  //用于表结构导出处理的Sql语句
			 
		 	 $tmp_arr = $this->db->query("SHOW CREATE TABLE `$tbname_o`");
		     $tmp_sql = $tmp_arr[0]['Create Table'].";\r\n";
		     $tmp_sql  = str_replace(conf('DB_PREFIX'),'%DB_PREFIX%',$tmp_sql); 
			 $dumpsql_vol .= $tmp_sql;   //表结构语句处理结束
 			 
		 	 
		     $modelname = parse_name($modelname,1); 
		     $model=D($modelname);  
		     //$tableData=$model->findAll();  //查询当前表的所有数据
		     $count = $model->count();
		     if($count>500)
		     {
		     	$count = ceil($count/500);
			     if($count>0)
			     {
					 for($i=1;$i<=$count;$i++)
					 {  
					 		 $limit_str = (($i-1)*500).",500";
							 $rows = $model->limit($limit_str)->findAll();
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
								 } 
							 }
							 
							 
							 //开始判断分卷长度
							 if(strlen($dumpsql_vol)>$this->max_size)
							 {
								//文件大小超过
								//$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
								
								 //开始写入sql脚本
								
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 	
							 	
								$vol++;  //增加卷数
								$dumpsql_vol = $this->make_head($vol);  //重新制作卷头
							 } 					 
							 elseif($key==count($tables)-1&&$i==$count-1)
							 {
								//读取至最后一张表的最后一行
								//$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
							 	//开始写入sql脚本
								 
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 }	
							 
			 				 	 
					 }		
			     }	
			     else
			     {
			     			 if($key==count($tables)-1)
							 {
								//读取至最后一张表的最后一行
	//							$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
								 //开始写入sql脚本
								 
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 }	
							 //开始写入sql脚本
			     } 
		     }
		     else
		     {
		     	//小于一千条数据时
		     	if($count>0)
			     {
					 for($i=0;$i<$count;$i++)
					 {  
							 $rows = $model->limit($i.",1")->findAll();
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
								 } 
							 }
							 
							 
							 //开始判断分卷长度
							 if(strlen($dumpsql_vol)>$this->max_size)
							 {
								//文件大小超过
								//$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
								
								 //开始写入sql脚本
								
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 	
							 	
								$vol++;  //增加卷数
								$dumpsql_vol = $this->make_head($vol);  //重新制作卷头
							 } 					 
							 elseif($key==count($tables)-1&&$i==$count-1)
							 {
								//读取至最后一张表的最后一行
								//$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
							 	//开始写入sql脚本
								 
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 }	
							 
			 				 	 
					 }		
			     }	
			     else
			     {
			     			 if($key==count($tables)-1)
							 {
								//读取至最后一张表的最后一行
	//							$dumpfile[] = $dumpsql_vol;  //存入SQL文件集合
								 //开始写入sql脚本
								 
				 				 $filepath = get_real_path()."public/db_backup/";   //导出的目录	 
								 $filename = $dumptime."_".$vol.".sql";  //导出的sql名
						 		 $rs = file_put_contents($filepath.$filename,$dumpsql_vol);
						 		 if($rs==0)
						 		 {
						 			//导出失败
						 			for($ii=1;$ii<=$vol;$ii++)
						 			{
						 				@unlink($filepath.$dumptime."_".$ii.".sql");
						 			}
						 			return false;
						 		 }
							 }	
							 //开始写入sql脚本
			     } 
		     }//end 数据条判断
		     
		 }

		
		 
		 return true;
    } 
    
    
    /**
     * 恢复列表的备份
     *
     * @param array $filelist
     * @return string
     */
    public function restore($filelist)
    {
    	set_time_limit(0);
    	$filepath =  get_real_path()."public/db_backup/";   //导出的目录
    	foreach($filelist as $fileItem)
    	{
    		$sql = file_get_contents($filepath.$fileItem['filename']);
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
	       			if($this->db->getError()!="")
	       			{
	        				return $this->db->getError();
	       			}
       			}
       		}
    	}
    	return "";
    }
    
    

    /**
     * 过滤SQL查询串中的注释。该方法只过滤SQL文件中独占一行或一块的那些注释。
     *
     * @access  public
     * @param   string      $sql        SQL查询串
     * @return  string      返回已过滤掉注释的SQL查询串。
     */
    private function remove_comment($sql)
    {
        /* 删除SQL行注释，行注释不匹配换行符 */
        $sql = preg_replace('/^\s*(?:--|#).*/m', '', $sql);

        /* 删除SQL块注释，匹配换行符，且为非贪婪匹配 */
        //$sql = preg_replace('/^\s*\/\*(?:.|\n)*\*\//m', '', $sql);
        $sql = preg_replace('/^\s*\/\*.*?\*\//ms', '', $sql);

        return $sql;
    }


}

?>