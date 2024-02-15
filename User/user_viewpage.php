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
      <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
      <img src="../assets/Images/fb.png" class="side-icon" alt="fb"/>
      <p class="..side-text">ISTORIA COFFEE</p>
    </div>
    <div style="padding: 90px"></div>

    <div class="viewpage-title container">
      <h1 class="viewpage-title-coffe">COFFEE</h1>
      <div class="subnav-global">
        <button class="btn">
          <ion-icon
            name="chevron-back-circle"
            onclick="history.back()"
          ></ion-icon>
        </button>
      </div>
      <div class="viewpagediv row">
        <div class="col-lg-6">
          <img class="modal-coffee-img" src="../assets/Images/5.png" alt="coffee"/>
        </div>
        <div class="view-div-2 col-lg-6">
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
          <label class="radiolabel btn" for="option5">HOT</label>

          <input
            type="radio"
            class="btn-check"
            name="options-base"
            id="option6"
            autocomplete="off"
          />
          <label class="btn" for="option6">ICED</label>
          <h6>SIZE</h6>
          <input
            type="radio"
            class="btn-check"
            name="size"
            id="small"
            autocomplete="off"
            checked
          />
          <label class="btn" for="small">16 OZ</label>

          <input
            type="radio"
            class="btn-check"
            name="size"
            id="large"
            autocomplete="off"
          />
          <label class="btn" for="large">22 OZ</label>

          <h6>ADD ONS</h6>

          <table
            class="viewaddonts-table w-50"
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
          <div class="viewbtn">
            <button class="add-to-traybtn w-100 btn">ADD TO TRAY</button>
            <a href="user_tray.html " class="view btn w-100">VIEW TRAY</a>
          </div>
        </div>
      </div>
    </div>
    <div style="padding: 50px"></div>
    <hr />
    <div class="review container">
      <h1>CUSTOMER REVIEWS</h1>
      <div class="star-rating-container">
        <div class="overallrating">
          <div class="starstatic">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <p>35 REVIEWS</p>
        </div>
        <div class="detailrating">
          <div class="guidestar">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <div class="guidestar">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <div class="guidestar">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <div class="guidestar">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
          </div>
          <div class="guidestar">
            <ion-icon name="star"></ion-icon>
          </div>
        </div>
      </div>
      <hr />
      <div class="reviewsrcollbox">
        <div class="scrollbox">
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile2" />
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil
                excepturi beatae, nisi doloribus atque optio sapiente dolorem
                ipsa, deleniti labore blanditiis quae non ipsam et voluptatum
                repellendus assumenda unde aliquid.
              </p>
              <hr />
            </div>
          </div>
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile2"/>
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam
                possimus maxime quam fuga cum, eaque commodi asperiores vitae
                minus laboriosam earum voluptatem eum iste ea expedita eius non
                autem repellat?
              </p>
              <hr />
            </div>
          </div>
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile" />
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil
                excepturi beatae, nisi doloribus atque optio sapiente dolorem
                ipsa, deleniti labore blanditiis quae non ipsam et voluptatum
                repellendus assumenda unde aliquid.
              </p>
              <hr />
            </div>
          </div>
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile2"/>
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Labore, harum omnis laboriosam hic veniam iste expedita magni
                animi ipsa deleniti quasi id eaque eum dignissimos odio.
                Deserunt id iusto ullam!
              </p>
              <hr />
            </div>
          </div>
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile2" />
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
                dolore ullam natus labore! Minus deserunt delectus animi, ipsum
                totam facilis voluptatum illo, enim sint sapiente impedit
                eligendi eius? Repellendus, ut.
              </p>
              <hr />
            </div>
          </div>
          <div class="reivewbox">
            <div class="reviewtop">
              <img src="../assets/Images/profile2.png" width="50px" alt="profile2"/>
              <div class="reviewdets">
                <div class="reviewdetstars">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <p>02/10/2024</p>
                </div>
                <h6>ANONYMOUS USER</h6>
                <h5>CAPPUCINO, ICED 22 OZ</h5>
              </div>
            </div>
            <div class="reviewbot">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Inventore dignissimos tempore cupiditate perspiciatis culpa
                voluptatem explicabo, sunt ullam nam nemo minus voluptatum
                laudantium illo iusto voluptates facere ex facilis deleniti.
              </p>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div style="padding: 50px"></div>
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
