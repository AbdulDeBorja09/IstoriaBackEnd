<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];

    if (!isset($employee_id)){
        header('location:../login/login.php');
    }
    if(isset($_POST["avail"]) || isset($_POST["unavail"])){
        $status = isset($_POST["avail"]) ? "available" : "unavailable";
        $pid = $_POST["pid"];
        $update_query = mysqli_prepare($conn, "UPDATE `addons` SET status = ? WHERE id = ?");
        mysqli_stmt_bind_param($update_query, "si", $status, $pid);
        mysqli_stmt_execute($update_query);
        mysqli_stmt_close($update_query);
        header('location: employee_addons.php');
        exit(); 
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
            <h1>ADDONS</h1>
          </div>
        </div>
        <div class="container-box">
            <table class="addons-table">
                <thead>
                    <tr>
                    <th>CATEGORY</th>
                    <th colspan="4">Addons</th>
                    <th>Status</th>
                    <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $select_addons = mysqli_query($conn, "SELECT * FROM `addons`  ") or die ('query failed');
                    if(mysqli_num_rows($select_addons)>0){
                        while($fetch_addons = mysqli_fetch_assoc($select_addons)){
                    ?>
                    <tr>
                    <td><?php echo $fetch_addons['category'] ?></td>
                    <td><?php echo $fetch_addons['addons1'] ?></td>
                    <td><?php echo $fetch_addons['addons2'] ?></td>
                    <td><?php echo $fetch_addons['addons3'] ?></td>
                    <td><?php echo $fetch_addons['addons4'] ?></td>
                    <td style="text-align: center; color: <?php echo ($fetch_addons['status'] == 'available') ? 'green' : 'red'; ?>"><?php echo $fetch_addons['status'] ?></td>
                    <td align="center">
                        <?php if($fetch_addons['status'] == "available"): ?>
                            <form method="post">
                            <input type="hidden" name="pid" value="<?php echo $fetch_addons['id'] ?>">
                            <input type="hidden" name="unavail" value="unavailable">
                            <button name="unavail" type="submit" class="avail" >Unavailable</button>
                            </form>
                        <?php else: ?>
                            <form method="post">
                            <input type="hidden" name="pid" value="<?php echo $fetch_addons['id'] ?>">
                            <input type="hidden" name="avail" value="available">
                            <button name="avail" type="submit" class="Unavail" >available</button>
                            </form>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php 
                        }
                    }else{
                        ?>
                        <tr>
                        <td colspan="10" style="padding: 150px 0px; border:0px;">
                            <h1 style="font-size: 30px; text-align:center;">NO ADDONS</h1>
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
