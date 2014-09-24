/********** jquery toogle function **********/
    $(document).ready(function(){
	$('#toggle-view li').click(function () {
		var text = $(this).children('p');

		if (text.is(':hidden')) {
			text.slideDown('200');
			jQuery(this).find('.toggle-indicator').text('-');
		} else {
			text.slideUp('200');
			$(this).find('.toggle-indicator').text('+');
		}
	});
    });
/********** jquery tabs function **********/
    $(document).ready(function() {
	$(".tab_content").hide();
	$("ul.tabs li:first").addClass("active").show();
	$(".tab_content:first").show();

	$("ul.tabs li").click(function() {
	$("ul.tabs li").removeClass("active");
	$(this).addClass("active");
	$(".tab_content").hide();
	var activeTab = $(this).find("a").attr("href");
	$(activeTab).fadeIn();
	return false;
	});
    });

$(document).ready(function(){

$('#butContact').mouseover(function(){
		$(this).hide();
		$(this).css('background-position','50% -29px');
		$(this).fadeIn('normal');
	});

$('#butContact').mouseout(function(){
		$(this).hide();
		$(this).css('background-position','50% 0');
		$(this).fadeIn('normal');
	});

// PRETTY PHOTO INIT
$("a[rel^='prettyPhoto']").prettyPhoto();

});

/********** jquery tooltip plugin function **********/
