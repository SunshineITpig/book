<?php

function getModelName() {
	return MODULE_NAME;
}

function check_verfiy($code, $id='') {
	$verfiy = new \Think\Verify();
	return $verfiy->check($code, $id);
}

/**
 *格式化打印数组
 */
function p($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

/**
 *转换座位号
1	3-23     3+0*(column-1)+0*4  --- 3+1*(column-1)+0*4    2-25    3/24=0..3 23/24=0..23
2	27-47    3+1*(column-1)+1*4 -----3+2*(column-1)+1*4    26-49  27/24=1..3 47/24=1..23
3	51-71    3+2*(column-1)+2*4 -----3+3*(column-1)+2*4    50-73  51/24=2..3 71/24=2..23
4	75-95
 */
function workout($res,$test,$column){
	//计数变量
	$count = 0;
	//查找第$test个e的位置，找到第一个e的位置赋给计数变量，然后以这个位置以后的子字符串为新的字符串，然后重复循环$test次即可
	for($x=1; $x <= $test; $x++){  
		$i = strpos($res,"e");
		$res = substr($res, $i+1);
		$count += ($i+1);
	}
	//因为[' 和 ',' 的存在重新计算行列位置
	$resultrow = intval($count/($column+3)+1);
	$resultcolumn = $count%($column+3)-2;
	//组合字符串
	$result = strval($resultrow) . "_" . strval($resultcolumn);
	return $result;
}

/**
 *异位或加密字符串
 *@param   [String]   $value  [需要加密的字符串]
 *@param   [integer]  $type   [加密解密（0：加密 1:解密）]
 *@return  [String]           [加密或解密后的字符串]
 */
function encryption ($value,$type=0){
	$key = md5(C('ENCTYPTION_KEY'));
	if (!$type) {
		return str_replace('=' , '', base64_encode($value ^ $key));
	}
	$value = base64_decode($value);
	return $value ^ $key;
}

/**
 * 格式化时间
 * @param  [type] $time [要格式化的时间戳]
 * @return [type]       [description]
 */
function time_format ($time) {
	//当前时间
	$now = time();
	//今天零时零分零秒
	$today = strtotime(date('y-m-d', $now));
	//传递时间与当前时秒相差的秒数
	$diff = $now - $time;
	$str = '';
	switch ($time) {
		case $diff < 60 :
			$str = $diff . '秒前';
			break;
		case $diff < 3600 :
			$str = floor($diff / 60) . '分钟前';
			break;
		case $diff < (3600 * 8) :
			$str = floor($diff / 3600) . '小时前';
			break;
		case $time > $today :
			$str = '今天&nbsp;&nbsp;' . date('H:i', $time);
			break;
		default : 
			$str = date('Y-m-d H:i:s', $time);
	}
	return $str;
}