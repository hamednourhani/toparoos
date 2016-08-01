
jQuery(document).ready(function($){
	
	// setTimeout(function(){ 
	// 	window.loading_screen.finish();
	//  }, 1000);

	// $('nav.main-menu').scrollToFixed({
	// 	minWidth : 945,
	// });

    $('aside,article').onScreen({
	   container: window,
	   direction: 'vertical',
	  
	   doIn: function() {
	     // Do something to the matched elements as they come in
	   },
	   doOut: function() {
	    // Do something to the matched elements as they get off scren
	   },
	   tolerance: 0,
	   throttle: 250,
	   toggleClass: 'onScreen',
	   lazyAttr: null,
	   lazyPlaceholder: 'someImage.jpg',
	   debug: false
	});

	$('a#register-show').click(function(event){
		event.preventDefault();
		$('.register-container').toggleClass('form-display');
		$('.login-container').removeClass('form-display');
	});

	$('a#login-show').click(function(event){
		event.preventDefault();
		$('.login-container').toggleClass('form-display');
		$('.register-container').removeClass('form-display');
	});

	// setTimeout(function(){
	// 	window.loading_screen.finish();
	// },2000);

	$('a#searchToggler').click(function(event) {
		$('div#menuSearchArea').fadeToggle();
	});
	
	$('.searchform i.fa-search').click(function(event){
		console.log("search query");
		$(this).parent().parent(".searchform").trigger("submit");
	});
	
	$('a#menu-toggler').click(function(){
		console.log('click on menu toggler');
		var responsive_container = $('div#responsive-menu');
		var close_button = responsive_container.children('a#close-responsive');
		var body = $('body');
		var menu_width = responsive_container.width();
		var window_height = $(window).height();
		var window_width = $(window).width();
		
		
		responsive_container.addClass('show-menu').css({
									'height' : window_height,
									'width' : window_height,
								});
		body.css({
			'overflow' : 'hidden',
		});

		

		close_button.click(function(event){
			//event.stopPropagination();
			
			body.css({
					'overflow' : 'auto',
				});
			responsive_container.css({
										'width' : menu_width,
									}).removeClass('show-menu');
			
	

		});

		// body_wrapper.click(function(event){
		// 	event.stopPropagination();
		// 	responsive_container.removeClass('show-menu');

		// });

	});

	if(typeof $.fn.owlCarousel !== 'undefined') {
		var owl = $('.owl-carousel').owlCarousel({
			margin:1,
			responsiveClass: true,
			nav: false,
			loop: true,
			mouseDrag: true,
			touchDrag: true,
			autoplayTimeout : 2000,
			autoplay : true,
			autoplayHoverPause : true,
			autoplaySpeed : 1000,
			responsive: {
				0: {
					items: 1,
				},
				500: {
					items: 2,
				},
				800: {
					items: 3,
				},
				1000: {
					items: 4,
				},

			}
		});
	}
	$('#NextPageBtn').click(function(e) {
		e.preventDefault();
		owl.trigger('next.owl.carousel');
	});
// Go to the previous item
	$('#PrevPageBtn').click(function(e) {
		e.preventDefault();
		owl.trigger('prev.owl.carousel', [300]);
	});



});	
		