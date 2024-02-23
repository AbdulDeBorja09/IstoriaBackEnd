<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];

    if (!isset($employee_id)){
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
    <title>Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_employee.css" />
  </head>
  <body>
    <div class="container">
      <?php include 'sidenav.php' ?>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
          <?php include 'time.php' ?>
        </div>

        <div class="container-box">
          <h1>ORDERS</h1>
        </div>
        <div class="container-box">
          <!-- <div class="history-search">
            <input type="text" id="searchInput" placeholder="Search...">
          </div> -->
            <table class="orders-table" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Orders</th>
                  <th>Total Price</th>
                  <th>Payment</th>
                  <th>Transaction</th>
                  <th>Info</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
              <?php 
              $count = 0;
              $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE status ='completed'") or die ('query failed');
              if(mysqli_num_rows($select_orders)>0){
                  while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                    $count++
              ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $fetch_orders['name'] ?></td>
                  <td><?php echo $fetch_orders['product'] ?></td>
                  <td>₱ <?php echo $fetch_orders['total'] ?>.00</td>
                  <td><?php echo $fetch_orders['payment'] ?></td>
                  <td><?php echo $fetch_orders['transaction'] ?></td>
                  <td><a href="">View</a></td>
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
