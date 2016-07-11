$(function(){
	console.log("It's working");
	showSelectedBooks();
	fakeDropDowMenu();
	fadeInHome();
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
	$('.book-menu').on('mouseover', function(){
		$(this).children('li').addClass('display');
		$('p.disappear').addClass('display');
	});

	$('.book-menu').on('mouseout', function(){
		$(this).children('li').removeClass('display');
		$('p.disappear').removeClass('display');
	});

	$('.book-menu li').on('mouseover', function(){
		$(this).children('ul').addClass('display');
	});

	$('.book-menu li').on('mouseout', function(){
		$(this).children('ul').removeClass('display');
	});
	
	$('input[type=radio]').on('click', function(){
		$('.book-menu').children('li').removeClass('display');
		$('.book-menu li').children('ul').removeClass('display');
		$('p.disappear').removeClass('display');
	});

}

function fadeInHome(){
	$('html#main').addClass('fadein');
}
