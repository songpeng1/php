<?php 
/**
 * curl使用
 * 
 */


/**
 * curl网站爬虫
 * 实例描述：在网络上下载一个网页并把内容中的‘百度’替换成‘屌丝’之后输出
 */
//初始化
$curl=curl_init();
//设置访问网页的url
curl_setopt($curl,CURLOPT_URL,'http://www.baidu.com');
//不直接打印出来
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//执行
$output=curl_exec($curl);
//关闭
curl_close($curl);

echo str_replace("百度", "屌丝", $output);











?>