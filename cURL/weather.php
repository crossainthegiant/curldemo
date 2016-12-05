<?php
$post = 'theCityCode=' . urlencode('广州') . '&theUserID='; //post数据

$curl = curl_init();

$header[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36';
curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //curl_opt_http_header包装请求头

curl_setopt($curl, CURLOPT_URL, 'http://ws.webxml.com.cn/WebServices/WeatherWS.asmx/getWeather');
curl_setopt($curl, CURLOPT_HEADER, 0);           //如果你想把一个头包含在输出中，设置这个选项为一个非零值。

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   //结果缓存，不直接输出

curl_setopt($curl, CURLOPT_POST, 1);             //设置为post请求，否则默认为get

curl_setopt($curl, CURLOPT_POSTFIELDS, $post);   //post的数据
$response = curl_exec($curl);

curl_close($curl);

$xml = simplexml_load_string($response);//simplexml_load_file(string,class,options,ns,is_prefix)把xml格式的字符串导入到对象中，回类 SimpleXMLElement 的一个对象，该对象的属性包含 XML 文档中的数据。如果失败，则返回 false。

print_r($xml);