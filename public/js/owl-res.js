$(function() {

  $('.b-gallery-thumb').each(function() {

    var detail = $(this).children('.js-thumb-gallery-detail'),
      thumbs = $(this).children('.js-thumb-gallery-thumbs');
    thumbGallery(detail, thumbs);
  });

  function thumbGallery(nameDetail, nameThumbs) {
    /*
    Thumb Gallery
    */
    var thumbGalleryDetail = $(nameDetail),
      thumbGalleryThumbs = $(nameThumbs),
      flag = false,
      duration = 300;

    thumbGalleryDetail
      .owlCarousel({
        items: 1,
        margin: 10,
        nav: true,
        dots: false,
        loop: false,
        navText: []
      })
      .on('changed.owl.carousel', function(e) {
        if (!flag) {
          flag = true;
          thumbGalleryThumbs.trigger('to.owl.carousel', [e.item.index - 1, duration, true]);
          flag = false;
        }
      });

    thumbGalleryThumbs
      .owlCarousel({
        margin: 10,
        items: 5,
        nav: true,
        navText: ['', ''],
        center: false,
        dots: false
      })
      .on('click', '.owl-item', function(e) {
        e.preventDefault();
        thumbGalleryDetail.trigger('to.owl.carousel', [$(this).index(), duration, true]);
      })
      .on('changed.owl.carousel', function(e) {
        if (!flag) {
          flag = true;
          thumbGalleryDetail.trigger('to.owl.carousel', [e.item.index, duration, true]);
          flag = false;
        }
      });
  }
});