﻿<!DOCTYPE html>
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
			 		<main class="content-wrapper drawer-minimized" style="direction: rtl; text-align: right;" >

						<div class="mdc-layout-grid">
							<div class="mdc-layout-grid__inner">
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
									<div class="mdc-layout-grid__inner w-100">
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-danger rounded">
													<i class="mdi mdi-account-settings text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
													<h3 class="mdc-typography--display1 font-weight-bold mb-1">7459</h3>
													<p class="font-weight-normal mb-0 mt-0">New projects</p>
												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-success rounded">
													<i class="mdi mdi-basket text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
													<h3 class="mdc-typography--display1 font-weight-bold mb-1">$7783</h3>
													<p class="font-weight-normal mb-0 mt-0">Total Sales</p>
												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-warning rounded">
													<i class="mdi mdi-ticket text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
													<h3 class="mdc-typography--display1 font-weight-bold mb-1">569</h3>
													<p class="font-weight-normal mb-0 mt-0">Open Tickets</p>
												</div>
											</div>
										</div>
										<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
											<div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
												<div class="mdc--tile mdc--tile-primary rounded">
													<i class="mdi mdi-account-star text-white icon-md"></i>
												</div>
												<div class="text-wrapper pl-1">
													<h3 class="mdc-typography--display1 font-weight-bold mb-1">5785</h3>
													<p class="font-weight-normal mb-0 mt-0">New Visitors</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
									<div class="mdc-card d-flex flex-column">
										<div class="mdc-layout-grid__inner flex-grow-1">
											<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3"></div>
											<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex align-item-center flex-column">
												<h2 class="mdc-card__title mdc-card__title--large text-center mt-2 mb-2">Time, Practice</h2>
												<div id="currentBalanceCircle" class="w-100"></div>
											</div>
											<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3"></div>
										</div>
										<div class="mdc-layout-grid__inner">
											<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
												<section class="mdc-card__action-footer mt-4 bg-red w-100">
													<div class="col mdc-button" data-mdc-auto-init="MDCRipple">
														<i class="mdi mdi-store icon-md"></i>
													</div>
													<div class="col mdc-button" data-mdc-auto-init="MDCRipple">
														<i class="mdi mdi-phone-plus icon-md"></i>
													</div>
													<div class="col mdc-button" data-mdc-auto-init="MDCRipple">
														<i class="mdi mdi-share-variant icon-md"></i>
													</div>
													<div class="col mdc-button" data-mdc-auto-init="MDCRipple">
														<i class="mdi mdi-autorenew icon-md"></i>
													</div>
												</section>
											</div>
										</div>
									</div>
								</div>
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
									<div class="mdc-card card--with-avatar">
										<section class="mdc-card__primary">
											<div class="card__avatar"><img src="images/faces/face1.jpg" alt=""></div>
											<h1 class="mdc-card__title">Daniel Russel</h1>
											<h2 class="mdc-card__subtitle">@danielrussel</h2>
											<span class="social__icon-badge mdc-twitter mdi mdi-twitter"></span>
										</section>
										<section class="mdc-card__supporting-text pt-1">
											<p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam condimentum sem non mauris euismod hendrerit.Aliquam condimentum sem non mauris euismod hendrerit.</p>
											<p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam condimentum.</p>
										</section>
										<section class="mdc-card__social-footer bg-blue">
											<div class="col">
												<small>TWEETS</small>
												<p>768.8k</p>
											</div>
											<div class="col">
												<small>FOLLOWING</small>
												<p>186.8k</p>
											</div>
											<div class="col">
												<small>FOLLOWING</small>
												<p>25.8k</p>
											</div>
										</section>
									</div>
								</div>
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
									<div class="mdc-card px-2 py-2">
										<div id="js-legend" class="chartjs-legend mb-2"></div>
										<canvas id="dashboard-monthly-analytics" height="205"></canvas>
									</div>
								</div>
								<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
									<div class="mdc-card table-responsive">
										<div class="table-heading px-2 px-1 border-bottom">
											<h1 class="mdc-card__title mdc-card__title--large">Employee status</h1>
										</div>
										<table class="table">
											<thead>
												<tr>
													<th class="text-left">Product</th>
													<th>Cost</th>
													<th>Sales amount</th>
													<th>Shipping cost</th>
													<th>Units sold</th>
													<th>Profit generated</th>
													<th>Left in stock</th>
													<th>Returns</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-left">T-shirts</td>
													<td>250</td>
													<td>300</td>
													<td>60</td>
													<td>3453</td>
													<td>76</td>
													<td>453643</td>
													<td>300</td>
													<td><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-heart text-blue"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-forum text-yellow"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i></div></td>
												</tr>
												<tr>
													<td class="text-left">Baseball Hat</td>
													<td>457</td>
													<td>204</td>
													<td>35</td>
													<td>6754</td>
													<td>35</td>
													<td>345623</td>
													<td>546</td>
													<td><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-heart text-blue"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-forum text-yellow"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i></div></td>
												</tr>
												<tr>
													<td class="text-left">Tennis Racket</td>
													<td>250</td>
													<td>350</td>
													<td>38</td>
													<td>3289</td>
													<td>45</td>
													<td>54662</td>
													<td>278</td>
													<td><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-heart text-blue"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-forum text-yellow"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i></div></td>
												</tr>
												<tr>
													<td class="text-left">Gloves</td>
													<td>250</td>
													<td>300</td>
													<td>60</td>
													<td>3453</td>
													<td>76</td>
													<td>453643</td>
													<td>300</td>
													<td><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-heart text-blue"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-forum text-yellow"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i></div></td>
												</tr>
												<tr>
													<td class="text-left">Shoes</td>
													<td>673</td>
													<td>457</td>
													<td>56</td>
													<td>4467</td>
													<td>98</td>
													<td>345723</td>
													<td>350</td>
													<td><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-heart text-blue"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-forum text-yellow"></i></div><div class="col mdc-button" data-mdc-auto-init="MDCRipple"><i class="mdi mdi-delete text-red"></i></div></td>
												</tr>
												</tbody>
											</table>
									</div>
								</div>
							</div>
						</div>


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
