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
    <title>Thank You!</title>
  </head>
  <body>
    <nav class="navbar fixed-top">
      <div class="container-fluid">
        <div>
          <a href="user_home.html" class="navbarand">
            <img src="../assets/Images/logo2.png" width="50px" alt="logo2"/>
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
        <img src="../assets/Images/logo3.png" width="80px" class="istoria" alt="logo3"/>
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
      <img src="../assets/Images/email.png" class="side-icon" />
      <img src="../assets/Images/ig.png" class="side-icon" />
      <img src="../assets/Images/fb.png" class="side-icon" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>
    <div class="reciept">
      <div class="reciept-title">
        <h1>GOT YOUR ORDER!</h1>
      </div>
      <div class="return">
        <a href="user_profile.html">RETURN TO SHOP</a>
      </div>

      <div class="maindiv">
        <div class="col1">
          <div class="box">
            <div class="images">
              <img class="img1" src="../assets/Images/logo2.png" alt="" />
              <img class="img2" src="../assets/Images/logo3.png" alt="" />
              <img src="" alt="" />
            </div>

            <div class="date">
              <h5>02/22/24</h5>
              <h6>4:00PM</h6>
            </div>
            <div class="details">
              <h1>COFFEE</h1>
              <h2>1 CAPUCCINO</h2>
            </div>

            <div class="total">
              <div class="sub">
                <h1>SUBTOTAL</h1>
                <h2>104.00</h2>
              </div>
              <h3>PAID WITH</h3>
              <h4>CASH</h4>
            </div>
          </div>
        </div>
        <div class="col2">
          <div class="heading">
            <h1>DELIVERY</h1>
          </div>
          <div class="main">
            <div class="row">
              <input type="text" name="" id="" placeholder="Juan" disabled />
              <input
                type="text"
                name=""
                id=""
                placeholder="Dela Cruz"
                disabled
              />
            </div>
            <div class="row2">
              <input
                type="number"
                name=""
                id=""
                placeholder="REFERENCE NUMBER"
                disabled
              />
            </div>
            <div class="row">
              <input
                type="text"
                name=""
                id=""
                placeholder="02/22/24"
                disabled
              />
              <input type="text" name="" id="" placeholder="4:00PM" disabled />
              <textarea
                name=""
                id=""
                cols="30"
                rows="15"
                placeholder="NOTE TO THE RIDER:"
              ></textarea>
            </div>
            <div style="padding: 22px"></div>
            <div class="status">
              <h1>ORDER STATUS:</h1>
              <img src="../assets/Images/prep.png" />
              <h2>PREPARING YOUR ORDER</h2>
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
              ><img src="../assets/Images/email.png" alt="" target="_blank"
            /></a>
            <a href="https://www.instagram.com/istoriacoffee/" target="_blank"
              ><img src="../assets/Images/ig.png" alt=""
            /></a>
            <a href="https://www.facebook.com/coffee.istoria" target="_blank"
              ><img src="../assets/Images/fb.png" alt=""
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
