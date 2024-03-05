<?php 
  date_default_timezone_set('Asia/Manila');
  $current_datetime = date('m-d-y');
  $atendance_querys = mysqli_query($conn, "SELECT * FROM `attendance` WHERE eid ='$employee_id' AND status = 'on'") or die ('queryfailed');
  $attendances = mysqli_fetch_assoc($atendance_querys);
  $current_status = $attendances['time_out'];
  if ($current_status !== "0"){
    header('location:../login/login.php');
  }

  $select_employee = mysqli_query($conn, "SELECT * FROM `employee` WHERE eid ='$employee_id'") or die ('queryfailed');
  $fetch_employee = mysqli_fetch_assoc($select_employee);
?>
<div class="navigation">
  <ul>
    <li>
      <a href="Employee_home.php">
        <span class="icon">
          <img
            class="home-brand"
            src="../assets/profiles/<?php echo $fetch_employee['image']?>"
            width="50px"
            style="border-radius: 50%;"
          />
        </span>
        <span class="brand-title"><?php echo $fetch_employee['name']?></span>
      </a>
    </li>
    <li>
      <a href="Employee_home.php">
        <span class="icon">
          <ion-icon name="home-outline"></ion-icon>
        </span>
        <span class="title">Dashboard</span>
      </a>
    </li>
    <li>
      <a href="Employee_orders.php">
        <span class="icon">
          <ion-icon name="receipt-outline"></ion-icon>
        </span>
        <span class="title">Orders</span>
      </a>
    </li>
    <li>
      <a href="Employee_history.php">
        <span class="icon">
          <ion-icon name="checkmark-done-circle-outline"></ion-icon>
        </span>
        <span class="title">History</span>
      </a>
    </li>
    <li>
      <a href="Employee_products.php">
        <span class="icon">
          <ion-icon name="cafe-outline"></ion-icon>
        </span>
        <span class="title">Products</span>
      </a>
    </li>
    <li>
      <a href="Employee_addons.php">
        <span class="icon">
          <ion-icon name="leaf-outline"></ion-icon>
        </span>
        <span class="title">Addons</span>
      </a>
    </li>
    <li>
      <a href="Employee_message.php">
        <span class="icon">
          <ion-icon name="chatbubble-outline"></ion-icon>
        </span>
        <span class="title">Messages</span>
      </a>
    </li>

    <li>
      <a href="Employee_sales.php">
        <span class="icon">
          <ion-icon name="cash-outline"></ion-icon>
        </span>
        <span class="title">Sales</span>
      </a>
    </li>
    <li>
      <a href="Employee_signout.php">
        <span class="icon">
          <ion-icon name="log-out-outline"></ion-icon>
        </span>
        <span class="title">Logout</span>
      </a>
    </li>
  </ul>
</div>

