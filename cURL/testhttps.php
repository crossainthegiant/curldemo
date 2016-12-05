<?php
/*
 * curl访问https资源
 */
$curlobj = curl_init();
curl_setopt($curlobj,CURLOPT_URL,"https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js");
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,1); //执行后不直接打印

//HTTPS
date_default_timezone_set('PRC');
curl_setopt($curlobj,CURLOPT_SSL_VERIFYPEER,0);//FALSE 禁止 cURL 验证对等证书（peer's certificate）。要验证的交换证书可以在 CURLOPT_CAINFO 选项中设置，或在 CURLOPT_CAPATH中设置证书目录。
curl_setopt($curlobj,CURLOPT_SSL_VERIFYHOST,2);//设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。译者注：公用名(Common Name)一般来讲就是填写你将要申请SSL证书的域名 (domain)或子域名(sub domain)。 设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。 在生产环境中，这个值应该是 2（默认值）。
$output = curl_exec($curlobj);
curl_close($curlobj);
echo $output;
