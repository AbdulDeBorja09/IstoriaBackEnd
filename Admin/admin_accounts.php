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
