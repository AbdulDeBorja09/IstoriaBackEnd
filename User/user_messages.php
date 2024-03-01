<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    if(isset($_POST['sendmsg'])){
        date_default_timezone_set('Asia/Manila');
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $messages = mysqli_real_escape_string($conn, $_POST['message']);
        $date = date('m-d-y');
        $time = date('h:i:sA');
        $timestamp = $date.' '.$time;
        mysqli_query($conn, "INSERT INTO `message` (`user_id`, `sender`, `name`, `email`, `message`, `date` ) VALUES ('$user_id', '$sender', '$name', '$email', '$messages','$timestamp')") or die ('query failed');
        echo "<script>window.onload = function() { window.opener.location.href = '../employee/employee_message.php'; }</script>";
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Istoria</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="msg-title">
        <h1>CUSTOMER SERVICE</h1>
    </div>
    <div class="msg-box container">
        <?php 
            $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die ('query failed');
            $fetch_user = mysqli_fetch_assoc($select_user);
            $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE user_id = '$user_id' ORDER BY date ASC") or die ('query failed');
                if(mysqli_num_rows($select_message)>0){
                  while($fetch_message = mysqli_fetch_assoc($select_message)){
                    $sender = $fetch_message['sender'];
                    $date = strtok($fetch_message["date"], " ");
                    $time = substr(strstr($fetch_message["date"], " "), 1);
                ?>  
                <?php if ($sender == "employee"){ ?>
                    <div class="msg-left">
                        <h6><?php echo $fetch_message['date']?></h6>
                        <div class="msgbox">
                            <img src="../assets/Images/profile3.png" >
                            <div class="info">
                                <h5>CUSTOMER SERVICE</h5>
                                <h4>ISTORIA MANAGEMENT</h4>
                                <h3>istoriacafe@gmail.com</h3>
                            </div>
                            <div class="msg">
                                <p class="p"><?php echo $fetch_message['message']?></p>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="msg-right">
                        <h6><?php echo $fetch_message['date']?></h6>
                        <div class="msgbox">
                            <div class="msg">
                                <p class="p"><?php echo $fetch_message['message']?></p>
                            </div>
                            <div class="info">
                                <h5>YOU</h5>
                                <h4><?php echo $fetch_message['name']?></h4>
                                <h3><?php echo $fetch_message['email']?></h3>
                            </div>
                            <img src="../assets/Images/profile3.png" >
                        </div>
                    </div>
                    <?php } ?>
                <?php

                   }?>
                   <form method="post">
                        <div class="replybtn">
                            <input type="hidden" name="sender" value="user">
                            <input type="hidden" name="name" value="<?php echo $fetch_user['name'] ?>"  />
                            <input type="hidden" name="email" value="<?php echo $fetch_user['email'] ?>"/>
                            <input type="hidden" name="phone" value="<?php echo $fetch_user['contact'] ?>"/>
                            <input type="text" name="message"  placeholder="SEND A MEESAGE" required>
                            <button name="sendmsg" type="submit"><ion-icon name="paper-plane"></ion-icon></button>
                        </div>
                   </form>
                <?php
                }else{
                ?>
                <p>communicate with us in real-time! our customer service Team is here to assist you with anything you need.</p>
                <form method="post" class="msg-form">
                    <div class="sendmsg">
                        <input type="hidden" name="sender" value="user">
                        <input type="hidden" name="name" value="<?php echo $fetch_user['name'] ?>"  />
                        <input type="hidden" name="email" value="<?php echo $fetch_user['email'] ?>"/>
                        <input type="hidden" name="phone" value="<?php echo $fetch_user['contact'] ?>"/>
                        <input type="text" name="message" placeholder="SEND A MESSAGE" required>
                        <button name="sendmsg" type="submit"><ion-icon name="paper-plane"></ion-icon></button>
                    </div>
                </form>
            <?php     
            }
            ?>
    </div>

    <div style="padding: 100px;"></div>
    <?php include 'footer.php' ?>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../Src/Javascript/main.js"></script>
</body>
</html>