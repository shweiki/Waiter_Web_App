	<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include "../../connect_restaurent.php";
	extract($_POST);

  $sql = "INSERT INTO tables_ (name_table, status,num_chair,note,hall_id)
  VALUES ('$name_table',
		2,
		$num_chair,
		'$note',
	$hall_id)";

  if ($conn->query($sql) === TRUE) {
      echo "تم اضافة طاولة جديدة";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}else {
	header('Location: http://localhost/wanter_order_app/pages/samples/404.html');
}

   ?>
