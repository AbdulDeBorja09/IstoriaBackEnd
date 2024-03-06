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
                <?php 
                }
             }?>
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
                                <?php
                                $ref = $fetch_orders['reference'];
                                $review_query = mysqli_query($conn, "SELECT * FROM `review` WHERE reference = '$ref'") or die ('query failed');
                                if(mysqli_num_rows($review_query) > 0){
                                ?>
                                <a style="cursor: default;">
                                    <span>COMPLETED</span>
                                </a>
                                <?php 
                                }else{
                                ?>
                                <a href="user_review.php?ref=<?php echo $fetch_orders['reference'] ?>">
                                    <span>TO REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                 </a>
                                <?php
                                } 
                                ?>
                                
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
                                <b><?php echo $fetch_orders['transaction'] ?></b>
                                <h1><?php echo $info[0] ?></h1>
                                <h1><?php echo $info[1] ?></h1>
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
                    }else{?>
                        <tr>
                            <td> <h1>YOU HAVEN'T ORDERD ANY PRODUCTS YET.</h1></td>
                        </tr>
     
                     <?php 
                     }
                     ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="padding: 80px;"></div>
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