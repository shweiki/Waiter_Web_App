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
                <div class="col-sm-12 col-md-10 col-md-offset-1" style="position: unset;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>الصنف</th>
                                <th>الكمية</th>
                                <th >السعر</th>
                                <th >المجموع</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6" style="position: unset;">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="media-heading">فلافل</h6>
                                    </div>
                                </div>
                              </td>
                                <td class="col-sm-1 col-md-1" style="text-align: right;">
                                <input type="number" class="form-control" id="exampleInputEmail1" value="3" style="position: unset;">
                                </td>
                                <td class="col-sm-1 col-md-1 "style="position: unset;"><strong>$4.87</strong></td>
                                <td class="col-sm-1 col-md-1 "style="position: unset;"><strong>$14.61</strong></td>
                                <td class="col-sm-1 col-md-1"style="position: unset;">
                                <button type="button" class="btn btn-danger btn-sm">حذف</button>
                              </td>
                            </tr>

                            <tr>
                                <td><h5>المجموع</h5></td>
                                <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                            </tr>
                            <tr>

                                <td><h5>خدمات</h5></td>
                                <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                            </tr>
                            <tr>

                                <td><h4>صافي المجموع</h4></td>
                                <td ><h5><strong>$31.53</strong></h5></td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                            </tr>
                            <tr>

                                <td>
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> حفظ وخروج
                                </button></td>
                                <td>
                                <button type="button" class="btn btn-success">
                                    تاكيد الطلبات <span class="glyphicon glyphicon-play"></span>
                                </button></td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                            </tr>
                        </tbody>
                    </table>
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
