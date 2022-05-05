let scrolls = window.scrollY;
const header = document.querySelector(".top-header");
const banner = document.querySelector(".banner");
const header_height = header.offsetHeight;

// TODO fixed Nav
// window.addEventListener("scroll", function () {
//   scrolls = window.scrollY;

//   if (scrolls >= header_height) {
//     $("nav.top-header").addClass("bg-blur");
//     $("li.nav-item a").removeClass("text-light").addClass("text-black");
//     $(".dropdown-toggle").removeClass("text-white").addClass("text-black");
//   } else {
//     $("nav.top-header").removeClass("bg-blur");
//     $("li.nav-item a").removeClass("text-black").addClass("text-light");
//     $(".dropdown-toggle").removeClass("text-black").addClass("text-white");
//   }
// });

// pharmacies carousel
$(function () {
  if ($(".owl-2").length > 0) {
    $(".owl-2").owlCarousel({
      center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      rtl: true,
      smartSpeed: 2000,
      autoplay: true,
      nav: true,
      dots: true,
      pauseOnHover: false,
      responsive: {
        300: {
          margin: 20,
          nav: true,
          items: 1,
        },
        500: {
          margin: 20,
          nav: true,
          items: 2,
        },
        600: {
          margin: 20,
          nav: true,
          items: 3,
        },
        1000: {
          margin: 20,
          nav: true,
          items: 4,
        },
      },
    });
  }
});

$("#search-select").dropdown();
