
	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $name = $_POST["name_saleh"];
  $note = $_POST["note"];
  $sql = "INSERT INTO hall (name_hall, note)
  VALUES ('$name', '$note')";

  if ($conn->query($sql) === TRUE) {
		$id = "SELECT max(id) FROM hall LIMIT 1";
$result = $conn->query($id);
$idhall= mysqli_fetch_assoc($result);
$idhall++;
echo "<tr>
<td>$name</td>
<td>$note</td>
<td><a href='../pages/ShowTableHall.php?hall_id=".implode($idhall)."' class='btn btn-info'>طاولات</a></td>
	<td><a href='?HallIdDeleted=".implode($idhall)."'><button type='button' class='btn btn-danger'>حذف</button></td></a>
	</tr>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}else {
	header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

   ?>
