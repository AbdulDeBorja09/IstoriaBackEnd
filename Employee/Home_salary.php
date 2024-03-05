<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];
    date_default_timezone_set('Asia/Manila');
    $month = date('m');
    $year = date('y');

    if (!isset($employee_id)){
      header('location:../login/login.php');
  }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_employee.css" />
  </head>
  <body >
    <?php include 'navbar.php'; ?>
    <?php 
        $select_salary = mysqli_query($conn, "SELECT * FROM `salary` WHERE eid = '$employee_id' AND month = '$month ' AND year = '$year'") or die('query failed');
        if(mysqli_num_rows($select_salary)>0){
            while($fetch_salary = mysqli_fetch_assoc($select_salary)){
    ?>
    <div class="container">
        <div class="payslip-flex-top">
            <h1>BASTA SALARY TO</h1>
        </div>
    </div>
    <?php 
            }
        }else{
            header('location:../404.php');
        }
    ?>



    <script src="../Src/Javascript/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
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
