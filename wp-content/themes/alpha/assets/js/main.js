;
(function($) {
    $(document).ready(function() {
        $('.popup').each(function() {
            $img_src = $(this).find("img").attr('src');
            $(this).attr('href', $img_src);

        });

        var slider = tns({
            container: '.slider',
            speed: 300,
            autoplayTimeout: 3000,
            item: 1,
            autoHeight: true,
            controls: false,
            nav: false,
            autoplayButtonOutput: false,
            autoplay: true
        });


    });
})(jQuery);