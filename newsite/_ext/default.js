$(document).ready(function(e){
	$('.main_content').height($('.content').height() - 125);
	external();
	head_links();
	$(window).resize(function(e) {
		$('.main_content').height($('.content').height() - 125);
	});
});


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