<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Manila');
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    
    $ref = $_GET['ref'];
    if (!isset($_GET['ref'])) {
        header('location:../404.php');
        
      }
    if (isset($_POST['send'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $order= mysqli_real_escape_string($conn, $_POST['order']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $reference = mysqli_real_escape_string($conn, $_POST['reference']);
        $rating= mysqli_real_escape_string($conn, $_POST['rating']);
        $date = date('m-d-y');
        if(isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../assets/reviews/'.$image;
            $select_product_name = mysqli_query($conn, "SELECT name FROM `review` WHERE reference = '$reference' ") or die('query failed');
            if (mysqli_num_rows($select_product_name) > 0) {
                $message[] = "You've already review this order";
            } else {
                $insert_review = mysqli_query($conn, "INSERT INTO `review` (`user_id`, `name`, `orders`, `comment`, `image`, `rating`, `reference`, `date`)
                VALUES ('$user_id','$name', '$order', '$comment', '$image',  '$rating',  '$reference', '$date')") or die('query failed');
                header('location: user_profile_history.php');
                if ($insert_review ) {
                    if ($image_size > 2000000) {
                        $message[] = 'Image is too large';
                    } else {
                        move_uploaded_file($image_tmp_name, $image_folder);
                        $message[] = 'Product added successfully';
                        header('location: user_profile_history.php');
                    }
                }
            }
        }else{
            $select_product_name = mysqli_query($conn, "SELECT name FROM `review` WHERE reference = '$reference' ") or die('query failed');
            if (mysqli_num_rows($select_product_name) > 0) {
                $message[] = "You've already review this order";
            } else {
                $insert_review = mysqli_query($conn, "INSERT INTO `review` (`user_id`, `name`, `orders`, `comment`, `image`, `rating`, `reference`, `date`)
                VALUES ('$user_id','$name', '$order', '$comment', '$image',  '$rating',  '$reference', '$date')") or die('query failed');
                header('location: user_profile_history.php');
            }
        }
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
    <title>Review</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="review-title text-center">
        <div class="reviewback">
            <button onclick="history.back()">RETURN TO ACCOUNT DETAILS</button>
        </div>
        <h1>SEND US A REVIEW!</h1>
        <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE reference = '$ref'") or die ('query failed');
                if(mysqli_num_rows($select_orders)>0){
                  while($fetch_orders = mysqli_fetch_assoc($select_orders)){
        ?>
        <form method="post" enctype="multipart/form-data" >
            <div class="reviewform">
                <div class="text-center">
                    <input type="hidden" name="rating">
                    <input type="hidden" name="reference" value="<?php echo $fetch_orders['reference'] ?>">
                    <h2 id="rating-value">0</h2>
                </div>
                <div class="ratingsss">
                    <span class="rating-star" data-value="1">&#9733;</span>
                    <span class="rating-star" data-value="2">&#9733;</span>
                    <span class="rating-star" data-value="3">&#9733;</span>
                    <span class="rating-star" data-value="4">&#9733;</span>
                    <span class="rating-star" data-value="5">&#9733;</span>
                </div>
                <div class="forms">
                    <input type="text" name="name" id="" value="<?php echo $fetch_orders['name'] ?>" readonly/>
                    <input type="text" name="order" id="" value="<?php echo $fetch_orders['product'] ?>" readonly />
                    <textarea name="comment" id="" cols="30" rows="10" placeholder="COMMENT"></textarea>
                    <input type="file" name="image" type="file" accept="image/jpg, image/png, image/webp">
                    <button name="send" type="submit">SEND REVIEW</button>
                </div>
            </div>
        </form>
        <?php
            }
        } else{
            header('location:../404.php');
        }?>
    </div>

    <script>
    function initializeStarRating() {
        const stars = document.querySelectorAll(".rating-star");
        const ratingValue = document.getElementById("rating-value");
        const ratingInput = document.querySelector("input[name='rating']");
        let rating;

        stars.forEach((star) => {
            star.addEventListener("click", () => {
                rating = star.getAttribute("data-value");
                ratingValue.textContent = `${rating}`;
                ratingInput.value = rating;
                highlightSelectedStars(rating);
            });

            star.addEventListener("mouseover", () => {
                resetStarsColor();
                highlightSelectedStars(star.getAttribute("data-value"));
            });

            star.addEventListener("mouseout", () => {
                resetStarsColor();
                highlightSelectedStars(rating);
            });
        });

        function resetStarsColor() {
            stars.forEach((star) => {
                star.style.color = "#a6a6a6";
            });
        }

        function highlightSelectedStars(value) {
            for (let i = 0; i < value; i++) {
                stars[i].style.color = "#231f20";
            }
        }
    }
    window.addEventListener("load", initializeStarRating);
    </script>

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