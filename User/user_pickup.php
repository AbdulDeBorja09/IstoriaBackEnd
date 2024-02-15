<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Check Out</title>
  </head>
  <body>
    <nav class="navbar fixed-top">
      <div class="container-fluid">
        <div>
          <a href="user_home.html" class="navbarand">
            <img src="../assets/Images/logo2.png" width="50px" alt="logo2" />
          </a>
          <button
            class="btn"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <img src="../assets/Images/menu.png" width="50px" alt="menu" />
          </button>
        </div>
        <img
          src="../assets/Images/logo3.png"
          width="80px"
          class="istoria"
          alt="logo3"
        />
        <div class="navprofile">
          <a href="user_profile.html"><ion-icon name="person"></ion-icon></a>
          <a href="user_tray.html"><ion-icon name="file-tray"></ion-icon></a>
        </div>
      </div>
    </nav>

    <div
      class="fixed-top"
      id="navbarToggleExternalContent"
      style="margin-top: 110px"
    >
      <div class="navigations text-center">
        <ul>
          <li><a href="user_products.html">PRODUCTS</a></li>
          <li><a href="user_contact.html">CONTACT US</a></li>
          <li><a href="user_about.html">ABOUT US</a></li>
          <li><a href="user_album.html">ALBUM</a></li>
          <li><a href="../Login/login.html">JOIN US</a></li>
        </ul>
      </div>
    </div>

    <div class="sidebar">
      <img src="../assets/Images/email.png" class="side-icon" alt="email" />
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>

    <div class="checkout-divider">
      <div class="checkout-div1">
        <h1>CHECK OUT</h1>
        <div class="inner">
          <h4>CONTACT</h4>
          <input type="number" placeholder="CONTACT NUMBER" />
          <div style="padding: 15px"></div>
          <h2>PICKUP</h2>
          <div class="name">
            <input type="text" placeholder="FIRST NAME" />
            <input type="text" placeholder="LAST NAME" />
          </div>
          <div class="name">
            <input type="date" />
            <input type="time" />
          </div>
          <textarea
            name=""
            id=""
            cols="30"
            rows="5"
            placeholder="NOTE TO THE BARISTA:"
          ></textarea>
        </div>
        <h3>PAY WITH:</h3>
        <div class="payment">
          <input
            type="radio"
            class="btn-check"
            name="payment"
            id="gcash"
            autocomplete="off"
            checked
          />
          <label class="btn" for="gcash">G-CASH</label>

          <input
            type="radio"
            class="btn-check"
            name="payment"
            id="cash"
            autocomplete="off"
          />
          <label class="btn" for="cash">CASH</label>
        </div>
        <input class="gcash" type="number" placeholder="G-CASH NUMBER" />
      </div>

      <div class="checkout-div2">
        <div class="return">
          <a href="user_tray.html">RETURN TO TRAY</a>
        </div>
        <div class="checkout-products">
          <div class="inner">
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>

            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee " />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
            <div class="products">
              <div class="counter">
                <h6>0</h6>
              </div>
              <div class="col1">
                <img src="../assets/Images/5.png" alt="coffee" />
                <div class="details">
                  <h1>COFFEE</h1>
                  <h2>CAPPUCCINO</h2>
                  <h3>SIZE: 16 OZ</h3>
                  <h4>ADD ONS: ESPRESSO SHOT</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="outer-div">
            <div class="sub">
              <h1>SUBTOTAL</h1>
              <h1><b>164.00</b></h1>
            </div>
            <div class="del">
              <h1>DELIVERY FEE:</h1>
              <h1>60.00</h1>
            </div>
            <div class="button">
              <a href="user_pickup_receipt.html" class="checkoutbutton"
                >PLACE ORDER</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="footer">
        <div class="colm1">
          <h4>ISTORIA COFFEE SHOP</h4>
          <h5><a href="user_contact.html">CONTACT US</a></h5>
          <h5><a href="user_about.html">ABOUT US</a></h5>

          <h6>
            © 2024, istoria coffee shop. All rights reserved. <br />Perfectly
            Crafted For Your Ideal Cup of Coffee
          </h6>
        </div>
        <div class="colm2">
          <h5>STAY IN THE LOOP</h5>
          <h6>STAY IN TOUCH THROUGH</h6>
          <div class="socmeds">
            <a href="mailto:BUSINESS.ISTORIA@GMAIL.COM"
              ><img
                src="../assets/Images/email.png"
                alt="email"
                target="_blank"
            /></a>
            <a href="https://www.instagram.com/istoriacoffee/" target="_blank"
              ><img src="../assets/Images/ig.png" alt="ig"
            /></a>
            <a href="https://www.facebook.com/coffee.istoria" target="_blank"
              ><img src="../assets/Images/fb.png" alt="fb"
            /></a>
          </div>
        </div>
      </div>
    </footer>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="/Src/Javascript/index.js"></script>
    <script src="/Src/Javascript/main.js"></script>
  </body>
</html>
