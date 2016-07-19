$(function(){
	console.log("It's working");
	showSelectedBooks();
	fakeDropDowMenu();
	fadeInHome();
	backToTop();
});

function showSelectedBooks(){
	$('input[type=radio]').on('click', function(){
		$('section.display').removeClass('display');
		var option = $(this).val();
		console.log(option);
		var title = $(this).parent().children('label').text();
		$('section.bookEntry.' + option).addClass('display');
		$('h3#book-subtitle').html(title);
	});
}

function fakeDropDowMenu(){
	$('.book-menu li').on('mouseover', function(){
		$(this).addClass('hover');
	});

	$('.book-menu li').on('mouseout', function(){
		$(this).removeClass('hover');
	});

	$('.book-menu li').on('mouseover', function(){
		$(this).children('ul').addClass('display');
	});

	$('.book-menu li').on('mouseout', function(){
		$(this).children('ul').removeClass('display');
	});
	
	$('input[type=radio]').on('click', function(){
		$('.book-menu li').removeClass('hover');
		$('.book-menu li').children('ul').removeClass('display');
	});

}

function fadeInHome(){
	$('html#main').addClass('fadein');
}

function backToTop(){
	var offset = 250;
	var duration = 300;
	 
	$(window).scroll(function() {
		if ($(this).scrollTop() > offset) { 
			$('.back-to-top').fadeIn(duration);
		} else {
	 		$('.back-to-top').fadeOut(duration);
	}
	});
	 

	 
	$('.back-to-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
	 	return false;
	});
}

 

 


 
