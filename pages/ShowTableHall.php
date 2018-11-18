<?php
session_start();
if (!isset($_SESSION['user_ID'])){
    header('Location: http://'.$_SERVER["SERVER_NAME"].'/Wanter_app_php/login.php');
        }

?>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> طاولات</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
					    <link rel="stylesheet" href="../css/filterTable.css">

							  <script src="../js/jquery.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />

</head>

<body>
  <div class="body-wrapper">
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			include "../connect_restaurent.php";
		 $hall_id = $_GET["hall_id"];
		 $sql = "SELECT * FROM hall WHERE id = $hall_id ";
	 $result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
	 // output data of each row
	$hall_name = $row["name_hall"];
	}else {
	header('Location: http://localhost/Wanter_app_php/pages/samples/404.html');
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
<div class="" id='response'></div>
          <div class="container">
        <div class="row">
					<div class="col-md-8">
						<h3><?= $hall_name; ?></h3>
						<div class="card border-primary">
  <div class="card-header">
		<ul class="nav nav-tabs">

				<li  class="nav-item"><a  class="nav-link active" href="#tab1primary" data-toggle="tab">قيد انتظار</a></li>
				<li  class="nav-item"><a class="nav-link" href="#tab2primary" data-toggle="tab">فارغ</a></li>
				<li  class="nav-item"><a class="nav-link"  href="#tab3primary" data-toggle="tab">	محجوز </a></li>
				<li  class="nav-item">	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $row['id']; ?>">اضافة زبون</button></li>
		</ul>
  </div>
  <div class="card-body">

	                    <div class="tab-content">
	                        <div class="tab-pane   in active" id="tab1primary">
														<div class="card-deck">
														<?php
													   $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status = 1 ";
													 $result = $conn->query($sql);

													 if ($result->num_rows > 0) {
													 // output data of each row
													 while($row = $result->fetch_assoc()) {
													 ?>

													 <div class="card border-primary mb-3" style="text-align: -webkit-center; max-width: 12rem;">
  <div class="card-header"><?= $row["name_table"]; ?></div>
  <div class="card-body text-primary">
    <h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
    <p class="card-text"><?= $row["note"]; ?>.</p>
				<a href="insert/EndTable.php?table_id=<?= $row['id']; ?>&hall_id=<?=  $hall_id;?>" class="btn btn-danger">انهاء الطاولة</a>
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
	                        <div class="tab-pane  " id="tab2primary">
															<div class="card-deck">
														  <?php
					                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id AND status = 2 ";
					                   $result = $conn->query($sql);

					                   if ($result->num_rows > 0) {
					                   // output data of each row
					                   while($row = $result->fetch_assoc()) {
					                   ?>
														 <div class="card border-primary mb-3" style="text-align: -webkit-center; max-width: 12rem;">
						<div class="card-header"><?= $row["name_table"]; ?></div>
						<div class="card-body text-primary">
						<h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
						<p class="card-text"><?= $row["note"]; ?>.</p>
						<a href="../pages/OrderTable.php?table_id=<?php echo $row['id']; ?>&table_name=<?php echo $row['name_table']; ?>" class="btn btn-success">طلبات</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Booking" data-whatever="<?= $row['id']; ?>">حجز</button>
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
	                        <div class="tab-pane  " id="tab3primary">
															<div class="card-deck">
													                  <?php
													                     $sql = "SELECT * FROM tables_ WHERE hall_id =$hall_id and status=3 ";
													                   $result = $conn->query($sql);

													                   if ($result->num_rows > 0) {
													                   // output data of each row
													                   while($row = $result->fetch_assoc()) {
													                   ?>
																						 <div class="card border-primary mb-3" style="text-align: -webkit-center; max-width: 12rem;">
														<div class="card-header"><?= $row["name_table"]; ?></div>
														<div class="card-body text-primary">
														<h5 class="card-title">عدد الكراسي <?= $row["num_chair"]; ?></h5>
														<p class="card-text"><?= $row["note"]; ?>.</p>
														<a href="../pages/insert/CancelBooking.php?table_id=<?= $row['id']; ?>&hall_id=<?= $hall_id;?>" class="btn btn-danger">الغاء الحجز </a>
										<a href="../pages/OrderTable.php?table_id=<?= $row['id']; ?>&table_name=<?= $row['name_table']; ?>" class="btn btn-success">طلبات</a>
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
	        </div>
    	</div>
    </div>
			</main>



		<div class="modal fade" id="Booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: -webkit-right;">
	<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
							<h5 class="modal-title" id="exampleModalLabel"></h5>
					</div>
					<div class="modal-body">
						<form id="Add_Booking">
										<input type="hidden" class="form-control" name="hall_id" value="<?= $hall_id;?>">
							<input type="hidden" class="form-control" name="Table_id" id="Table_id">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label"> : اسم الزبون</label>
								<select class="form-control" name="customers" required>
									<?php
									$sql = "SELECT * FROM customers";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						?>
						<option value=<?= $row["id"]; ?>>
						<?= $row["FullName"]; ?>
						</option>
						<?php
						}

						} else {
						echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
						}
						?>
								</select>
							</div>
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">عدد اشخاص   </label>
							<input type="text" class="form-control" name="NumPerson">
						</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">ملاحظات اخرى :</label>
								<textarea class="form-control" name="Note"></textarea>
							</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
						<button type="submit" class="btn btn-primary">حجز و حفظ</button>
						 </form>
					</div>
					</div>
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

		</div>


			<script type="text/javascript">
	$(document).ready(function() {

			$('#Booking').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
	  modal.find('#Table_id').val(recipient);
  modal.find('.modal-title').text('حجز طاولة رقم  ' + recipient);

});
$('#Add_Booking').submit(function(){

		// show that something is loading
		$('#response').html("<b>Loading response...</b>");

		/*
		 * 'post_receiver.php' - where you will pass the form data
		 * $(this).serialize() - to easily read form data
		 * function(data){... - data contains the response from post_receiver.php
		 */
		$.ajax({
				type: 'POST',
				url: 'insert/Addbooking.php',
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




	<!-- partial:../../partials/_FOOTER.PHP -->
	<?php include "../partials/_footer.PHP"; ?>
	<!-- partial -->
  <!-- body wrapper -->
		</div>
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
