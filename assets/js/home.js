$(document).ready(function() {
  smallBannersBox();
});

function smallBannersBox() {

  $('.small-banners-box').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });
}

function smallBannersHoteis() {
  $('.small-banners-hoteis').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    centerPadding: '40px',
    dots: false,
    arrows: true,
    responsive: [
    {
      breakpoint: 1900,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 1756,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 937,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });
}

function smallBannersFlyPass() {
  $('.small-banners-fly-pass').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    centerPadding: '40px',
    dots: false,
    arrows: true,
    responsive: [
    {
      breakpoint: 1900,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 1756,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 937,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });
}

function boxSliderMoneyNews() {
  $('.box-slider-money-news').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [
    {
      breakpoint: 1178,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 531,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });
}

function sliderNews() {

  $('.slider-news').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
    {
      breakpoint: 1178,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 531,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });
}