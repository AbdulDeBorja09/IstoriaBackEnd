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
              <div class="cardName">Sales</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cash-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <?php 
              $select_customer = mysqli_query($conn, "SELECT * FROM `employee`") or die ('query failed');
              $fetth_customer= mysqli_num_rows($select_customer);
            ?>
            <div>
              <div class="numbers"><?php echo $fetth_customer ?></div>
              <div class="cardName">Customer</div>
            </div>

            <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <?php 
              $select_employee = mysqli_query($conn, "SELECT * FROM `employee`") or die ('query failed');
              $fetth_employee = mysqli_num_rows($select_employee);
            ?>
            <div>
              <div class="numbers"><?php echo $fetth_employee  ?></div>
              <div class="cardName">Employee</div>
            </div>

            <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Messages</div>
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
              <?php 
                $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE type ='employee'") or die ('query failed');
                if(mysqli_num_rows($select_users)>0){
                    while($fetch_users = mysqli_fetch_assoc($select_users)){
                ?>
                <tr>
                  <td><?php echo $fetch_users['name'] ?></td>
                  <td>$1200</td>
                  <td>Paid</td>
                  <td><span class="status delivered">Delivered</span></td>
                </tr>
                <?php
                    }
                  }
                
                ?>
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
