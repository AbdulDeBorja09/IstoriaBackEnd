<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  if (isset($_POST['add'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $addons1 = mysqli_real_escape_string($conn, $_POST['addons1']);
    $addons2 = mysqli_real_escape_string($conn, $_POST['addons2']);
    $addons3 = mysqli_real_escape_string($conn, $_POST['addons3']);
    $addons4 = mysqli_real_escape_string($conn, $_POST['addons4']);
    $price1 = mysqli_real_escape_string($conn, $_POST['price1']);
    $price2 = mysqli_real_escape_string($conn, $_POST['price2']);
    $price3 = mysqli_real_escape_string($conn, $_POST['price3']);
    $price4 = mysqli_real_escape_string($conn, $_POST['price4']);

    $select_addons = mysqli_query($conn, "SELECT * FROM `addons` WHERE category = '$category' ") or die('query failed');
    if (mysqli_num_rows($select_addons) > 0) {
        $message[] = 'Product name already exists';
    } else {
        $insert_addons = mysqli_query($conn, "INSERT INTO `addons` (`category`, `addons1`, `addons2`, `addons3`, `addons4`, `price1`, `price2`, `price3`, `price4`)
          VALUES ('$category', '$addons1', '$addons2', '$addons3', '$addons4', '$price1', '$price2', '$price3', '$price4')") or die('query failed');
          header('location:admin_addons.php');
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

        <div class="container-box employee-title">
          <h1>ADDONS</h1>
          <a class="addbutton"  id="openModalBtn">
              <span class="addbtn">
                <ion-icon name="add-circle-outline"></ion-icon>
              </span>
            </a>
        </div>

        <div class="container-box">
          <table class="addons-table">
            <thead>
              <tr>
                <th>CATEGORY</th>
                <th colspan="4">Addons</th>
                <th colspan="4">Price</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $select_products = mysqli_query($conn, "SELECT * FROM `addons` ") or die ('query failed');
              if(mysqli_num_rows($select_products)>0){
                  while($fetch_products = mysqli_fetch_assoc($select_products)){
              ?>
              <tr>
                <td><?php echo $fetch_products['category'] ?></td>
                <td><?php echo $fetch_products['addons1'] ?></td>
                <td><?php echo $fetch_products['addons2'] ?></td>
                <td><?php echo $fetch_products['addons3'] ?></td>
                <td><?php echo $fetch_products['addons4'] ?></td>
                <td><?php echo $fetch_products['price1'] ?></td>
                <td><?php echo $fetch_products['price2'] ?></td>
                <td><?php echo $fetch_products['price3'] ?></td>
                <td><?php echo $fetch_products['price4'] ?></td>
                <td align="center"><form method="post">
                  <a href="admin_addons_edit.php?edit=<?php echo $fetch_products['id'] ?>" class="edit-button" name="edit">
                        <svg class="edit-svgIcon" viewBox="0 0 512 512">
                          <path
                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                          ></path>
                        </svg>
                        </a>
                  </form>
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
    <div id="myModal" class="addonsmodal">
      <div class="modal-content">
        <span class="close">&times;</span>
          <form method="post">
            <div class="content">
                  <div class="addons-flex">
                    <div class="col1">
                      <h1>ADDONS</h1>
                      <input type="text" name="addons1" required>
                      <input type="text" name="addons2" required>
                      <input type="text" name="addons3" required>
                      <input type="text" name="addons4" required>
                    </div>
                    <div class="col2">
                      <h1>PRICE</h1>
                      <input type="text" name="price1" required>
                      <input type="text" name="price2" required>
                      <input type="text" name="price3" required>
                      <input type="text" name="price4" required>
                    </div>
                  </div>
                  <select name="category" required>
                    <option value="coffee">Coffee</option>
                    <option value="latte">Latte</option>
                    <option value="noncoffee">Non Coffe</option>
                    <option value="specials">Specials</option>
                  </select>
                  <button  class="submit"  name="add">ADD</button>
            </div>
          </form>
        </div>
      </div>

    <script>
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("openModalBtn");
      var span = document.getElementsByClassName("close")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }

      span.onclick = function() {
        modal.style.display = "none";
      }
    </script>
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
