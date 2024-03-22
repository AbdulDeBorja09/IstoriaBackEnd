<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  $ref = $_GET['ref'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_admin.css" />
  </head>
  <body>
    <div class="container">
    <?php include 'sidenav.php' ?>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
          <?php include 'time.php' ?>
        </div>

        <div class="container-box title-box">
          <h1 class="orders-title">ORDERS</h1>
        </div>
        <div class="container-box">
          <h5 class="view-title">CUSTOMER DETAILS</h5>
          <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE reference = '$ref'") or die ('query failed');
                if(mysqli_num_rows($select_orders)>0){
                  while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                    $time = strtok($fetch_orders["date"], " ");
                    $date = substr(strstr($fetch_orders["date"], " "), 1);
                    $info = explode('|', $fetch_orders["info"]);
                    $status = $fetch_orders['status'];

          ?>
            <div class="order-flex1">
                <div class="box1">
                    <div class="text">
                        <h5>REFERENCE #:</h5>
                        <h5>NAME:</h5>
                        <h5>CONTACT NUMBER:</h5>
                        <?php 
                            if ($fetch_orders['transaction'] == 'pickup') {
                                echo '<h5>DATE:</h5>';
                                echo '<h5>TIME:</h5>';
                            } else {
                                echo '<h5>ADDRESS:</h5>';
                                echo '<h5>LANDMARK:</h5>';
                            }
                        ?>
                    </div>
                    <div class="text2">
                        <h5><?php echo $fetch_orders['reference'] ?></h5>
                        <h5><?php echo $fetch_orders['lname'] ?>, <?php echo $fetch_orders['fname'] ?></h5>
                        <h5><?php echo $fetch_orders['contact'] ?></h5>
                        <h5><?php echo $info [0] ?></h5>
                        <h5><?php echo $info [1] ?></h5>
                    </div>
                </div>
                <div class="box2">
                    <div class="date">
                        <h5>TIME AND DATE ORDER PLACED:</h5>
                        <h5><?php echo $fetch_orders['date'] ?></h5>
                    </div>
                    
                </div>
            </div>
            <hr>
            <div class="details-div">
                <div class="flex1">
                <?php
                    $name_str = $fetch_orders['product'];
                    $size_str  = $fetch_orders['size'];
                    $type_str  = $fetch_orders['type'];
                    $addons_str  = $fetch_orders['addons'];

                    $name = explode(", ", $name_str);
                    $size = explode(", ", $size_str);
                    $type = explode(", ", $type_str);
                    $addons = explode(", ", $addons_str);
                    $addons_temp = explode("|", $addons_str);
                    $addons = [];
                    foreach ($addons_temp as $addon) {
                        $addon = trim(str_replace(["[", "]", '"'], "", $addon));
                        $addon = preg_replace('/(?<!\[),\s*(?!\])/m', '', $addon);
                        
                        $addons[] = $addon;
                    }           
                    $num_items = count($name);

                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<th>Size</th>";
                    echo "<th>Type</th>";
                    echo "<th>Addons</th>";
                    echo "</tr>";
                    echo "</thead>";

                    for ($i = 0; $i < $num_items; $i++) {
                        echo "<tr>";
                        echo "<td>" . $name[$i] . "</td>";
                        echo "<td>" . $size[$i] . "</td>";
                        echo "<td>" . $type[$i] . "</td>";
                        echo "<td>" . $addons[$i] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
                  <div class="flex2">
                    <div class="note">
                        <?php 
                            if ($fetch_orders['transaction'] == 'pickup') {
                                echo '<h4>NOTE TO BARISTA:</h4>';
                               
                            } else {
                                echo '<h4>NOTE TO RIDER:</h4>';
                              
                            }
                        ?>
                        <p><?php echo $fetch_orders['note'] ?></p>
                    </div>
                    <div class="total">
                        <h4>TOTAL PRICE</h4>
                      <div class="bot">
                      <h3>DELIVERY FEE: ₱ 60.00</h3> 
                      <h4>₱ <?php echo $fetch_orders['total'] ?>.00</h4>
                      </div>
                  </div>
                </div>

            </div>
            <hr>
            <div class="bottomdiv">
                <div class="payment">
                    <h4>PAYMENT:</h4>
                    <h3><?php echo $fetch_orders['payment'] ?></h3>
                </div>
                <div class="transaction">
                    <h4>TRANSACTION:</h4>
                    <h3><?php echo $fetch_orders['transaction'] ?></h3>
                </div>
            </div>
            <?php 
                  }
                }
            
            ?>
        </div>


        
      </div>
    </div>
    <script src="../Src/Javascript/index.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
