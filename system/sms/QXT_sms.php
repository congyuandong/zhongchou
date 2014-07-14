<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://bbs.52jscn.com All rights reserved.
// +----------------------------------------------------------------------

$sms_lang = array(
	'ContentType'	=>	'消息类型',
	'ContentType_15'	=>	'普通短信通道(15)',
	'ContentType_8'	=>	'长短信通道(8)',

);
$config = array(
	'ContentType'	=>	array(
	'INPUT_TYPE'	=>	'1',
	'VALUES'	=> 	array(15,8)
	),
	
);
/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
    $module['class_name']    = 'QXT';
    /* 名称 */
    $module['name']    = "企信通短信平台";
    $module['lang']  = $sms_lang;
    $module['config'] = $config;	
    $module['server_url'] = 'http://221.179.180.158:9000/QxtSms/QxtFirewall';

    return $module;
}

// 企信通短信平台
require_once APP_ROOT_PATH."system/libs/sms.php";  //引入接口
require_once APP_ROOT_PATH."system/sms/QXT/transport.php"; 
require_once APP_ROOT_PATH."system/sms/QXT/XmlBase.php"; 

class QXT_sms implements sms
{
	public $sms;
	public $message = "";
   	
	private $statusStr = array(
		"00"  => "批量短信提交成功（批量短信待审批）",
		"01"  => "批量短信提交成功（批量短信跳过审批环节）",
		"03"  => "单条短信提交成功",
		"04"  => "用户名错误",
		"05" => "密码错误",
		"06" => "剩余条数不足",
		"07" => "信息内容中含有限制词(违禁词)",
		"08" => "信息内容为黑内容",
		"09" => "该用户的该内容 受同天内内容不能重复发 限制",
		"10" => "批量下限不足",
		"97" => "短信参数有误",
		"98" => "防火墙无法处理这种短信"			   		   
	);
	
    public function __construct($smsInfo = '')
    { 	    	
		if(!empty($smsInfo))
		{			
			$this->sms = $smsInfo;
		}
    }
	
	public function sendSMS($mobile_number,$content)
	{
		if(is_array($mobile_number))
		{
			$mobile_number = implode(",",$mobile_number);
		}
		$sms = new transport();
				
				$params = array(
					"OperID"=>$this->sms['user_name'],
					"OperPass"=>$this->sms['password'],
					"DesMobile"=>$mobile_number,
					"Content"=>urlencode(iconv("utf-8","gbk",$content)),
					"ContentType"=>$this->sms['config']['ContentType']
				);
				
				$result = $sms->request($this->sms['server_url'],$params);
				$smsStatus = toArray($result['body']);

				$code = $smsStatus['code'][0];
				
				if($code=='00'||$code=='01'||$code=='03')
				{
							$result['status'] = 1;
				}
				else
				{
							$result['status'] = 0;
							$result['msg'] = $this->statusStr[$code];
				}
		return $result;
	}
	
	public function getSmsInfo()
	{	

		return "企信通短信平台";	
		
	}
	
	public function check_fee()
	{
		$sms = new transport();
				
		$params = array(
						"OperID"=>$this->sms['user_name'],
						"OperPass"=>$this->sms['password']
					);
					
		$url = "http://221.179.180.158:9000/QxtSms/surplus";
		$result = $sms->request($url,$params);
		$result = toArray($result['body'],"resRoot");
		
		$str = "企信通短信平台，剩余：".$result['rcode'][0]."条";	

		return $str;

	}
}
?>