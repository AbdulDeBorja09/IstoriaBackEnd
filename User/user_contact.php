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
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>

    <div class="contactus">
      <h1 class="contact-gettouch">GET IN TOUCH</h1>
      <div class="contact-flex">
        <div class="contact-col1">
          <form action="post">
            <input type="text" name="name" placeholder="NAME" required />
            <input type="text" name="email" placeholder="EMAIL" required />
            <input
              type="number"
              name="number"
              placeholder="PHONE NUMBER"
              required
            />
            <textarea
              name=""
              id=""
              cols="30"
              rows="7"
              placeholder="MESSAGE"
              required
            ></textarea>
            <button class="fancy" type="submit">
              <span class="top-key"></span>
              <span class="text">SEND A MESSAGE</span>
              <span class="bottom-key-1"></span>
              <span class="bottom-key-2"></span>
            </button>
          </form>
        </div>
        <div class="contact-col2">
          <iframe
            class="maps"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d967.0769609259906!2d121.2711749!3d14.1767391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5f701ef8134d%3A0xc7c0108692658b32!2sIstoria%20Coffee!5e0!3m2!1sen!2sph!4v1707687689770!5m2!1sen!2sph"
            width="425"
            height="270"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>

          <div class="contact-address">
            <img src="../assets/Images/maps.png" width="30px" alt="maps" />
            <p>
              Istoria Coffee Shop, Brgy. Maitim, Bay, Philippines, 4033,
              National Hwy, Manila S Road
            </p>
          </div>
          <div class="about-follow">
            <h1>FOLLOW US</h1>
            <div class="contact-socmeds">
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
        <div class="contact-col3">
          <h1>GOT A QUESTION?</h1>
          <p>
            We'd love to hear from you. Send us a message and we'll be in touch
            with you as soon as possible!
          </p>
          <h1>BY EMAIL:</h1>
          <p>business.istoria@gmail.com</p>
          <h1>BY FACEBOOK:</h1>
          <p>istoria coffee</p>
          <h1>BY INSTAGRAM:</h1>
          <p>@istoriacoffee</p>
        </div>
      </div>
    </div>
    <div style="padding: 70px"></div>
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
