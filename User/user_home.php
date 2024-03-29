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
    $average_stars = str_repeat('<ion-icon name="star"></ion-icon>&nbsp;', $average_rating);
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
    <section class="home_banner">
        <div class="flex">
            <div class="upper">
                <h1>WELCOME TO ISTORIA COFFEE</h1>
                <p>
                    where every cup tells a story. Nestled in the heart of downtown, our
                    cozy coffee shop offers a warm ambiance, aromatic brews, and
                    artisanal pastries. From the rich, velvety notes of our signature
                    espresso to the comforting embrace of a frothy latte, each sip is
                    crafted with passion and precision.
                </p>
                <a href="user_about.php" class="btn">LEARN MORE</a>
            </div>
            <div class="lower">
                <p>
                    Whether you're seeking a quick caffeine fix or a serene space to
                    unwind, istoria coffee shop invites you to savor the moment, one cup
                    at a time.
                </p>
            </div>
        </div>
        <img src="../assets/Images/banner.png" width="100%" />
    </section>

    <section class="products">
        <h1>HAVE A GLIMPSE OF OUR SPECIALS</h1>
        <div style="padding: 30px"></div>
        <div class="coffe-flex container">
        <?php 
            $counter = 0;
          $select_prodcuts = mysqli_query($conn, "SELECT * FROM `products` ") or die ('query failed');
          if(mysqli_num_rows($select_prodcuts)>0){
              while($fetch_products = mysqli_fetch_assoc($select_prodcuts)){
                $counter++;
          ?>
            <div class="box">
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                    <br />
                    <a class="viewpagelink" href="user_viewpage.php?pid=<?php echo $fetch_products['id']; ?>">
                        <input name="product_id" type="hidden" value="<?php echo $fetch_products['id']; ?>">
                        <img src="../assets/products/<?php echo $fetch_products['image']; ?>" alt="coffee" />
                        <div class="description">
                            <h5><?php echo $fetch_products['name']; ?></h5>
                            <h6>₱ <?php echo $fetch_products['price']; ?>.00 - ₱ <?php echo $fetch_products['price_range']; ?>.00</h6>
                            <div class="product-star">
                               <?php echo $average_stars; ?>
                            </div>
                           
                        </div>
                    </a>
                </form>
            </div>
            <?php  
                if($counter >= 3) { 
                    break; 
                }
                }
              }else{
                ?>
                <div class="box">
                <img src="../assets/Images/5.png" alt="" />
                <div class="description">
                    <h5>ISTORIA PRODUCT</h5>
                    <h6>₱00.00 - ₱00.00</h6>
                    <div class="product-star">
                        <?php echo $average_stars; ?>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="../assets/Images/5.png" alt="" />
                <div class="description">
                    <h5>ISTORIA PRODUCT</h5>
                    <h6>₱00.00 - ₱00.00</h6>
                    <div class="product-star">
                        <?php echo $average_stars; ?>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="../assets/Images/5.png" alt="" />
                <div class="description">
                    <h5>ISTORIA PRODUCT</h5>
                    <h6>₱00.00 - ₱00.00</h6>
                    <div class="product-star">
                        <?php echo $average_stars; ?>
                    </div>
                </div>
            </div>

            <?php
              }
            ?>
        </div>
        <div class="viewall text-center">
            <a class="stylishbtn3" href="../User/user_products.php">VIEW ALL</a>
        </div>
    </section>
    <div class="letknow">
        <div class="row">
            <div class="col-lg-6">
                <img src="../assets/Images/letknow.png" width="970px" />
            </div>
            <div class="letusdesc col-lg-6">
                <h1>LET US KNOW!</h1>
                <p>
                    Have a question, suggestion, or just want to say hello? Get in touch
                    with us at istoria cafe! Our friendly team is here to assist you
                    with anything you need. Drop by our café located at
                    <b>Istoria Coffee Shop, Brgy. Maitim, Bay</b> or shoot us an email
                    at <b>business.istoria@gmail.com</b>. We can't wait to hear from you
                    and make your coffee experience even more delightful!
                </p>
                <div class="button">
                    <a class="stylishbtn2" href="user_contact.php">MORE DETAILS</a>
                </div>
            </div>
        </div>
    </div>

    <section class="joinus">
        <div class="row">
            <div class="letusdesc col-lg-6">
                <h1>JOIN US!</h1>
                <p>
                    Ready to join the ISTORIA COFFEE community? Sign up now to unlock
                    exclusive perks and stay up-to-date with all things coffee! Whether
                    you're a caffeine connoisseur or just starting your coffee journey,
                    our platform offers a seamless experience tailored to your
                    preferences. Simply create an account with us to gain access to
                    special promotions, personalized recommendations, and convenient
                    ordering options. Let's brew up some magic together – sign up today
                    and become part of the ISTORIA COFFEE family!
                </p>
                <div class="button">
                    <a class="stylishbtn2" href="../Login/login.php">MORE DETAILS</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="../assets/Images/join.png" width="950px" alt="join" />
            </div>
        </div>
    </section>
    <section class="curious text-center">
        <div class="container">
            <h1>CURIOUS ABOUT US</h1>
            <p>
                At ISTORIA COFFEE SHOP, our passion for coffee runs deep. Founded with
                a commitment to quality, community, and craft, we strive to create
                more than just great coffee – we aim to cultivate memorable
                experiences. From sourcing the finest beans to fostering a welcoming
                atmosphere, every aspect of our café reflects our dedication to
                excellence. At ISTORIA COFFEE SHOP, we're more than just a coffee shop
                – we're a destination where friends gather, stories unfold, and
                moments are savored. Come join us on this journey, and let's brew
                something extraordinary together.
            </p>
        </div>
        <div class="viewmore">
            <a href="user_reviews.php" class="stylishbtn"> VIEW MORE</a>
        </div>
        <div style="padding: 30px"></div>
        <img src="../assets/Images/banner2.png" width="100%" alt="banner2" />
    </section>
    <?php include 'footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../Src/Javascript/index.js"></script>
    <script src="../Src/Javascript/main.js"></script>
</body>

</html>