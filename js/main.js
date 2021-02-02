jQuery(document).ready(function() {
	jQuery(".menus-toggle").click(function(){
		jQuery(".header_id").toggle(); 
		jQuery(".menus-toggle div").toggleClass("change");
	});

	jQuery('.header_slider').slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
	});
});	
 
var mql = window.matchMedia("screen and (min-width: 992px)")
if (mql.matches){ 
 jQuery(document).ready(function(){
	
    jQuery('.pos').each(function(){  
      var highestBox = 0;
      jQuery('.eq_height', this).each(function(){
        if(jQuery(this).height() > highestBox) {
          highestBox = jQuery(this).height(); 
        }
      });  
         jQuery('.eq_height',this).height(highestBox);
    });
});	
}

jQuery(document).ready(function() {
	jQuery('#ResentProj').carousel({
	interval: 10000
	}) 
    
});


jQuery(document).ready(function() {

	jQuery('#other_field').hide();

	jQuery('#opt_services').on('change', function(){
		var thhhis = jQuery(this).val();
		if (thhhis == 'Other') {
			jQuery('#other_field').css("margin-bottom", "11px").slideDown(); 	
		 	jQuery ('input[type="date"], input[type="time"], input[type="datetime-local"], input[type="week"], input[type="month"], input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="tel"], input[type="number"], textarea').css("margin-bottom", "5px");
			jQuery('.banner-form .wpcf7-form p label').css("margin-bottom","12px");
			jQuery ('.Services .wpcf7-select').css("margin-bottom", "5px");
		 
			
			
		}else{
			jQuery('#other_field').slideUp();	
	 		jQuery ('input[type="date"], input[type="time"], input[type="datetime-local"], input[type="week"], input[type="month"], input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="tel"], input[type="number"], textarea').css("margin-bottom", "18px");
 	jQuery('.banner-form .wpcf7-form p label').css("margin-bottom","6px");
 	jQuery ('.Services .wpcf7-select').css("margin-bottom", "18px");
		}	
	});
  	
});

	$(window).scroll(function(){
	  var sticky = $('.site-header'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed');
	  else sticky.removeClass('fixed');
	});


document.addEventListener( 'wpcf7mailsent', function( event ) {
		if ( '164' == event.detail.contactFormId ) { //if the form if equals #101
		 location = 'https://vidhyaarchitects.com/thank-you/';
		}

		}, false );

