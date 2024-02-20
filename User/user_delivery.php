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
    <title>Check Out</title>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="checkout-divider">
        <div class="checkout-div1">
            <h1>CHECK OUT</h1>
            <div class="inner">
                <h2>DELIVERY</h2>
                <div class="name">
                    <input type="text" placeholder="FIRST NAME" />
                    <input type="text" placeholder="LAST NAME" />
                </div>
                <input type="text" placeholder="COMPLETE ADDRESS" />
                <input type="text" placeholder="LANDMARK" />
                <input type="number" placeholder="123456789" />
                <textarea name="" id="" cols="30" rows="5" placeholder="NOTE TO THE RIDER"></textarea>
            </div>
            <h3>PAY WITH:</h3>
            <div class="payment">
                <input type="radio" class="btn-check" name="payment" id="gcash" autocomplete="off" checked />
                <label class="btn" for="gcash">G-CASH</label>

                <input type="radio" class="btn-check" name="payment" id="cash" autocomplete="off" />
                <label class="btn" for="cash">CASH</label>
            </div>
            <input class="gcash" type="number" placeholder="G-CASH NUMBER" />
        </div>

        <div class="checkout-div2">
            <div class="return">
                <a href="user_tray.php">RETURN TO TRAY</a>
            </div>
            <div class="checkout-products">
                <div class="inner">
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>

                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                    <div class="products">
                        <div class="counter">
                            <h6>0</h6>
                        </div>
                        <div class="col1">
                            <img src="../assets/Images/5.png" alt="coffee" />
                            <div class="details">
                                <h1>COFFEE</h1>
                                <h2>CAPPUCCINO</h2>
                                <h3>SIZE: 16 OZ</h3>
                                <h4>ADD ONS: ESPRESSO SHOT</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="outer-div">
                    <div class="sub">
                        <h1>SUBTOTAL</h1>
                        <h1><b>164.00</b></h1>
                    </div>
                    <div class="del">
                        <h1>DELIVERY FEE:</h1>
                        <h1>60.00</h1>
                    </div>
                    <div class="button">
                        <a href="user_delivery_reciept.php" class="checkoutbutton">PLACE ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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