jQuery.fn.extend({
  toggleOwl: function(selector, options, destroy){
    return this.each(function(){
      $(this).find(selector).filter(function(){
        return $(this).parent().is(':visible');
      }).owlCarousel(options);
      
      $(this).on('shown.bs.tab', function(event){
        var target = $(event.target.getAttribute('href')).find(selector);
        if(!target.data('owlCarousel')){
          var owl = target.owlCarousel(options).data("owlCarousel");
        }
      });
      if(destroy === true){
        $(this).on('hide.bs.tab', function(event){
          var target = $(event.target.getAttribute('href')).find(selector);
          if(target.data('owl.carousel')){
            target.data('owl.carousel').destroy();
          }
        });        
      }
    });
  }
});

jQuery(function($) { 
  $('.toggleOwl').toggleOwl(' #tab1 .owl-carousel', {
    loop: true,
    items: 2,
    margin: 25,
    nav: false,
    touchDrag: false
  });

  $('.toggleOwl').toggleOwl('.owl-carousel.style2', {
    loop: true,
    items: 8,
    margin: 1,
    nav: false,
    touchDrag: false
  });
});

jQuery(function($) { 
  $('.no-toggleOwl .owl-carousel').owlCarousel({
    loop: true,
    items: 6,
    margin: 25,
    nav: false,
    touchDrag: false
  });
});