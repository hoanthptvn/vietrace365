// resize
// ==================================================

$(function () {
	var timer = false;
	$(window).on('load resize', function () {
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function () {
			setViewport(); // viewport
			accrodion_sp(); // accordion

		}, 200);
	});
});

// setViewport
function setViewport() {
	var w = $(window).width();
	var x = 767;
	var viewport = $('meta[name=viewport]');
	if (w <= x) {
		viewport.attr('content', 'width=device-width');
	} else {
		viewport.attr('content', 'width=1000');
	}
}

// SPのみアコーディオン - accordion (SP only)
function accrodion_sp() {
	var $acBtn = $('.ac_btn_sp');
	var $acBody = $('.ac_body_sp');
	if ($('#sp_visible').is(':visible')) {
		$acBtn.on("click", function (e) {
			$(this).next($acBody).not(":animated").slideToggle(200);
			$(this).toggleClass("open");
		});
	} else {
		$acBtn.off("click");
	}
}


// gnav
// ==================================================

// ページのトップへ戻る - back to top of page
$(function () {
	var btn = $("#pagetop_btn_f");
	$(window).scroll(function () {
		if (!$('#sp_visible').is(':visible')) {
			if ($(this).scrollTop() > 300) {
				btn.addClass('visible');
			} else {
				btn.removeClass('visible');
			}
		}
	});
});


// page up //

$(document).ready(function () {
	var flag = false;
	var page_up = $('.page_up');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {
			if (flag == false) {
				flag = true;
				page_up.stop().animate({
					'right': '3%'
				}, 500);
			}
		} else {
			if (flag) {
				flag = false;
				page_up.stop().animate({
					'right': '-500px'
				}, 500);
			}
		}
	});
	page_up.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});
});


$(".sp_h_sec li:last-child").click(function () {
	$('.sp_h_sec').toggleClass('show');
	$(this).toggleClass('opened');
	$('.menu_hidden').slideToggle('400');
	return false;
});

$(".site_sec dt").click(function () {
	$(this).toggleClass('opened').next('.site_sec dd').slideToggle('400');
	return false;
});

$('.menu_hidden_content > li > a').click(function (event) {
	/* Act on the event */
	$('.sub_menu').slideUp();
	if ($(this).hasClass('opened')) {
		$(this).next('ul').slideUp();
		$('.menu_hidden_content > li > a').removeClass('opened');
	} else {
		$(this).next('ul').slideDown();
		$('.menu_hidden_content > li > a').removeClass('opened');
		$(this).addClass('opened');
	}
});

function slickTop() {
	if ($('.main-slider').length > 0) {
		var topSlider = $('.main-slider');
		topSlider.slick({
			fade: true,
			dots: true,
			speed: 3000,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1
		});
	}
}

slickTop();

$(".nav__link i").click(function () {
	$(this).toggleClass('opened').parent(".nav__link").next('.sub_menu').slideToggle('400');
	return false;
});