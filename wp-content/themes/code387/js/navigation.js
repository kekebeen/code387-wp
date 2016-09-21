function scrollAnchor(){
    $('nav a').click(function(){
        console.log($(this).attr('href'));
        $('html, body').stop().animate({
            scrollTop: $( $(this).attr('href') ).offset().top - 160
        }, 400);
        return false;
    })
};

( function() {
    var nav = $('#main-nav');
    var waypoint = new Waypoint({
      element: $('#work-section'),
      handler: function(direction) {
        /*alert('Basic waypoint triggered');*/
        if(direction === 'down'){
            nav.addClass('sticky');
        }else{
            nav.removeClass('sticky');
            nav.removeAttr("style");
        }
      },
      offset: '25%'
    });
    //initialize scroll nav
    scrollAnchor();
})();


