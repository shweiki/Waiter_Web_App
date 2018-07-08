
	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $name = $_POST["name_saleh"];
  $note = $_POST["note"];
  $sql = "INSERT INTO hall (name_hall, note)
  VALUES ('$name', '$note')";

  if ($conn->query($sql) === TRUE) {
      echo "تم اضافة صالة جديدة";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}

   ?>
