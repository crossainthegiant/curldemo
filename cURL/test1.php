<?php
/*
 * 下载网页后替换某些字符后输出
 */
$curlobj = curl_init();
curl_setopt($curlobj,CURLOPT_URL,"http://www.baidu.com"); //设定连接的url
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);  //使前面得到的数据不直接打印出来
$output = curl_exec($curlobj);
curl_close($curlobj);
echo  str_replace("百度","度娘",$output);