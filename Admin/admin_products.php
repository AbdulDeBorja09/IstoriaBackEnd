<?php 
  include '../connection.php';
  session_start();
  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }

  if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
    unlink('../assets/products/'.$fetch_delete_image['image']);

    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die ('query failed');
    mysqli_query($conn, "DELETE FROM `tray` WHERE pid = '$delete_id'") or die ('query failed');
    header('location:admin_products.php');
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
          <div class="addmenu employee-title" >
            <h1 class="titles">PRODUCTS</h1>
            <a class="addbutton" href="admin_products_add.php">
              <span class="addbtn">
              <ion-icon name="add-circle-outline"></ion-icon>
              </span>
            </a>
          </div>
        </div>
        <div class="container-box">
          <section class="products-section">
            <table class="products-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Price Range</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $select_prodcuts = mysqli_query($conn, "SELECT * FROM `products` ORDER BY status ASC ") or die ('query failed');
                $count = 0;
                if(mysqli_num_rows($select_prodcuts)>0){
                    while($fetch_products = mysqli_fetch_assoc($select_prodcuts)){
                      $count++;
                ?>
                <tr>
                  <td><?php echo $count; ?></td></td>
                  <td><img src="../assets/products/<?php echo $fetch_products['image']; ?>" width="80%" /></td>
                  <td><?php echo $fetch_products['name']; ?></td>
                  <td>₱<?php echo $fetch_products['price']; ?></td>
                  <td><?php echo $fetch_products['price_range']; ?></td>
                  <td><?php echo $fetch_products['category']; ?></td>
                  <td><?php echo $fetch_products['status']; ?></td>
                  <td>
                    <form method="post" class="products-edit">
                    <a class="bin-button" name="delete" href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="btn delete" onclick="return confirm('Delete this product?')">
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
                      </a>

                    <a href="admin_products_edit.php?edit=<?php echo $fetch_products['id']; ?>" class="edit-button" name="edit">
                      <svg class="edit-svgIcon" viewBox="0 0 512 512">
                        <path
                          d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                        ></path>
                      </svg>
                      </a></form>
                  </td>
                </tr>
                <?php  
                    }
                      }else{
                      ?>
                      <tr>
                        <td colspan="8" style="padding: 150px 0px; border:0px;">
                          <h1 style="font-size: 30px; text-align:center;">NO AVAILABLE PRODUCTS</h1>
                        </td>
                      </tr>
                      <?php  
                    }
                    ?>
              </tbody>
            </table>
          </section>
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
