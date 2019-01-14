/*--------------------------------------------------------
Scrollpage
--------------------------------------------------------*/
$(window).bind("load resize", function () {
	var width = $(window).width();
	if (width <= 767) {
		$('header').onePageNav({
			easing: 'swing',
			filter: ':not(.external a)',
			scrollOffset: 0,
			scrollThreshold: 0.95
		});
		$('a.scroll_a,  .links-home a').click(function () {
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top - 0
			}, 500);
			return false;
		});
	} else {
		$('a.scroll_a, .links-home a').click(function () {
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top - 43
			}, 500);
			return false;
		});

		$('header').onePageNav({
			filter: ':not(.external a)',
			easing: 'swing',
			scrollOffset: 43,
			scrollThreshold: 0.95
		});
	}
});

/*--------------------------------------------------------
Tooltip
--------------------------------------------------------*/
$('.tooltip_1').poshytip({
				className: 'tip-twitter',
				showTimeout: 1,
				alignTo: 'target',
				alignX: 'center',
				offsetY: 5,
				allowTipHover: false,
				fade: true,
				slide: true
			})			
			
/*--------------------------------------------------------
Flexslider
--------------------------------------------------------*/
$(window).load(function() {
			$('.flexslider').flexslider({
                            slideshow: true, //Включение автопроигрывания слайдшоу (true/false)
                            animation: "fade",  //Выбор типа анимации (fade/slide)
                            pauseOnHover: true, //Включение паузы слайдшоу при наведении курсора мыши 
                            slideshowSpeed: 5000 
                        });
		});		
		
/*--------------------------------------------------------
Quote rotator
--------------------------------------------------------*/	

            $('#testimonials ul').quote_rotator({
                buttons: { next: 'Next', previous: 'Previous' }
            });

/*--------------------------------------------------------
Carousel
--------------------------------------------------------*/	
jQuery(document).ready(function() {
    jQuery('.mycarousel').jcarousel({
        scroll:1,
        wrap:"both"
    });
});

/*--------------------------------------------------------
Hover images icon
--------------------------------------------------------*/	
    //Set opacity on each span to 0%
    $(".icon-hover").css({'opacity':'0'});

	$('figure a').hover(
		function() {
			$(this).find('.icon-hover').stop().fadeTo(800, 1);
		},
		function() {
			$(this).find('.icon-hover').stop().fadeTo(800, 0);
		}
	)
/*--------------------------------------------------------
Gallery func
--------------------------------------------------------*/	
$(function(){
	// Initialize the gallery
	$('.thumbs a').touchTouch();

});
/*--------------------------------------------------------
Accordion
--------------------------------------------------------*/	
 jQuery('.accordion').each(function(){
    var $this = jQuery(this),
        $toggle = $this.find('dt');
    
    $toggle.click(function(){
      if( jQuery(this).next().is(':hidden') ) {
        $this.find('dt').removeClass('active').next().slideUp();
        jQuery(this).toggleClass('active').next().slideDown();
      }
      return false;
    });
    
  });
  
/*--------------------------------------------------------
Form validate and date
--------------------------------------------------------*/	  
$(".datepicker").datepicker();

// MENU MOBILE ===============================================================================

 $(document).ready(function(){   
		//When btn is clicked
	$(".btn-responsive-menu").click(function() {
		$("#top-nav").slideToggle(400);
		
	});
    
});

// SPAMLESS email link ============================
$(document).ready( function() {
		$('.e').emailLink();
	} );

// SEND Testimonial  ============================
jQuery(document).ready(function(){

	$('#contact-form').on("click", "#submit_contact", function(e){
		e.preventDefault();

		var action = $('#contact-form').attr('action');
		var data = $('#contact-form').serializeArray();

		$.ajax({

			url: action,
			data: data,
			datatype:'JSON',
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type:'POST',

			success: function(data) {
				$('#confirm_rez')
        		.fadeIn(500)
				.css('display','flex')
				.text('Ваш отзыв отправлен и будет опубликован в ближайшее время. Спасибо…')
				.delay(2000)
				.fadeOut(500);
				$('.reset').val('');
			},
			error: function(data) {
				var response = JSON.parse(data.responseText);
				var errorString = '';
		        $.each( response.errors, function( key, value) {
		            errorString += value + '\n' ;
		        });

				$('#confirm_rez')
        		.fadeIn(500)
				.css('display','flex')
				.text(errorString)
				.delay(4000)
				.fadeOut(500);
			}

		});

	});

});;

// SEND Message  ============================
jQuery(document).ready(function(){

	$('#cont-form').on("click", "#submit_cont", function(e){
		e.preventDefault();

		var action = $('#cont-form').attr('action');
		var data = $('#cont-form').serializeArray();

		$.ajax({

			url: action,
			data: data,
			datatype:'JSON',
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type:'POST',

			success: function(data) {
				$('#confirm_rez2')
        		.fadeIn(500)
				.css('display','flex')
				.text('Ваше сообщение отправлено. Спасибо…')
				.delay(2000)
				.fadeOut(500);
				$('.reset').val('');
			},
			error: function(data) {
				var response = JSON.parse(data.responseText);
				var errorString = '';
		        $.each( response.errors, function( key, value) {
		            errorString += value + '\n' ;
		        });

				$('#confirm_rez2')
        		.fadeIn(500)
				.css('display','flex')
				.text(errorString)
				.delay(4000)
				.fadeOut(500);
			}

		});

	});

});;

// CALLBACK Order  ============================
jQuery(document).ready(function(){

	$('#callback-form').on("click", "#submit_callback", function(e){
		e.preventDefault();

		var action = $('#callback-form').attr('action');
		var data = $('#callback-form').serializeArray();

		$.ajax({

			url: action,
			data: data,
			datatype:'JSON',
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type:'POST',

			success: function(data) {
				$('#confirm_rez2')
        		.fadeIn(500)
				.css('display','flex')
				.text('Ваша заявка отправлена. Мы перезвоним Вам в ближайшее время…')
				.delay(2000)
				.fadeOut(500);
				$('.reset').val('');
			},
			error: function(data) {
				var response = JSON.parse(data.responseText);
				var errorString = '';
		        $.each( response.errors, function( key, value) {
		            errorString += value + '\n' ;
		        });

				$('#confirm_rez2')
        		.fadeIn(500)
				.css('display','flex')
				.text(errorString)
				.delay(4000)
				.fadeOut(500);
			}

		});

	});

});;

// ============== Jquery Input Mask ===========
jQuery(document).ready(function(){
	$('input[name="phone_callback"]').mask('+0 (000) 000 00 00', {placeholder: "+_ (___) ___ __ __"});
	$('input[name="date"]').mask('00/00/0000');
});

// ======= Scroll To Top Button (GoUp)===============//
    jQuery.goup({
      containerColor: '#8de63f',
      containerRadius: 0,
      hideUnderWidth: 310,
});


// ======= Fancy Box ===============//
jQuery(document).ready(function(){
    $("a.gallery_image").fancybox(
	{						
	"overlayShow" : true, 
	"overlayOpacity" : 0.82,	
	"hideOnContentClick" : true,
	"centerOnScroll" : true
	});

});
