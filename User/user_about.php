<?php
    include '../connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if (!isset($user_id)){
        header('location:../login/login.php');
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