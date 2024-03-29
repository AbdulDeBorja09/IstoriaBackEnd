<?php
  include  '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  if (!isset($_GET['edit'])) {
    header('location:../404.php');
    
  }
  
  if(isset($_POST['submit'])){
    $update_id = $_POST['update_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_price_range = mysqli_real_escape_string($conn, $_POST['price_range']);
    $product_category = mysqli_real_escape_string($conn, $_POST['category']);
    $product_status = mysqli_real_escape_string($conn, $_POST['status']);

    if(isset($_FILES['image'])) {
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../assets/products/'.$image;

      $update_product = mysqli_query($conn, "UPDATE `products` SET 
      `id` = '$update_id',
      `name` = '$product_name', 
      `price` = '$product_price', 
      `price_range` = '$product_price_range', 
      `image` = '$image', 
      `category` = '$product_category', 
      `status` = '$product_status' 
      WHERE id = '$update_id'") or die ('query failed'); 
      if ($update_product) {
        if ($image_size > 2000000) {
            $message[] = 'Image is too large';
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Product added successfully';
            header('location: admin_products.php');
        }
      }

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

        <div class="container-box">
          <h1 class="titles">EDIT PRODUCT</h1>
          
      </div>
      <div class="container-box">
        <div class="addproductsdiv">
            <div class="productmenu">
                <a onclick=history.back()><ion-icon name="caret-back-circle-outline"></ion-icon></a>
                <div class="brandings">
                    <img src="../assets/Images/logo2.png" alt="" />
                    <img class="img2" src="../assets/Images/logo3.png" alt="" />
                </div>
            </div>
            <?php
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$edit_id'") or die ('query failed');

            if(mysqli_num_rows($edit_query)>0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id']; ?>">
                <label for="name">name</label>
                <input id="name" name="name" type="text"required value="<?php echo $fetch_edit['name'];?>"/>
                <label>price</label>
                <input name="price" type="number" required value="<?php echo $fetch_edit['price'];?>"/>
                <label>Max price</label>
                <input name="price_range" type="text" required value="<?php echo $fetch_edit['price_range'];?>" />
                <label for="category">category</label>
                <select  name="category" id="category" required >
                    <option value="coffee" <?php if ($fetch_edit['category'] == 'coffee') echo 'selected'; ?>>Coffee</option>
                    <option value="latte" <?php if ($fetch_edit['category'] == 'latte') echo 'selected'; ?>>Latte</option>
                    <option value="specials" <?php if ($fetch_edit['category'] == 'special') echo 'selected'; ?>>Special</option>
                    <option value="noncoffee" <?php if ($fetch_edit['category'] == 'noncoffee') echo 'selected'; ?>>Non Coffee</option>
                </select>
                <label>Status</label>
                <select  name="status" required >
                    <option value="available" <?php if ($fetch_edit['status'] == 'available') echo 'selected'; ?>>Available</option>
                    <option value="unavailable" <?php if ($fetch_edit['status'] == 'unavailable') echo 'selected'; ?>>Unavailable</option>
                </select>
                <label for="image">image</label>
                <input  id="image" name="image" type="file" accept="image/jpg, image/png, image/webp" required value="<?php echo $fetch_edit['image'];?>" />
                <img src="../assets/products/<?php echo $fetch_edit['image'];?>" width="100px" alt="Current Image">
                <?php
                  if(isset($message)){
                    foreach ($message as $message) {
                    echo'
                        <div class="addproduct-errormsg">
                        *'.$message.'
                        </div>
                      ';
                    }
                  }
                ?>
                <div class="adproduct-submit">
                <button type="submit" name="submit" class="addsubmitbtn">SUBMIT</button>
               </div>
            </form>
            <?php
                }
                }else{
                  header('location:../404.php');
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
