<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/Images/Favicon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Src/Styles/style_user.css" />
    <title>Review</title>
</head>

<body>
    <?php include 'navbar.php' ?>
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
                <textarea name="" id="" cols="30" rows="10" placeholder="COMMENT"></textarea>
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