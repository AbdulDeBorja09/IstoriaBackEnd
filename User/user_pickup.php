<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Manila');
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    $addons_data = isset($_SESSION['addons_data']) ? unserialize($_SESSION['addons_data']) : array();

    if(isset($_POST['order'])){
        $name = mysqli_real_escape_string($conn, $_POST['lname'].' '.$_POST['fname']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $info= mysqli_real_escape_string($conn, $_POST['date'].' | '.$_POST['time']);
        $total = mysqli_real_escape_string($conn, $_POST['total']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment'].' '.$_POST['gcashnumber']);
        $note = mysqli_real_escape_string($conn, $_POST['note']);
        $transaction = mysqli_real_escape_string($conn, $_POST['transaction']);
        $user_id = $_SESSION['user_id']; 
        $date = date('h:iA m-d-y ');
        $uuid = substr(uniqid(), 5);
        $timestamp = substr(time(), -4);
        $reference_number = 'Istoria'.$timestamp . $uuid; 

        $tray_query = mysqli_query($conn, "SELECT * FROM `tray` WHERE user_id = '$user_id'") or die ('query failed');
        if(mysqli_num_rows($tray_query)>0){
            while($tray_item=mysqli_fetch_assoc($tray_query)){
                $products[] = $tray_item['quantity'].' '.$tray_item['name'];
                $size[] = $tray_item['size'];
                $type[] = $tray_item['type'];
                $addons[] = $tray_item['addons'].' | ' ;

            }
        }
        $reference = 
        $total_products = implode(', ', $products);
        $total_sizes = implode(', ', $size);
        $total_types = implode(', ', $type);
        $total_addons = implode(',  ', $addons);
        mysqli_query($conn, "INSERT INTO `orders` 
        (`user_id`, `name`, `product`, `size`, `type`, `addons`, `info`, `contact`, `note`, `payment`, `total`, `date`,  `transaction`, `reference`) 
        VALUES 
        ('$user_id', '$name', '$total_products', '$total_sizes', '$total_types', '$total_addons', '$info', '$contact', '$note', '$payment', '$total', '$date', '$transaction', '$reference_number')
        ");
        mysqli_query($conn, "DELETE FROM `tray` WHERE user_id = '$user_id'");
        $message[] = 'order placed successfully';
        header('location:user_pickup_receipt.php?ref=' . $reference_number);
    

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
    <title>Check Out</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form method="post">
    <div class="checkout-divider">
        <div class="checkout-div1">
            <h1>CHECK OUT</h1>
            <div class="inner">
                <h4>CONTACT</h4>
                <input type="hidden" name="transaction" value="pickup">
                <input name="contact" type="number" placeholder="CONTACT NUMBER"  required/>
                <div style="padding: 15px"></div>
                <h2>PICKUP</h2>
                <div class="name">
                    <input name="fname" type="text"  placeholder="FIRST NAME" required/>
                    <input name="lname" type="text"  placeholder="LAST NAME" required/>
                </div>
                <div class="name">
                    <input name="time" type="time" id="pickupTime"/>
                    <input name="date" type="date" id="pickupDate"/>
                </div>
                <textarea name="note" id="" cols="30" rows="5" placeholder="NOTE TO THE BARISTA:" ></textarea>
            </div>
            <h3>PAY WITH:</h3>
            <div class="payment">
                <input type="radio" class="btn-check" name="payment" id="gcash" value="gcash" autocomplete="off"  />
                <label class="btn" for="gcash">G-CASH</label>

                <input type="radio" class="btn-check" name="payment" id="cash" value="cash" autocomplete="off" checked/>
                <label class="btn" for="cash">CASH</label>
            </div>
            <input name="gcashnumber" class="gcash" type="number" placeholder="G-CASH NUMBER" />
        </div>

        <div class="checkout-div2">
            <div class="return">
                <a href="user_tray.php">RETURN TO TRAY</a>
            </div>
            <div class="checkout-products">
                <div class="inner">
                <?php 
                $total = 0;
                $delivery_fee = 60;
                $grand_total = 0;
                $select_tray = mysqli_query($conn, "SELECT * FROM `tray` WHERE user_id = '$user_id'") or die ('query failed');
                if(mysqli_num_rows($select_tray)>0){
                    $index = 0;
                    while($fetch_tray = mysqli_fetch_assoc($select_tray)){
                    $index++;
                ?>
                    <div class="products">
                        <div class="counter">
                            <h6><?php echo $fetch_tray['quantity'] ?></h6>
                        </div>
                        <div class="col1">
                            <img src="../products/5.png" alt="coffee" />
                            <div class="details">
                                <input type="hidden" name="pname[]" value="<?php echo $fetch_tray['name'] ?>">
                                <input type="hidden" name="size[]" value="<?php echo $fetch_tray['size'] ?>">
                                <input type="hidden" name="type[]" value="<?php echo $fetch_tray['type'] ?>">
                                <input type="hidden" name="addons[]" value="<?php echo implode(', ', json_decode($fetch_tray['addons'], true)); ?>">
                                <h2><?php echo $fetch_tray['name'] ?></h2>
                                <h3><?php echo $fetch_tray['type'] ?></h3>
                                <h3>SIZE: <?php echo $fetch_tray['size'] ?></h3>
                                <h4><?php echo implode(', ', json_decode($fetch_tray['addons'], true)); ?></h4>
                                <h5>PRICE: ₱ <?php echo $total_amt = ($fetch_tray['price']*$fetch_tray['quantity']) ?>.00</h5>
                            </div>
                        </div>
                    </div>
                    <?php   
                    $grand_total += $total_amt;
                        }
                    }else{
                        echo '
                        <div class="container text-center" style="padding: 100px;">
                            <h1>No Product In Your Cart</h1>
                        </div>
                        ';  
                    }
                    ?>

                </div>
                <div class="outer-div">
                    <div class="sub">
                        <h1>SUBTOTAL</h1>
                        <h1><b>₱ <?php echo $grand_total ?>.00</b></h1>
                        <input name="total" type="hidden" value="<?php echo $grand_total ?>">
                    </div>
                    <div class="del" style="padding: 10px;">
                    </div>
                    <div class="button">
                        <?php if ($grand_total == 0): ?>
                            <button name="order" type="submit" class="checkoutbutton" disabled>PLACE ORDER</button>
                        <?php else: ?>
                            <button name="order" type="submit" class="checkoutbutton">PLACE ORDER</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php include 'footer.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        function updateMinimumDate() {
            console.log("Updating minimum date...");
            var now = new Date();
            var selectedDate = new Date($('#pickupDate').val());
            var selectedTime = $('#pickupTime').val();
            var selectedHour = parseInt(selectedTime.split(':')[0]);
            var selectedMinute = parseInt(selectedTime.split(':')[1]);
            var selectedTimeInMinutes = selectedHour * 60 + selectedMinute;
            if (selectedDate.toDateString() === now.toDateString() && selectedTimeInMinutes < now.getHours() * 60 + now.getMinutes()) {
                now.setDate(now.getDate() + 1);
            }
            $('#pickupDate').prop('min', now.toISOString().split('T')[0]);
        }
        function handlePaymentSelection() {
            var gcashInput = $('.gcash');
            var gcashRadio = $('#gcash');
            var cashRadio = $('#cash');

            if (gcashRadio.is(':checked')) {
                gcashInput.prop('required', true);
                gcashInput.prop('readonly', false);
            } else {
                gcashInput.prop('required', false);
                gcashInput.prop('readonly', true);
                gcashInput.val('');
            }
        }
        updateMinimumDate();
        $('#pickupTime').on('change', updateMinimumDate);
        $('.btn-check[name="payment"]').on('change', handlePaymentSelection);
    });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>