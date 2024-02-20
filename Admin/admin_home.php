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
            <a href="admin_home.html">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="admin_sales.html">
              <span class="icon">
                <ion-icon name="cash-outline"></ion-icon>
              </span>
              <span class="title">Sales</span>
            </a>
          </li>
          <li>
            <a href="admin_orders.html">
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
            <a href="admin_employee.html">
              <span class="icon">
                <ion-icon name="people-outline"></ion-icon>
              </span>
              <span class="title">Employee</span>
            </a>
          </li>
          <li>
            <a href="admin_customers.html">
              <span class="icon">
                <ion-icon name="people-outline"></ion-icon>
              </span>
              <span class="title">Customers</span>
            </a>
          </li>

          <li>
            <a href="admin_messages.html">
              <span class="icon">
                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
              </span>
              <span class="title">Messages</span>
            </a>
          </li>
          <li>
            <a href="admin_accounts.html">
              <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
              </span>
              <span class="title">Accounts</span>
            </a>
          </li>

          <li>
            <a href="admin_logout.html">
              <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
              </span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
        </div>
        <div class="cardBox">
          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Orders</div>
            </div>

            <div class="iconBx">
              <ion-icon name="notifications-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">To Pickup</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cafe-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Completed</div>
            </div>

            <div class="iconBx">
              <ion-icon name="trending-up-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">0</div>
              <div class="cardName">Questions</div>
            </div>

            <div class="iconBx">
              <ion-icon name="mail-unread-outline"></ion-icon>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Employee List</h2>
            </div>

            <table>
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Rank</td>
                  <td>Payment</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>Star Refrigerator</td>
                  <td>$1200</td>
                  <td>Paid</td>
                  <td><span class="status delivered">Delivered</span></td>
                </tr>
              </tbody>
            </table>
          </div>
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
