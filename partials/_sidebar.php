
<aside class="mdc-persistent-drawer">
      <nav class="mdc-persistent-drawer__drawer">
        <div class="mdc-persistent-drawer__toolbar-spacer">
          <a href="../index.php" class="brand-logo">
						<img src="../images/logo.png" alt="logo">
					</a>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../pages/dashbord.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">desktop_mac</i>
            الرئسية
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../pages/NewCustomer.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">face</i>

              عملاء
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../pages/NewTable.php">

                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">tab_unselected</i>
                طاولات
              </a>
            </div>

            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="ui-sub-menu">
              <a class="mdc-drawer-link" href="#">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">list</i>
          صالات
                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../pages/NewHall.php">
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
              <a class="mdc-drawer-link" href="../pages/ShowTableHall.php?hall_id=<?php echo $row['id']; ?>">
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
              <a class="mdc-drawer-link" href="../pages/NewItem.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">bubble_chart</i>
                اصناف
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item" href="#" data-toggle="expansionPanel" target-panel="ui-sub-menu1">
              <a class="mdc-drawer-link" href="#">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">list</i>
          مجموعات المواد
                <i class="mdc-drawer-arrow material-icons">arrow_drop_down</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu1">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../pages/NewGroupItem.php">
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
              <a class="mdc-drawer-link" href="../pages/ShowItemGroup.php?Group_id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>">
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
              <a class="mdc-drawer-link" href="../pages/samples/register.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">accessibility</i>
                انشاء مستخدم جديد
              </a>
            </div>



          </nav>
        </div>
      </nav>
    </aside>
