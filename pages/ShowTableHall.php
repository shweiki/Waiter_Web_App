_FOOTER.PHP<!DOCTYPE html>
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

<body>
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

    			<h3><?php echo $hall_name; ?></h3>

					<div class="col-md-8">
	            <div class="panel with-nav-tabs panel-primary">
	                <div class="panel-heading">
	                        <ul class="nav nav-tabs">

	                            <li><a href="#tab1primary" data-toggle="tab">		فارغ</a></li>
															<li class=""><a href="#tab2primary" data-toggle="tab">	قيد انتظار </a></li>
	                            <li><a href="#tab3primary" data-toggle="tab">	محجوز </a></li>
	                        </ul>
	                </div>
	                <div class="panel-body">
	                    <div class="tab-content">
	                        <div class="tab-pane   in active" id="tab1primary">
														<?php
													   $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status = 1 ";
													 $result = $conn->query($sql);

													 if ($result->num_rows > 0) {
													 // output data of each row
													 while($row = $result->fetch_assoc()) {
													 ?>

													 <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"><?= $row["name_table"]; ?></div>
  <div class="card-body text-primary">
    <h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
    <p class="card-text"><?= $row["note"]; ?>.</p>
				<a href="../pages/EndTable.php?table_id=<?=  $row['id']; ?>" class="btn btn-danger">انهاء الطاولة</a>
  </div>
								</div>
													 <?php
													 }

													 } else {
													 echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
													 }
													?>
</div>
	                        <div class="tab-pane  " id="tab2primary">
														  <?php
					                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status=2 ";
					                   $result = $conn->query($sql);

					                   if ($result->num_rows > 0) {
					                   // output data of each row
					                   while($row = $result->fetch_assoc()) {
					                   ?>
														 <div class="card border-primary mb-3" style="max-width: 18rem;">
						<div class="card-header"><?= $row["name_table"]; ?></div>
						<div class="card-body text-primary">
						<h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
						<p class="card-text"><?= $row["note"]; ?>.</p>
						<a href="../pages/OrderTable.php?table_id=<?php echo $row['id']; ?>&table_name=<?php echo $row['name_table']; ?>" class="btn btn-success">طلبات</a>
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
	                        <div class="tab-pane  " id="tab3primary">
													                  <?php
													                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status=3 ";
													                   $result = $conn->query($sql);

													                   if ($result->num_rows > 0) {
													                   // output data of each row
													                   while($row = $result->fetch_assoc()) {
													                   ?>
																						 <div class="card border-primary mb-3" style="max-width: 18rem;">
														<div class="card-header"><?= $row["name_table"]; ?></div>
														<div class="card-body text-primary">
														<h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
														<p class="card-text"><?= $row["note"]; ?>.</p>
														<a href="../pages/CancelBooking.php?table_id=<?= $row['id']; ?>" class="btn btn-danger">الغاء الحجز </a>
										<a href="../pages/booking.php?table_id=<?= $row['id']; ?>" class="btn btn-success">طلبات</a>
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
