(function ($) {
	'use strict'

	jQuery(document).ready(function () {


		// DatePicker
		$(".date").datepicker();

		// Select2
		$(".select2").select2();


		$('ul.menu li a').click(function(){
			$('li a').removeClass("actives");
			$(this).addClass("actives");
		}); 

		$('.language-change a').click(function(){
			$('a').removeClass("activelang");
			$(this).addClass("activelang");
		}); 




		
		$('.latest-jobs').owlCarousel({
			loop:true,
			margin:10,
			items:3,
			dots: false,
			navText:['<span class="icon-arrow-left-3"></span>','<span class="icon-arrow-right-3"> </span>'],
			responsiveClass:false,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				600:{
					items:2,
					nav:true
				},
				1000:{
					items:2,
					nav:true,
					loop:false
				},
				1200:{
					items:3,
					nav:true,
					loop:false
				}


			}
		})	
		
		$('.our-company-icon').owlCarousel({
			loop:true, 
			items:5,
			// dots: true,
			navText: false,
			// navText:['<span class="icon-arrow-left-3"></span>','<span class="icon-arrow-right-3"> </span>'],
			responsiveClass:false,
			responsive:{
				0:{
					items:2,
					nav:true
				},
				600:{
					items:3,
					nav:true
				},
				1000:{
					items:4,
					nav:true,
					loop:false
				},
				1200:{
					items:5,
					nav:true,
					loop:false
				}


			}
		})	
		
		
		var accordion = (function(){

			var $accordion = $('.js-accordion');
			var $accordion_header = $accordion.find('.js-accordion-header');
			var $accordion_item = $('.js-accordion-item');

	  // default settings 
	  var settings = {
		// animation speed
		speed: 400,
		
		// close all other accordion items if true
		oneOpen: false
	};

	return {
		// pass configurable object literal
		init: function($settings) {
			$accordion_header.on('click', function() {
				accordion.toggle($(this));
			});

			$.extend(settings, $settings); 

		  // ensure only one accordion is start if oneOpen is true
		  if(settings.oneOpen && $('.js-accordion-item.start').length > 1) {
		  	$('.js-accordion-item.start:not(:first)').removeClass('start');
		  }
		  
		  // reveal the start accordion bodies
		  $('.js-accordion-item.start').find('> .js-accordion-body').show();
		},
		toggle: function($this) {

			if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.start > .js-accordion-header')[0]) {
				$this.closest('.js-accordion')
				.find('> .js-accordion-item') 
				.removeClass('start')
				.find('.js-accordion-body')
				.slideUp()
			}

		  // show/hide the clicked accordion item
		  $this.closest('.js-accordion-item').toggleClass('start');
		  $this.next().stop().slideToggle(settings.speed);
		}
	}
})();

$(document).ready(function(){
	accordion.init({ speed: 300, oneOpen: true });
});

$('.employeer-signin-button').click(function(){
	$('#loginModalEmployeer').modal('show');
});

$('.jobseeker-signin-button').click(function(){
	$('#loginModalJobSeeker').modal('show');
});

$('.jobseeker-signup-button').click(function(){
	$('#signupModalJobSeeker').modal('show');
});


});

// CkEditor
ClassicEditor
    .create( document.querySelector( '#simple-editor' ), {
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList']
    })
    .catch( error => {
        // console.log( error );
    } );


})(jQuery);

/**
 * openLoginJobSeeker()
 *
 * Open Login Job Seeker and close SignUpJobSeeker
 * 
 */
function openLoginJobSeeker() {
	$("#signupModalJobSeeker").modal('hide');
	$("#loginModalJobSeeker").modal('show');
}

/**
 * openSignupJobSeeker()
 *
 * Open Signup Job Seeker and close LoginJobSeeker
 * 
 */
function openSignupJobSeeker() {
	$("#loginModalJobSeeker").modal('hide');
	$("#signupModalJobSeeker").modal('show');
}

