$(".mobile_menu").click(function() {
  $('nav.mobile').fadeToggle();
});

$(window).resize(function() { // Hide Mobile Menu if Browser window goes above 768px
  var width = $(this).width(); // The window width
  if (width > 768) {
    $('nav.mobile').hide();
  }
  if (width < 768) {
    $('.search_form').hide();
  }
});

$('.slick-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 680,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});