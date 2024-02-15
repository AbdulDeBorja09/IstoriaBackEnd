<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Account</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div style="padding: 90px"></div>
    <div class="profile-title text-center">
        <h1>ACCOUNT</h1>
    </div>
    <div class="profile">
        <div class="col1">
            <div class="top">
                <h1>ACCOUNT DETAILS</h1>
                <a href="user_profile_edit.php"><img src="../assets/Images/editprofile.png" alt="editprofile" /></a>
            </div>
            <div class="bottom">
                <h1>ABDUL DE BORJA</h1>
                <h1>09896782912</h1>
                <h1>ABDULDB09</h1>
                <h1>91231 purok 4 Dila Bay laguna</h1>
                <button class="logout2" href="user_profile_history.php">
                    LOGOUT
                </button>
            </div>
        </div>
        <div class="col2">
            <div class="top">
                <h1>ORDER HISTORY</h1>
                <a href="user_profile.php">RETURN TO ACCOUNT DETAILS</a>
            </div>
            <div class="history-div">
                <table class="history-table table table-borderless">
                    <thead>
                        <tr>
                            <td>PRODUCT</td>
                            <td>TIME AND DATE</td>
                            <td>PAID WITH</td>
                            <td>ADDRESS</td>
                            <td>TOTAL</td>
                            <td>STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h2 class="productss">
                                    3 AMERICANO, 3 cappuccino, 3 cappuccino, 3 cappuccino
                                </h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h2 class="productss">3 AMERICANO, 3 cappuccino</h2>
                                <h1>size: 16 oz</h1>
                                <h1>add ons: espresso shot</h1>
                                <a href="user_review.php">
                                    <span>REVIEW</span>
                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="25" height="5"
                                        viewBox="0 0 46 16">
                                        <path id="Path_10" data-name="Path 10"
                                            d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                            transform="translate(30)"></path>
                                    </svg>
                                </a>
                                <div class="historyline"></div>
                            </td>
                            <td>
                                <h1>02/12/2024</h1>
                                <h1>4:03 PM</h1>
                            </td>
                            <td>
                                <h1>CASH</h1>
                            </td>
                            <td class="address">
                                <h1>#221 purok 5 lower dagsian, baguio city, silver gate</h1>
                            </td>
                            <td>
                                <h1>100.00</h1>
                            </td>
                            <td>
                                <h1>COMPLETED</h1>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/Src/Javascript/index.js"></script>
    <script src="/Src/Javascript/main.js"></script>
</body>

</html>