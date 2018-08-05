<?php
session_start();
if (!isset($_SESSION['user_ID'])){
    header('Location: http://'.$_SERVER["SERVER_NAME"].'/wanter_order_app/login.php');
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>مستخدم جديد</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
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

		include "../connect_restaurent.php"; ?>

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





            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
							<div class="mdc-card">
								<section class="mdc-card__primary bg-white">
                  <form id="AddUser" method="post">
                    <div class="mdc-layout-grid">
            					<div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <label class="mdc-text-field w-100">
                            <input type="text" name="Full_name" id="Full_name" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">اسم الكامل</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <label class="mdc-text-field w-100">
                            <input type="text" name="user_Name" id="user_Name" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">اسم المستخدم</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="date" name="birthday" id="birthday" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">تاريخ الميلاد</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>

                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="password" name="pass" id="pass" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">كلمة السر</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>

                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex align-item-center justify-content-end">
                        <div id="response"></div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button type="submit" class="mdc-button mdc-button--raised w-100" data-mdc-auto-init="MDCRipple">
                            تسجيل
                          </button>

                        </div>
            					</div>
            				</div>
                  </form>
								</section>
							</div>
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
					</div>
				</div>
      </main>
    </div>
  </div>
    <script src="../js/jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    $('#AddUser').submit(function(){

        // show that something is loading
        $('#response').html("<b>Loading response...</b>");

        /*
         * 'post_receiver.php' - where you will pass the form data
         * $(this).serialize() - to easily read form data
         * function(data){... - data contains the response from post_receiver.php
         */
        $.ajax({
            type: 'POST',
            url: 'insert/AddUser.php',
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
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="../js/material-components-web.min.js"></script>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/alerts.js"></script>
	<script src="../js/misc.js"></script>
	<script src="../js/material.js"></script>
	<!-- endinject -->
  <!-- Custom js for this page-->

  <!-- End custom js for this page-->
</body>

</html>
