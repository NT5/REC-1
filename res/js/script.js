(function ($) {
    $(function () {

        $('.button-collapse').sideNav({'edge': 'left'});
        $('.collapsible').collapsible();
        $('textarea.character-counter').characterCounter();
        $('select').material_select();
        $('ul.tabs').tabs({
            'swipeable': false,
            'onShow': function (tab) {
                // Materialize.fadeInImage(tab);
            }
        });
        $('.parallax').parallax();
        $('.scrollspy').scrollSpy();
        Materialize.showStaggeredList('.tabs');
        $(".dropdown-button").dropdown();
        $('.tooltipped').tooltip({
            delay: 50
        });
        $('.tap-target').tapTarget('open');
        $('.modal').modal('open');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space