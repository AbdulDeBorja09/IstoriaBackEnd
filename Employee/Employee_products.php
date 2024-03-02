<?php
  include '../connection.php';
  session_start();
  $employee_id = $_SESSION['employee_id'];

  if (!isset($employee_id)){
      header('location:../login/login.php');
  }
  $sort_query = ""; 
  $sort_option = ""; 
  if (isset($_POST['sort'])) {
      $sort_option = $_POST['sort'];
      
      switch ($sort_option) {
          case "Price: Low - High":
              $sort_query = "ORDER BY price ASC";
              break;
          case "Price: High - Low":
              $sort_query = "ORDER BY price DESC";
              break;
          case "Alphabetically":
              $sort_query = "ORDER BY name ASC";
              break;
          default:

              $sort_query = "";
              break;
      }
  }

  if(isset($_POST["avail"]) || isset($_POST["unavail"])){
    $status = isset($_POST["avail"]) ? "available" : "unavailable";
    $pid = $_POST["pid"];
    $update_query = mysqli_prepare($conn, "UPDATE `products` SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($update_query, "si", $status, $pid);
    mysqli_stmt_execute($update_query);
    mysqli_stmt_close($update_query);
    mysqli_query($conn, "DELETE FROM `tray` WHERE pid = '$pid'");
    $message[] = 'order placed successfully';
    header('location: employee_products.php');
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
            <h1>PRODUCTS</h1>
          </div>
        </div>
        <div class="container-box">
          <div class="product-search">
          <input type="text" id="searchInput" name="searchInput" placeholder="Search...">
          <form method="POST" action="">
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option <?php echo ($sort_option == "Price: Low - High") ? "selected" : "" ?>>Price: Low - High</option>
                <option <?php echo ($sort_option == "Price: High - Low") ? "selected" : "" ?>>Price: High - Low</option>
                <option <?php echo ($sort_option == "Alphabetically") ? "selected" : "" ?>>Alphabetically</option>
            </select>
          </form>
          </div>
            <table class="products-table" id="products-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Addons</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
              <?php 
              $count = 0;
              $select_products = mysqli_query($conn, "SELECT * FROM `products` $sort_query ") or die ('query failed');
              if(mysqli_num_rows($select_products)>0){
                  while($fetch_products = mysqli_fetch_assoc($select_products)){
                    $count++
              ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><img src="../assets/products/<?php echo $fetch_products['image'] ?>" width="100px"></td>
                  <td><?php echo $fetch_products['name'] ?></td>
                  <td>
                  <?php 

                    $addons_category = $fetch_products['category'];
                      $select_addons = mysqli_query($conn, "SELECT * FROM `addons` WHERE category = '$addons_category'") or die ('query failed');
                      if(mysqli_num_rows($select_addons)>0){
                        while($fetch_addons = mysqli_fetch_assoc($select_addons)){
                      ?>
                      <div class="addons">
                        <p><?php echo $fetch_addons['addons1'] ?></p>
                        <p>₱ <?php echo $fetch_addons['price1'] ?>.00</p>
                      </div>
                      <div class="addons">
                        <p><?php echo $fetch_addons['addons2'] ?></p>
                        <p>₱ <?php echo $fetch_addons['price2'] ?>.00</p>
                      </div>
                      <div class="addons">
                        <p><?php echo $fetch_addons['addons3'] ?></p>
                        <p>₱ <?php echo $fetch_addons['price3'] ?>.00</p>
                      </div>
                      <div class="addons">
                        <p><?php echo $fetch_addons['addons4'] ?></p>
                        <p>₱ <?php echo $fetch_addons['price4'] ?>.00</p>
                      </div>

                  <?php 
                    }
                  }
                  ?>
                  </td>
                  <td>₱ <?php echo $fetch_products['price'] ?>.00</td>
                  <td><?php echo $fetch_products['category'] ?></td>
                  <td style="color: <?php echo ($fetch_products['status'] == 'available') ? 'green' : 'red'; ?>"><?php echo $fetch_products['status'] ?></td>
                  <td>
                      <?php if($fetch_products['status'] == "available"): ?>
                        <form method="post">
                          <input type="hidden" name="pid" value="<?php echo $fetch_products['id'] ?>">
                          <input type="hidden" name="unavail" value="unavailable">
                          <button name="unavail" type="submit" class="avail" >Unavailable</button>
                        </form>
                      <?php else: ?>
                        <form method="post">
                          <input type="hidden" name="pid" value="<?php echo $fetch_products['id'] ?>">
                          <input type="hidden" name="avail" value="available">
                          <button name="avail" type="submit" class="Unavail" >available</button>
                        </form>
                      <?php endif; ?>
                  </td>

                </tr>

                <?php 
                  }
                }
                else{
                  ?>
                  <tr>
                    <td colspan="8" style="padding: 150px 0px; border:0px;">
                      <h1>NO PRODUCTS</h1>
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
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll("#products-table tbody tr");

        searchInput.addEventListener("keyup", function(event) {
          const query = event.target.value.toLowerCase();

          rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(query) ? "" : "none";
          });
        });
      });
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
