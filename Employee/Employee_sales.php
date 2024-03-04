<?php
include '../connection.php';
session_start();
$employee_id = $_SESSION['employee_id'];

if (!isset($employee_id)){
    header('location:../login/login.php');
    exit(); 
}

if(isset($_POST['add'])){    
    date_default_timezone_set('Asia/Manila');
    $type = 'offline';
    $total = $_POST['total'];
    $reference = 'Store'.$_POST['reference'];
    $time = date('H:i:s A');
    $date = date('d-m-y');


    $select_sales = mysqli_query($conn, "SELECT * FROM `sales` WHERE reference = '$reference'") or die ('query failed');
    if(mysqli_num_rows($select_sales) > 0){
    } else {
        $sales_insert = mysqli_query($conn, "INSERT INTO `sales` (`eid`, `total`, `type`, `date`, `time`,  `reference`) 
        VALUES ('$employee_id', '$total', '$type', '$date', '$time', '$reference')") or die ('insert failed');
        if($sales_insert) {
            
        } else {

        }
    }
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `sales` WHERE id = '$delete_id'") or die ('query failed');
    header('location:Employee_sales.php');
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
        <button class="button" onclick="history.back()">
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
        </button>
          <div class="titlediv">
            <h1>SALES</h1>
          </div>
        </div>
        <div class="container-box">
            <div class="addsales">
                <form method="post">
                    <div class="flex">
                        <div class="input1">
                            <label for="ref">Reference</label><br>
                            <input type="text" name="reference" id="ref" required>
                        </div>
                        <div class="input2">
                            <label for="total">Total</label><br>
                            <input type="text" name="total" id="total" required>
                        </div>
                    </div>
                    <div class="submit">
                        <button name="add">Submit</button>
                    </div>
                </form>
            </div>
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th align="start">Reference</th>
                        <th align="start">Total</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    date_default_timezone_set('Asia/Manila');
                    $type = 'offline';
                    $date_today = date('d-m-y');
                    
                    $select_sales = mysqli_query($conn, "SELECT * FROM `sales` WHERE eid = '$employee_id' AND date = '$date_today' AND type = 'offline' ") or die ('Query failed');                    
                    if(mysqli_num_rows( $select_sales)>0){
                        while($fetch_sales = mysqli_fetch_assoc($select_sales)){
                            $count++;      
                    ?>
                    <tr>
                        <td align="center"><b><?php echo   $count ?></b></td>
                        <td><?php echo $fetch_sales['reference'] ?></td>
                        <td>₱ <?php echo $fetch_sales['total'] ?>.00</td>
                        <td align="center"><a class="bin-button" name="delete" href="Employee_sales.php?delete=<?php echo $fetch_sales['id']; ?>" class="btn delete" onclick="return confirm('Delete this product?')">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 39 7"
                        class="bin-top"
                      >
                        <line
                          stroke-width="4"
                          stroke="white"
                          y2="5"
                          x2="39"
                          y1="5"
                        ></line>
                        <line
                          stroke-width="3"
                          stroke="white"
                          y2="1.5"
                          x2="26.0357"
                          y1="1.5"
                          x1="12"
                        ></line>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 33 39"
                        class="bin-bottom"
                      >
                        <mask fill="white" id="path-1-inside-1_8_19">
                          <path
                            d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
                          ></path>
                        </mask>
                        <path
                          mask="url(#path-1-inside-1_8_19)"
                          fill="white"
                          d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                        ></path>
                        <path
                          stroke-width="4"
                          stroke="white"
                          d="M12 6L12 29"
                        ></path>
                        <path
                          stroke-width="4"
                          stroke="white"
                          d="M21 6V29"
                        ></path>
                      </svg>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 89 80"
                        class="garbage"
                      >
                        <path
                          fill="white"
                          d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"
                        ></path>
                      </svg>
                      </a></td>
                        
                    </tr>
                    <?php 
                        }
                    }else{
                        ?>
                        <tr>
                          <td colspan="4" style="padding: 150px 0px; border:0px; ">
                            <h1 style="text-align:center;">NO SALES ADDED FOR TODAY</h1>
                          </td>
                        </tr>
                        <?php  
                      }  
                    ?>
                </tbody>
            </table>
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
