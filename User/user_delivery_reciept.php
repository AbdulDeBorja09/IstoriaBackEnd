<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Thank You!</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="reciept">
        <div class="reciept-title">
            <h1>GOT YOUR ORDER!</h1>
        </div>
        <div class="return">
            <a href="user_profile.php">RETURN TO SHOP</a>
        </div>

        <div class="maindiv">
            <div class="col1">
                <div class="box">
                    <div class="images">
                        <img class="img1" src="../assets/Images/logo2.png" alt="" />
                        <img class="img2" src="../assets/Images/logo3.png" alt="" />
                        <img src="" alt="" />
                    </div>

                    <div class="date">
                        <h5>02/22/24</h5>
                        <h6>4:00PM</h6>
                    </div>
                    <div class="details">
                        <h1>COFFEE</h1>
                        <h2>1 CAPUCCINO</h2>
                    </div>

                    <div class="total">
                        <div class="sub">
                            <h1>SUBTOTAL</h1>
                            <h2>104.00</h2>
                        </div>
                        <h3>PAID WITH</h3>
                        <h4>CASH</h4>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="heading">
                    <h1>DELIVERY</h1>
                </div>
                <div class="main">
                    <div class="row">
                        <input type="text" name="" id="" placeholder="Juan" disabled />
                        <input type="text" name="" id="" placeholder="Dela Cruz" disabled />
                    </div>
                    <div class="row2">
                        <input type="number" name="" id="" placeholder="REFERENCE NUMBER" disabled />
                    </div>
                    <div class="row">
                        <input type="text" name="" id="" placeholder="02/22/24" disabled />
                        <input type="text" name="" id="" placeholder="4:00PM" disabled />
                        <textarea name="" id="" cols="30" rows="15" placeholder="NOTE TO THE RIDER:"></textarea>
                    </div>
                    <div style="padding: 22px"></div>
                    <div class="status">
                        <h1>ORDER STATUS:</h1>
                        <img src="../assets/Images/prep.png" />
                        <h2>PREPARING YOUR ORDER</h2>
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