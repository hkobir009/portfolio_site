
//(function ($) {
//SCROLL TO TOP
	function topFunction(){
			window.scrollTo({top: 0, behavior:"smooth"});
		}
    //STICKY MENU
		var topbutton = document.getElementById("topbtn");
		window.onscroll = function(){scrollFunction()};
		function scrollFunction(){
			if(document.body.scrollTop > 90 || document.documentElement.scrollTop > 90){
				$("#header").addClass("sticky");
				topbutton.style.display = "block";
				
			}else{
				$("#header").removeClass("sticky");
				topbutton.style.display = "none";
			}
		}
    
//  Mobile Menu 
   $(document).on('click','.navbar-btn , .mobile-menu li a',function(){
       if($('#header').hasClass("mobile-nav-active")){
            $('#header').removeClass('mobile-nav-active')
           $('.navbar-btn span').addClass('icofont-navigation-menu')
            $('.navbar-btn span').removeClass('icofont-close')
       }else{
           $('#header').addClass('mobile-nav-active')
           $('.navbar-btn span').addClass('icofont-close')
           $('.navbar-btn span').removeClass('icofont-navigation-menu')
       }
    });
/*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

//   Smooth Scroll Script
    $('.scroll_mouse a').smoothScroll();

    /*------------------
        Skill JS
    --------------------*/
    $('.progress-bar').each(function () {
        const parcent = $(this).data('value')
            $(this).css('width',parcent)
    });
        
// jQuery counterUp
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1500
  });
    

    
//  Testtmonial Script
    $(".testmonial-carousel").owlCarousel({
        margin:0,
    autoplay: false,
    loop: true,
    dots:true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        992: {
            items: 3
        }
    }
});

    var typed = new Typed('.animate', {
    strings: [
        "Laravel Developer",
        "Full Stack Web Developer"
        
    ],
    loop: true,
    typeSpeed: 50,
    backSpeed:50,
})
        

  
