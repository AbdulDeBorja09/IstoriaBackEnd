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

        <div class="container-box">
            <h1>ATTENDACE</h1>
        </div>
        <div class="container-box">
            <table class="table-attendance">
                <thead>
                    <tr>
                        <th>#</th>
                        <th align="start">Employee ID</th>
                        <th align="start">Name</th>
                        <th>Rank</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Hours</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $select_attendance = mysqli_query($conn, "SELECT * FROM `attendance` WHERE status = 'off' ORDER BY date ASC ") or die ('query failed');
                $count = 0;
                if(mysqli_num_rows($select_attendance)>0){
                    while($fetch_attendance = mysqli_fetch_assoc($select_attendance)){
                    $count++;
                    $time_in = date("h:i A", strtotime($fetch_attendance['time_in']));
                    $time_out = date("h:i A", strtotime($fetch_attendance['time_out']));
                ?>
                    <tr>
                        <td align="center"><b><?php echo $count ?></b></td>
                        <td><b><?php echo $fetch_attendance['employee_id'] ?></b></td>
                        <td><?php echo $fetch_attendance['name'] ?></td>
                        <td><?php echo $fetch_attendance['rank'] ?></td>
                        <td><?php echo $time_in ?></td>
                        <td><?php echo $time_out ?></td>
                        <?php
                            $time_in =  $fetch_attendance['time_in'] ;
                            $time_out = $fetch_attendance['time_out'] ;
                            $date = $fetch_attendance['date'] ;

                            $time_in_dt = DateTime::createFromFormat('H:i:s', $time_in);
                            $time_out_dt = DateTime::createFromFormat('H:i:s', $time_out);
                            if ($time_out_dt < $time_in_dt) {
                                $time_out_dt->modify('+1 day');
                            }
                            $time_diff = $time_out_dt->getTimestamp() - $time_in_dt->getTimestamp();
                            $total_hours = floor($time_diff / 3600); 

                            ?>
                        <td><?php echo $total_hours ?></td>

                        <td><?php echo $fetch_attendance['date'] ?></td>
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
