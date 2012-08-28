$(document).ready(function(e){
	resize();
	external();
	head_links();
	search_main();
	scrollbar();
});

function resize(){
	$('.main_content').height($('.content').height() - 125);
	$(window).resize(function(e){
		$('.main_content').height($('.content').height() - 125);
	});
};
function external(){
	$('a.external').click(function () {
		window.open(this.href);
		return false
	})
};

function head_links(){
	$('.head_links').each(function(index, element){
		$(this).click(function(){
			if($(this).hasClass('icon-facebook')){
				window.open('https://www.facebook.com');
			}else if($(this).hasClass('icon-twitter')){
				window.open('https://www.twitter.com/tohealhim');
			}else if($(this).hasClass('icon-google-plus')){
				window.open('http://gplus.to/tohealhim');
			}else if($(this).hasClass('icon-feed')){
				window.open('');
			};
		});
	});
};

function search_main(){
	$('.top_search').click(function(){
		if($('.search_main').hasClass('hide')){
			$('.search_main').animate({top:'46px'},500);
			$('.search_main').removeClass('hide');
			$('.search_main').addClass('show');
		}else if($('.search_main').hasClass('show')){
			$('.search_main').animate({top:'-300px'},500);
			$('.search_main').removeClass('show');
			$('.search_main').addClass('hide');
		}
	});
	$('.search_close').click(function(){
			$('.search_main').animate({top:'-300px'},500);
			$('.search_main').removeClass('show');
			$('.search_main').addClass('hide');
	});
};

function scrollbar(){
	$('.main_content').mCustomScrollbar({
		scrollInertia: 0
	});
};














