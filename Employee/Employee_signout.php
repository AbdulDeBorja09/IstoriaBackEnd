<?php
  include '../connection.php';
  session_start();
  $employee_id = $_SESSION['employee_id'];
  date_default_timezone_set('Asia/Manila');
  $date = date('m-d-y');
  $time = date('h:i:sA');

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
          <div class="signoutdiv">
          <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `user` WHERE id = ' $employee_id'") or die ('query failed');
             $fetch_orders = mysqli_fetch_assoc($select_orders);

          ?>
            <img src="../assets/Images/profile.png" width="250px" />
            <h1><?php echo $fetch_orders['name'] ?></h1>
            <hr />
            <h4>TIME IN</h4>
            <h5>10:00:00</h5> 
            <h6><?php echo $date ?></h6>
            <br />

           <form method="post">
            <button name="l" class="button">CLOCK OUT</button>
           </form>
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
