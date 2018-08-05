	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);
$time_log = date("Y-m-d h:i:sa");
//getdate()
  $sql = "INSERT INTO customers (FullName, Num_Ph, Note, Date_log)
  VALUES ('$cus_name',
		'$cus_phone',
		'$Note',
	'$time_log')";
  if ($conn->query($sql) === TRUE) {
		$id = "SELECT max(id) FROM customers LIMIT 1";
$result = $conn->query($id);
$idCus= mysqli_fetch_assoc($result);
$idCus++;
echo "<tr>
		<td>$cus_name</td>
		<td>$cus_phone</td>
		<td>$Note</td>
		<td>$time_log</td>
	<td><a href='?CusIdDeleted= ".implode($idCus)."'><button type='button' class='btn btn-danger'>حذف</button></td></a>
	</tr>";
}
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}else {
header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}


   ?>
