<?php 
  include '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  $eid = $_GET['eid'];
    
    
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
                $date = date('F');
                 $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$eid' ") or die ('query failed');
                if(mysqli_num_rows($select_employee)>0){
                    while($fetch_employee = mysqli_fetch_assoc($select_employee)){
                ?>  
                    <form action="">
                    <div class="salary-name">
                        <h1><?php echo $fetch_employee['name']?></h1>
                        <h2><?php echo $fetch_employee['employee_id']?></h2>
                        <h3><?php echo $date ?></h3>
                    </div>
                    <div class="salaray-table-div">
                       <div class="inner">
                        <table class="view-salary-table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Time In</td>
                                        <td>Time Out</td>
                                        <td>Total Hrs</td>
                                        <td>Duty</td>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $month = date('m');
                                    $year = date('y');
                                    $count = 0;
                                    $salary_per_hour = 0;
                                        $rank = $fetch_employee['rank'];
                                        switch($rank) {
                                            case 'bartender':
                                                $salary_per_hour = 60;
                                                break;
                                            case 'manager':
                                                $salary_per_hour = 70;
                                                break;
                                            case 'barista':
                                                $salary_per_hour = 80;
                                                break;
                                            default:
                                                $salary_per_hour = 0;
                                                break;
                                        }
                                    $select_attendance = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid = '$eid' AND status = 'off' AND month = '$month' AND year = '$year' ") or die ('Query failed: ');
                                    if(mysqli_num_rows($select_attendance) > 0) {
                                        while($fetch_attendance = mysqli_fetch_assoc($select_attendance)) {
                                            $count++;
                                    ?>

                                    <tr> 
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $fetch_attendance['time_in']?></td>
                                        <td><?php echo $fetch_attendance['time_out']?></td>
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



                                        $salary = $total_hours * $salary_per_hour;
                                        ?>
                                        <td <?php echo $text_color ?>><?php echo $total_hours ?> Hrs <?php echo $total_minutes ?> Mins</td>
                                        <td><?php echo $fetch_attendance['duty']?></td>
                                        <td><?php echo $salary ?></td>
                                
                                    <?php 
                                            }
                                        } 
                                    ?>
                                </tbody>
                              </table>
                            </tr>
                            </div>
                          </div> 
                          <div class="inputs">
                            <input type="number" name="bonus" id="">
                            <input type="number" name="deduction" id="">
                        </div>
                        <div class="button">Submit</div>

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
