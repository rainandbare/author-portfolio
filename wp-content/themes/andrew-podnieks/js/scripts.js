$(function(){
	console.log("It's working");
	showSelectedBooks();
	fakeDropDowMenu();
	fadeInHome();
	backToTop();
	expandTranslation();
	expandNews();
	expandMobileMenu();
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

function expandTranslation(){
	$('.langInt').on('mouseover', function(){
		$(this).children('.langIntOverlay').addClass('show');
	});
	$('.langInt').on('mouseout', function(){
		$(this).children('.langIntOverlay').removeClass('show');
	});
	$('.langInt').on('click', function(){
		$('div.shadow-box').removeClass('show');
		$(this).next('div.shadow-box').addClass('show');

	});
	$('.ex').on('click', function(){
		$(this).parent('div.shadow-box').removeClass('show');
	});

}
 

function expandNews(){
	$('.archive').on('click', function(){
	console.log("hi i am news!");
	$(this).toggleClass('clicked');
	$(this).next('main').slideToggle();
	$(this).find('i.ex').toggleClass('rotate');
	});

	$('.new-month').on('click', function(){
	console.log("hi i am a month!");
	$(this).toggleClass('clicked');
	$(this).next('section').slideToggle();
	$(this).find('i.ex').toggleClass('rotate');
	});

}

function expandMobileMenu(){
	$('.hamburger').on('click', function(){
	$('#menu-moydart-menu-1').toggleClass('show');
	$('#menu-andrew-menu-1').toggleClass('show');
//	$(this).next('main').slideToggle();
//	$(this).find('i.ex').toggleClass('rotate');
	});

}

 


 
