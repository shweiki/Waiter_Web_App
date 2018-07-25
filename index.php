<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "connect_restaurent.php"; ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>dashbord Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
          <link rel="stylesheet" href="css/bootstrap.min.css">
					    <link rel="stylesheet" href="css/filterTable.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body >
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->

		<aside class="mdc-persistent-drawer">
		      <nav class="mdc-persistent-drawer__drawer">
		        <div class="mdc-persistent-drawer__toolbar-spacer">
		          <a href=" index.php" class="brand-logo">
								<img src=" images/logo.png" alt="logo">
							</a>
		        </div>
		        <div class="mdc-list-group">
		          <nav class="mdc-list mdc-drawer-menu">
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" index.php">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">desktop_mac</i>
		            الرئسية
		              </a>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/NewCustomer.php">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
		              عملاء
		              </a>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/NewTable.php">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
		                طاولات
		              </a>
		            </div>

		            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="ui-sub-menu">
		              <a class="mdc-drawer-link" href="#">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
		          صالات
		                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
		              </a>
		              <div class="mdc-expansion-panel" id="ui-sub-menu">
		                <nav class="mdc-list mdc-drawer-submenu">
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href=" pages/NewHall.php">
		        جميع صالات
		                    </a>
		                  </div>
		                  <?php
		                  $sql = "SELECT * FROM hall";
		            $result = $conn->query($sql);

		            if ($result->num_rows > 0) {
		            // output data of each row
		            while($row = $result->fetch_assoc()) {
		            ?>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/ShowTableHall.php?hall_id=<?php echo $row['id']; ?>">
		              <?php echo $row["name_hall"]; ?>
		              </a>
		            </div>
		            <?php
		            }

		            } else {
		            echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
		            }
		            ?>

		                </nav>
		              </div>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/NewItem.php">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
		                اصناف
		              </a>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="ui-sub-menu1">
		              <a class="mdc-drawer-link" href="#">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
		          مجموعات المواد
		                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
		              </a>
		              <div class="mdc-expansion-panel" id="ui-sub-menu1">
		                <nav class="mdc-list mdc-drawer-submenu">
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href=" pages/NewGroupItem.php">
		        جميع المجموعات
		                    </a>
		                  </div>
		                  <?php
		                  $sql = "SELECT * FROM group_items";
		            $result = $conn->query($sql);

		            if ($result->num_rows > 0) {
		            // output data of each row
		            while($row = $result->fetch_assoc()) {
		            ?>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/ShowItemGroup.php?Group_id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>">
		              <?php echo $row["name"]; ?>
		              </a>
		            </div>
		            <?php
		            }

		            } else {
		            echo "لا يوجد شيئ لعرض ........ <i class='mdi mdi-heart text-red'></i>";
		            }
		            ?>

		                </nav>
		              </div>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/samples/register.php">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pie_chart_outlined</i>
		                انشاء مستخدم جديد
		              </a>
		            </div>

		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href=" pages/ui-features/tables.html">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
		                Tables
		              </a>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item">
		              <a class="mdc-drawer-link" href="pages/charts/chartjs.html">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pie_chart_outlined</i>
		                Charts
		              </a>
		            </div>
		            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="sample-page-submenu">
		              <a class="mdc-drawer-link" href="#">
		                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
		                Sample Pages
		                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
		              </a>
		              <div class="mdc-expansion-panel" id="sample-page-submenu">
		                <nav class="mdc-list mdc-drawer-submenu">
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/blank-page.html">
		                      Blank Page
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/403.html">
		                      403
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/404.html">
		                      404
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/500.html">
		                      500
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/505.html">
		                      505
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/login.html">
		                      Login
		                    </a>
		                  </div>
		                  <div class="mdc-list-item mdc-drawer-item">
		                    <a class="mdc-drawer-link" href="pages/samples/register.html">
		                      Register
		                    </a>
		                  </div>

		                </nav>
		              </div>
		            </div>

		          </nav>
		        </div>
		      </nav>
		    </aside>


    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
   <?php include "partials/_navbar.php"; ?>
    <!-- partial -->

		<div class="page-wrapper mdc-toolbar-fixed-adjust">
			<main style="direction: rtl;
			    text-align: right;" class="">


			</main>

		</div>
		</div>


	<!-- partial:  partials/_FOOTER.PHP -->
	<?php include "partials/_FOOTER.PHP"; ?>
	<!-- partial -->
  <!-- body wrapper -->
  <!-- plugins:js -->


  <script src="js/material-components-web.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="js/Chart.min.js"></script>
  <script src="js/progressbar.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/misc.js"></script>
  <script src="js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>

  <!-- End custom js for this page-->
</body>

</html>
