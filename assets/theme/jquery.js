$(document).ready(function() {
    // $('.nav-link-collapse').on('click', function() {
    //     $('.nav-link-collapse').not(this).removeClass('nav-link-show');
    //     $(this).toggleClass('nav-link-show');
    // });
    $(".nav-item").on('click', function() {

        $(".nav-item").addClass('active');
        $(".nav-item").not(this).removeClass('active');
        $(".not").removeClass('active');
    });
    $(".second").on('click', function() {

        $(".second").addClass('active-second');
        $(".second").not(this).removeClass('active-second');
        // $(".not").removeClass('active-second');
    });
});
