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
      <img src="../assets/Images/email.png" class="side-icon" alt="email" />
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig"/>
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>
    <div class="container">
      <div class="coffee_title">
        <h1>SPECIALS</h1>
      </div>
      <div class="subnav-coffee">
        <div class="left">
          <button class="btn">
            <ion-icon
              name="chevron-back-circle"
              onclick="history.back()"
            ></ion-icon>
          </button>
          <h1>6 PRODUCTS</h1>
        </div>

        <button
          class="sortby btn btn dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          SORT BY:
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Price: Low - High</a></li>
          <li><a class="dropdown-item" href="#">Price: Hgih - Low</a></li>
          <li><a class="dropdown-item" href="#">Alpabethically</a></li>
        </ul>
      </div>

      <div class="coffe-flex">
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
        <div class="box">
          <div class="enlargebox">
            <button
              class="enlarge btn"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <ion-icon name="search"></ion-icon>
            </button>
          </div>
          <br />
          <a class="viewpagelink" href="user_viewpage.html">
            <img src="../assets/Images/5.png" alt="coffee" />
            <div class="description">
              <h5>AMERICANO</h5>
              <h6>₱69.00 - ₱79.00</h6>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
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
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-hidden="true"
      aria-labelledby="exampleModalLabel"
    >
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background-color: white">
          <div class="row">
            <div class="col-lg-6">
              <img class="modal-coffee-img" src="../assets/Images/5.png" alt="coffee"/>
            </div>
            <div class="modal-div-2 col-lg-6">
              <h1>CAPUCCINO</h1>
              <div class="star">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>
              <h5>₱ 79.00</h5>
              <h6>CHOICES</h6>
              <input
                type="radio"
                class="btn-check"
                name="options-base"
                id="option5"
                autocomplete="off"
                checked
              />
              <label class="btn" for="option5">HOT</label>

              <input
                type="radio"
                class="btn-check"
                name="options-base"
                id="option6"
                autocomplete="off"
              />
              <label class="btn" for="option6">ICED</label>

              <h6>ADD ONS</h6>

              <table
                class="addonts-table w-50"
                style="background-color: #f6f3f1"
              >
                <tbody>
                  <tr>
                    <td>
                      <input
                        type="checkbox"
                        class="btn-check"
                        id="espresso"
                        autocomplete="off"
                      />
                      <label class="btn" for="espresso">ESPRESSO SHOT</label>
                    </td>
                    <td><h5>₱ 79.00</h5></td>
                  </tr>
                  <tr>
                    <td>
                      <input
                        type="checkbox"
                        class="btn-check"
                        id="sauce"
                        autocomplete="off"
                      />
                      <label class="btn" for="sauce">SAUCE </label>
                    </td>
                    <td><h5>₱ 79.00</h5></td>
                  </tr>
                  <tr>
                    <td>
                      <input
                        type="checkbox"
                        class="btn-check"
                        id="syrup"
                        autocomplete="off"
                      />
                      <label class="btn" for="syrup">SYRUP </label>
                    </td>
                    <td><h5>₱ 79.00</h5></td>
                  </tr>
                  <tr>
                    <td>
                      <input
                        type="checkbox"
                        class="btn-check"
                        id="drizzle"
                        autocomplete="off"
                      />
                      <label class="btn" for="drizzle">DRIZZLE </label>
                    </td>
                    <td><h5>₱ 79.00</h5></td>
                  </tr>
                </tbody>
              </table>
              <button class="add-to-tray w-100 btn">ADD TO TRAY</button>
              <hr />
              <a href="user_viewpage.html" class="viewdetails"
                ><span class="hover-underline-animation"
                  >VIEW FULL DETAILS</span
                >
                <svg
                  id="arrow-horizontal"
                  xmlns="http://www.w3.org/2000/svg"
                  width="25"
                  height="5"
                  viewBox="0 0 46 16"
                >
                  <path
                    id="Path_10"
                    data-name="Path 10"
                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                    transform="translate(30)"
                  ></path>
                </svg>
              </a>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
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
