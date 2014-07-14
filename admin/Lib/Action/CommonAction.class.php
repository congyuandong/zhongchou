<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 锦尚中国(bbs.52jscn.com)
// +----------------------------------------------------------------------

class CommonAction extends AuthAction{
	public function index() {		
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		//追加默认参数
		if($this->get("default_map"))
		$map = array_merge($map,$this->get("default_map"));
		
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		$this->display ();
		return;
	}
	
	/**
     +----------------------------------------------------------
	 * 根据表单生成查询条件
	 * 进行列表过滤
     +----------------------------------------------------------
	 * @access protected
     +----------------------------------------------------------
	 * @param string $name 数据对象名称
     +----------------------------------------------------------
	 * @return HashMap
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	protected function _search($name = '') {
		//生成查询条件
		if (empty ( $name )) {
			$name = $this->getActionName();
		}
		$name=$this->getActionName();
		$model = D ( $name );
		$map = array ();
		foreach ( $model->getDbFields () as $key => $val ) {
			if (isset ( $_REQUEST [$val] ) && $_REQUEST [$val] != '') {
				$map [$val] = $_REQUEST [$val];
			}
		}
		return $map;

	}

	/**
     +----------------------------------------------------------
	 * 根据表单生成查询条件
	 * 进行列表过滤
     +----------------------------------------------------------
	 * @access protected
     +----------------------------------------------------------
	 * @param Model $model 数据对象
	 * @param HashMap $map 过滤条件
	 * @param string $sortBy 排序
	 * @param boolean $asc 是否正序
     +----------------------------------------------------------
	 * @return void
     +----------------------------------------------------------
	 * @throws ThinkExecption
     +----------------------------------------------------------
	 */
	protected function _list($model, $map, $sortBy = '', $asc = false) {
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			$order = $_REQUEST ['_order'];
		} else {
			$order = ! empty ( $sortBy ) ? $sortBy : $model->getPk ();
		}
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		if (isset ( $_REQUEST ['_sort'] )) {
			$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		//取得满足条件的记录数
		$count = $model->where ( $map )->count ( 'id' );
		
		if ($count > 0) {
			//创建分页对象
			if (! empty ( $_REQUEST ['listRows'] )) {
				$listRows = $_REQUEST ['listRows'];
			} else {
				$listRows = '';
			}
			$p = new Page ( $count, $listRows );
			//分页查询数据

			$voList = $model->where($map)->order( "`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->findAll ( );
			
//			echo $model->getlastsql();
			//分页跳转的时候保证查询条件
			foreach ( $map as $key => $val ) {
				if (! is_array ( $val )) {
					$p->parameter .= "$key=" . urlencode ( $val ) . "&";
				}
			}
			//分页显示

			$page = $p->show ();
			//列表排序显示
			$sortImg = $sort; //排序图标
			$sortAlt = $sort == 'desc' ? l("ASC_SORT") : l("DESC_SORT"); //排序提示
			$sort = $sort == 'desc' ? 1 : 0; //排序方式
			//模板赋值显示
			$this->assign ( 'list', $voList );
			$this->assign ( 'sort', $sort );
			$this->assign ( 'order', $order );
			$this->assign ( 'sortImg', $sortImg );
			$this->assign ( 'sortType', $sortAlt );
			$this->assign ( "page", $page );
			$this->assign ( "nowPage",$p->nowPage);
		}
		return;
	}
	
	
	/**
	 * 上传图片的通公基础方法
	 *
	 * @return array
	 */
	protected function uploadImage()
	{		
		if(conf("WATER_MARK")!="")
		$water_mark = get_real_path().conf("WATER_MARK");  //水印
		else
		$water_mark = "";
	    $alpha = conf("WATER_ALPHA");   //水印透明
	    $place = conf("WATER_POSITION");  //水印位置
	    
		$upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize  = conf('MAX_IMAGE_SIZE') ;  /* 配置于config */
        //设置上传文件类型
		
        $upload->allowExts  =  explode(',',conf('ALLOW_IMAGE_EXT')); /* 配置于config */        
       
        $dir_name = to_date(get_gmtime(),"Ym");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
	        
	    $dir_name = $dir_name."/".to_date(get_gmtime(),"d");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
	     
	    $dir_name = $dir_name."/".to_date(get_gmtime(),"H");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
        
        
        
       	$save_rec_Path = "/public/attachment/".$dir_name."/origin/";  //上传时先存放原图          	      
        $savePath = APP_ROOT_PATH."public/attachment/".$dir_name."/origin/"; //绝对路径
		if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name."/origin/")) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name."/origin/");
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name."/origin/", 0777);
	    }        
        $domain_path = get_domain().APP_ROOT.$save_rec_Path;
			
		$upload->saveRule = "uniqid";   //唯一
		$upload->savePath = $savePath;
        if($upload->upload())
        {
        	$uploadList = $upload->getUploadFileInfo();    
         	foreach($uploadList as $k=>$fileItem)
        	{        			
        			$file_name = $fileItem['savepath'].$fileItem['savename'];  //上图原图的地址
        			//水印图
        			$big_save_path = str_replace("origin/","",$savePath);  //大图存放图径
					$big_file_name = str_replace("origin/","",$file_name);	
					
//					Image::thumb($file_name,$big_file_name,'',$big_width,$big_height);
					@file_put_contents($big_file_name,@file_get_contents($file_name));					
        			if(file_exists($water_mark))
	        		{
	        			Image::water($big_file_name,$water_mark,$big_file_name,$alpha,$place);	
	        		}	        		        			
        			$big_save_rec_Path = str_replace("origin/","",$save_rec_Path);  //上传的图存放的相对路径
        			$uploadList[$k]['recpath'] = $save_rec_Path;
        			$uploadList[$k]['bigrecpath'] = $big_save_rec_Path;        			
        			if(app_conf("PUBLIC_DOMAIN_ROOT")!='')
        			{
	        			$origin_syn_url = app_conf("PUBLIC_DOMAIN_ROOT")."/es_file.php?username=".app_conf("IMAGE_USERNAME")."&password=".app_conf("IMAGE_PASSWORD")."&file=".get_domain().APP_ROOT."/public/attachment/".$dir_name."/origin/".$fileItem['savename']."&path=attachment/".$dir_name."/origin/&name=".$fileItem['savename']."&act=0";
	        			$big_syn_url = app_conf("PUBLIC_DOMAIN_ROOT")."/es_file.php?username=".app_conf("IMAGE_USERNAME")."&password=".app_conf("IMAGE_PASSWORD")."&file=".get_domain().APP_ROOT."/public/attachment/".$dir_name."/".$fileItem['savename']."&path=attachment/".$dir_name."/&name=".$fileItem['savename']."&act=0";
	        			@file_get_contents($origin_syn_url);
	        			@file_get_contents($big_syn_url);
        			}
        	} 
        	return array("status"=>1,'data'=>$uploadList,'info'=>L("UPLOAD_SUCCESS"));
        }
        else 
        {
        	return array("status"=>0,'data'=>null,'info'=>$upload->getErrorMsg());
        }
	}
	
	
	/**
	 * 上传文件公共基础方法
	 *
	 * @return array
	 */
	protected function uploadFile()
	{	    
		$upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize  = conf('MAX_IMAGE_SIZE') ;  /* 配置于config */
        //设置上传文件类型
		
        $upload->allowExts  =  explode(',',conf('ALLOW_IMAGE_EXT')); /* 配置于config */        
       
		$dir_name = to_date(get_gmtime(),"Ym");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
	        
	    $dir_name = $dir_name."/".to_date(get_gmtime(),"d");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
	     
	    $dir_name = $dir_name."/".to_date(get_gmtime(),"H");
	    if (!is_dir(APP_ROOT_PATH."public/attachment/".$dir_name)) { 
	             @mkdir(APP_ROOT_PATH."public/attachment/".$dir_name);
	             @chmod(APP_ROOT_PATH."public/attachment/".$dir_name, 0777);
	        }
        
        
        
       	$save_rec_Path = "/public/attachment/".$dir_name."/";  //上传时先存放原图          	      
        $savePath = APP_ROOT_PATH."public/attachment/".$dir_name."/"; //绝对路径
        $domain_path = get_domain().APP_ROOT.$save_rec_Path;
        
			
		$upload->saveRule = "uniqid";   //唯一
		$upload->savePath = $savePath;
        if($upload->upload())
        {
        	$uploadList = $upload->getUploadFileInfo();   
        	foreach($uploadList as $k=>$fileItem)
        	{
      			$uploadList[$k]['recpath'] = $save_rec_Path;
      			if(app_conf("PUBLIC_DOMAIN_ROOT")!='')
      			{
	      			$syn_url = app_conf("PUBLIC_DOMAIN_ROOT")."/es_file.php?username=".app_conf("IMAGE_USERNAME")."&password=".app_conf("IMAGE_PASSWORD")."&file=".$domain_path.$fileItem['savename']."&path=attachment/".$dir_name."/&name=".$fileItem['savename']."&act=0";
	      			@file_get_contents($syn_url);
      			}
        	} 	
        	return array("status"=>1,'data'=>$uploadList,'info'=>L("UPLOAD_SUCCESS"));
        }
        else 
        {
        	return array("status"=>0,'data'=>null,'info'=>$upload->getErrorMsg());
        }
	}
	
	public function _before_update()
	{
		$uname = $_REQUEST['uname'];
		if($uname&&trim($uname)!='')
		{
			$rs = M(MODULE_NAME)->where("uname='".$uname."' and id <> ".intval($_REQUEST['id']))->count();
			if($rs > 0)
			{
				$this->error(l("UNAME_EXISTS"));
			}
		}
	}
	
	public function _before_insert()
	{
		$uname = $_REQUEST['uname'];
		if($uname&&trim($uname)!='')
		{
			$rs = M(MODULE_NAME)->where("uname='".$uname."' and id <> ".intval($_REQUEST['id']))->count();
			if($rs > 0)
			{
				$this->error(l("UNAME_EXISTS"));
			}
		}
	}
	
	
	public function toogle_status()
	{
		$id = intval($_REQUEST['id']);
		$ajax = intval($_REQUEST['ajax']);
		$field = $_REQUEST['field'];
		$info = $id."_".$field;
		$c_is_effect = M(MODULE_NAME)->where("id=".$id)->getField($field);  //当前状态
		$n_is_effect = $c_is_effect == 0 ? 1 : 0; //需设置的状态
		M(MODULE_NAME)->where("id=".$id)->setField($field,$n_is_effect);	
		save_log($info.l("SET_EFFECT_".$n_is_effect),1);
		$this->ajaxReturn($n_is_effect,l("SET_EFFECT_".$n_is_effect),1)	;	
	}
}