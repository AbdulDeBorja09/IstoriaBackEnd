<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
        $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
        unlink('image/'.$fetch_delete_image['image']);
        mysqli_query($conn, "DELETE FROM `tray` WHERE id = '$delete_id'") or die ('query failed');
        header('location:user_tray.php');
    }
    if(isset($_POST['update'])){
        // Debug: Check POST data
        var_dump($_POST);
        
        $update_id = $_POST['update_id'];
        $update_value = $_POST['quantity'];
    
        $update_query = mysqli_query($conn, "UPDATE `tray` SET quantity = '$update_value' WHERE id = '$update_id'") or die('query failed'); 
        if($update_query){
            header('location:user_tray.php');
        }
    }

    $addons_data = array();
    $select_tray = mysqli_query($conn, "SELECT * FROM `tray` WHERE user_id = '$user_id'") or die ('query failed');
    if(mysqli_num_rows($select_tray) > 0){
        while($fetch_tray = mysqli_fetch_assoc($select_tray)){
            $tray_items[] = $fetch_tray;    
            $addons = explode(",", $fetch_tray['addons']);
            $addons_data[$fetch_tray['id']] = $addons;
        }
    }
    $_SESSION['addons_data'] = serialize($addons_data);

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

    <div class="tray-div">
        <div class="tray-title">
            <h1>TRAY</h1>
            <a href="user_products.php">RETURN TO SHOP</a>
        </div>
        <div class="tray-item-title">
            <div class="flexs1">
                <h5>PRODUCT</h5>
                <h5>PRICE</h5>
            </div>
            <div class="flexs2">
                <h5>QUANTITY</h5>
                <h5>TOTAL</h5>
            </div>
        </div>
        <div class="trayline"></div>
        <div class="tray-flex">
            <div class="col1">
                <div class="heading"></div>
            </div>
        </div>
        <div class="tray-innerdiv">
            <?php $grand_total = 0;
                $select_tray = mysqli_query($conn, "SELECT * FROM `tray` WHERE user_id = '$user_id'") or die ('query failed');
                if(mysqli_num_rows($select_tray)>0){
                    $index = 0;
                    while($fetch_tray = mysqli_fetch_assoc($select_tray)){
                    $index++;
            ?>
            <form method="post">
            <div class="product">
                <div class="col1">
                    <img src="../products/<?php echo $fetch_tray['image']; ?>" />
                    <div class="details">
                        <div class="text">
                            <h1><?php echo $fetch_tray['category']; ?></h1>
                            <h2><?php echo $fetch_tray['name']; ?></h2>
                            <h3>OPTION: <?php echo $fetch_tray['type']; ?></h3>
                            <h3>SIZE: <?php echo $fetch_tray['size']; ?></h3>
                            <h4><?php $addons = explode(",", $fetch_tray['addons']);
                                foreach ($addons as $addon) {
                                    $cleaned_addon = trim($addon, '[]"');
                                    echo $cleaned_addon . ", ";
                                }?>
                            </h4>
                        </div>
                        <h6>₱ <?php echo $fetch_tray['price']; ?>.00</h6>
                    </div>
                </div>
                <div class="col2">
                    <div class="inner">
                        <button class="checkbtn" type="submit" name="update"> <ion-icon name="checkmark-outline"></ion-icon><span class="tooltip">Update</span></button>
                        <div class="quantity">
                            <button class="minusBtn" data-index="<?php echo $index;?>">-</button>
                            <input type="hidden" name="update_id" value="<?php echo $fetch_tray['id']; ?>">
                            <input type="number" class="quantity-input" name="quantity" value="<?php echo $fetch_tray['quantity']; ?>" min="1" max="10"  />
                            <button class="addBtn" data-index="<?php echo $index;?>">+</button>
                            <div> 
                            </div>
                        </div>
                        <div class="tray-total-div">
                            <a class="deleteButton" href="user_tray.php?delete=<?php echo $fetch_tray['id']; ?>" onclick="return confirm('Remove this from tray?')"> 
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 50 59"
                                    class="bin"
                                >
                                    <path
                                    fill="#231f20"
                                    d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"
                                    ></path>
                                    <path
                                    fill="#231f20"
                                    d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"
                                    ></path>
                                    <path
                                    fill="#231f20"
                                    d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z"
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                    ></path>
                                    <path fill="#231f20" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                                </svg>
                                <span class="tooltip">Delete</span>
                            </a>
                            <h6 class="qty_total" data-price="<?php echo $fetch_tray['price']; ?>">₱ <?php echo $total_amt = ($fetch_tray['price']*$fetch_tray['quantity']) ?>.00</h6>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php  
                $grand_total+=$total_amt;
                }
              }else{
                echo '
                <div class="container text-center" style="padding: 100px;">
                    <h1>No Product In Your Tray</h1>
                </div>
                ';  
              }
            ?>
            
        </div>
    </div>
    <div class="lowertray">
        <div class="col1">
            <h1>ADD A NOTE TO YOUR ORDER</h1>
            <textarea name="" id="" cols="50" rows="3" placeholder="HOW CAN WE HELP YOU"></textarea>
        </div>
        <div class="col2">
            <div class="upper">
                <h1>SUBTOTAL:</h1>
                <h2 class="sub_total">₱ <?php echo $grand_total ?>.00</h2>
            </div>
            <h3>DELIVERY FEE INCLUDED AT CHECKOUT.</h3>
            <div class="lower">
            <?php if ($grand_total == 0): ?>
                <a class="stylish1 btn" disabled>DELIVERY</a>
                <a class="stylish2 btn" disabled>PICK-UP</a>
            <?php else: ?>
                <a href="user_delivery.php" class="stylish1 btn">DELIVERY</a>
                <a href="user_pickup.php" class="stylish2 btn">PICK-UP</a>
            <?php endif; ?>
            </div>
        
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
  <script>
        document.querySelectorAll('.minusBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            event.preventDefault();
            const index = this.getAttribute('data-index');
            const input = this.parentElement.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            if (quantity > 1) {
                quantity--;
                input.value = quantity;
                updateTotals();
           
                }
            });
        });
        document.querySelectorAll('.addBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            event.preventDefault();
            const index = this.getAttribute('data-index');
            const input = this.parentElement.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
                if (quantity < 10) {
                    quantity++;
                    input.value = quantity;
                    updateTotals();
                }
            });
        });

        function updateTotals() {
        let subtotal = 0;

        document.querySelectorAll('.product').forEach(product => {
        const price = parseFloat(product.querySelector('h6.qty_total').getAttribute('data-price'));
        const quantity = parseInt(product.querySelector('.quantity-input').value);

        const total = price * quantity;
        product.querySelector('h6.qty_total').innerText = "₱ " + total.toFixed(2);
        subtotal += total;
    });
    document.querySelector('.sub_total').innerText = "₱ " + subtotal.toFixed(2);
    }

</script>


    <script src="../Src/Javascript/main.js"></script>
</body>
</html>