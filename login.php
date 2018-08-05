<?php
session_start();
if (isset($_SESSION['user_ID']) && !empty($_SESSION['user_Name'])){
    header('Location: http://'. $_SERVER["SERVER_NAME"].'/wanter_order_app/pages/dashbord.php');
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>تسجيل دخول</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  	  <script src="js/jquery.min.js"></script>
</head>

<body>
  <div class="body-wrapper">
    <div class="page-wrapper">
      <main class="content-wrapper drawer-minimized" style=" text-align: right;" >
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">


            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
							<div class="mdc-card" >

								<section class="mdc-card__primary bg-white">
                  <form id="here" method="post" >
                    <div class="mdc-layout-grid">
            					<div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12" style="direction: rtl;">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input" id="user_name" name="user_name" required>
                            <span class="mdc-text-field__label" style="right: 0;">اسم المستخدم</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12" style="direction: rtl;">
                          <label class="mdc-text-field w-100">
                            <input type="password" class="mdc-text-field__input" id="user_password" name="user_password" required>
                            <span class="mdc-text-field__label" style="right: 0;">كلمة المرور</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">

                            <span class="mdc-text-field__label" id="alert"></span>
                            <div class="mdc-text-field__bottom-line"></div>

                        </div>


                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 d-flex align-item-center justify-content-end" style="right: 0;">
                          <a href="#">نسيت كلمة المرور</a>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button class="mdc-button mdc-button--raised w-100" data-mdc-auto-init="MDCRipple">
                            تسجيل دخول
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
  <script type="text/javascript">
$(document).ready(function() {
    $('#here').submit(function(){

        // show that something is loading
        $('#alert').html("<b>Loading response...</b>");

        $.ajax({
            type: 'POST',
            url: 'pages/insert/loginCheck.php',
            data: $(this).serialize()
        })
        .done(function(data){
            $('#alert').html(data);
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
  <script src="js/material-components-web.min.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
	<script src="js/misc.js"></script>
	<script src="js/material.js"></script>
	<!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>


  <!-- plugins:js -->
