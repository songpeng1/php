<?php  
/**
 *ob_start 打开输出控制缓冲
 *ob_get_contents  返回输出缓冲区内容
 *ob_clean 清空输出缓冲区
 *ob_get_clean 得到当前缓冲区的内容并删掉当前输出缓冲区
 * 
 */
ini_set('display_errors', true);
ob_start();
// echo '<h1>asdsfsdfsdf阿萨德</h1>';
$data=array(
array('name'=>'新闻1'),
array('name'=>'新闻2'),
array('name'=>'新闻3'),
array('name'=>'新闻4')
	);

include './template/list.php';

if(file_put_contents('test.shtml', ob_get_clean())){
	echo 'success';
}else{
	echo 'error';
}



?>