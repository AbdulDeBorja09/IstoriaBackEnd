<?php 
  include '../connection.php';
  session_start();

  $admin_id = $_SESSION['admin_id'];
  
  if (!isset($admin_id)){
      header('location:../login/login.php');
  }
  if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM `user` WHERE id = '$delete_id'") or die ('query failed');
    mysqli_query($conn, "DELETE FROM `customer` WHERE uid = '$delete_id'") or die ('query failed');
    header('location:admin_customers.php');
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

        <div class="container-box ">
          <h1>CUSTOMERS</h1>
        </div>

        <div class="container-box">
          <input type="text" class="table-search-input" id="searchInput" placeholder="Search...">
          <table class="customers-table" id="customers-table" >
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Acount Age</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $select_customer = mysqli_query($conn, "SELECT * FROM `customer` ") or die ('query failed');
                $count = 0;
                if(mysqli_num_rows($select_customer)>0){
                    while($fetch_customer = mysqli_fetch_assoc($select_customer)){
                      $count++;
                      date_default_timezone_set('Asia/Manila');
                      $created_date = $fetch_customer['created'];
                      $created_datetime = DateTime::createFromFormat('m-d-y', $created_date);
                      $current_datetime = new DateTime(); 
                      $time_difference = $current_datetime->diff($created_datetime);
                      $account_age = $time_difference->days;
                      
                      
                ?>
              <tr>
                <td align="center"><?php echo $count?></td>
                <td><?php echo $fetch_customer['name']?></td>
                <td><?php echo $fetch_customer['username']?></td>
                <td><?php echo $fetch_customer['email']?></td>
                <td><?php echo $account_age ?></td>
                <td><div class="flex">
                <a class="bin-button" name="delete" href="admin_customers.php?delete=<?php echo $fetch_customer['uid']; ?>" class="btn delete" onclick="return confirm('Delete this product?')">
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
                </div></td>
              </tr>
              <?php 
                    }
                  }else{
                    ?>
                    <tr>
                      <td colspan="6" style="padding: 150px 0px; border:0px;">
                        <h1 style="font-size: 30px; text-align:center;">NO CUSTOMER ACCOUNT</h1>
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
        const rows = document.querySelectorAll("#customers-table tbody tr");

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
