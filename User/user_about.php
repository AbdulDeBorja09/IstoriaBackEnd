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
      <img src="../assets/Images/ig.png" class="side-icon" a;t="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>
    <div class="text-center">
      <h1 class="about-title">ABOUT US</h1>
      <div class="about-panel1">
        <img src="../assets/Images/about.png" width="650" alt="about" />
        <div class="about-text1">
          <p>
            Istoria Coffee, founded in July 2022, is the result of a deep-seated
            collective passion for coffee among a close group of friends. Driven
            by their love for extraordinary coffee experiences, they embarked on
            a journey to create a distinctive sanctuary for coffee enthusiasts.
          </p>
          <br /><br />
          <p>
            The idea was sparked when the friends yearned for a distinctive
            flavor profile missing in other coffee shops, motivating them to
            turn their shared love for coffee into a tangible reality.
          </p>
        </div>
      </div>

      <div class="about-panel2">
        <div class="about-text2">
          <p>
            Initially located in a cozy corner near Isdaan Floating Restaurant
            in Hanggan, Calauan, Laguna, Istoria Coffee quickly gained
            popularity despite its modest beginnings. This small coffee shop
            offered a one-of-a-kind experience that reflected the diverse tastes
            of its founders. As community support for Istoria Coffee grew, so
            did the friends' vision. In 2023, the coffee shop made a significant
            move,
          </p>
        </div>
        <img src="../assets/Images/about2.png" width="900" alt="about2" />
      </div>
      <div class="about-text3">
        <p>
          relocating to Maitim Bay, Laguna, near Global Care Medical Center.
          This move expanded Istoria Coffee's reach, enabling it to cater to a
          wider audience, introduce new coffee blends, and provide a welcoming
          space for patrons to savor the love and dedication poured into each
          cup. Today, Istoria Coffee stands as a testament to the friendship and
          shared love for coffee that brought it to life, evolving from a small
          corner to a bustling hub near Global Care Medical Center at Maitim
          Bay, Laguna, continuing to tell a story that began with friends on a
          quest for the perfect cup of coffee.
        </p>
      </div>
    </div>
    <img src="../assets/Images/banner3.png" width="100%" alt="banner3" />
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
