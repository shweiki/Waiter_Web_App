<!DOCTYPE html>
<html lang="en">

<head>
	<?php
require_once('../connect_restaurent.php');
//	include "$uri/connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>المجموعات الاصناف</title>
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
    <!-- partial:partials/_sidebar.html -->
    <?php require_once('../partials/_sidebar.php'); ?>

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->

	 <?php require_once('../partials/_navbar.php'); ?>
    <!-- partial -->

		<div class="page-wrapper mdc-toolbar-fixed-adjust">
			<main style="direction: rtl; text-align: right;" >
				<div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">

						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
							<div class="mdc-card">


								<section class="mdc-card__primary">
									<h1 >المجموعات الاصناف</h1>
								</section>

								<div class="template-demo">
											<!-- add new saleh -->
									<form class="form-inline" id="AddGroupItme">
		<label class="sr-only" for="inlineFormInputName2"> اسم المجموعة</label>

		<input type="text" name="name_Group" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="ادخل اسم" required>
    <label class="sr-only" for="inlineFormInputGroupUsername2">النوع المجموعة</label>
    <div class="mb-2 mr-sm-2">
	 <select class="form-control" name="type" required>
     <option value="مواد مخزنية">
    مواد مخزنية
     </option>
     <option value="مواد انتاجية">
     مواد انتاجية
     </option>
   </select>
			<input type="text" name="note" class="form-control " id="inlineFormInputGroupUsername2" placeholder="ادخل ملاحظاتك" required>
		</div>
		<button type="submit" class="btn btn-success mb-2 mx-auto">إضافة</button>
	</form>
	<div class="" id='response'></div>
									<table class="table table-hoverable">
										<thead class="font-weight-bold">
											<tr>
												<th class=""> اسم المجموعة</th>
                        	<th>نوع المجموعة</th>
												<th>ملاحظات</th>
												<th>#</th>
												<th>#</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM group_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			?>
			<tr>
				<td class=""><?php echo $row["name"]; ?></td>
        <td><?php echo $row["type"]; ?></td>
				<td><?php echo $row["note"]; ?></td>
				<td><a href="../pages/ShowItemGroup.php?Group_id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>" class="btn btn-info">مواد</a></td>
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
	<!-- partial:../../partials/_FOOTER.PHP -->
	<?php require_once('../partials/_FOOTER.PHP'); ?>

	<!-- partial -->
  <!-- body wrapper -->
  <!-- plugins:js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
    $('#AddGroupItme').submit(function(){

        // show that something is loading
        $('#response').html("<b>Loading response...</b>");

        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.ajax({
            type: 'POST',
            url: 'insert/AddGroupItem.php',
            data: $(this).serialize()
        })
        .done(function(data){

            // show the response
            $('#response').html(data);

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
