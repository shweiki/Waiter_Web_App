<!DOCTYPE html>
<html lang="en">

<head>

	<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $Group_id = $_GET["Group_id"];
      $Group_name = $_GET["name"];
}else {
 header('samples/404.html');
}
	include "../connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> <?php echo $Group_name; ?></title>
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
    <!-- partial:partials/_sidebar.html -->
    <?php include "../partials/_sidebar.php"; ?>

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
   <?php include "../partials/_navbar.php"; ?>
    <!-- partial -->

		<div class="page-wrapper mdc-toolbar-fixed-adjust">
			<main style="direction: rtl; text-align: right;" class="">

          <div class="container">
            	<h3><?php echo $Group_name; ?></h3>
        <div class="row">
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
      <td><?php echo $row["name_item"]; ?></td>
      <td><?php echo $row["group_items_id"]; ?></td>
        <td><?php echo $row["cost_price"]; ?></td>
         <td><?php echo $row["sale_price"]; ?></td>
      <td><?php echo $row["note"]; ?></td>
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
			</main>

		</div>
		</div>


	<!-- partial:../../partials/_footer.html -->
	<?php include "../partials/_footer.html"; ?>
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
