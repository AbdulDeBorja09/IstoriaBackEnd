<?php 
  include '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  date_default_timezone_set('Asia/Manila');
  $month = date('m');
  $year = date('y');
  $eid = $_GET['eid'];

  if (isset($_POST['release'])) {
    $total_salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $total_hrs = mysqli_real_escape_string($conn, $_POST['hrs']);
    $total_mins = mysqli_real_escape_string($conn, $_POST['mins']);
    $total_days = mysqli_real_escape_string($conn, $_POST['days']);
    $total_late = mysqli_real_escape_string($conn, $_POST['late']);
    $total_bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
    $total_deduc = mysqli_real_escape_string($conn, $_POST['deduction']);

    $salary_check = mysqli_query($conn, "SELECT * FROM `salary` WHERE eid = '$eid' AND month = '$month ' AND year = '$year'") or die('query failed');
    if (mysqli_num_rows($salary_check) > 0) {
        $update_salary = mysqli_query($conn, "UPDATE `salary` SET 
        `eid` = '$eid',
        `total_hrs` = '$total_hrs', 
        `total_mins` = '$total_mins', 
        `total_days` = '$total_days', 
        `total_salary` = '$total_salary', 
        `lates` = '$total_late', 
        `bonus` = '$total_bonus',
        `deduction` = '$total_deduc'
        WHERE eid = '$eid' AND month = '$month ' AND year = '$year'") or die ('query failed'); 
    } else {
        $insert_salary = mysqli_query($conn, "INSERT INTO `salary` (`eid`, `total_hrs`, `total_mins`, `total_days`, `total_salary`, `lates`, `bonus`, `deduction`, `month`, `year`)
            VALUES ('$eid', '$total_hrs', '$total_mins', '$total_days', '$total_salary', '$total_late', '$total_bonus', '$total_deduc', '$month', '$year')") or die('query failed');
        header('Location: admin_salary.php');

    }
}
$select_salary = mysqli_query($conn, "SELECT * FROM `salary` WHERE eid = '$eid' AND month = '$month ' AND year = '$year'") or die('query failed');
$existing_salary = mysqli_num_rows($select_salary) > 0;
$button_text = $existing_salary ? "Update Salary" : "Release Salary";
    
    
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

        <div class="container-box employee-title">
          <h1>SALARY</h1>
        </div>

        <div class="container-box">
            <?php
            if(isset($_GET['eid'])){
                $dates = date('F Y');
                 $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$eid' ") or die ('query failed');
                if(mysqli_num_rows($select_employee)>0){
                    $total_rows = 0;
                    while($fetch_employee = mysqli_fetch_assoc($select_employee)){
                ?>  
                    <form method="post">
                    <div class="salaryview-top-div">
                        <div class="salary-name">
                            <h2>Name:</h2>
                            <h1><?php echo $fetch_employee['name']?></h1>
                            <h2>Employee ID:</h2>
                            <h1><?php echo $fetch_employee['employee_id']?></h1>
                        </div>
                        <div class="salary-info">
                            <h2>Position</h2>
                            <h1><?php echo $fetch_employee['rank']?></h1>
                            <h2>Date Hired</h2>
                            <h1><?php echo $fetch_employee['hire_date']?></h1>
                        </div>
                    </div>
                    <h3><?php echo $dates ?></h3>
                    <div class="salaray-table-div"> 
                       <div class="inner">
                        <table class="view-salary-table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Date</td>
                                        <td>Time In</td>
                                        <td>Time Out</td>
                                        <td>Total Hrs</td>
                                        <td>Duty</td>
                                        <td>Salary</td>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $month = date('m');
                                    $year = date('y');
                                    $count = 0;
                                    $total_salary = 0;
                                    $total_hrs = 0;
                                    $total_mins = 0;
                                    $salary_per_hour = 0;
                                        $rank = $fetch_employee['rank'];
                                        switch($rank) {
                                            case 'Bartender':
                                                $salary_per_hour = 70;
                                                break;
                                            case 'Manager':
                                                $salary_per_hour = 81.25;
                                                break;
                                            case 'Cashier':
                                                $salary_per_hour = 68.75;
                                                break;
                                            default:
                                                $salary_per_hour = 0;
                                                break;
                                        }
                                    $select_attendance = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = '$eid' AND status = 'off' AND month = '$month' AND year = '$year' ") or die ('Query failed: ');
                                    if(mysqli_num_rows($select_attendance) > 0) {
                                        while($fetch_attendance = mysqli_fetch_assoc($select_attendance)) {
                                            $time_in = date("h:i A", strtotime($fetch_attendance['time_in']));
                                            $time_out = date("h:i A", strtotime($fetch_attendance['time_out']));
                                            $count++;
                                            $total_rows++;
                                    ?>
                                    <tr> 
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $fetch_attendance['month']?> - <?php echo $fetch_attendance['day']?> - <?php echo $fetch_attendance['year']?></td>
                                        <td><?php echo $time_in ?></td>
                                        <td><?php echo $time_out ?></td>
                                        <?php
                                        $time_in =  $fetch_attendance['time_in'] ;
                                        $time_out = $fetch_attendance['time_out'] ;
                                        $date = $fetch_attendance['day'].'-'.$fetch_attendance['month'].'-'.$fetch_attendance['year'];

                                        $time_in_dt = DateTime::createFromFormat('H:i:s', $time_in);
                                        $time_out_dt = DateTime::createFromFormat('H:i:s', $time_out);
                                        if ($time_out_dt < $time_in_dt) {
                                            $time_out_dt->modify('+1 day');
                                        }
                                        $time_diff = $time_out_dt->getTimestamp() - $time_in_dt->getTimestamp();
                                        $total_hours = floor($time_diff / 3600); 
                                        $total_minutes = floor(($time_diff % 3600) / 60);

                                        if ($total_hours < 8){
                                            $text_color = 'style="color: red;"';
                                        }else {
                                            $text_color = 'style="color: green;"';
                                        }
                                        
                                        if ($total_minutes >= 60) {
                                            $extra_hours = floor($total_minutes / 60);
                                            $total_hours += $extra_hours;
                                            $total_minutes -= ($extra_hours * 60); 
                                        }
                                            $salary = $total_hours * $salary_per_hour;
                                            $total_salary += $salary;

                                            $total_mins +=  $total_minutes;
                                            $total_hrs += $total_hours;
                                        ?>
                                        <td <?php echo $text_color ?>><?php echo $total_hours ?> Hrs <?php echo $total_minutes ?> Mins</td>
                                        <td><?php echo $fetch_attendance['duty']?></td>
                                        <td>₱ <?php echo $salary ?></td>
                                
                                    <?php 
                                            }
                                        }
                                        else{
                                            ?>
                                            <tr>
                                              <td colspan="6" style="padding: 158px 0px; border:0;">
                                                <h1>NO DUTY LOGS</h1>
                                              </td>
                                            </tr>
                                            <?php  
                                        }

                                        if ($total_mins >= 60) {
                                            $extra_hours = floor($total_mins / 60);
                                            $total_hrs += $extra_hours;
                                            $total_mins-= ($extra_hours * 60); 
                                        }
                                    ?>
                                </tbody>
                              </table>
                            </tr>
                            </div>
                          </div> 
                          <?php 
                            $select_late = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = '$eid' AND status = 'off' AND month = '$month' AND year = '$year' AND duty = 'late' ") or die ('Query failed: ');
                            $fetch_late = mysqli_num_rows($select_late );
                          ?>
                          <div class="salary-lower-div">
                            <div class="datacol1">
                                <h2>Total Hours:</h2>
                                <h1><?php echo $total_hrs; ?>Hrs <?php echo $total_mins; ?> Mins</h1>
                                <h2>Total Salary:</h2>
                                <h1>₱ <?php echo $total_salary; ?></h1>
                            </div>
                            <div class="datacol2">
                                <h2>Duty Count:</h2>
                                <h1><?php echo $total_rows; ?></h1>
                                <h2>Late Count:</h2>
                                <h1><?php echo $fetch_late ?></h1>
                            </div>

                          </div>
                          <div class="salary-bottom-inputs">
                            <div class="inputes">
                                <input type="hidden" name="salary" value="<?php echo $total_salary; ?>">
                                <input type="hidden" name="hrs" value="<?php echo $total_hrs; ?>">
                                <input type="hidden" name="mins" value="<?php echo $total_mins; ?>">
                                <input type="hidden" name="days" value="<?php echo $total_rows; ?>">
                                <input type="hidden" name="late" value="<?php echo $fetch_late ?>">
                                <input type="number" name="bonus" placeholder="Deduction">
                                <input type="number" name="deduction" placeholder="Bonus">
                            </div>
                            <button name="release" type="submit"><?php echo $button_text; ?></button> 
                        </div>
                    </form>
                <?php 
                        }
                    }
                }
                ?>
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
