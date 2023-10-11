jQuery(document).ready(function($) {
    // Sidebar slide
    $(".btn-sidebar").click(function(){
        $(".sidebar-button").toggleClass("active");
        $(".sidebar").toggleClass("active");
    });


    // Back to top
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.back-to-top').css({
                bottom: "100px"
            });
        } else {
            jQuery('.back-to-top').css({
                bottom: "-100px"
            });
        }
    });
    jQuery('.back-to-top').click(function () {
        jQuery('html, body').animate({
            scrollTop: '0px'
        }, 1800);
        return false;
    });


    // Fade in on scroll
    $(window).scroll( function(){
        $('.fade-in').each( function(i){
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).animate({'opacity':'1'},1500);
            }
        });
    });

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
});