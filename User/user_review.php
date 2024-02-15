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
    <title>Review</title>
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
      <img src="../assets/Images/email.png" class="side-icon" alt="email"/>
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb"/>
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>
    <div class="review-title text-center">
      <div class="reviewback">
        <button onclick="history.back()">RETURN TO ACCOUNT DETAILS</button>
      </div>
      <h1>SEND US A REVIEW!</h1>
      <div class="reviewform">
        <div class="ratingsss">
          <span class="rating-star" data-value="1">&#9733;</span>
          <span class="rating-star" data-value="2">&#9733;</span>
          <span class="rating-star" data-value="3">&#9733;</span>
          <span class="rating-star" data-value="4">&#9733;</span>
          <span class="rating-star" data-value="5">&#9733;</span>
        </div>
        <div class="forms">
          <input type="text" name="" id="" placeholder="USERNAME" />
          <input type="text" name="" id="" placeholder="ORDER" />
          <textarea
            name=""
            id=""
            cols="30"
            rows="10"
            placeholder="COMMENT"
          ></textarea>
          <a href="">SEND REVIEW</a>
        </div>
      </div>
    </div>

    <script>
      function initializeStarRating() {
        const stars = document.querySelectorAll(".rating-star");
        const ratingValue = document.getElementById("rating-value");
        let rating;

        stars.forEach((star) => {
          star.addEventListener("click", () => {
            rating = star.getAttribute("data-value");
            ratingValue.textContent = `You rated ${rating} stars.`;
            highlightSelectedStars(rating);
          });

          star.addEventListener("mouseover", () => {
            resetStarsColor();
            highlightSelectedStars(star.getAttribute("data-value"));
          });

          star.addEventListener("mouseout", () => {
            resetStarsColor();
            highlightSelectedStars(rating);
          });
        });

        function resetStarsColor() {
          stars.forEach((star) => {
            star.style.color = "#a6a6a6"; // Corrected color value
          });
        }

        function highlightSelectedStars(value) {
          for (let i = 0; i < value; i++) {
            stars[i].style.color = "#231f20";
          }
        }
      }
      window.addEventListener("load", initializeStarRating);
    </script>

    <div style="padding: 150px"></div>
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
