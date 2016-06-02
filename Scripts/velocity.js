// Scroll links from menu Velocity
$(document).ready(function(){
	$( ".scroll-link").on('click',function (e) {
	    e.preventDefault();
			$('#nav-bar a').removeClass('current');
			$(this).addClass('current');
				
	   	var target = this.hash,
	   	$target = $(target);
			
			$target
    	.velocity("scroll", { duration: 500, offset: -0, easing: "linear" })
    	.velocity({ opacity: 1 });
			
	});
});                                                                                                                                                    