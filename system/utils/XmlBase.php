<?php
function getValue($value,$CutXml)
{
		$key = $value;
		if (strpos($value, "-")) $value = substr($value, 0, strpos($value, "-"));
		$str1 = "<".$value;
		$str2 = "</".$value;
		$start_pos = strpos($CutXml, $str1);
		if ($start_pos > 0){
			$start_pos += strlen($str1);
			$CutXml = substr($CutXml, $start_pos);
			$end_pos = strpos($CutXml, $str2);
			$resValue = substr($CutXml, strpos($CutXml,">")+1, $end_pos-strpos($CutXml,">")-1);
		}
		return $resValue;
}

function parseMol($mvalues,$mretype=0)
{
	if($mvalues[0]["type"]=="open")
	{
		for ($i=1; $i < count($mvalues); $i++)
		{
			$key=$mvalues[$i]["tag"];
			if(!$mretype)$mol[$key][] = $mvalues[$i]["value"];
			else{
				$arr["value"] = $mvalues[$i]["value"];
				if(isset($mvalues[$i]["attributes"]))
					$arr["attributes"] = $mvalues[$i]["attributes"];
				$mol[$key][] = $arr;
			}
		}
	}
	return $mol;
}

function XMLtoArray($values,$tags,$item,$parsetype=0)
{
	foreach ($tags as $key=>$val)
	{
		if($key == $item)
		{
			$molranges = $val;
			$offset = $molranges[0];
			$len = $molranges[1] - $offset;
			$data=parseMol(array_slice($values, $offset, $len),$parsetype);
		 }
	}
	return $data;
}

function XMLgetValue($values,$tags,$item)
{
		foreach ($tags as $key=>$molranges)
		{
			if($key == $item)
			{
				for($i=0;$i<$num;$i++)
				$data[]=$values[$molranges[$i]]["value"];
			}
		}
		return $data;
}

function toArray($xml,$content="response"){
	$parser = xml_parser_create();
	xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
	xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
	xml_parse_into_struct($parser,$xml,$values,$tags);
	xml_parser_free($parser);
	$dbxml=XMLtoArray($values,$tags,$content);
	return $dbxml;
}
?>