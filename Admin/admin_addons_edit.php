<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  $edit_id = $_GET['edit'];
  if (!isset($_GET['edit'])) {
    header('location:../404.php'); 
    
  }

  if(isset($_POST['edit'])){
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $addons1 = mysqli_real_escape_string($conn, $_POST['addons1']);
    $addons2 = mysqli_real_escape_string($conn, $_POST['addons2']);
    $addons3 = mysqli_real_escape_string($conn, $_POST['addons3']);
    $addons4 = mysqli_real_escape_string($conn, $_POST['addons4']);
    $price1 = mysqli_real_escape_string($conn, $_POST['price1']);
    $price2 = mysqli_real_escape_string($conn, $_POST['price2']);
    $price3 = mysqli_real_escape_string($conn, $_POST['price3']);
    $price4 = mysqli_real_escape_string($conn, $_POST['price4']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
  
    $update_addons = mysqli_query($conn, "UPDATE `addons` SET 
    `id` = '$edit_id',
    `category` = '$category', 
    `addons1` = '$addons1', 
    `addons2` = '$addons2', 
    `addons3` = '$addons3',  
    `addons4` = '$addons4', 
    `price1` = '$price1', 
    `price2` = '$price2', 
    `price3` = '$price3',
    `price4` = '$price4',
    `status` = '$status'

    WHERE id = '$edit_id'") or die ('query failed'); 

    if($update_addons){
      $message[] = 'Addons updated successfully'; 
      header('location: admin_addons.php');
    } else {
      $message[] = 'Failed to update product'; 
    }
  }
  if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    mysqli_query($conn, "DELETE FROM `addons` WHERE id = '$delete_id'") or die ('query failed');
    header('location:admin_addons.php');
  }
  
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

        <div class="container-box employee-title">
          <h1>EDIT ADDONS</h1>
        </div>
        <div class="addons-edit-div container-box">
        <div class="productmenu">
                <div class="brandings">
                    <img src="../assets/Images/logo2.png" alt="" />
                    <img class="img2" src="../assets/Images/logo3.png" alt="" />
                </div>
            </div>
            <?php
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `addons` WHERE id = '$edit_id'") or die ('query failed');

            if(mysqli_num_rows($edit_query)>0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <form method="post">
            <div class="edit-modal">
                  <div class="addons-flex" style="margin-right: -20px;">
                    <div class="col1">
                      <h1>ADDONS</h1>
                      <input type="text" name="addons1" required value="<?php echo $fetch_edit['addons1'] ?>">
                      <input type="text" name="addons2" required value="<?php echo $fetch_edit['addons2'] ?>">
                      <input type="text" name="addons3" required value="<?php echo $fetch_edit['addons3'] ?>">
                      <input type="text" name="addons4" required value="<?php echo $fetch_edit['addons4'] ?>">
                    </div>
                    <div class="col2">
                      <h1>PRICE</h1>
                      <input type="text" name="price1" required value="<?php echo $fetch_edit['price1'] ?>">
                      <input type="text" name="price2" required value="<?php echo $fetch_edit['price2'] ?>">
                      <input type="text" name="price3" required value="<?php echo $fetch_edit['price3'] ?>">
                      <input type="text" name="price4" required value="<?php echo $fetch_edit['price4'] ?>">
                    </div>
                  </div>
                  <div class="editbuttonaddons">
                    <div class="status-div">
                      <select name="status" id="">
                          <option value="available" <?php echo ($fetch_edit['status'] == "available") ? "selected" : ""; ?>>Available</option>
                          <option value="unavailable" <?php echo ($fetch_edit['status'] == "unavailable") ? "selected" : ""; ?>>Unavailable</option>
                      </select>
                      <input type="text" name="category" value="<?php echo $fetch_edit['category'] ?>" readonly> 
                    </div>
                    <button class="submit" name="edit">SUBMIT EDIT</button>
                    <button class="delete" name="delete"  href="admin_addons_edit.php?delete=<?php echo $fetch_edit['id']; ?>" onclick="return confirm('Delete this product?')">DELETE</button>
                    <input type="hidden" name="delete_id" value="<?php echo $fetch_edit['id']; ?>">                  
                  </div>
            </div>
          </form>
          <?php 
                }
              }  
          }else{
            header('location:../404.php');
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
