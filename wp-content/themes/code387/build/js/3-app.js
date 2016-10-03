
function scrollAnchor(){
    $nav  = $('nav a'),
    $body = $('html, body');

    $nav.click(function(){
        $body.stop().animate({
            scrollTop: $( $(this).attr('href') ).offset().top - 160
        }, 400);
        return false;
    })
};
function stickyNav(){
    var nav = $('#main-nav'),
        waypoint = new Waypoint({
            element: $('#work-section'),
            handler: function(direction) {
                if(direction === 'down'){
                    nav.addClass('sticky');
                }else {
                    nav.removeClass('sticky');
                    nav.removeAttr('style');
                }
            },
            offset: '25%'
        });
};

( function() {
    console.log('===========================');
    console.log('Initializing components');    
    stickyNav();
    scrollAnchor();
})(jQuery);


