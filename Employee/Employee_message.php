<?php
    include '../connection.php';
    session_start();
    $employee_id = $_SESSION['employee_id'];

    if (!isset($employee_id)){
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
            <h1>MESSAGES</h1>
          </div>
        </div>
          <div class="container-box">
          <div class="product-search">
          <input type="text" id="searchInput" name="searchInput" placeholder="Search...">
          </div>
            <div class="message-heading">
              <h2>#</h2>
              <h1>NAME</h1>
            </div>
            <table class="messages-table" id="message-table" >
              <tbody>
              <?php
                $count = 0;
                $select_message = mysqli_query($conn, "SELECT * FROM `message` ORDER BY user_id, date DESC") or die ('Query failed');
                $current_user_id = null;
                while($fetch_message = mysqli_fetch_assoc($select_message)){
                    if($fetch_message['user_id'] != $current_user_id){
                      $count++;
                      $sender = $fetch_message['sender'];
                      $date = strtok($fetch_message["date"], " ");
                      $time = substr(strstr($fetch_message["date"], " "), 1);
                  ?>    
                  <tr>
                    <td><h1><?php echo $count ?></h1></td>
                    <td> <?php if ($sender == "user") { ?>
                            <h1><strong><?php echo $fetch_message['name'] ?></strong></h1>
                            <div class="time">
                              <h2><strong><?php echo $date ?></strong></h2>
                              <h2><strong><?php echo $time ?></strong></h2>
                            </div>
                      <?php } else { ?>
                        <h1><?php echo $fetch_message['name'] ?></h1>
                            <div class="time">
                              <h2><?php echo $date ?></h2>
                              <h2><?php echo $time ?></h2>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                    <?php if ($sender == "user") { ?>
                        <div class="msg">
                          <p><strong><?php echo $fetch_message['message'] ?> </strong></p>
                          <div class="dot"></div>
                        </div>
                      <?php } else { ?>
                        <p><?php echo $fetch_message['message'] ?></p>
                      <?php } ?> 
                    </td>
                    <td><a href="Employee_view_message.php?id=<?php echo $fetch_message['user_id']?>">VIEW MESSAGE</a></td>
                  </tr>
                 <?php    
                 $current_user_id = $fetch_message['user_id'];
                    }
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
        const rows = document.querySelectorAll("#message-table tbody tr");

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
