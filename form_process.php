<?php

function connect()
{
	// DB connection info
	$host = "localhost";
	$user = "root";
	$pwd = "12345678";
	$db = "apple";
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
$price = $_GET['price'];
$discount = $_POST['discount'];
$tmp = "insert into product (id,name, price, discount) values ('$id', '$name', '$price', '$discount')";
//print($tmp);
$conn->beginTransaction();
$conn->exec($tmp);
$conn->commit();

$sql = "SELECT * From product";
$stmt = $conn->query($sql);
$iem = $stmt->fetchAll(PDO::FETCH_NUM);

?>
<!DOCTYPE html>
<html>
<head>
	<title>0313315</title>
</head>
<body>


<table width="300px" border="">
	<tr>
		<td>Id</td>
		<td>Name</td>
		<td>Price</td>
		<td>Discount</td>
	</tr>
<?php

if(!empty($iem))
{
?>

<?php

	foreach($iem as $iem)
	{
		
		echo "<tr>";
		echo "<td>". $iem[0] ."</td>";
		echo "<td>". $iem[1] ."</td>";
		echo "<td>". $iem[2] ."</td>";
		echo "<td>". $iem[3] ."</td>";
		echo "</tr>";
	}
}

?>

</table>

</body>
</html>


