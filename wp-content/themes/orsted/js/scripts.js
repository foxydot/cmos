function showVideo(id) {
	document.write("<object width=\"274\" height=\"225\"><param name=\"movie\" value=\"http://www.youtube.com/v/"+id+">&amp;hl=en&amp;fs=1\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"http://www.youtube.com/v/"+id+"&amp;hl=en&amp;fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"274\" height=\"225\"></embed></object>");
}

var pages = 0;
var page = 1;
var marginLeft = 0;

function previousPage() {
	if (page>1) {
		oldMargin = marginLeft;
		marginLeft = marginLeft + 840;
		$('.container ul')
			.animate({left: marginLeft + 'px'}, 1500);
		page--;
	} else {
		page = pages;
		marginLeft = 0 - ((pages-1)*840);
		oldMargin = 0 - ((pages-2)*840);
		$('.container ul')
			.animate({left: marginLeft + 'px'}, 2000);
	}
}

function nextPage() {
	if (page<pages) {
		oldMargin = marginLeft;
		marginLeft = marginLeft - 840;
		$('.container ul')
			.animate({left: marginLeft + 'px'}, 1500);
		page++;
	} else {
		page = 1;
		marginLeft = 0;
		oldMargin = 0;
		$('.container ul')
			.animate({left: '0px'}, 2000);
	}
}

$(function() {
		
		photoCount = $('.container ul li').size() - 1;
		pages = Math.ceil(photoCount/4);
		
		$('.prev').click(function() {
				previousPage();
				return false; 
			});
		$('.next').click(function() {
				nextPage();
				return false; 
			});
		
	});
