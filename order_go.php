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

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$tmp = "insert into orders (name, phone, address, email) values ('$name', '$phone', '$address', '$email')";
//print($tmp);
$conn->beginTransaction();
$conn->exec($tmp);
$conn->commit();

$sql = "SELECT * From orders";
$stmt = $conn->query($sql);
$iem = $stmt->fetchAll(PDO::FETCH_NUM);

?>
<!DOCTYPE html>

<html>
 <head>
  <meta charset="utf-8"></meta>
  <title>提交完成</title>
  
 
 </head>

 <body>
 
      <font>感謝您的訂購!</font>
	  
	  
  </form> 
	      

 </body>