
$(document).ready(function(){

    //var div_top = $('#content-anchor').offset().top;  
        //$('.lnav').addClass('fix-nav');
       
	//this code is for the gmap
	

//$('.nav>li:nth-child(4)>a').attr('href','gallery.php?type=all');
//$('.nav>li:nth-child(5)>a').attr('href','bv.php');


$(window).bind('scroll', function () {
    if ($(window).scrollTop() > 0) {
        $('.lnav').addClass('fix-nav');
    } else {
        $('.lnav').removeClass('fix-nav');
    }
});


});


