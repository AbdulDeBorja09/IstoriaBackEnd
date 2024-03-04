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

        <div class="container-box employee-title">
          <h1>SALARY</h1>
        </div>

        <div class="container-box">
         <table class="salary-table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>view</td>
                </tr>
            </thead>
            <tbody>
            <tbody>
              <?php 
                $select_employee = mysqli_query($conn, "SELECT * FROM `employee` ") or die ('query failed');
                $count = 0;
                if(mysqli_num_rows($select_employee)>0){
                    while($fetch_employee = mysqli_fetch_assoc($select_employee)){
                      $count++;
                      
                ?>
                <tr> 
                    <td><?php echo $count ?></td>
                    <td><?php echo $fetch_employee['name'] ?></td>
                    <td><a href="admin_salary_view.php?delete=<?php echo $fetch_employee['id'] ?>">VIEW</a></td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
         </table>
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