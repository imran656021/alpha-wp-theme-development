// ;
// (function($) {
//     $(document).ready(function() {
//         $('#post-formats-select.post-format').on('click', function() {
//             if ($(this).attr('id') == 'post-format-image') {
//                 $('#_alpha_image_information').show();
//             } else {
//                 $('#_alpha_image_information').hide();
//             }
//         })
//     });
// })('jQuery');
;
(function($) {
    $(document).ready(function() {

        $('#post-formats-select .post-format').click(function() {
            $post_formate = $(this).attr('id');
            if ($post_formate == "post-format-image") {
                $('#_alpha_image_information').show();
            } else {
                $('#_alpha_image_information').hide();
            }

        });
        if (alpha_pf.format != 'image') {
            $('#_alpha_image_information').hide();
        }



    });
})(jQuery);