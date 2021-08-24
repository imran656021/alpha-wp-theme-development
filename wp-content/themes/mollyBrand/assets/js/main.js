$(document).ready(function() {

    $('.carousel').carousel({
            interval: 2000
        })
        // misitup portfolio section
    var mixer = mixitup('.filter-data');

    $(window).scroll(function() {
        if ($(window).scrollTop() >= 400) {
            $('#nav-bar').addClass('sticky');
        } else {
            $('#nav-bar').removeClass('sticky');
        }
    });

    $(".navbar-nav .nav-link").on("click", function() {
        $(".navbar-nav").find(".active").removeClass("active");
        $(this).addClass("active");
    });
})