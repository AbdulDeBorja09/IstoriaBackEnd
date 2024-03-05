<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
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

        <div class="container-box title-box">
          <h1 class="orders-title">ORDERS</h1>
        </div>
        <div class="container-box">
        <input type="text" class="table-search-input" id="searchInput" placeholder="Search...">
          <table class="order-table" id="order-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Reference</th>
                <th>Name</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Transaction</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $count = 0;
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die ('query failed');
                if(mysqli_num_rows($select_orders)>0){
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                    $count++;
                ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $fetch_orders['reference'] ?></td>
                  <td><?php echo $fetch_orders['name'] ?></td>
                  <td><?php echo $fetch_orders['total'] ?></td>
                  <td><?php echo $fetch_orders['payment'] ?></td>
                  <td><?php echo $fetch_orders['transaction'] ?></td>
                  <td><a href="admin_order_viewpage.php?ref=<?php echo $fetch_orders['reference'] ?>">VIEW</a></td>


                </tr>
            <?php 
                }
              }else{
                ?>
                <tr>
                  <td colspan="7" style="padding: 150px 0px; border:0px;">
                    <h1 style="font-size: 30px; text-align:center;">NO ORDERS</h1>
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
        const rows = document.querySelectorAll("#order-table tbody tr");

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
