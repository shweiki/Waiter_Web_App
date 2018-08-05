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
		$id = "SELECT max(id) FROM tables_ LIMIT 1";
$result = $conn->query($id);
$idTable= mysqli_fetch_assoc($result);
$idTable++;
echo "<tr>
		<td>$name_table</td>
		<td>$num_chair</td>
		<td>$note</td>
		<td>$hall_id</td>
	<td><a href='?TableIdDeleted=".implode($idTable)."'><button type='button' class='btn btn-danger'>حذف</button></td></a>
	</tr>";

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}else {
	header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

   ?>
