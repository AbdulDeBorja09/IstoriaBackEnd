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
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <meta http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_employee.css" />
  </head>
  <body>
    <div class="">
      <div class="navigation">
        <ul>
          <li>
            <a href="Employee_home.php">
              <span class="icon">
                <img
                  class="home-brand"
                  src="../assets/Images/Favicon.png"
                  width="50px"
                />
              </span>
              <span class="brand-title">Brand Name</span>
            </a>
          </li>
          <li>
            <a href="Employee_home.php">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="Employee_orders.php">
              <span class="icon">
                <ion-icon name="receipt-outline"></ion-icon>
              </span>
              <span class="title">Orders</span>
            </a>
          </li>
          <li>
            <a href="Employee_products.php">
              <span class="icon">
                <ion-icon name="cafe-outline"></ion-icon>
              </span>
              <span class="title">Products</span>
            </a>
          </li>
          <li>
            <a href="Employee_message.php">
              <span class="icon">
                <ion-icon name="chatbubble-outline"></ion-icon>
              </span>
              <span class="title">Messages</span>
            </a>
          </li>
          <li>
            <a href="Employee_history.php">
              <span class="icon">
                <ion-icon name="cash-outline"></ion-icon>
              </span>
              <span class="title">History</span>
            </a>
          </li>
          <li>
            <a href="Employee_signout.php">
              <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
              </span>
              <span class="title">Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
        </div>
        <div class="cardBox">
          <div class="card">
            <div>
            <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE status ='pending'") or die ('queryfailed');
                $num_of_pending = mysqli_num_rows($select_orders);
                ?>
              <div class="numbers"><?php echo  $num_of_pending ?></div>
              <div class="cardName">Pending</div>
            </div>

            <div class="iconBx">
              <ion-icon name="notifications-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE status ='ready'") or die ('queryfailed');
                $num_of_ready = mysqli_num_rows($select_orders);
                ?>
              <div class="numbers"><?php echo  $num_of_ready?></div>
              <div class="cardName">Ready</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cafe-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE status ='ready'") or die ('queryfailed');
                $num_of_completed = mysqli_num_rows($select_orders);
                ?>
              <div class="numbers"><?php echo  $num_of_completed ?></div>
              <div class="cardName">Completed</div>
            </div>

            <div class="iconBx">
              <ion-icon name="trending-up-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
            <?php
                $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die ('queryfailed');
                $num_of_message = mysqli_num_rows($select_message);
                ?>
              <div class="numbers"><?php echo $num_of_message  ?></div>
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
              <h2>Pending Orders</h2>
            </div>

            <table id="orders_table">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Payment</td>
                  <td>Transaction</td>
                  <td>Operation</td>
                </tr>
              </thead>

              <tbody>
              <?php 
          $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE status ='pending'") or die ('query failed');
          if(mysqli_num_rows($select_orders)>0){
              while($fetch_orders = mysqli_fetch_assoc($select_orders)){
          ?>
                <tr>
                  <td><?php echo $fetch_orders['product'] ?></td>
                  <td><?php echo $fetch_orders['total'] ?></td>
                  <td><?php echo $fetch_orders['payment'] ?></td>
                  <td><?php echo $fetch_orders['transaction'] ?></td>
                  <td><a href="">View Order</a></td>
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
    <script>
    function reloadOrders() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("employee_home.html").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "reload_orders.php", true);
      xmlhttp.send();
    }

    setInterval(reloadOrders, 10000);
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
