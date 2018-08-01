	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);
$time_log = date("Y-m-d h:i:sa");
//getdate()
  $sql = "INSERT INTO users (full_name, password, birthday ,status,user_name)
  VALUES ('$Full_name',
		md5('$pass'),
		'$birthday',
		1,
	'$user_Name')";

  if ($conn->query($sql) === TRUE) {
		session_start();
		session_unset();

		// destroy the session
		session_destroy();
  echo "<script>window.location='http://localhost/wanter_order_app/login.php';</script>";
}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}else {
header('Location: http://localhost/wanter_order_app/pages/samples/404.html');
}


   ?>
