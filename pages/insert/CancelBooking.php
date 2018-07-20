	<?php include "../../connect_restaurent.php";
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	 $table_id = $_GET["table_id"];
	 $sql = "	UPDATE tables_
 		SET status = 2
 		WHERE id= $table_id";

   if ($conn->query($sql) === TRUE) {
       header("Refresh:0");
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
}else {
 header('samples/404.html');
}

  $conn->close();

   ?>
