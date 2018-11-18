<?php
session_start();
if (!isset($_SESSION['user_ID'])){
  header('Location: http://'.$_SERVER["SERVER_NAME"].'/Wanter_app_php/login.php');
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>الرئسية</title>
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
</head>

<body >
  <div class="body-wrapper">
    <?php include "../connect_restaurent.php"; ?>
    <!-- partial:partials/_sidebar.html -->
    <?php require_once('../partials/_sidebar.php'); ?>

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->

	 <?php require_once('../partials/_navbar.php'); ?>
    <!-- partial -->

		<div class="page-wrapper mdc-toolbar-fixed-adjust">
			 		<main class="content-wrapper drawer-minimized" style="direction: rtl; text-align: right;" >

						<div class="mdc-layout-grid">
							<div class="mdc-layout-grid__inner">
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
									<div class="mdc-layout-grid__inner w-100">
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-danger rounded">
													<i class="mdi mdi-account-settings text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
<h4 class="font-weight-normal mb-0 mt-0">العملاء</h4>
													<h3 class="mdc-typography--display1 font-weight-bold mb-1">
                            <?php
                            $sql = "SELECT count(*) as all_cus FROM customers";

                      $result = $conn->query($sql);
  while($row = mysqli_fetch_assoc($result)) {
  echo $row['all_cus'];
}
                        ?>

                          </h3>

												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-success rounded">
													<i class="mdi mdi-basket text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
                          <h4 class="font-weight-normal mb-0 mt-0">المبيعات</h4>
                          													<h3 class="mdc-typography--display1 font-weight-bold mb-1">
                                                      <?php
                                                      $sql = "SELECT sum(total_amount) as all_order_amount FROM orders";

                                                $result = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            echo '$'.$row['all_order_amount'];
                          }
                                                  ?>

                                                    </h3>
												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-warning rounded">
													<i class="mdi mdi-ticket text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
                          <h4 class="font-weight-normal mb-0 mt-0">الحجوزات</h4>
                          													<h3 class="mdc-typography--display1 font-weight-bold mb-1">
                                                      <?php
                                                      $sql = "SELECT count(*) as all_order FROM booking";

                                                $result = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            echo $row['all_order'];
                          }
                                                  ?>
												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-primary rounded">
													<i class="mdi mdi-account-star text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
                          <h4 class="font-weight-normal mb-0 mt-0">حركات المستودع</h4>
                                                    <h3 class="mdc-typography--display1 font-weight-bold mb-1">
                                                      <?php
                                                      $sql = "SELECT count(*) as all_move_items FROM repository_move";

                                                $result = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            echo $row['all_move_items'];
                          }
                                                  ?>
											</div>
										</div>
									</div>
								</div>

</div>

								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10">
									<div class="mdc-card table-responsive">
										<div class="table-heading px-2 px-1 border-bottom">
											<h1 class="mdc-card__title mdc-card__title--large">الحجزات</h1>
										</div>
										<table class="table">
											<thead>
												<tr>
													<th >اسم العميل</th>
													<th>الطاولة </th>
													<th>تاريخ</th>
													<th>المبلغ</th>
													<th>بيانات</th>
													<th>#</th>

												</tr>
											</thead>
											<tbody>
                        <?php
                        $sql = "SELECT c.FullName , c.Num_Ph , c.Date_log  , o.total_amount , t.name_table
                         FROM booking b, customers c  , orders o  , tables_ t
                        where t.id = b.table_id
                          and  c.id=  b.cus_id
                          and o.Book_id = b.id
                        ";

                  $result = $conn->query($sql);
                  if (!$result) {
         printf("Errormessage: %s\n", $mysqli->error);
      }

                        while($row = mysqli_fetch_assoc($result)) {
                  ?>
												<tr>
													<td ><?= $row['FullName']; ?></td>
													<td><?= $row['name_table']; ?></td>
													<td><?= $row['Date_log']; ?></td>
													<td><?= $row['total_amount']; ?></td>
													<td><?= $row['Num_Ph']; ?></td>

													<td>
                            <div class="col mdc-button" data-mdc-auto-init="MDCRipple">
                            <i class="mdi mdi-heart text-blue"></i>
                          </div>
                          <div class="col mdc-button" data-mdc-auto-init="MDCRipple">
                            <i class="mdi mdi-forum text-yellow"></i>
                          </div>
                            <div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i>
                            </div>
                          </td>
												</tr>
                        <?php


                        }
                                            ?>

												</tbody>
											</table>
									</div>
								</div>
							</div>
						</div>


			</main>

		</div>

	</div>

	<!-- partial:  partials/_FOOTER.PHP -->
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
