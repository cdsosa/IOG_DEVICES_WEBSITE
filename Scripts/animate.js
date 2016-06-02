$(document).ready(function(){
    $('#products-drop').each(function() {
				animationHover(this, 'fadeIn');
    });
});
    
    function animationHover(element, animation){
    element = $(element);
    element.hover(
        function() {
            element.find('ul').addClass('animated ' + animation);        
        },
        function(){
            //wait for animation to finish before removing classes
            window.setTimeout( function(){
                element.find('ul').removeClass('animated ' + animation);
            }, 2000);         
        });
}

