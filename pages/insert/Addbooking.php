	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);
$time_log = date("Y-m-d h:i:sa");
//getdate()
$sql = "INSERT INTO booking ( cus_id ,  table_id , Number_person, status ,  Book_Date_Time )
VALUES ($customers,
	$Table_id,
	$NumPerson,
	1,
'$time_log')";
if ($conn->query($sql) === TRUE) {
	$sql = "	UPDATE tables_
	 SET status = 3
	 WHERE id= $Table_id";

	if ($conn->query($sql) === TRUE) {
  header("Location: http://". $_SERVER['SERVER_NAME']."/wanter_order_app/pages/ShowTableHall.php?hall_id=$hall_id");
	} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}

}else {
 	echo "Error: " . $sql . "<br>" . $conn->error;
}
}else {
header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

   ?>
