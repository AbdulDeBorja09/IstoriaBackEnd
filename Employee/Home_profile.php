<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];
    date_default_timezone_set('Asia/Manila');

    if (!isset($employee_id)){
      header('location:../login/login.php');
    }
    date_default_timezone_set('Asia/Manila');
    $month = date('m');
    $year = date('y');
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
  <body >
    <?php include 'navbar.php'; ?>
    <?php
        $edit_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$employee_id'") or die ('query failed');
        $fetch_employee = mysqli_fetch_assoc($edit_employee);
        $user_query = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$employee_id'") or die ('query failed');
        $name = explode(',', $fetch_employee["name"]);
        $name = array_map('trim', $name); 
        $address = explode(',', $fetch_employee["address"]);
        $address = array_map('trim', $address); 

          ?>
    <div style="padding: 30px;"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-4 col-sm-12 text-center">
          <img
            class="profile-image "
            src="../assets/profiles/5.png"
            style="border-radius: 50%;"
            
          />
          <div style="padding: 10px"></div>
        </div>
        <div class="col-lg-7 col-md-8 col-sm-12">
          <h2><?php echo $fetch_employee['name'] ?></h2>
          <p><?php echo $fetch_employee['address'] ?></p>
          <table class="profile-table1">
            <tr>
              <td>Employee ID:</td>
              <td><?php echo $fetch_employee['employee_id'] ?></td>
            </tr>
            <tr>
              <td>Position:</td>
              <td><?php echo $fetch_employee['rank'] ?></td>
            </tr>
            <tr>
              <td>Personal Email:</td>
              <td><?php echo $fetch_employee['email'] ?></td>
            </tr>
          </table>
          <?php 
            $select_salary = mysqli_query($conn, "SELECT * FROM `salary` WHERE eid = '$employee_id' AND month = '$month ' AND year = '$year'") or die('query failed');
            if(mysqli_num_rows($select_salary)>0){
          ?>
          <a href="Home_salary.php" class="payslip-btn btn">VIEW PAYSLIP</a>
          <h6 class="payslip-note"><i>*Your payslip for this month is now available.</i></h6>
          <?php 
            }else{
            ?>
              <h6 class="payslip-note"><i>*Your payslip for this month is not available yet.</i></h6>
            <?php 
            }
          
          ?>
        </div>
      </div>
    </div>
    <div class="profile-info-container container">
      <h3 style="font-weight: 400" class="text-center">INFORMATION</h3>
      <hr />
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">Last Name:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $name[0]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">First Name:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $name[1]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Gender:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $fetch_employee['gender'] ?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Age:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $fetch_employee['age'] ?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Birthday:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input type="date" value="<?php echo $fetch_employee['birthdate'] ?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">House No. / Barangay:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $address[0]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">City</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $address[1]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Province:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $address[2]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Postal:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $address[3]?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">Birthplace:</div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <input value="<?php echo $fetch_employee['birthplace'] ?>" readonly class="form-control" />
              <div style="padding: 10px"></div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="text-center">
            <form method="post">
              <button name="logout" class="profile-logout-btn btn w-50">LOGOUT</button>
            </form>
      </div>
    </div>





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
