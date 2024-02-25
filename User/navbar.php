
<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div>
            <a href="user_home.php" class="navbarand">
                <img src="../assets/Images/logo2.png" width="50px" alt="logo2" />
            </a>
            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="../assets/Images/menu.png" width="50px" alt="menu" />
            </button>
        </div>
        <img src="../assets/Images/logo3.png" width="80px" class="istoria" alt="logo3" />
        <div class="navprofile">
            <a href="user_profile.php">
                <ion-icon name="person"></ion-icon>
            </a>
            <a href="user_tray.php">
                <ion-icon name="file-tray"></ion-icon>
            </a>
            <a href="user_messages.php">
                <ion-icon name="mail-unread"></ion-icon>
            </a>
        </div>
    </div>
</nav>
<div class="fixed-top" id="navbarToggleExternalContent" style="margin-top: 110px">
    <div class="navigations text-center">
        <ul>
            <li><a href="user_products.php">PRODUCTS</a></li>
            <li><a href="user_contact.php">CONTACT US</a></li>
            <li><a href="user_about.php">ABOUT US</a></li>
            <li><a href="user_reviews.php">REVIEWS</a></li>
            <li><a href="../Login/signup.php">JOIN US</a></li>
        </ul>
    </div>
</div>
<div class="sidebar">
    <img src="../assets/Images/email.png" class="side-icon" alt="email" />
    <img src="../assets/Images/ig.png" class="side-icon" alt="ig" />
    <img src="../assets/Images/fb.png" class="side-icon" alt="fb" />
    <p class="..side-text">ISTORIA COFFEE</p>
</div>
<script>
    var lastScrollTop = 0;
    var navbar = document.querySelector('.navigations');

    window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            navbar.classList.add('collaps');
        } else {
            navbar.classList.remove('collaps');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);
</script>
<style>
    .collaps {
        display: none;
    }
</style>