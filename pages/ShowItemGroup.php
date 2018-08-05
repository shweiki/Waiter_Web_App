<?php
session_start();
if (!isset($_SESSION['user_ID'])){
    header('Location: http://'.$_SERVER["SERVER_NAME"].'/wanter_order_app/login.php');
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> اصناف المجمواعات</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
					    <link rel="stylesheet" href="../css/filterTable.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="stylesheet" href="../css/tableTab.css">
</head>

<body >
  <div class="body-wrapper">
		<?php
    include "../connect_restaurent.php";
		if (isset($_GET['Group_id'])) {
		 $Group_id = $_GET["Group_id"];
     $sql = "SELECT * FROM group_items WHERE id = $Group_id ";
   $result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
   // output data of each row
  $Group_name = $row["name"];
	}else {
	 header('Location: http://localhost/wanter_order_app/pages/samples/404.html');
	}

		 ?>
    <!-- partial:partials/_sidebar.html -->
    <?php include "../partials/_sidebar.php"; ?>

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
   <?php include "../partials/_navbar.php"; ?>
    <!-- partial -->

    <div class="page-wrapper mdc-toolbar-fixed-adjust">
		<main class="content-wrapper drawer-minimized" style="direction: rtl; text-align: right;" >
				<div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">

						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10">
							<div class="mdc-card">
                <section class="mdc-card__primary">
                  <h1 ><?= $Group_name; ?></h1>
                </section>
      <div class="template-demo ">
          <table class="table table-hoverable">
            <thead class="font-weight-bold">
              <tr>
                <th>#</th>
                <th >الصنف</th>
                <th>المجموعة</th>
                <th>التكلفة</th>
                <th>البيع</th>
                <th>ملاحظات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM items WHERE group_items_id =$Group_id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><img height='30' width='30' src="data:image;base64,<?php echo $row['img_url']; ?>"></td>
      <td><?= $row["name_item"]; ?></td>
      <td><?= $row["group_items_id"]; ?></td>
        <td><?= $row["cost_price"]; ?></td>
         <td><?= $row["sale_price"]; ?></td>
      <td><?= $row["note"]; ?></td>
</tr>
<?php
}

} else {
echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
}
$conn->close();
?>
            </tbody>
          </table>
    </div>

    </div>
  </div>

</div>
</div>
</main>

</div>
</div>

	<!-- partial:../../partials/_FOOTER.PHP -->
	<?php include "../partials/_FOOTER.PHP"; ?>
	<!-- partial -->
  <!-- body wrapper -->
  <!-- plugins:js -->

  <script src="../js/material-components-web.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../js/Chart.min.js"></script>
  <script src="../js/progressbar.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/misc.js"></script>
  <script src="../js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
    <script src="../js/bootstrap.min.js"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>

  <!-- End custom js for this page-->
</body>

</html>





<!------ Include the above in your HEAD tag ---------->
