<!DOCTYPE html>
<html lang="en">

<head>

	<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $hall_id = $_GET["hall_id"];
      $hall_name = $_GET["name"];
}else {
 header('samples/404.html');
}
	include "../connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> <?php echo $hall_name; ?></title>
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
        <div class="row">
    		<div class="col-md-12" style=" position: unset;">
    			<h3><?php echo $hall_name; ?></h3>

    			<div class="tabbable-panel">
    				<div class="tabbable-line">
    					<ul class="nav nav-tabs ">
    						<li class="mx-auto active">
    							<a href="#tab_default_1" data-toggle="tab">
    							قيد انتظار </a>
    						</li>
    						<li class="mx-auto">
    							<a href="#tab_default_2" data-toggle="tab">
    							فارغ </a>
    						</li>
    						<li class="mx-auto">
    							<a href="#tab_default_3" data-toggle="tab">
    							محجوز </a>
    						</li>
    					</ul>
    					<div class="tab-content">

    						<div class="tab-pane active" id="tab_default_1">
<?php
   $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status = 2 ";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 ?>
 <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header"><?php echo $row["name_table"]; ?></div>
  <div class="card-body">
    <h5 class="card-title">عدد الكراسي <?php echo $row["num_chair"]; ?></h5>
    <p class="card-text"><?php echo $row["note"]; ?></p>
  </div>
</div>
 <?php
 }

 } else {
 echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
 }
?>

    						</div>
    						<div class="tab-pane" id="tab_default_2">
   <div class="row">
                  <?php
                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status=1 ";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                   ?>

                   <div class="card  bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><?php echo $row["name_table"]; ?></div>
                    <div class="card-body">
                      <h5 class="card-title">عدد الكراسي <?php echo $row["num_chair"]; ?></h5>
                      <p class="card-text"><?php echo $row["note"]; ?></p>
                      <a href="../pages/booking.php?table_id=<?php echo $row['id']; ?>" class="btn btn-success">حجز</a>
                    </div>
                  </div>

                   <?php
                   }

                   } else {
                   echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
                   }
                  ?>
    </div>
    						</div>
    						<div class="tab-pane" id="tab_default_3">

                  <?php
                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status=3 ";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                   ?>
                   <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"><?php echo $row["name_table"]; ?></div>
                    <div class="card-body">
                      <h5 class="card-title">عدد الكراسي <?php echo $row["num_chair"]; ?></h5>
                      <p class="card-text"><?php echo $row["note"]; ?></p>
                        <a href="../pages/OrderTable.php?table_id=<?php echo $row['id']; ?>&table_name=<?php echo $row['name_table']; ?>" class="btn btn-danger">طلب</a>
                        <a href="../pages/close_booking.php?table_id=<?php echo $row['id']; ?>" class="btn btn-danger">الغاء الحجز</a>
                    </div>
                  </div>
                   <?php
                   }

                   } else {
                   echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
                   }
                  ?>

    						</div>
    					</div>
    				</div>
    			</div>


    		</div>
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
