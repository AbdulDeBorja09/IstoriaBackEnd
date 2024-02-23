<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
    }
    $sort_order = "";
    if (isset($_GET['sort'])) {
        $sort_option = $_GET['sort'];
        switch ($sort_option) {
            case 'low_high':
                $sort_order = "ORDER BY price ASC";
                break;
            case 'high_low':
                $sort_order = "ORDER BY price DESC";
                break;
            case 'alphabetical':
                $sort_order = "ORDER BY name ASC";
                break;
            default:
                $sort_order = ""; 
                break;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Istoria</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="container">
        <div class="coffee_title">
            <h1>SPECIALS</h1>
        </div>
        <div class="subnav-coffee">
            <div class="left">
                <button class="btn">
                    <ion-icon name="chevron-back-circle" onclick="history.back()"></ion-icon>
                </button>
                <?php
                  $select_prodcut = mysqli_query($conn, "SELECT * FROM `products` WHERE category ='specials'") or die ('queryfailed');
                  $num_of_product = mysqli_num_rows($select_prodcut);
                  ?>
                <h1><?php echo $num_of_product; ?> PRODUCTS</h1>
            </div>
            <button class="sortby btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                SORT BY:
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?sort=low_high">Price: Low - High</a></li>
                <li><a class="dropdown-item" href="?sort=high_low">Price: High - Low</a></li>
                <li><a class="dropdown-item" href="?sort=alphabetical">Alphabetically</a></li>
            </ul>
        </div>
        <div class="coffe-flex">
            <?php 
           $select_prodcuts = mysqli_query($conn, "SELECT * FROM `products` WHERE category ='specials' AND status = 'available' $sort_order") or die ('query failed');
          if(mysqli_num_rows($select_prodcuts)>0){
              while($fetch_products = mysqli_fetch_assoc($select_prodcuts)){
          ?>
            <div class="box">
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                    <div class="enlargebox">
                        <button class="enlarge btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </div>
                    <br />
                    <a class="viewpagelink" href="user_viewpage.php?pid=<?php echo $fetch_products['id']; ?>">
                        <input name="product_id" type="hidden" value="<?php echo $fetch_products['id']; ?>">
                        <input name="product_name" type="hidden" value="<?php echo $fetch_products['name']; ?>">
                        <input name="product_category" type="hidden" value="<?php echo $fetch_products['image']; ?>">
                        <input name="product_range type=" hidden value="<?php echo $fetch_products['price_range']; ?>">
                        <img src="../products/<?php echo $fetch_products['image']; ?>" alt="coffee" />
                        <div class="description">
                            <h5><?php echo $fetch_products['name']; ?></h5>
                            <h6><?php echo $fetch_products['price_range']; ?></h6>
                            <div class="star">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                        </div>
                    </a>
                </form>
            </div>
            <?php  
            }
              }else{
              echo '
              <div class="container text-center" style="padding: 200px; 100px">
                  <h1>No Available Products yet</h1>
              </div>
              ';
            }
            ?>
        </div>
    </div>
    <div style="padding: 150px"></div>
    <?php include 'footer.php' ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" style="background-color: white">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="modal-coffee-img" src="../assets/Images/5.png" alt="coffee" />
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
                        <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off"
                            checked />
                        <label class="btn" for="option5">HOT</label>

                        <input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off" />
                        <label class="btn" for="option6">ICED</label>

                        <h6>ADD ONS</h6>

                        <table class="addonts-table w-50" style="background-color: #f6f3f1">
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="btn-check" id="espresso" autocomplete="off" />
                                        <label class="btn" for="espresso">ESPRESSO SHOT</label>
                                    </td>
                                    <td>
                                        <h5>₱ 79.00</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="btn-check" id="sauce" autocomplete="off" />
                                        <label class="btn" for="sauce">SAUCE </label>
                                    </td>
                                    <td>
                                        <h5>₱ 79.00</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="btn-check" id="syrup" autocomplete="off" />
                                        <label class="btn" for="syrup">SYRUP </label>
                                    </td>
                                    <td>
                                        <h5>₱ 79.00</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="btn-check" id="drizzle" autocomplete="off" />
                                        <label class="btn" for="drizzle">DRIZZLE </label>
                                    </td>
                                    <td>
                                        <h5>₱ 79.00</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="add-to-tray w-100 btn">ADD TO TRAY</button>
                        <hr />
                        <a href="user_viewpage.php" class="viewdetails"><span class="hover-underline-animation">VIEW
                                FULL DETAILS</span>
                            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                viewBox="0 0 46 16">
                                <path id="Path_10" data-name="Path 10"
                                    d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                    transform="translate(30)"></path>
                            </svg>
                        </a>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/Src/Javascript/index.js"></script>
    <script src="/Src/Javascript/main.js"></script>
</body>

</html>