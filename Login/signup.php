<?php
    include '../connection.php';
    
    if(isset($_POST['create'])){
        
        $filter_name = filter_var($_POST['lname'].', ' .$_POST['fname'], FILTER_SANITIZE_STRING);
        $name = mysqli_real_escape_string($conn, $filter_name);
        
        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);
    
        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);
        $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
        $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $date = date('m-d-y');
        
        $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die ('query failed');
        if(mysqli_num_rows($select_user)>0){
          $message[] = 'Email Already Exist';
    
        }else{
          if ($password != $cpassword){
            $message[] = 'Password Does Not Match';
          }else{
            mysqli_query($conn, "INSERT INTO `user` ( `email` , `password`) 
            VALUES ('$email','$password')") or die ('query failed');
            $user_id = mysqli_insert_id($conn);

            mysqli_query($conn, "INSERT INTO `customer` ( `uid`, `name`, `username`, `email`, `address`, `created`) 
            VALUES ('$user_id', '$name', '$username', '$email','$address', '$date')") or die ('query failed');
            $message[] = 'Account Created Successfully';
          }
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
    <link rel="stylesheet" href="../Src/Styles/styles_login.css" />

    <title>Sign Up</title>
</head>

<body>
    <div class="signup">
        <div class="column1">
            <div class="brandings">
                <img src="/assets/Images/logo2.png" alt="" />
                <img src="/assets/Images/logo3.png" alt="" />
            </div>
            <div class="singupform">
                <form method="post">
                    <h1>CREATE AND ACCOUNT</h1>
                    <div class="row">
                        <div class="col-6">
                            <label for="fname">FIRST NAME</label>
                            <br />
                            <input type="text" name="fname" id="fname" required placeholder="FIRST NAME" />
                        </div>
                        <div class="col-6">
                            <label for="lname">LAST NAME</label>
                            <br />
                            <input type="text" name="lname" id="lname" required placeholder="LAST NAME" />
                        </div>
                        <div class="col-6">
                            <label for="username">USERNAME</label>
                            <br />
                            <input type="text" name="username" id="username" required placeholder="USERNAME" />
                        </div>
                        <div class="col-6">
                            <label for="email">EMAIL</label>
                            <br />
                            <input type="email" name="email" id="email" required placeholder="EMAIL" />
                        </div>
                        <div class="col-6">
                            <label for="password">PASSWORD</label>
                            <br />
                            <input type="password" name="password" id="password" required placeholder="PASSWORD" />
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i id="eyeIcon" class="fa fa-eye"></i>
                            </span>
                        </div>

                        <div class="col-6">
                            <label for="cpassword">CONFIRM PASSWORD</label>
                            <br />
                            <input type="password" name="cpassword" id="cpassword" required
                                placeholder="CONFIRM PASSWORD" />
                            <span class="toggle-password" onclick="togglePasswordVisibility2()">
                                <i id="eyeIcon2" class="fa fa-eye"></i>
                            </span>
                        </div>

                        <div class="col-12">
                            <label for="address">ADDRESS</label>
                            <br />
                            <textarea name="address" id="address" cols="30" rows="4" required
                                placeholder="ADDRESS"></textarea>
                        </div>
                        <div class="agree">
                            <input class="check" type="checkbox" name="" id="" required />
                            <label for="">
                                <p>
                                    I AGREE TO THE
                                    <a class="terms" id="terms" href="#">TERMS AND CONDITION</a>
                                    SET BY ISTORIA COFFEE SHOP 2024.
                                </p>
                            </label>
                        </div>
                        <?php
                        if(isset($message)){
                            foreach ($message as $message) {
                            echo'
                                <div class="signup-error-msg">
                                <span>* </span>'.$message.'
                                </div>
                            ';
                            }
                        }
                        ?>

                        <div class="text-center">
                            <h6 class="haveanacc">
                                ALREADY HAVE AN ACCOUNT? <a href="login.php">LOG IN</a>
                            </h6>
                            <button name="create" class="btn w-50" type="submit">
                                CREATE AN ACCOUNT
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="column2">
            <img src="../assets/Images/signup.png" width="761px" />
        </div>
    </div>

    <div id="termsmodal" class="modalterm modal">
        <div class="modal-content-term">
            <div class="closediv">
                <span class="close">&times;</span>
            </div>
            <div class="brandings">
                <img src="/assets/Images/logo2.png" alt="" />
                <img src="/assets/Images/logo3.png" alt="" />
            </div>
            <h1>TERMS AND CONDITION</h1>
            <div class="termsdiv">
                <div class="content">
                    <h6>Terms and Conditions for Istoria Coffee Shop Website</h6>
                    <p>
                        Welcome to the Istoria Coffee Shop website. Please read these
                        terms and conditions carefully before using our website.
                    </p>
                    <ul>
                        <li>
                            <b>Acceptance of Terms: </b> By accessing or using this website,
                            you agree to be bound by these terms and conditions, our Privacy
                            Policy, and any additional terms and conditions that may apply
                            to specific sections of the website or to products and services
                            available through the website.
                        </li>
                        <li>
                            <b>Use of the Website: </b>You may use this website for lawful
                            purposes only. You may not use this website in any manner that
                            could damage, disable, overburden, or impair the website or
                            interfere with any other party's use and enjoyment of the
                            website.
                        </li>
                        <li>
                            <b>Intellectual Property: </b> All content included on this
                            website, such as text, graphics, logos, images, audio clips,
                            video clips, digital downloads, data compilations, and software,
                            is the property of Istoria Coffee Shop or its content suppliers
                            and protected by copyright laws. You may not use any content
                            from this website without the express written consent of Istoria
                            Coffee Shop.
                        </li>
                        <li>
                            <b>User Accounts: </b> In order to access certain features of
                            this website or to make purchases, you may be required to create
                            a user account. You are responsible for maintaining the
                            confidentiality of your account information and for restricting
                            access to your computer or mobile device. You agree to accept
                            responsibility for all activities that occur under your account.
                        </li>
                        <li>
                            <b>Online Orders:</b>When placing an order through our website,
                            you agree to provide accurate and complete information about
                            yourself and your payment method. You also agree to comply with
                            all applicable laws and regulations regarding the purchase of
                            our products.
                        </li>
                        <li>
                            <b>Pricing and Availability: </b>All prices and availability of
                            products are subject to change without notice. Istoria Coffee
                            Shop reserves the right to limit the quantity of any product or
                            service that we offer./li>
                        </li>
                        <li>
                            <b>Links to Third-Party Websites: </b>This website may contain
                            links to third-party websites that are not owned or controlled
                            by Istoria Coffee Shop. We are not responsible for the content,
                            privacy policies, or practices of any third-party websites. The
                            inclusion of any link does not imply endorsement by Istoria
                            Coffee Shop.
                        </li>
                        <li>
                            <b>Limitation of Liability: </b>In no event shall Istoria Coffee
                            Shop, its directors, officers, employees, or agents be liable
                            for any direct, indirect, incidental, special, or consequential
                            damages arising out of or in any way connected with the use of
                            this website or the inability to use this website.
                        </li>
                        <li>
                            <b>Governing Law: </b>These terms and conditions shall be
                            governed by and construed in accordance with the laws of
                            Calauan, Laguna, without regard to its conflict of law
                            principles.
                        </li>
                        <li>
                            <b>Changes to Terms: </b>Istoria Coffee Shop reserves the right
                            to modify or amend these terms and conditions at any time
                            without prior notice. Your continued use of this website
                            following any changes constitutes acceptance of those changes.
                        </li>
                    </ul>
                    <p>
                        If you have any questions about these terms and conditions, please
                        contact us at
                        <a href="mailto:business.istoria@gmail.com " target="_blank">business.istoria@gmail.com</a>
                    </p>
                    <h5>
                        Thank you for visiting Istoria Coffee Shop website. Enjoy your
                        coffee!
                    </h5>
                </div>
            </div>
            <div class="termsbutton text-center">
                <button id="close2" href="signup.php" class="close btn w-50">CONTINUE</button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("termsmodal");
        var span = modal.querySelector(".close");
        var close = document.getElementById("close2");
        var link = document.getElementById("terms");

        link.addEventListener("click", function(event) {
            event.preventDefault();
            modal.style.display = "block";
        });

        span.addEventListener("click", function() {
            modal.style.display = "none";
        });
        close.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    });
    </script>
    <script src="../Src/Javascript/main.js"></script>
    <script src="https://kit.fontawesome.com/8a364c3095.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>