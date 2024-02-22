<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
     
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    $ref = $_GET['ref'];
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
            <a href="user_profile.php">VIEW PROFILE</a>
        </div>
        <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE reference = '$ref'") or die ('query failed');
                if(mysqli_num_rows($select_orders)>0){
                  while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                    $time = strtok($fetch_orders["date"], " ");
                    $date = substr(strstr($fetch_orders["date"], " "), 1);
                    $pickup = explode('|', $fetch_orders["info"]);

                    $full_name = $fetch_orders["name"];
                    $last_space_position = strrpos($full_name, " ");
                    if ($last_space_position !== false) {
                        $fname = substr($full_name, 0, $last_space_position);
                        $lname = substr($full_name, $last_space_position + 1);
                    } else {
                        
                        $fname = $full_name;
                        $lname = "";
                    }
          ?>
        <div class="maindiv">
            <div class="col1">
                <div class="box">
                    <div class="images">
                        <img class="img1" src="../assets/Images/logo2.png" alt="" />
                        <img class="img2" src="../assets/Images/logo3.png" alt="" />
                        <img src="" alt="" />
                    </div>

                    <div class="receiptheight">
                        <div class="inner">
                            <div class="date">
                                <h5><?php echo $date ?></h5>
                                <h6><?php echo $time ?></h6>
                            </div>
                            <div class="detailss">
                                <h1><?php echo $fetch_orders['product'] ?></h1>
                                <h2>SIZES: <?php echo $fetch_orders['size'] ?></h2>
                                <h2>TYPE: <?php echo $fetch_orders['type'] ?></h2>
                                <?php
                                    $count = 0;
                                    $addons = $fetch_orders['addons'];
                                    $addons = str_replace(['[', ']'], '', $addons); 

                                    if (empty(trim($addons))) {
                                        echo "<h2>ADDONS: None</h2>";
                                    } else {
                                        $addonList = explode('|', $addons); 
                                        echo "<h2>ADDONS:</h2>";
                                        echo "<ul>";
                                        for ($i = 0; $i < count($addonList) - 1; $i++) {
                                            $count++;
                                            $addon = str_replace('"', '', $addonList[$i]);
                                            echo "<li>ITEM $count: $addon</li>";
                                        }
                                        echo "</ul>";
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="total">
                        <div class="sub">
                            <h1>SUBTOTAL</h1>
                            <h2>₱ <?php echo $fetch_orders['total'] ?>.00</h2>
                        </div>
                        <h3>PAID WITH</h3>
                        <h4>CASH</h4>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="heading">
                    <h1>PICK UP</h1>
                    <h2>YOU CAN PICK IT UP AT <?php echo $pickup[1]?></h2>
                </div>
                <div class="main">
                    <div class="row">
                        <input type="text" placeholder="<?php echo $fname ?>" disabled />
                        <input type="text" placeholder="<?php echo $fname ?>" disabled />
                    </div>
                    <div class="row">
                        <input type="number" placeholder="<?php echo $fetch_orders['reference'] ?>" disabled />
                        <input type="number" placeholder="<?php echo $fetch_orders['contact'] ?>" disabled />
                    </div>
                    <div class="row">
                        <input type="text" placeholder="<?php echo $pickup[0]?>" disabled />
                        <input type="text" placeholder="<?php echo $pickup[1]?>" disabled />
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1367.6562945205706!2d121.27078013080597!3d14.176251422419956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5f701ef8134d%3A0xc7c0108692658b32!2sIstoria%20Coffee!5e0!3m2!1sen!2sph!4v1707856498946!5m2!1sen!2sph"
                        height="200" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="address">
                        <img src="../assets/Images/maps.png" />
                        <p>
                            Istoria Coffee Shop, Brgy. Maitim, Bay, Philippines, 4033,
                            National Hwy, Manila S Road
                        </p>
                    </div>
                    <?php
                    $statuss = $fetch_orders['status'];

                    if ($statuss == 'pending') {
                        ?>
                        <div class="status">
                            <h1>ORDER STATUS:</h1>
                            <img src="../assets/Images/prep.png" />
                            <h2>PREPARING YOUR ORDER</h2>
                        </div>
                        <?php
                    } elseif ($statuss == 'ready') {
                        ?>
                        <div class="status">
                            <h1>ORDER STATUS:</h1>
                            <img src="../assets/Images/ready.png" />
                            <h2>YOUR ORDER IS READY FOR PICKUP</h2>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="status">
                            <h1>ORDER STATUS:</h1>
                            <img src="../assets/Images/complete.png" />
                            <h2>ORDER COMPLETE!</h2>
                        </div>
                        <?php
                    }                
                    ?>
                </div>
            </div>
        </div>
        <?php
                        }
                    }
                
            ?>
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