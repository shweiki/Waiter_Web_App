<?php
session_start();
//login.php
if(isset($_POST["user_name"]))
{
  include "../../connect_restaurent.php";
extract($_POST);
  $sql = "SELECT id,full_name FROM users WHERE user_name = '$user_name' AND password = md5('$user_password') ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
      // output data of each row
$_SESSION["user_ID"] = $row['id'];
$_SESSION["user_Name"] = $row['full_name'];
}
    echo "<script>window.location='http://" . $_SERVER['SERVER_NAME'] ."/wanter_order_app/pages/dashbord.php';</script>";


}
   else {
      echo "اسم المستخدم او كلمة المرور خطأ ..";
  }
}else {
header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/samples/404.html');
}

$conn->close();
?>
