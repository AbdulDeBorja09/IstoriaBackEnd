<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];


    date_default_timezone_set('Asia/Manila');
    $day = date('d');
    $month = date('m');
    $year = date('y');

    if (!isset($employee_id)){
        header('location:../login/login.php');
    }
    
    if(isset($_POST['time_in'])){
    $eid = $_POST['employee_id'];
    $employee_name = $_POST['name'];
    $employee_rank = $_POST['rank'];
    $time = date('H:i:s');
    $Meridiem = date('A');

    if($Meridiem == 'AM'){
      if ($time > '11:15:00' ){
        $duty = "late";
      }else{
        $duty = "On Time";
      }
    }else if($Meridiem == 'PM'){
      if ($time > '19:15:00'){
        $duty = "late";
      }else{
        $duty = "On Time";
      }
    }

    $insert_attendance = mysqli_query($conn, "INSERT INTO `attendance` (`eid`, `employee_id`, `name`, `rank`, `time_in`, `duty`, `day`, `month`, `year`)
    VALUES ('$employee_id', '$eid', '$employee_name', '$employee_rank', '$time', '$duty', '$day', '$month', '$year')") or die('query failed');
    header('location:Employee_home.php');
     
    }
    if(isset($_POST['logout'])){
      session_destroy(); 
      header('location:../login/login.php');
      exit(); 
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
  <body class="attendance">
    <?php include 'navbar.php'; ?>

    <?php 
      $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$employee_id'") or die ('query failed');
      if(mysqli_num_rows($select_employee)>0){
        while($fetch_employee = mysqli_fetch_assoc($select_employee)){
        
    ?>
    <form method="post">
      <div class="attendance-container">
        <div class="attendance-image">
          <img src="../assets/Images/profile.png" alt="profile-image" />
        </div>
        <div class="attendance-name">
          <h1><?php echo $fetch_employee['name'] ?></h1>
        </div>
        <div class="attendance-button-holder">
          <input type="hidden" name="employee_id" value="<?php echo $fetch_employee['employee_id'] ?>">
          <input type="hidden" name="name" value="<?php echo $fetch_employee['name'] ?>">
          <input type="hidden" name="rank" value="<?php echo $fetch_employee['rank'] ?>">
          <?php 
            $query1 = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = '$employee_id' AND time_out = '0' AND day = '$day' AND month = '$month' AND year = '$year'") or die ('query failed');
            $query2 = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = '$employee_id' AND day = '$day' AND month = '$month' AND year = '$year' AND status  = 'off' ") or die ('query failed');
            if(mysqli_num_rows($query1)>0){   
          ?>
            <a name="time_in" href="Employee_home.php" type="submit" class="timein btn">CONTINUE</a>
            <button class="timeout btn"  name="logout">LOGOUT</button>

            <?php 
            }else if(mysqli_num_rows($query2 )>0) {?>
              <a name="time_in" href="#" type="submit" class="timein btn" disabled>DUTY COMPLETED</a>
              <button class="timeout btn" name="logout" type="submit">LOGOUT</button>
            
            <?php
            }else { ?>
              <button class="time-in-btn" name="time_in" type="submit">TIME IN</button>
              <button class="timeout btn" name="logout" type="submit">LOGOUT</button>
            <?php
              }
            ?>
        </div>
      </div>
    </form>
    <?php 
        }
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
