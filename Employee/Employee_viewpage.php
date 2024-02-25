<?php
  include '../connection.php';
  session_start();
  $employee_id = $_SESSION['employee_id'];

  if (!isset($employee_id)){
      header('location:../login/login.php');
  }
  $ref = $_GET['ref'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newStatus = $_POST["status"];
    $update_query = mysqli_query($conn, "UPDATE `orders` SET status = '$newStatus' WHERE reference = '$ref'");
    if ($update_query) {
        header("Location: #");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Istoria</title>
    <link rel="stylesheet" href="../Src/Styles/style_employee.css" />
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
        <div class="container-box heading-div">
        <a class="button" href="Employee_orders.php">
          <div class="button-box">
            <span class="button-elem">
              <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
            <span class="button-elem">
              <svg viewBox="0 0 46 40">
                <path
                  d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                ></path>
              </svg>
            </span>
          </div>
    </a>
          <div class="titlediv">
            <h1>ORDERS</h1>
          </div>
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
                        <h5><?php echo $fetch_orders['name'] ?></h5>
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
                <div class="status">
                    <h4>STATUS</h4>
                    <div class="buttons">
                    <form id="statusForm" method="post">
                        <button type="submit" name="status" value="pending" <?php if ($status === "pending") echo "disabled"; ?>>PENDING</button>
                        <button type="submit" name="status" value="ready" <?php if ($status === "ready") echo "disabled"; ?>>READY</button>
                        <button type="submit" name="status" value="completed" <?php if ($status === "completed") echo "disabled"; ?>>COMPLETED</button>
                    </form>

                    </div>
                </div>
            </div>
            <?php 
                  }
                }
            
            ?>
        </div>
    </div>
    <!-- <script>
        // Get status from PHP variable
        var status = "<?php echo $status; ?>";

        // Get references to the buttons
        var preparingButton = document.getElementById("preparingButton");
        var readyButton = document.getElementById("readyButton");
        var completedButton = document.getElementById("completedButton");

        // Disable buttons based on status
        if (status === "preparing") {
            preparingButton.disabled = true;
            readyButton.disabled = false;
            completedButton.disabled = false;
        } else if (status === "ready") {
            preparingButton.disabled = false;
            readyButton.disabled = true;
            completedButton.disabled = false;
        } else if (status === "completed") {
            preparingButton.disabled = false;
            readyButton.disabled = false;
            completedButton.disabled = true;
        }
    </script> -->

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
