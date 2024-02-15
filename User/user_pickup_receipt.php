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
            <img src="../assets/Images/menu.png" width="50px" alt="menu"/>
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
            <div class="detailss">
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
            <h1>PICK UP</h1>
            <h2>YOU CAN PICK IT UP AT 4:20PM</h2>
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
            <div class="row">
              <input
                type="number"
                name=""
                id=""
                placeholder="REFERENCE NUMBER"
                disabled
              />
              <input
                type="number"
                name=""
                id=""
                placeholder="123456789"
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
            </div>

            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1367.6562945205706!2d121.27078013080597!3d14.176251422419956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5f701ef8134d%3A0xc7c0108692658b32!2sIstoria%20Coffee!5e0!3m2!1sen!2sph!4v1707856498946!5m2!1sen!2sph"
              height="200"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>

            <div class="address">
              <img src="../assets/Images/maps.png" />
              <p>
                Istoria Coffee Shop, Brgy. Maitim, Bay, Philippines, 4033,
                National Hwy, Manila S Road
              </p>
            </div>
            <div class="status">
              <h1>ORDER STATUS:</h1>
              <img src="../assets/Images/prep.png" alt="prep"/>
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
