<?php 
  include '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];

  if (!isset($admin_id)){
      header('location:../login/login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_admin.css" />
  </head>
  <body>
    <div class="container">
      <?php include 'sidenav.php' ?>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
        </div>

        <div class="container-box">
          <h1>SALES</h1>
        </div>
        <div class="salesgraph">
          <div class="cardBox">
          <div class="card">
              <?php 
                $total_overall = 0; 
                $select_overall = mysqli_query($conn, "SELECT * FROM `sales`") or die ('query failed');
                while ($fetch_overall = mysqli_fetch_assoc($select_overall)){
                    $total_overall += $fetch_overall['total'];
                }
              ?>
              <div>
                <div class="numbers">₱ <?php echo $total_overall ?></div>
                <div class="cardName">Total Sales</div>
              </div>

              <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
              </div>
            </div>

            <div class="card">
              <?php 
                $Store_sales = 0; 
                $select_store_sales = mysqli_query($conn, "SELECT * FROM `sales` WHERE type = 'offline'") or die ('query failed');
                while ($fetch_store_sales = mysqli_fetch_assoc($select_store_sales)){
                    $Store_sales  += $fetch_store_sales['total'];
                }
              ?>
              <div>
                <div class="numbers">₱ <?php echo $Store_sales  ?></div>
                <div class="cardName">Store Sales</div>
              </div>
              <div class="iconBx">
                <ion-icon name="business-outline"></ion-icon>
              </div>
            </div>

            <div class="card">
              <?php 
                $online_sales = 0; 
                $select_online_sales = mysqli_query($conn, "SELECT * FROM `sales` WHERE type = 'online'") or die ('query failed');
                while ($fetch_online_sales = mysqli_fetch_assoc($select_online_sales)){
                    $online_sales  += $fetch_online_sales['total'];
                }
              ?>
              <div>
                <div class="numbers">₱ <?php echo $online_sales ?></div>
                <div class="cardName">Online Sales</div>
              </div>
              <div class="iconBx">
                <ion-icon name="globe-outline"></ion-icon>
              </div>
            </div>

            <div class="card">
              <?php 
                $select_count_sales = mysqli_query($conn, "SELECT * FROM `sales`") or die ('query failed');
                $fetch_count_sales  = mysqli_num_rows($select_count_sales);
              ?>
              <div>
                <div class="numbers"><?php echo $fetch_count_sales ?></div>
                <div class="cardName">Sales Count</div>
              </div>
              <div class="iconBx">
                <ion-icon name="trending-up-outline"></ion-icon>
              </div>
            </div>
          </div>
        </div>
        <div class="container-box sale-search-table">
          <div class="sales-search">
          <?php
            $selected_type = isset($_POST['type']) ? $_POST['type'] : 'offline';
            if(isset($_POST['search'])) {
              $selected_month = $_POST['month'];
              $selected_year = $_POST['year'];
              $selected_type = $_POST['type'];
              $formatted_date = sprintf('%02d-%02d', $selected_month, substr($selected_year, -2));
              $sql = "SELECT * FROM `sales` WHERE date LIKE '%$formatted_date%' AND type = '$selected_type'";
              $select_sales = mysqli_query($conn, $sql) or die ('Query failed');

            } else {
                $select_sales = mysqli_query($conn, "SELECT * FROM `sales`") or die ('Query failed');
            }
              
            ?>
          <form method="post" >
            <div class="sales-flex">
              <div class="sales-input">
                <input type="text" name="searchInput" id="searchInput" placeholder="Search...">
              </div>
              <div class="form">
                <div class="col1">
                <select name="month" id="month" required>
                    <?php
                        // Options for months
                        $months = array(
                            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 
                            6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 
                            11 => 'November', 12 => 'December'
                        );
                        foreach ($months as $value => $label) {
                            $selected = ($value == $selected_month) ? 'selected' : '';
                            echo "<option value='$value' $selected>$label</option>";
                        }
                    ?>
                </select>
                <select name="year" id="year" required>
                    <?php
                        // Options for years
                        $current_year = date("Y");
                        for ($year = 2023; $year <= $current_year; $year++) {
                            $selected = ($year == $selected_year) ? 'selected' : '';
                            echo "<option value='$year' $selected>$year</option>";
                        }
                    ?>
                </select>
                <select name="type">
                    <option value="offline" <?php if ($selected_type == 'offline') echo 'selected'; ?>>Offline</option>
                    <option value="online" <?php if ($selected_type == 'online') echo 'selected'; ?>>Online</option>
                </select>
                </div>
                  <div class="col2">
                    <button type="submit" name="clear">CLEAR</button>
                    <button type="clear" name="search">SEARCH</button>
                </div>
              </div>
            </div>
          </div>
          </form>
          <table class="sale-search" id="sale-search">
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Reference #</th>
                <th>date (D-M-Y)</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                 $count = 0;
                while ($fetch_sales = mysqli_fetch_assoc($select_sales)){
                  $count++;
                  
              ?>
              <tr>
                <td><?php echo $count  ?></td>
                <td><?php echo $fetch_sales['type'] ?></td>
                <td><?php echo $fetch_sales['reference'] ?></td>
                <td><?php echo $fetch_sales['date']?></td>
                <td>₱ <?php echo $fetch_sales['total'] ?>.00</td>
              </tr>
            </tbody>
            <?php 
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll("#sale-search tbody tr");

        searchInput.addEventListener("keyup", function(event) {
          const query = event.target.value.toLowerCase();

          rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(query) ? "" : "none";
          });
        });
      });
    </script>
    <script src="../Src/Javascript/index.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
