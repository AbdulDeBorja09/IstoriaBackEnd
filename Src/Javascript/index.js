let lastScrollTop = 0;
if (document.getElementById("navbarToggleExternalContent")) {
  window.addEventListener(
    "scroll",
    function () {
      let currentScroll =
        window.pageYOffset || document.documentElement.scrollTop;
      if (currentScroll > lastScrollTop) {
        document
          .getElementById("navbarToggleExternalContent")
          .classList.add("collapse");
      } else {
        document
          .getElementById("navbarToggleExternalContent")
          .classList.add("collapse");
      }
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    },
    false
  );
}

let list = document.querySelectorAll(".navigation li");
if (list.length > 0) {
  function activeLink() {
    list.forEach((item) => {
      item.classList.remove("hovered");
    });
    this.classList.add("hovered");
  }
  list.forEach((item) => item.addEventListener("mouseover", activeLink));
}

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

if (toggle && navigation && main) {
  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };
}
