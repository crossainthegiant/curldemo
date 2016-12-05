<?php
//抓取网站数据
$curl = curl_init("http://www.baidu.com/");
curl_exec($curl);
curl_close($curl);
