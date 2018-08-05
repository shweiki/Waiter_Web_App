	<?php include "../../connect_restaurent.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);

  $sql = "INSERT INTO group_items (name, type, note)
  VALUES ('$name_Group',
		'$type',
		'$note'
	)";

	if ($conn->query($sql) === TRUE) {
		$id = "SELECT max(id) FROM group_items LIMIT 1";
$result = $conn->query($id);
$idGroup= mysqli_fetch_assoc($result);
$idGroup++;
echo "			<tr>
				<td>$name_Group</td>
        <td>$type</td>
				<td>$note</td>
				<td><a href='../pages/ShowItemGroup.php?Group_id=".implode($idGroup)."' class='btn btn-info'>مواد</a></td>
				<td><a href='?GroupItemIdDeleted=".implode($idGroup)."'><button type='button' class='btn btn-danger'>حذف</button></td></a>
			</tr>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}else {
	header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

   ?>
