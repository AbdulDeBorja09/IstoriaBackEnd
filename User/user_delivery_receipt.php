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
                    $address = explode('|', $fetch_orders["info"]);

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
                        <h4><?php echo $fetch_orders['payment'] ?></h4>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="heading">
                    <h1>DELIVERY</h1>
                </div>
                <div class="main">
                    <div class="row">
                        <input type="text" placeholder="<?php echo $fname ?>" disabled />
                        <input type="text" placeholder="<?php echo $lname ?>" disabled />
                    </div>
                    <div class="row">
                        <input type="number"  placeholder="<?php echo $fetch_orders['reference'] ?>" disabled />
                        <input type="number"  placeholder="<?php echo $fetch_orders['contact'] ?>" disabled />
                    </div>
                    <div class="row">
                        <input type="text" placeholder="<?php echo $address[0]?>" disabled />
                        <input type="text" name="" id="" placeholder="<?php echo $address[1]?>" disabled />
                        <textarea name="" id="" cols="30" rows="15" placeholder="<?php echo $fetch_orders['note'] ?>" disabled></textarea>
                    </div>
                    <div style="padding: 22px"></div>
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
                            <h2>YOUR ORDER IS READY</h2>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="status">
                            <h1>ORDER STATUS:</h1>
                            <img src="../assets/Images/complete.png" />
                            <h2>YOUR ORDER IS COMPLETED</h2>
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