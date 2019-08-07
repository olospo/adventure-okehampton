$(".mobile_menu").click(function() {
  $('nav.mobile').fadeToggle();
  $(this).toggleClass("open");
});

$(window).resize(function() { // Hide Mobile Menu if Browser window goes above 768px
  var width = $(this).width(); // The window width
  if (width > 768) {
    $('nav.mobile').hide();
    
    // Back to Top Scroll 
    var amountScrolled = 100;
    
    $(window).scroll(function() {
    	if ( $(window).scrollTop() > amountScrolled ) {
    		$('a.back_to_top').fadeIn('slow');
    	} else {
    		$('a.back_to_top').fadeOut('slow');
    	}
    });
    
    $('a.back_to_top').click(function() {
    	$('html, body').animate({
    		scrollTop: 0
    	}, 700);
    	return false;
    });

    
    
  }
});

$('.quick.slide_one').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 1000,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  centerMode: true,
  centerPadding: 0
});

$('.quick.slide_two').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 1000,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  centerMode: true,
  centerPadding: 0
});

$('.quick.slide_three').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 1000,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  centerMode: true,
  centerPadding: 0
});


$('.testimonials').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 700,
  autoplaySpeed: 5000,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
});

$('#cff').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 1000,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  centerMode: true,
  centerPadding: 0
});


$('.activity-slider').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 700,
  slidesToShow: 3,
  slidesToScroll: 3,  
  responsive: [
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
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

$('.accordion-slide').slick({
  autoplay:true,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  speed: 700,
  slidesToShow: 2,
  slidesToScroll: 2
});

$('.activity-scroll').slick({
  autoplay:true,
  dots: false,
  infinite: true,
  cssEase: 'linear',
  speed: 700,
  slidesToShow: 5,
  slidesToScroll: 5,  
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 3,
        slidesToScroll:3
      }
    },
    {
      breakpoint: 600,
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


// SVG as Images
$(function(){
  activate('img[src*=".svg"]');
  function activate(string){
    jQuery(string).each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
        jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');
        
        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
          $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Replace image with new SVG
        $img.replaceWith($svg);

      }, 'xml');
    });
  }
});

// Accordian
var accItem = document.getElementsByClassName('accordionItem');
  var accHD = document.getElementsByClassName('accordionItemHeading');
  for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
  }
  function toggleItem() {
      var itemClass = this.parentNode.className;
      for (i = 0; i < accItem.length; i++) {
          accItem[i].className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
          this.parentNode.className = 'accordionItem open';
      }
  }