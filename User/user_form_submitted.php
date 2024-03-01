<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Form Submitted</title>
</head>
<body>
    <div class="form-submiited-div">
        <div class="logo-container">
            <div> 
                <img src="../assets/Images/logo2.png" alt="logo1" class="logo1">
                <img src="../assets/Images/logo3.png" alt="logo2"class= logo2>
            </div>
        </div>

        <div class="form-submitted">
            <h1>FORM SUBMITTED</h1>
        </div>

        <div class="thankyou">
            <h6>THANK YOU!</h6>
        </div>

        <div class="form-logo">
            <div class="form-sub">
                <img src="../assets/Images/form.png" alt="submitted" class="form-img">
            </div>
        </div>

        <div class="returnbutton">
            <a class="return" href="user_home.php">RETURN TO HOME</a>
        </div>
    </div>
</body>
</html>