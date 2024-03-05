<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
    if(isset($_POST['add'])){    
        $filter_email = filter_var($_POST['aemail'], FILTER_SANITIZE_STRING);
        $aemail = mysqli_real_escape_string($conn, $filter_email);

        $filter_password = filter_var($_POST['apassword'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        
        $employee_id = mysqli_real_escape_string($conn,'EID'.$_POST['employee_id']);
        $position = mysqli_real_escape_string($conn, $_POST['rank']);
        $name =  mysqli_real_escape_string($conn,$_POST['lname'].', ' .$_POST['fname']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $bday = mysqli_real_escape_string($conn, $_POST['bday']);
        $bplace = mysqli_real_escape_string($conn, $_POST['bplace']);
        $address =  mysqli_real_escape_string($conn,$_POST['house'].', '.$_POST['city'].', '.$_POST['province'].',  ('.$_POST['postal'].')' );
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $date_hired = mysqli_real_escape_string($conn, $_POST['date-hired']);

        if(isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../assets/profiles/'.$image;

            $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$aemail'") or die ('query failed');
            if(mysqli_num_rows($select_user)>0){
            $message[] = 'Email Already Exist';

            }else{
                $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$employee_id'") or die ('query failed');
                if(mysqli_num_rows($select_employee)>0){
                    $message[] = 'Employee ID Already Exist';
                }else{
                    mysqli_query($conn, "INSERT INTO `user` ( `type`, `email` , `password`) 
                    VALUES ('$type', '$aemail','$password')") or die ('query failed');
                    $eid = mysqli_insert_id($conn);

                    $insert_employee = mysqli_query($conn, "INSERT INTO `employee` (`eid`, `employee_id`, `rank`, `name`, `gender`, `age`, `birthdate`,`birthplace`, `address`, `contact`, `email`, `image`, `hire_date`) VALUES 
                    ('$eid', '$employee_id', '$position', '$name','$gender', '$age', '$bday', '$bplace', '$address', '$contact', '$email', '$image', '$date_hired')") or die ('query failed');

                    if ($insert_employee) {
                        if ($image_size > 2000000) {
                            $message[] = 'Image is too large';
                        } else {
                            move_uploaded_file($image_tmp_name, $image_folder);
                            $message[] = 'Account Created Successfully';
                            header('location: admin_employee.php');
                        }
                    }
                    
                }
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
          <h1>Add Employee</h1>
        </div>

        <div class="container-box">
            <?php
                if(isset($message)){
                foreach ($message as $message) {
                echo'
                    <div class="addproduct-errormsg">
                    *'.$message.'
                    </div>
                    ';
                }
                }
            ?>
          <form method="post" enctype="multipart/form-data">
            <div class="employee-div">
            <div class="empolyee-add-email">
                    <div class="col1">
                        <input name="type" type="hidden" value="employee">
                        <label for="aemail">Email</label><br>
                        <input name="aemail" type="text" id="aemail" required><br>
                        <label for="password">Password</label><br>
                        <input name="apassword" type="text" id="password" required> 
                    </div>
                    <div class="col2">
                        <img src="../assets/Images/logo.png" width="200px">
                    </div>
                </div>
                <hr>
                <div class="employee-add-img">
                    <label >Profile</label><br>
                    <input name="image" type="file" accept="image/jpg, image/png, image/webp" class="form-control" required /><br>
                    <label for="dated">Date Hired</label><br>
                    <input type="date" name="date-hired" id="dated" required>
                </div>
                <hr>
                <div class="employee-info">
                    <div class="ecol1">

                        <label for="fname">First Name</label>
                        <input name="fname" type="text" id="fname" required>

                        <label for="lname">Last Name</label>
                        <input name="lname" type="text" id="lname" required>

                        <label for="gender">Gender</label>
                        <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        
                        <label for="age">Age</label>
                        <input name="age" type="number"  id="age" required>

                        <label for="bday">Birthday</label>
                        <input name="bday" type="date"  id="bday" required>

                        <label for="bplace">Birth Place</label>
                        <input name="bplace" type="text"  id="bplace" required>

                        <label for="number">Contact #</label>
                        <input name="contact" type="number"  id="number" required>
                    </div>
                    <div class="ecol2">
                        <label for="eid">Employee ID</label>
                        <input name="employee_id" type="text" id="eid" required>

                        <label for="rank">Position</label>
                        <select name="rank">
                            <option value="Cashier">Cashier</option>
                            <option value="Bartender">Bartender</option>
                            <option value="Manager">Manager</option>
                        </select>

                        <label for="email">Email</label>
                        <input name="email" type="email"  id="email" required>

                        <label for="house">House #/ Barangay</label>
                        <input name="house" type="text"  id="house" required>

                        <label for="city">City</label>
                        <input name="city" type="text"  id="city" required>

                        <label for="province">Province</label>
                        <input name="province" type="text"  id="province" required>

                        <label for="postal">Postal</label>
                        <input name="postal" type="number"  id="postal" required>

                    </div>
                </div>
                <hr>
                
                <div class="employee-add-button">
                    <button name="add" type="submit">ADD EMPLOYEE</button>
                </div>
            </div>
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
