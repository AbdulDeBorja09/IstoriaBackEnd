<?php
  include  '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }

  if (isset($_POST['add'])) {
      $product_name = mysqli_real_escape_string($conn, $_POST['name']);
      $product_price = mysqli_real_escape_string($conn, $_POST['price']);
      $product_price_range = mysqli_real_escape_string($conn, $_POST['price_range']);
      $product_category = mysqli_real_escape_string($conn, $_POST['category']);
      if(isset($_FILES['image'])) {
          $image = $_FILES['image']['name'];
          $image_size = $_FILES['image']['size'];
          $image_tmp_name = $_FILES['image']['tmp_name'];
          $image_folder = '../assets/products/'.$image;
  
          $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$product_name' ") or die('query failed');
          if (mysqli_num_rows($select_product_name) > 0) {
              $message[] = 'Product name already exists';
          } else {
              $insert_product = mysqli_query($conn, "INSERT INTO `products` (`name`, `price`, `price_range`, `image`, `category`)
               VALUES ('$product_name', '$product_price', '$product_price_range', '$image',  '$product_category')") or die('query failed');
              if ($insert_product) {
                  if ($image_size > 2000000) {
                      $message[] = 'Image is too large';
                  } else {
                      move_uploaded_file($image_tmp_name, $image_folder);
                      $message[] = 'Product added successfully';
                      header('location: admin_products.php');
                  }
              }
          }
      } else {
          $message[] = 'Image not uploaded';
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
        </div>

        <div class="container-box">
          <h1 class="titles">ADD PRODUCT</h1>
          
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
            <form method="post" enctype="multipart/form-data">
                <label for="name">name</label>
                <input id="name" name="name" type="text" class="form-control" required />
                <label>price</label>
                <input name="price" type="number" class="form-control" required />
                <label>Max price</label>
                <input name="price_range" type="text" class="form-control" required />
                <label for="">category</label>
                <select class="form-control" name="category" id="" required>
                    <option value="coffee">COFFEE</option>
                    <option value="latte">LATTE</option>
                    <option value="specials">SPECIAL</option>
                    <option value="noncoffee">NON COFFEE</option>
                </select>
                <label for="image">image</label>
                <input  id="image" name="image" type="file" accept="image/jpg, image/png, image/webp" class="form-control" required />
               <div class="adproduct-submit">
                <button type="submit" name="add" class="addsubmitbtn">ADD</button>
               </div>
               <?php
                  if(isset($message)){
                    foreach ($message as $message) {
                    echo'
                        <div class="alert alert-dark" role="alert text-center p-3"  >
                        '.$message.'
                        </div>
                      ';
                    }
                  }
              ?>
            </form>
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
