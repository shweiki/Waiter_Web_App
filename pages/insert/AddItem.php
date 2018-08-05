
<?php include "../../connect_restaurent.php";

if(getimagesize ($_FILES['img_blog']['tmp_name'])== false)
{

}else {
$image= addslashes ($_FILES["img_blog"]['tmp_name']);
$image= file_get_contents($image);
$image= base64_encode($image);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);

$sql = "INSERT INTO items (
name_item,
unit,
cost_price,
sale_price	,
img_url,
note,
group_items_id
)
VALUES (
  '$name_item',
  '$unit',
  $cost_price,
  $sale_price,
'$image',
  '$note',
  $group_items_id
)";

if ($conn->query($sql) === TRUE) {
    echo "تم اضافة مجموعة مواد جديدة .";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}else {
  header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

 ?>
