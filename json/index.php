<?php
/**
 * 一维数组转json
 * 二维数组转json
 * 对象转json
 * json转对象
 * json转数组
 */
//一维
$arr=array("asd","asd");
//二维
$arr2=array(array('key'=>'val','as'=>12),array('key2'=>'val2','as2'=>'12'));
echo '<pre/>';
print_r($arr);
print_r($arr2);

echo '<div>一维数组转json</div>';
echo json_encode($arr);
echo '<div>二维数组转json</div>';
echo json_encode($arr2);

class obj{
	public $name='song';
	protected $ppname='asd';
	private $sdfname='1a1';

	public function getName(){
		return $this->ppname;
	}
}
echo '<div>对象转json</div>';
$obj=new obj();
echo json_encode($obj);

$jsonStr='{"key":"value","key2":"value2"}';
echo '<div>json转对象，json转数组</div>';
print_r(json_decode($jsonStr));
print_r(json_decode($jsonStr,true));

?>