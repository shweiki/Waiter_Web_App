<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
 $table_id = $_GET["table_id"];
 	  $hall_id = $_GET["hall_id"];
 $sql = "	UPDATE tables_
	SET status = 2
	WHERE id= $table_id";

 if ($conn->query($sql) === TRUE) {
	 header("Location: http://". $_SERVER['SERVER_NAME']."/wanter_order_app/pages/ShowTableHall.php?hall_id=$hall_id"); /* Redirect browser */
	 exit();
 } else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
 }
}else {
header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

$conn->close();

 ?>
