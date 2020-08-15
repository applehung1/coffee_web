<?php
$host = "localhost";
$db_name = "coffee";
$username = "root";
$password = "12345678";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    //設定exception 模式
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
//to handle connection error
catch(PDOException $exception){
    echo "連結DB發生錯誤: " . $exception->getMessage();
}
?>