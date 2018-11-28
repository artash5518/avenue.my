$(document).ready(function() {
    $('.drop-li').each(function () {
        data_desc = $(this).data('desc');
        $(this).find('.drop-text').text(data_desc);
        // alert(data_desc);
    });
	//for dropdown sub-menu
	$('.drop-li').hover(
		function() {



            $(this).toggleClass('hover-li');
			$(
			".top-links," +
			".top-navigation .logo," +
			".top-navigation > ul li a"
			).addClass('relative');
		}
	);
	
	$(".top-navigation input").change(function() {
		if ($(window).width() < 531) {
			if ($(this).is(":checked")) {
				$(".top-section").css({"background": "rgba(30, 30, 30, 1)", "border-bottom": "1px rgba(255, 255, 255, .2) solid"});
			}
		}
	});

	//discloses the footer after the scrolling at the page end
	var wrapper = $(".wrapper");
	var footer = $("footer");
	var topSec = $(".top-section");
	var headerSecItems = $(".header-section > *");
	
	$(window).bind("scroll", function() {
		var scrollTop = $(this).scrollTop();

		// checks the measure of the current scroll step to serve for "effects" in the top and bottom sections
		if (scrollTop > 36) {
			wrapper.css("margin-bottom", footer.height());
			topSec.addClass("top-section-sticky");
			headerSecItems.css("opacity", 75 / scrollTop);
		} else {
			topSec.removeClass("top-section-sticky");
			headerSecItems.css("opacity", "1");
		}

		// makes paralax for header slider and middle one above the "Menu" section
		var position = $(this).scrollTop();

		if (scrollTop > position) {
			$(".header-section").css({"background-position": "50% calc(50% + " + position / 10 + "px)"});
		} else {
			$(".header-section").css({"background-position": "50% calc(50% + " + position / 10 + "px)"});
		}
		position = scrollTop;
		
		
		// calculates the offset top of each of the three elements, compares it with the window top and makes them brighter
		for (var i = 1;  i < 4; i++) {
			var mainRow = $(".main-row-" + i);
			var elOffset = mainRow.offset().top;
			var offsetFromTop = elOffset - scrollTop;
			
			if (offsetFromTop < 500) {
				mainRow.addClass("make-brighter");
			}
		}
	})
	
});