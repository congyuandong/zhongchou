<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

/**
 +------------------------------------------------------------------------------
 * ThinkPHP内置的Dispatcher类
 * 完成URL解析、路由和调度
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author    liu21st <liu21st@gmail.com>
 * @version   $Id$
 +------------------------------------------------------------------------------
 */
class Dispatcher extends Think
{//类定义开始

    /**
     +----------------------------------------------------------
     * URL映射到控制器
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    static public function dispatch()
    {
        $urlMode  =  C('URL_MODEL');
        if($urlMode == URL_REWRITE ) {
            //当前项目地址
            $url    =   dirname(_PHP_FILE_);
            if($url == '/' || $url == '\\')
                $url    =   '';
            define('PHP_FILE',$url);
        }elseif($urlMode == URL_COMPAT){
            define('PHP_FILE',_PHP_FILE_.'?'.C('VAR_PATHINFO').'=');
        }else {
            //当前项目地址
            define('PHP_FILE',_PHP_FILE_);
        }
        if($urlMode) {
			// 获取PATHINFO信息
            self::getPathInfo();
            if (!empty($_GET) && !isset($_GET[C('VAR_ROUTER')])) {
                $_GET  =  array_merge (self :: parsePathInfo(),$_GET);
                $_varGroup =   C('VAR_GROUP'); // 分组变量
                $_varModule =   C('VAR_MODULE');
                $_varAction =   C('VAR_ACTION');
                $_depr  =   C('URL_PATHINFO_DEPR');
                $_pathModel =   C('URL_PATHINFO_MODEL');
                if (!C('APP_GROUP_LIST')) {
                    $_GET[$_varGroup] = '';
                }
                // 设置默认模块和操作
                if(empty($_GET[$_varModule])) $_GET[$_varModule] = C('DEFAULT_MODULE');
                if(empty($_GET[$_varAction])) $_GET[$_varAction] = C('DEFAULT_ACTION');
                // 组装新的URL地址
                $_URL = '/';
                if($_pathModel==2) {
                    // groupName/modelName/actionName/
                    $_URL .= $_GET[$_varGroup].($_GET[$_varGroup]?$_depr:'').$_GET[$_varModule].$_depr.$_GET[$_varAction].$_depr;
                    unset($_GET[$_varGroup],$_GET[$_varModule],$_GET[$_varAction]);
                }
                foreach ($_GET as $_VAR => $_VAL) {
                    if('' != trim($_GET[$_VAR])) {
                        if($_pathModel==2) {
                            $_URL .= $_VAR.$_depr.rawurlencode($_VAL).$_depr;
                        }else{
                            $_URL .= $_VAR.'/'.rawurlencode($_VAL).'/';
                        }
                    }
                }
                if($_depr==',') $_URL = substr($_URL, 0, -1).'/';
                //重定向成规范的URL格式
                redirect(PHP_FILE.$_URL);
            }else{
                if(C('URL_ROUTER_ON')) self::routerCheck();   // 检测路由规则
                //给_GET赋值 以保证可以按照正常方式取_GET值
                $_GET = array_merge(self :: parsePathInfo(),$_GET);
                //保证$_REQUEST正常取值
                $_REQUEST = array_merge($_POST,$_GET);
            }
        }else{
            // 普通URL模式 检查路由规则
            if(isset($_GET[C('VAR_ROUTER')])) self::routerCheck();
        }
    }

    /**
     +----------------------------------------------------------
     * 分析PATH_INFO的参数
     +----------------------------------------------------------
     * @access private
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    private static function parsePathInfo()
    {
        $pathInfo = array();
        if(C('URL_PATHINFO_MODEL')==2){
            $paths = explode(C('URL_PATHINFO_DEPR'),trim($_SERVER['PATH_INFO'],'/'));
            $groupApp = C('APP_GROUP_LIST');
            if ($groupApp) {
                $arr = array_map('strtolower',explode(',',$groupApp));
                $pathInfo[C('VAR_GROUP')] = in_array(strtolower($paths[0]),$arr)? array_shift($paths) : '';
            }
            $pathInfo[C('VAR_MODULE')] = array_shift($paths);
            $pathInfo[C('VAR_ACTION')] = array_shift($paths);
            for($i = 0, $cnt = count($paths); $i <$cnt; $i++){
                if(isset($paths[$i+1])) {
                    $pathInfo[$paths[$i]] = (string)$paths[++$i];
                }elseif($i==0) {
                    $pathInfo[$pathInfo[C('VAR_ACTION')]] = (string)$paths[$i];
                }
            }
        }else {
            $res = preg_replace('@(\w+)'.C('URL_PATHINFO_DEPR').'([^,\/]+)@e', '$pathInfo[\'\\1\']="\\2";', $_SERVER['PATH_INFO']);
        }
        return $pathInfo;
    }

    /**
    +----------------------------------------------------------
    * 获得服务器的PATH_INFO信息
     +----------------------------------------------------------
     * @access public
    +----------------------------------------------------------
    * @return void
    +----------------------------------------------------------
    */
    public static function getPathInfo()
    {
        if(!empty($_GET[C('VAR_PATHINFO')])) {
            // 兼容PATHINFO 参数
            $path = $_GET[C('VAR_PATHINFO')];
            unset($_GET[C('VAR_PATHINFO')]);
        }elseif(!empty($_SERVER['PATH_INFO'])){
            $pathInfo = $_SERVER['PATH_INFO'];
            if(0 === strpos($pathInfo,$_SERVER['SCRIPT_NAME']))
                $path = substr($pathInfo, strlen($_SERVER['SCRIPT_NAME']));
            else
                $path = $pathInfo;
        }elseif(!empty($_SERVER['ORIG_PATH_INFO'])) {
            $pathInfo = $_SERVER['ORIG_PATH_INFO'];
            if(0 === strpos($pathInfo, $_SERVER['SCRIPT_NAME']))
                $path = substr($pathInfo, strlen($_SERVER['SCRIPT_NAME']));
            else
                $path = $pathInfo;
        }elseif (!empty($_SERVER['REDIRECT_PATH_INFO'])){
            $path = $_SERVER['REDIRECT_PATH_INFO'];
        }elseif(!empty($_SERVER["REDIRECT_Url"])){
            $path = $_SERVER["REDIRECT_Url"];
            if(empty($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == $_SERVER["REDIRECT_QUERY_STRING"])
            {
                $parsedUrl = parse_url($_SERVER["REQUEST_URI"]);
                if(!empty($parsedUrl['query'])) {
                    $_SERVER['QUERY_STRING'] = $parsedUrl['query'];
                    parse_str($parsedUrl['query'], $GET);
                    $_GET = array_merge($_GET, $GET);
                    reset($_GET);
                }else {
                    unset($_SERVER['QUERY_STRING']);
                }
                reset($_SERVER);
            }
        }
        if(C('URL_HTML_SUFFIX') && !empty($path)) {
            $suffix =   substr(C('URL_HTML_SUFFIX'),1);
            $path   =   preg_replace('/\.'.$suffix.'$/','',$path);
        }
        $_SERVER['PATH_INFO'] = empty($path) ? '/' : $path;
    }

    /**
     +----------------------------------------------------------
     * 路由检测
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return void
     +----------------------------------------------------------
     */
    static public function routerCheck() {
        // 搜索路由映射 把路由名称解析为对应的模块和操作
        $routes = C('_routes_');
        if(!empty($routes)) {
            if(isset($_GET[C('VAR_ROUTER')])) {
                // 存在路由变量
                $routeName  =   $_GET[C('VAR_ROUTER')];
                unset($_GET[C('VAR_ROUTER')]);
            }else{
                $paths = explode(C('URL_PATHINFO_DEPR'),trim($_SERVER['PATH_INFO'],'/'));
                // 获取路由名称
                $routeName  =   array_shift($paths);
            }
            if(isset($routes[$routeName])) {
                // 读取当前路由名称的路由规则
                // 路由定义格式 routeName=>array(‘模块名称’,’操作名称’,’参数定义’,’额外参数’)
                $route = $routes[$routeName];
                if(strpos($route[0],C('APP_GROUP_DEPR'))) {
                    $array   =  explode(C('APP_GROUP_DEPR'),$route[0]);
                    $_GET[C('VAR_MODULE')]  =   array_pop($array);
                    $_GET[C('VAR_GROUP')]  =   implode(C('APP_GROUP_DEPR'),$array);
                }else{
                    $_GET[C('VAR_MODULE')]  =   $route[0];
                }
                $_GET[C('VAR_ACTION')]  =   $route[1];
                //  获取当前路由参数对应的变量
                if(!isset($_GET[C('VAR_ROUTER')])) {
                    $vars    =   explode(',',$route[2]);
                    for($i=0;$i<count($vars);$i++)
                        $_GET[$vars[$i]]     =   array_shift($paths);
                    // 解析剩余的URL参数
                    $res = preg_replace('@(\w+)\/([^,\/]+)@e', '$_GET[\'\\1\']="\\2";', implode('/',$paths));
                }
                if(isset($route[3])) {
                    // 路由里面本身包含固定参数 形式为 a=111&b=222
                    parse_str($route[3],$params);
                    $_GET   =   array_merge($_GET,$params);
                }
                //unset($_SERVER['PATH_INFO']);
            }elseif(isset($routes[$routeName.'@'])){
                // 存在泛路由
                // 路由定义格式 routeName@=>array(
                // array('路由正则1',‘模块名称’,’操作名称’,’参数定义’,’额外参数’),
                // array('路由正则2',‘模块名称’,’操作名称’,’参数定义’,’额外参数’),
                // ...)
                $routeItem = $routes[$routeName.'@'];
                $regx = str_replace($routeName,'',trim($_SERVER['PATH_INFO'],'/'));
                foreach ($routeItem as $route){
                    $rule    =   $route[0];// 路由正则
                    // 匹配路由定义
                    if(preg_match($rule,$regx,$matches)) {
                        // 检测是否存在分组 2009/06/23
                        $temp = explode(C('APP_GROUP_DEPR'),$route[1]);
                        if ($temp[1]) {
                            $_GET[C('VAR_GROUP')]  = $temp[0];
                            $_GET[C('VAR_MODULE')] = $temp[1];
                        }else {
                            $_GET[C('VAR_MODULE')] = $temp[0];
                        }
                        $_GET[C('VAR_ACTION')]  =   $route[2];
                        //  获取当前路由参数对应的变量
                        if(!isset($_GET[C('VAR_ROUTER')])) {
                            $vars    =   explode(',',$route[3]);
                            for($i=0;$i<count($vars);$i++)
                                $_GET[$vars[$i]]     =   $matches[$i+1];
                            // 解析剩余的URL参数
                            $res = preg_replace('@(\w+)\/([^,\/]+)@e', '$_GET[\'\\1\']="\\2";', str_replace($matches[0],'',$regx));
                        }
                        if(isset($route[4])) {
                            // 路由里面本身包含固定参数 形式为 a=111&b=222
                            parse_str($route[4],$params);
                            $_GET   =   array_merge($_GET,$params);
                        }
                        break;
                    }
                }
            }
        }
    }
}//类定义结束
?>