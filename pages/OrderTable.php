<!DOCTYPE html>
<html lang="en">

<head>

	<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $table_id = $_GET["table_id"];
  $table_name = $_GET["table_name"];
}else {
 header('samples/404.html');
}
	include "../connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $table_name; ?>طلبات الطاولة</title>
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


									<div class="col-sm-8 col-md-7 col-md-offset-1" style="position: unset;">

											<div class="panel panel-primary">
												<div class="panel-heading">الفاتورة \ الطلب رقم : </div>
    <div class="panel-body">
			<div class="">
	                    <table class="table  table-hover">
	                        <thead>
	                            <tr>
	                                <th>الصنف</th>
	                                <th>الكمية</th>
	                                <th >السعر</th>
	                                <th >المجموع</th>
	                                <th># </th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <td class="col-sm-1 col-md-1" style="position: unset;">
	                                <div class="">
	                                    <div class="-">
	                                        <h6 class="-">فلافل</h6>
	                                    </div>
	                                </div>
	                              </td>
	                                <td class="col-sm-1 col-md-1" style="text-align: right;">
	                                <input type="number" class="form-control" id="exampleInputEmail1" value="3" style="position: unset;">
	                                </td>
	                                <td class=" "style="position: unset;"><strong>$4.87</strong></td>
	                                <td class=" "style="position: unset;"><strong>$14.61</strong></td>
	                                <td class=""style="position: unset;">
	                                <button type="button" class="btn btn-danger btn-sm">حذف</button>
	                              </td>
	                            </tr>


	                        </tbody>
	                    </table>
											</div>
											</div>
											</div>
	                </div>
									<div class="col-sm-2 col-md-3 " style="position: unset;">
										<div class="panel panel-success">
								<div class="panel-heading">
										<h4 class="panel-title">
												<span class="glyphicon glyphicon-bookmark"></span>طاولة  <?= $table_name; ?></h4>
								</div>
								<div class="panel-body">
										<div class="row">
						<div class="col-xs-8">
							<h6><span class="text-muted">JD</span> <strong>25.00 </strong></h6>
						</div>
						<div class="col-xs-4">
<h4 class="product-name"><strong>المجموع</strong></h4>
</div>
<div class="col-xs-8">
	<h6><span class="text-muted">JD</span> <strong>25.00 </strong></h6>
</div>
<div class="col-xs-4">
<h4 class="product-name"><strong>المجموع</strong></h4>
</div>						<div class="col-xs-8">
							<h6><span class="text-muted">JD</span> <strong>25.00 </strong></h6>
						</div>
						<div class="col-xs-4">
<h4 class="product-name"><strong>المجموع</strong></h4>
</div>


								</div>			</div>
								<div class="panel-footer">
				<div class="row text-center">

					<div class="col-xs-6">
						<button type="button" class="btn btn-danger btn-block">
						خروج و حفظ
						</button>
					</div>
					<div class="col-xs-6">
						<button type="button" class="btn btn-success btn-block">
							ترحيل
						</button>
					</div>
				</div>
			</div>
						</div>
									</div>
            </div>
        </div>
				<div class="container">
			<div class="row">
			<div class="col-md-12 col-sm-2" style=" position: unset;">
				<div class=" panel panel-primary">
					<div class="tabbable-line">

						<div class="tab-content">
				<?php
					global $Group_items_id;
					$Group_items_id = array();
				$sql = "SELECT * FROM group_items";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
array_push($Group_items_id,$row["id"]);
}
}

						foreach($Group_items_id as &$id) {


							?>
						<div class="tab-pane fade in " id="tab_default_<?= $id ?>">
								<div class="card-group">

								<?php
								$sql = "SELECT * FROM items WHERE group_items_id =$id ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			?>
			<div class="card col-sm-2 col-md-2 ">
			<img class="rounded" height="50" width="50"  src="data:image;base64,<?php echo $row['img_url']; ?>">
			<div class="card-body">
			<h5 class="card-title"><?php echo $row["name_item"]; ?></h5>
			<p class="card-text"><?php echo $row["note"]; ?>.</p>
			<p class="card-text"><small class="text-muted"><?php echo $row["sale_price"]; ?></small></p>
			</div>
			</div>

			<?php
			}

			} else {
			echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
			}
			//$conn->close();
			?>

			</div>
							</div>
						<?php } ?>


						</div>
					 <ul class="nav nav-tabs">
						<?php

							$sql = "SELECT * FROM group_items";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
		array_push($Group_items_id,$row["id"]);
				?>
				<li class="mx-auto col-md-2 label " id="<?= $row["id"]; ?>">
					<a  href="#tab_default_<?= $row["id"]; ?>" data-toggle="tab">
			<strong>	<?php echo $row["name"]; ?></strong> </a>
				</li>

				<?php
				}

				} else {
				echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
				}
				?>

						</ul>
					</div>
				</div>


			</div>
			</div>
			</div>

      </main>
    </div>
</div>

	<!-- partial:../../partials/_FOOTER.PHP -->

	<?php include "../partials/_footer.php"; ?>
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
