<?php
session_start();
if (!isset($_SESSION['user_ID'])){
  header('Location: http://localhost/wanter_order_app/login.php');
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>الصالات</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
					    <link rel="stylesheet" href="../css/filterTable.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
<link rel="shortcut icon" href="../images/favicon.png" />
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->

</head>

<body >
  <div class="body-wrapper">
		<?php
	require_once('../connect_restaurent.php');
	//	include "$uri/connect_restaurent.php"; ?>
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

						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10">
							<div class="mdc-card">


								<section class="mdc-card__primary">
									<h1 >زبائن</h1>
								</section>
              	<section class="mdc-card__primary">
<div class="col-3">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $row['id']; ?>">اضافة زبون</button>
<div class="" id='response'></div>
</div>
	</section>
								<div class="template-demo">
											<!-- add new saleh -->

									<table class="table table-hoverable">
										<thead class="font-weight-bold">
											<tr>
												<th class=""> اسم الزبون</th>
                        <th>رقم هاتف</th>
												<th>ملاحظات</th>
												<th>تاريخ ادخال</th>
												<th>#</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			?>
			<tr>
				<td class=""><?= $row["FullName"]; ?></td>
				<td><?= $row["Num_Ph"]; ?></td>
        <td><?= $row["Note"]; ?></td>
				<td><?= $row["Date_log"]; ?></td>
				<td><button type="button" class="btn btn-danger">حذف</button></td>
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

  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: -webkit-right;">
<div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <h5 class="modal-title" id="exampleModalLabel"> اضافة زبون</h5>
        </div>
        <div class="modal-body">
          <form id="AddCus">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label"> : اسم الزبون</label>
              <input type="text" class="form-control" name="cus_name">
            </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label"> : رقم هاتف  </label>
            <input type="text" class="form-control" name="cus_phone">
          </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">ملاحظات اخرى :</label>
              <textarea class="form-control" name="Note"></textarea>
            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary"> حفظ</button>
           </form>
        </div>
        </div>
   </div>
 </div>
    </div>

	<!-- partial:../../partials/_FOOTER.PHP -->
	<?php require_once('../partials/_FOOTER.PHP'); ?>

	<!-- partial -->
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="../js/jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    $('#AddCus').submit(function(){

        // show that something is loading
        $('#response').html("<b>Loading response...</b>");

        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.ajax({
            type: 'POST',
            url: 'insert/AddCus.php',
            data: $(this).serialize()
        })
        .done(function(data){

            // show the response
            $('#response').html(data);
window.location.reload(true);
        })
        .fail(function() {

            // just in case posting your form failed
            alert( "حصل خطأ ما الرجاء اعادة المحاولة ! ..." );

        });

        // to prevent refreshing the whole page page
        return false;

    });
  });
  </script>

  <script src="../js/material-components-web.min.js"></script>

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
