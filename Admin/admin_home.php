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
        <div class="cardBox">
          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Orders</div>
            </div>

            <div class="iconBx">
              <ion-icon name="notifications-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">To Pickup</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cafe-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Completed</div>
            </div>

            <div class="iconBx">
              <ion-icon name="trending-up-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Questions</div>
            </div>

            <div class="iconBx">
              <ion-icon name="mail-unread-outline"></ion-icon>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Employee List</h2>
            </div>

            <table>
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Rank</td>
                  <td>Payment</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>Star Refrigerator</td>
                  <td>$1200</td>
                  <td>Paid</td>
                  <td><span class="status delivered">Delivered</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
