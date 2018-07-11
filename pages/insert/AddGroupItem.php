	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);

  $sql = "INSERT INTO group_items (name, type, note)
  VALUES ('$name_Group',
		'$type',
		'$note'
	)";

  if ($conn->query($sql) === TRUE) {
      echo "تم اضافة مجموعة جديدة";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}

   ?>
