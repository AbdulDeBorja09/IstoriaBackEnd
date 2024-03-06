<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    if (isset($_POST['logout'])){
      session_destroy();
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
    <div class="profile">
        <div class="col1">
            <div class="top">
                <h1>ACCOUNT DETAILS</h1>
                <a href="user_profile_edit.php"><img src="../assets/Images/editprofile.png" alt="editprofile" /></a>
            </div>
            <div class="bottom">
            <?php $select_user = mysqli_query($conn, "SELECT * FROM `customer` WHERE uid = '$user_id' ") or die ('query failed'); 
                    if(mysqli_num_rows($select_user)>0){
                        while($fetch_user = mysqli_fetch_assoc($select_user)){
                    ?>
            
                <h1><?php echo $fetch_user['name'] ?></h1>
                <h1><?php echo $fetch_user['email'] ?></h1>
                <h1><?php echo $fetch_user['username'] ?></h1>
                <h1><?php echo $fetch_user['contact'] ?></h1>
                <h1><?php echo $fetch_user['address'] ?></h1>
                <a href="user_profile_history.php">VIEW ORDER HISTORY</a>
                <br />
                <?php 
                }
            }?>
                <form method="post"><button name="logout" class="logout-button"><span> LOGOUT </span></button></form>
            </div>
        </div>
        <div class=" col2">
            <div class="top">
                <h1>ORDER STATUS</h1>
            </div>
            <div class="content">
                <div class="inner">
                    <?php 
                        $select_tray = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id' AND status != 'completed' ") or die ('query failed');
                        if(mysqli_num_rows($select_tray)>0){
                            while($fetch_tray = mysqli_fetch_assoc($select_tray)){
                        ?>
                    <div class="products">
                        <div class="div1">
                            <h5><?php echo $fetch_tray['date'] ?></h5>
                            <h2><?php echo $fetch_tray['product'] ?></h2>
                            <h3>size: <?php echo $fetch_tray['size'] ?></h3>
                            <h4><?php echo $fetch_tray['transaction'] ?></h4>
                            <h6><?php echo $fetch_tray['status'] ?></h6>
                            <a href="user"></a>
                        </div>
                            <?php
                            $transaction = $fetch_tray['transaction'];

                            if ($transaction == 'pickup') {
                                ?>
                                <div class="div2">
                                    <a href="user_pickup_receipt.php?ref=<?php echo $fetch_tray['reference'] ?>">
                                        <span class="hover-underline-animation">SEE ORDER</span>
                                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                            viewBox="0 0 46 16">
                                            <path id="Path_10" data-name="Path 10"
                                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                                transform="translate(30)"></path>
                                        </svg>
                                    </a>
                                </div>
                                <?php
                            } elseif ($transaction == 'delivery') {
                                ?>
                                 <div class="div2">
                                    <a href="user_delivery_receipt.php?ref=<?php echo $fetch_tray['reference'] ?>">
                                        <span class="hover-underline-animation">SEE ORDER</span>
                                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                            viewBox="0 0 46 16">
                                            <path id="Path_10" data-name="Path 10"
                                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                                transform="translate(30)"></path>
                                        </svg>
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                 <div class="div2">
                                    <a href="user_profile.php">
                                        <span class="hover-underline-animation">SEE ORDER</span>
                                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                            viewBox="0 0 46 16">
                                            <path id="Path_10" data-name="Path 10"
                                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                                transform="translate(30)"></path>
                                        </svg>
                                    </a>
                                </div>
                                <?php
                            }                
                            ?>
                    </div>
                    <?php 
                    }
                }else{?>
                   <div class="no-order">
                        <h1>YOU HAVEN'T PLACE ANY ORDERS YET.</h1>
                   </div>

                <?php 
                }
                ?>
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