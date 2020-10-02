document.querySelector('i').addEventListener('click',
	function () {
		document.getElementById('#page');
    });
    
window.addEventListener('touchmove', event =>{
    console.log(event);
}, {passive: false});

$(document).ready(function(){
    $('.fa-user-circle').click(function(){
        $('.dropdown').toggle();
    });  
    
    $('.fa-bars').click(function(){
        $('#page').toggle('.fa-bars');
        $('ul').css('display', 'grid');
    });   
});


$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    // autoplay:false,
    // autoplayTimeout:3000,
    responsive:{
            0:{
                items:1,
                nav:true,
                responsiveClass:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                dots:false,
            }
        }
    })
});
	