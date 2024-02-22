<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    
    if (isset($_POST['add_to_tray'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_type = $_POST['product_type'];
        $product_size = $_POST['product_size'];
        $product_image = $_POST['product_image' ];
        $product_quantity = $_POST['product_quantity'];
        
        $selected_addons = [];
        $total_price = 0; 
    
    
        if (isset($_POST['addons']) && is_array($_POST['addons'])) {
            foreach ($_POST['addons'] as $addon_name => $addon_price) {
                
                $selected_addons[] = $addon_name;
                $total_price += $addon_price;
            }
        }
        if ($product_size == '22 oz') {
            $total_price += 20;
        }
        if ($product_type == 'iced') {
            $total_price += 10;
        }
       
        $total_price += $product_price;
        $tray_num = mysqli_query($conn, "SELECT * FROM `tray` 
        WHERE size = '$product_size'
        AND name = '$product_name' 
        AND type = '$product_type' 
        AND user_id = '$user_id'
        AND addons = '$selected_addons' ") or die ('query failed');
  
        if(mysqli_num_rows($tray_num)>0){
          $message[] = 'Product Already exist in tray';
        }else{
            mysqli_query($conn, "INSERT INTO `tray` (`name`, `category`, `price`, `quantity`, `type`, `size`,`addons`,`image`, `user_id`, `pid`) 
            VALUES ('$product_name', '$product_category', '$total_price', '$product_quantity', '$product_type', '$product_size','" . mysqli_real_escape_string($conn, json_encode($selected_addons)) . "', '$product_image' , '$user_id', '$product_id')");
          $message[] = 'Product successfuly added in your cart';
        }
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
    <?php 
          if(isset($_GET['pid'])){
              $pid = $_GET['pid'];
              $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die ('query failed');

              if(mysqli_num_rows($select_products)>0){
                  while($fetch_products = mysqli_fetch_assoc($select_products)){
          ?>
    <div class="viewpage-title container">
        <h1 class="viewpage-title-coffe"><?php echo $fetch_products['category']; ?></h1>
        <div class="subnav-global">
            <button class="btn">
                <ion-icon name="chevron-back-circle" onclick="history.back()"></ion-icon>
            </button>
        </div>
        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>">
            <div class="viewpagediv row">
                <div class="col-lg-6">
                    <img class="modal-coffee-img" src="../products/<?php echo $fetch_products['image']; ?>"
                        alt="coffee" />
                </div>
                <div class="view-div-2 col-lg-6">
                    <h1><?php echo $fetch_products['name']; ?></h1>
                    <div class="star">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <h5 class="product_price">₱<?php echo $fetch_products['price']; ?>.00</h5>
                    <h6>CHOICES</h6>
                    <input type="radio" class="btn-check" name="product_type" id="option5" autocomplete="off" checked value="hot"/>
                    <label class="radiolabel btn" for="option5" >HOT</label>

                    <input type="radio" class="btn-check" name="product_type" id="option6" autocomplete="off" value="iced"/>
                    <label class="btn" for="option6">ICED</label>
                    <h6>SIZE</h6>
                    <input type="radio" class="btn-check" name="product_size" id="small" autocomplete="off" checked  value="16 oz"/>
                    <label class="btn" for="small">16 OZ</label>

                    <input type="radio" class="btn-check" name="product_size" id="large" autocomplete="off" value="22 oz"/>
                    <label class="btn" for="large">22 OZ</label>
                    <h6>ADD ONS</h6>
                    <table class="viewaddonts-table w-50" style="background-color: #f6f3f1">
                
                        <tbody>
                            <?php 
                            $addons_category = $fetch_products['category'];
                             $select_addons = mysqli_query($conn, "SELECT * FROM `addons` WHERE category = '$addons_category'") or die ('query failed');
                             if(mysqli_num_rows($select_addons)>0){
                                while($fetch_addons = mysqli_fetch_assoc($select_addons)){
                             ?>
                            <tr>
                                <td>
                                    <input name="addons[<?php echo $fetch_addons['addons1']; ?>]" type="checkbox" class="btn-check" id="addons1" autocomplete="off" data-price="<?php echo $fetch_addons['price1']; ?>" value="<?php echo $fetch_addons['price1']; ?>" />
                                    <label class="btn" for="addons1"><?php echo $fetch_addons['addons1']; ?></label>
                                </td>
                                <td>
                                    <h5><?php echo $fetch_addons['price1']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="addons[<?php echo $fetch_addons['addons2']; ?>]" type="checkbox" class="btn-check" id="addons2" autocomplete="off"  data-price="<?php echo $fetch_addons['price2']; ?>" value="<?php echo $fetch_addons['price2']; ?>"/>
                                    <label class="btn" for="addons2"><?php echo $fetch_addons['addons2']; ?></label>
                                </td>
                                <td>
                                    <h5><?php echo $fetch_addons['price2']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="addons[<?php echo $fetch_addons['addons3']; ?>]" type="checkbox" class="btn-check" id="addons3" autocomplete="off" data-price="<?php echo $fetch_addons['price3']; ?>" value="<?php echo $fetch_addons['price3']; ?>"/>
                                    <label class="btn" for="addons3"><?php echo $fetch_addons['addons3']; ?></label>
                                </td>
                                <td>
                                    <h5><?php echo $fetch_addons['price3']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="addons[<?php echo $fetch_addons['addons4']; ?>]" type="checkbox" class="btn-check" id="addons4" autocomplete="off" data-price="<?php echo $fetch_addons['price4']; ?>" value="<?php echo $fetch_addons['price4']; ?>"/>
                                    <label class="btn" for="addons4"><?php echo $fetch_addons['addons4']; ?></label>
                                </td>
                                <td>
                                    <h5><?php echo $fetch_addons['price4']; ?></h5>
                                </td>
                            </tr>
                            <?php 
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <div class="quantity">
                        <button id="minusBtn">-</button>
                        <input name="product_quantity" type="number" id="quantityInput" class="quantity-input" value="1" min="1" max="10"
                             />
                        <button id="addBtn">+</button>
                    </div>
                    <div class="viewbtn">
                        <button name="add_to_tray" class="add-to-traybtn w-100 btn">ADD TO TRAY</button>
                        <a href="user_tray.php " class="view btn w-100">VIEW TRAY</a>
                    </div>
                    <?php
                    if(isset($message)){
                      foreach ($message as $message) {
                      echo'
                          
                        ';
                      }
                    }
                ?>
                </div>
            </div>
        </form>
        <?php
                        }
                    }
                }
            ?>
    </div>
    <div style="padding: 50px"></div>
    <hr />
    <div class="review container">
        <h1>CUSTOMER REVIEWS</h1>
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
        <div class="reviewsrcollbox">
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
                                            echo '<div class="userreviewstardiv">
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
    </div>
    <script>
    const minusBtn = document.getElementById("minusBtn");
    const addBtn = document.getElementById("addBtn");
    const quantityInput = document.getElementById("quantityInput");

    minusBtn.addEventListener("click", () => {
        event.preventDefault();
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > parseInt(quantityInput.min)) {
            quantityInput.value = currentQuantity - 1;
        }
    });

    addBtn.addEventListener("click", (event) => {
        event.preventDefault(); 
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity < parseInt(quantityInput.max)) {
            quantityInput.value = currentQuantity + 1;
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const totalPriceInput = document.getElementById('total_price');

    let totalPrice = parseFloat(totalPriceInput.value) || 0;
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const addonPrice = parseFloat(this.dataset.price);
            if (this.checked) {
                totalPrice += addonPrice;
            } else {
                totalPrice -= addonPrice;
            }
            totalPriceInput.value = totalPrice.toFixed(2);
            });
        });
    });

    </script>


    <div style="padding: 50px"></div>
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