<?php
/*
 * 仿照网上例子在登录后下载个人中心页面，这里选的网站是慕课网
 */
$data = "username=crossainb@163.com&password=123456&remember=1";//设置登录的用户名密码（post)
$curlobj = curl_init();
curl_setopt($curlobj,CURLOPT_URL,"http://www.imooc.com/user/login");//这是mooc首页登录的地址
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,1);//设置结果不直接打印出来
/*
 * 对于sessioncookie的设置
 */

date_default_timezone_set('PRC');//由于cookie和session有失效时间，所以启用前设置好时区
curl_setopt($curlobj,CURLOPT_COOKIESESSION,1);//开启cookie和session
curl_setopt($curlobj,CURLOPT_COOKIEFILE,'mycookies');//设置cookie存储的文件名
curl_setopt($curlobj,CURLOPT_COOKIEJAR,'mycookies');//设置读取cookie的文件名（连接结束后，比如，调用 curl_close 后，保存 cookie 信息的文件。）
curl_setopt($curlobj,CURLOPT_COOKIE,session_name().'='.session_id());//设置cookie内容（设定 HTTP 请求中"Cookie: "部分的内容。多个 cookie 用分号分隔，分号后带一个空格(例如， "fruit=apple; colour=red")。 ）
curl_setopt($curlobj,CURLOPT_HEADER,0);//设置为0则不显示头文件的信息
curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);//让curl支持页面跳转

curl_setopt($curlobj,CURLOPT_POST,1);//因为登录用的post方式，所以要开启post
curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);//设置post的数据
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;charset=utf-8","Content-Length: " . strlen($data)));//设置头信息（此段为post通用，直接复制得到）

curl_exec($curlobj);

curl_setopt($curlobj,CURLOPT_URL,"http://www.imooc.com/u/4523214");
curl_setopt($curlobj,CURLOPT_POST,0);//由于下载页面的时候一般用默认的GET方法，所以这里要关闭post。
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));//设置头信息，同固定
$output = curl_exec($curlobj);
curl_close($curlobj);
print_r($output);








