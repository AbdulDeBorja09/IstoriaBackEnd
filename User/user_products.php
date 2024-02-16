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
    <title>Istoria</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="menu_title">
        <h1>MENU</h1>
    </div>
    <div class="subnav-global container">
        <button class="btn">
            <ion-icon name="chevron-back-circle" onclick="history.back()"></ion-icon>
        </button>
    </div>
    <div class="container">
        <div class="menu-flex">
            <a href="user_products_coffee.php">
                <div class="box">
                    <img src="../assets/Images/coffe.png" alt="coffee" />
                    <br />
                    <h1>COFFEE</h1>
                </div>
            </a>
            <a href="user_products_latte.php">
                <div class="box tex">
                    <img src="../assets/Images/latte.png" alt="latte" />
                    <br />
                    <h1>LATTE</h1>
                </div>
            </a>
            <a href="user_products_noncoffe.php">
                <div class="box">
                    <img src="../assets/Images/noncoffe.png" alt="noncoffee" />
                    <br />
                    <h1>NON COFFEE</h1>
                </div>
            </a>
            <a href="user_products_specials.php">
                <div class="box">
                    <img src="../assets/Images/speacial.png" alt="special" />
                    <br />
                    <h1>SPECIALS</h1>
                </div>
            </a>
        </div>
    </div>
    <div style="padding: 150px"></div>
    <?php include 'footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>