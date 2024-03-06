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
        $datenum = date('m/d/Y');
        $monthnow = date('F Y');
        $select_salary = mysqli_query($conn, "SELECT * FROM `salary` WHERE eid = '$employee_id' AND month = '$month ' AND year = '$year'") or die('query failed');
        if(mysqli_num_rows($select_salary)>0){
            while($fetch_salary = mysqli_fetch_assoc($select_salary)){
                $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$employee_id'") or die('query failed');
                $fetch_employee = mysqli_fetch_assoc($select_employee);

                $rank = $fetch_employee['rank'];
                switch($rank) {
                    case 'Bartender':
                        $salary_per_hour = 70;
                        $salary_per_day = $salary_per_hour * 8;
                        break;
                    case 'Manager':
                        $salary_per_hour = 81.25;
                        $salary_per_day = $salary_per_hour * 8;
                        break;
                    case 'Cashier':
                        $salary_per_hour = 68.75;
                        $salary_per_day = $salary_per_hour * 8;
                        break;
                    default:
                        $salary_per_hour = 0;
                        $salary_per_day = $salary_per_hour * 8;
                        break;
                }

                $deduc = $fetch_salary['deduction'];
                $bonus = $fetch_salary['bonus'];

                $deducted = $fetch_salary['total_salary'] - $deduc; 
                $final_salary = $deducted + $bonus;
    ?>             
    <div class="payslip-div container">
        <h1>PAYSLIP</h1>
        <h6>EMPLOYEE DETAILS</h6>
        <div class="payslip-flex">
            <div class="left">
                <h2>Name:</h2>
                <h2>employee id:</h2>
                <h2>Position</h2>
            </div>
            <div class="right">
                <h2><?php echo $fetch_employee['name'] ?></h2>
                <h2><?php echo $fetch_employee['employee_id'] ?></h2>
                <h2><?php echo $fetch_employee['rank'] ?></h2>
            </div>
        </div>
        <div class="slipbox">
            <div class="top">
                <h3><?php echo $datenum ?></h3>
                <h3>ISTORIA coffee shop</h3>
                <h3>Brgy. Maitim, Bay, Philippines</h3>
            </div>
            <table class="slip-table table">
                <thead>
                    <tr>
                        <td>DUTY</td>
                        <td>TOTAL HOURS</td>
                        <td>TOTAL DAYS</td>
                        <td>BONUS</td>
                        <td>LATE</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="scndrow">    
                        <td rowspan="2">
                            <h4>POSITION:</h4>
                            <h1><?php echo $fetch_employee['rank'] ?></h1>
                            <h3>₱ <?php echo $salary_per_hour ?></h3>
                            <h2>PER HOUR</h2>
                            <h3>₱ <?php echo $salary_per_day ?></h3>
                            <h2>PER DAY</h2>
                        </td>
                        <td class="leftline"><?php echo $fetch_salary['total_hrs'] ?> HOURS</td>
                        <td><?php echo $fetch_salary['total_days'] ?></td>
                        <td>
                            <?php 
                            if($bonus > 0){
                            ?>
                               +₱ <?php echo $bonus ?>.00
                            <?php
                            }else{
                                echo' N/a';

                            }
                            ?>
                        </td>
                        <td><?php echo $fetch_salary['lates'] ?></td>
                    </tr>
                    <tr class="lastrow">
                        <td class="leftline">₱ <?php echo $deducted ?></td>
                        <td>₱ <?php echo $fetch_salary['total_salary'] ?></td>
                        <td></td>
                        <td>
                            <?php 
                            if($deduc > 0){
                            ?>
                               - ₱ <?php echo $deduc  ?>.00
                            <?php
                            }else{
                                echo'0';

                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bottom-slip">
                <h4><?php echo $monthnow ?></h4>
                <h4>TOTAL SALARY:</h4>
                <h4>₱ <?php echo $final_salary ?></h4>
        </div>
        <div class="slip-return">
            <button onclick="history.back()">RETURN</button>
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
