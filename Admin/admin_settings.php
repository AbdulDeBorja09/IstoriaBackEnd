<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
    
  if(isset($_POST['add'])){
        
    
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);
    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);
    $type = "admin";
    
    
    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die ('query failed');
    if(mysqli_num_rows($select_user)>0){
      $message[] = 'Email Already Exist';
    }else{
      if ($password != $cpassword){
        $message[] = 'Password Does Not Match';
      }else{
        mysqli_query($conn, "INSERT INTO `user` ( `type`, `email` , `password`) 
        VALUES ('$type','$email','$password')") or die ('query failed');
        $message[] = 'Account Created Successfully';
        
      }
    }
  }
  if (isset($_POST['logout'])){
    session_destroy();
    header('location:../login/login.php');
  }
  if (isset($_POST['reset'])){
    $tables = array();
    $result = mysqli_query($conn, "SHOW TABLES") or die ('query failed');
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
    foreach ($tables as $table) {
        mysqli_query($conn, "TRUNCATE TABLE $table");
        mysqli_query($conn, "ALTER TABLE $table");
    }
    $folders_to_clear = array("profiles", "products", "reviews");
    foreach ($folders_to_clear as $folder) {
        $path = "../assets/$folder";
        $files = scandir($path);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                unlink("$path/$file");
            }
        }
    }
    $email = "admin";
    $password = "istoria123";
    $type = "admin";
    mysqli_query($conn, "INSERT INTO `user` (`id`, `type`, `email` , `password`) 
        VALUES ('1','$type','$email','$password')") or die ('query failed');
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
          <?php include 'time.php' ?>
        </div>

        <div class="container-box employee-title">
          <h1>SETTINGS</h1>
        </div>

        <div class="container-box">
            <div class="brandings">
                <img src="../assets/Images/logo2.png" alt="" />
                <img class="img2" src="../assets/Images/logo3.png" alt="" />
            </div>
            <div class="add-admin-div">
                
                <div class="add-admin">
                    <h1>ADD ADMIN ACCOUNT</h1>
                    <form method="post">
                        <input type="text" name="email" placeholder="Email" required>
                        <input type="text" name="password" placeholder="Password" required>
                        <input type="text" name="cpassword" placeholder="Confirm password" required>
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
                        <button name="add" type="submit" >ADD ADMIN</button>
                    </form>
                </div>
                <div class="resetdb">
                    <div class="icon">
                        <ion-icon name="server-outline"></ion-icon>
                    </div>
                    <div class="text">
                        <span>WARNING! </span>
                        <p>* Clicking the reset button will result in the complete clearing of the database, erasing all its contents. This action will revert all settings to default, including the administrator email and password. Proceed with caution, as this action cannot be undone.</p>
                    </div>      
                    <div class="reset-btn">
                        <button id="openModalBtn">RESET DATABASE</button>
                    </div>
                </div>
            </div>
            <div class="add-admin-bottom">
                <div class="logout">
                    <form method="post">
                        <button name="logout">LOGOUT</button>
                    </form>
                </div>
            </div>
      </div>
      <div id="Modal" class="confirmmodal">
      <div class="modal-content">
        <span class="close">&times;</span>
          <form method="post">
            <div class="icon">
                <ion-icon name="alert-circle-outline"></ion-icon>
            </div>
            <div class="text">
                <h1>"Are you sure you want to reset?"</h1>
            </div>
            <div class="buttons">
                <a class="closes" id="close2">CLOSE</a>
                <button class="confirm" name="reset" type="submit">CONFIRM</button>
            </div>
          </form>
        </div>
      </div>
      <script>
        var modal = document.getElementById("Modal");
        var btn = document.getElementById("openModalBtn");
        var btn2 = document.getElementById("close2");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        btn2.onclick = function() {
            modal.style.display = "none";
        }
    </script>
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
