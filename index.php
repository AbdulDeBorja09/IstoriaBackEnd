<?php 
  include 'connection.php';
  session_start();

  if(isset($_COOKIE['user_id'])) {
    
    header("Location:user/user_home.php");
    exit();
}

    function generateToken() {
        return bin2hex(random_bytes(32));
    }
    if(isset($_POST['login'])){
    
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die ('query failed');
    if(mysqli_num_rows($select_user)>0){
      $row = mysqli_fetch_assoc($select_user);
      if($row['type'] == 'admin') {
        $_SESSION['admin_name'] = $row['name'];
        $id = $_SESSION['id'];
        sleep(1);
        header('location:Admin/admin_home.php');
        
      }else if($row['type'] == 'user') {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_id'] = $row['id'];
        sleep(1);
        header('location:User/user_home.php');
        
      }else if($row['type'] == 'employee') {
        $_SESSION['employee_name'] = $row['name'];
        $_SESSION['employee_id'] = $row['id'];
        sleep(1);
        header('location:employee/employee_home.php');
      }
      if(isset($_POST['remember'])) {
        $token = generateToken();
        setcookie('IstoriaCookie', $token, time() + (86400 * 30), "/"); 
      }
    }
    else{
      header('location:Admin/admin_home.php');  
    }


  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="Src/Styles/style_user.css" />
    <title>Istoria</title>
</head>

<body>
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <div>
                <a href="#" class="navbarand">
                    <img src="assets/Images/logo2.png" width="50px" alt="logo2" />
                </a>
                <button class="btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <img src="assets/Images/menu.png" width="50px" alt="menu" />
                </button>
            </div>
            <img src="assets/Images/logo3.png" width="80px" class="istoria" alt="logo3" />
            <div class="navprofile">
                <a class="open-modal" href="#">
                    <ion-icon name="person"></ion-icon>
                </a>
                <a class="open-modal" href="#">
                    <ion-icon name="file-tray"></ion-icon>
                </a>
            </div>
        </div>
    </nav>

    <div class="fixed-top" id="navbarToggleExternalContent" style="margin-top: 110px">
        <div class="navigations text-center">
            <ul>
                <li><a class="open-modal" href="#">PRODUCTS</a></li>
                <li><a class="open-modal" href="#">CONTACT US</a></li>
                <li><a class="open-modal" href="#">ABOUT US</a></li>
                <li><a class="open-modal" href="#">ALBUM</a></li>
                <li>
                    <a class="open-modal" href="Login/signup.php">JOIN US </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <img src="assets/Images/email.png" class="side-icon" alt="email" />
        <img src="assets/Images/ig.png" class="side-icon" alt="ig" />
        <img src="assets/Images/fb.png" class="side-icon" alt="fb" />
        <p class="side-text">ISTORIA COFFEE</p>
    </div>
    <section class="home_banner">
        <div class="flex">
            <div class="upper">
                <h1>WELCOME TO ISTORIA COFFEE</h1>
                <p>
                    where every cup tells a story. Nestled in the heart of downtown, our
                    cozy coffee shop offers a warm ambiance, aromatic brews, and
                    artisanal pastries. From the rich, velvety notes of our signature
                    espresso to the comforting embrace of a frothy latte, each sip is
                    crafted with passion and precision.
                </p>
                <a href="#" class="open-modal btn">LEARN MORE</a>
            </div>
            <div class="lower">
                <p>
                    Whether you're seeking a quick caffeine fix or a serene space to
                    unwind, istoria coffee shop invites you to savor the moment, one cup
                    at a time.
                </p>
            </div>
        </div>
        <img src="assets/Images/banner.png" width="100%" alt="banner" />
    </section>

    <section class="products">
        <h1>HAVE A GLIMPSE OF OUR SPECIALS</h1>
        <div style="padding: 30px"></div>
        <div class="coffe-flex">
            <div class="box">
                <img src="assets/Images/5.png" alt="coffee" />
                <div class="description">
                    <h5>AMERICANO</h5>
                    <h6>₱69.00 - ₱79.00</h6>
                    <div class="star">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/Images/5.png" alt="coffee" />
                <div class="description">
                    <h5>AMERICANO</h5>
                    <h6>₱69.00 - ₱79.00</h6>
                    <div class="star">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="assets/Images/5.png" alt="coffee" />
                <div class="description">
                    <h5>AMERICANO</h5>
                    <h6>₱69.00 - ₱79.00</h6>
                    <div class="star">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
        <div class="viewall text-center">
            <a class="open-modal stylishbtn3" href="#">VIEW ALL</a>
        </div>
    </section>
    <div class="letknow">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/Images/letknow.png" width="970px" alt="letknow" />
            </div>
            <div class="letusdesc col-lg-6">
                <h1>LET US KNOW!</h1>
                <p>
                    Have a question, suggestion, or just want to say hello? Get in touch
                    with us at istoria cafe! Our friendly team is here to assist you
                    with anything you need. Drop by our café located at
                    <b>Istoria Coffee Shop, Brgy. Maitim, Bay</b> or shoot us an email
                    at <b>business.istoria@gmail.com</b>. We can't wait to hear from you
                    and make your coffee experience even more delightful!
                </p>
                <div class="button">
                    <a class="open-modal stylishbtn2" href="#">MORE DETAILS</a>
                </div>
            </div>
        </div>
    </div>

    <section class="joinus">
        <div class="row">
            <div class="letusdesc col-lg-6">
                <h1>JOIN US!</h1>
                <p>
                    Ready to join the ISTORIA COFFEE community? Sign up now to unlock
                    exclusive perks and stay up-to-date with all things coffee! Whether
                    you're a caffeine connoisseur or just starting your coffee journey,
                    our platform offers a seamless experience tailored to your
                    preferences. Simply create an account with us to gain access to
                    special promotions, personalized recommendations, and convenient
                    ordering options. Let's brew up some magic together – sign up today
                    and become part of the ISTORIA COFFEE family!
                </p>
                <div class="button">
                    <a class="open-modal stylishbtn2" href="#">MORE DETAILS</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/Images/join.png" width="950px" alt="join" />
            </div>
        </div>
    </section>
    <section class="curious text-center">
        <div class="container">
            <h1>CURIOUS ABOUT US</h1>
            <p>
                At ISTORIA COFFEE SHOP, our passion for coffee runs deep. Founded with
                a commitment to quality, community, and craft, we strive to create
                more than just great coffee – we aim to cultivate memorable
                experiences. From sourcing the finest beans to fostering a welcoming
                atmosphere, every aspect of our café reflects our dedication to
                excellence. At ISTORIA COFFEE SHOP, we're more than just a coffee shop
                – we're a destination where friends gather, stories unfold, and
                moments are savored. Come join us on this journey, and let's brew
                something extraordinary together.
            </p>
        </div>
        <div class="viewmore">
            <a href="#" class="open-modal stylishbtn"> VIEW MORE</a>
        </div>
        <img src="assets/Images/banner2.png" width="100%" alt="banner2" />
    </section>
    <footer>
        <div class="footer">
            <div class="colm1">
                <h4>ISTORIA COFFEE SHOP</h4>
                <h5><a href="#myModal" class="open-modal">CONTACT US</a></h5>
                <h5><a href="#" class="open-modal">ABOUT US</a></h5>

                <h6>
                    © 2024, istoria coffee shop. All rights reserved. <br />Perfectly
                    Crafted For Your Ideal Cup of Coffee
                </h6>
            </div>
            <div class="colm2">
                <h5>STAY IN THE LOOP</h5>
                <h6>STAY IN TOUCH THROUGH</h6>
                <div class="socmeds">
                    <a href="mailto:BUSINESS.ISTORIA@GMAIL.COM"><img src="assets/Images/email.png" alt="email"
                            target="_blank" /></a>
                    <a href="https://www.instagram.com/istoriacoffee/" target="_blank"><img src="assets/Images/ig.png"
                            alt="ig" /></a>
                    <a href="https://www.facebook.com/coffee.istoria" target="_blank"><img src="assets/Images/fb.png"
                            alt="fb" /></a>
                </div>
            </div>
        </div>
    </footer>
    <div id="myModal" class="modals modal">
        <div class="modal-contents">
            <div class="closediv">
                <span class="close">&times;</span>
            </div>
            <div class="loginform">
                <div class="column1">
                    <img src="assets/Images/login.png" width="76%" alt="login" />
                </div>
                <div class="column2">
                    <div class="brandings">
                        <img src="assets/Images/logo2.png" alt="" />
                        <img class="img2" src="assets/Images/logo3.png" alt="logo3" />
                    </div>
                    <div class="loginbox">
                        <form method="post">
                            <h1>LOG IN</h1>
                            <input name="email" type="text" required placeholder="EMAIL" />
                            <input name="password" class="password" type="password" id="password" required
                                placeholder="PASSWORD" /><span class="toggle-password"
                                onclick="togglePasswordVisibility()">
                                <i id="eyeIcon2" class="fa fa-eye"></i>
                            </span>
                            <div class="agree">
                                <input class="check" type="checkbox" name="remember" id="agree" />
                                <label>
                                    <p>REMEMBER ME</p>
                                </label>
                            </div>

                            <div class="button-login">
                                <h1>
                                    DON'T HAVE AN ACCOUNT?
                                    <a href="Login/signup.html">SIGN UP</a>
                                </h1>
                                <br />
                                <button name="login" class="btn w-100" type="submit">LOG IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/8a364c3095.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="Src/Javascript/main.js"></script>
</body>

</html>