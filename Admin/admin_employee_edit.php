<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  $edit_id = $_GET['edit'];
  if (!isset($_GET['edit'])) {
    header('location:../404.php');
    
  }
  if(isset($_POST['submit'])){    
    $filter_email = filter_var($_POST['aemail'], FILTER_SANITIZE_STRING);
    $aemail = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['apassword'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $position = mysqli_real_escape_string($conn, $_POST['rank']);
    $name =  mysqli_real_escape_string($conn,$_POST['lname'].',' .$_POST['fname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
    $bplace = mysqli_real_escape_string($conn, $_POST['bplace']);
    $address =  mysqli_real_escape_string($conn,$_POST['house'].','.$_POST['city'].','.$_POST['province'].','.$_POST['postal']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date_hired = mysqli_real_escape_string($conn, $_POST['date-hired']);
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder='../assets/profiles/'.$image; 

    $update_employee = mysqli_query($conn, "UPDATE `employee` SET 
    `employee_id` = '$employee_id', 
    `rank` = '$position', 
    `name` = '$name', 
    `gender` = '$gender', 
    `age` = '$age',
    `birthdate` = '$bday', 
    `birthplace` = '$bplace',
    `address` = '$address',
    `contact` = '$contact',
    `email` = '$email',
    `image` = '$image',
    `hire_date` = '$date_hired' WHERE eid = '$edit_id'") or die ('query failed'); 

    $update_user = mysqli_query($conn, "UPDATE `user` SET 
    `id` = '$edit_id',
    `type` = '$type',
    `email` = '$aemail', 
    `password` = '$password'
    WHERE id = '$edit_id'") or die ('query failed'); 

    if($update_employee){
      move_uploaded_file($image_tmp_name, $image_folder);
      $message[] = 'Product updated successfully'; 
      header('location: admin_employee.php');
    } else {
        $message[] = 'Failed to Update Employee'; 
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
          <h1>Edit Employee</h1>
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
          <?php  
          if(isset($_GET['edit'])){
              $edit_id = $_GET['edit'];
              $edit_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$edit_id'") or die ('query failed');
              $fetch_edit = mysqli_fetch_assoc($edit_query);
              $user_query = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$edit_id'") or die ('query failed');
              $fetch_user = mysqli_fetch_assoc($user_query);
              $name = explode(',', $fetch_edit["name"]);
              $address = explode(',', $fetch_edit["address"]);

          ?>
          <form method="post" enctype="multipart/form-data">
            <div class="employee-div">
            <div class="empolyee-add-email">
                    <div class="col1">
                        <input name="type" type="hidden" value="employee">
                        <label for="aemail">Email</label><br>
                        <input name="aemail" type="text" id="aemail" value="<?php echo $fetch_user['email']?>" required><br>
                        <label for="password">Password</label><br>
                        <input name="apassword" type="text" id="password" required value="<?php echo $fetch_user['password']?>" required> 
                    </div>
                    <div class="col2">
                        <img class="edit-employee-profile-img" src="../assets/profiles/<?php echo $fetch_edit['image']?>" width="200px">
                    </div>
                </div>
                <hr>
                <div class="employee-add-img">
                    <label >Profile</label><br>
                    <input name="image" type="file" accept="image/jpg, image/png, image/webp" class="form-control" required src="../assets/profiles/<?php echo $fetch_edit['image']?>"/><br>
                    <label for="dated">Date Hired</label><br>
                    <input type="date" name="date-hired" id="dated" required value="<?php echo $fetch_edit['hire_date']?>">
                </div>
                <hr>
                <div class="employee-info">
                    <div class="ecol1">
                        <label for="lname">Last Name</label>
                        <input name="lname" type="text" id="lname" required  value="<?php echo $name[0] ?>">

                        <label for="fname">First Name</label>
                        <input name="fname" type="text" id="fname" required value="<?php echo $name[1] ?>">

                        <label for="gender">Gender</label>
                        <select name="gender">
                            <option value="Male" <?php if ($fetch_edit['gender'] == 'Male') echo 'selected';?>>Male</option>
                            <option value="Female" <?php if ($fetch_edit['gender'] == 'Female') echo 'selected';?>>Female</option>
                        </select>

                        <label for="age">Age</label>
                        <input name="age" type="number"  id="age" required value="<?php echo $fetch_edit['age']?>">

                        <label for="bday">Birthday</label>
                        <input name="bday" type="date"  id="bday" required value="<?php echo $fetch_edit['birthdate']?>">

                        <label for="bplace">Birthplace</label>
                        <input name="bplace" type="text" id="bplace" required value="<?php echo $fetch_edit['birthplace']?>">


                        <label for="number">Contact #</label>
                        <input name="contact" type="number"  id="number" required value="<?php echo $fetch_edit['contact']?>">
                    </div>
                    <div class="ecol2">
                        <label for="eid">Employee ID</label>
                        <input name="employee_id" type="text" id="eid" required value="<?php echo $fetch_edit['employee_id']?>">

                        <label for="rank">Position</label>
                        <select name="rank">
                            <option value="Cashier" <?php if ($fetch_edit['rank'] == 'Cashier') echo 'selected';?>>Cashier</option>
                            <option value="Bartender" <?php if ($fetch_edit['rank'] == 'Bartender') echo 'selected';?>>Bartender</option>
                            <option value="Manager" <?php if ($fetch_edit['rank'] == 'Manager') echo 'selected';?>>Manager</option>
                        </select>

                        <label for="email">Email</label>
                        <input name="email" type="email"  id="email" required value="<?php echo $fetch_edit['email']?>">

                        <label for="house">House #/ Barangay</label>
                        <input name="house" type="text"  id="house" required value="<?php echo $address[0] ?>">

                        <label for="city">City</label>
                        <input name="city" type="text"  id="city" required value="<?php echo $address[1] ?>">

                        <label for="province">Province</label>
                        <input name="province" type="text"  id="province" required value="<?php echo $address[2] ?>">

                        <label for="postal">Postal</label>
                        <input name="postal" type="text"  id="postal" required value="<?php echo $address[3] ?>" >
                    </div>
                </div>
                <hr>
                
                <div class="employee-add-button">
                    <button name="submit" type="submit">SUBMIT EDIT</button>
                </div>
            </div>
          </form>
          <?php
              }
            ?>
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