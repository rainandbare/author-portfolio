$(function(){
	console.log("It's working");
	showSelectedBooks();
	fakeDropDowMenu();
});

function showSelectedBooks(){
	$('input[type=radio]').on('click', function(){
		$('section.display').removeClass('display');
		var option = $(this).val();
		console.log(option);
		$('section.bookEntry.' + option).addClass('display');
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
