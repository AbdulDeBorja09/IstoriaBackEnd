<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    $select_review = mysqli_query($conn, "SELECT * FROM `review`") or die ('query failed');
    $total_ratings = 0;
    $num_of_reviews = 0;
    
    while($fetch_review = mysqli_fetch_assoc($select_review)){
        $total_ratings += $fetch_review['rating'];
        $num_of_reviews++;
    }
    $average_rating = $num_of_reviews > 0 ? round($total_ratings / $num_of_reviews, 1) : 0;
    $average_stars = str_repeat('<ion-icon name="star"></ion-icon>', $average_rating);
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
    <div class="reviewhead text-center">
        <h1>CUSTOMER REVIEWS</h1>
    </div>
    <div class="review container">
        <div class="star-rating-container">
            <div class="overallrating">
                <div class="starstatic">
                    <?php echo $average_stars; ?>
                </div>
                <?php
                $select_review = mysqli_query($conn, "SELECT * FROM `review`") or die ('queryfailed');
                $num_of_review = mysqli_num_rows($select_review);
                ?>
                <p><?php echo $num_of_review ?> REVIEWS</p>
            </div>
            <div class="detailrating">
                <div class="guidestar">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="guidestar">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="guidestar">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="guidestar">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="guidestar">
                    <ion-icon name="star"></ion-icon>
                </div>
            </div>
        </div>
        <hr />
            <div class="scrollbox">


            <?php
                $review_query = mysqli_query($conn, "SELECT * FROM `review`") or die ('query failed');
                if(mysqli_num_rows($review_query) > 0){
                    while($fetch_review = mysqli_fetch_assoc($review_query)){
                    $user_rating = str_repeat('<ion-icon name="star"></ion-icon>', $fetch_review['rating']);
            ?>
                <div class="reivewbox">
                    <div class="reviewtop">
                        <img src="../assets/Images/profile2.png" width="50px" alt="profile2" />
                        <div class="reviewdets">
                            <div class="reviewdetstars">
                               <div class="userreviewstardiv">
                                        <?php 
                                        if ($user_rating > 0) {
                                            echo '<div class="userreviewstardiv">' . $user_rating . '</div>';
                                        } else {
                                            echo '<div class="nostar">
                                            <ion-icon name="star-outline"></ion-icon>
                                            <ion-icon name="star-outline"></ion-icon>
                                            <ion-icon name="star-outline"></ion-icon>
                                            <ion-icon name="star-outline"></ion-icon>
                                            <ion-icon name="star-outline"></ion-icon>
                                            </div>';
                                        }
                                        ?>
                               </div>
                                <p><?php echo $fetch_review['date']?></p>
                            </div>
                            <h6><?php echo $fetch_review['name']?></h6>
                            <h5><?php echo $fetch_review['orders']?> </h5>
                        </div>
                    </div>
                    <div class="reviewbot">
                        <p><?php echo $fetch_review['comment']?></p>
                        <hr />
                    </div>
                </div>
                <?php 
                }
            }
                ?>
            </div>
    </div>
    <div style="padding: 150px"></div>
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