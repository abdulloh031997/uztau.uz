$(document).ready(function() {
    $("#lightGallery").lightGallery();
});
$('.partner__car').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});

$('.date_plan').owlCarousel({
    loop: false,
    navClass:false,
    navText: false,
    margin: 10,
    nav: false,
    dots:false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});