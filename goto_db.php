<?php

function connect()
{
	// DB connection info
	$host = "localhost";
	$user = "root";
	$pwd = "12345678";
	$db = "coffee";
	try{
		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e){
		die(print_r($e));
	}
	return $conn;
}

$conn = connect();

$id = $_GET['id'];
$name = $_GET['name'];
$quantity = $_GET['quantity'];
$total_price = $_GET['total_price'];
$tmp = "insert into cart (id,name,quantity,total_price) values ('$id', '$name', '$quantity','$total_price')";
//print($tmp);
$conn->beginTransaction();
$conn->exec($tmp);
$conn->commit();

$sql = "SELECT * From cart";
$stmt = $conn->query($sql);
$iem = $stmt->fetchAll(PDO::FETCH_NUM);
?>

<!DOCTYPE html>

<html>
 <head>
  <meta charset="utf-8"></meta>
  <title>收件資料填寫</title>
  
 
 </head>

 <body>
 
      <font>請輸入資料</font><br/><br/>
 
 <form action = "order_go.php" method="post">
      <label for = "id">姓名:</label>
	  <input type = "text" name ="name" id = "name" /><br/><br/>
	  
	  <label for = "name">電話:</label>
	  <input type = "text" name ="phone" id = "phone" /><br/><br/>
	  
	  <label for = "price">收件地址:</label>
	  <input type = "text" name ="address" id = "address" /><br/><br/>
	  
	  <label for = "discount">電子信箱:</label>
	  <input type = "text" name ="email" id = "email" /><br/><br/>
	   <input type = "submit"/>
	  
  </form> 
	      

 </body>
