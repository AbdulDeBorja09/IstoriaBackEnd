<?php
  include  '../connection.php';
  if(isset($_POST['submit'])){
    $update_id = $_POST['update_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_price_range = mysqli_real_escape_string($conn, $_POST['price_range']);
    $product_category = mysqli_real_escape_string($conn, $_POST['category']);
    $product_status = mysqli_real_escape_string($conn, $_POST['status']);
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder='../products/'.$image; 

    $update_product = mysqli_query($conn, "UPDATE `products` SET 
    `id` = '$update_id',
    `name` = '$product_name', 
    `price` = '$product_price', 
    `price_range` = '$product_price_range', 
    `image` = '$image', 
    `category` = '$product_category', 
    `status` = '$product_status' 
    WHERE id = '$update_id'") or die ('query failed'); 

    if($update_product){
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = 'Product updated successfully'; 
        header('location: admin_products.php');
    } else {
        $message[] = 'Failed to update product'; 
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
      <div class="navigation">
        <ul>
          <li>
            <a href="admin_home.php">
              <span class="icon">
                <img
                  class="home-brand"
                  src="../assets/Images/Favicon.png"
                  width="50px"
                />
              </span>
              <span class="brand-title">Brand Name</span>
            </a>
          </li>
          <li>
            <a href="admin_home.php">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="admin_sales.php">
              <span class="icon">
                <ion-icon name="cash-outline"></ion-icon>
              </span>
              <span class="title">Sales</span>
            </a>
          </li>
          <li>
            <a href="admin_orders.php">
              <span class="icon">
                <ion-icon name="clipboard-outline"></ion-icon>
              </span>
              <span class="title">Orders</span>
            </a>
          </li>
          <li>
            <a href="admin_products.php">
              <span class="icon">
                <ion-icon name="cafe-outline"></ion-icon>
              </span>
              <span class="title">Products</span>
            </a>
          </li>
          <li>
            <a href="admin_employee.php">
              <span class="icon">
                <ion-icon name="people-outline"></ion-icon>
              </span>
              <span class="title">Employee</span>
            </a>
          </li>
          <li>
            <a href="admin_customers.php">
              <span class="icon">
                <ion-icon name="people-outline"></ion-icon>
              </span>
              <span class="title">Customers</span>
            </a>
          </li>

          <li>
            <a href="admin_messages.php">
              <span class="icon">
                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
              </span>
              <span class="title">Messages</span>
            </a>
          </li>
          <li>
            <a href="admin_accounts.php">
              <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
              </span>
              <span class="title">Accounts</span>
            </a>
          </li>

          <li>
            <a href="admin_logout.php">
              <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
              </span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
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
                <label>price range</label>
                <input name="price_range" type="text" required value="<?php echo $fetch_edit['price_range'];?>" />
                <label for="category">category</label>
                <select  name="category" id="category" required >
                    <option value="coffee" <?php if ($fetch_edit['category'] == 'coffee') echo 'selected'; ?>>Coffee</option>
                    <option value="latte" <?php if ($fetch_edit['category'] == 'latte') echo 'selected'; ?>>Latte</option>
                    <option value="special" <?php if ($fetch_edit['category'] == 'special') echo 'selected'; ?>>Special</option>
                    <option value="noncoffee" <?php if ($fetch_edit['category'] == 'noncoffee') echo 'selected'; ?>>Non Coffee</option>
                </select>
                <label>Status</label>
                <select  name="status" required >
                    <option value="available" <?php if ($fetch_edit['status'] == 'available') echo 'selected'; ?>>Available</option>
                    <option value="unavailable" <?php if ($fetch_edit['status'] == 'unavailable') echo 'selected'; ?>>Unavailable</option>
                </select>
                <label for="image">image</label>
                <input  id="image" name="image" type="file" accept="image/jpg, image/png, image/webp" required value="<?php echo $fetch_edit['image'];?>" />
                <img src="../products/<?php echo $fetch_edit['image'];?>" width="100px" alt="Current Image">
               <div class="adproduct-submit">
                <button type="submit" name="submit" class="addsubmitbtn">SUBMIT</button>
               </div>
               <?php
                  if(isset($message)){
                    foreach ($message as $message) {
                    echo'
                        
                      ';
                    }
                  }
              ?>
            </form>
            <?php
                }
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
