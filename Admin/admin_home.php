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
        <?php $total = 0; 
                    $select_total = mysqli_query($conn, "SELECT * FROM `sales` ") or die ('query failed');
                    while ($fetch_total = mysqli_fetch_assoc($select_total)){
                        $total  += $fetch_total['total'];
                    }
                ?>
          <div class="card">
            <div>
              <div class="numbers">₱ <?php echo $total ?></div>
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
          <?php 
              $select_attendance = mysqli_query($conn, "SELECT * FROM `attendance` WHERE status = 'on'") or die ('query failed');
              $fetch_attendance = mysqli_num_rows($select_attendance );
            ?>
            <div>
              <div class="numbers"><?php echo $fetch_attendance ?></div>
              <div class="cardName">On Duty</div>
            </div>

            <div class="iconBx">
              <ion-icon name="person-outline"></ion-icon>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Employee On Duty</h2>
            </div>

            <table>
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Employee ID</td>
                  <td>Rank</td>
                  <td colspan="2">Status</td>
                  
                </tr>
              </thead>

              <tbody>
              <?php 
                $select_users = mysqli_query($conn, "SELECT * FROM `attendance` WHERE status ='on'") or die ('query failed');
                if(mysqli_num_rows($select_users)>0){
                    while($fetch_users = mysqli_fetch_assoc($select_users)){
                      $time_in = date("h:i A", strtotime($fetch_users['time_in']));
                ?>
                <tr>
                  <td><?php echo $fetch_users['name'] ?></td>
                  <td><?php echo $fetch_users['employee_id'] ?></td>
                  <td><?php echo $fetch_users['rank'] ?></td>
                  <td><?php echo $time_in ?></td>
                  <td>
                      <?php 
                      $status = $fetch_users ['status'];
                      if($status == 'on'){
                          echo '<div class="circle-flex" ><div class="green-circle"></div></div>';
                      }else{
                          echo '<div class="circle-flex" ><div class="red-circle"></div></div>';
                      }
                      ?>
                  </td>
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
