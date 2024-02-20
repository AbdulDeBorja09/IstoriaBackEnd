<?php 
  include '../connection.php';
  session_start();

  if (isset($_POST['logout'])){
    session_destroy();
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
      <div class="navigation">
        <ul>
          <li>
            <a href="#">
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
            <form method="post">
              <a name="logout" type="submit" >
                <span class="icon">
                  <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
              </a>
            </form>
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
          <h1>CUSTOMER'S ACCOUNTS</h1>
        </div>
        <div class="container-box">
          <table class="users-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
            <?php $select_user = mysqli_query($conn, "SELECT * FROM `user` ") or die ('query failed');
                $count = 0;
                if(mysqli_num_rows($select_user )>0){
                    while($fetch_user = mysqli_fetch_assoc($select_user )){
                      $count++;
                ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $fetch_user['name']; ?></td>
                  <td><?php echo $fetch_user['username']; ?></td>
                  <td><?php echo $fetch_user['email']; ?></td>
                  <td><td><?php echo $fetch_user['password']; ?></td></td>
                  <td>s</td>
                </tr>
                  <?php  
                    }
                      }else{
                      echo '
                      <tr>
                        <td colspan="7">
                          <h1>NO AVAILABLE PRODUCTS</h1>
                        </td>
                      </tr>
                      ';
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
