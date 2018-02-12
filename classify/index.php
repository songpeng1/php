<?php 
/**
 *递归实现无限分类
 * 三种递归方法
 */

// function deeploop(&$i=1){
// 	echo $i;
// 	$i++;
// 	if($i<10){
// 		deeploop($i);
// 	}
// }
// deeploop();
//---------------------
// $i=1;
// function deeploop(){
// 	global $i;
// 	echo $i;
// 	$i++;
// 	if($i<10){
// 		deeploop($i);
// 	}
// }
// deeploop();
//---------------------

// function deeploop(){
// 	static $i=1;
// 	echo $i;
// 	$i++;
// 	if($i<10){
// 		deeploop($i);
// 	}
// }
// deeploop();
// 
//


ini_set('display_errors', true);

$db_host='localhost';
$db_user="root";
$db_password="root";
$db_name="phptext";

$link=mysqli_connect($db_host,$db_user,$db_password) or die(mysqli_error($link));

mysqli_select_db($link,$db_name) or die(mysqli_error($link));
mysqli_query($link,"set names utf8") or dir('编码错误');

/**
 * [getList description]
 * @desc      [获取栏目内容]
 * @Author    pengsongi
 * @dDatetime 2018-02-11T10:24:00+0800
 * @company   tonelink
 * @param     [type]                   $link    [description]
 * @param     integer                  $pid     [description]
 * @param     array                    &$result [description]
 * @param     integer                  $spac    [description]
 * @return    [type]                            [description]
 */
function getList($link,$pid=0,&$result=array(),$spac=0){
	
	$spac=$spac+2;
	$sql="select * from category where pid=$pid";
	$res=mysqli_query($link,$sql);
	
	while($row=mysqli_fetch_array($res,1)){

		$row['name']=str_repeat('&nbsp;&nbsp;',$spac)."|--".$row['name'];
		$result[]=$row;//print_r($result);
		getList($link,$row['id'],$result,$spac);
	} 

	return $result;
}


/**
 * [displayCate description]
 * @desc      [显示输出栏目]
 * @Author    pengsongi
 * @dDatetime 2018-02-11T10:24:33+0800
 * @company   tonelink
 * @param     [type]                   $link     [description]
 * @param     integer                  $pid      [description]
 * @param     integer                  $selected [description]
 * @return    [type]                             [description]
 */
function displayCate($link,$pid=0,$selected=0){
	$rs=getList($link,$pid);
	$str='';
	$str.='<select name="cate">';
	foreach ($rs as $key => $value) {
		$selectedstr='';
		if($value['id']==$selected){
			$selectedstr="selected";
		}
		$str.="<option {$selectedstr}>{$value['name']}</option>";
	}
	return $str.='</select>';

}

echo displayCate($link,0,2);





function getCatePath($link,$cid,&$result=array()){
	$sql="select * from category where id=$cid";
	$rs=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($rs);
	if($row){
		$result[]=$row;
		getCatePath($link,$row['pid'],$result);
	}
	
	return $result;
}

$res=getCatePath($link,7);
$res=array_reverse($res);
echo "<br/>";
foreach ($res as $key => $value) {
	echo $value['name'].'>';
}









mysqli_close($link);










?>