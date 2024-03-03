<?php
include '../connection.php';
session_start();
$employee_id = $_SESSION['employee_id'];

if (!isset($employee_id)){
    header('location:../login/login.php');
    exit(); 
}

if(isset($_POST['add'])){    
    $type = 'offline';
    $total = $_POST['total'];
    $reference = $_POST['reference'];
    $time = date('H:i:s A');
    $day = date('d');
    $month = date('m');
    $year = date('Y');

    $select_sales = mysqli_query($conn, "SELECT * FROM `sales` WHERE reference = '$reference'") or die ('query failed');
    if(mysqli_num_rows($select_sales) > 0){
    } else {

        $sales_insert = mysqli_query($conn, "INSERT INTO `sales` (`total`, `type`, `time`, `day`, `month`, `year`, `reference`) 
        VALUES ('$total', '$type', '$time', '$day', '$month' , '$year', '$reference')") or die ('insert failed');
        if($sales_insert) {
            
        } else {

        }
    }
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
        <div class="container-box heading-div">
        <button class="button" onclick="history.back()">
          <div class="button-box">
            <span class="button-elem">
              <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
            <span class="button-elem">
              <svg viewBox="0 0 46 40">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
          </div>
        </button>
          <div class="titlediv">
            <h1>ORDERS</h1>
          </div>
        </div>
        <div class="container-box">
            <form method="post">
                <input type="text" name="reference" id="">
                <input type="text" name="total" id="">
                <button name="add">Sumit</button>
            </form>
            
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
