/**
 * Init js
 * Version 1.0
 **/

function initJs($) {
	
	(this.owlCarouselJs = function () {
		let _this = this;
		$(".testimonials_slider").owlCarousel({
			loop:true,
			margin:20,
			nav:true,
			dots: true,
			autoplay: false	,
			autoplayTimeout:5000,
			smartSpeed: 2000,
			responsive:{
				0:{
					items:1,
				},
			}
		});
	}),
	this.headerFixed = function(){

		$(window).on('scroll load', function(){
			let scrollPos = $(window).scrollTop();
			if(scrollPos > 78){
				$('#main-header').addClass('fix-header');
			}else{
				$('#main-header').removeClass('fix-header');
			}
		});
	},
	this.toggleSection = function(){
		// $(document).on('click', 'h5.et_pb_toggle_title', function() {
		// 	const $this = $(this);
		// 	$('h5.et_pb_toggle_title').removeClass('open_active');
		// 	$this.addClass('open_active');
		// 	$('.et_pb_toggle_content').slideUp(500);
		// 	$this.siblings('.et_pb_toggle_content').slideToggle(500);
		// });
		// 
		$('.advantage_toggle_section').on('click', 'h5.et_pb_toggle_title', function() {
			const $this = $(this);
			const $content = $this.siblings('.et_pb_toggle_content');
			if ($content.is(':visible')) {
				$content.slideUp(500);
				$this.removeClass('open_active');
			} else {
				$('.et_pb_toggle_content').slideUp(500);
				$('.et_pb_toggle_title').removeClass('open_active');
				$content.slideDown(500);
				$this.addClass('open_active');
			}
		});



	},

	(this.init = function () {

		this.owlCarouselJs();
		this.headerFixed();
		this.toggleSection();

	});
}

try {
	jQuery(function ($) {
		let initObj = new initJs($);
		initObj.init();
	});
} catch (err) {
	console.log(err.message);
}



