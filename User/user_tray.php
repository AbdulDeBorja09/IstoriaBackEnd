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
    <title>Istoria</title>
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
            <img src="../assets/Images/menu.png" width="50px" alt="menu"/>
          </button>
        </div>
        <img src="../assets/Images/logo3.png" width="80px" class="istoria" alt="logo3" />
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
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig"/>
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>

    <div class="tray-div">
      <div class="tray-title">
        <h1>TRAY</h1>
        <a onclick="history.back()">RETURN TO SHOP</a>
      </div>
      <div class="tray-item-title">
        <div class="flexs1">
          <h5>PRODUCT</h5>
          <h5>PRICE</h5>
        </div>
        <div class="flexs2">
          <h5>QUANTITY</h5>
          <h5>TOTAL</h5>
        </div>
      </div>
      <div class="trayline"></div>
      <div class="tray-flex">
        <div class="col1">
          <div class="heading"></div>
        </div>
      </div>
      <div class="tray-innerdiv">
        <div class="product">
          <div class="col1">
            <img src="../assets/Images/5.png" />
            <div class="details">
              <div class="text">
                <h1>COFFEE</h1>
                <h2>CAPPUCINO</h2>
                <h3>SIZE: 16 OZ</h3>
                <h4>ADD ONS:ESPRESSO SHOT</h4>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
          <div class="col2">
            <div class="inner">
              <div class="quantity">
                <button id="minusBtn">-</button>
                <input
                  type="number"
                  id="quantityInput"
                  class="quantity-input"
                  value="1"
                  min="1"
                  max="10"
                  disabled
                />
                <button id="addBtn">+</button>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
        </div>

        <div class="product">
          <div class="col1">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="details">
              <div class="text">
                <h1>COFFEE</h1>
                <h2>CAPPUCINO</h2>
                <h3>SIZE: 16 OZ</h3>
                <h4>ADD ONS:ESPRESSO SHOT</h4>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
          <div class="col2">
            <div class="inner">
              <div class="quantity">
                <button id="minusBtn">-</button>
                <input
                  type="number"
                  id="quantityInput"
                  class="quantity-input"
                  value="1"
                  min="1"
                  max="10"
                  disabled
                />
                <button id="addBtn">+</button>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
        </div>

        <div class="product">
          <div class="col1">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="details">
              <div class="text">
                <h1>COFFEE</h1>
                <h2>CAPPUCINO</h2>
                <h3>SIZE: 16 OZ</h3>
                <h4>ADD ONS:ESPRESSO SHOT</h4>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
          <div class="col2">
            <div class="inner">
              <div class="quantity">
                <button id="minusBtn">-</button>
                <input
                  type="number"
                  id="quantityInput"
                  class="quantity-input"
                  value="1"
                  min="1"
                  max="10"
                  disabled
                />
                <button id="addBtn">+</button>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
        </div>

        <div class="product">
          <div class="col1">
            <img src="../assets/Images/5.png" alt="coffee"/>
            <div class="details">
              <div class="text">
                <h1>COFFEE</h1>
                <h2>CAPPUCINO</h2>
                <h3>SIZE: 16 OZ</h3>
                <h4>ADD ONS:ESPRESSO SHOT</h4>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
          <div class="col2">
            <div class="inner">
              <div class="quantity">
                <button id="minusBtn">-</button>
                <input
                  type="number"
                  id="quantityInput"
                  class="quantity-input"
                  value="1"
                  min="1"
                  max="10"
                  disabled
                />
                <button id="addBtn">+</button>
              </div>
              <h6>100.00</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lowertray">
      <div class="col1">
        <h1>ADD A NOTE TO YOUR ORDER</h1>
        <textarea
          name=""
          id=""
          cols="50"
          rows="3"
          placeholder="HOW CAN WE HELP YOU"
        ></textarea>
      </div>
      <div class="col2">
        <div class="upper">
          <h1>SUBTOTAL:</h1>
          <h2>100.00</h2>
        </div>
        <h3>DELIVERY FEE INCLUDED AT CHECKOUT.</h3>
        <div class="lower">
          <a href="user_delivery.html" class="stylish1 btn">DELIVERY</a>
          <a href="user_pickup.html" class="stylish2 btn">PICK-UP</a>
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
              ><img src="../assets/Images/email.png" alt="email" target="_blank"
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
    <script>
      // Get the elements
      const minusBtn = document.getElementById("minusBtn");
      const addBtn = document.getElementById("addBtn");
      const quantityInput = document.getElementById("quantityInput");

      // Add event listener to minus button
      minusBtn.addEventListener("click", () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
          quantityInput.value = currentQuantity - 1;
          updateButtonState();
        }
      });

      // Add event listener to add button
      addBtn.addEventListener("click", () => {
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity < 10) {
          quantityInput.value = currentQuantity + 1;
          updateButtonState();
        }
      });

      // Function to update button state
      function updateButtonState() {
        let currentQuantity = parseInt(quantityInput.value);
        // Enable or disable minus button based on quantity
        minusBtn.disabled = currentQuantity === 1;
        // Enable or disable add button based on quantity
        addBtn.disabled = currentQuantity === 10;
        // Apply/disable styles based on disabled state
        minusBtn.classList.toggle("disabled", currentQuantity === 1);
        addBtn.classList.toggle("disabled", currentQuantity === 10);
      }
    </script>
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

    <script src="../Src/Javascript/main.js"></script>
  </body>
</html>
