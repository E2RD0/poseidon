"use strict";

(function() {
    var burger = document.querySelector(".burger-container"),
    nav = document.querySelector(".navbar--main");

    burger.onclick = function() {
        nav.classList.toggle("menu-opened");
        document.body.classList.toggle("no-scroll");
    };

    document.addEventListener("click", function(event) {
    var isClickInside = nav.contains(event.target);

    if (!isClickInside && nav.classList.contains("menu-opened")) {
      nav.classList.remove("menu-opened");
      document.body.classList.toggle("no-scroll");
    }
  });
})();