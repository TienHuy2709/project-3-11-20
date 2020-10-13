$(document).ready(function() {
	$(window).scroll(function(event) {
		var pos_body = $('html,body').scrollTop();
		var width_body = $('html,body').width();
		var height_body = $('html,body').height();
		if(pos_body>100 && width_body > 991){
			$('.nav-menu').addClass('fixed-top');
			$('.nav-form').addClass('search-block');
		}
		else {
			$('.nav-menu').removeClass('fixed-top');
			$('.nav-form').removeClass('search-block');
		}
		if(pos_body>400){
			$('.back-to-top').addClass('hien-ra');
		}
		else{
			$('.back-to-top').removeClass('hien-ra');
		}
		var pos_video = $('.video').offset().top;
		if(pos_body > pos_video-670){
			//$('.video').addClass('block-video')
			$('.video').addClass(' left-action bounceInLeft');
			
		}
		else{//$('.video').removeClass('block-video');
			$('.video').removeClass('bounceInLeft left-action ');
		}
		var pos_content = $('.content').offset().top;
		if(pos_body > pos_content-700){
			$('.content-left').addClass(' left-action bounceInLeft');
			$('.content-right').addClass(' right-action bounceInRight');
		}
		else{
			$('.content-left').removeClass(' bounceInLeft left-action ');
			$('.content-right').removeClass(' bounceInRight right-action ');
		}	
		var pos_blog = $('.blog').offset().top;
		if(pos_body > pos_blog-700){
			$('.blog').addClass(' blog-action bounceInLeft');
		}
		else{
			$('.blog').removeClass(' bounceInLeft blog-action ');
		}	
			//console(pos_body);
	});
	$('.back-to-top').click(function(event) {
		$('html,body').animate({
			scrollTop: 0},
			1400);
	});
});

$('.slides').carousel({
  interval: 2500
})
$('.carousel1').carousel({
  interval: 3000
})
$('.product').carousel({
  interval: 5000
})