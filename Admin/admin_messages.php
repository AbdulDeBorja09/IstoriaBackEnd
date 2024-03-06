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
          <?php include 'time.php' ?>
        </div>

        <div class="container-box">
          <h1>MESSAGE</h1>
        </div>
        <div class="container-box">
            <table class="messages-table" id="message-table" >
              <tbody>
              <?php
                $count = 0;
                $select_message = mysqli_query($conn, "SELECT * FROM `message` ORDER BY user_id, date DESC") or die ('Query failed');
                $current_user_id = null;
                if(mysqli_num_rows( $select_message)>0){
                while($fetch_message = mysqli_fetch_assoc($select_message)){
                    if($fetch_message['user_id'] != $current_user_id){
                      $count++;
                      $sender = $fetch_message['sender'];
                      $date = strtok($fetch_message["date"], " ");
                      $time = substr(strstr($fetch_message["date"], " "), 1);
                  ?>    
                  <tr>
                    <td><h1><?php echo $count ?></h1></td>
                    <td> <?php if ($sender == "user") { ?>
                            <h1><strong><?php echo $fetch_message['name'] ?></strong></h1>
                            <div class="time">
                              <h2><strong><?php echo $date ?></strong></h2>
                              <h2><strong><?php echo $time ?></strong></h2>
                            </div>
                      <?php } else { ?>
                        <h1><?php echo $fetch_message['name'] ?></h1>
                            <div class="time">
                              <h2><?php echo $date ?></h2>
                              <h2><?php echo $time ?></h2>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                    <?php if ($sender == "user") { ?>
                        <div class="msg">
                          <p><strong><?php echo $fetch_message['message'] ?> </strong></p>
                          <div class="dot"></div>
                        </div>
                      <?php } else { ?>
                        <p><?php echo $fetch_message['message'] ?></p>
                      <?php } ?> 
                    </td>
                    <td><a href="admin_message_view.php?id=<?php echo $fetch_message['user_id']?>">VIEW MESSAGE</a></td>
                  </tr>
                 <?php    
                 $current_user_id = $fetch_message['user_id'];
                      }
                } 
              }else{
                ?>
                <tr>
                  <td colspan="8" style="padding: 150px 0px; border:0px;">
                    <h1 style="font-size: 30px;">NO MESSAGE</h1>
                  </td>
                </tr>
                <?php  
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
