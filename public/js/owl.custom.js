$(document).ready(function () {
  $("#owl-recommend").owlCarousel({
     rtl:false,
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
      0:{
        items:3
      },
      600:{
        items:3
      },
      1000:{
        items:3
      }
    }
  });
});

$(document).ready(function () {
  $("#owl-promotion").owlCarousel({
    autoPlay: 3000,
    items: 2,
    itemsDesktop: [1199, 2],
    itemsDesktopSmall: [979, 2],
    itemsTablet: [768, 2],
    itemsMobile: [479, 1],


    // Navigation
    navigation: false,
    rewindNav: true,
    scrollPerPage: false,


    //Mouse Events
    dragBeforeAnimFinish: true,
    mouseDrag: true,
    touchDrag: true,

    //Pagination
    pagination: true,
    paginationNumbers: false,
  });

});


$(document).ready(function () {
  $("#owl-product-detail").owlCarousel({
     rtl:false,
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
      0:{
        items:3
      },
      600:{
        items:3
      },
      1000:{
        items:3
      }
    }
  });

});


$(document).ready(function () {
  $("#owl-product").owlCarousel({
    items: 4,
    lazyLoad: true,
    autoPlay: true,
    navigation: true,
    navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    pagination: false,
  });
});

$(document).ready(function () {
  $("#owl-new").owlCarousel({
    autoPlay: 3000,
    items: 1,
    itemsDesktop: [1199, 1],
    itemsDesktopSmall: [979, 1],
    itemsTablet: [768, 1],
    itemsMobile: [479, 1],


    // Navigation
    navigation: false,
    rewindNav: true,
    scrollPerPage: false,


    //Mouse Events
    dragBeforeAnimFinish: true,
    mouseDrag: true,
    touchDrag: true,

    //Pagination
    pagination: true,
    paginationNumbers: false,
  });

});





  $('#owl-blog').owlCarousel({
    items:1,
    loop:true,
    lazyLoad:true,
    margin:10,
    autoplay:5000,
    nav:true,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    dots: false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:1
      }
    }
  })

