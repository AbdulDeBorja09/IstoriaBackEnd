<?php 
  include '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];

  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  if (!isset($_GET['id'])) {
    header('location:../404.php');
    
  }
  $id = $_GET['id'];
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

        <div class="container-box">
          <h1>MESSAGE</h1>
        </div>
        <div class="container-box">
          <?php 
            if(isset($_GET['id'])){
              $id = $_GET['id'];
              $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$id'") or die ('query failed');
                if(mysqli_num_rows($select_message)>0){
                  while($fetch_message = mysqli_fetch_assoc($select_message)){
                    $sender = $fetch_message['sender'];
                    $date = strtok($fetch_message["date"], " ");
                    $time = substr(strstr($fetch_message["date"], " "), 1);
                ?>  
                <?php if ($sender == "user"){ ?>
                  <h6 class="msg-time"><?php echo $fetch_message['date']?></h6>
                    <div class="message-left">
                        <div class="msgbox">
                            <img src="../assets/Images/profile3.png" >
                            <div class="info">
                                <h5>CUSTOMER</h5>
                                <h4><?php echo $fetch_message['name']?></h4>
                                <h3><?php echo $fetch_message['email']?></h3>
                            </div>
                            <div class="msg">
                                <p  class="p"> <?php echo $fetch_message['message']?></p>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                      <h6 class="msg-time"><?php echo $fetch_message['date']?></h6>
                    <div class="message-right">
                        <div class="msgbox">
                            <div class="msg">
                                <p class="p"><?php echo $fetch_message['message']?></p>
                            </div>
                            <div class="info">
                                <h5>CUSTOMER SERVICE</h5>
                                <h4>ISTORIA </h4>
                                <h3>istoriacafe@gmail.com</h3>
                            </div>
                            <img src="../assets/Images/profile3.png" >
                        </div>
                    </div>
                    <?php } ?>
                <?php
                   }
                }else{
                  header('location:../404.php');
              }
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
