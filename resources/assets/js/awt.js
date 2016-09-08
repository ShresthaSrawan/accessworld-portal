$(document).bind('DOMNodeInserted', function(event) {
    if( $( window ).width() > 768 )
        $(window).trigger('resize').trigger('scroll');
});
$(document).ready(function(){
    $(".slick-carousel").each(function(){
    	var arrows = $(this).data('arrows') == true ? true: false;
    	$(this).slick({
            "lazyLoad": 'ondemand',
	        "autoplay": true,
	        "infinite": true,
	        "arrows": arrows,
	        "prevArrow": "<button class='slick-prev btn btn-raised btn-flat ink-reaction btn-primary-light'><i class='fa fa-chevron-left'></i></button>",
	        "nextArrow": "<button class='slick-next btn btn-raised btn-flat ink-reaction btn-primary-light'><i class='fa fa-chevron-right'></i></button>"
	    });
	});
    var flagDisplay = function () {
        $( '#dataCenters' ).on( 'change', function () {
            data_center_id = $( '#dataCenters :selected' ).val();

            flag = $( '#dcCountryFlag' + data_center_id );

            $('.dc-country-flag').addClass('hidden');
            $(flag).removeClass('hidden');
        } );   
    }
    if($('#dataCenters').length) {
        flagDisplay();
        $('#dataCenters').change();
    }
});
