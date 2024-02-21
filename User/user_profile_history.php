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
                <h1>ABDUL DE BORJA</h1>
                <h1>09896782912</h1>
                <h1>ABDULDB09</h1>
                <h1>91231 purok 4 Dila Bay laguna</h1>
                <form method="post">
                    <button name="logout" class="logout2" >
                    LOGOUT
                    </button>
                </form>
            </div>
        </div>
        <div class="col2">
            <div class="top">
                <h1>ORDER HISTORY</h1>
                <a href="user_profile.php">RETURN TO ACCOUNT DETAILS</a>
            </div>
            <div class="history-div">
                <table class="history-table table table-borderless">
                    <thead>
                        <tr>
                            <td>PRODUCT</td>
                            <td>TIME AND DATE</td>
                            <td>PAID WITH</td>
                            <td>TRANSACTION</td>
                            <td>TOTAL</td>
                            <td>STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id' AND status = 'completed' ") or die ('query failed');
                        if(mysqli_num_rows($select_orders)>0){
                            while($fetch_orders= mysqli_fetch_assoc($select_orders)){
                            $time = strtok($fetch_orders["date"], " ");
                            $date = substr(strstr($fetch_orders["date"], " "), 1);
                            $info = explode('|', $fetch_orders["info"]);
                        ?>
                      <tr>
                            <td style="width: 30%;">
                                <h2 class="productss"><?php echo $fetch_orders['product'] ?></h2>
                                <h1>size: <?php echo $fetch_orders['size'] ?></h1>

                                <!-- <?php
                                    $count = 0;
                                    $addons = $fetch_orders['addons'];
                                    $addons = str_replace(['[', ']'], '', $addons); 

                                    if (empty(trim($addons))) {
                                        echo "<h2>ADDONS: None</h2>";
                                    } else {
                                        $addonList = explode('|', $addons); 
                                        echo "<h1>ADDONS: ";
                                        foreach ($addonList as $addon) {
                                            
                                            $addon = str_replace('"', '', $addon);
                                            echo "$addon</h1>";
                                        }
                                        echo "</ul>";
                                    }
                                    ?> -->
                                <h1>TYPE:<?php echo $fetch_orders['type'] ?> </h1>
                                <a href="user_review.php?ref=<?php echo $fetch_orders['reference'] ?>">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1><?php echo $date ?></h1>
                                <h1><?php echo $time ?></h1>
                            </td>
                            <td>
                                <h1><?php echo $fetch_orders['payment'] ?></h1>
                            </td>
                            <td class="address">
                                <h1><?php echo $fetch_orders['info'] ?></h1>
                            </td>
                            <td>
                                <h1><?php echo $fetch_orders['total'] ?>.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>
                    <?php
                        }
                    } 
                    ?>

                    </tbody>
                </table>
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