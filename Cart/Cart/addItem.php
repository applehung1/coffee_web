<?php
header('Content-type: text/html; charset=utf-8');

require_once "inc/class/Car.class.php";

session_start();

$Cart = new Cart();

$sn = $_GET["sn"];
$num = $_GET['num'];
//echo $sn;
if(!is_numeric($num))
$num = 1;
if(isset($sn) && strlen(trim($sn))>0 && is_numeric($sn)){
	$Cart->addItem($sn, "產品名稱", 100, $num, "描述", "單位");

}
//加入成功後回到前一頁
$referer  = $_SERVER['HTTP_REFERER'];
if(strlen(trim($referer))==0)
$referer = "Product.php";

header("Location:$referer");
?>