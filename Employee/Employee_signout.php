<?php
  include '../connection.php';
  session_start();
  $employee_id = $_SESSION['employee_id'];
  if (!isset($employee_id)){
    header('location:../login/login.php');
  }

  date_default_timezone_set('Asia/Manila');
  $date = date('m-d-y');
  $time = date('H:i:s');

  if(isset($_POST['time-out'])){
    $status = 'off';
    $id = $_POST['id'];
    $update_addons = mysqli_query($conn, "UPDATE `attendance` SET 
    `status` = '$status',
    `time_out` = '$time'

    WHERE id = '$id'") or die ('query failed'); 
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
          <div class="signoutdiv">
            <?php 
            $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = ' $employee_id'") or die ('query failed');
             $fetch_employee = mysqli_fetch_assoc($select_employee);

            ?>
            <img src="../assets/profiles/<?php echo $fetch_employee['image'] ?>" width="250px" />
            <h1><?php echo $fetch_employee['name'] ?></h1>
            <hr />
            <?php 
            $select_attendance = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = ' $employee_id' AND status = 'on' ") or die ('query failed');
            $fetch_attendance = mysqli_fetch_assoc($select_attendance);
            $time_in = date("h:i A", strtotime($fetch_attendance['time_in']));

            $time_in_seconds = strtotime($fetch_attendance['time_in']);
            $current_time_seconds = time();
            $time_difference_seconds = $current_time_seconds - $time_in_seconds;
            $total_hours_worked = $time_difference_seconds / 3600; 

            if ($total_hours_worked < 1) {
              $total_hours_worked = $total_hours_worked * 60;
              $total_hours_worked_formatted = sprintf("%0.0f", $total_hours_worked); 
              $time_unit = "min";
            } else {
                $total_hours_worked_formatted = sprintf("%0.2f", $total_hours_worked);
                $time_unit = "hrs";
            }
            ?>
            
            <h4>TIME IN</h4>
            <h5><?php echo $time_in ?></h5> 
            <h6><?php echo $fetch_attendance['day'] ?>-<?php echo $fetch_attendance['month'] ?>-<?php echo $fetch_attendance['year'] ?></h6>
            <h3 class="total-hrs"><?php echo $total_hours_worked_formatted ?> <?php echo $time_unit ?></h3>
            <br />

           <form method="post">
              <input type="hidden" name="id" value="<?php echo $fetch_attendance['id'] ?>">
              <button name="time-out" class="button">CLOCK OUT</button>
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
