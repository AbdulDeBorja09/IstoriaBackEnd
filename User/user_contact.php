<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    if(isset($_POST['message'])){
        date_default_timezone_set('Asia/Manila');
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone =  mysqli_real_escape_string($conn, $_POST['phone']);
        $messages = mysqli_real_escape_string($conn, $_POST['messages']);
        $date = date('m-d-y');
        $time = date('h:i:sA');
        $timestamp = $date.' '.$time;

        $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND message = '$messages'") or die ('query failed');
        if(mysqli_num_rows($select_message)>0){
        echo 'message already send';
        }else{
        mysqli_query($conn, "INSERT INTO `message` (`user_id`, `sender`, `name`, `email`, `phone`, `message`, `date` ) VALUES ('$user_id', '$sender', '$name', '$email', '$phone', '$messages','$timestamp')") or die ('query failed');
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
    <title>Istoria</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="contactus">
        <h1 class="contact-gettouch">GET IN TOUCH</h1>
        <div class="contact-flex">
            <div class="contact-col1">
                <form method="post">
                    <input type="hidden" name="sender" value="user">
                    <input type="text" name="name" placeholder="NAME" required />
                    <input type="text" name="email" placeholder="EMAIL" required />
                    <input type="number" name="phone" placeholder="PHONE NUMBER" required />
                    <textarea name="messages" id="" cols="30" rows="7" placeholder="MESSAGE" required></textarea>
                    <button name="message" class="fancy" type="submit">
                        <span class="top-key"></span>
                        <span class="text">SEND A MESSAGE</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                    </button>
                </form>
            </div>
            <div class="contact-col2">
                <iframe class="maps"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d967.0769609259906!2d121.2711749!3d14.1767391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5f701ef8134d%3A0xc7c0108692658b32!2sIstoria%20Coffee!5e0!3m2!1sen!2sph!4v1707687689770!5m2!1sen!2sph"
                    width="425" height="270" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="contact-address">
                    <img src="../assets/Images/maps.png" width="30px" alt="maps" />
                    <p>
                        Istoria Coffee Shop, Brgy. Maitim, Bay, Philippines, 4033,
                        National Hwy, Manila S Road
                    </p>
                </div>
                <div class="about-follow">
                    <h1>FOLLOW US</h1>
                    <div class="contact-socmeds">
                        <a href="mailto:BUSINESS.ISTORIA@GMAIL.COM"><img src="../assets/Images/email.png" alt="email"
                                target="_blank" /></a>
                        <a href="https://www.instagram.com/istoriacoffee/" target="_blank"><img
                                src="../assets/Images/ig.png" alt="ig" /></a>
                        <a href="https://www.facebook.com/coffee.istoria" target="_blank"><img
                                src="../assets/Images/fb.png" alt="fb" /></a>
                    </div>
                </div>
            </div>
            <div class="contact-col3">
                <h1>GOT A QUESTION?</h1>
                <p>
                    We'd love to hear from you. Send us a message and we'll be in touch
                    with you as soon as possible!
                </p>
                <h1>BY EMAIL:</h1>
                <p>business.istoria@gmail.com</p>
                <h1>BY FACEBOOK:</h1>
                <p>istoria coffee</p>
                <h1>BY INSTAGRAM:</h1>
                <p>@istoriacoffee</p>
            </div>
        </div>
    </div>
    <div style="padding: 70px"></div>
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