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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Account</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="profile-title text-center">
        <h1>ACCOUNT</h1>
    </div>
    <div class="editprofile">
        <h1>ACCOUNT DETAILS</h1>
        <button onclick="history.back()">RETURN TO ACCOUNT DETAILS</button>
    </div>

    <div class="maindiv">
        <h1>EDIT ACCOUNT DETAILS</h1>
        <div class="flexing">
            <div class="left">
                <input type="text" name="" id="" placeholder="FIRST NAME" />
                <input type="text" name="" id="" placeholder="LAST NAME" />
                <input type="text" name="" id="" placeholder="USERNAME" />
                <input type="text" name="" id="" placeholder="CONTACT NUMBER" />
            </div>
            <div class="right">
                <input type="text" name="" id="" placeholder="PASSWORD" />
                <input type="text" name="" id="" placeholder="CONFIRM PASSWORD" />
                <textarea name="" id="" cols="30" rows="3" placeholder="ADDRESS"></textarea>
            </div>
        </div>
        <div class="savebutton text-center">
            <button class="btn w-25">SAVE CHANGES</button>
        </div>
    </div>
    <div style="padding: 120px"></div>
    <?php include 'footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/Src/Javascript/index.js"></script>
    <script src="/Src/Javascript/main.js"></script>
</body>

</html>