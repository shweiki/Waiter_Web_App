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
  <title><?= $table_name; ?> طلبات الطاولة</title>
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
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
		 $table_id = $_GET["table_id"];
		$table_name = $_GET["table_name"];
	}else {
	header('Location: http://localhost/Wanter_app_php/pages/samples/404.html');
	}
		include "../connect_restaurent.php";
		?>
    <!-- partial:partials/_sidebar.html -->
    <?php include "../partials/_sidebar.php"; ?>

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
   <?php include "../partials/_navbar.php"; ?>
    <!-- partial -->
		<div class="page-wrapper mdc-toolbar-fixed-adjust">
		<main class="content-wrapper drawer-minimized" style="direction: rtl; text-align: right;" >
			<div class="container">
		<div class="row">
									<div class="col-3" >
										<div class="card  border-success">
  <div class="card-header">
<h5 class="card-title">طاولة  <?= $table_name; ?></h5>
  </div>
  <div class="card-body">
		<div class="form-group row">
      <label for="smFormGroupInput" class="col-6 col-form-label ">اجمالي المبيعات :</label>
      <div class="col-6">
				<div class="input-group">
			    <input type="text" class="form-control form-control-sm" disabled>
					<div class="input-group-prepend">
					 <div class="input-group-text" id="btnGroupAddon">$</div>
				 </div>
			  </div>
      </div>
    </div>

		<div class="form-group row">
			<label for="smFormGroupInput" class="col-6 col-form-label">	اجمالي الكمية  :</label>
			<div class="col-6">
				<div class="input-group">
					<input type="text" class="form-control form-control-sm " disabled>
					<div class="input-group-prepend">
					 <div class="input-group-text" id="btnGroupAddon">#</div>
				 </div>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="smFormGroupInput" class="col-6 col-form-label ">			ضريبة المبيعات  :</label>
			<div class="col-6">
				<div class="input-group">
					<input type="text" class="form-control form-control-sm" disabled>
					<div class="input-group-prepend">
					 <div class="input-group-text" id="btnGroupAddon">$</div>
				 </div>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="smFormGroupInput" class="col-6 col-form-label ">		اجمالي الفاتورة   :</label>
			<div class="col-6">
				<div class="input-group">
					<input type="text" class="form-control form-control-sm" disabled>
					<div class="input-group-prepend">
					 <div class="input-group-text" id="btnGroupAddon">$</div>
				 </div>
				</div>
			</div>
		</div>
  </div>
  <div class="card-footer text-muted">
		<div class="row">
		<div class="col-7">
			<button type="button" class="btn btn-danger btn-sm btn-block">
			خروج و حفظ
			</button>
		</div>
		<div class="col-5">
			<button type="button" class="btn btn-success btn-sm btn-block">
				ترحيل
			</button>
		</div>
		</div>
  </div>
</div>

 </div>

 	<div class="col-9"  >
 <div class="card border-primary">
  <div class="card-header">
  الفاتورة \ الطلب رقم :
  </div>
  <div class="card-body">
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
								<td class=""  >
												<h6>فلافل</h6>
							</td>
								<td class="col-sm-1 col-md-1" style="text-align: right;">
								<input type="number" class="form-control" id="exampleInputEmail1" value="3"  >
								</td>
								<td><strong>$4.87</strong></td>
								<td ><strong>$14.61</strong></td>
								<td>
								<button type="button" class="btn btn-danger btn-sm">حذف</button>
							</td>
						</tr>
				</tbody>
		</table>
      <footer class="blockquote-footer"></footer>
    </blockquote>
  </div>
</div>
 </div>
 </div>
 </div>

				<div class="container">
			<div class="row">
			<div class="col-12" style=" position: unset;">
				<div class="card text-center border-info mb-3">
  <div class="card-body">
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

							<div class="row">
						<?php
						$sql = "SELECT * FROM items WHERE group_items_id =$id ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	?>
  <div class="col text-center">

			<button type="button" class="btn btn-info "><?= $row["name_item"]; ?> <br> <strong>$<?= $row["sale_price"]; ?></strong> </button>


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
	  </div>
  <div class="card-footer text-muted">
			<div class="tabbable-line">

		<ul class="nav nav-tabs">
		 <?php

			 $sql = "SELECT * FROM group_items";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
array_push($Group_items_id,$row["id"]);
 ?>
 <li class="mx-auto col-3 label " id="<?= $row["id"]; ?>">
	 <a  href="#tab_default_<?= $row["id"]; ?>" data-toggle="tab">
<strong>	<?= $row["name"]; ?></strong> </a>
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
