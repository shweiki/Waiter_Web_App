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

echo "تم اضافة s s";
}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}else {
header('samples/404.html');
}


   ?>
