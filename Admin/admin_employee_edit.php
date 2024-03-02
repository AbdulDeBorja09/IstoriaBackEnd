<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  $edit_id = $_GET['edit'];
  
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
          if(isset($_GET['edit'])){
              $edit_id = $_GET['edit'];
              $edit_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid = '$edit_id'") or die ('query failed');
              $fetch_edit = mysqli_fetch_assoc($edit_query);
          ?>
          <form method="post" enctype="multipart/form-data">
            <div class="employee-div">
            <div class="empolyee-add-email">
                    <div class="col1">
                        <input name="type" type="hidden" value="employee">
                        <label for="aemail">Email</label><br>
                        <input name="aemail" type="text" id="aemail" value="<?php echo $fetch_edit['edit']?>" required><br>
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
                        <label for="eid">Employee ID</label>
                        <input name="employee_id" type="text" id="eid" required value="<?php echo $fetch_edit['employee_id']?>">

                        <label for="fname">First Name</label>
                        <input name="fname" type="text" id="fname" required >

                        <label for="gender">Gender</label>
                        <input name="gender" type="text" id="gender" required>

                        <label for="bday">Birthday</label>
                        <input name="bday" type="date"  id="bday" required>
                        
                        <label for="house">House #/ Barangay</label>
                        <input name="house" type="text"  id="house" required>

                        <label for="province">Province</label>
                        <input name="province" type="text"  id="province" required>

                        <label for="number">Contact #</label>
                        <input name="contact" type="number"  id="number" required>
                    </div>
                    <div class="ecol2">
                        <label for="rank">Position</label>
                        <input name="rank" type="text" id="rank" required>

                        <label for="lname">Last Name</label>
                        <input name="lname" type="text" id="lname" required>

                        <label for="age">Age</label>
                        <input name="age" type="number"  id="age" required>

                        <label for="bplace">Birthplace</label>
                        <input name="bplace" type="text" id="bplace" required>

                        <label for="city">City</label>
                        <input name="city" type="text"  id="city" required>

                        <label for="postal">Postal</label>
                        <input name="postal" type="number"  id="postal" required>

                        <label for="email">Email</label>
                        <input name="email" type="email"  id="email" required>
                    </div>
                </div>
                <hr>
                
                <div class="employee-add-button">
                    <button name="add" type="submit">ADD EMPLOYEE</button>
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