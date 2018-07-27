<!DOCTYPE html>
<html lang="en">

<head>
	<?php
//$home=$_SERVER['SERVER_NAME']."/".$_SERVER['HTTP_HOST'];
//$home =$_SERVER['SERVER_NAME'];
//$base_dir = __DIR__;
//echo $base_dir;
	include "../connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>dashbord Admin</title>
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
  <style type="text/css">
	.col-sm-10 ,.input-group, .custom-file, .input-group ,.custom-select, .input-group, .form-control ,.col-sm-2 {
    position: unset;
	}
	.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control {
    position: unset;
	}

  .image-preview-input {
      position: relative;
  	overflow: hidden;
  	margin: 0px;
      color: #333;
      background-color: #fff;
      border-color: #ccc;
  }
  .image-preview-input input[type=file] {
  	position: absolute;
  	top: 0;
  	right: 0;
  	margin: 0;
  	padding: 0;
  	font-size: 20px;
  	cursor: pointer;
  	opacity: 0;
  	filter: alpha(opacity=0);
  }
  .image-preview-input-title {
      margin-left:2px;
  }
  </style>
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
			<main class="content-wrapper drawer-minimized" style="direction: rtl; text-align: right;" >
				<div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">

						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
							<div class="mdc-card">


								<section class="mdc-card__primary">
									<h1 >مواد واصناف</h1>
								</section>
								<div class="template-demo">
											<!-- add new table -->
									<form class="form-horizontal " method="POST" enctype="multipart/form-data" id="AddItem">

										<div class="form-group">
										  <select class="form-control" name="group_items_id" placeholder="المجموعة"required>
												<?php
												$sql = "SELECT * FROM group_items";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									?>
									<option value=<?php echo $row["id"]; ?>>
									<?php echo $row["name"]; ?>
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
													<input  type="text" name="unit" class="form-control" id="formGroupExampleInput" placeholder="الوحدة">
												</div>

										<div class="form-group">
									    <input  type="text" name="name_item" class="form-control" id="formGroupExampleInput" placeholder="اسم الصنف">
									  </div>


		<div class="input-group">
			<div class="input-group-append">
				<span class="input-group-text">00.</span>
			</div>
		  <input type="text" name="cost_price" class="form-control col-sm-2" aria-label="" placeholder="التكلفة">
			<div class="input-group-prepend">
		    <span class="input-group-text">$</span>
		  </div>

			<div class="input-group-append">
				<span class="input-group-text">00.</span>
			</div>

				<input type="text" name="sale_price"  class="form-control col-sm-2" aria-label="" placeholder="البيع">
				<div class="input-group-prepend">
					<span class="input-group-text">$</span>
				</div>

		</div>

</br>
		<div class="form-group col-sm-10">
				<!-- image-preview-filename input [CUT FROM HERE]-->
				<div class="input-group image-preview">
						<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
								<!-- image-preview-clear button -->
								<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span class="glyphicon glyphicon-remove"></span> مسح
								</button>
								<!-- image-preview-input -->
								<div class="btn btn-default image-preview-input">
										<span class="glyphicon glyphicon-folder-open"></span>
										<span class="image-preview-input-title">صورة</span>
										<input  type="file"  accept="image/png, image/jpeg, image/gif" name="img_blog" id="img_blog" /> <!-- rename it -->
								</div>
						</span>
				</div><!-- /input-group image-preview [TO HERE]-->
		</div>
		<div class="form-group">
			<input type="text" name="note" class="form-control " id="inlineFormInputGroupUsername2" placeholder="ادخل ملاحظاتك" >
		</div>
		<button type="submit" class="btn btn-success mb-2 mx-auto">إضافة</button>
	</form>
	<div class="" id='response'></div>
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
											$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			?>
			<tr>
				<td><img class="rounded" height="50" width="50"  src="data:image;base64,<?php echo $row['img_url']; ?>"></td>
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
//$conn->close();
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
	<?php include "../partials/_FOOTER.PHP"; ?>
	<!-- partial -->
  <!-- body wrapper -->
  <!-- plugins:js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
$(document).ready(function(){
    $('#AddItem').submit(function(){

        // show that something is loading
        $('#response').html("<b>Loading response...</b>");

        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
sendForm();
				 function sendForm() {
   var fileData = new FormData(document.getElementById("AddItem"));
   var xhr = new XMLHttpRequest();

   xhr.open("POST", "insert/AddItem.php", true);
   xhr.setRequestHeader('Accept', 'application/json');
   xhr.onload = function(progressEvent) {
     if (xhr.status == 200) {
       console.log('Uploaded', xhr);
     } else {
       console.log("Error " + xhr.status + " occurred uploading your file.", xhr);
     }
   };
   xhr.send(fileData);
 }


    });
});
$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        },
         function () {
           $('.image-preview').popover('hide');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
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
