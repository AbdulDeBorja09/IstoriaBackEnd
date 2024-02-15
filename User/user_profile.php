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
    <title>Account</title>
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
      <img src="../assets/Images/email.png" class="side-icon" alt="email"/>
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>
    <div class="profile-title text-center">
      <h1>ACCOUNT</h1>
    </div>
    <div class="profile">
      <div class="col1">
        <div class="top">
          <h1>ACCOUNT DETAILS</h1>
          <a href="user_profile_edit.html"
            ><img src="../assets/Images/editprofile.png" alt="editprofile"
          /></a>
        </div>
        <div class="bottom">
          <h1>ABDUL DE BORJA</h1>
          <h1>09896782912</h1>
          <h1>ABDULDB09</h1>
          <h1>91231 purok 4 Dila Bay laguna</h1>
          <a href="user_profile_history.html">VIEW ORDER HISTORY</a>
          <br />
          <button class="logout-button"><span> LOGOUT </span></button>
        </div>
      </div>
      <div class="col2">
        <div class="top">
          <h1>ORDER STATUS</h1>
        </div>
        <div class="content">
          <div class="inner">
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>3 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
            </div>
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>2 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
            </div>
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>1 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
            </div>
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>1 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
            </div>
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>5 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
            </div>
            <div class="products">
              <div class="div1">
                <h5>02/12/2024 4:25 p.m.</h5>
                <h2>3 cappuccino</h2>
                <h3>size: 16 oz</h3>
                <h4>add ons: espresso shot</h4>
                <h6>PICKUP</h6>
                <a href="user"></a>
              </div>
              <div class="div2">
                <a href="user_pickup_receipt.html">
                  <span class="hover-underline-animation">SEE ORDER</span>
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
              </div>
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
