<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];

    if (!isset($employee_id)){
        header('location:../login/login.php');
    }
    if (!isset($_GET['id'])) {
      header('location:../404.php');
      
    }
    $id = $_GET['id'];
    if(isset($_POST['send'])){
        date_default_timezone_set('Asia/Manila');
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $messages = mysqli_real_escape_string($conn, $_POST['messages']);
        $date = date('m-d-y');
        $time = date('h:i:sA');
        $timestamp = $date.' '.$time;
        mysqli_query($conn, "INSERT INTO `message` (`user_id`, `sender`, `name`, `email`, `message`, `date` ) VALUES ('$id', '$sender', '$name', '$email', '$messages','$timestamp')") or die ('query failed');
        echo "<script>window.onload = function() { window.opener.location.href = '../user/user_message.php'; }</script>";
      
    }
    if(isset($_POST['delete'])){
        mysqli_query($conn, "DELETE FROM `message` WHERE user_id = '$id'") or die ('query failed');
        header('location:employee_message.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_employee.css" />
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

        <div class="container-box heading-div">
        <button class="button" onclick="history.back()">
          <div class="button-box">
            <span class="button-elem">
              <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
            <span class="button-elem">
              <svg viewBox="0 0 46 40">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
          </div>
        </button>
          <div class="titlediv">
            <h1>MESSAGES</h1>
          </div>
          <form method="post">
            <button name="delete" type="submit" class="msg-delete-btn" onclick="return confirm('Delete this message?')"><ion-icon class="msg-delete-btn" name="trash"></ion-icon></button>
          </form>
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
                <form method="post">
                    <div class="send-msg">
                        <input type="hidden" name="email" value="ISTORIACAFE@GMAIL.COM">
                        <input type="hidden" name="sender" value="employee">
                        <input type="hidden" name="name" value="ISTORIA">
                        <input type="hidden" name="phone" value="istoria">
                        <input name="messages" type="text" placeholder="Send message....">
                        <button name="send" type="submit"><ion-icon name="paper-plane"></ion-icon></button>
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
