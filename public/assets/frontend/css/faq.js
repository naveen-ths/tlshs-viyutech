jQuery(document).ready(function($){
		$('.question').on('click', function(){
			if($(this).hasClass('active')){
				$('.question').removeClass('active');
				$('.arrow').removeClass('arrow-active');
				$('.answer').slideUp();
			}
			else{
				$('.question').removeClass('active');
				$('.arrow').removeClass('arrow-active');
				$('.answer').slideUp();
				$(this).addClass('active');
				$(this).children('.arrow').addClass('arrow-active');
				$(this).children('.answer').slideToggle('slow');
			}
		});
	});
	
	
