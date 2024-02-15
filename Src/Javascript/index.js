// JavaScript to handle scroll and toggle behavior
let lastScrollTop = 0;

window.addEventListener(
  "scroll",
  function () {
    let currentScroll =
      window.pageYOffset || document.documentElement.scrollTop;
    if (currentScroll > lastScrollTop) {
      // Downscroll code
      document
        .getElementById("navbarToggleExternalContent")
        .classList.add("collapse");
    } else {
      // Upscroll code
      document
        .getElementById("navbarToggleExternalContent")
        .classList.add("collapse");
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  },
  false
);

// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


