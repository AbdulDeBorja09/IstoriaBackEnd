<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    if(isset($_POST['update'])){
        $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $name = mysqli_real_escape_string($conn, $filter_name);

        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);
    
        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);
        $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
        $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

        if ($password != $cpassword){
            $message[] = 'Password Does Not Match';
        }else{
            $update_query = mysqli_query($conn, "UPDATE `customer` SET 
            `uid` = '$user_id',
            `name` = '$name',
            `username` = '$username',
            `address` = '$address',
            `email` = '$email',
            `contact` = '$contact'
            WHERE uid = '$user_id'") or die ('query failed');

            mysqli_query($conn, "UPDATE `user` SET `email` = '$email', `password` = '$password' WHERE id = '$user_id' ") or die ('query failed');
            $message[] = 'Account Edited Successfully';
        }

        
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
        <?php $select_user = mysqli_query($conn, "SELECT * FROM `customer` WHERE uid = '$user_id' ") or die ('query failed'); 
                    if(mysqli_num_rows($select_user)>0){
                        while($fetch_user = mysqli_fetch_assoc($select_user)){
                    ?>
        <form method="post" class="edit-profile-form">
        <div class="flexing">
            <div class="left">
                <input type="text" name="name" id="" placeholder="FIRST NAME" value="<?php echo $fetch_user['name'] ?>" required  />
                <input type="text" name="email" id="" placeholder="LAST NAME" required value="<?php echo $fetch_user['email'] ?>"/>
                <input type="text" name="username" id="" placeholder="USERNAME" required value="<?php echo $fetch_user['username'] ?>"/>    
                <input type="text" name="contact" id="" placeholder="CONTACT NUMBER" required value="<?php echo $fetch_user['contact'] ?>"/>
            </div>
            <div class="right">
                <input type="text" name="password" id="" placeholder="PASSWORD" required  />
                <input type="text" name="cpassword" id="" placeholder="CONFIRM PASSWORD" required  />
                <textarea name="address" id="" cols="30" rows="3" placeholder="ADDRESS" required  ><?php echo $fetch_user['address'] ?></textarea>
            </div>
        </div>

        

        <div class="savebutton container">
        <?php
        if(isset($message)){
            foreach ($message as $message) {
            echo'
                <div class="edit-profile-error container">
                <span>* </span>'.$message.'
                </div>
            ';
            }
        }
        ?>
           <div class="text-center">
            <button name="update" type="submit"  class="btn w-25 text-center ">SAVE CHANGES</button>
           </div>
        </div>
        </form>
        <?php 
            }
        }
        ?>
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